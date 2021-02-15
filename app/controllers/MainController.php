<?php


namespace app\controllers;

use app\models\Articles;
use app\models\Blogs;
use app\models\News;
use system\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $news = new News();
        $articles = new Articles();
        $blogs = new Blogs();

        /**
         * Последние новости
         */
        $arrLastNews = $news->last('id', 5);
        $arrLastNews = $this->newDate($arrLastNews);

        /**
         * Популятрные новости
         */
        $arrPopularNews = $news->popular('views', 3);

        /**
         * Блоги
         */
        $arrlastBlogs = $blogs->last('id', 5);

        /**
         * Статьи
         */
        $arrLastArticles = $articles->last('id', 4);
        $arrLastArticles = $this->newDate($arrLastArticles);

        /**
         * Главное сегодня
         */
        $arrMainToday = $articles->last('id', 4); // выводит последние новости для блока - Главное сегодня

        /**
         * Отправка массивов на главную страницу
         */
        $this->setVars([
            'mainToday' => $arrMainToday,
            'lastNews' => $arrLastNews,
            'popularNews' => $arrPopularNews,
            'lastBlogs' => $arrlastBlogs,
            'lastArticles' => $arrLastArticles
        ]);
    }

    /**
     * перезаписывает дату во всем массиве
     * @param $array
     * @return string
     */
    private function newDate($array)
    {
        if (is_array($array)) {
            if (!empty($array)) {
                foreach ($array as $key => $new) {
                    $new['date'] = $this->editDate($new['date']);
                    $array[$key]['date'] = $new['date'];
                }
                return $array;

            }
        }
    }

}