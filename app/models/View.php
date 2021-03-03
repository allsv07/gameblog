<?php


namespace app\models;


use system\core\Model;

class View extends Model
{
    protected $table = 'views';

    /**
     * @param $table
     * @param $id
     * @return mixed
     * считает количество просмотров для конкретной записи
     */
    public function getCountViewsByTable($table, $id)
    {
        $sql = "SELECT COUNT(*) AS count FROM {$this->table} WHERE `table_name` = :t_name AND `table_row_id` = :id ";
        return $this->db->query($sql, [':t_name' => $table, ':id' => $id])[0]['count'];
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     * считает сумму просмотров для конкретной записи
     */
    public function getSumViewsByTable($table, $id)
    {
        $sql = "SELECT SUM(`c_views`) AS view FROM {$this->table} WHERE `table_name` = :t_name AND `table_row_id` = :id";
        return $this->db->query($sql, [':t_name' => $table, ':id' => $id])[0]['view'];
    }

    /**
     * @param $ip
     * @param $table
     * @param $id
     * @return array
     * проверяет существует ли такой ip-адрес в таблице
     */
    public function checkIP($ip, $table, $id)
    {
        $sql = "SELECT `ip` FROM `views` WHERE `ip` = :ip AND `table_name` = :t_name AND `table_row_id` = :id";
        $res = $this->db->query($sql, [':ip' => $ip, ':t_name' => $table, ':id' => $id]);
        return (!empty($res)) ? $res : [];
    }

    /**
     * @param $ip
     * @param $table
     * @param $id
     * @return bool
     * добавляет новый просмотр в таблицу
     */
    public function addViews($ip, $table, $id)
    {
        $sql = "INSERT INTO `views` SET `ip` = :ip, `table_name` = :t_name, `table_row_id` = :id, `c_views` = 1";
        return $this->db->exec($sql, [':ip' => $ip, ':t_name' => $table, ':id' => $id]);
    }

    /**
     * @param $table
     * @param $id
     * @return bool
     * обновляеи существующий просмотр
     */
//    public function updateView($table, $id)
//    {
//        $sql = "UPDATE views SET `c_views` = `c_views` + 1 WHERE `table_name` = :t_name AND `table_row_id` = :id";
//        return $this->db->exec($sql, [':t_name' => $table, ':id' => $id]);
//    }

}