<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use \Twig_Environment;

class Controller
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * Controller constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
}