<?php


namespace app\models;


use system\core\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * выбирает из таблицы записи для блока - Главное сегодня
     */
    public function getMainToday()
    {

    }
}