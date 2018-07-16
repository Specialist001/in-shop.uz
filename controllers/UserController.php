<?php

class UserController
{
    public function actionRegister()
    {
        if (isset($_POST['submit'])) {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            if (isset($name)) {
                echo '<br>name: ' . $name;
            }

            if (isset($email)) {
                echo '<br>email: ' . $email;
            }

            if (isset($password)) {
                echo '<br>password: ' . $password;
            }
        }


        require_once(ROOT . '/views/user/register.php');

        return true;
    }
}