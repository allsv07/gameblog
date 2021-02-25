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

        $arrArticles = $articles->getAllArticles();

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrArticles)) {
            foreach ($arrArticles as &$Articles){
                $Articles['views'] = $views->getSumViewsByTable('articles', $Articles['a_id']);
                $Articles['comments'] = $comments->getCommentsCountByTable('articles', $Articles['a_id']);
            }
        }


        $this->setVars(['articles' => $arrArticles]);
    }

    /**
     * добавление статьи
     */
    public function addAction()
    {
        $articles = new Article();

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
            $check = $this->canUploadFile($file);
            if ($check !== true) $_SESSION['error']['file'] = $check;


            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                //загрузка файла на сервер
                $file_name = $this->uploadFile($file);
                // end

                //добавление новости в БД
                $articles->add(['category' => $category, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/articles');
            }
        }

        $this->setVars(['categories' => $arrCategory]);
    }

    /**
     * удаление статьи
     */
    public function deleteAction()
    {
        $news = new Article();

        $id = $this->route['id'];

        $news->delete('articles', $id);
        header('Location: /admin/articles');
        die();
    }

    /**
     * редактирование статьи
     */
    public function editAction()
    {
        $articles = new Article();
        $id = $this->route['id'];

        $editArticle = $articles->getDetailArticleByEdit($id);
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
            if ($category == '0') $_SESSION['error']['category'] = 'Выберите категорию';
            if ($desc == '') $_SESSION['error']['desc'] = 'Введите текст новости';
            if ($m_desc == '') $_SESSION['error']['m_desc'] = 'Заполните Мета-тег Description';
            if ($m_keywords == '') $_SESSION['error']['m_keywords'] = 'Заполните Мета-тег Keywords';

            // т.к в $_FILES нам не приходит ничего, то мы делаем проверку, если имя файла не пустое, иначе пропускаем проверки
            //и просто записываем текущее имя файла в переменную.
            $f = false;
            if ($file['name'] != '') {
                // проверка файла на допустимый размер, формат и выбран ли вообще файл
                $check = $this->canUploadFile($file);
                if ($check !== true) $_SESSION['error']['file'] = $check;
                $f = true;
            }
            else {
                $check = true;
                $file_name = $editArticle['image'];
            }

            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                if ($f === true) {
                    //загрузка файла на сервер
                    $file_name = $this->uploadFile($file);
                    // end
                }
                //редактирование новости в БД
                $articles->edit('news', $id, ['category' => $category, 'title' => $title, 'desc' => $desc,
                    'image' => $file_name, 'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/articles');
            }
        }

        $this->setVars(['editNew' => $editArticle, 'categories' => $arrCategory]);
    }
}