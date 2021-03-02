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


