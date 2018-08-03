<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        //$count = intval($count);

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, is_new FROM product ' .
                'WHERE status ="1" ORDER BY id DESC ' .
                'LIMIT :count';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id']     = $row['id'];
            $productsList[$i]['name']   = $row['name'];
            //$productsList[$i]['image']  = $row['image'];
            $productsList[$i]['price']  = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, is_new FROM product ' .
               'WHERE status = 1 AND category_id = :category_id ' .
               'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id']     = $row['id'];
            $products[$i]['name']   = $row['name'];
            $products[$i]['price']  = $row['price'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $products;
    }

    public static function getProductById($id)
    {
        //$id = intval($id);

        $db = Db::getConnection();

        $sql = 'SELECT * FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function getTotalProducts()
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM product';

        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    public static function getProductsByIds($idsArray)
    {
        $db = Db::getConnection();

        $idsString = implode(',',$idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
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
     * Mahsulotlar ro'yxatini qaytaradi
     * @return array <p>tovarlar massivi</p>
     */
    public static function getProductsList($page = 1)
    {
        $sort = 'ASC';
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, code, status FROM product ORDER BY id ' . $sort . ' LIMIT :limit OFFSET :offset';

        /*$result = $db->query(
            'SELECT id, name, price, code FROM product ORDER BY id ASC LIMIT :limit OFFSET :offset'
        );*/

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id']    = $row['id'];
            $productsList[$i]['name']  = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['code']  = $row['code'];
            $productsList[$i]['status']  = $row['status'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

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

    public static function updateProductById($id, $options)
    {
        // РЎРѕРµРґРёРЅРµРЅРёРµ СЃ Р‘Р”
        $db = Db::getConnection();

        // РўРµРєСЃС‚ Р·Р°РїСЂРѕСЃР° Рє Р‘Р”
        $sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand = :brand,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status
            WHERE id = :id";

        // РџРѕР»СѓС‡РµРЅРёРµ Рё РІРѕР·РІСЂР°С‚ СЂРµР·СѓР»СЊС‚Р°С‚РѕРІ. Р�СЃРїРѕР»СЊР·СѓРµС‚СЃСЏ РїРѕРґРіРѕС‚РѕРІР»РµРЅРЅС‹Р№ Р·Р°РїСЂРѕСЃ
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createProduct($options)
    {
        //
        $db = Db::getConnection();

        //
        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . 'description, is_new, is_recommended, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ':description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Р•СЃР»Рё Р·Р°РїСЂРѕСЃ РІС‹РїРѕР»РµРЅРµРЅ СѓСЃРїРµС€РЅРѕ, РІРѕР·РІСЂР°С‰Р°РµРј id РґРѕР±Р°РІР»РµРЅРЅРѕР№ Р·Р°РїРёСЃРё
            return $db->lastInsertId();
        }
        return 0;
    }
}