<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Читы</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/cheats" class="active">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                    <li class="category-news_item"><a href="/cheats/category/<?= $category['code'] ?>"><?= $category['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / Читы</p>
            </div>

            <div class="article-news-title">
                <h1>КОДЫ И ПРОХОЖДЕНИЯ ИГР</h1>
            </div>

            <div class="article-news">
                <div class="row">
                    <? if (!empty($allCheats)): ?>
                    <? foreach ($allCheats as $cheat): ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chit-post">
                        <a href="/cheats/detail/<?=$cheat['num_id']?>">
                            <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$cheat['image'])): ?>
                                <img src="<?=PATH_IMAGE?>/<?=$cheat['image']?>" class="chit-post__img" alt="<?=$cheat['image']?>">
                            <? else: ?>
                                <img src="<?=NO_IMG?>" class="chit-post__img" alt="<?=$cheat['image']?>">
                            <? endif; ?>
                            <div class="chit-post__name">
                                <a href="/cheats/detail/<?=$cheat['num_id']?>"><?= $cheat['title'] ?></a>
                            </div>
                            <div class="chit-post__info">
                                <div class="tags"><span><?=$cheat['cat_title']?></span></div>
                                <div class="day"><span><?= $cheat['date'] ?></div>
                                <div class="comments"><span><i class="fa fa-comment-o" aria-hidden="true"></i><?= $cheat['comments'] ?></span></div>
                            </div>

                        </a>
                    </div>
                    <? endforeach; ?>
                    <? else: ?>
                        <span class="no-records">Гайдов и прохождений игр еще нет. Но скоро появятся!</span>
                    <? endif; ?>

                </div>
            </div>
            <div class="block-pagination">
                <?=$pagination;?>
            </div>
        </div>
    </div>
</div>