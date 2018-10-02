<?php

class AdminOrderController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $ordersList = Order::getOrdersList();
		
		$title = 'Управление заказами';
        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        self::checkAdmin();

        $order = Order::getOrderById($id);

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            header("Location: /admin/order/view/$id");
        }
		
		$title = '';
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

    /**
     * @param $id
     */
    public function actionView($id)
    {
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);

        $total = 0;

        // Подключаем вид
		$title = '';
        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            Order::deleteOrderById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }
}