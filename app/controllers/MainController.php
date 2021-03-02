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
        $arrlastBlogs = $blogs->getLastBlogs();
        if (!empty($arrlastBlogs)) {
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
         * формируем meta-тэги и title
         */
        $title = 'GameBlog';
        $metaD = 'GameBlog - это игровые новости, обзоры и превью игр, коды и прохождения, трейлеры и видео, машинима, flash и онлайн игры, скриншоты и обои, блоги и обсуждения';
        $metaK = 'игры, коды, скачать игры, компьютерные игры, прохождение, трейнер, коды к играм, прохождение игр, видео, машинима, онлайн игры, mmo, mmorpg, pc, ps3, ps4, xbox360, xbox720, ps vita';

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
            'lastComments' => $arrLastComments,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }

}