<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Новости</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/news">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                    <li class="category-news_item"><a href="/news/category/<?=$category['code']?>"><?=$category['title']?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / Новости</p>
            </div>

            <div class="article-news-title">
                <h1>Игровые новости</h1>
            </div>

            <div class="article-news">
                <? if(!empty($allNews)): ?>
                <? foreach ($allNews as $new): ?>
                <div class="col-12 article-new">
                    <div class="row">
                        <div class="col-4">
                            <a href="news/detail/<?=$new['num_id']?>">
                                <? if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/images/upload_file/'.$new['image'])): ?>
                                <img src="/public/images/upload_file/<?=$new['image']?>" class="article-new__img" alt="<?=$new['image']?>">
                                <? else: ?>
                                <img src="/public/images/photo/no-image.jpg" class="article-new__img" alt="<?=$new['image']?>">
                                <? endif; ?>
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="article__new">
                                <div class="article-new__name">
                                    <a href="news/detail/<?=$new['num_id']?>"><?=$new['title']?></a>
                                </div>
                                <div class="article-new__info">
                                    <span class="article-new__info--date"><?=$new['date']?></span>
                                    <span class="article-new__info--comment"><i class="fa fa-comment-o" aria-hidden="true"></i><?=$new['comments']?></span>
                                </div>
                                <div class="article-new__tags">
                                    <span><?=$new['cat_title']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? endforeach; ?>
                <? endif; ?>

                <div class="block-pagination">
                    <?=$pagination;?>
                </div>

            </div>
        </div>
    </div>
</div>