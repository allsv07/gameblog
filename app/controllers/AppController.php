<?php


namespace app\controllers;


use app\models\User;
use system\core\Controller;

class AppController extends Controller
{

    public function __construct($route, $view = '')
    {
        parent::__construct($route, $view);

        $path = $this->route['controller'];

        // проверка на доступ к кабинету пользователя
        if ($path == 'User' && (!isset($_SESSION['is_user']))) {
            header('Location: /');
            die();
        }

        //проверка на доступ к регистриции авторизированного пользователя
        if ($path == 'Register' && (isset($_SESSION['is_user']))) {
            header('Location: /user');
            die();
        }

        // выход из панели пользователя
        if (isset($_GET['logout']) && $_GET['logout'] == 'exit') {
            $this->outUser();
            header("Location: /");
            die();
        }
    }

    public function countArr($arr)
    {
        if(count($arr) > 0) {
            return true;
        }

        return false;
    }

    /**
     * редактиоует дату в формат (вчера, сегодня или 12 фмарта)
     * @param $date
     * @return string
     */
    private function setNewDate($date)
    {
        $newDate = date("j m Y", strtotime($date));
        $date_exp = explode(" ", $newDate);

        $month = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря'
        ];

        foreach ($month as $key => $value) {
            if ($key == intval($date_exp[1])) $month_name = $value;
        }

        if ($newDate == date("j m Y")) return 'Сегодня';
        elseif ($newDate == date("j m Y", strtotime('-1 day'))) return 'Вчера';
        else return $date_exp[0] .' '. $month_name .' '. $date_exp[2] ;
    }

    /**
     * перезаписывает дату во всем массиве
     * @param $array
     * @return string
     */

    protected function editNewDateArray($array)
    {
        if (is_array($array)) {
            if (!empty($array)) {
                foreach ($array as $key => $new) {
                    $new['date'] = $this->setNewDate($new['date']);
                    $array[$key]['date'] = $new['date'];
                }
            }
        }
        return $array;
    }

    protected function editNewDate($array)
    {
        if (is_array($array)) {
            $array['date'] = $this->setNewDate($array['date']);
        }

        return $array;
    }


    public function outUser()
    {
        if (isset($_SESSION['is_user']) && isset($_COOKIE['USER'])) {
            unset($_SESSION['is_user']);
            setcookie('USER', '', time() - 3600);
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
        if ($file['size'] >= 1000000) return 'Файл слишком большой';

        // разбиваем имя файла по точке и получаем массив
        $getTypeFile = explode('.', $file['name']);
        // получаем - расширение файла
        $typeFile = strtolower(end($getTypeFile));

        if (!in_array($typeFile, $types)) return 'Недопустимый тип файла';

        return true;
    }

}