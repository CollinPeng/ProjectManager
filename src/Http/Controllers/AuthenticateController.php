<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Libs\CommonTools;
use App\Models\UserModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Response;
use Twig_Environment;

class AuthenticateController extends Controller
{
    /**
     * @var UserModel
     */
    private $userModel;

    public function __construct(Twig_Environment $twig, UserModel $userModel)
    {
        parent::__construct($twig);
        $this->userModel = $userModel;
    }

    /**
     *
     * @return ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function loginAction(): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write(
            $this->twig->render('authenticate/login.twig')
        );

        return $response;
    }

    /**
     * 退出登录
     * @return ResponseInterface
     */
    public function logoutAction(): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write('退出登录');

        return $response;
    }

    /**
     * 注册页面
     *
     * @return ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function registerAction(): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write(
            $this->twig->render('authenticate/register.twig')
        );
        return $response;
    }

    /**
     * 处理注册逻辑
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function registerHandlerAction(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();

        $body = $request->getParsedBody();
        if (empty($body['username'])) {
            $response->getBody()->write(CommonTools::alert('请输入用户名', '/register'));
            return $response;
        }

        if (empty($body['email'])) {
            $response->getBody()->write(CommonTools::alert('请输入邮箱', '/register'));
            return $response;
        }

        if (empty($body['password'])) {
            $response->getBody()->write(CommonTools::alert('请输入密码', '/register'));
            return $response;
        }

        if (empty($body['password_confirmed'])){
            $response->getBody()->write(CommonTools::alert('请再次输入密码', '/register'));
            return $response;
        }

        if ($body['password'] !== $body['password_confirmed']) {
            $response->getBody()->write(CommonTools::alert('两次密码输入不一致', '/register'));
            return $response;
        }

        if ($this->userModel->usernameExists($body['username'])) {
            $response->getBody()->write(CommonTools::alert('用户名已存在.', '/register'));
            return $response;
        }

        if ($this->userModel->emailExists($body['email'])) {
            $response->getBody()->write(CommonTools::alert('邮箱已经存在.', '/redirect'));
            return $response;
        }


        $salt = CommonTools::randomStr(6);
        $password = md5($body['password'] . $salt);

        $res = $this->userModel->insert([
            'username' => $body['username'],
            'password' => $password,
            'password_salt' => $salt,
            'email' => $body['email'],
            'created' => date('Y-m-d H:i:s', time()),
            'updated' => date('Y-m-d H:i:s', time())
        ]);

        if ($res) {
            $response->getBody()->write(CommonTools::alert('注册成功，即将跳转到登录页面.', '/login'));
            return $response;
        }

        $response->getBody()->write(CommonTools::alert('注册失败', '/register'));
        return $response;
    }
}