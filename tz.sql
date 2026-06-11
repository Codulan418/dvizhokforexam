-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 11 2026 г., 12:27
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int NOT NULL,
  `page_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `page_id`, `title`, `name`, `content`) VALUES
(1, 1, 'HTML & CSS: Design and Build Websites', 'Глава 1: Структура', '<p>Ежедневно мы сталкиваемся с различными типами документов. Газеты, заявления на выдачу паспорта, каталоги. Этот список можно продолжать до бесконечности.</p>\n        \n        <p>Многие веб-страницы функционируют как электронные версии вышеперечисленных документов. Например газеты публикуют одни и те же репортажи как на бумаге, так и на собственных сайтах; с помощью Всемирной паутины вы также можете написать заявление на получение паспорта; интернет-магазины содержат онлайн-версии каталогов и средства электронной коммерции.</p>\n        \n        <p>Структура важна для всех типов документов: она помогает читателям понять информацию, которую вы пытаетесь до них донести, а также способствует более простому переходу между частями документов. Таким образом, чтобы научиться создавать веб-страницы, важно понять, как правильно структурировать документы. В этой главе вы:</p>\n\n        <p>увидите, как язык HTML описывает структуру веб-страницы; узнаете, как нужно вставлять в документ теги и элементы; сверстаете свою первую веб-страницу.</p>\n        '),
(2, 2, 'CSS: The Missing Manual', 'Глава 1: Структура', '<p>Ежедневно мы сталкиваемся с различными типами документов. Газеты, заявления на выдачу паспорта, каталоги. Этот список можно продолжать до бесконечности.</p>\n        \n        <p>Многие веб-страницы функционируют как электронные версии вышеперечисленных документов. Например газеты публикуют одни и те же репортажи как на бумаге, так и на собственных сайтах; с помощью Всемирной паутины вы также можете написать заявление на получение паспорта; интернет-магазины содержат онлайн-версии каталогов и средства электронной коммерции.</p>\n        \n        <p>Структура важна для всех типов документов: она помогает читателям понять информацию, которую вы пытаетесь до них донести, а также способствует более простому переходу между частями документов. Таким образом, чтобы научиться создавать веб-страницы, важно понять, как правильно структурировать документы. В этой главе вы:</p>\n\n        <p>увидите, как язык HTML описывает структуру веб-страницы; узнаете, как нужно вставлять в документ теги и элементы; сверстаете свою первую веб-страницу.</p>\n        '),
(3, 3, 'Современный учебник JavaScript', 'sd', 'wr'),
(4, 3, 'Современный учебник JavaScript', 'sd', 'wr');

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--

CREATE TABLE `library` (
  `id` int NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`id`, `image`, `name`, `description`) VALUES
(1, 'assets/img/html.png', 'HTML', 'Основы разметки'),
(2, 'assets/img/css.png', 'CSS', 'Стили и вёрстка'),
(3, 'assets/img/js.png', 'JavaScript', 'Программирование'),
(4, 'assets/img/react.png', 'React', 'Библиотека интерфейсов'),
(5, 'assets/img/php.png', 'PHP', 'Серверный язык'),
(6, 'assets/img/laravel.png', 'Laravel', 'PHP-фрейвморк');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int NOT NULL,
  `topic_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `num` int NOT NULL,
  `lesson_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `topic_id`, `title`, `name`, `num`, `lesson_name`) VALUES
(1, 1, 'HTML & CSS: Design and Build Websites', 'Часть 1: HTML (Структура и контент)', 1, 'Структура'),
(2, 2, 'CSS: The Missing Manual', 'Часть 1: HTML (Структура и контент)', 1, 'Структура'),
(3, 3, 'Современный учебник JavaScrip', 'Часть 1: HTML (Структура и контент)', 1, 'Часть 1: HTML (Структура и контент)'),
(4, 1, 'dssf', 'fdf', 2, '2');

-- --------------------------------------------------------

--
-- Структура таблицы `topic`
--

CREATE TABLE `topic` (
  `id` int NOT NULL,
  `library_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `year` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `topic`
--

INSERT INTO `topic` (`id`, `library_id`, `title`, `image`, `name`, `author`, `year`) VALUES
(1, 1, 'Учебники по основам разметки', 'assets/img/html-book.png', 'HTML & CSS: Design and Build Websites', 'Jon Duckett', 2014),
(2, 2, 'Стили и вёрстка', 'assets/img/css-book.png', 'CSS: The Missing Manual', 'David McFarland', 2015),
(3, 3, 'Программирование', 'assets/img/js-book.png', 'Современный учебник JavaScript', 'Илья Кантор', 2014);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `library`
--
ALTER TABLE `library`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
