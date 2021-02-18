<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Game Blog</title>

</head>
<body class="blog_container">

<div class="container-fluid">
    <div class="row header">
        <div class="col-md-2 col-sm-12 col-12 logo">
            <a href="/"><h1>GameBlog</h1></a>
        </div>
        <div class="col-md-8 col-sm-12 col-12">
            <nav class="main-nav">
                <a class="item" href="#"><span>Игры</span></a>
                <a class="item" href="/news"><span>Новости</span></a>
                <a class="item" href="/articles"><span>Статьи</span></a>
                <a class="item" href="#"><span>Блоги</span></a>
                <a class="item" href="#"><span>Галерея</span></a>
                <a class="item" href="#"><span>Помощь</span></a>
            </nav>
        </div>
        <div class="col-md-2 col-sm-12 col-12 auth">
            <a class="link_auth" href="#"><i class="fa fa-user" aria-hidden="true"></i><span>Войти</span></a>
        </div>
    </div>
</div>

<?=$content?>

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



<script src="https://use.fontawesome.com/527ae61881.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="/script.js"></script>
</body>
</html>
