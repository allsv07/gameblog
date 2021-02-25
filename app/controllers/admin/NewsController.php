<?php


namespace app\controllers\admin;


use app\models\Comment;
use app\models\News;
use app\models\View;

class NewsController extends AppController
{
    public function indexAction()
    {
        $news = new News();
        $views = new View();
        $comments = new Comment();

        $arrNew = $news->getAllNews();

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrNew)) {
            foreach ($arrNew as &$News){
                $News['views'] = $views->getSumViewsByTable('news', $News['n_id']);
                $News['comments'] = $comments->getCommentsCountByTable('news', $News['n_id']);
            }
        }


        $this->setVars(['news' => $arrNew]);
    }

    public function addAction()
    {
        $news = new News();

        /**
         * выбираем категории для добавления новости
         */
        $category = $news->getCategory('category', 'news');

        if (empty($category)) {
            $category = [];
        }

        /**
         * добавление новости
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


            if ($title == '') $_SESSION['error']['title'] = 'Введите название новости';
            if ($category == '0') $_SESSION['error']['category'] = 'Выберите категорию';
            if ($desc == '') $_SESSION['error']['desc'] = 'Введите текст новости';
            if ($m_desc == '') $_SESSION['error']['m_desc'] = 'Заполните Мета-тег Description';
            if ($m_keywords == '') $_SESSION['error']['m_keywords'] = 'Заполните Мета-тег Keywords';
            if ($file['add_image']['name'] = '') $_SESSION['error']['file'] = 'Выберите изоражение';


            if (isset($file) && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                //проверка и загрузка файла на сервер
                $check = $this->canUploadFile($file);
                if ($check === true) {
                    $file_name = $this->uploadFile($file);
                }
                else {
                    $_SESSION['error'] = $check;
                }
                // end

                //добавление новости в БД
                $news->add(['category' => $category, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/news');
            }
        }

        $this->setVars(['categories' => $category]);
    }

    /**
     * удаление новости
     */
    public function deleteAction()
    {
        $news = new News();

        $id = $this->route['id'];

        $news->delete('news', $id);
        header('Location: /admin/news');
        die();
    }

    /**
     * редактирование новости
     */
    public function editAction()
    {
        $news = new News();
        $id = $this->route['id'];

        $editNew = $news->getDetailNewsByEdit($id);
        $category = $news->getCategory('category', 'news');

        if (empty($editNew)) {
            header('Location: /admin/news');
        }

        //редактирование
        if (isset($_POST['btn_edit'])) {
            $title = clearStr($_POST['title']);
            $category = $_POST['category'];
            $desc = clearStr($_POST['desc']);
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);
            $showSlider = $_POST['show_slider'];


            if ($title == '') $_SESSION['error']['title'] = 'Введите название новости';
            if ($category == '0') $_SESSION['error']['category'] = 'Выберите категорию';
            if ($desc == '') $_SESSION['error']['desc'] = 'Введите текст новости';
            if ($m_desc == '') $_SESSION['error']['m_desc'] = 'Заполните Мета-тег Description';
            if ($m_keywords == '') $_SESSION['error']['m_keywords'] = 'Заполните Мета-тег Keywords';

            if ($title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {

                //редактирование новости в БД
                $news->edit('news', $id, ['category' => $category, 'title' => $title, 'desc' => $desc,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/news');
            }
        }

        $this->setVars(['editNew' => $editNew, 'categories' => $category]);
    }
}