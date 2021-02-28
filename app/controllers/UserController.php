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

        if ($file['name'] != '') {
            // проверка файла на допустимый размер, формат и выбран ли вообще файл
            $check = $this->canUploadFile($file);
            if ($check !== true) {
                $_SESSION['error']['file'] = $check;
            }
            else {
                $file_name = $this->uploadFile($file);
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





    /**
     * производит все проверки файла: возвращает true либо строку с сообщением об ошибке
     * @param $file
     */
    protected function canUploadFile($file)
    {
        $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];

        if ($file['name'] == '') return 'Вы не выбрали файл';
        if ($file['size'] >= 1000000) return 'Файл слишком большой';

        // разбиваем имя файла по точке и получаем массив
        $getTypeFile = explode('.', $file['name']);
        // получаем - расширение файла
        $typeFile = strtolower(end($getTypeFile));

        if (!in_array($typeFile, $types)) return 'Недопустимый тип файла';

        return true;
    }

    /**
     * загрузка файла на сервер
     * @param $file
     */
    protected function uploadFile($file)
    {
        $directory = $_SERVER['DOCUMENT_ROOT'].'/public/images/user';
        $tmp_name = $file['tmp_name'];
        $name = time() . $file['name'];
        move_uploaded_file($tmp_name, "$directory/$name");
        return $name;
    }
}