<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / <a href="/admin/admins">Администарторы</a> / Добавление Администратора</span>
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <form action="" class="form_add" method="POST" enctype="multipart/form-data">
            <?if (isset($_SESSION['error'])):?>
                <div class="block_error">
                    <? foreach ($_SESSION['error'] as $error): ?>
                        <span class="error"><?=$error;?></span><br>
                    <? endforeach; ?>
                </div>
                <?unset($_SESSION['error'])?>
            <?endif;?>

            <label for="title_news">Логин</label>
            <input type="text" name="login" id="title_news" class="title_news" value="<?=(isset($_POST['login'])) ? $_POST['login'] : '' ?>">

            <label for="title_news">Пароль</label>
            <input type="password" name="pass" id="title_news" class="title_news">

            <label for="meta_desc">Имя</label>
            <input type="text" name="name" class="title_news" id="title_news" value="<?=(isset($_POST['name'])) ? $_POST['name'] : '' ?>">

            <label for="meta_keywords">e-mail</label>
            <input type="text" name="email" class="title_news" id="title_news" value="<?=(isset($_POST['email'])) ? $_POST['email'] : '' ?>">

            <input type="submit" name="btn_add" class="btn_add" value="Добавить">
        </form>
    </div>
</div>