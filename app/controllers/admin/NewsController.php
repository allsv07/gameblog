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

        if (!empty($arrNew)) {
            foreach ($arrNew as &$News){
                $News['comments'] = $views->getCountViewsByTable('news', $News['n_id']);
                $News['views'] = $comments->getCommentsCountByTable('news', $News['n_id']);
            }
        }




        $this->setVars(['news' => $arrNew]);
    }

    public function addAction()
    {

    }
}