<?php


namespace app\models;


use system\core\Model;

class News extends Model
{
    protected $table = 'news';

//    public function getDetailNews($id)
//    {
//        $sql = "SELECT N.title, N.description, N.author as n_author, N.date as n_date, N.comments as n_comments, N.views AS n_views, C.author AS c_author, C.date AS c_date, C.text AS c_text FROM {$this->table} AS N JOIN comments AS C ON N.table_name = C.table_name AND N.id = C.table_row_id AND C.active = 1";
//        return $this->db->query($sql);
//    }

    public function actionAddComments()
    {
        $comment = '';

        if (isset($_POST['text_comment'])) {
            $comment = clearStr($_POST['text_comment']);

            if ($this->checkComment($comment)) {
                $this->addComments();
            }
        }
    }

    protected  function checkComment($comment)
    {
        return (strlen($comment) >= 1) ? true : false;
    }

    protected function addComments($id)
    {
        $sql = "INSER INTO comments SET `text` = :text, `table_name` = :table_name, `table_row_id` = :table_row_id, `date` = CURDATE()";
        return $this->db->query($sql, [':table_name' => $this->table, ':table_row_id' => $id]);
    }

}