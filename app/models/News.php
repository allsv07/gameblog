<?php


namespace app\models;


use system\core\Model;

class News extends Model
{
    protected $table = 'news';

//    public function getDetailNews($id)
//    {
//        $sql = "SELECT N.title, N.description, N.author as n_author, N.date as n_date, N.comments as n_comments, N.views AS n_views, C.author AS c_author, C.date AS c_date, C.text AS c_text FROM {$this->table} AS N JOIN comments AS C ON N.table_name = C.table_name AND N.id = C.table_row_id AND C.active = 1";
//        return $this->db->query($sql);
//    }

    public function getAllNews()
    {
        $sql = "SELECT N.id AS n_id, N.title, N.date, N.image, C.title AS cat_title FROM {$this->table} AS N JOIN category AS C ON C.id = N.cat_news WHERE C.table_name = 'news' ORDER BY N.id DESC";
        return $this->db->query($sql);
    }

    /**
     * получаем id категории новости
     * @param $code
     * @return array
     */
    public function getIDCategory($code)
    {
        $sql = "SELECT id FROM category WHERE code = :code";
        $res = $this->db->query($sql, [':code' => $code]);
        return (!empty($res)) ? $res : [];
    }

    /**
     * получаем новости по id категории
     * @param $id
     * @return array
     */
    public function getNewsThisCategory($id)
    {
        $sql = "SELECT N.id AS n_id, N.title, N.date, N.views, N.image, CAT.title AS cat_title FROM news AS N JOIN category AS CAT ON CAT.id = N.cat_news WHERE CAT.id = ? ORDER BY N.id DESC";
        return $this->db->query($sql, [$id]);
    }



}