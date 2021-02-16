<?php


namespace app\controllers;

use app\models\AddComments;
use app\models\News;

class NewsController extends AppController
{

    public function indexAction()
    {
        $news = new News();

        /**
         * Все новости
         */
        $allNews = $news->findAll();
        $allNews = $this->editNewDate($allNews);

        /**
         * категории новостей
         */
        $categoryNews = $news->getCategory('category_news');


        $this->setVars(['allNews' => $allNews, 'arrCategory' => $categoryNews]);
    }


    public function detailAction()
    {
        $id = intval($this->route['id']);

        $news = new News();

        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailNew = $news->findOne($id);
        $detailNew = $this->editNewDate($detailNew);
        //комментарии для конкретной новости
        $comments = $news->getComments($id);
        $comments = $this->editNewDate($comments);


        /**
         * категории новостей
         */
        $categoryNews = $news->getCategory('category_news');

        $this->setVars(['arrCategory' => $categoryNews, 'detailNew' => $detailNew[0], 'arrComments' => $comments]);
    }

    public function categoryAction($id)
    {
        $id = intval($this->route['id']);
        $news = new News();

        $oneCategory = $news->findAll($id);


        $this->setVars(['thisCategory' => $oneCategory]);
    }


}