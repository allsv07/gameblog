<?php


namespace app\controllers\admin;


use app\models\Comment;
use app\models\News;
use app\models\View;

class NewsController extends AppController
{
    public function indexAction()
    {
        $news = new News();
        $views = new View();
        $comments = new Comment();

        $arrNew = $news->getAllNews();

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrNew)) {
            foreach ($arrNew as &$News){
                $News['views'] = $views->getSumViewsByTable('news', $News['n_id']);
                $News['comments'] = $comments->getCommentsCountByTable('news', $News['n_id']);
            }
        }


        $this->setVars(['news' => $arrNew]);
    }

    public function addAction()
    {

    }
}