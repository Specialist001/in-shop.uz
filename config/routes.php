<?php
return array(    
    'product/([0-9]+)' => 'product/view/$1',
    
    'catalog' => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    'user/register' => 'user/register',

    '' => 'site/index',
    //'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    //'news/([0-9]+)' => 'news/view/$1',
    //'news' => 'news/index',
    // 'products' => 'product/list',
);
