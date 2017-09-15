-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 15 2017 г., 10:50
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apartment`
--

INSERT INTO `apartment` (`id`, `title_ru`, `title_ua`, `title_en`, `description_ru`, `description_ua`, `description_en`, `coordinates`, `latitude`, `longitude`, `stock`, `price_2`, `price_night`, `price_day`, `price_5`, `price_10`, `room_count`, `bed_count`, `type`, `area`, `guests`, `owner`, `phone`, `floor`, `apartment_area`) VALUES
(5, 'Новая квартира в самом центре города, Евро ремонт', 'Нова квартира в самому центрі міста, Євро ремонт', 'New apartment in the center of the city, Euro repair', 'Одна из лучших квартир в городе. Подходит для большой семьи.', 'Одна з кращих квартир в місті. Підходить для великої родини.', 'One of the best apartments in the city. Suitable for a large family.', 'вулиця Богдана Хмельницького 19, Запорожье, Запорожская область, Украина', '47.8566003', '35.100325', 1, 22, 22, 150, 22, 22, 1, 2, 'Дом', 'Днепровский', 8, 'Мария Петровна', '+3 (050) 678 90 43', 6, 69),
(6, 'Квартира Люкс, Центр, Пушкина, Район ЗАГСА', 'Квартира Люкс, Центр, Пушкіна, Район РАДСА', 'Apartment Lux, Center, Pushkina', 'Хорошая, стильная квартира. Только после ремонта.', 'Гарна, стильна квартира. Тільки після ремонту.', 'Nice, stylish apartment. Only after repair.', 'Заводская улица 2, Запорожье, Запорожская область, Украина', '47.8518485', '35.13174470000001', 0, 55, 22, 280, 22, 22, 3, 4, 'Дом', 'Александровский', 5, 'Петр Николаевич', '+3 (067) 895 67 91', 20, 100),
(7, 'Квартира Люкс, Центр, Гагарина, Район 5 гор. Больницы', 'Квартира Люкс, Центр міста, Гагаріна, Район 5 міської лікарні', 'Apartment Lux, Center, Gagarina, District 5 city hospital', 'Предлагаю вашему вниманию совершенно новую квартиру в самом центре города, район Гагарина - 5 городской больницы, BILLA. Ранее в сдаче квартира не была.\r\n\r\nРядом с моим жильем общественный транспорт, центр города, парки и искусство и культура. Вам понравится, ведь в моем жилье есть уют и расположение.\r\n\r\nМое жилье подходит для этого: пары, соло-путешественники, деловые путешественники, семьи (с детьми) и большие группы.\r\n\r\nСелю в любое время. Документы при заселении обязательны.', 'Пропоную вашій увазі абсолютно нову квартиру в самому центрі міста, район Гагаріна - 5 міської лікарні, BILLA. Раніше в здачі квартира не була.\r\n\r\nПоруч з моїм житлом громадський транспорт, центр міста, парки і мистецтво і культура. Вам сподобається, адже в моєму житлі є затишок і розташування.\r\n\r\nМоє житло підходить для цього: пари, соло-мандрівники, ділові мандрівники, сім''ї (з дітьми) і великі групи.\r\n\r\nСелю в будь-який час. Документи при заселенні обов''язкові.', 'I bring to your attention a completely new apartment in the very center of the city, Gagarin district - 5 city hospital, BILLA. Earlier in the delivery of the apartment was not.\r\n\r\nNext to my dwelling are public transport, city center, parks and art and culture. You will like it, because my apartment has a cosiness and location.\r\n\r\nMy accommodation is suitable for this: couples, solo travelers, business travelers, families (with children) and large groups.\r\n\r\nSel at any time. Documents are required upon check-in.', 'Ладожская улица 17, Запорожье, Запорожская область, Украина', '47.8870025', '35.06736699999999', 1, 150, 200, 210, 140, 125, 2, 4, 'Квартира', 'Заводской', 4, 'Игорь Иванович', '+3 (097) 789 06 75', 6, 44),
(8, 'Квартира', 'Квартира', 'Apartment', 'Guessing [edit] Edit wiki-text]\r\nIt is used primarily for "non-traditional" captch with a small number of response options (1000 or less). The robot "guesses", sending random answers, and some of them turn out to be correct.\r\n\r\nUsing databases [edit] Edit wiki-text]\r\nThis approach is effective when the questions are prepared by the administrator, and not generated by the machine. With the help of databases, you can go through many unconventional options for captcha: for example, note all the pictures with cats.\r\n\r\n\r\n', 'Guessing [edit] Edit wiki-text]\r\nIt is used primarily for "non-traditional" captch with a small number of response options (1000 or less). The robot "guesses", sending random answers, and some of them turn out to be correct.\r\n\r\nUsing databases [edit] Edit wiki-text]в\r\nThis approach is effective when the questions are prepared by the administrator, and not generated by the machine. With the help of databases, you can go through many unconventional options for captcha: for example, note all the pictures with cats.\r\n', 'Угадывание[править | править вики-текст]\r\nПрименяется в первую очередь для «нетрадиционных» капч с небольшим количеством вариантов ответа (1000 и меньше). Робот «гадает», посылая случайные ответы, и некоторые из них оказываются верными.\r\n\r\nИспользование баз данных[править | править вики-текст]\r\nДанный подход эффективен, когда вопросы подготавливаются администратором, а не генерируются машиной. С помощью баз данных можно пройти многие нетрадиционные варианты капчи: например, отметить все картинки с кошками.', 'вулиця Перша ливарна, Запорожье, Запорожская область, Украина', '47.8192466', '35.175077399999964', 0, 70, 100, 150, 1000, 2000, 1, 2, 'Дом', 'Александровский', 2, 'Я', '+3 (564) 654 64 64', 1, NULL),
(9, 'gsdfrgd', 'dfghfdgaa', 'gdfgafdg', 'etreartaertder', 'reetsret', 'dfrgg', 'Авангардная улица 34, Запорожье, Запорожская область, Украина', '47.8237214', '35.1651243', 1, 8585, 8686, 8686, 868, 866, 1, 1, 'Дом', 'Александровский', 3, 'me', '+3 (543) 453 45 63', 7, 452),
(10, 'dfgdg', 'dfgdg', 'fgdgd', 'dfgdg', 'fdgdgdfg', 'dfgdfg', 'улица Жуковского, 34, Запорожье, Запорожская область, Украина', '47.811818', '35.19067300000006', 1, 5, 45, 4554, 454, 455, 2, 1, 'Квартира', 'Александровский', 4, 'я', '+3 (556) 465 44 45', 2, 50),
(11, 'епрар', 'вапав', 'авр', 'рарр', 'врапр', 'арвря', 'улица Глазунова 20, Запорожье, Запорожская область, Украина', '47.88475469999999', '35.160920499999975', 0, 5, 5, 5, 5, 4758, 2, 3, 'Дом', 'Заводской', 86, 'прпр', '+3 (758) 745 75 67', 4, 444),
(12, 'Заголовок1', 'Заголовок2', 'Заголовок3', 'Описание 1', 'Описание 2', 'Описание 3', 'улица Почтовая, 107, Запорожье, Запорожская область, Украина', '47.82051999999999', '35.170164', 0, 10, 20, 30, 100, 500, 1, 2, 'Комната', 'Александровский', 2, 'Пауль Шер', '+3 (541) 654 65 44', 1, 50);

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
('User', '12', 1500889224),
('User', '13', 1500890392),
('User', '14', 1500892297),
('User', '15', 1503046477),
('User', '16', 1503046536),
('User', '17', 1503221176),
('User', '18', 1503221340),
('User', '19', 1503221845),
('User', '20', 1503222124),
('User', '21', 1503222210),
('User', '22', 1503222338),
('User', '23', 1503222661),
('User', '24', 1503222774),
('User', '25', 1503222908),
('User', '26', 1503223014),
('User', '27', 1503248627),
('User', '28', 1503294239),
('User', '29', 1503381093),
('User', '30', 1503381307),
('User', '31', 1503381430),
('User', '32', 1503381819),
('User', '33', 1503381874),
('User', '34', 1503382018),
('User', '35', 1503382688),
('User', '36', 1503382891),
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
('/site/social', 2, NULL, NULL, NULL, 1503770271, 1503770271),
('Admin', 1, 'Администратор', NULL, NULL, 1490184441, 1503770344),
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
('User', '/site/login'),
('Admin', '/site/social');

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
  `status` int(11) DEFAULT '0',
  `apartment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_price` int(11) NOT NULL,
  `rating_clean` int(11) NOT NULL,
  `rating_communication` int(11) NOT NULL,
  `rating_place` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `status`, `apartment_id`, `user_id`, `city`, `comment`, `rating`, `rating_price`, `rating_clean`, `rating_communication`, `rating_place`, `date`) VALUES
(3, 1, 7, 4, 'Харьков', 'Сойдет!', 5, 3, 5, 5, 4, '2017-07-20 06:34:21'),
(4, 1, 7, 11, 'Киев', 'Неплохая квартира, жить можно.', 4, 5, 1, 2, 5, '2017-05-15 06:42:12'),
(9, 1, 6, 4, 'Львов', 'Хорошая квартира, все убрано и опрятно! 5+', 5, 5, 5, 5, 5, '2017-07-20 11:18:29'),
(10, 1, 7, 11, 'Киев', 'ВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУВАУ ВАУ ВАУ', 4, 3, 5, 5, 2, '2017-07-24 09:09:09'),
(11, 1, 7, 4, 'Днепр', 'Ничего так!', 3, 3, 3, 3, 3, '2017-07-24 09:09:09'),
(12, 1, 6, 13, 'PG', 'yugy', 1, 1, 1, 1, 1, '2017-07-24 10:14:55'),
(13, 1, 11, 11, 'ЗП', 'Тест Тест!', 3, 2, 2, 3, 3, '2017-07-25 08:09:19'),
(14, 1, 6, 13, 'ЗП', 'найс', 5, 5, 5, 5, 5, '2017-07-25 09:12:52'),
(15, 0, 6, 13, 'ДП', 'кул 4+', 4, 3, 3, 1, 3, '2017-07-25 09:13:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `facilities`
--

INSERT INTO `facilities` (`id`, `apartment_id`, `internet`, `wifi`, `iron`, `drying_machine`, `washer_machine`, `tv`, `plazm_tv`, `fridge`, `balcony`, `door`, `conditioner`, `smoke`, `separate_entrance`, `gas`, `boiler`, `laptop`, `jacuzzi`, `pool`, `time_in`, `time_out`, `guest_price`, `repairs`) VALUES
(4, 5, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'любое', 'любое', 20, 'евро'),
(5, 6, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'любое', 'любое', 25, 'евро'),
(6, 7, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '06:15', 'любое', 30, 'евро'),
(7, 8, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'любое', 'любое', 50, 'нет'),
(8, 9, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'любое', 'любое', 52, 'no'),
(9, 10, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 'любое', 'любое', 12311, 'оо'),
(10, 11, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'любое', 'любое', 0, 'ошщз'),
(11, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '11:30', '19:30', 30, 'Євро');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

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
(66, 5, '/frontend/web/images/594a2d1174d61.jpg'),
(67, 8, '/frontend/web/images/5975f7fa542e4.png'),
(69, 10, '/frontend/web/images/5975fbce22aee.jpg'),
(75, 9, '/frontend/web/images/5996ab57ed1d9.jpg'),
(76, 9, '/frontend/web/images/5996ab653c938.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `apartment_id`, `user_id`, `date_start`, `date_end`, `guest_count`, `total_price`, `status`, `date`) VALUES
(5, 6, 4, '2017-07-23', '2017-07-28', 8, 1370, 1, '2017-07-18 08:32:22'),
(7, 9, 1, '2017-08-18', '2017-08-18', 0, 8736, 1, '2017-08-16 21:19:37'),
(8, 9, 16, '2017-08-18', '2017-08-19', 3, 8892, 1, '2017-08-18 09:00:26'),
(9, 10, 1, '2017-08-29', '2017-08-31', 0, 9158, 1, '2017-08-25 11:05:39'),
(10, 10, 1, '2017-08-26', '2017-08-28', 0, 9158, 0, '2017-08-25 11:06:05');

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE IF NOT EXISTS `social` (
`id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `vk` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `f_status` int(11) DEFAULT '1',
  `g_status` int(11) DEFAULT '1',
  `vk_status` int(11) DEFAULT '1',
  `t_status` int(11) DEFAULT '1',
  `i_status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `facebook`, `google`, `vk`, `twitter`, `instagram`, `f_status`, `g_status`, `vk_status`, `t_status`, `i_status`) VALUES
(1, 'https://www.facebook.com/apartmenttherapy/', 'https://www.quora.com/What-is-G+-in-apartments', 'https://www.vk.com', 'https://twitter.com/aptsgoals', 'https://www.instagram.com/apartmenttherapy/?hl=ru', 0, 1, 1, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `avatar`, `username`, `name`, `surname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'public/avatars/597736f00b420.png', 'Admin', 'Администратор', 'Вася', 'i1YZmvngDa274Q8JQRyhQjDz2nb5Nktf', '$2y$13$hXgOWEPT5gQtYPSokOeOdOxH50jvq/8T2IXp0ySOBjlajWaolK.me', NULL, 'test.apartments@gmail.com', 10, 1490176869, 1503297106),
(4, 'public/avatars/5976f689c7d19.jpg', 'vasya', 'Василий', 'Иванов', 'QmOmPJu4x_JjsiLpdHSBarbi4YYM8qSL', '$2y$13$NjDtM1TURZM3zKh1DhYgH.WfvA0ZIoSVq4o4nRdGzgIfoh0XO0vdW', NULL, 'vlad.vasyakot@mail.ru', 10, 1490185426, 1504174881),
(11, NULL, 'vlad', 'Петр', 'Самодин', 'OyUtr5XO0aGh1qwGqscuf3_pkHb7hkz2', '$2y$13$.FSqA6rB0D/De98fDS/3ounP9f8bCQ7pOgx/h5w5BT70kyX1E/xUq', NULL, 'prybylov.v2@gmail.com', 10, 1500458461, 1500459307),
(13, 'public/avatars/5979959097cf0.jpg', 'Testpage', 'Name', 'Surname ', 'UhwflC61e8WxmLU7kg3VOtMjDYNyyZZw', '$2y$13$EJhyjEuS0e87icetyNA8IOaEe00bK0OU3LS/0sl1HhxJ7Z.6lN3Hu', '2rbel3EXpDM7utzi1_eCcvO6qjw-E197_1500985975', 'testpage@yahoo.com', 10, 1500890392, 1501140390),
(14, NULL, 'new_user', 'Olga', 'Test', 'AhN0IiHSyjBOJ_Alzrx57MevNa8x2ZZU', '$2y$13$g1MMHutYrXT4e/oD0UVOi.LpJsc113CJYm4qD/jISxbtWSRiPshYO', NULL, 'testpaget@yahoo.com', 5, 1500892297, 1500892297),
(15, NULL, 'alex', 'Alex', 'Alex', '_MV3Hpauiql_6rmLEDVhTZvM3QnhEBV6', '$2y$13$Grk7UycF.AC3RHgPQQHTAeIEBBiehhDgXuicNSYH5IgTlIxruZs3C', NULL, 'alex@gmail.com', 5, 1503046477, 1503046477),
(16, NULL, 'alexslot', 'Alex', 'Alex', 'jSksRlEcrQWpnwocXq5X8lbUyDyw5klF', '$2y$13$MWYEJZWmTNi.3kvgCTIuNedhOPB2l/qLoWRouEwsAvp/eYPbqN5XC', NULL, 'alexandrslot@gmail.com', 10, 1503046536, 1503046805),
(27, NULL, 'test', 'test', 'test', '_gCf4KYjsjcdLBptNhzzs0RB27BWGREp', '$2y$13$8cvr1wNWczn0tW5lIl3gXekC3ZmhMp11df4G676HPG/MPa7bjUYV.', NULL, 'rangerzx@mail.ru', 10, 1503248627, 1504174849);

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
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `comments_ibfk_2` (`apartment_id`);

--
-- Индексы таблицы `facilities`
--
ALTER TABLE `facilities`
 ADD PRIMARY KEY (`id`), ADD KEY `apartment_id` (`apartment_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`id`), ADD KEY `image_ibfk_1` (`apartment_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_ibfk_1` (`apartment_id`), ADD KEY `orders_ibfk_2` (`user_id`);

--
-- Индексы таблицы `social`
--
ALTER TABLE `social`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apartment`
--
ALTER TABLE `apartment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `facilities`
--
ALTER TABLE `facilities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `social`
--
ALTER TABLE `social`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
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
