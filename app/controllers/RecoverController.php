<?php


namespace app\controllers;


use app\models\User;

class RecoverController extends AppController
{
    public function indexAction()
    {
        $users = new User();

        if (isset($_POST['btn_recover--user'])) {
            if (!empty($_POST['login_user']) && $_POST['login_user'] != '') {
                $recover = clearStr($_POST['login_user']);
                //ищем пользователя по введенным данным
                $user = $users->getUser("SELECT * FROM `users` WHERE `login` = ? OR `email` = ? LIMIT 1", [$recover, $recover]);

                if (!empty($user)) {
                    $newPass = $this->generatePassword();

                    //формируем данные для отправки письма и отправляем
                    $to = $user['email'];
                    $from = "info@gameblog.by";
                    $message = 'Ваш новый пароль: '.$newPass;
                    $headers = "From: $from\r\nReply-to:$from\r\nContent-type:text/html; charser=utf-8\r\n";
                    $this->sendMail($to, RECOVER_PASS, $message, $headers);

                    $newPass = password_hash($newPass, PASSWORD_DEFAULT);
                    $users->editPassUser($newPass, $user['login']);
                    $_SESSION['success-recover'] = 'На вашу почту отправленно сообщение с новым паролем';
                    header('Location: /auth');
                }
                else {
                    $_SESSION['error-recover'] = 'Такого пользователя не существует';
                }
            }
            else {
                $_SESSION['error-recover'] = 'Введите ваш логин или почту';
            }
        }

    }
}