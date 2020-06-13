<?php
declare(strict_types=1);

namespace App\Models;

class UserModel extends BaseModels
{
    /**
     * table name.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Check username is exists.
     *
     * @param string $username
     * @return bool
     * @throws \Pixie\Exception
     */
    public function usernameExists(string $username): bool
    {
        $count = $this->query->table($this->table)->where('username', '=', $username)->count();
        return $count > 0;
    }

    /**
     * Check email is exists.
     *
     * @param string $email
     * @return bool
     * @throws \Pixie\Exception
     */
    public function emailExists(string $email): bool
    {
        $count = $this->query->table($this->table)->where('email', '=', $email)->count();
        return $count > 0;
    }

    /**
     * Insert.
     *
     * @param array $data
     * @return bool
     * @throws \Pixie\Exception
     */
    public function insert(array $data): bool
    {
        $res = $this->query->table($this->table)->insert($data);

        if (!empty($res)) {
            return true;
        }

        return false;
    }

    public function getByUserNameOrEmail(string $identify): \stdClass
    {
        $res = $this->query
            ->table($this->table)
            ->where('username', '=', $identify)
            ->orWhere('email', '=', $identify)
            ->find('password_salt');

        return $res;
    }
}