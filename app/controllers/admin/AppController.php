<?php


namespace app\controllers\admin;


use system\core\Controller;

class AppController extends Controller
{
    protected $layout = 'admin';

    public function __construct($route, $view = '')
    {
        parent::__construct($route, $view);

        if (!isset($_SESSION['is_admin']) && ($this->route['action'] != 'login')) {
            header('Location: /admin/main/login');
            die();
        }

        // выход из админ панели
        if (isset($_GET['logout']) && $_GET['logout'] == 'exit') {
            $this->outAdmin();
            header('Location: /admin/main/login');
            die();
        }


    }

    /**
     * выход из админ панели
     */
    public function outAdmin()
    {
        if (isset($_SESSION['is_admin'])) {
            unset($_SESSION['is_admin']);
        }

        session_destroy();
    }


    public function editRoleUser($array)
    {
        foreach ($array as &$arr) {
            switch ($arr['role']) {
                case 'admin':
                    $arr['role'] = 'Администратор';
                    break;
                case 'user':
                    $arr['role'] = 'Пользователь';
                    break;
            }
        }
        return $array;
    }


}
