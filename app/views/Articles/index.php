
<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Новости</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/articles">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                        <li class="category-news_item"><a href="/articles/category/<?=$category['code']?>"><?=$category['title']?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / Статьи</p>
            </div>

            <div class="article-news-title">
                <h1>Игровые статьи</h1>
            </div>

            <div class="article-news">
                <? if (count($allArticles) > 0): ?>
                <? foreach ($allArticles as $article): ?>
                    <div class="col-12 article-new">
                        <div class="row">
                            <div class="col-4">
                                <a href="articles/detail/<?=$article['a_id']?>">
                                    <img src="images/photo/hitman_3-4.jpg" class="article-new__img" alt="">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="article__new">
                                    <div class="article-new__name">
                                        <a href="articles/detail/<?=$article['a_id']?>"><?=$article['title']?></a>
                                    </div>
                                    <div class="article-new__info">
                                        <span class="article-new__info--date"><?=$article['date']?></span>
                                        <span class="article-new__info--comment"><i class="fa fa-comment-o" aria-hidden="true"></i><?=$article['comments']?></span>
                                    </div>
                                    <div class="article-new__tags">
                                        <span><?=$article['cat_title']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
                <? endif; ?>

            </div>
        </div>
    </div>
</div>
