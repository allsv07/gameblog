<?php


namespace app\models;


use system\core\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * выбирает из таблицы articles записи
     */
//    public function getAllArticles()
//    {
//        $sql = "SELECT A.id AS a_id, A.title, A.description, A.date, A.image, C.title AS cat_title, U.name FROM {$this->table} AS A JOIN category AS C ON C.id = A.cat_id JOIN users AS U ON A.author = U.id WHERE C.table_name = 'articles' ORDER BY A.id DESC";
//        return $this->db->query($sql);
//    }

    /**
     * выбирает из таблицы articles записи для пагинации
     */
//    public function getLimitArticles($start, $limit)
//    {
//        $sql = "SELECT A.id AS a_id, A.title, A.description, A.date, A.image, C.title AS cat_title, U.name FROM {$this->table} AS A JOIN category AS C ON C.id = A.cat_id JOIN users AS U ON A.author = U.id WHERE C.table_name = 'articles' ORDER BY A.id DESC LIMIT $start, $limit";
//        return $this->db->query($sql);
//    }

    /**
     * получает записи articles по id категории
     * @param $id
     * @return array
     */
//    public function getArticlesThisCategory($id)
//    {
//        $sql = "SELECT A.id AS a_id, A.title, A.date, A.image, CAT.title AS cat_title FROM {$this->table} AS A JOIN category AS CAT ON CAT.id = A.cat_id WHERE CAT.id = ? ORDER BY A.id DESC";
//        return $this->db->query($sql, [$id]);
//    }

//    public function findOneArticleByTable($id)
//    {
//        $sql = "SELECT A.id, A.title, A.description, A.date, A.image AS a_img, A.meta_desc, A.meta_keywords, U.name, U.image AS u_img FROM {$this->table} AS A JOIN users AS U ON A.author = U.id WHERE A.id = ? LIMIT 1";
//        $res = $this->db->query($sql, [$id]);
//        return (!empty($res[0])) ? $res[0]: [];
//    }

}