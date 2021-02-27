<?php


namespace app\controllers;

use app\models\AddComments;
use app\models\Cheat;
use app\models\Comment;
use app\models\News;
use app\models\View;

class CheatsController extends AppController
{
    public function indexAction()
    {
        $news = new News();
        $comments = new Comment();
        $cheats = new Cheat();

        /**
         * Все читы
         */
        $allCheats = $cheats->getAllCheats();
        $allCheats = $this->editNewDateArray($allCheats);

        if (count($allCheats) > 0) {
            foreach ($allCheats as &$Cheats) {
                $Cheats['comments'] = $comments->getCommentsCountByTable('cheats', $Cheats['ch_id']);
            }
        }


        /**
         * категории читов
         */
        $categoryCheats = $cheats->getCategory('category', 'cheats');

        /**
         * формируем meta-тэги и title
         */
        $title = 'Прохождения игр, тактика и советы';
        $metaD = 'Прохождения игр, тактика и советы';
        $metaK = 'Прохождения игр, тактика и советы';

        $this->setVars([
            'allCheats' => $allCheats,
            'arrCategory' => $categoryCheats,
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
        $cheats = new Cheat();


        /**
         * выбираем конкретную новость для детального просмотра
         */
        $detailCheat = $cheats->findOneCheatByTable($id);
        $detailCheat = $this->editNewDate($detailCheat);



        if (empty($detailCheat)) {
            header('Location:404.html');
            die();
        }

        /**
         * добавление ip в таблицу просмотров и счетчик просмотров записи
         */
        $ip = clearStr($_SERVER['REMOTE_ADDR']);

        if (empty($views->checkIP($ip, 'cheats', $id))) {
            $views->addViews($ip, 'cheats', $id);
        } else {
            $views->updateView('cheats', $id);
        }


        //добавляем к массиву записи количество комментариев и количество просмотров
        if (count($detailCheat) > 0) {
            $detailCheat['comments'] = $comments->getCommentsCountByTable('cheats', $detailCheat['id']);
            $detailCheat['views'] = $views->getSumViewsByTable('cheats', $detailCheat['id']);
        }

        //комментарии для конкретной новости
        $arrComments = $comments->getComments($id, 'cheats');
        $arrComments = $this->editNewDateArray($arrComments);

        //добавление комментариев
        if (isset($_POST['add_comment'])) {
            $author = $_SESSION['user']['login'];
            $id_author = $_SESSION['user']['id'];
            $comment = clearStr($_POST['text_comment']);
            $comments->addComment('cheats', $id, ['author' => $author, 'id_author' => $id_author, 'comment' => $comment]);
            header('Location:/cheats/detail/' . $id);
        }


        /**
         * категории новостей
         */
        $categoryCheats = $cheats->getCategory('category', 'cheats');

        /**
         * формируем meta-тэги и title
         */
        $title = $detailCheat['title'];
        $metaD = $detailCheat['meta_desc'];
        $metaK = $detailCheat['meta_keywords'];

        $this->setVars([
            'arrCategory' => $categoryCheats,
            'detailCheat' => $detailCheat,
            'comments' => $arrComments,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);

    }

    public function categoryAction()
    {
        $news = new News();
        $comments = new Comment();
        $views = new View();
        $cheats = new Cheat();

        /**
         * сортировка новостей по выбранной категории
         */
        if (isset($this->route['code'])) {

            $arrCategory = $cheats->getCategoryByCode($this->route['code']);
            if (empty($arrCategory)) {
                header("Location:404.html");
                die();
            }

            $breadcrumbs = $cheats->getBreadcrumbs($this->route['code']);
            $id = $cheats->getIDCategory(clearStr($this->route['code']));

            $arCheatsCat = $cheats->getCheatsThisCategory($id);
            $arCheatsCat = $this->editNewDateArray($arCheatsCat);

            if (!empty($arCheatsCat)) {
                foreach ($arCheatsCat as &$Cheats) {
                    $Cheats['comments'] = $comments->getCommentsCountByTable('cheats', $Cheats['ch_id']);
                    $Cheats['views'] = $views->getCountViewsByTable('cheats', $Cheats['ch_id']);
                }
            }

        }
        else {
            header('Location:/news');
            die();
        }

        $categoryCheats = $cheats->getCategory('category', 'cheats');

        /**
         * формируем meta-тэги и title
         */
        $title = $arrCategory['title'];
        $metaD = $arrCategory['title'];
        $metaK = $arrCategory['title'];

        $this->setVars([
            'cheats' => $arCheatsCat,
            'arrCategory' => $categoryCheats,
            'breadcrumb' => $breadcrumbs,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }
}