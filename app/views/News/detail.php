
<div class="container">
    <div class="row main-content">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar-article">
            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/news">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                        <li class="category-news_item"><a href="<?=$category['id']?>"><?=$category['title']?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="">Главная</a> / <a href="/news">Новости</a> / <?=$detailNew['title']?></p>
            </div>

            <div class="article-header">
                <h1 class="article-title"><?=$detailNew['title']?></h1>
            </div>

            <div class="article-info">
                <div class="article-info-author">
                    <div class="image_author">
                        <img src="/images/photo/control-5.jpg" alt="author image">
                    </div>
                    <span class="name-author"><a href="#">Author Name</a></span>
                </div>
                <div class="article-info-date">
                    <span><?=$detailNew['date']?></span>
                </div>
                <div class="article-info-comments">
                    <i class="fa fa-comment-o" aria-hidden="true"></i><span><?=$detailNew['comments']?></span>
                </div>
                <div class="article-info-views">
                    <i class="fa fa-eye" aria-hidden="true"></i><span><?=$detailNew['views']?></span>
                </div>
            </div>

            <div class="article-description">
                <p><?=$detailNew['description']?></p>
            </div>

            <div class="article-comments">
                <? if (count($arrComments) > 0): ?>
                <h3>Коментарии (<?=count($arrComments)?>)</h3>
                 <? foreach ($arrComments as $comment): ?>
                 <div class="block-comment">
                    <div class="block-author">
                        <div class="block-author-image">
                            <img src="/images/photo/cyberpunk_2077-17.jpg" alt="author image">
                        </div>
                        <span class="block-author-name"><?=$comment['author']?></span>
                        <span class="block-author-date"><?=$comment['date']?></span>
                    </div>
                    <div class="block-text-comment">
                        <p><?=$comment['text']?></p>
                    </div>
                 </div>
                 <? endforeach; ?>
                <? else: ?>
                    <h3>Комментариев нет</h3>
                <? endif; ?>

            </div>

            <div class="article-form-comment">
                <form action="" class="form" method="post">
                    <label class="error">Заполните поле</label>
                    <textarea name="text_comment" id="text_comment" class="text_comment"></textarea>
                    <input type="submit" name="add_comment" class="add_comment" id="submit" value="Опубликовать">
                </form>
            </div>

        </div>

    </div>
</div>