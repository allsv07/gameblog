<?php


namespace app\controllers;


use app\models\Article;
use app\models\Comment;
use app\models\View;
use system\libs\Pagination;

class ArticlesController extends AppController
{
    public function indexAction()
    {
        $articles = new Article();
        $comments = new Comment();

        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 20;
        $total = $articles->count();

        $pagination = '';
        if ($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $allArticles = $articles->getAllLimit($start, $perPage);
        }
        else {
            $allArticles = $articles->getAll();
        }

        // end

        // все статьи
        $allArticles = $this->editNewDateArray($allArticles);

        if (count($allArticles) > 0) {
            foreach ($allArticles as &$Articles) {
                $Articles['comments'] = $comments->getCommentsCountByTable('articles', $Articles['num_id']);
            }
        }
        //каиегории статей
        $categoryArticles = $articles->getCategory('category', 'articles');

        /**
         * формируем meta-тэги и title
         */
        $title = 'Статьи';
        $metaD = 'игровые статьи';
        $metaK = 'игровые статьи';

        $this->setVars([
            'arrCategory' => $categoryArticles,
            'allArticles' => $allArticles,
            'pagination' => $pagination,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }

    public function detailAction()
    {
        $id = intval($this->route['id']);

        $articles = new Article();
        $comments = new Comment();
        $views = new View();

        /**
         * выбираем конкретную статью для детального просмотра
         */
        $detailArticle = $articles->findOneArticleByTable($id);

        /**
         * проверяем массив на пустоту, если пустой то перенаправляем на 404
         */
        if (!empty($detailArticle)) {
            $ip = clearStr($_SERVER['REMOTE_ADDR']);

            /**
             * добавление ip в таблицу просмотров и счетчик просмотров записи
             */
            if (empty($views->checkIP($ip, 'articles', $id))) {
                $views->addViews($ip, 'articles', $id);
            }
            else {
                $views->updateView('articles', $id);
            }

            /**
             * редактируем дату в массиве новости в формат (12 марта 2021)
             */
            $detailArticle = $this->editNewDate($detailArticle);

            //добавляем к массиву записи количество комментариев и просмотров
            if(!empty($detailArticle)) {
                $detailArticle['comments'] = $comments->getCommentsCountByTable('articles', $detailArticle['id']);
                $detailArticle['views'] = $views->getSumViewsByTable('articles', $detailArticle['id']);
            }

            //добавление комментариев
            if (isset($_POST['add_comment'])){
                $author = $_SESSION['user']['login'];
                $id_author = $_SESSION['user']['id'];
                $comment = clearStr($_POST['text_comment']);
                $comments->addComment('articles', $id, ['author' => $author, 'id_author' => $id_author, 'comment' => $comment]);
                $_SESSION['success-comment'] = 'Ваш комменатрий отобразиться после модерации';
                header('Location:/articles/detail/'.$id);
                die();
            }


            //комментарии для конкретной новости
            $arrComments = $comments->getComments($id, 'articles');
            $arrComments = $this->editNewDateArray($arrComments);


            /**
             * категории новостей
             */
            $categoryArticles = $articles->getCategory('category', 'articles');

            /**
             * формируем meta-тэги и title
             */
            $title = $detailArticle['title'];
            $metaD = $detailArticle['meta_desc'];
            $metaK = $detailArticle['meta_keywords'];

            $this->setVars([
                'arrCategory' => $categoryArticles,
                'detailArticle' => $detailArticle,
                'comments' => $arrComments,
                'title' => $title,
                'metaD' => $metaD,
                'metaK' => $metaK
            ]);
        }
        else {
            header("Location:404.html");
            die();
        }


    }

    public function categoryAction()
    {
        $articles = new Article();
        $comments = new Comment();
        $views = new View();
        $codeGet = '';

        /**
         * сортировка новостей по выбранной категории
         */
        if (isset($this->route['code'])) {
            $codeGet = $this->route['code'];

            $arrCategory = $articles->getCategoryByCode($this->route['code']);
            if (empty($arrCategory)) {
                header("Location:404.html");
                die();
            }

            $breadcrumbs = $articles->getBreadcrumbs($this->route['code']);
            $id = $articles->getIDCategory(clearStr($this->route['code']));

            //пагинация
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = 20;
            $total = $articles->countByCategory($id);

            $pagination = '';
            if ($total >= $perPage) {
                $pagination = new Pagination($page, $perPage, $total);
                $start = $pagination->getStart();
                $arArticlesCat = $articles->getCategoryLimit($id, $start, $perPage);
            }
            else {
                $arArticlesCat = $articles->getRecordsThisCategory($id);
            }
            // end

            $arArticlesCat = $this->editNewDateArray($arArticlesCat);

            if (!empty($arArticlesCat)) {
                foreach ($arArticlesCat as &$Articles) {
                    $Articles['comments'] = $comments->getCommentsCountByTable('articles', $Articles['num_id']);
                    $Articles['views'] = $views->getCountViewsByTable('articles', $Articles['num_id']);
                }
            }
        }
        else {
            header('Location:/articles');
        }

        $categoryArticles = $articles->getCategory('category', 'articles');

        /**
         * формируем meta-тэги и title
         */
        $title = $arrCategory['title'];
        $metaD = $arrCategory['title'];
        $metaK = $arrCategory['title'];

        $this->setVars([
            'articles' => $arArticlesCat,
            'arrCategory' => $categoryArticles,
            'breadcrumb' => $breadcrumbs,
            'pagination' => $pagination,
            'code' => $codeGet,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }
}