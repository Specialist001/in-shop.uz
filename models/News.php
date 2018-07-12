<?php

class News
{
    public function db_connect()
    {
        $host = 'localhost';
        $dbname = 'inshop_db';
        $user =  'root';
        $password = '';
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        return $db;
    }

    public static function getNewsItemById($id)
    {
        $id = intval($id);

        if ($id) {           
            
            //db
            $db = Db::getConnection();

            $result = $db->query('SELECT * from news WHERE id=' . $id);
            // $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }
    
    public static function getNewsList()
    {
        $newsList = array();

        $result = $db->query(
            'SELECT id, title, date, short_content ' .
            'FROM news ' .
            'ORDER BY date DESC ' .
            'LIMIT 10'        
        );

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
    
        
}