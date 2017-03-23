-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 23 2017 г., 17:30
-- Версия сервера: 5.5.50
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
  `floor` int(11) DEFAULT NULL,
  `apartment_area` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apartment`
--

INSERT INTO `apartment` (`id`, `title_ru`, `title_ua`, `title_en`, `description_ru`, `description_ua`, `description_en`, `coordinates`, `stock`, `price_2`, `price_night`, `price_day`, `price_5`, `price_10`, `room_count`, `bed_count`, `type`, `area`, `floor`, `apartment_area`) VALUES
(5, 'ghj', 'fghj', 'fghj', 'fghj', 'fghjf', 'ghj', 'gfhjfghj', 1, 22, 22, 22, 22, 22, 2, 4, 'Дом', 'Днепровский', 6, 69),
(6, 'gfjhkfgjk', '657tryuj', 'ruyhy76ru76u', 'rtuj76u6ru', 'r7urtu7', 'ur67ur67u', 'Заводская улица 2, Запорожье, Запорожская область, Украина', 0, 55, 22, 22, 22, 22, 3, 10, 'Дом', 'Заводской', 20, 100),
(7, 'арпо', 'апрол', 'апро', 'апро', 'апро', 'апро', 'Ладожская улица 17, Запорожье, Запорожская область, Украина', 1, 454, 44, 44, 44, 44, 2, 2, 'Квартира', 'Заводской', 6, 44);

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
('/site/login', 2, NULL, NULL, NULL, 1490188519, 1490188519),
('Admin', 1, 'Администратор', NULL, NULL, 1490184441, 1490184495),
('User', 1, 'Пользователь', NULL, NULL, 1490184472, 1490188534);

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
-- Структура таблицы `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) DEFAULT NULL,
  `elevator` int(11) DEFAULT '0',
  `internet` int(11) DEFAULT '0',
  `animals` int(11) DEFAULT '0',
  `kitchen` int(11) DEFAULT '0',
  `gym` int(11) DEFAULT '0',
  `intercom` int(11) DEFAULT '0',
  `fireplace` int(11) DEFAULT '0',
  `waggon` int(11) DEFAULT '0',
  `heating` int(11) DEFAULT '0',
  `wifi` int(11) DEFAULT '0',
  `disabled` int(11) DEFAULT '0',
  `iron` int(11) DEFAULT '0',
  `drying_machine` int(11) DEFAULT '0',
  `family` int(11) DEFAULT '0',
  `parking` int(11) DEFAULT '0',
  `washer_machine` int(11) DEFAULT '0',
  `hair_dryer` int(11) DEFAULT '0',
  `tv` int(11) DEFAULT '0',
  `conditioner` int(11) DEFAULT '0',
  `cable_tv` int(11) DEFAULT '0',
  `smoke` int(11) DEFAULT '0',
  `separate_entrance` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `facilities`
--

INSERT INTO `facilities` (`id`, `apartment_id`, `elevator`, `internet`, `animals`, `kitchen`, `gym`, `intercom`, `fireplace`, `waggon`, `heating`, `wifi`, `disabled`, `iron`, `drying_machine`, `family`, `parking`, `washer_machine`, `hair_dryer`, `tv`, `conditioner`, `cable_tv`, `smoke`, `separate_entrance`) VALUES
(4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 6, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Администратор', 'Администраторович', 'UTo8q7LX4oqzNWicwZE7txlyFy8QQlXf', '$2y$13$jdKfU1vtbmHEY.P8Wg7W4.40CHL7BZU5yKbjnWsY0qtg2.a58V81S', NULL, 'prybylov.v@gmail.com', 10, 1490176869, 1490179685),
(4, 'vasya', 'Василий', 'Иванов', 'QmOmPJu4x_JjsiLpdHSBarbi4YYM8qSL', '$2y$13$HTiETqYLfn0XP8iqAX6wUuYCVtE99icsOd/u1suLc3NqYaSTd8Ml6', NULL, 'vlad.vasyakot@mail.ru', 10, 1490185426, 1490185426);

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
-- AUTO_INCREMENT для таблицы `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- Ограничения внешнего ключа таблицы `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`);

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
