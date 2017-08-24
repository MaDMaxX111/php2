-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 01 2017 г., 19:06
-- Версия сервера: 5.6.31
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `image_id`, `comment`, `date_added`) VALUES
(1, 3232, 'safsdfsdfdffsfsdf', '2017-02-01 21:43:40'),
(2, 2, 'wqwqwfdsdfs '' fsdf sdf'''''''' sd s ', '2017-02-01 21:43:40'),
(3, 2, 'wqwqwfdsdfs '' fsdf sdf'''''''' sd s ', '2017-02-01 21:43:40'),
(4, 2, 'wqwqwfdsdfs '' fsdf sdf'''''''' sd s ', '2017-02-01 21:43:40'),
(5, 3, 'ÐºÐºÑ†ÑƒÐºÑ†ÑƒÐºÑƒÑ†ÐºÑ†ÑƒÐºÑƒÑ†', '2017-02-01 21:43:40'),
(6, 3, 'fdsfsdfdsfs', '2017-02-01 21:43:40'),
(7, 3, 'fdsfsdfdsfs', '2017-02-01 21:43:40'),
(8, 3, 'gffgdfgdfg', '2017-02-01 21:44:02'),
(9, 3, 'erqrererew', '2017-02-01 22:04:41'),
(10, 3, 'ewewee', '2017-02-01 22:04:47');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 NOT NULL,
  `size` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `review` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `file`, `size`, `date`, `review`) VALUES
(1, 'o_125302-250x200-1485604012.jpg', 9521, '2017-01-28 14:46:52', 10),
(2, '2017-01-18_23-37-25-1485604333.png', 9376, '2017-01-28 14:52:13', 7),
(3, 'Screenshot_20170125_233928-1485604350.png', 349351, '2017-01-28 14:52:30', 19);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
