<?php


namespace app\models;


use system\core\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * выблор статьи для редактирования
     * @param $id
     * @return array|mixed
     */
    public function getDetailArticleByEdit($id)
    {
        $sql = "SELECT A.id AS a_id, A.cat_article, A.title, A.description, A.meta_desc, A.meta_keywords, A.showSlider, A.date, A.image, CAT.title AS cat_title FROM articles AS A JOIN category AS CAT ON CAT.id = A.cat_article WHERE A.id = ?";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }

    /**
     * выбирает из таблицы articles записи
     */
    public function getAllArticles()
    {
        $sql = "SELECT A.id AS a_id, A.title, A.description, A.date, A.image, C.title AS cat_title, U.name FROM {$this->table} AS A JOIN category AS C ON C.id = A.cat_article JOIN users AS U ON A.author = U.id WHERE C.table_name = 'articles' ORDER BY A.id DESC";
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

    public function findOneArticleByTable($id)
    {
        $sql = "SELECT A.id, A.title, A.description, A.date, A.image AS a_img, A.meta_desc, A.meta_keywords, U.name, U.image AS u_img FROM {$this->table} AS A JOIN users AS U ON A.author = U.id WHERE A.id = ? LIMIT 1";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }


    public function add($arr)
    {
        $sql = "INSERT INTO `articles` 
                SET `cat_article` = ?,
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
        $sql = "UPDATE `articles` SET  
                            `cat_article` = ?,
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