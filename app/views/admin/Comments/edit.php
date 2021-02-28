<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / <a href="/admin/comments">Комментарии</a></span>
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

            <label for="title_news">Автор</label>
            <input type="text" name="author" id="title_news" class="title_news" disabled value="<?=$comments['author']?>">

            <div class="block_desc">
                <label for="desc_news">Текст комментария</label>
                <textarea disabled name="comment" id="desc_news" ><?=$comments['comment']?></textarea>
                <script>
                    CKEDITOR.replace( 'desc_news' );
                </script>
            </div>

            <label for="title_news">Прокоментированная запись</label>
            <input disabled type="text" name="title_comment" id="title_news" class="title_news" value="<?=$comments['title']?>">

            <label for="title_news">Дата</label>
            <input disabled type="text" name="date_comment" id="title_news" class="title_news" value="<?=$comments['date']?>">

            <label for="show_slider">Статус</label>
            <select name="show_comment" id="show_slider">
                <? if ($comments['active'] == 1): ?>
                    <option selected value="1">Включено</option>
                    <option value="0">Отключено</option>
                <? endif; ?>
                <? if ($comments['active'] == 0): ?>
                    <option selected value="0">Отключено</option>
                    <option value="1">Включено</option>
                <? endif; ?>

            </select>

            <input type="submit" name="btn_edit" class="btn_add" value="Сохранить">
        </form>
    </div>
</div>