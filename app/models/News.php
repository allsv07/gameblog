<?php


namespace app\models;


use system\core\Model;

class News extends Model
{
    protected $table = 'news';

    public function getDetailNewsByEdit($id)
    {
        $sql = "SELECT N.id AS n_id, N.cat_news, N.title, N.description, N.meta_desc, N.meta_keywords, N.showSlider, N.date, N.image, CAT.title AS cat_title FROM news AS N JOIN category AS CAT ON CAT.id = N.cat_news WHERE N.id = ?";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }

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
        return $this->db->exec($sql, [$arr['category'], $arr['title'], $arr['desc'], $_SESSION['admin']['id'], $arr['image'], $arr['m_desc'], $arr['m_keywords'], $arr['show']]);
    }

    /**
     * редактировани записи в БД
     */
    public function edit($table, $id, $arr)
    {
        $sql = "UPDATE `news` SET  
                            `cat_news` = ?,
                            `title` = ?,
                            `description` = ?,
                            `meta_desc` = ?,
                            `meta_keywords` = ?,
                            `showSlider` = ?
                            WHERE `id` = ?
                            ";
        $this->db->exec($sql, [$arr['category'], $arr['title'], $arr['desc'], $arr['m_desc'], $arr['m_keywords'], $arr['show'], $id]);
    }




}