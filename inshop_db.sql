-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 17 2018 г., 17:56
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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'asrq', 'mmm@mm.uz', '1212120');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
