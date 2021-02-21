<?php


namespace app\models;


use system\core\Model;

class User extends Model
{
    protected $table = 'users';

    public function auth($login, $pass)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `login` = ? LIMIT 1";
        $res = $this->getUser($sql, [$login]);

        if (!empty($res) && password_verify($pass, $res['password']) ) {

            return $res['id'];
        }

        return false;
    }

    public function login($id)
    {
        $res = $this->findOne($id);

        if (!empty($res)) {
            $_SESSION['user']['login'] = $res['login'];

            if ($res['role'] == 'admin') {
                $_SESSION['is_admin'] = 1;
            }
        }
    }


    public function getUser($sql, $param = [])
    {
        $res = $this->db->query($sql, $param);

        if (isset($res[0]) && !empty($res[0])) {
            return $res[0];
        }

        return [];
    }

}