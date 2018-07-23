<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query(
            'SELECT id, name, price, image, is_new FROM product ' .
            'WHERE status = "1"' .
            'ORDER BY id DESC ' .
            'LIMIT ' . $count
        );

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id']     = $row['id'];
            $productsList[$i]['name']   = $row['name'];
            $productsList[$i]['image']  = $row['image'];
            $productsList[$i]['price']  = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query(
                'SELECT id, name, price, image, is_new FROM product ' .
                'WHERE status = "1" AND category_id = '. $categoryId .
                ' ORDER BY id ASC ' .
                'LIMIT ' . self::SHOW_BY_DEFAULT . ' OFFSET ' . $offset
            );
            
            // $result = $db->query("SELECT id, name, price, image, is_new FROM product "
            //         . "WHERE status = '1' AND category_id = '$categoryId' "
            //         . "ORDER BY id DESC "                
            //         . "LIMIT ".self::SHOW_BY_DEFAULT);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id']     = $row['id'];
                $products[$i]['name']   = $row['name'];
                $products[$i]['image']  = $row['image'];
                $products[$i]['price']  = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query(
                'SELECT * FROM product WHERE id=' . $id
            );
            $result->setFetchMode(PDO::FETCH_ASSOC);

            // $i = 0;
            // while($row = $result->fetch()) {
            //     $product[$i]['name']   = $row['name'];
            //     $product[$i]['image']  = $row['image'];
            //     $product[$i]['price']  = $row['price'];
            //     $product[$i]['is_new'] = $row['is_new'];
            //     $i++;
            // }

            return $result->fetch();
        }

    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query(
            'SELECT count(id) AS count FROM product ' .
            'WHERE status="1" AND category_id ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProductsByIds($idsArray)
    {
        $db = Db::getConnection();

        $idsString = implode(',',$idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    /**
     * Taklif qilingan tovarlar ro'yxatini qaytaradi
     * @return array <p>Tovarlar massivi</p>
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $result = $db->query(
            'SELECT id, name, price, is_new FROM product ' .
            'WHERE status = "1" AND is_recommended = "1" ' .
            'ORDER BY id DESC'
        );

        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }


    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';

        $path = '/upload/images/products/';

        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}