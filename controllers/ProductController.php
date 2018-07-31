<?php

class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $product = Product::getProductById($productId);

        $titleProduct = $product['name'];
        require_once(ROOT . '/views/product/view.php');

        return true;
    }
}