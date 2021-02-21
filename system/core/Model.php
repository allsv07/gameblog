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

    public function getBreadcrumbs($code)
    {
        $sql = "SELECT `title` FROM `category` WHERE `code` = :c";
        return $this->db->query($sql, [':c' => $code])[0]['title'];
    }

    public function getMainToday()
    {
        $sql = "SELECT news.id, news.title, news.image, C.title as category, 'news' as tbl FROM news JOIN category as C ON news.cat_news = C.id WHERE showSlider = 1 UNION SELECT articles.id, articles.title, articles.image, C.title as category, 'articles' as tbl FROM articles JOIN category as C ON articles.cat_article = C.id WHERE showSlider = 1 LIMIT 4";
        return $this->db->query($sql);
    }








}