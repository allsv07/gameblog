<?php


namespace app\controllers;

use app\models\Article;
use app\models\Blog;
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
        $arrPopularNews = $news->popular('views', 3);

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
         * Главное сегодня
         */
        $arrMainToday = $articles->last('id', 4); // выводит последние новости для блока - Главное сегодня

        /**
         * последние комментарии
         */
        $arrLastComments = $comments->lastComment('8');


        /**
         * Отправка массивов на главную страницу
         */
        $this->setVars([
            'mainToday' => $arrMainToday,
            'lastNews' => $arrLastNews,
            'popularNews' => $arrPopularNews,
            'lastBlogs' => $arrlastBlogs,
            'lastArticles' => $arrLastArticles,
            'lastComments' => $arrLastComments
        ]);
    }

}