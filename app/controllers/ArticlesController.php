<?php


namespace app\controllers;


use app\models\Article;
use app\models\Comment;
use app\models\View;

class ArticlesController extends AppController
{
    public function indexAction()
    {
        $articles = new Article();
        $comments = new Comment();

        // все статьи
        $allArticles = $articles->getAllArticles();
        $allArticles = $this->editNewDateArray($allArticles);

        if (count($allArticles) > 0) {
            foreach ($allArticles as &$Articles) {
                $Articles['comments'] = $comments->getCommentsCountByTable('articles', $Articles['a_id']);
            }
        }
        //каиегории статей
        $categoryArticles = $articles->getCategory('category', 'articles');

        $this->setVars(['arrCategory' => $categoryArticles, 'allArticles' => $allArticles]);
    }

    public function detailAction()
    {
        $id = intval($this->route['id']);

        $articles = new Article();
        $comments = new Comment();
        $views = new View();

        /**
         * добавление ip в таблицу просмотров и счетчик просмотров записи
         */
        $ip = clearStr($_SERVER['REMOTE_ADDR']);

        if (empty($views->checkIP($ip, 'articles', $id))) {
            $views->addViews($ip, 'articles', $id);
        }
        else {
            $views->updateView('articles', $id);
        }

        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailArticle = $articles->findOne($id);
        if (count($detailArticle) > 0) {
            $detailArticle = $this->editNewDate($detailArticle);
        }
        else {
            header("Location:404.html");
        }

        //добавляем к массиву записи количество комментариев и просмотров
        if(count($detailArticle) > 0) {
            $detailArticle['comments'] = $comments->getCommentsCountByTable('articles', $detailArticle['id']);
            $detailArticle['views'] = $views->getCountViewsByTable('articles', $detailArticle['id']);
        }

        //добавление комментариев
        if (isset($_POST['add_comment'])){
            $comment = clearStr($_POST['text_comment']);
            $comments->addComment($comment, 'articles', $id);
            header('Location:/articles/detail/'.$id);
        }


        //комментарии для конкретной новости
        $arrComments = $comments->getComments($id, 'articles');
        $arrComments = $this->editNewDateArray($arrComments);


        /**
         * категории новостей
         */
        $categoryArticles = $articles->getCategory('category', 'articles');


        $this->setVars(['arrCategory' => $categoryArticles, 'detailArticle' => $detailArticle, 'comments' => $arrComments]);
    }

    public function categoryAction()
    {
        $articles = new Article();
        $comments = new Comment();
        $views = new View();

        /**
         * сортировка новостей по выбранной категории
         */
        if (isset($this->route['code'])) {
            $id = $articles->getIDCategory(clearStr($this->route['code']));
            if (!empty($id)) {
                $arArticlesCat = $articles->getArticlesThisCategory($id);
                $arArticlesCat = $this->editNewDateArray($arArticlesCat);

                if (count($arArticlesCat) > 0) {
                    foreach ($arArticlesCat as &$Articles) {
                        $Articles['comments'] = $comments->getCommentsCountByTable('articles', $Articles['a_id']);
                        $Articles['views'] = $views->getCountViewsByTable('articles', $Articles['a_id']);
                    }
                }
            }
            else {
                header('Location:404.html');
            }
        }
        else {
            header('Location:/articles');
        }

        $categoryArticles = $articles->getCategory('category', 'articles');

        $this->setVars(['articles' => $arArticlesCat, 'arrCategory' => $categoryArticles]);
    }
}