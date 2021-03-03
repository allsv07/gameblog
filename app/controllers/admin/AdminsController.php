<?php


namespace app\controllers\admin;


use app\models\User;

class AdminsController extends AppController
{
    public function indexAction()
    {
        $users = new User();

        //получаем всех пользователей
        $allAdmin = $users->getAllUser('admin');
        $allAdmin = $this->editRoleUser($allAdmin);
        $allAdmin = editNewDateArray($allAdmin);

        $this->setVars(['admins' => $allAdmin]);
    }

    public function editAction()
    {
        $users = new User();

        //получаем id
        $id = $this->route['id'];

        //получаем пользователя
        $user = $users->getUser("SELECT * FROM `users` WHERE `id` = ? AND `role` = 'admin'",[$id]);
        $user = editNewDate($user);


        if (isset($_POST['btn_edit'])) {
            $login = clearStr($_POST['login']);
            $file = $_FILES['add_image'];
            $role = $_POST['role-user'];
            $name = clearStr($_POST['name']);
            $email = $_POST['email'];

            if ($login == '') $_SESSION['error']['login'] = 'Логин обязательное поле';
            if ($email == '') $_SESSION['error']['email'] = 'E-mail обязательное поле';

            //проверяем логин, что бы не повторялись
            $allAdmin = $users->getUser("SELECT * FROM `users` WHERE `login` = ? AND `id` NOT IN ({$user['id']})", [$login]);
            if (!empty($allAdmin)) $_SESSION['error']['login'] = 'Ползователь с таким логином уже существует. Введите другой логин';

            // т.к в $_FILES нам не приходит ничего, то мы делаем проверку, если имя файла не пустое, иначе пропускаем проверки
            //и просто записываем текущее имя файла в переменную.
            $f = false;
            if ($file['name'] != '') {
                // проверка файла на допустимый размер, формат и выбран ли вообще файл
                $check = canUploadFile($file);
                if ($check !== true) $_SESSION['error']['file'] = $check;
                $f = true;
            }
            else {
                $check = true;
                $file_name = $user['image'];
            }

            if ($check === true && empty($allAdmin) && $login != '' && $email != '') {

                if ($f === true) {
                    // т.к загружаем новый файл, удаляем старый файл
                    if (($user['image'] != DEFAULT_AVATAR) && (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_AVATAR.'/'.$user['image']))) {
                        unlink($_SERVER['DOCUMENT_ROOT'].PATH_AVATAR.'/'.$user['image']);
                    }

                    //загрузка файла на сервер
                    $file_name = uploadFile($file, PATH_AVATAR);
                    // end
                }
                //редактирование пользователя в БД
                $users->editUser($id, ['login' => $login, 'name' => $name, 'email' => $email, 'image' => $file_name, 'role' => $role], 'admin');
                header('Location:/admin/admins');
            }
        }

        $this->setVars(['user' => $user]);
    }


    public function deleteAction()
    {
        $users = new User();

        $id = $this->route['id'];
        $img = $users->getNameImageByTable($id);

        $users->deleteUser($id);
        if ($img != DEFAULT_AVATAR && file_exists($_SERVER['DOCUMENT_ROOT'].PATH_AVATAR.'/'.$img)){
            unlink($_SERVER['DOCUMENT_ROOT'].PATH_AVATAR.'/'.$img);
        }
        header('Location: /admin/admins');
        die();
    }


    public function addAction()
    {
        $users = new User();

        if (isset($_POST['btn_add'])) {
            $login = clearStr($_POST['login']);
            $pass = $_POST['pass'];
            $name = clearStr($_POST['name']);
            $email = $_POST['email'];

            if ($login == '') $_SESSION['error']['login'] = 'Введите логин';
            if ($pass == '') $_SESSION['error']['pass'] = 'Введите пароль';
            if ($email == '') $_SESSION['error']['email'] = 'Введите e-mail';


            if ($login != '' && $pass != '' && $email != '') {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $reg = $users->regUser(['login' => $login, 'email' => $email, 'pass' => $pass], 'admin');

                if ($reg !== 'login-isset') {
                    header('Location: /admin/admins');
                    die();
                }
                else {
                    $_SESSION['error']['login'] = 'Такой логин уже существует. Введите другой логин';
                }
            }
        }
    }
}