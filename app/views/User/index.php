<div class="container">
    <div class="row auth-user">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-info">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-info--image">
                <img src="<?=PATH_AVATAR?>/<?=$user['image']?>" alt="<?=$user['login']?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-info--name">
                <span><?=$user['login']?></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-personal-data">
            <div class="block-personal-data--info">
                <span>Дата регистрации: <strong><?=$user['date']?></strong></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 href-edit">
            <a href="/user/edit" class="href-edit--link">Редактировать</a>
        </div>
    </div>
    <div class="row info-user">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-user--all">
            <div class="info-user--comments">
                <a href="#">Комментарии</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 user--comments">
            <? if (!empty($allComments)): ?>
            <? foreach ($allComments as $comments): ?>
            <div class="all-comments--user">
                <div class="info-comment">
                    <span class="author-comm"><?=$comments['author']?></span><br>
                    <span class="date-comm"><?=$comments['date']?></span><a href="/user/dellcomment/<?=$comments['id']?>">удалить</a>
                </div>
                <div class="detail-comment">
                    <a href="<?=$comments['tbl']?>/detail/<?=$comments['num_id']?>"><span><?=$comments['title']?></span></a>
                    <p><?=$comments['comment']?></p>
                </div>
            </div>
            <? endforeach; ?>
            <? else: ?>
            <span style="color: #ffffff; font-size: 16px;">К сожалению у Вас нет ни одного комментария</span>
            <? endif; ?>

        </div>
    </div>
</div>