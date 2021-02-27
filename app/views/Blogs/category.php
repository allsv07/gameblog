<?php

?>
<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Блоги</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/blogs">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                        <li class="category-news_item"><a href="/blogs/category/<?= $category['code'] ?>" class="active"><?= $category['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / <a href="/blogs">Блоги</a> / <?=$breadcrumb;?></p>
            </div>

            <div class="article-news-title">
                <h1>Блоги</h1>
            </div>

            <div class="article-news">
                <div class="row">
                    <? if (!empty($blogs)): ?>
                        <? foreach ($blogs as $blog): ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chit-post">
                                <a href="/blogs/detail/<?= $blog['b_id'] ?>">
                                    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/images/upload_file/'.$blog['image'])): ?>
                                        <img src="/public/images/upload_file/<?=$blog['image']?>" class="chit-post__img" alt="<?=$blog['image']?>">
                                    <? else: ?>
                                        <img src="/public/images/photo/no-image.jpg" class="chit-post__img" alt="<?=$blog['image']?>">
                                    <? endif; ?>
                                    <div class="chit-post__name">
                                        <a href="/cheats/detail/<?= $blog['b_id'] ?>"><?= $blog['title'] ?></a>
                                    </div>
                                    <div class="chit-post__info">
                                        <div class="tags"><span><?=$blog['cat_title']?></span></div>
                                        <div class="day"><span><?= $blog['date'] ?></div>
                                        <div class="comments"><span><i class="fa fa-comment-o" aria-hidden="true"></i><?= $blog['comments'] ?></span></div>
                                    </div>

                                </a>
                            </div>
                        <? endforeach; ?>
                    <? else: ?>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>