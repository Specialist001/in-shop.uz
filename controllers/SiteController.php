<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userSubject = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userSubject = $_POST['userSubject'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный e-mail';
            }

            if ($errors == false) {
                $adminEmail = 'darking-uz@yandex.ru';
                $message = 'Текст: ' . $userText . '. От: ' . $userEmail;
                $subject = 'Тема: ' . $userSubject;
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');
        
        return true;        
    }
}