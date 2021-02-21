<div class="container d-flex h-100 justify-content-center align-items-center p-0">
    <div class="row">
        <div class="block-autorization">
            <? if (isset($_SESSION['error']) && $_SESSION['error'] != ''): ?>
            <div class="block-error">

                <span style="color: red"><?=$_SESSION['error'];?></span>
                <? unset($_SESSION['error']); ?>
            </div>
            <? endif; ?>
            <form action="" class="autorization" method="post">
                <input type="text" id="admin_login" class="login" name="admin_login" placeholder="Логин">
                <input type="password" id="admin_pass" class="pass" name="admin_pass" placeholder="Пароль">
                <input type="submit" name="submit" class="submit" value="Войти">
            </form>
        </div>
    </div>
</div>