<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css">
    <!-- css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title><?= $title; ?></title>

</head>

<body class="blog_container">

    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-2 col-sm-12 col-12 logo">
                <a href="/">
                    <h1>GameBlog</h1>
                </a>
            </div>
            <div class="col-md-8 col-sm-12 col-12">
                <nav class="main-nav">
                    <a class="item" href="#"><span>Игры</span></a>
                    <a class="item" href="/news"><span>Новости</span></a>
                    <a class="item" href="/articles"><span>Статьи</span></a>
                    <a class="item" href="#"><span>Блоги</span></a>
                    <a class="item" href="#"><span>Галерея</span></a>
                    <a class="item" href="/cheats"><span>Читы</span></a>
                </nav>
            </div>
            <div class="col-md-2 col-sm-12 col-12 auth">
                <!--            <a class="link_auth" href="#"><i class="fa fa-user" aria-hidden="true"></i><span>Войти</span></a>-->
                <? if (isset($_SESSION['user']['login'])): ?>
                    <a href="#" class="auth-user_login"><?=$_SESSION['user']['login']?></a>
                    <a href="?logout=exit" class="exit-user_login" >выйти</a>
                <? else: ?>
                    <a type="button" class="link_auth" data-toggle="modal" data-target="#authModal">Войти</a>
                <? endif; ?>
            </div>
        </div>
    </div>

    <?= $content ?>

    <footer>
        <div class="container-fluid">
            <div class="row footer-fluid">
                <div class="container">
                    <div class="row footer">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 block-left">
                                    <h2>Игровой блог GameBlog</h2>
                                    <span>Копирование материалов разрешено только с указанием активной ссылки на первоисточник.</span>
                                    <span>По любым вопросам обращайтесь в telegram или на почту.</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 bottom-menu">
                                    <ul>
                                        <li><a href="#">Главная</a></li>
                                        <li><a href="#">Игры</a></li>
                                        <li><a href="#">Новости</a></li>
                                        <li><a href="#">Статьи</a></li>
                                        <li><a href="#">Блоги</a></li>
                                        <li><a href="#">Галерея</a></li>
                                        <li><a href="#">Помощь</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row social">
                                <ul>
                                    <a href="#">
                                        <li class="icon-youtube">
                                            <div class="block-social"><i class="fa fa-youtube-play" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-vk">
                                            <div class="block-social"><i class="fa fa-vk" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-facebook">
                                            <div class="block-social"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-twitter">
                                            <div class="block-social"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-telegram">
                                            <div class="block-social"><i class="fa fa-telegram" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-instagram">
                                            <div class="block-social"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-steam">
                                            <div class="block-social"><i class="fa fa-steam" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="icon-twitch">
                                            <div class="block-social"><i class="fa fa-twitch" aria-hidden="true"></i></div>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Вход на Game Blog</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="bloc_auth-user">

                        <form action="" method="" id="ajax-form" class="auth-form">
                            <input type="text" class="login" name="login_user" id="auth-login" placeholder="Логин">
                            <input type="password" class="pass" name="pass_user" id="auth-pass" placeholder="Пароль">
                            <input type="button" id="btn-auth" class="btn_auth" value="Войти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://use.fontawesome.com/527ae61881.js"></script>
    <script src="/libs/jQuery.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.js"></script>
    <script src="/script.js"></script>
</body>

</html>