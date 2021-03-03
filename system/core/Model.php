<?php


namespace system\core;


abstract class Model
{
    protected $db;
    protected $table;
    protected $pk = 'id';

    public function __construct()
    {
        $this->db = DB::instance();
    }

    /**
     * @param $sql
     * @return bool
     */
    public function getInsertID()
    {
        return $this->db->id;
    }

    public function query($sql)
    {
        return $this->db->exec($sql);
    }

    /**
     * все записи
     */
    public function findAll($pk = '') // выбрать все записи из таблицы
    {
        if ($pk != ''){
            $this->pk = $pk;
        }

        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->pk} DESC";
        return $this->db->query($sql);
    }

    public function findLimit($start, $limit)
    {
        $sql = "SELECT * FROM $this->table LIMIT $start, $limit ";
        return $this->db->query($sql);
    }


    /**
     * количество записей в таблице
     */
    public function count($params = [])
    {
        $arr = $this->findAll();
        return count($arr);
    }

    /**
     * количество записей конкретной категории
     */
    public function countByCategory($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->table}.cat_id = ?";
        $arr = $this->db->query($sql, [$id]);
        return count($arr);
    }


    /**
     * одна запись
     */
    public function findOne($id, $pk = '') // выбрать одну запись из таблицы
    {
        if ($pk != ''){
            $this->pk = $pk;
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->pk} = :id LIMIT 1";
        $res = $this->db->query($sql, [':id' => $id]);
        return (!empty($res[0])) ? $res[0]: [];
    }

    /**
     * выбирает из таблицы популярные записи ($pk - по какому столбцу сортировать)
     * @param $pk
     * @param $limit
     * @return array
     */
    public function popular($pk, $limit)
    {
        $sql = "SELECT N.id, N.title, N.image FROM {$this->table} AS N JOIN views AS V ON V.table_name = '{$this->table}' AND V.table_row_id = N.id ORDER BY V.c_views DESC LIMIT 3";
        return $this->db->query($sql, [$limit]);
    }

    /**
     * выбирает и зьаблицы последние записи ($pk - по какому столбцу сортировать)
     * @param string $pk
     * @param $limit
     * @return array
     */
    public function last($pk = '', $limit)
    {
        if ($pk == ''){
            $pk = $this->pk;
        }

        $sql = "SELECT * FROM {$this->table} ORDER BY " .$pk. " DESC LIMIT " . $limit;
        return $this->db->query($sql);
    }

    public function getCategory($table, $rowTableName)
    {
        $sql = "SELECT * FROM {$table} WHERE `table_name` = '{$rowTableName}'";
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
        return (!empty($res)) ? $res[0]['id'] : [];
    }

    /**
     * @param $code
     * @return array|mixed
     * получаем код категории
     */
    public function getCategoryByCode($code)
    {
        $sql = "SELECT * FROM category WHERE code = :code";
        $res = $this->db->query($sql, [':code' => $code]);
        return (!empty($res)) ? $res[0] : [];
    }

    /**
     * @param $code
     * @return mixed
     * получаем хлебные крошки
     */
    public function getBreadcrumbs($code)
    {
        $sql = "SELECT `title` FROM `category` WHERE `code` = :c";
        return $this->db->query($sql, [':c' => $code])[0]['title'];
    }

    public function getMainToday()
    {
        $sql = "SELECT news.id, news.title, news.image, C.title as category, 'news' as tbl FROM news JOIN category as C ON news.cat_id = C.id WHERE showSlider = 1 UNION SELECT articles.id, articles.title, articles.image, C.title as category, 'articles' as tbl FROM articles JOIN category as C ON articles.cat_id = C.id WHERE showSlider = 1 LIMIT 4";
        return $this->db->query($sql);
    }


    /**
     * получаем записи по id категории
     * @param $id
     * @return array
     */
    public function getRecordsThisCategory($id)
    {
        $sql = "SELECT T.id AS num_id, T.title, T.date, T.image, T.meta_desc, T.meta_keywords, CAT.title AS cat_title FROM {$this->table} AS T JOIN category AS CAT ON CAT.id = T.cat_id WHERE CAT.id = ? ORDER BY T.id DESC";
        return $this->db->query($sql, [$id]);
    }





    /**
     * @return array
     * выбираем все записи мз таблицы
     */
    public function getAll()
    {
        $sql = "SELECT {$this->table}.id AS num_id, {$this->table}.title, {$this->table}.date, {$this->table}.image, {$this->table}.meta_desc, {$this->table}.meta_keywords, C.title AS cat_title FROM {$this->table} JOIN category AS C ON C.id = {$this->table}.cat_id WHERE C.table_name = '{$this->table}' ORDER BY {$this->table}.id DESC";
        return $this->db->query($sql);
    }

    /**
     * @return array
     * выбираем все записи мз таблицы для пагинации
     */
    public function getAllLimit($start, $limit)
    {
        $sql = "SELECT {$this->table}.id AS num_id, {$this->table}.title, {$this->table}.date, {$this->table}.image, {$this->table}.meta_desc, {$this->table}.meta_keywords, C.title AS cat_title FROM {$this->table} JOIN category AS C ON C.id = {$this->table}.cat_id WHERE C.table_name = '{$this->table}' ORDER BY {$this->table}.id DESC LIMIT $start, $limit";
        return $this->db->query($sql);
    }

    /**
     * получает записи по id категории для пагинации
     * @param $id
     * @return array
     */
    public function getCategoryLimit($id, $start, $limit)
    {
        $sql = "SELECT {$this->table}.id AS num_id, {$this->table}.title, {$this->table}.date, {$this->table}.image, CAT.title AS cat_title FROM {$this->table} JOIN category AS CAT ON CAT.id = {$this->table}.cat_id WHERE CAT.id = ? ORDER BY {$this->table}.id DESC LIMIT $start, $limit";
        return $this->db->query($sql, [$id]);
    }


    /**
     * @param $id
     * @return array|mixed
     * выбор одной записи из таблицы для детального просмотра
     */
    public function findOneByTable($id)
    {
        $sql = "SELECT {$this->table}.id, {$this->table}.title, {$this->table}.description, {$this->table}.date, {$this->table}.image AS t_img, {$this->table}.meta_desc, {$this->table}.meta_keywords, U.name, U.login, U.image AS u_img FROM {$this->table} JOIN users AS U ON {$this->table}.author = U.id WHERE {$this->table}.id = ? LIMIT 1";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }


    /**
     * @param $start
     * @param $limit
     * @return array
     * выводит все новости
     */
    public function getAllByAdmin()
    {
        $sql = "SELECT {$this->table}.id AS num_id, {$this->table}.title, {$this->table}.description, {$this->table}.date, {$this->table}.image, C.title AS cat_title, U.login, U.name FROM {$this->table} JOIN category AS C ON C.id = {$this->table}.cat_id JOIN users AS U ON {$this->table}.author = U.id WHERE C.table_name = '{$this->table}' ORDER BY {$this->table}.id DESC ";
        return $this->db->query($sql);
    }




    /*** ADMIN PANEL ***/

    /**
     * добавление
     * @param $arr
     */
    public function add($table, $arr)
    {
        $sql = "INSERT INTO {$table} 
                SET `cat_id` = ?,
                `title` = ?,
                `description` = ?,
                `author` = ?,
                `date` = NOW(),
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
        $sql = "UPDATE {$table} SET  
                            `cat_id` = ?,
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


    /**
     * удаление записи из бд
     * @param $id
     */
    public function delete($table, $id)
    {
        $del_views = "DELETE FROM `views` WHERE `table_name` = ? AND `table_row_id` = ?";
        $this->db->exec($del_views, [$table, $id]);

        $del_comments = "DELETE FROM `comments` WHERE `table_name` = ? AND `table_row_id` = ?";
        $this->db->exec($del_comments, [$table, $id]);

        $sql = "DELETE FROM {$table} WHERE `id` = ?";
        $this->db->exec($sql, [$id]);
    }

    /**
     * получение имя картинки записи в бд
     */
    public function getNameImageByTable($id)
    {
        $res = $this->db->query("SELECT * FROM {$this->table} WHERE `id` = ?", [$id]);
        return $res[0]['image'];
    }


    /**
     * выблор запись для редактирования
     * @param $id
     * @return array|mixed
     */
    public function getDetailByEdit($id)
    {
        $sql = "SELECT {$this->table}.id AS num_id, {$this->table}.cat_id, {$this->table}.title, {$this->table}.description, {$this->table}.meta_desc, {$this->table}.meta_keywords, {$this->table}.showSlider, {$this->table}.date, {$this->table}.image, CAT.title AS cat_title FROM {$this->table} JOIN category AS CAT ON CAT.id = {$this->table}.cat_id WHERE {$this->table}.id = ?";
        $res = $this->db->query($sql, [$id]);
        return (!empty($res[0])) ? $res[0]: [];
    }


}