<div class="container">
    <div class="row main-content">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar-article sidebar">
            <span class="sidebar-title">Читы</span>
            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/cheats">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                    <li class="category-news_item"><a href="/cheats/category/<?= $category['code'] ?>"><?= $category['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="">Главная</a> / <a href="/cheats">Читы</a> / <?= $detailCheat['title'] ?></p>
            </div>

            <div class="article-header">
                <h1 class="article-title"><?= $detailCheat['title'] ?></h1>
            </div>

            <div class="article-info">
                <div class="article-info-author">
                    <div class="image_author">
                        <img src="<?=PATH_AVATAR?>/<?=$detailCheat['u_img']?>" alt="author image">
                    </div>
                    <span class="name-author"><a><?= $detailCheat['login'] ?></a></span>

                </div>
                <div class="article-info-date">
                    <span><?= $detailCheat['date'] ?></span>
                </div>
                <div class="article-info-comments">
                    <i class="fa fa-comment-o" aria-hidden="true"></i><span><?= $detailCheat['comments'] ?></span>
                </div>
                <div class="article-info-views">
                    <i class="fa fa-eye" aria-hidden="true"></i><span><?= $detailCheat['views'] ?></span>
                </div>
            </div>

            <div class="col-md-12 article-img">
                <img src="<?=PATH_IMAGE?>/<?=$detailCheat['t_img']?>" alt="">
            </div>
            <div class="article-description">
                <p><?= $detailCheat['description'] ?></p>
            </div>

            <div class="article-comments">
                <? if (!empty($comments)): ?>
                <h3>Коментарии (<?=count($comments) ?>)</h3>
                <? foreach ($comments as $comment): ?>
                <div class="block-comment">
                    <div class="block-author">
                        <div class="block-author-image">
                            <img src="<?=PATH_AVATAR?>/<?=$comment['image']?>" alt="author image">
                        </div>
                        <span class="block-author-name"><?= $comment['author'] ?></span>
                        <span class="block-author-date"><?= $comment['date'] ?></span>
                    </div>
                    <div class="block-text-comment">
                        <p><?= $comment['text'] ?></p>
                    </div>
                </div>
                <? endforeach; ?>
                <? else: ?>
                <h3>Комментариев нет</h3>
                <? endif; ?>

            </div>

            <div class="article-form-comment">
                <span class="success"><?=(isset($_SESSION['success-comment'])) ? $_SESSION['success-comment'] : ''; unset($_SESSION['success-comment']);?></span>
                <form action="" class="form" method="post">
                    <label class="error-label">Заполните поля</label>
                    <? if (!isset($_SESSION['user']['login'])): ?>
                        <span class="not_comment">Комментарии могут оставлять только зарегистрированные пользователи</span>
                        <label class="qw" for="text_comment">Введите текст комментария</label>
                        <textarea disabled name="text_comment" id="text_comment" class="text_comment"></textarea>
                    <? else: ?>
                        <label class="qw" for="text_comment">Введите текст комментария</label>
                        <textarea name="text_comment" id="text_comment" class="text_comment"></textarea>
                        <input type="submit" name="add_comment" class="add_comment" id="submit" value="Опубликовать">
                    <? endif; ?>
                </form>
            </div>

        </div>

    </div>
</div>