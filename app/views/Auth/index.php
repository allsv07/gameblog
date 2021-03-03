<div class="container">
    <div class="row block-auth--user">
        <h1>Авторизация</h1>
        <span class="error"></span>
        <? if (!isset($_SESSION['user']['login'])): ?>
        <div class="auth-block">
            <? if (isset($_SESSION['error']['message']) && $_SESSION['error']['message'] != '') : ?>
                <div class="auth-block--error">
                    <span class="error"><?=$_SESSION['error']['message']; unset($_SESSION['error']['message'])?></span>
                </div>
            <? endif; ?>
            <form action="" method="post" id="auth-form" class="auth-form">
                <input type="text" class="auth_user--login" name="login_user" id="auth_user--login" placeholder="Логин">
                <input type="password" class="auth_user--pass" name="pass_user" id="auth_user--pass" placeholder="Пароль">
                <input type="submit" class="btn_auth--user" value="Войти">
            </form>
            <a href="/recover" style="display: block; margin-top: 10px; color: #006495;">Забыли пароль?</a>
        </div>
        <div class="block-auth-reg--user">
            <span>Нет аккаунта?</span>
            <a href="/register" class="register">Зарегистрироваться</a>
        </div>
        <? else: ?>
        <span class="user-is_auth">Вы уже авторизованы, как <strong><a href=""><?= $_SESSION['user']['login'] ?></a></strong></span>
        <? endif; ?>
    </div>
</div>