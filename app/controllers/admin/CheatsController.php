<?php


namespace app\controllers\admin;


use app\models\Cheat;
use app\models\Comment;
use app\models\View;

class CheatsController extends AppController
{
    public function indexAction()
    {
        $cheats = new Cheat();
        $views = new View();
        $comments = new Comment();

        $arrCheat = $cheats->getAllByAdmin();

        /**
         * добавляем в массив поля кол-во просмотров и комментариев
         */
        if (!empty($arrCheat)) {
            foreach ($arrCheat as &$Cheats){
                $Cheats['views'] = $views->getSumViewsByTable('cheats', $Cheats['num_id']);
                $Cheats['comments'] = $comments->getCommentsCountByTable('cheats', $Cheats['num_id']);
            }
        }


        $this->setVars(['cheats' => $arrCheat]);
    }


    /**
     * добавление блога
     */
    public function addAction()
    {
        $cheats = new Cheat();

        /**
         * выбираем категории для добавления статьи
         */
        $arrCategory = $cheats->getCategory('category', 'cheats');

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
                $cheats->add('cheats',['category' => $category, 'title' => $title, 'desc' => $desc, 'image' => $file_name,
                    'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => '0']);
                header('Location:/admin/cheats');
            }
        }

        $this->setVars(['categories' => $arrCategory]);
    }


    public function deleteAction()
    {
        $cheats = new Cheat();

        $id = $this->route['id'];

        $cheats->delete('cheats', $id);
        header('Location: /admin/cheats');
        die();
    }


    /**
     * редактирование статьи
     */
    public function editAction()
    {
        $cheats = new Cheat();
        $id = $this->route['id'];

        $editCheat = $cheats->getDetailByEdit($id);
        $arrCategory = $cheats->getCategory('category', 'cheats');

        if (empty($editCheat)) {
            header('Location: /admin/cheats');
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
                $file_name = $editCheat['image'];
            }

            if ($check === true && $title != '' && $category != '0' && $desc != '' && $m_desc != '' && $m_keywords != '') {
                if ($f === true) {
                    //загрузка файла на сервер
                    $file_name = $this->uploadFile($file);
                    // end
                }
                //редактирование новости в БД
                $cheats->edit('cheats', $id, ['category' => $category, 'title' => $title, 'desc' => $desc,
                    'image' => $file_name, 'm_desc' => $m_desc, 'm_keywords' => $m_keywords, 'show' => '0']);
                header('Location:/admin/cheats');
            }
        }

        $this->setVars(['editCheat' => $editCheat, 'categories' => $arrCategory]);
    }
}