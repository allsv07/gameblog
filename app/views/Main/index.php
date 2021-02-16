<?php
//pr($lastBlogs);
?>
<div class="container">
    <div class="row span">
        <span>Главное сегодня</span>
    </div>
    <div class="row news-today">
        <? foreach ($mainToday as $main): ?>
        <div class="article-today">
            <a href="#">
                <div class="cat">
                    <span>Статьи</span>
                </div>
                <img src="images/photo/control-6.jpg" class="article-img" alt="<?=$main['title']?>">
                <div class="article-today__text">
                    <span class="article-today__name">
                        <?=$main['title']?>
                    </span>
                </div>
            </a>
        </div>
        <? endforeach; ?>

        <!-- <div class="article-today article-today__5">
            <img src="images/photo/cyberpunk_2077-18.jpg" class="article-img" alt="control-6">
        </div> -->
    </div>

    <!-- Новости -->
    <div class="row span_light">
        <span>Игровые новости</span>
    </div>
    <div class="row game-news">
        <div class="col-md-8 beee">
            <? foreach ($lastNews as $new): ?>
            <div class="col-12 game-new">
                <div class="row">
                    <div class="col-4">
                        <a href="news/detail/<?=$main['id']?>">
                            <img src="images/photo/hitman_3-4.jpg" class="game-new__img" alt="<?=$new['title']?>">
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="game__new">
                            <div class="game-new__name">
                                <a href="news/detail/<?=$new['id']?>"><?=$new['title']?></a>
                            </div>
                            <div class="game-new__info">
                                <span class="game-new__info--date"><?=$new['date']?></span>
                                <span class="game-new__info--comment"><i class="fa fa-comment-o" aria-hidden="true"></i><?=$new['views']?></span>
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
                    <img src="images/photo/cyberpunk_2077-19.jpg" class="popular-new__img" alt="<?=$popular['title']?>">
                    <div class="popular-new__desc">
                        <div class="popular-new__desc--name">
                            <a href="news/detail/<?=$popular['id']?>"><p><?=$popular['title']?></p></a>
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
                        <div class="eyes"><span><i class="fa fa-eye" aria-hidden="true"></i><?=$blog['views']?></span></div>
                    </a>
                    <div class="blog-author">
                        <div class="author"><span>Автор:</span><a href="#"><?=$blog['author']?></a></div>
                        <div class="comment"><span><i class="fa fa-comment-o" aria-hidden="true"></i><?=$blog['comments']?></span></div>
                    </div>
                    <div class="blog-desc">
                        <a href="#"><?=$blog['title']?></a>
                    </div>
                </div>
                <? endforeach; ?>
            </div>
        </div>
        <a href="#" class="more-blogs">Больше блогов</a>
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
                        <img src="images/photo/NFSR3.jpg" class="article__img" alt="<?=$article['title']?>">
                        <div class="article-day">
                            <div class="day"><span><?=$article['date']?></div>
                        </div>
                        <div class="article-desc">
                            <a href="#"><?=$article['title']?></a>
                        </div>
                    </a>
                </div>
                <? endforeach; ?>

            </div>
        </div>
        <a href="#" class="more-blogs">Больше статей</a>
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
        <div class="ol-xs-12 col-sm-12 col-md-8 col-lg-8 wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  resent-post">
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="resent-post__img" alt="">
                        <div class="resent-post__day">
                            <div class="day"><span>Вчера</div>
                        </div>
                        <div class="resent-post__name">
                            <a href="#">История в деталях. Элитные формы Rainbow Six Siege</a>
                        </div>
                        <div class="resent-post__desc">
                            <p>История в деталях. Элитные формы Rainbow Six Siege</p>
                        </div>
                        <!--<div class="resent-post__cat">
                            <span>Лучшее</span>
                        </div>-->
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resent-post">
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="resent-post__img" alt="">
                        <div class="resent-post__day">
                            <div class="day"><span>Вчера</div>
                        </div>
                        <div class="resent-post__name">
                            <a href="#">История в деталях. Элитные формы Rainbow Six Siege</a>
                        </div>
                        <div class="resent-post__desc">
                            <p>История в деталях. Элитные формы Rainbow Six Siege</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 resent-post">
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="resent-post__img" alt="">
                        <div class="resent-post__day">
                            <div class="day"><span>Вчера</div>
                        </div>
                        <div class="resent-post__name">
                            <a href="#">История в деталях. Элитные формы Rainbow Six Siege</a>
                        </div>
                        <div class="resent-post__desc">
                            <p>История в деталях. Элитные формы Rainbow Six Siege</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resent-post">
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="resent-post__img" alt="">
                        <div class="resent-post__day">
                            <div class="day"><span>Вчера</div>
                        </div>
                        <div class="resent-post__name">
                            <a href="#">История в деталях. Элитные формы Rainbow Six Siege</a>
                        </div>
                        <div class="resent-post__desc">
                            <p>История в деталях. Элитные формы Rainbow Six Siege</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resent-post">
                    <a href="#">
                        <img src="images/photo/NFSR3.jpg" class="resent-post__img" alt="">
                        <div class="resent-post__day">
                            <div class="day"><span>Вчера</div>
                        </div>
                        <div class="resent-post__name">
                            <a href="#">История в деталях. Элитные формы Rainbow Six Siege</a>
                        </div>
                        <div class="resent-post__desc">
                            <p>История в деталях. Элитные формы Rainbow Six Siege</p>
                        </div>
                    </a>
                </div>
                <a href="#" class="more-guides">Больше читов</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 last-comments">
            <span>Последние комментарии</span>
            <a href="#">
                <div class="col-12 last-comment">
                    <div class="last-comment__img">
                        <img src="images/photo/cyberpunk_2077-19.jpg" class="last-comment__img--avatar" alt="">
                    </div>
                    <div class="last-comment__text">
                        <div class="last-comment__text--author">
                            <a href="#">Dark Kaas</a>
                        </div>
                        <div class="last-comment__text--text">
                            <p>Это все ерунда,самое что сильно раздражает, наверное и многих,так это ужасная беспомощность Эшли,ну блин,возьми что под руку попадется,да и метни </p>
                            <a href="#"><p>10 бессмысленных моментов в Resident Evil 4</p></a>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col-12 last-comment">
                    <div class="last-comment__img">
                        <img src="images/photo/control-5.jpg" class="last-comment__img--avatar" alt="">
                    </div>
                    <div class="last-comment__text">
                        <div class="last-comment__text--author">
                            <a href="#">Author</a>
                        </div>
                        <div class="last-comment__text--text">
                            <p>Сдано 76 предметов в музей, Гюнтер не приходит...</p>
                            <a href="#"><p>Лучший косплей монстров из Undertale</p></a>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col-12 last-comment">
                    <div class="last-comment__img">
                        <img src="images/photo/control-7.jpg" class="last-comment__img--avatar" alt="">
                    </div>
                    <div class="last-comment__text">
                        <div class="last-comment__text--author">
                            <a href="#">Sergey Filippov</a>
                        </div>
                        <div class="last-comment__text--text">
                            <p>у ск2 нет аналогов и конкурентов.</p>
                            <a href="#"><p>10 лучших RTS-игр, похожих на Strarcraft</p></a>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col-12 last-comment">
                    <div class="last-comment__img">
                        <img src="images/photo/hitman_3-3.jpg" class="last-comment__img--avatar" alt="">
                    </div>
                    <div class="last-comment__text">
                        <div class="last-comment__text--author">
                            <a href="#">Ghost</a>
                        </div>
                        <div class="last-comment__text--text">
                            <p>типичный интрнет борцун с режимом. Только срёт в интернете.</p>
                            <a href="#"><p>Stardew Valley — как попасть в канализацию?</p></a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>