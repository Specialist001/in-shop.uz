<?php

class Order
{
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) ' .
                'VALUES (:user_name, :user_phone, :user_comment, user_id, products)';
    }
}