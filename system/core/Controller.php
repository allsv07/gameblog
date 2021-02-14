<?php


namespace system\core;


abstract class Controller
{
    protected $route;
    protected $layout;
    protected $view;
    public $vars = [];

    public function __construct($route, $view= '')
    {
        $this->route = $route;
        $this->view = $view ?: $route['action'];
    }

    /**
     * для подключения представления
     */
    public function getView()
    {
        $objView = new View($this->route, $this->layout, $this->view);
        $objView->render($this->vars);
    }

    public function setVars($vars)
    {
        $this->vars = $vars;
    }

    /**
     * редактиоует дату в формат (вчера, сегодня или 12 фмарта)
     * @param $date
     * @return string
     */
    protected function editDate($date)
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
        else return $date_exp[0] .''. $month_name .''. $date_exp[2] ;
    }

    /**
     * перезаписывает дату в массиве
     * @param array $array
     * @return array|bool
     */
    protected function newDate($array = [])
    {
        if (is_array($array)) {
            if (!empty($array)) {
                $newDate = $this->editDate($array['date']);
                return $array['date'] = $newDate;
            }
        }

        return false;
    }


}