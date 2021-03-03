<?php


namespace app\controllers;


use app\models\User;
use system\core\Controller;

class AppController extends Controller
{

    public function __construct($route, $view = '')
    {
        parent::__construct($route, $view);

        $path = $this->route['controller'];

        // проверка на доступ к кабинету пользователя
        if (strtolower($path) == 'user' && (!isset($_SESSION['is_user']))) {
            header('Location: /');
            die();
        }

        //проверка на доступ к регистриции авторизированного пользователя
        if ($path == 'Register' && (isset($_SESSION['is_user']))) {
            header('Location: /user');
            die();
        }

        // выход из панели пользователя
        if (isset($_GET['logout']) && $_GET['logout'] == 'exit') {
            $this->outUser();
            header("Location: /");
            die();
        }
    }

    public function countArr($arr)
    {
        if(count($arr) > 0) {
            return true;
        }

        return false;
    }



    /**
     * выход пользователя
     */
    public function outUser()
    {
        if (isset($_SESSION['is_user']) && isset($_COOKIE['USER'])) {
            unset($_SESSION['is_user']);
            setcookie('USER', '', time() - 3600);
        }

        session_destroy();
    }

    /**
     * @param int $lenght
     * @return string
     * генерация пароля
     */
    public function generatePassword($lenght = 8)
    {
        $chars = 'abcdefghijklmopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ123456789';
        $numChars = strlen($chars);
        $string = '';

        for($i = 0; $i < $lenght; $i++) {
            $string .= substr($chars, rand(1, $numChars) -1, 1);
        }

        return $string;
    }

    public function sendMail($to, $subject, $message)
    {
        return mail($to, $subject, $message."\r\n");
    }



}