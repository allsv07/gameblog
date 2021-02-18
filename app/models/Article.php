<?php


namespace app\models;


use system\core\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * выбирает из таблицы articles записи
     */
    public function getAllArticles()
    {
        $sql = "SELECT A.id AS a_id, A.cat_article, A.title, A.date, A.image, C.title AS cat_title FROM {$this->table} AS A JOIN category AS C ON C.id = A.cat_article WHERE C.table_name = 'articles' ORDER BY A.id DESC";
        return $this->db->query($sql);
    }

    /**
     * получает записи articles по id категории
     * @param $id
     * @return array
     */
    public function getArticlesThisCategory($id)
    {
        $sql = "SELECT A.id AS a_id, A.title, A.date, A.image, CAT.title AS cat_title FROM {$this->table} AS A JOIN category AS CAT ON CAT.id = A.cat_article WHERE CAT.id = ? ORDER BY A.id DESC";
        return $this->db->query($sql, [$id]);
    }
}