<?php


namespace app\controllers;


use app\models\Comment;
use app\models\Search;
use system\libs\Pagination;

class SearchController extends AppController
{
    public function indexAction()
    {
        $searchObj = new Search();
        $comments = new Comment();

        if (!empty($_POST['text-search']) && $_POST['text-search'] != '') {
            $textSearch = clearStr($_POST['text-search']);
        }
        $textSearch = '';
        $arrSearch = $searchObj->search($textSearch);

        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 20;
        $total = count($arrSearch);

        $pagination = '';
        if ($total >= $perPage){
            $pagination = new Pagination($page, $perPage, $total);
            $start = $pagination->getStart();
            $arrSearch = $searchObj->searchLimit($textSearch, $start, $perPage);
        }
        // end


        $arrSearch = editNewDateArray($arrSearch);

        //добавляем кол-во просмотров
        if (count($arrSearch) > 0) {
            foreach ($arrSearch as &$Search) {
                $Search['comments'] = $comments->getCommentsCountByTable($Search['tbl'], $Search['num_id']);
            }
        }


        /**
         * формируем meta-тэги и title
         */
        $title = 'Поиск на сайте';
        $metaD = 'Поиск на сайте';
        $metaK = 'Поиск на сайте';

        $this->setVars([
            'allSearch' => $arrSearch,
            'pagination' => $pagination,
            'title' => $title,
            'metaD' => $metaD,
            'metaK' => $metaK
        ]);
    }
}