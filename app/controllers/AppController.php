<?php


namespace app\controllers;


use system\core\Controller;

class AppController extends Controller
{
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
}