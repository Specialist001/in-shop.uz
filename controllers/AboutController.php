<?php

class AboutController
{
    public function actionIndex()
    {
        $title = 'О магазине';

        require_once(ROOT . '/views/about/index.php');
        return true;
    }
}