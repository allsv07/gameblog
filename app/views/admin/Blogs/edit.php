<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / <a href="/admin/blogs">Блоги</a> / Редактирование блога</span>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
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

            <label for="title_news">Название блога</label>
            <input type="text" name="title" id="title_news" class="title_news" value="<?=(isset($editBlog['title'])) ? $editBlog['title'] : '' ?>">

            <div class="block_desc">
                <label for="desc_news">Описание блога</label>
                <textarea name="desc" id="desc_news" ><?=$editBlog['description']?></textarea>
                <script>
                    CKEDITOR.replace( 'desc_news' );
                </script>
            </div>


            <label for="add_image">Изображение блога</label>
            <img style="width: 100px;" src="<?=PATH_IMAGE?>/<?=$editBlog['image']?>" alt="">
            <input type="file" class="image_title" name="add_image" src="" alt="">

            <label for="meta_desc">Мета-тег Description:</label>
            <textarea name="meta_desc" id="meta_desc"><?=$editBlog['meta_desc']?></textarea>

            <label for="meta_keywords">Мета-тег Keywords:</label>
            <textarea name="meta_keywords" id="meta_keywords"><?=$editBlog['meta_keywords']?></textarea>

            <input type="submit" name="btn_edit" class="btn_add" value="Сохранить">
        </form>
    </div>
</div>