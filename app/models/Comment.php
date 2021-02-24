<?php


namespace app\models;


use system\core\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function getComments($id, $table)
    {
        $sql = "SELECT C.author, C.date AS date, C.text FROM comments AS C JOIN {$table} AS N ON C.table_name = '{$table}' AND C.table_row_id = N.id WHERE N.id = :id ORDER BY C.id DESC";
        return $this->db->query($sql, [':id' => $id]);
    }


    public function getCommentsCountByTable($table, $id)
    {
        $sql = "SELECT COUNT(*) AS count FROM {$this->table} WHERE `table_name` = :t_name AND `table_row_id` = :id AND `active` = '1'";
        return $this->db->query($sql, [':t_name' => $table, ':id' => $id])[0]['count'];
    }


    public function addComment($comment, $user, $table, $id)
    {
        if ($this->checkComment($comment)) {
            $sql = "INSERT INTO `comments` SET `author` = ?, `text` = ?, `table_name` = ?, `table_row_id` = ?, `date` = CURDATE()";
            return $this->db->exec($sql, [$user, $comment, $table, $id]);
        }
    }

        protected  function checkComment($comment)
    {
        return (strlen($comment) >= 1) ? true : false;
    }

    public function lastComment($limit)
    {
        $sql = "SELECT comments.id as c_id, comments.author, comments.text, news.id as n_id, news.title FROM comments JOIN news ON comments.table_row_id = news.id LIMIT " . $limit;
        return $this->db->query($sql);
    }


}