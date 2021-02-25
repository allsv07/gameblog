<span class="error"></span>
<? if (!isset($_SESSION['user']['login'])): ?>
<form action="" method="post" id="auth-form" class="auth-form">
    <input type="text" class="login" name="login_user" id="login" placeholder="Логин">
    <input type="password" class="pass" name="pass_user" id="pass" placeholder="Пароль">
    <input type="submit" class="btn_auth" value="Войти">
</form>
<? else: ?>
<span class="user-is_auth">Вы уже авторизованы, как <strong><a href=""><?= $_SESSION['user']['login'] ?></a></strong></span>
<? endif; ?>