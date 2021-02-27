<?php


namespace app\models;

use system\core\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function getDetailNewsByEdit($id)
    {
        $sql = "SELECT N.id AS n_id, N.cat_news, N.title, N.description, N.meta_desc, N.meta_keywords, N.showSlider, N.date, N.image, CAT.title AS cat_title FROM news AS N JOIN category AS CAT ON CAT.id = N.cat_news WHERE N.id = ?";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }


    public function getLastBlogs()
    {
        $sql = "SELECT B.id, B.title, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id ORDER BY B.id DESC LIMIT 4";
        return $this->db->query($sql);
    }


    public function getAllBlogs()
    {
        $sql = "SELECT B.id AS b_id, B.title, B.date, B.image, B.meta_desc, B.meta_keywords, C.title AS cat_title FROM {$this->table} AS B JOIN category AS C ON C.id = B.cat_blog WHERE C.table_name = 'blogs' ORDER BY B.id DESC";
        return $this->db->query($sql);
    }

    /**
     * получаем блоги по id категории
     * @param $id
     * @return array
     */
    public function getBlogsThisCategory($id)
    {
        $sql = "SELECT B.id AS b_id, B.title, B.date, B.image, B.meta_desc, B.meta_keywords, CAT.title AS cat_title FROM {$this->table} AS B JOIN category AS CAT ON CAT.id = B.cat_blog WHERE CAT.id = ? ORDER BY B.id DESC";
        return $this->db->query($sql, [$id]);
    }


    public function findOneBlogByTable($id)
    {
        $sql = "SELECT B.id, B.title, B.description, B.date, B.image AS b_img, B.meta_desc, B.meta_keywords, U.name, U.image AS u_img FROM {$this->table} AS B JOIN users AS U ON B.author = U.id WHERE B.id = ? LIMIT 1";
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
                            `image` = ?,
                            `meta_desc` = ?,
                            `meta_keywords` = ?,
                            `showSlider` = ?
                            WHERE `id` = ?
                            ";
        $this->db->exec($sql, [$arr['category'], $arr['title'], $arr['desc'], $arr['image'], $arr['m_desc'], $arr['m_keywords'], $arr['show'], $id]);
    }


}