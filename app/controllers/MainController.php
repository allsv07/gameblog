<?php


namespace app\controllers;

use app\models\Main;
use app\models\News;
use system\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $news = new News();

        /**
         * Последние новости
         */
        $arrLastNews = $news->getLastNews(5);
        //$arrLastNews['date'] = $this->newDate($this->editDate($arrLastNews['date']));

        /**
         * Популятрные новости
         */
        $arrPopularNews = $news->popular('views', 3);


        $this->setVars(['lastNews' => $arrLastNews, 'popularNews' => $arrPopularNews]);
    }

}