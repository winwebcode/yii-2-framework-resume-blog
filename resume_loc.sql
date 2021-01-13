-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2021 г., 05:45
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `resume.loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_category_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `parent_category_id`, `category_name`, `description`) VALUES
(1, NULL, 'uncategory', 'descr'),
(2, NULL, 'yii2', 'framework yii2'),
(3, 2, 'testcat', '4234');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id_posts` int(11) UNSIGNED NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `keywords` text DEFAULT NULL,
  `descriptions` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `parent_category` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id_posts`, `post_title`, `post_content`, `post_name`, `keywords`, `descriptions`, `created_at`, `parent_category`) VALUES
(1, 'Тестовая запись', 'Авторизация — это процесс проверки того, что пользователь имеет достаточно прав, чтобы выполнить какие-то действия. Yii предоставляет два метода авторизации: фильтры контроля доступа (ACF) и контроль доступа на основе ролей (RBAC).\r\nФильтры контроля доступа\r\n\r\nФильтры контроля доступа (ACF) являются простым методом, который лучше всего использовать в приложениях с простым контролем доступа. Как видно из их названия, ACF — это фильтры, которые могут присоединяться к контроллеру или модулю как поведение. ACF проверяет набор правил доступа, чтобы убедиться, что пользователь имеет доступ к запрошенному действию.\r\n\r\n<p>Код ниже показывает, как использовать ACF фильтр, реализованный в yii\\filters\\AccessControl: </p>', '253', 'тестовая крч', '99999945', '2020-10-13 19:44:11', 1),
(4, 'qwerty', 'Test blog', 'qwerty', '', '', '2020-10-12 19:56:38', 1),
(5, 'topnews', ' В наборе файлов Yii2 уже имеется views/site/error.php. Просто редактируйте его содержимое как вам нравится. (Если используете свою тему, то можно в ней оформить файл ошибки - это будет файл web/themes/ваша_тема/views/site/error.php)\r\n\r\nВ нём можно использовать 3 переменные: $name, $message, $exception.\r\n\r\nФлаг ошибки 404 - это значение $exception->statusCode. Таким образом можно написать свою проверку этого значения и для разных ошибок показывать пользователю разный ответ.\r\n\r\nНапример, для сайта нашей школы брейка - inspire2.ru - пока добавил проверку: если ошибка error 404, то показывать основное меню в теле страницы. Вот вид views/site/error.php', 'topnews', '', '', '2020-10-09 01:09:15', 1),
(6, 'faqfaq', 'wetgwegweytgewrtyg', 'faqfaq', '', '', '2020-10-09 00:30:12', 2),
(7, 'hahaha', '523523', 'hahaha', '523', '2535', '2020-10-11 20:18:50', 1),
(9, '123', '1', '123', '3', '4', '2020-10-13 20:20:53', 1),
(10, 'тестовая категория yii2', 'текст', 'yii2', 'yii2', 'yii 2 description category', '2020-10-13 20:22:38', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `ticket_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_subject` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_text` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `authKey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `authKey`, `password`, `username`, `avatar`) VALUES
(1, 'X2VRvjdeumaRnEmvsxL7mb21p8MdJa3Y', '$2y$13$6C7iNUPDMC8.I81pU3a/geSNCiY8SfFcisHmoQRCnq0rlnFCgRIS.', 'admin', '/web/uploads/avatars/4124.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `idpost` (`id_posts`),
  ADD UNIQUE KEY `post_name` (`post_name`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id_posts` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
