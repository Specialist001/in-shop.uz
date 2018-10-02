-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2018 г., 23:33
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `inshop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Рубашки', 1, 1),
(2, 'Платья', 5, 1),
(3, 'Футболки', 3, 1),
(4, 'Майки', 4, 1),
(5, 'Сумки', 2, 1),
(6, 'Чемоданы', 6, 1),
(7, 'Брюки', 7, 1),
(8, 'Пиджаки', 8, 1),
(9, 'Галстуки', 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `short_content`, `content`, `author_name`, `preview`, `type`) VALUES
(1, 'news', '2018-07-10 19:00:00', 'asdasdasdasda', 'jklsdflh sdkfjhsd kjfhsld fhjsdl khsjl jkdf ', 'Bobur', '', 'pass'),
(2, 'News 2', '2018-07-12 08:32:22', 'ash dajshgduiat dyuagt sdg sduygf', 'HGjhsagd hasgd jhasgd ahjsgd shjgdhjag ', 'Migma', '', 'pass');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Футболка Серая', 2, 1351, 26885, 0, 'GitHub', '', 'Майка мужской Тор Secret. Хлопчатобумажная мужская футболка с длинным рукавом. Спереди застегивается на пуговицы. Ткань белого цвета в мелкие светло-серые полоски. Очень стильная и модная майка, идеальный вариант для каждодневного выхода.', 0, 0, 1),
(2, 'Платье Черная', 2, 1484, 26000, 0, 'GitHub 2', '', 'Материал:92% хлопок, 8% лайкра Отдел:Женский Сезон:Летний', 1, 1, 1),
(3, 'Футболка Белая', 2, 3201, 24500, 0, 'GitHub', '', 'Футболки хорошего качества со скидкой! I love Bukhara !!!', 0, 1, 1),
(4, 'Рубашка Летняя', 2, 1339, 18600, 0, 'China', '', 'Летняя мужская рубашка с коротким рукавом с декоративной отделкой в морском стиле', 1, 0, 1),
(5, 'Рубашка Летняя 2', 2, 1869, 19000, 0, 'Europe', '', 'Нарядный, практичный вариант женского платья для летних знойных дней. В этом наряде можно чувствовать себя уверенно и комфортно при любых обстоятельствах. Дополнить образ  помогут аксессуары: массивные браслеты, серьги, кольца. А вот обувь подойдет любая: на высоком каблуке, низком ходу, даже спортивная.', 0, 0, 1),
(6, 'Футболка Серая 2', 2, 1351, 26885, 0, 'GitHub', '', 'Майка мужской Тор Secret. Хлопчатобумажная мужская футболка с длинным рукавом. Спереди застегивается на пуговицы. Ткань белого цвета в мелкие светло-серые полоски. Очень стильная и модная майка, идеальный вариант для каждодневного выхода.', 0, 0, 1),
(7, 'Платье Черная 2', 2, 1484, 26000, 0, 'GitHub', '', 'Материал:92% хлопок, 8% лайкра Отдел:Женский Сезон:Летний', 1, 1, 1),
(8, 'Футболка Белая 2', 2, 3201, 24500, 0, 'GitHub', '', 'Футболки хорошего качества со скидкой! I love Bukhara !!!', 0, 1, 1),
(9, 'Рубашка Летняя 3', 2, 1339, 18600, 0, 'China', '', 'Летняя мужская рубашка с коротким рукавом с декоративной отделкой в морском стиле', 1, 0, 1),
(10, 'Рубашка Летняя 4', 5, 1869, 19000, 0, 'Europe', '', 'Нарядный, практичный вариант женского платья для летних знойных дней. В этом наряде можно чувствовать себя уверенно и комфортно при любых обстоятельствах. Дополнить образ  помогут аксессуары: массивные браслеты, серьги, кольца. А вот обувь подойдет любая: на высоком каблуке, низком ходу, даже спортивная.', 0, 0, 1),
(11, 'Футболка Серая 2', 3, 1351, 26885, 0, 'GitHub', '', 'Майка мужской Тор Secret. Хлопчатобумажная мужская футболка с длинным рукавом. Спереди застегивается на пуговицы. Ткань белого цвета в мелкие светло-серые полоски. Очень стильная и модная майка, идеальный вариант для каждодневного выхода.', 0, 0, 1),
(12, 'Платье Черная 2', 6, 1484, 26000, 0, 'GitHub', '', 'Материал:92% хлопок, 8% лайкра Отдел:Женский Сезон:Летний', 1, 1, 1),
(13, 'Футболка Белая 2', 3, 3201, 24500, 0, 'GitHub', '', 'Футболки хорошего качества со скидкой! I love Bukhara !!!', 0, 1, 1),
(14, 'Рубашка Летняя 5', 1, 1339, 18600, 0, 'China', '', 'Летняя мужская рубашка с коротким рукавом с декоративной отделкой в морском стиле', 1, 0, 1),
(15, 'Рубашка Летняя 6', 1, 1869, 19000, 0, 'Europe', '', 'Нарядный, практичный вариант женского платья для летних знойных дней. В этом наряде можно чувствовать себя уверенно и комфортно при любых обстоятельствах. Дополнить образ  помогут аксессуары: массивные браслеты, серьги, кольца. А вот обувь подойдет любая: на высоком каблуке, низком ходу, даже спортивная.', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'asdasdasd', '998971110022', '', 0, '2018-07-21 11:20:50', '{"2":1,"3":1,"1":2}', 1),
(2, 'R4z0r', '123456789352', 'hujagsdg asyd gasyud gasydugas', 0, '2018-07-21 11:26:22', '{"14":3,"15":1,"10":2}', 1),
(3, 'asdadad asd asd', '4564564654654654564564654', 'sdhjkfgsdhjfg sdhfsdfhj gsdf sdjgsdhj dfsfghjdfs', 0, '2018-07-21 11:33:39', '{"14":1,"13":1,"15":1}', 1),
(4, 'Warez', 'djasdjasjdasjdj', 'asgdhsgdjhsaghsdtg usdytf yusdtfyusd', 0, '2018-07-21 11:41:44', '{"11":4,"13":1,"2":1,"3":1,"5":2,"6":1,"8":1}', 1),
(5, 'User1', '998971110022', 'sdfsdfs sd fsdf ', 1, '2018-07-21 12:42:09', '{"14":3,"13":1}', 1),
(6, 'User1', '123456789352', 'sotib olaman', 1, '2018-07-21 12:54:13', '{"2":1,"3":2,"5":1,"6":2,"4":1}', 1),
(7, 'User1', '998971110022', 'hujagsdg asyd gasyud gasydugas', 1, '2018-07-21 12:55:36', '{"1":3,"3":1,"2":3,"5":2}', 1),
(8, 'User1', '123456789352', 'hujagsdg asyd gasyud gasydugas', 1, '2018-07-21 12:57:34', '{"3":1,"2":1,"1":1,"4":1,"6":1}', 1),
(9, 'User1', '123456789352', 'asgdhsgdjhsaghsdtg usdytf yusdtfyusd', 1, '2018-07-21 12:58:24', '{"1":1,"3":1,"6":1,"5":1,"4":1}', 1),
(10, 'User1', '4564564654654654564564654', 'sdhjkfgsdhjfg sdhfsdfhj gsdf sdjgsdhj dfsfghjdfs', 1, '2018-07-21 12:59:34', '{"2":2,"3":1,"1":1}', 1),
(11, 'User1', '4564564654654654564564654', 'asgdhsgdjhsaghsdtg usdytf yusdtfyusd', 1, '2018-07-21 13:00:15', '{"2":2,"3":1,"1":1}', 1),
(12, 'kalsjdlkasjd', '612371287631876318', 'hkbcdkvbsgfvjsdhhckbsf', 0, '2018-07-22 12:00:56', '{"14":1,"13":1,"15":1}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'Admin@test.uz', '295ce6711606eaea5a2e8f0c4703e7b7', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
