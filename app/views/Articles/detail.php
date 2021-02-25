<div class="container">
    <div class="row main-content">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar-article sidebar">
            <span class="sidebar-title">Статьи</span>
            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/articles">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                    <li class="category-news_item"><a href="/articles/category/<?= $category['code'] ?>"><?= $category['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="">Главная</a> / <a href="/news">Новости</a> / <?= $detailArticle['title'] ?></p>
            </div>

            <div class="article-header">
                <h1 class="article-title"><?= $detailArticle['title'] ?></h1>
            </div>

            <div class="article-info">
                <div class="article-info-author">
                    <div class="image_author">
                        <img src="/images/user/<?= $detailArticle['u_img'] ?>" alt="<?= $detailArticle['name'] ?>">
                    </div>
                    <span class="name-author"><a href="#"><?= $detailArticle['name'] ?></a></span>
                </div>
                <div class="article-info-date">
                    <span><?= $detailArticle['date'] ?></span>
                </div>
                <div class="article-info-comments">
                    <i class="fa fa-comment-o" aria-hidden="true"></i><span><?= $detailArticle['comments'] ?></span>
                </div>
                <div class="article-info-views">
                    <i class="fa fa-eye" aria-hidden="true"></i><span><?= $detailArticle['views'] ?></span>
                </div>
            </div>

            <div class="article-description">
                <p><?= $detailArticle['description'] ?></p>
            </div>
            <div class="article-comments">
                <? if (!empty($comments)): ?>
                <h3>Коментарии (<?= count($comments) ?>)</h3>
                <? foreach ($comments as $comment): ?>
                <div class="block-comment">
                    <div class="block-author">
                        <div class="block-author-image">
                            <img src="/images/photo/cyberpunk_2077-17.jpg" alt="author image">
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
                <form action="" class="form" method="post">
                    <label class="error-label">Заполните поля</label>
                    <? if (!isset($_SESSION['user']['login'])): ?>
                    <label class="qw" for="author_comment">Введите имя</label>
                    <input type="text" id="author_comment" class="author_comment" name="author_comment">
                    <? endif; ?>
                    <label class="qw" for="text_comment">Введите текст комментария</label>
                    <textarea name="text_comment" id="text_comment" class="text_comment"></textarea>
                    <input type="submit" name="add_comment" class="add_comment" id="submit" value="Опубликовать">
                </form>
            </div>

        </div>

    </div>
</div>