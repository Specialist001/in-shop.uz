<?php

class UserController
{
    public function actionRegister()
    {
        require_once(ROOT . '/views/user/register.php');

        return true;
    }
}