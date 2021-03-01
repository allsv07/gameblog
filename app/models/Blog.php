<?php


namespace app\models;

use system\core\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function getLastBlogs()
    {
        $sql = "SELECT B.id, B.title, B.image, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id ORDER BY B.id DESC LIMIT 4";
        return $this->db->query($sql);
    }


    /**
     * получаем блоги по id категории
     * @param $id
     * @return array
     */
//    public function getBlogsThisCategory($id)
//    {
//        $sql = "SELECT B.id AS b_id, B.title, B.date, B.image, B.meta_desc, B.meta_keywords, CAT.title AS cat_title FROM {$this->table} AS B JOIN category AS CAT ON CAT.id = B.cat_id WHERE CAT.id = ? ORDER BY B.id DESC";
//        return $this->db->query($sql, [$id]);
//    }


    public function findOneBlogByTable($id)
    {
        $sql = "SELECT B.id, B.title, B.description, B.date, B.image AS b_img, B.meta_desc, B.meta_keywords, U.name, U.image AS u_img FROM {$this->table} AS B JOIN users AS U ON B.author = U.id WHERE B.id = ? LIMIT 1";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }

}