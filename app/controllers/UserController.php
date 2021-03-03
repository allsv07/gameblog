<?php


namespace app\controllers;


use app\models\Comment;
use app\models\User;

class UserController extends AppController
{

    public function indexAction()
    {
        $users = new User();
        $comments = new Comment();


        $user = $users->getUser("SELECT * FROM `users` WHERE `login` = ?", [$_SESSION['user']['login']]);
        $user = editNewDate($user);

        //получаем все комментарии оставленные пользователем
        $allCommentsUser = $comments->getCommentsByUser($_SESSION['user']['id']);
        pr($allCommentsUser);
        die();
        $allCommentsUser = editNewDateArray($allCommentsUser);

        $this->setVars(['user' => $user, 'allComments' => $allCommentsUser]);
    }

    public function editAction()
    {
        $users = new User();

        $user = $users->getUser("SELECT * FROM `users` WHERE `login` = ?", [$_SESSION['user']['login']]);
        $user = editNewDate($user);

        if (empty($user)) {
            header('Location: /user');
            die();
        }

        //редактирование аватара user
        if (isset($_POST['btn-edit-img'])) {
            $this->editImageUser($_FILES['avatar'], $user);
            header('Location: /user/edit');
            die();
        }

        // редактирование email user
        if (isset($_POST['btn-edit-mail'])) {
            $this->editEmailUser($_POST['mail'], $user['login']);
            header('Location: /user/edit');
            die();
        }

        // редактирование имя user
        if (isset($_POST['btn-edit-name'])) {
            $this->editNameUser($_POST['name'], $user['login']);
            header('Location: /user/edit');
            die();
        }

        // редактирование пароля user
        if (isset($_POST['btn-edit-pass'])) {
            $this->editPassUser($_POST['new-pass'], $_POST['pass'], $user['password'], $user['login']);
            header('Location: /user/edit');
            die();
        }


        $this->setVars(['user' => $user]);
    }


    /**
     * @param $file
     * @param $user
     * редактирование аватара user
     */
    protected function editImageUser($file, $user)
    {
        $users = new User();

        //получаем имя аватара user
        $imgUser = $users->getNameImageByTable($_SESSION['user']['id']);

        if ($file['name'] != '') {
            // проверка файла на допустимый размер, формат и выбран ли вообще файл
            $check = canUploadFile($file);
            if ($check !== true) {
                $_SESSION['error']['file'] = $check;
            }
            else {
                //удаляем старый аватар, если он не по дефолту
                if (($imgUser != DEFAULT_AVATAR) && (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_AVATAR.'/'.$imgUser))) {
                    unlink($_SERVER['DOCUMENT_ROOT'].PATH_AVATAR.'/'.$imgUser);
                }
                //загрузка нового аватара и изменение имени аватара в БД
                $file_name = uploadFile($file, PATH_AVATAR);
                $users->editUserImage($file_name, $user['login']);
                $_SESSION['success']['file'] = 'Аватар изменен';
            }
        }


    }


    /**
     * @param $email
     * @param $login
     * редактирование email user
     */
    protected function editEmailUser($email, $login)
    {
        $users = new User();

        $email = clearStr($email);
        $users->editEmailUser($email, $login);
        $_SESSION['success']['email'] = 'E-mail изменен';
    }


    /**
     * @param $name
     * @param $login
     * редактирование имя user
     */
    protected function editNameUser($name, $login)
    {
        $users = new User();

        $name = clearStr($name);
        $users->editNameUser($name, $login);
        $_SESSION['success']['name'] = 'Имя изменено';
    }


    /**
     * @param $newPass - новый пароль
     * @param $pass - введенный текущий пароль
     * @param $passUser - текущий пароль user в БД
     * @param $login
     * редактирование пароля user
     */
    protected function editPassUser($newPass, $pass, $passUser, $login)
    {
        $users = new User();

        if ($pass != '') {
            if ($newPass != '') {
                if (strlen($newPass) >= 3) {
                    if (password_verify($pass, $passUser)) {
                        $users->editPassUser(password_hash($newPass, PASSWORD_DEFAULT), $login);
                        $_SESSION['success']['pass'] = 'Пароль изменен';
                    }
                    else {
                        $_SESSION['error']['pass'] = 'Неверный пароль';
                    }
                }
                else {
                    $_SESSION['error']['pass'] = 'Пароль должен состоять из 3-х и более символов';
                }
            }
            else {
                $_SESSION['error']['pass'] = 'Введите новый пароль';
            }
        }
        else {
            $_SESSION['error']['pass'] = 'Введите текущий пароль';
        }
    }


    public function dellCommentAction()
    {
        $comments = new Comment();
        $id = $this->route['id'];

        $comments->dellComments($id);
        header('Location: /user');
        die();
    }

}