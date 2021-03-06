<?php


namespace app\controllers\admin;


use app\models\Article;
use app\models\Comment;
use app\models\View;

class ArticlesController extends AppController
{
    public function indexAction()
    {
        $articles = new Article();
        $views = new View();
        $comments = new Comment();

        $arrArticles = $articles->getAllByAdmin();
        $arrArticles = editNewDateArray($arrArticles);

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrArticles)) {
            foreach ($arrArticles as &$Articles){
                $Articles['views'] = $views->getSumViewsByTable('articles', $Articles['num_id']);
                $Articles['comments'] = $comments->getCommentsCountByTable('articles', $Articles['num_id']);
            }
        }

        $countComments = $comments->countCommentsByAdmin();
        $this->setVars(['articles' => $arrArticles, 'cComment' => $countComments]);
    }

    /**
     * добавление статьи
     */
    public function addAction()
    {
        $articles = new Article();
        $comments = new Comment();

        /**
         * выбираем категории для добавления статьи
         */
        $arrCategory = $articles->getCategory('category', 'articles');

        if (empty($arrCategory)) {
            $arrCategory = [];
        }

        /**
         * добавление статьи
         */
        if (isset($_POST['btn_add'])) {
            $file = $_FILES['add_image'];
            $title = clearStr($_POST['title']);
            $category = $_POST['category'];
            //$desc = clearStr($_POST['desc']);
            $desc = $_POST['desc'];
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);
            $showSlider = $_POST['show_slider'];


            if ($title == '') $_SESSION['error']['title'] = 'Введите название статьи';
            if ($category == '0') $_SESSION['error']['category'] = 'Выберите категорию';
            if ($desc == '') $_SESSION['error']['desc'] = 'Введите текст статьи';
            if ($m_desc == '') $_SESSION['error']['m_desc'] = 'Заполните Мета-тег Description';
            if ($m_keywords == '') $_SESSION['error']['m_keywords'] = 'Заполните Мета-тег Keywords';
            // проверка файла на допустимый размер, формат и выбран ли вообще файл
            $check = canUploadFile($file);
            if ($check !== true) $_SESSION['error']['file'] = $check;


            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                //загрузка файла на сервер
                $file_name = uploadFile($file, PATH_IMAGE);
                // end

                //добавление новости в БД
                $articles->add('articles',['category' => $category, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/articles');
            }
        }
        $countComments = $comments->countCommentsByAdmin();

        $this->setVars(['categories' => $arrCategory, 'cComment' => $countComments]);
    }

    /**
     * удаление статьи
     */
    public function deleteAction()
    {
        $articles = new Article();

        $id = $this->route['id'];
        $img = $articles->getNameImageByTable($id);

        $articles->delete('articles', $id);
        if (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$img)){
            unlink($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$img);
        }
        header('Location: /admin/articles');
        die();
    }

    /**
     * редактирование статьи
     */
    public function editAction()
    {
        $articles = new Article();
        $comments = new Comment();

        $id = $this->route['id'];

        $editArticle = $articles->getDetailByEdit($id);
        $arrCategory = $articles->getCategory('category', 'articles');

        if (empty($editArticle)) {
            header('Location: /admin/articles');
        }


        //редактирование
        if (isset($_POST['btn_edit'])) {
            $file = $_FILES['add_image'];
            $title = clearStr($_POST['title']);
            $category = $_POST['category'];
            $desc = $_POST['desc'];
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);
            $showSlider = $_POST['show_slider'];


            if ($title == '') $_SESSION['error']['title'] = 'Введите название новости';
            //if ($category == '0') $_SESSION['error']['category'] = 'Выберите категорию';
            if ($desc == '') $_SESSION['error']['desc'] = 'Введите текст новости';
            if ($m_desc == '') $_SESSION['error']['m_desc'] = 'Заполните Мета-тег Description';
            if ($m_keywords == '') $_SESSION['error']['m_keywords'] = 'Заполните Мета-тег Keywords';

            // т.к в $_FILES нам не приходит ничего, то мы делаем проверку, если имя файла не пустое, иначе пропускаем проверки
            //и просто записываем текущее имя файла в переменную.
            $f = false;
            if ($file['name'] != '') {
                // проверка файла на допустимый размер, формат и выбран ли вообще файл
                $check = canUploadFile($file);
                if ($check !== true) $_SESSION['error']['file'] = $check;
                $f = true;
            }
            else {
                $check = true;
                $file_name = $editArticle['image'];
            }

            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {

                if ($f === true) {
                    // т.к загружаем новый файл, удаляем старый файл
                    if (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$editArticle['image'])) {
                        unlink($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$editArticle['image']);
                    }

                    //загрузка файла на сервер
                    $file_name = uploadFile($file, PATH_IMAGE);
                    // end
                }
                //редактирование новости в БД
                $articles->edit('articles', $id, ['category' => $category, 'title' => $title, 'desc' => $desc,
                    'image' => $file_name, 'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/articles');
            }
        }

        $countComments = $comments->countCommentsByAdmin();

        $this->setVars(['editArticle' => $editArticle, 'categories' => $arrCategory, 'cComment' => $countComments]);
    }
}