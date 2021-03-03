<?php


namespace app\models;

use system\core\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    /**
     * @return array
     * выбирает записи из таблицы blogs для главной страницы
     */
    public function getLastBlogs()
    {
        $sql = "SELECT B.id, B.title, B.image, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id ORDER BY B.id DESC LIMIT 4";
        return $this->db->query($sql);
    }


    /**
     * @return array
     * выбирает записи из тпблицы blogs за неделю
     */
    public function getLastBlogsOnWeek()
    {
        $sql = "SELECT B.id as num_id, B.title, B.image, B.date, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id WHERE B.date > NOW() - INTERVAL 7 DAY ORDER BY num_id DESC";
        return $this->db->query($sql);
    }


    /**
     * @return array
     * выбирает записи из тпблицы blogs за неделю
     */
    public function getLastBlogsOnMonth()
    {
        $sql = "SELECT B.id as num_id, B.title, B.image, B.date, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id WHERE B.date > NOW() - INTERVAL 1 MONTH ORDER BY num_id DESC";
        return $this->db->query($sql);
    }


    /**
     * @return array
     * выбор всех блогов
     */
    public function getAllBlogs()
    {
        $sql = "SELECT B.id as num_id, B.title, B.image, B.date, U.login as author FROM blogs as B JOIN users as U ON B.author = U.id ORDER BY num_id DESC";
        return $this->db->query($sql);
    }


    /**
     * @return array
     * выбор всех блогов для пагинации
     */
    public function getAllBlogsLimit($start, $limit)
    {
        $sql = "SELECT B.id as num_id, B.title, B.image, B.date, U.login as author FROM blogs as B JOIN users as U ON B.author = U.id ORDER BY num_id DESC LIMIT $start, $limit";
        return $this->db->query($sql);
    }


    /**
     * @return array
     * выбирает записи из тпблицы blogs за неделю для пагинации
     */
    public function getLastBlogsOnWeekLimit($start, $limit)
    {
        $sql = "SELECT B.id as num_id, B.title, B.image, B.date, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id WHERE B.date > NOW() - INTERVAL 7 DAY ORDER BY num_id DESC LIMIT $start, $limit";
        return $this->db->query($sql);
    }

    /**
     * @return array
     * выбирает записи из тпблицы blogs за неделю
     */
    public function getLastBlogsOnMonthLimit($start, $limit)
    {
        $sql = "SELECT B.id as num_id, B.title, B.image, B.date, U.login as author FROM {$this->table} as B JOIN users as U ON B.author = U.id WHERE B.date > NOW() - INTERVAL 1 MONTH ORDER BY num_id DESC LIMIT $start, $limit";
        return $this->db->query($sql);
    }


    /*** ADMIN ***/

    /**
     * @param $table
     * @param $arr
     * @return bool
     * добавление записи в таблицу блог
     */
    public function addBlog($table, $arr)
    {
        $sql = "INSERT INTO {$table} 
                SET `title` = ?,
                `description` = ?,
                `author` = ?,
                `date` = NOW(),
                `image` = ?,
                `meta_desc` = ?,
                `meta_keywords` = ?,
                `showSlider` = ?
                ";
        return $this->db->exec($sql, [$arr['title'], $arr['desc'], $_SESSION['admin']['id'], $arr['image'], $arr['m_desc'], $arr['m_keywords'], $arr['show']]);
    }


    /**
     * выблор запись для редактирования
     * @param $id
     * @return array|mixed
     */
    public function getDetailBlogByEdit($id)
    {
        $sql = "SELECT {$this->table}.id AS num_id, {$this->table}.title, {$this->table}.description, {$this->table}.meta_desc, {$this->table}.meta_keywords, {$this->table}.date, {$this->table}.image FROM {$this->table}  WHERE {$this->table}.id = ?";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }


    /**
     * редактировани записи блог в БД
     */
    public function edit($table, $id, $arr)
    {
        $sql = "UPDATE {$table} SET  
                            `title` = ?,
                            `description` = ?,
                            `image` = ?,
                            `meta_desc` = ?,
                            `meta_keywords` = ?,
                            `showSlider` = ?
                            WHERE `id` = ?
                            ";
        $this->db->exec($sql, [$arr['title'], $arr['desc'], $arr['image'], $arr['m_desc'], $arr['m_keywords'], $arr['show'], $id]);
    }
}