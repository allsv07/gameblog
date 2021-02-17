<?php


namespace app\controllers;

use app\models\AddComments;
use app\models\Comment;
use app\models\News;

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

        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailNew = $news->findOne($id);
        $detailNew = $this->editNewDate($detailNew);


        //добавляем к массиву записи количество комментариев
        if(count($detailNew) > 0) {
            $detailNew['comments'] = $comments->getCommentsCountByTable('news', $detailNew['id']);
        }

        //добавление комментариев
        if (isset($_POST['add_comment'])){
            $comment = clearStr($_POST['text_comment']);
            $comments->addComment($comment, 'news', $id);
        }


        //комментарии для конкретной новости
        $arrComments = $comments->getCommentsNews($id);
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

        /**
         * сортировка новостей по выбранной категории
         */
        if (isset($this->route['code'])) {
            $id = $news->getIDCategory(clearStr($this->route['code']))[0]['id'];
            $arNewsCat = $news->getNewsThisCategory($id);
            $arNewsCat = $this->editNewDateArray($arNewsCat);

            if (count($arNewsCat) > 0) {
                foreach ($arNewsCat as &$News) {
                    $News['comments'] = $comments->getCommentsCountByTable('news', $News['n_id']);
                }
            }
        }

        $categoryNews = $news->getCategory('category', 'news');

        $this->setVars(['news' => $arNewsCat, 'arrCategory' => $categoryNews]);
    }

}