<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    public function indexAction()
    {
        $users = new User();

        $user = $users->getUser("SELECT * FROM `users` WHERE `login` = ?", [$_SESSION['user']['login']]);
        $user = $this->editNewDate($user);


        $this->setVars(['user' => $user]);
    }

    public function editAction()
    {
        $users = new User();

        $user = $users->getUser("SELECT * FROM `users` WHERE `login` = ?", [$_SESSION['user']['login']]);
        $user = $this->editNewDate($user);

        if (empty($user)) {
            header('Location: /user');
            die();
        }

        //редактирование
        if (isset($_POST['btn-edit'])) {
            $file = $_FILES['avatar'];
            $name = clearStr($_POST['name']);
            $pass = password_hash($_POST['new-pass']);
            $email = clearStr($_POST['mail']);


        }


        $this->setVars(['user' => $user]);
    }
}