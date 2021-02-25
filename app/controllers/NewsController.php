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

        /**
         * формируем meta-тэги и title
         */
        $title = 'Новости';
        $metaD = 'игровые новости';
        $metaK = 'игровые новости';

        $this->setVars([
            'allNews' => $allNews,
            'arrCategory' => $categoryNews,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
            ]);
    }


    public function detailAction()
    {
        $id = intval($this->route['id']);

        $news = new News();
        $comments = new Comment();
        $views = new View();



        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailNew = $news->findOneNewsByTable($id);

        /**
         * проверяем массив на пустоту, если пустой то перенаправляем на 404
         */
        if (!empty($detailNew)) {
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
             * редактируем дату в массиве новости в формат (12 марта 2021)
             */
            $detailNew = $this->editNewDate($detailNew);


            //добавляем к массиву записи количество комментариев и количество просмотров
            if(count($detailNew) > 0) {
                $detailNew['comments'] = $comments->getCommentsCountByTable('news', $detailNew['id']);
                $detailNew['views'] = $views->getSumViewsByTable('news', $detailNew['id']);
            }


            //комментарии для конкретной новости
            $arrComments = $comments->getComments($id, 'news');
            $arrComments = $this->editNewDateArray($arrComments);

            //добавление комментариев
            if (isset($_POST['add_comment'])){

                $author = (isset($_SESSION['user']['login'])) ? $_SESSION['user']['login'] : clearStr($_POST['author_comment']);
                $comment = clearStr($_POST['text_comment']);
                $comments->addComment('news', $id, ['author' => $author, 'comment' => $comment]);
                header('Location:/news/detail/'.$id);
            }

            /**
             * категории новостей
             */
            $categoryNews = $news->getCategory('category', 'news');

            /**
             * формируем meta-тэги и title
             */
            $title = $detailNew['title'];
            $metaD = $detailNew['meta_desc'];
            $metaK = $detailNew['meta_keywords'];

            $this->setVars([
                'arrCategory' => $categoryNews,
                'detailNew' => $detailNew,
                'comments' => $arrComments,
                'title' => $title,
                'metaD' => $metaD,
                'metaK' => $metaK
            ]);
        }
        else {
            header('Location: 404.html');
            die();
        }


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

            $arrCategory = $news->getCategoryByCode($this->route['code']);
            if (empty($arrCategory)) {
                header("Location:404.html");
                die();
            }


            $breadcrumbs = $news->getBreadcrumbs($this->route['code']);
            $id = $news->getIDCategory(clearStr($this->route['code']));

            $arNewsCat = $news->getNewsThisCategory($id);
            $arNewsCat = $this->editNewDateArray($arNewsCat);
            if (!empty($arNewsCat)) {
                foreach ($arNewsCat as &$News) {
                    $News['comments'] = $comments->getCommentsCountByTable('news', $News['n_id']);
                    $News['views'] = $views->getCountViewsByTable('news', $News['n_id']);
                }
            }

        }
        else {
            header('Location:/news');
            die();
        }

        $categoryNews = $news->getCategory('category', 'news');

        /**
         * формируем meta-тэги и title
         */
        $title = $arrCategory['title'];
        $metaD = $arrCategory['title'];
        $metaK = $arrCategory['title'];

        $this->setVars([
            'news' => $arNewsCat,
            'arrCategory' => $categoryNews,
            'breadcrumb' => $breadcrumbs,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }

}