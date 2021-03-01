<?php


namespace app\models;


use system\core\Model;

class News extends Model
{
    protected $table = 'news';


    /**
     * @param $start
     * @param $limit
     * @return array
     * выводит все новости
     */
//    public function getAllNews()
//    {
//        $sql = "SELECT N.id AS n_id, N.title, N.description, N.date, N.image, C.title AS cat_title, U.name FROM {$this->table} AS N JOIN category AS C ON C.id = N.cat_id JOIN users AS U ON N.author = U.id WHERE C.table_name = 'news' ORDER BY N.id DESC ";
//        return $this->db->query($sql);
//    }

    /**
     * @param $start
     * @param $limit
     * @return array
     * выводит все новости для пагинации
     */
//    public function getLimitNews($start, $limit)
//    {
//        $sql = "SELECT N.id AS n_id, N.title, N.description, N.date, N.image, C.title AS cat_title, U.name FROM {$this->table} AS N JOIN category AS C ON C.id = N.cat_id JOIN users AS U ON N.author = U.id WHERE C.table_name = 'news' ORDER BY N.id DESC LIMIT $start, $limit";
//        return $this->db->query($sql);
//    }


    /**
     * получаем новости по id категории для пагинации
     * @param $id
     * @return array
     */
//    public function getNewsThisCategoryLimit($id, $start, $limit)
//    {
//        $sql = "SELECT N.id AS n_id, N.title, N.date, N.image, N.meta_desc, N.meta_keywords, CAT.title AS cat_title FROM news AS N JOIN category AS CAT ON CAT.id = N.cat_id WHERE CAT.id = ? ORDER BY N.id DESC LIMIT $start, $limit";
//        return $this->db->query($sql, [$id]);
//    }

    public function findOneNewsByTable($id)
    {
        $sql = "SELECT N.id, N.title, N.description, N.date, N.image AS n_img, N.meta_desc, N.meta_keywords, U.name, U.image AS u_img FROM {$this->table} AS N JOIN users AS U ON N.author = U.id WHERE N.id = ? LIMIT 1";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }


}