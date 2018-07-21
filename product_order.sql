-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 21 2018 г., 18:01
-- Версия сервера: 5.6.37-log
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `inshop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'asdasdasd', '998971110022', '', 0, '2018-07-21 11:20:50', '{\"2\":1,\"3\":1,\"1\":2}', 1),
(2, 'R4z0r', '123456789352', 'hujagsdg asyd gasyud gasydugas', 0, '2018-07-21 11:26:22', '{\"14\":3,\"15\":1,\"10\":2}', 1),
(3, 'asdadad asd asd', '4564564654654654564564654', 'sdhjkfgsdhjfg sdhfsdfhj gsdf sdjgsdhj dfsfghjdfs', 0, '2018-07-21 11:33:39', '{\"14\":1,\"13\":1,\"15\":1}', 1),
(4, 'Warez', 'djasdjasjdasjdj', 'asgdhsgdjhsaghsdtg usdytf yusdtfyusd', 0, '2018-07-21 11:41:44', '{\"11\":4,\"13\":1,\"2\":1,\"3\":1,\"5\":2,\"6\":1,\"8\":1}', 1),
(5, 'User1', '998971110022', 'sdfsdfs sd fsdf ', 1, '2018-07-21 12:42:09', '{\"14\":3,\"13\":1}', 1),
(6, 'User1', '123456789352', 'sotib olaman', 1, '2018-07-21 12:54:13', '{\"2\":1,\"3\":2,\"5\":1,\"6\":2,\"4\":1}', 1),
(7, 'User1', '998971110022', 'hujagsdg asyd gasyud gasydugas', 1, '2018-07-21 12:55:36', '{\"1\":3,\"3\":1,\"2\":3,\"5\":2}', 1),
(8, 'User1', '123456789352', 'hujagsdg asyd gasyud gasydugas', 1, '2018-07-21 12:57:34', '{\"3\":1,\"2\":1,\"1\":1,\"4\":1,\"6\":1}', 1),
(9, 'User1', '123456789352', 'asgdhsgdjhsaghsdtg usdytf yusdtfyusd', 1, '2018-07-21 12:58:24', '{\"1\":1,\"3\":1,\"6\":1,\"5\":1,\"4\":1}', 1),
(10, 'User1', '4564564654654654564564654', 'sdhjkfgsdhjfg sdhfsdfhj gsdf sdjgsdhj dfsfghjdfs', 1, '2018-07-21 12:59:34', '{\"2\":2,\"3\":1,\"1\":1}', 1),
(11, 'User1', '4564564654654654564564654', 'asgdhsgdjhsaghsdtg usdytf yusdtfyusd', 1, '2018-07-21 13:00:15', '{\"2\":2,\"3\":1,\"1\":1}', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
