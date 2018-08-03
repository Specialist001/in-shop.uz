<?php

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный e-mail';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой e-mail уже используется';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }

        }

        $title = 'Регистрация';
        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors['email'] = 'Неправильный e-mail';
            }

            if (!User::checkPassword($password)) {
                $errors['password'] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors['errors'] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);

                header("Location: /cabinet/");
            }
        }
        $title = 'Авторизация';
        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        //session_start();
        unset($_SESSION["user"]);
        unset($_SESSION["admin"]);
        header("Location: /");
    }
}