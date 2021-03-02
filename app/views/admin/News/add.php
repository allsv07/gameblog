<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / <a href="/admin/news">Новости</a> / Добавление новости</span>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <form action="" class="form_add" method="POST" enctype="multipart/form-data">
            <?if (isset($_SESSION['error'])):?>
            <div class="block_error">
                <? foreach ($_SESSION['error'] as $error): ?>
                <span class="error"><?= $error; ?></span><br>
                <? endforeach; ?>
            </div>
            <?unset($_SESSION['error'])?>
            <?endif;?>

            <label for="title_news">Название новости</label>
            <input type="text" name="title" id="title_news" class="title_news" value="<?=(isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : '';?>">

            <label for="cat_news">Выберите категорию</label>
            <select name="category" id="category">
                <? foreach ($categories as $category): ?>
                <option name="cat" value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <? endforeach; ?>
            </select>
            <div class="block_desc">
                <label for="desc_news">Описание новости</label>
                <textarea name="desc" id="desc_news"><?=(isset($_POST['desc']) && $_POST['desc'] != '') ? $_POST['desc'] : '';?></textarea>
                <script>
                    CKEDITOR.replace( 'desc_news' );
                </script>

            </div>


            <label for="add_image">Изображение новости</label>
            <input type="file" class="image_title" name="add_image" src="" alt="">

            <label for="meta_desc">Мета-тег Description:</label>
            <textarea name="meta_desc" id="meta_desc"><?=(isset($_POST['meta_desc']) && $_POST['meta_desc'] != '') ? $_POST['meta_desc'] : '';?></textarea>

            <label for="meta_keywords">Мета-тег Keywords:</label>
            <textarea name="meta_keywords" id="meta_keywords"><?=(isset($_POST['meta_keywords']) && $_POST['meta_keywords'] != '') ? $_POST['meta_keywords'] : '';?></textarea>

            <label for="show_slider">Показывать в разделе "Главное сегодня"</label>
            <select name="show_slider" id="show_slider">
                <option value="0">Отключено</option>
                <option value="1">Включено</option>
            </select>

            <input type="submit" name="btn_add" class="btn_add" value="Добавить">
        </form>
    </div>
</div>