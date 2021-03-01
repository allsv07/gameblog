
<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Статьи</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/articles" class="active">Все</a></li>
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
                                <a href="articles/detail/<?=$article['num_id']?>">
                                    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$article['image'])): ?>
                                        <img src="<?=PATH_IMAGE?>/<?=$article['image']?>" class="article-new__img" alt="<?=$article['image']?>">
                                    <? else: ?>
                                        <img src="<?=NO_IMG?>" class="article-new__img" alt="<?=$article['image']?>">
                                    <? endif; ?>
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="article__new">
                                    <div class="article-new__name">
                                        <a href="articles/detail/<?=$article['num_id']?>"><?=$article['title']?></a>
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
                <? else: ?>
                    <span class="no-records">Статей еще нет. Но скоро появятся!</span>
                <? endif; ?>
                <div class="block-pagination">
                    <?=$pagination;?>
                </div>
            </div>
        </div>
    </div>
</div>
