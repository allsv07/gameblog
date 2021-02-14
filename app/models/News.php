<?php


namespace app\models;


use system\core\Model;

class News extends Model
{
    public $table = 'news';

    public function getLastNews($limit)
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY `id` DESC LIMIT {$limit}";
        return $this->db->query($sql);
    }
}