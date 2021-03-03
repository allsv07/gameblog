<?php

function pr($array){
    echo '<pre>' . print_r($array, 1) . '</pre>';
}

// очистка строки
function clearStr($str) {
    return htmlspecialchars(strip_tags(trim($str)));
}


/**
 * производит все проверки файла: возвращает true либо строку с сообщением об ошибке
 * @param $file
 */
function canUploadFile($file)
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
function uploadFile($file, $path)
{
    $directory = $_SERVER['DOCUMENT_ROOT'].$path;
    $tmp_name = $file['tmp_name'];
    $arNameFile = explode('/', $file['type']);
    $name = time() .'.'. $arNameFile[1];
    move_uploaded_file($tmp_name, "$directory/$name");
    return $name;
}


/**
 * редактиоует дату в формат (вчера, сегодня или 12 фмарта)
 * @param $date
 * @return string
 */
function setNewDate($date)
{
    $newDate = date("j m Y", strtotime($date));
    $date_time = date('H:i', strtotime($date));
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

    if ($newDate == date("j m Y")) return 'Сегодня в ' .$date_time;
    elseif ($newDate == date("j m Y", strtotime('-1 day'))) return 'Вчера в '.$date_time;
    else return $date_exp[0] .' '. $month_name .' '. $date_exp[2].' в ' . $date_time ;
}


/**
 * @param $array
 * @return array
 * редактирование даты в ассоц массиве
 */
function editNewDateArray($array)
{
    if (is_array($array)) {
        if (!empty($array)) {
            foreach ($array as $key => $new) {
                $new['date'] = setNewDate($new['date']);
                $array[$key]['date'] = $new['date'];
            }
        }
    }
    return $array;
}

/**
 * @param $array
 * @return array
 * редактирование даты в массиве
 */
function editNewDate($array)
{
    if (is_array($array)) {
        $array['date'] = setNewDate($array['date']);
    }

    return $array;
}


