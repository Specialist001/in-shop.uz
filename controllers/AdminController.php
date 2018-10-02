<?php

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

		$title = 'Админ Панель';
		
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionProduct()
    {

    }
}