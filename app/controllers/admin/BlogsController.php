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

        $arrBlogs = $blogs->getAllBlogs();
        $arrBlogs = editNewDateArray($arrBlogs);

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrBlogs)) {
            foreach ($arrBlogs as &$Blogs){
                $Blogs['views'] = $views->getSumViewsByTable('blogs', $Blogs['num_id']);
                $Blogs['comments'] = $comments->getCommentsCountByTable('blogs', $Blogs['num_id']);
            }
        }

        $countComments = $comments->countCommentsByAdmin();
        $this->setVars(['blogs' => $arrBlogs, 'cComment' => $countComments]);
    }


    /**
     * добавление блога
     */
    public function addAction()
    {
        $blogs = new Blog();
        $comments = new Comment();

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
            $desc = $_POST['desc'];
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);


            if ($title == '') $_SESSION['error']['title'] = 'Введите название статьи';
            if ($desc == '') $_SESSION['error']['desc'] = 'Введите текст статьи';
            if ($m_desc == '') $_SESSION['error']['m_desc'] = 'Заполните Мета-тег Description';
            if ($m_keywords == '') $_SESSION['error']['m_keywords'] = 'Заполните Мета-тег Keywords';
            // проверка файла на допустимый размер, формат и выбран ли вообще файл
            $check = canUploadFile($file);
            if ($check !== true) $_SESSION['error']['file'] = $check;


            if ($check === true && $title != '' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                //загрузка файла на сервер
                $file_name = uploadFile($file, PATH_IMAGE);
                // end

                //добавление новости в БД
                $blogs->addBlog('blogs',['title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => '0']);
                header('Location:/admin/blogs');
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
        $blogs = new Blog();

        $id = $this->route['id'];
        $img = $blogs->getNameImageByTable($id);

        $blogs->delete('blogs', $id);
        if (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$img)){
            unlink($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$img);
        }
        header('Location: /admin/blogs');
        die();
    }


    /**
     * редактирование статьи
     */
    public function editAction()
    {
        $blogs = new Blog();
        $comments = new Comment();

        $id = $this->route['id'];

        $editBlog = $blogs->getDetailBlogByEdit($id);
        //$arrCategory = $blogs->getCategory('category', 'blogs');

        if (empty($editBlog)) {
            header('Location: /admin/blogs');
        }


        //редактирование
        if (isset($_POST['btn_edit'])) {
            $file = $_FILES['add_image'];
            $title = clearStr($_POST['title']);
            $desc = $_POST['desc'];
            $m_desc = clearStr($_POST['meta_desc']);
            $m_keywords = clearStr($_POST['meta_keywords']);


            if ($title == '') $_SESSION['error']['title'] = 'Введите название новости';
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
                $file_name = $editBlog['image'];
            }

            if ($check === true && $title != '' && $desc != '' && $m_desc != '' && $m_keywords != '') {

                if ($f === true) {
                    // т.к загружаем новый файл, удаляем старый файл
                    if (file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$editBlog['image'])) {
                        unlink($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$editBlog['image']);
                    }

                    //загрузка файла на сервер
                    $file_name = uploadFile($file, PATH_IMAGE);
                    // end
                }
                //редактирование новости в БД
                $blogs->edit('blogs', $id, ['title' => $title, 'desc' => $desc,
                    'image' => $file_name, 'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => '0']);
                header('Location:/admin/blogs');
            }
        }

        $countComments = $comments->countCommentsByAdmin();
        $this->setVars(['editBlog' => $editBlog, 'cComment' => $countComments]);
    }
}