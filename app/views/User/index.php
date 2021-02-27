<div class="container">
    <div class="row auth-user">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-info">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-info--image">
                <img src="/images/user/<?=$user['image']?>" alt="<?=$user['login']?>">
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
</div>