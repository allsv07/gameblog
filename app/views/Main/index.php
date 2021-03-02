<?php
//pr($mainToday);
?>
<div class="container">
    <div class="row span">
        <span>Главное сегодня</span>
    </div>
    <!-- Блок in-width: 800px -->
    <div class="row news-today">
        <? if (!empty($mainToday)): ?>
        <? foreach ($mainToday as $today): ?>
        <div class="article-today">
            <a href="<?=$today['tbl'].'/detail/'.$today['id']?>">
                <div class="cat">
                    <span><?=$today['category']?></span>
                </div>
                <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$today['image'])): ?>
                    <img src="<?=PATH_IMAGE?>/<?=$today['image']?>" class="article-img" alt="<?=$today['image']?>">
                <? else: ?>
                    <img src="<?=NO_IMG?>" class="article-img" alt="<?=$today['image']?>">
                <? endif; ?>
                <div class="article-today__text">
                    <span class="article-today__name"><?=$today['title']?></span>
                </div>
            </a>
        </div>
        <? endforeach; ?>
        <? endif; ?>
        <!-- <div class="article-today article-today__5">
            <img src="images/photo/cyberpunk_2077-18.jpg" class="article-img" alt="control-6">
        </div> -->
    </div>

    <!-- Слайдер max-width: 800px -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <? if (!empty($mainToday)): ?>
            <? foreach ($mainToday as $key => $today): ?>
            <li data-target="#carouselExampleCaptions" data-slide-to="<?=$key?>>"<? if ($key == 0): ?> class="active"><?endif;?></li>
            <? endforeach; ?>
            <? endif; ?>
        </ol>
        <div class="carousel-inner">
            <? if (!empty($mainToday)): ?>
            <? foreach ($mainToday as $key => $today): ?>
            <div class="carousel-item<? if ($key == 0): ?> active<?endif;?>" style="position: relative;">
                <div class="cat" style="position: absolute;">
                    <span><?=$today['category']?></span>
                </div>
                <a href="<?=$today['tbl'].'/detail/'.$today['id']?>">
                    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$today['image'])): ?>
                        <img src="<?=PATH_IMAGE?>/<?=$today['image']?>" class="d-block w-100" alt="<?=$today['image']?>">
                    <? else: ?>
                        <img src="<?=NO_IMG?>" class="d-block w-100" alt="<?=$today['image']?>">
                    <? endif; ?>

                    <div class="carousel-caption d-block d-md-block" style="background: #0e1417; opacity: 0.8">
                        <h5><?=$today['title']?></h5>
                    </div>
                </a>
            </div>
            <? endforeach; ?>
            <? endif; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Новости -->
    <div class="row span_light" style="margin-top: 20px;">
        <span>Игровые новости</span>
    </div>
    <div class="row game-news">
        <div class="col-md-8 beee">
            <? foreach ($lastNews as $new): ?>
            <div class="col-12 game-new">
                <div class="row">
                    <div class="col-4">
                        <a href="news/detail/<?=$new['id']?>">
                            <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$new['image'])): ?>
                                <img src="<?=PATH_IMAGE?>/<?=$new['image']?>" class="game-new__img" alt="<?=$new['image']?>">
                            <? else: ?>
                                <img src="<?=NO_IMG?>" class="game-new__img" alt="<?=$new['image']?>">
                            <? endif; ?>
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="game__new">
                            <div class="game-new__name">
                                <a href="news/detail/<?= $new['id'] ?>"><?= $new['title'] ?></a>
                            </div>
                            <div class="game-new__info">
                                <span class="game-new__info--date"><?= $new['date'] ?></span>
                                <span class="game-new__info--comment"><i class="fa fa-comment-o" aria-hidden="true"></i><?= $new['comments'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? endforeach; ?>

            <a href="/news" class="more-news">Больше новостей</a>
        </div>

        <!-- Популярное (sidebar) -->
        <div class="col-md-4 popular">
            <span>Популярное</span>
            <? foreach ($popularNews as $popular): ?>
            <a href="#">
                <div class="col-12 popular-new">
                    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$popular['image'])): ?>
                        <img src="<?=PATH_IMAGE?><?=$popular['image']?>" class="popular-new__img" alt="<?=$popular['image']?>">
                    <? else: ?>
                        <img src="<?=NO_IMG?>" class="popular-new__img" alt="<?=$popular['image']?>">
                    <? endif; ?>
                    <div class="popular-new__desc">
                        <div class="popular-new__desc--name">
                            <a href="news/detail/<?= $popular['id'] ?>">
                                <p><?= $popular['title'] ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
            <? endforeach; ?>

        </div>
    </div>

    <!-- Блоги -->
    <div class="row span_light">
        <span>Блоги по играм</span>
    </div>
    <div class="row blogs-on-games">
        <div class="col-12 blogs-on-games__game">
            <div class="row">
                <? foreach ($lastBlogs as $blog): ?>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 blog">
                    <a href="/blogs/detail/<?=$blog['id']?>">
                        <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$blog['image'])): ?>
                            <img src="<?=PATH_IMAGE?>/<?$blog['image']?>" class="blog__img" alt="">
                        <? else: ?>
                            <img src="<?=NO_IMG?>" class="blog__img" alt="<?=$blog['image']?>">
                        <? endif; ?>
                        <div class="eyes"><span><i class="fa fa-eye" aria-hidden="true"></i><?= $blog['views'] ?></span></div>
                    </a>
                    <div class="blog-author">
                        <div class="author"><span>Автор:</span><a href="#"><?= $blog['author'] ?></a></div>
                        <div class="comment"><span><i class="fa fa-comment-o" aria-hidden="true"></i><?= $blog['comments'] ?></span></div>
                    </div>
                    <div class="blog-desc">
                        <a href="/blogs/detail/<?=$blog['id']?>"><?= $blog['title'] ?></a>
                    </div>
                </div>
                <? endforeach; ?>
            </div>
        </div>
        <a href="/blogs" class="more-blogs">Больше блогов</a>
    </div>

    <!-- Игровые статьи -->
    <div class="row span_dark">
        <span>Игровые статьи</span>
    </div>
    <div class="row games-articles">
        <div class="col-12 games-articles__game">
            <div class="row">
                <? foreach ($lastArticles as $article): ?>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 article">
                    <a href="/articles/detail/<?=$article['id']?>">
                        <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$article['image'])): ?>
                            <img src="<?=PATH_IMAGE?>/<?=$article['image']?>" class="article__img" alt="<?=$article['image']?>">
                        <? else: ?>
                            <img src="<?=NO_IMG?>" class="article__img" alt="<?=$article['image']?>">
                        <? endif; ?>
                        <div class="article-day">
                            <div class="day"><span><?= $article['date'] ?></div>
                        </div>
                        <div class="article-desc">
                            <a href="/articles/detail/<?=$article['id']?>"><?= $article['title'] ?></a>
                        </div>
                    </a>
                </div>
                <? endforeach; ?>

            </div>
        </div>
        <a href="/articles" class="more-blogs">Больше статей</a>
    </div>


    <!-- Прохождения игр, тактика и советы -->
    <div class="row span_light">
        <span>Прохождения игр, тактика и советы</span>
    </div>
    <div class="row recent-posts">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 wrapper">
            <div class="row">
                <? if (!empty($lastChits)): ?>
                <? foreach ($lastChits as $chit): ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resent-post">
                    <a href="/cheats/detail/<?=$chit['id']?>">
                        <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$chit['image'])): ?>
                            <img src="<?=PATH_IMAGE?>/<?=$chit['image']?>" class="resent-post__img" alt="">
                        <? else: ?>
                            <img src="<?=NO_IMG?>" class="resent-post__img" alt="<?=$chit['image']?>">
                        <? endif; ?>
                        <div class="resent-post__day">
                            <div class="day"><span><?=$chit['date']?></div>
                        </div>
                        <div class="resent-post__name">
                            <a href="/cheats/detail/<?=$chit['id']?>"><?=$chit['title']?></a>
                        </div>

                    </a>
                </div>
                <? endforeach; ?>
                <? endif; ?>
                <a href="/cheats" class="more-guides">Больше читов</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 last-comments">
            <span>Последние комментарии</span>
            <? if (!empty($lastComments)): ?>
            <? //pr($lastComments); ?>
            <? foreach ($lastComments as $comment): ?>
            <a href="#">
                <div class="col-12 last-comment">
                    <div class="last-comment__img">
                        <img src="<?=PATH_AVATAR?>/<?=$comment['user_img']?>" class="last-comment__img--avatar" alt="<?=$comment['author']?>">
                    </div>
                    <div class="last-comment__text">
                        <div class="last-comment__text--author">
                            <a href="#"><?=$comment['author'] ?></a>
                        </div>
                        <div class="last-comment__text--text">
                            <p><?= $comment['comment'] ?></p>
                            <a href="/<?=$comment['tbl']?>/detail/<?= $comment['title_id'] ?>">
                                <p><?= $comment['title'] ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
            <? endforeach; ?>
            <? endif; ?>
        </div>
    </div>
</div>