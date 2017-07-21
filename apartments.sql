-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 21 2017 г., 10:05
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `apartments`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apartment`
--

CREATE TABLE IF NOT EXISTS `apartment` (
  `id` int(11) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ua` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_ru` text NOT NULL,
  `description_ua` text NOT NULL,
  `description_en` text NOT NULL,
  `coordinates` text NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `price_2` float NOT NULL,
  `price_night` float NOT NULL,
  `price_day` float NOT NULL,
  `price_5` float NOT NULL,
  `price_10` float NOT NULL,
  `room_count` int(11) DEFAULT NULL,
  `bed_count` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `area` varchar(255) NOT NULL,
  `guests` int(11) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `apartment_area` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apartment`
--

INSERT INTO `apartment` (`id`, `title_ru`, `title_ua`, `title_en`, `description_ru`, `description_ua`, `description_en`, `coordinates`, `latitude`, `longitude`, `stock`, `price_2`, `price_night`, `price_day`, `price_5`, `price_10`, `room_count`, `bed_count`, `type`, `area`, `guests`, `owner`, `phone`, `floor`, `apartment_area`) VALUES
(5, 'Новая квартира в самом центре города, Евро ремонт', 'fghj', 'fghj', 'xdghdfghdfgh', 'fghjf', 'ghj', 'вулиця Богдана Хмельницького 19, Запорожье, Запорожская область, Украина', '47.8566003', '35.100325', 1, 22, 22, 150, 22, 22, 1, 2, 'Дом', 'Днепровский', 8, 'Мария Петровна', '+3 (050) 678 90 43', 6, 69),
(6, 'Квартира Люкс, Центр, Пушкина, Район ЗАГСА', '657tryuj', 'ruyhy76ru76u', 'rtuj76u6ru', 'r7urtu7', 'ur67ur67u', 'Заводская улица 2, Запорожье, Запорожская область, Украина', '47.8518485', '35.13174470000001', 0, 55, 22, 280, 22, 22, 3, 4, 'Дом', 'Александровский', 5, 'Петр Николаевич', '+3 (067) 895 67 91', 20, 100),
(7, 'Квартира Люкс, Центр, Гагарина, Район 5 гор. Больницы', 'апрол', 'апро', 'Предлагаю вашему вниманию совершенно новую квартиру в самом центре города, район Гагарина - 5 городской больницы, BILLA. Ранее в сдаче квартира не была.\r\n\r\nРядом с моим жильем общественный транспорт, центр города, парки и искусство и культура. Вам понравится, ведь в моем жилье есть уют и расположение.\r\n\r\nМое жилье подходит для этого: пары, соло-путешественники, деловые путешественники, семьи (с детьми) и большие группы.\r\n\r\nСелю в любое время. Документы при заселении обязательны.', 'апро', 'апро', 'Ладожская улица 17, Запорожье, Запорожская область, Украина', '47.8870025', '35.06736699999999', 1, 150, 200, 210, 140, 125, 2, 4, 'Квартира', 'Заводской', 4, 'Игорь Иванович', '+3 (097) 789 06 75', 6, 44);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1490184484),
('User', '10', 1500458375),
('User', '11', 1500458461),
('User', '4', 1490185426);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1490184477, 1490184477),
('/profile/*', 2, NULL, NULL, NULL, 1500620102, 1500620102),
('/profile/profile', 2, NULL, NULL, NULL, 1500620006, 1500620006),
('/site/login', 2, NULL, NULL, NULL, 1490188519, 1490188519),
('Admin', 1, 'Администратор', NULL, NULL, 1490184441, 1490184495),
('User', 1, 'Пользователь', NULL, NULL, 1490184472, 1500620122);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', '/*'),
('User', '/profile/*'),
('User', '/site/login');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_price` int(11) NOT NULL,
  `rating_clean` int(11) NOT NULL,
  `rating_communication` int(11) NOT NULL,
  `rating_place` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `apartment_id`, `user_id`, `city`, `comment`, `rating`, `rating_price`, `rating_clean`, `rating_communication`, `rating_place`, `date`) VALUES
(3, 7, 4, 'Харьков', 'Сойдет!', 5, 3, 5, 5, 4, '2017-07-20 06:34:21'),
(4, 7, 11, 'Киев', 'Неплохая квартира, жить можно.', 4, 5, 1, 2, 5, '2017-05-15 06:42:12'),
(9, 6, 4, 'Львов', 'Хорошая квартира, все убрано и опрятно! 5+', 5, 5, 5, 5, 5, '2017-07-20 11:18:29');

-- --------------------------------------------------------

--
-- Структура таблицы `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) DEFAULT NULL,
  `internet` int(11) DEFAULT '0',
  `wifi` int(11) DEFAULT '0',
  `iron` int(11) DEFAULT '0',
  `drying_machine` int(11) DEFAULT '0',
  `washer_machine` int(11) DEFAULT '0',
  `tv` int(11) DEFAULT '0',
  `plazm_tv` int(11) DEFAULT '0',
  `fridge` int(11) DEFAULT '0',
  `balcony` int(11) DEFAULT '0',
  `door` int(11) DEFAULT '0',
  `conditioner` int(11) DEFAULT '0',
  `smoke` int(11) DEFAULT '0',
  `separate_entrance` int(11) DEFAULT '0',
  `gas` int(11) DEFAULT '0',
  `boiler` int(11) DEFAULT '0',
  `laptop` int(11) DEFAULT '0',
  `jacuzzi` int(11) DEFAULT '0',
  `pool` int(11) DEFAULT '0',
  `time_in` varchar(40) DEFAULT 'любое',
  `time_out` varchar(40) DEFAULT 'любое',
  `guest_price` float NOT NULL,
  `repairs` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `facilities`
--

INSERT INTO `facilities` (`id`, `apartment_id`, `internet`, `wifi`, `iron`, `drying_machine`, `washer_machine`, `tv`, `plazm_tv`, `fridge`, `balcony`, `door`, `conditioner`, `smoke`, `separate_entrance`, `gas`, `boiler`, `laptop`, `jacuzzi`, `pool`, `time_in`, `time_out`, `guest_price`, `repairs`) VALUES
(4, 5, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'любое', 'любое', 20, 'евро'),
(5, 6, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'любое', 'любое', 25, 'евро'),
(6, 7, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '06:15', 'любое', 30, 'евро');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `apartment_id`, `image`) VALUES
(57, 7, '/frontend/web/images/594a2c383d0e9.jpg'),
(59, 7, '/frontend/web/images/594a2c383e997.jpg'),
(60, 7, '/frontend/web/images/594a2c383f817.jpg'),
(61, 7, '/frontend/web/images/594a2c38404ac.jpg'),
(62, 6, '/frontend/web/images/594a2cb91f86d.jpg'),
(63, 6, '/frontend/web/images/594a2cb92065f.jpg'),
(64, 6, '/frontend/web/images/594a2cb92135c.jpg'),
(65, 5, '/frontend/web/images/594a2d1173fc2.jpg'),
(66, 5, '/frontend/web/images/594a2d1174d61.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `guest_count` int(11) DEFAULT NULL,
  `total_price` float NOT NULL,
  `status` int(11) DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `apartment_id`, `user_id`, `date_start`, `date_end`, `guest_count`, `total_price`, `status`, `date`) VALUES
(5, 6, 1, '2017-07-23', '2017-07-28', 8, 1370, 0, '2017-07-18 08:32:22');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `avatar`, `username`, `name`, `surname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'Администратор', 'Вася', 'i1YZmvngDa274Q8JQRyhQjDz2nb5Nktf', '$2y$13$hXgOWEPT5gQtYPSokOeOdOxH50jvq/8T2IXp0ySOBjlajWaolK.me', NULL, 'prybylov2.v@gmail.com', 10, 1490176869, 1500381606),
(4, NULL, 'vasya', 'Василий', 'Иванов', 'QmOmPJu4x_JjsiLpdHSBarbi4YYM8qSL', '$2y$13$NjDtM1TURZM3zKh1DhYgH.WfvA0ZIoSVq4o4nRdGzgIfoh0XO0vdW', NULL, 'vlad.vasyakot@mail.ru', 10, 1490185426, 1497875945),
(11, NULL, 'vlad', 'Петр', 'Самодин', 'OyUtr5XO0aGh1qwGqscuf3_pkHb7hkz2', '$2y$13$.FSqA6rB0D/De98fDS/3ounP9f8bCQ7pOgx/h5w5BT70kyX1E/xUq', NULL, 'prybylov.v@gmail.com', 10, 1500458461, 1500459307);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comments_ibfk_2` (`apartment_id`);

--
-- Индексы таблицы `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_ibfk_1` (`apartment_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`apartment_id`),
  ADD KEY `orders_ibfk_2` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`);

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
