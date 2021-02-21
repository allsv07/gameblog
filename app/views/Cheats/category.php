<?php

?>
<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Читы</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/cheats">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                    <li class="category-news_item"><a href="/cheats/category/<?= $category['code'] ?>" class="active"><?= $category['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / <a href="/cheats">Читы</a> / <?=$breadcrumb;?></p>
            </div>

            <div class="article-news-title">
                <h1>КОДЫ И ПРОХОЖДЕНИЯ ИГР</h1>
            </div>

            <div class="article-news">
                <div class="row">
                    <? if (count($cheats) >= 1): ?>
                    <? foreach ($cheats as $cheat): ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chit-post">
                        <a href="/cheats/detail/<?= $cheat['ch_id'] ?>">
                            <img src="/images/photo/NFSR3.jpg" class="chit-post__img" alt="">
                            <div class="chit-post__name">
                                <a href="/cheats/detail/<?= $cheat['ch_id'] ?>"><?= $cheat['title'] ?></a>
                            </div>
                            <div class="chit-post__info">
                                <div class="tags"><span>Советы и тактика</span></div>
                                <div class="day"><span><?= $cheat['date'] ?></div>
                                <div class="comments"><span><i class="fa fa-comment-o" aria-hidden="true"></i><?= $cheat['comments'] ?></span></div>
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