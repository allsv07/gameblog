<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / <a href="/admin/admins">Администарторы</a> / Редактирование Администратора</span>
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
            <input type="text" name="login" id="title_news" class="title_news" value="<?=(isset($user['login'])) ? $user['login'] : '' ?>">

            <label for="add_image">Аватар</label>
            <img style="width: 100px;" src="<?=PATH_AVATAR?>/<?=$user['image']?>" alt="">
            <input type="file" class="image_title" name="add_image" src="" alt="">

            <label for="role-user">Категория пользователя</label><br>
            <select name="role-user" id="role-user">
                <? if ($user['role'] == 'admin'): ?>
                    <option value="admin" selected>Администратор</option>
                    <option value="user">Пользователь</option>
                <? endif; ?>
                <? if ($user['role'] == 'user'): ?>
                    <option value="admin">Администратор</option>
                    <option value="user" selected>Пользователь</option>
                <? endif; ?>
            </select>

            <label for="meta_desc">Имя</label>
            <input type="text" name="name" class="title_news" id="title_news" value="<?=(isset($user['name'])) ? $user['name'] : '' ?>">

            <label for="meta_keywords">e-mail</label>
            <input type="text" name="email" class="title_news" id="title_news" value="<?=(isset($user['email'])) ? $user['email'] : '' ?>">

            <label for="meta_keywords">Дата регистрации</label>
            <input type="text" name="date" disabled class="title_news" id="title_news" value="<?=(isset($user['date'])) ? $user['date'] : '' ?>">

            <input type="submit" name="btn_edit" class="btn_add" value="Сохранить">
        </form>
    </div>
</div>