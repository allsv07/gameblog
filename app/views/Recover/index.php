<div class="container">
    <div class="row block-auth--user">
        <h1>Востановление пароля</h1>
        <span class="error"></span>
        <? if (!isset($_SESSION['user']['login'])): ?>
            <div class="auth-block">
                <? if (isset($_SESSION['error-recover']) && $_SESSION['error-recover'] != '') : ?>
                    <div class="auth-block--error">
                        <span class="error"><?=$_SESSION['error-recover']; unset($_SESSION['error-recover'])?></span>
                    </div>
                <? endif; ?>
                <? if (isset($_SESSION['success-recover']) && $_SESSION['success-recover'] != '') : ?>
                    <div class="auth-block--success">
                        <span class="success"><?=$_SESSION['success-recover']; unset($_SESSION['success-recover'])?></span>
                    </div>
                <? endif; ?>
                <form action="" method="post" id="auth-form" class="auth-form">
                    <input type="text" class="auth_user--login" name="login_user" id="auth_user--login" placeholder="Ваш логин или почта">
                    <input type="submit" name="btn_recover--user" class="btn_auth--user" value="Восстановить">
                </form>
            </div>
        <? else: ?>
            <span class="user-is_auth">Вы уже авторизованы, как <strong><a href=""><?= $_SESSION['user']['login'] ?></a></strong></span>
        <? endif; ?>
    </div>
</div>