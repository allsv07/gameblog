<?php


namespace app\controllers\admin;



use app\models\Article;
use app\models\Blog;
use app\models\Cheat;
use app\models\News;
use app\models\User;

class MainController extends AppController
{

    public function loginAction()
    {
        $this->layout = 'admin_login';
        $user = new User();

        if (isset($_POST['admin_login']) && isset($_POST['admin_pass'])) {

            if ($_POST['admin_login'] != '' && $_POST['admin_pass'] != '') {

                $login = clearStr($_POST['admin_login']);
                $pass = $_POST['admin_pass'];

                $id = $user->auth($login, $pass);

                if ($id !== false) {
                    $user->login($id);
                    header('Location: /admin');
                    die();
                }
                else {
                    $_SESSION['error'] = 'не верный логин/пароль';
                }
            }
            else {
                $_SESSION['error'] = 'не указаны логин/пароль';
            }
        }

    }

    public function indexAction()
    {
        $news = new News();
        $articles = new Article();
        $blogs = new Blog();
        $cheats = new Cheat();


        /**
         * получаем количество всех блоков (новости, статьи и т.д) на сайте
         */
        $countNews = $news->count();
        $countArticles= $articles->count();
        $countBlogs= $blogs->count();
        $countCheats = $cheats->count();


        $this->setVars(['news' => $countNews, 'articles' => $countArticles, 'blogs' => $countBlogs, 'cheats' => $countCheats]);
    }
}