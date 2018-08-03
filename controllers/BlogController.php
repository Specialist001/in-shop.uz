<?php

class BlogController
{
    public function actionIndex()
    {
//        $superArray = array(
//            'zero' => '0',
//            'one'  => '1',
//            'two'  => '2',
//            'three'  => '3'
//        );

        $superArray = Blog::test();

        $title = 'Блог';

        require_once(ROOT . '/views/blog/index.php');
        return true;
    }
}