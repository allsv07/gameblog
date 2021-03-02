<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="/admin_lte/css/style-admin.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="/admin_lte/ckeditor4/ckeditor.js"></script>


    <title>Админ панель</title>
</head>

<body>
    <div class="container-fluid header">
        <div class="logo">
            <h1>GameBlog</h1>
        </div>
        <div class="menu">
            <ul>
                <li>Добро пожаловать: <a href="#"><strong><?= $_SESSION['admin']['login'] ?></strong></a></li>
                <li><a href="?logout=exit" title="Выйти">Выйти<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid block-admin-content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 sidebar">
                    <ul>
                        <li><a href="/admin">Главная</a></li>
                        <li><a href="/admin/news">Новости</a></li>
                        <li><a href="/admin/articles">Статьи</a></li>
                        <li><a href="/admin/blogs">Блоги</a></li>
                        <li><a href="/admin/cheats">Коды и прохождения игр</a></li>
                        <li class="comments_count_list">
                            <a href="/admin/comments">Комментарии</a>
                            <? if (isset($cComment) && $cComment > 0) :?>
                                <div class="comment_count">
                                    <span>+<?=$cComment;?></span>
                                </div>
                            <? endif; ?>
                        </li>
                        <li><a href="/admin/admins">Администраторы</a></li>
                        <li><a href="/admin/users">Пользователи</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 block-content">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>


    <script>
        function confirmDelete() {
            if (confirm("Вы подтверждаете удаление?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <script src="https://use.fontawesome.com/527ae61881.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>