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


}