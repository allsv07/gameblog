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
        $sql = "SELECT N.id AS n_id, N.title, N.description, N.date, N.image, C.title AS cat_title, U.name FROM {$this->table} AS N JOIN category AS C ON C.id = N.cat_news JOIN users AS U ON N.author = U.id WHERE C.table_name = 'news' ORDER BY N.id DESC";
        return $this->db->query($sql);
    }

    /**
     * получаем новости по id категории
     * @param $id
     * @return array
     */
    public function getNewsThisCategory($id)
    {
        $sql = "SELECT N.id AS n_id, N.title, N.date, N.image, CAT.title AS cat_title FROM news AS N JOIN category AS CAT ON CAT.id = N.cat_news WHERE CAT.id = ? ORDER BY N.id DESC";
        return $this->db->query($sql, [$id]);
    }

    public function findOneNewsByTable($id)
    {
        $sql = "SELECT N.id, N.title, N.description, N.date, N.image AS n_img, U.name, U.image AS u_img FROM {$this->table} AS N JOIN users AS U ON N.author = U.id WHERE N.id = ? LIMIT 1";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }

    /**
     * добавление новости
     * @param $arr
     */
    public function add($arr)
    {
        $sql = "INSERT INTO `news` 
                SET `cat_news` = ?,
                `title` = ?,
                `description` = ?,
                `author` = ?,
                `date` = CURRENT_DATE(),
                `image` = ?,
                `meta_desc` = ?,
                `meta_keywords` = ?,
                `showSlider` = ?
                ";
        return $this->db->exec($sql, [$arr['category'], $arr['title'], $arr['desc'], $_SESSION['user']['id'], $arr['image'], $arr['m_desc'], $arr['m_keywords'], $arr['show']]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `news` WHERE `id` = ?";
        $this->db->exec($sql, [$id]);
    }


}