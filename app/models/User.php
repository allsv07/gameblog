<?php


namespace app\models;


use system\core\Model;

class User extends Model
{
    protected $table = 'users';

    public function authAdmin($login, $pass)
    {
        $sql = "SELECT * FROM {$this->table} WHERE (`login` = ? AND `role` = 'admin') OR (`role` = 'moderator') LIMIT 1";
        $res = $this->getUser($sql, [$login]);

        if (!empty($res) && password_verify($pass, $res['password']) ) {

            return $res['id'];
        }

        return false;
    }

    public function authUser($login, $pass)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `login` = ? AND `role` = 'user' LIMIT 1";
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

            if ($res['role'] == 'admin') {
                $_SESSION['is_user'] = 'admin';
                $_SESSION['admin']['login'] = $res['login'];
                $_SESSION['admin']['id'] = $res['id'];
            }

            if ($res['role'] == 'moderator') {
                $_SESSION['is_user'] = 'moderator';
                $_SESSION['admin']['login'] = $res['login'];
                $_SESSION['admin']['id'] = $res['id'];
            }

            if ($res['role'] == 'user') {
                $_SESSION['is_user'] = 'user';
                $_SESSION['user']['login'] = $res['login'];
                $_SESSION['user']['id'] = $res['id'];
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


    public function getUserByDetailPage()
    {

    }

}