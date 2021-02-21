<?php


namespace app\controllers;

use app\models\Article;
use app\models\Blog;
use app\models\Cheat;
use app\models\Comment;
use app\models\News;
use app\models\View;

class MainController extends AppController
{

    public function indexAction()
    {
        $news = new News();
        $articles = new Article();
        $blogs = new Blog();
        $comments = new Comment();
        $views = new View();
        $cheats = new Cheat();

        /**
         * Главное сегодня
         */
        $arrMainToday = $news->getMainToday();

        if (!empty($arrMainToday)) {
            foreach ($arrMainToday as &$MainToday) {
                if ($MainToday['tbl'] == 'news') {
                    $MainToday['url'] = '/news/detail/';
                }

                if ($MainToday['tbl'] == 'articles') {
                    $MainToday['url'] = '/articles/detail/';
                }
            }
        }



        /**
         * Последние новости
         */
        $arrLastNews = $news->last('id', 5);
        $arrLastNews = $this->editNewDateArray($arrLastNews);

        if (count($arrLastNews) > 0) {
            foreach ($arrLastNews as &$News) {
                $News['comments'] = $comments->getCommentsCountByTable('news', $News['id']);
            }
        }


        /**
         * Популятрные новости
         */
        $arrPopularNews = $news->popular('c_views', 3);

        /**
         * Блоги
         */
        $arrlastBlogs = $blogs->last('id', 5);
        if (count($arrlastBlogs) > 0) {
            foreach ($arrlastBlogs as &$Blogs) {
                $Blogs['comments'] = $comments->getCommentsCountByTable('blogs', $Blogs['id']);
                $Blogs['views'] = $views->getCountViewsByTable('blogs', $Blogs['id']);
            }
        }

        /**
         * Статьи
         */
        $arrLastArticles = $articles->last('id', 4);
        $arrLastArticles = $this->editNewDateArray($arrLastArticles);

        /**
         * Читы
         */
        $arrLastChit = $cheats->last('id', 8);
        $arrLastChit = $this->editNewDateArray($arrLastChit);

        /**
         * последние комментарии
         */
        $arrLastComments = $comments->lastComment('5');


        /**
         * Отправка массивов на главную страницу
         */
        $this->setVars([
            'mainToday' => $arrMainToday,
            'lastNews' => $arrLastNews,
            'popularNews' => $arrPopularNews,
            'lastBlogs' => $arrlastBlogs,
            'lastArticles' => $arrLastArticles,
            'lastChits' => $arrLastChit,
            'lastComments' => $arrLastComments
        ]);
    }

}