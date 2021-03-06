<?php


namespace app\controllers;


use app\models\Blog;
use app\models\Comment;
use app\models\View;
use system\libs\Pagination;

class BlogsController extends AppController
{
    public function indexAction()
    {
        $blogs = new Blog();
        $comments = new Comment();

        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 40;
        $total = $blogs->count();

        $pagination = '';
        if ($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $allBlogs = $blogs->getAllBlogsLimit($start, $perPage);
        }
        else {
            $allBlogs = $blogs->getAllBlogs();
        }
        // end

        /**
         * Все новости
         */

        $allBlogs = editNewDateArray($allBlogs);

        if (count($allBlogs) > 0) {
            foreach ($allBlogs as &$Blogs) {
                $Blogs['comments'] = $comments->getCommentsCountByTable('blogs', $Blogs['num_id']);
            }
        }


        /**
         * категории новостей
         */
        $categoryBlogs = $blogs->getCategory('category', 'blogs');

        /**
         * формируем meta-тэги и title
         */
        $title = 'Блоги';
        $metaD = 'Блоги GameBlog - обсуждение игр, вопросы и ответы, игровые новости';
        $metaK = 'блоги игры новости форум ps3 ps4 xbox one wii vita обзоры рецензии мобильные игры телефон стримы превью коды прохождения';

        $this->setVars([
            'allBlogs' => $allBlogs,
            'arrCategory' => $categoryBlogs,
            'pagination' => $pagination,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }


    public function detailAction()
    {
        $id = intval($this->route['id']);

        $blogs = new Blog();
        $comments = new Comment();
        $views = new View();


        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailBlog = $blogs->findOneByTable($id);
        $detailBlog = editNewDate($detailBlog);

        if (empty($detailBlog)) {
            http_response_code(404);
            include '404.html';
            die();
        }

        /**
         * добавление ip в таблицу просмотров и счетчик просмотров записи
         */
        $ip = clearStr($_SERVER['REMOTE_ADDR']);

        if (empty($views->checkIP($ip, 'blogs', $id))) {
            $views->addViews($ip, 'blogs', $id);
        }
//        else {
//            $views->updateView('blogs', $id);
//        }


        //добавляем к массиву записи количество комментариев и количество просмотров
        if (!empty($detailBlog)) {
            $detailBlog['comments'] = $comments->getCommentsCountByTable('blogs', $detailBlog['id']);
            $detailBlog['views'] = $views->getSumViewsByTable('blogs', $detailBlog['id']);
        }

        //комментарии для конкретной новости
        $arrComments = $comments->getComments($id, 'blogs');
        $arrComments = editNewDateArray($arrComments);

        //добавление комментариев
        if (isset($_POST['add_comment'])) {
            $author = $_SESSION['user']['login'];
            $id_author = $_SESSION['user']['id'];
            $comment = clearStr($_POST['text_comment']);
            $comments->addComment('blogs', $id, ['author' => $author, 'id_author' => $id_author, 'comment' => $comment]);
            $_SESSION['success-comment'] = 'Ваш комменатрий отобразиться после модерации';
            header('Location:/blogs/detail/' . $id);
            die();
        }


        /**
         * категории новостей
         */
        $categoryBlogs = $blogs->getCategory('category', 'blogs');

        /**
         * формируем meta-тэги и title
         */
        $title = $detailBlog['title'];
        $metaD = $detailBlog['meta_desc'];
        $metaK = $detailBlog['meta_keywords'];

        $this->setVars([
            'arrCategory' => $categoryBlogs,
            'detailBlog' => $detailBlog,
            'comments' => $arrComments,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);

    }


    public function categoryAction()
    {
        $blogs = new Blog();
        $comments = new Comment();
        $views = new View();
        $codeGet = '';

        /**
         * сортировка новостей по выбранной категории
         */
        if (isset($this->route['code'])) {
            $codeGet = $this->route['code'];

            $arrCategory = $blogs->getCategoryByCode($this->route['code']);
            if (empty($arrCategory)) {
                http_response_code(404);
                include '404.html';
                die();
            }

            $breadcrumbs = $blogs->getBreadcrumbs($this->route['code']);
            $id = $blogs->getIDCategory(clearStr($this->route['code']));

            //пагинация
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = 40;
            //$total = $blogs->countByCategory($id);

            //проверяем какая категоря выбрана (за неделю или месяц) и получаем ее количество
            if($arrCategory['code'] == 'weeks') {
                $total =  count($blogs->getLastBlogsOnWeek());
            }
            if($arrCategory['code'] == 'month') {
                $total = count($blogs->getLastBlogsOnMonth());
            }

            $pagination = '';
            if ($total >= $perPage) {
                $pagination = new Pagination($page, $perPage, $total);
                $start = $pagination->getStart();
                //$arBlogsCat = $blogs->getCategoryLimit($id, $start, $perPage);
                //проверяем какая категоря выбрана (за неделю или месяц)
                if($arrCategory['code'] == 'weeks') {
                    $arBlogsCat = $blogs->getLastBlogsOnWeekLimit($start, $perPage);
                }
                if($arrCategory['code'] == 'month') {
                    $arBlogsCat = $blogs->getLastBlogsOnMonthLimit($start, $perPage);
                }
            }
            else {
                //$arBlogsCat = $blogs->getRecordsThisCategory($id);
                //проверяем какая категоря выбрана (за неделю или месяц)
                if($arrCategory['code'] == 'weeks') {
                    $arBlogsCat = $blogs->getLastBlogsOnWeek();
                }
                if($arrCategory['code'] == 'month') {
                    $arBlogsCat = $blogs->getLastBlogsOnMonth();
                }

            }
            // end


            $arBlogsCat = editNewDateArray($arBlogsCat);


            if (!empty($arBlogsCat)) {
                foreach ($arBlogsCat as &$Blogs) {
                    $Blogs['comments'] = $comments->getCommentsCountByTable('blogs', $Blogs['num_id']);
                    $Blogs['views'] = $views->getCountViewsByTable('blogs', $Blogs['num_id']);
                }
            }


        }
        else {
            header('Location:/blogs');
            die();
        }

        $categoryBlogs = $blogs->getCategory('category', 'blogs');

        /**
         * формируем meta-тэги и title
         */
        $title = $arrCategory['title'];
        $metaD = $arrCategory['title'];
        $metaK = $arrCategory['title'];

        $this->setVars([
            'blogs' => $arBlogsCat,
            'arrCategory' => $categoryBlogs,
            'breadcrumb' => $breadcrumbs,
            'pagination' => $pagination,
            'code' => $codeGet,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }
}