<?php


namespace app\controllers;


use app\models\User;

class RegisterController extends AppController
{
    public function indexAction()
    {
        $users = new User();

        if (isset($_POST['btn-reg-user'])) {
            $_SESSION['error-register'] = '';
            $login = clearStr($_POST['reg-login']);
            $pass = password_hash($_POST['reg-pass'], PASSWORD_DEFAULT);
            $email = clearStr($_POST['reg-mail']);

            if ((isset($login) && $login != '') && (isset($email) && $email != '') && (isset($pass) && $pass != '')) {

                if (strlen($login) >= 3) {

                    if (strlen($pass) >= 3) {


                        $reg = $users->regUser(['login' => $login, 'email' => $email, 'pass' => $pass]);

                        if ($reg !== 'login-isset') {
//                            $_SESSION['is_user'] = 'user';
//                            $_SESSION['user']['login'] = $login;
//                            $_SESSION['user']['id'] = $reg;
                            header('Location: /');
                            die();
                        }
                        else {
                            $_SESSION['error-register'] = 'Такой логин уже существует!';
                        }


                    } else {
                        $_SESSION['error-register'] = 'Пароль должен состоять из 3-х и более символов';
                    }
                } else {
                    $_SESSION['error-register'] = 'Логин должен состоять из 3-х и более символов';
                }

            } else {
                $_SESSION['error-register'] = 'Заполните все поля';
            }
        }

        /**
         * формируем meta-тэги и title
         */
        $title = 'Регистрация';
        $metaD = 'Регистрация';
        $metaK = 'Регистрация';

        $this->setVars(['title' => $title, 'metaD' => $metaD, 'metaK' => $metaK]);
    }
}