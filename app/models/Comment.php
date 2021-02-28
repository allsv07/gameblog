<?php


namespace app\models;


use system\core\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function getComments($id, $table)
    {
        $sql = "SELECT C.author, C.date AS date, C.text, U.image FROM comments AS C JOIN {$table} AS N ON C.table_name = '{$table}' AND C.table_row_id = N.id JOIN users AS U ON U.id = C.author_id AND N.id = :id WHERE C.active = 1 ORDER BY C.id DESC";
        return $this->db->query($sql, [':id' => $id]);
    }


    public function getCommentsCountByTable($table, $id)
    {
        $sql = "SELECT COUNT(*) AS count FROM {$this->table} WHERE `table_name` = :t_name AND `table_row_id` = :id AND `active` = '1'";
        return $this->db->query($sql, [':t_name' => $table, ':id' => $id])[0]['count'];
    }


    public function addComment($table, $id, $arr)
    {
            $sql = "INSERT INTO `comments` SET `author_id` = ?, `author` = ?, `text` = ?, `table_name` = ?, `table_row_id` = ?, `date` = CURDATE()";
            return $this->db->exec($sql, [$arr['id_author'], $arr['author'], $arr['comment'], $table, $id]);
    }

        protected  function checkComment($comment)
    {
        return (strlen($comment) >= 1) ? true : false;
    }

    /**
     * @param string $limit
     * @return array
     * Последние комментарии
     */
    public function lastComment($limit = '')
    {
        $limit = (strlen($limit) != '') ? "LIMIT ".(int)$limit : '';

        $sql = "SELECT C.id, C.author_id, C.author, C.text as comment, C.date, N.id AS title_id, N.title, U.image AS user_img, 'news' as tbl FROM comments AS C JOIN news AS N ON C.table_name = 'news' AND C.table_row_id = N.id JOIN users AS U ON C.author_id = U.id WHERE C.active = 1
                UNION
                SELECT C.id, C.author_id, C.author, C.text as comment, C.date, A.id AS title_id, A.title, U.image AS user_img, 'articles' as tbl FROM comments AS C JOIN articles AS A ON C.table_name = 'articles' AND C.table_row_id = A.id JOIN users AS U ON C.author_id = U.id WHERE C.active = 1
                UNION
                SELECT C.id, C.author_id, C.author, C.text as comment, C.date, B.id AS title_id, B.title, U.image AS user_img, 'blogs' as tbl FROM comments AS C JOIN blogs AS B ON C.table_name = 'blogs' AND C.table_row_id = B.id JOIN users AS U ON C.author_id = U.id WHERE C.active = 1
                UNION 
                SELECT C.id, C.author_id, C.author, C.text as comment, C.date, CH.id AS title_id, CH.title, U.image AS user_img, 'cheats' as tbl FROM comments AS C JOIN cheats AS CH ON C.table_name = 'cheats' AND C.table_row_id = CH.id JOIN users AS U ON C.author_id = U.id WHERE C.active = 1
                ORDER BY id DESC " . $limit;
        return $this->db->query($sql);
    }

    /**
     * @param $limit
     * @return array
     * Все комментарии (для админ панели)
     */
    public function allComments($limit = '')
    {
        $limit = (strlen($limit) != '') ? "LIMIT ".(int)$limit : '';

        $sql = "SELECT C.id, C.author_id, C.author, C.text as comment, C.date, C.active, N.id AS title_id, N.title, U.image AS user_img, 'news' as tbl FROM comments AS C JOIN news AS N ON C.table_name = 'news' AND C.table_row_id = N.id JOIN users AS U ON C.author_id = U.id 
                UNION
                SELECT C.id, C.author_id, C.author, C.text as comment, C.date, C.active, A.id AS title_id, A.title, U.image AS user_img, 'articles' as tbl FROM comments AS C JOIN articles AS A ON C.table_name = 'articles' AND C.table_row_id = A.id JOIN users AS U ON C.author_id = U.id 
                UNION
                SELECT C.id, C.author_id, C.author, C.text as comment, C.date, C.active, B.id AS title_id, B.title, U.image AS user_img, 'blogs' as tbl FROM comments AS C JOIN blogs AS B ON C.table_name = 'blogs' AND C.table_row_id = B.id JOIN users AS U ON C.author_id = U.id 
                UNION 
                SELECT C.id, C.author_id, C.author, C.text as comment, C.date, C.active, CH.id AS title_id, CH.title, U.image AS user_img, 'cheats' as tbl FROM comments AS C JOIN cheats AS CH ON C.table_name = 'cheats' AND C.table_row_id = CH.id JOIN users AS U ON C.author_id = U.id 
                ORDER BY id DESC " . $limit;
        return $this->db->query($sql);
    }

    /**
     * @return int
     * считаем кол-во коментариев
     */
    public function countCommentsByAdmin()
    {
        $sql = "SELECT * FROM {$this->table} WHERE `active` = '0'";
        $res = $this->db->query($sql);
        return count($res);
    }

    /**
     * @param $id
     * @return array
     * получаем один комментарий для редактирование в адин панели
     */
    public function getComment($id, $table)
    {
        $sql = "SELECT C.author_id, C.author, C.text as comment, C.date, C.active, U.image, T.title FROM comments AS C 
                JOIN users AS U ON C.author_id = U.id 
                JOIN {$table} AS T ON C.table_name = ? AND C.table_row_id = T.id
                WHERE C.id = ? LIMIT 1";
        return $this->db->query($sql, [$table, $id])[0];
    }

    /**
     * @param $id
     * @return mixed
     * получаем имя таблицы в комментариях
     */
    public function getTableNameFromComments($id)
    {
        $sql = "SELECT `table_name` FROM `comments` WHERE id = ?";
        return $this->db->query($sql, [$id])[0]['table_name'];
    }


    /**
     * редактируем комменатрий
     */
    public function editComment($id, $arr)
    {
        $sql = "UPDATE `comments` SET `active` = ? WHERE `id` = ?";
        $this->db->exec($sql, [$arr['show_comment'], $id]);
    }

}