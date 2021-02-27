<div class="container">
    <div class="row block-reg-user">
        <h1>Регистрация</h1>
        <div class="registarion-block">
            <? if (isset($_SESSION['error-register']) && $_SESSION['error-register'] != '') : ?>
                <div class="registarion-block--error">
                    <span class="error"><?=$_SESSION['error-register']; unset($_SESSION['error-register'])?></span>
                </div>
            <? endif; ?>
            <form action="" method="POST" class="reg-form-user">
                <input type="text" name="reg-login" id="reg_user--login" class="reg_user--login" placeholder="Логин" value="<?=(isset($_POST['reg-login']) && $_POST['reg-login'] != '') ? $_POST['reg-login'] : '';?>">
                <input type="email" name="reg-mail" id="reg_user--email" class="reg_user--email" placeholder="E-mail" value="<?=(isset($_POST['reg-mail']) && $_POST['reg-mail'] != '') ? $_POST['reg-mail'] : '';?>">
                <input type="password" name="reg-pass" id="reg_user--pass" class="reg_user--pass" placeholder="Пароль">
                <input type="submit" name="btn-reg-user" class="btn-reg-user" value="Зарегистрироваться">
            </form>
        </div>
    </div>
</div>