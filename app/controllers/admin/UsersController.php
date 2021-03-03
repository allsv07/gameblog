<?php


namespace app\controllers\admin;


use app\models\User;

class UsersController extends AppController
{
    public function indexAction()
    {
        $users = new User();

        //получаем всех пользователей
        $allUser = $users->getAllUser('user');
        $allUser = $this->editRoleUser($allUser);
        $allUser = editNewDateArray($allUser);

        $this->setVars(['users' => $allUser]);
    }

    public function editAction()
    {
        $users = new User();

        //получаем id
        $id = $this->route['id'];

        //получаем пользователя
        $user = $users->getUser("SELECT * FROM `users` WHERE `id` = ? AND `role` = 'user'",[$id]);
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
                $users->editUser($id, ['login' => $login, 'name' => $name, 'email' => $email, 'image' => $file_name, 'role' => $role], 'user');
                header('Location:/admin/users');
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
        header('Location: /admin/users');
        die();
    }
}