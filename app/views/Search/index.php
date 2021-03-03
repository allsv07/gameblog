<div class="container">
    <div class="row main-content-news">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / Поиск</p>
            </div>

            <div class="article-news-title">
                <h1>ПОИСК ПО САЙТУ</h1>
            </div>

            <div class="article-news">
                <span>Найдено записей (<?=count($allSearch);?>)</span>
                <div class="row">
                    <? if (!empty($allSearch)): ?>
                        <? foreach ($allSearch as $search): ?>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 chit-post">
                                <a href="/<?=$search['tbl']?>/detail/<?=$search['num_id']?>">
                                    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$search['image'])): ?>
                                        <img src="<?=PATH_IMAGE?>/<?=$search['image']?>" class="chit-post__img" alt="<?=$search['image']?>">
                                    <? else: ?>
                                        <img src="<?=NO_IMG?>" class="chit-post__img" alt="<?=$search['image']?>">
                                    <? endif; ?>
                                    <div class="chit-post__name">
                                        <a href="/<?=$search['tbl']?>/detail/<?=$search['num_id']?>"><?= $search['title'] ?></a>
                                    </div>
                                    <div class="chit-post__info">
                                        <div class="day"><span><?= $search['date'] ?></div>
                                        <div class="comments"><span><i class="fa fa-comment-o" aria-hidden="true"></i><?= $search['comments'] ?></span></div>
                                    </div>

                                </a>
                            </div>
                        <? endforeach; ?>
                    <? else: ?>
                        <span class="no-records">По вашему запросу ничего не найдено</span>
                    <? endif; ?>

                </div>
            </div>
            <div class="block-pagination">
                <?=$pagination;?>
            </div>
        </div>
    </div>
</div>