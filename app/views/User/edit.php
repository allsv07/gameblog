<div class="container">
    <div class="row block-edit-user">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 block-edit-user--info">
            <form action="" method="post" class="form-edit-img" enctype="multipart/form-data">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 image">
                    <span class="lab">Текущий аватар</span>
                    <img src="/images/user/<?=$user['image']?>" alt=""><br>
                    <input type="file" name="avatar" id="avatar">
                    <input type="submit" id="btn-edit" class="btn-edit" name="btn-edit-img" value="Загрузить">
                </div>

            </form>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mail-and-pass">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mail">
                        <form action="" method="post" class="form-edit-mail">
                            <span class="lab">E-mail</span>
                            <input type="email" id="mail" class="inp-mail" name="mail" placeholder="E-mail" value="<?= $user['email'] ?>">
                            <input type="submit" id="btn-edit" class="btn-edit" name="btn-edit-mail" value="Сохранить">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pass">
                        <form action="" method="post" class="form-edit-pass">
                            <span class="lab">Пароль</span>
                            <input type="password" id="inp-pass" class="inp-pass" name="pass" placeholder="Текущий пароль">
                            <input type="password" id="new-pass" class="new-pass" name="new-pass" placeholder="Новый пароль">
                            <input type="submit" id="btn-edit" class="btn-edit" name="btn-edit-mail" value="Сохранить">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 info">
                        <form action="" method="post" class="form-edit-info">
                            <span class="lab">Данные профиля</span>
                            <input type="text" id="inp-name" class="inp-name" name="name" placeholder="Имя" value="<?=$user['name']?>">
                            <input type="submit" id="btn-edit" class="btn-edit" name="btn-edit-mail" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
