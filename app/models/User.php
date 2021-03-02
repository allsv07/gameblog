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
                $_SESSION['is_admin'] = 'admin';
                $_SESSION['admin']['login'] = $res['login'];
                $_SESSION['admin']['id'] = $res['id'];
            }

            if ($res['role'] == 'moderator') {
                $_SESSION['is_admin'] = 'moderator';
                $_SESSION['admin']['login'] = $res['login'];
                $_SESSION['admin']['id'] = $res['id'];
            }

            if ($res['role'] == 'user') {
                $_SESSION['is_user'] = 'user';
                $_SESSION['user']['login'] = $res['login'];
                $_SESSION['user']['id'] = $res['id'];
                setcookie('USER', $res['login'], time()+2592000);
            }
        }

    }


    /**
     * @param $sql
     * @param array $param
     * @return array|mixed
     * выбрать одного пользователя
     */
    public function getUser($sql, $param = [])
    {
        $res = $this->db->query($sql, $param);
        return (isset($res[0]) && !empty($res[0])) ? $res[0] : [];

    }


    public function getAllUser($role)
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE `role` = ?", [$role]);
    }

    /**
     * регистрация пользователей на сайте
     */
    public function regUser($arr, $role)
    {
        $user = $this->getUser("SELECT `login` FROM {$this->table} WHERE `login` = ? AND `role` = ?", [$arr['login'], $role]);

        if (empty($user)) {
            $sql = "INSERT INTO {$this->table} SET login = ?, password = ?, name = '', email = ?, image = 'no-avatar.jpg', date = CURDATE(), role = ?";
            $this->db->exec($sql, [$arr['login'], $arr['pass'], $arr['email'], $role]);
            return $this->getInsertID();
        }
        else {
            return 'login-isset';
        }
    }

    /**
     * редактирование аватара user в БД
     */
    public function editUserImage($file, $login)
    {
        $this->db->exec("UPDATE `users` SET `image` = ? WHERE `login` = ?", [$file, $login]);
    }

    /**
     * редактирование email user
     */
    public function editEmailUser($email, $login)
    {
        $this->db->exec("UPDATE `users` SET `email` = ? WHERE `login` = ?", [$email, $login]);
    }

    /**
     * редактирование имя user
     */
    public function editNameUser($name, $login)
    {
        $this->db->exec("UPDATE `users` SET `name` = ? WHERE `login` = ?", [$name, $login]);
    }

    /**
     * редактирование пароля user
     */
    public function editPassUser($pass, $login)
    {
        $this->db->exec("UPDATE `users` SET `password` = ? WHERE `login` = ?", [$pass, $login]);
    }


    public function editUser($id, $arr, $role)
    {
        $sql = "UPDATE {$this->table} SET
                        `login` = ?,
                        `name` = ?,
                        `email` = ?,
                        `image` = ?,
                        `role` = ?
                        WHERE `id` = ? AND `role` = ? 
        ";
        $this->db->exec($sql, [$arr['login'], $arr['name'], $arr['email'], $arr['image'], $arr['role'], $id, $role]);
    }


    /**
     * @param $id
     * удаление пользователя
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE `id` = ?";
        $this->db->exec($sql, [$id]);
    }


}