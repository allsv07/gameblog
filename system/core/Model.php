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
    public function findAll() // выбрать все записи из таблицы
    {
        $sql = "SELECT * FROM {$this->table}";
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
        return $this->db->query($sql, [':id' => $id]);
    }

    /**
     * выбирает из таблицы популярные записи ($pk - по какому столбцу сортировать)
     * @param $pk
     * @param $limit
     * @return array
     */
    public function popular($pk, $limit)
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY " .$pk. " DESC LIMIT " . $limit;
        return $this->db->query($sql, [$pk]);
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

    public function getMainToday($limit)
    {
        $sql = "SELECT NEWS.`title` AS news_title, ARTICLES.`title` AS artcle_title FROM `news` AS NEWS JOIN `articles` AS ARTICLES ON NEWS.`id` AND ARTICLES.`id` ";
    }



}