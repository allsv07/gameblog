<?php


namespace app\controllers;


use app\models\User;

class AuthController extends AppController
{
    public function indexAction()
    {
        $user = new User();
        $error = ['message' => 'ok'];

        if (isset($_POST['login_user']) && isset($_POST['pass_user'])) {
            if ($_POST['login_user'] != '' && $_POST['pass_user'] != '') {
                $login = clearStr($_POST['login_user']);
                $pass = $_POST['pass_user'];

                $id = $user->authUser($login, $pass);

                if ($id !== false) {
                    $user->login($id);

                } else {
                    $error['message'] = 'Не вырный логин или пароль';
                }

            } else {
                $error['message'] = 'Заполните все поля';
            }

            if ($this->isAjax()) {
                $this->layout = false;
                echo json_encode($error);
                die();
            }

            if ($error['message'] = 'ok') {
                header("Location: /");
                die();
            }

        }

        /**
         * формируем meta-тэги и title
         */
        $title = 'Авторизвция';
        $metaD = '';
        $metaK = '';

        $this->setVars(['title' => $title, 'metaD' => $metaD, 'metaK' => $metaK]);

    }


}