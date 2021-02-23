<?php


namespace app\controllers\admin;


use system\core\Controller;

class AppController extends Controller
{
    protected $layout = 'admin';

    public function __construct($route, $view = '')
    {
        parent::__construct($route, $view);

        if (!isset($_SESSION['is_user']) && ($this->route['action'] != 'login')) {
            header('Location: /admin/main/login');
            die();
        }

            // выход из админ панели
            if (isset($_GET['logout']) && $_GET['logout'] == 'exit') {
                $this->out();
                header('Location: /admin/main/login');
                die();
            }


    }

    public function out()
    {
        if (isset($_SESSION['is_user'])) {
            unset($_SESSION['is_user']);
        }

        session_destroy();
    }

    /**
     * производит все проверки файла: возвращает true либо строку с сообщением об ошибке
     * @param $file
     */
    protected function canUploadFile($file)
    {
        $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];

        if ($file['name'] == '') return 'Вы не выбрали файл';
        if ($file['size'] >= 5000000) return 'Файл слишком большой';

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
        $directory = $_SERVER['DOCUMENT_ROOT'].'/public/images/upload_file';
        $tmp_name = $file['tmp_name'];
        $name = time() . $file['name'];
        move_uploaded_file($tmp_name, "$directory/$name");
        return $name;
    }


}