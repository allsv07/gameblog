<?php


namespace app\controllers\admin;


use app\models\Blog;
use app\models\Comment;
use app\models\View;

class BlogsController extends AppController
{
    public function indexAction()
    {
        $blogs = new Blog();
        $views = new View();
        $comments = new Comment();

        $arrBlogs = $blogs->getAllByAdmin();

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrBlogs)) {
            foreach ($arrBlogs as &$Blogs){
                $Blogs['views'] = $views->getSumViewsByTable('blogs', $Blogs['num_id']);
                $Blogs['comments'] = $comments->getCommentsCountByTable('blogs', $Blogs['num_id']);
            }
        }


        $this->setVars(['blogs' => $arrBlogs]);
    }


    /**
     * добавление блога
     */
    public function addAction()
    {
        $blogs = new Blog();

        /**
         * выбираем категории для добавления статьи
         */
        $arrCategory = $blogs->getCategory('category', 'blogs');

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
                $blogs->add('blogs',['category' => $category, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => '0']);
                header('Location:/admin/blogs');
            }
        }

        $this->setVars(['categories' => $arrCategory]);
    }

    /**
     * удаление статьи
     */
    public function deleteAction()
    {
        $blogs = new Blog();

        $id = $this->route['id'];

        $blogs->delete('articles', $id);
        header('Location: /admin/blogs');
        die();
    }


    /**
     * редактирование статьи
     */
    public function editAction()
    {
        $blogs = new Blog();
        $id = $this->route['id'];

        $editBlog = $blogs->getDetailByEdit($id);
        $arrCategory = $blogs->getCategory('category', 'blogs');

        if (empty($editBlog)) {
            header('Location: /admin/blogs');
        }


        //редактирование
        if (isset($_POST['btn_edit'])) {
            $file = $_FILES['add_image'];
            $title = clearStr($_POST['title']);
            $category = $_POST['category'];
            $desc = $_POST['desc'];
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);


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
                $file_name = $editBlog['image'];
            }

            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                if ($f === true) {
                    //загрузка файла на сервер
                    $file_name = $this->uploadFile($file);
                    // end
                }
                //редактирование новости в БД
                $blogs->edit('blogs', $id, ['category' => $category, 'title' => $title, 'desc' => $desc,
                    'image' => $file_name, 'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => '0']);
                header('Location:/admin/blogs');
            }
        }

        $this->setVars(['editBlog' => $editBlog, 'categories' => $arrCategory]);
    }
}