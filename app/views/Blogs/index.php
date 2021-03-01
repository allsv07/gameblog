<div class="container">
    <div class="row main-content-news">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <span class="sidebar-title">Блоги</span>

            <div class="category-news">
                <ul class="category-news-list">
                    <li class="category-news_item"><a href="/blogs" class="active">Все</a></li>
                    <? foreach ($arrCategory as $category): ?>
                        <li class="category-news_item"><a href="/blogs/category/<?= $category['code'] ?>"><?= $category['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-news-content">
            <div class="block-breadcrumbs">
                <p class="wrapper_p"><a href="/">Главная</a> / Блоги</p>
            </div>

            <div class="article-news-title">
                <h1>Блоги</h1>
            </div>

            <div class="article-news">
                <div class="row">
                    <? if (!empty($allBlogs)): ?>
                        <? foreach ($allBlogs as $blog): ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chit-post">
                                <a href="/blogs/detail/<?=$blog['num_id']?>">
                                    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].PATH_IMAGE.'/'.$blog['image'])): ?>
                                        <img src="<?=PATH_IMAGE?>/<?=$blog['image']?>" class="chit-post__img" alt="<?=$blog['image']?>">
                                    <? else: ?>
                                        <img src="<?=NO_IMG?>" class="chit-post__img" alt="<?=$blog['image']?>">
                                    <? endif; ?>
                                    <div class="chit-post__name">
                                        <a href="/blogs/detail/<?=$blog['num_id']?>"><?= $blog['title'] ?></a>
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
                        <span class="no-records">Блогов еще нет. Но скоро появятся!</span>
                    <? endif; ?>
                </div>
            </div>
            <div class="block-pagination">
                <?=$pagination;?>
            </div>
        </div>
    </div>
</div>