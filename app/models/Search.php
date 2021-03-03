<?php


namespace app\models;


use system\core\Model;

class Search extends Model
{
    /**
     * @param $text
     * @return array
     * поиск на сайте
     */
    public function search($text)
    {
        $sql = "SELECT news.id as num_id, news.title, news.description, news.date, news.image, 'news' as tbl FROM news WHERE news.title LIKE ? OR news.description LIKE ?
                UNION
                SELECT articles.id as num_id, articles.title, articles.description, articles.date, articles.image, 'articles' as tbl FROM articles WHERE articles.title LIKE ? OR articles.description LIKE ?
                UNION
                SELECT cheats.id as num_id, cheats.title, cheats.description, cheats.date, cheats.image, 'cheats' as tbl FROM cheats WHERE cheats.title LIKE ? OR cheats.description LIKE ?
                UNION
                SELECT blogs.id as num_id, blogs.title, blogs.description, blogs.date, blogs.image, 'blogs' as tbl FROM blogs WHERE blogs.title LIKE ? OR blogs.description LIKE ?
        ";
        return $this->db->query($sql, ['%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%']);
    }


    /**
     * @param $text
     * @return array
     * поиск на сайте для пагинации
     */
    public function searchLimit($text, $start, $limit)
    {
        $sql = "SELECT news.id as num_id, news.title, news.description, news.date, news.image, 'news' as tbl FROM news WHERE news.title LIKE ? OR news.description LIKE ?
                UNION
                SELECT articles.id as num_id, articles.title, articles.description, articles.date, articles.image, 'articles' as tbl FROM articles WHERE articles.title LIKE ? OR articles.description LIKE ?
                UNION
                SELECT cheats.id as num_id, cheats.title, cheats.description, cheats.date, cheats.image, 'cheats' as tbl FROM cheats WHERE cheats.title LIKE ? OR cheats.description LIKE ?
                UNION
                SELECT blogs.id as num_id, blogs.title, blogs.description, blogs.date, blogs.image, 'blogs' as tbl FROM blogs WHERE blogs.title LIKE ? OR blogs.description LIKE ? LIMIT $start, $limit
        ";
        return $this->db->query($sql, ['%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%', '%'.$text.'%']);
    }
}