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

        $arrNew = $news->getAllByAdmin();
        $arrNew = editNewDateArray($arrNew);

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrNew)) {
            foreach ($arrNew as &$News){
                $News['views'] = $views->getSumViewsByTable('news', $News['num_id']);
                $News['comments'] = $comments->getCommentsCountByTable('news', $News['num_id']);
            }
        }
        $countComments = $comments->countCommentsByAdmin();


        $this->setVars(['news' => $arrNew, 'cComment' => $countComments]);
    }

    public function addAction()
    {
        $news = new News();
        $comments = new Comment();

        /**
         * выбираем категории для добавления новости
         */
        $arrCategory = $news->getCategory('category', 'news');

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
            // проверка файла на допустимый размер, формат и выбран ли вообще файл
            $check = canUploadFile($file);
            if ($check !== true) $_SESSION['error']['file'] = $check;


            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                //загрузка файла на сервер
                $file_name = uploadFile($file, PATH_IMAGE);
                // end

                //добавление новости в БД
                $news->add('news', ['category' => $category, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/news');
            }
        }

        $countComments = $comments->countCommentsByAdmin();

        $this->setVars(['categories' => $arrCategory, 'cComment' => $countComments]);
    }

    /**
     * удаление новости
     */
    public function deleteAction()
    {
        $news = new News();

        $id = $this->route['id'];
        $img = $news->getNameImageByTable($id);

        $news->delete('news', $id);
        if (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$img)){
            unlink($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$img);
        }
        header('Location: /admin/news');
        die();
    }

    /**
     * редактирование новости
     */
    public function editAction()
    {
        $news = new News();
        $comments = new Comment();

        $id = $this->route['id'];

        $editNew = $news->getDetailByEdit($id);
        $category = $news->getCategory('category', 'news');

        if (empty($editNew)) {
            header('Location: /admin/news');
            die();
        }

        //редактирование
        if (isset($_POST['btn_edit'])) {
            $file = $_FILES['add_image'];
            $title = clearStr($_POST['title']);
            $categor = $_POST['category'];
            $desc = $_POST['desc'];
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);
            $showSlider = $_POST['show_slider'];


            if ($title == '') $_SESSION['error']['title'] = 'Введите название новости';
            if ($categor == '0') $_SESSION['error']['category'] = 'Выберите категорию';
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
                $file_name = $editNew['image'];
            }


            if ($check === true && $title != '' && $categor != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                if ($f === true) {
                    // т.к загружаем новый файл, удаляем старый файл
                    if (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$editNew['image'])) {
                        unlink($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$editNew['image']);
                    }

                    //загрузка файла на сервер
                    $file_name = uploadFile($file, PATH_IMAGE);
                    // end
                }
                //редактирование новости в БД
                $news->edit('news', $id, ['category' => $categor, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => $showSlider]);
                header('Location:/admin/news');
            }
        }

        $countComments = $comments->countCommentsByAdmin();

        $this->setVars(['editNew' => $editNew, 'categories' => $category, 'cComment' => $countComments]);
    }
}