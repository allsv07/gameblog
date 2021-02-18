<?php


namespace app\controllers;

use app\models\AddComments;
use app\models\Comment;
use app\models\News;
use app\models\View;

class NewsController extends AppController
{

    public function indexAction()
    {
        $news = new News();
        $comments = new Comment();

        /**
         * Все новости
         */
        $allNews = $news->getAllNews();
        $allNews = $this->editNewDateArray($allNews);

        if (count($allNews) > 0) {
            foreach ($allNews as &$News) {
                $News['comments'] = $comments->getCommentsCountByTable('news', $News['n_id']);
            }
        }


        /**
         * категории новостей
         */
        $categoryNews = $news->getCategory('category', 'news');

        $this->setVars(['allNews' => $allNews, 'arrCategory' => $categoryNews]);
    }


    public function detailAction()
    {
        $id = intval($this->route['id']);

        $news = new News();
        $comments = new Comment();
        $views = new View();

        /**
         * добавление ip в таблицу просмотров и счетчик просмотров записи
         */
        $ip = clearStr($_SERVER['REMOTE_ADDR']);

        if (empty($views->checkIP($ip, 'news', $id))) {
            $views->addViews($ip, 'news', $id);
        }
        else {
            $views->updateView('news', $id);
        }


        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailNew = $news->findOne($id);
        if (count($detailNew) > 0) {
            $detailNew = $this->editNewDate($detailNew);

        }
        else {
            header('Location:404.html');
        }


        //добавляем к массиву записи количество комментариев и количество просмотров
        if(count($detailNew) > 0) {
            $detailNew['comments'] = $comments->getCommentsCountByTable('news', $detailNew['id']);
            $detailNew['views'] = $views->getCountViewsByTable('news', $detailNew['id']);
        }

        //добавление комментариев
        if (isset($_POST['add_comment'])){
            $comment = clearStr($_POST['text_comment']);
            $comments->addComment($comment, 'news', $id);
            header('Location:/news/detail/'.$id);
        }


        //комментарии для конкретной новости
        $arrComments = $comments->getComments($id, 'news');
        $arrComments = $this->editNewDateArray($arrComments);


        /**
         * категории новостей
         */
        $categoryNews = $news->getCategory('category', 'news');


        $this->setVars(['arrCategory' => $categoryNews, 'detailNew' => $detailNew, 'comments' => $arrComments]);
    }

    public function categoryAction()
    {
        $news = new News();
        $comments = new Comment();
        $views = new View();

        /**
         * сортировка новостей по выбранной категории
         */
        if (isset($this->route['code'])) {
            $id = $news->getIDCategory(clearStr($this->route['code']));
            if (!empty($id)) {
                $arNewsCat = $news->getNewsThisCategory($id);
                $arNewsCat = $this->editNewDateArray($arNewsCat);

                if (count($arNewsCat) > 0) {
                    foreach ($arNewsCat as &$News) {
                        $News['comments'] = $comments->getCommentsCountByTable('news', $News['n_id']);
                        $News['views'] = $views->getCountViewsByTable('news', $News['n_id']);
                    }
                }
            }
            else {
                header("Location:404.html");
            }
        }
        else {
            header('Location:/news');
        }

        $categoryNews = $news->getCategory('category', 'news');

        $this->setVars(['news' => $arNewsCat, 'arrCategory' => $categoryNews]);
    }

}