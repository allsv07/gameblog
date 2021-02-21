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
            <a href="<?=$today['url'].$today['id']?>">
                <div class="cat">
                    <span><?=$today['category']?></span>
                </div>
                <img src="images/photo/control-6.jpg" class="article-img" alt="control-6">
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
                <a href="<?=$today['url'].$today['id']?>">
                    <img src="/images/photo/control-6.jpg" class="d-block w-100" alt="...">
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
                            <img src="images/photo/hitman_3-4.jpg" class="game-new__img" alt="<?= $new['title'] ?>">
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
                    <img src="images/photo/cyberpunk_2077-19.jpg" class="popular-new__img" alt="<?= $popular['title'] ?>">
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
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="blog__img" alt="">
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
    <div class="row span_light">
        <span>Игровые статьи</span>
    </div>
    <div class="row games-articles">
        <div class="col-12 games-articles__game">
            <div class="row">
                <? foreach ($lastArticles as $article): ?>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 article">
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="article__img" alt="<?= $article['title'] ?>">
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

    <!-- Галерея -->
    <div class="row span_dark">
        <span>Галерея</span>
    </div>
    <div class="row gallery">
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/control-7.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/cyberpunk_2077-17.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/cyberpunk_2077-18.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/cyberpunk_2077-19.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/cyberpunk_2077-21.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/cyberpunk_2077-22.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/hitman_3-3.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/hitman_3-4.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>

        </div>
        <div class="gallery-item">
            <a href="#">
                <img src="images/photo/NFSR.jpg" alt="">
                <div class="eye"><i class="fa fa-eye" aria-hidden="true"></i></div>
                <div class="overlay"></div>
            </a>
        </div>
        <a href="#" class="more-gallery-item">Показать галерею</a>
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
                        <img src="images/photo/NFSR3.jpg" class="resent-post__img" alt="">
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
            <? if (count($lastComments) > 0): ?>
            <? foreach ($lastComments as $comment): ?>
            <a href="#">
                <div class="col-12 last-comment">
                    <div class="last-comment__img">
                        <img src="images/photo/cyberpunk_2077-19.jpg" class="last-comment__img--avatar" alt="">
                    </div>
                    <div class="last-comment__text">
                        <div class="last-comment__text--author">
                            <a href="#"><?= $comment['author'] ?></a>
                        </div>
                        <div class="last-comment__text--text">
                            <p><?= $comment['text'] ?></p>
                            <a href="/news/detail/<?= $comment['n_id'] ?>">
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