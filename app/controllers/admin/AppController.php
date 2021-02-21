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

            if (isset($_GET['logout']) && $_GET['logout'] == 'exit') {
                $this->out();
                header('Location: /admin/main/login');
                die();
            }


    }

    public function out()
    {
        if (isset($_SESSION['is_admin'])) {
            unset($_SESSION['is_admin']);
        }

        session_destroy();
    }


}