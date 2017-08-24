-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 05 2017 г., 17:40
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(10, 3, 'ewewee', '2017-02-01 22:04:47'),
(11, 1, '3231231', '2017-02-05 16:15:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `file`, `size`, `date`, `review`) VALUES
(1, 'o_125302-250x200-1485604012.jpg', 9521, '2017-01-28 14:46:52', 21),
(2, '2017-01-18_23-37-25-1485604333.png', 9376, '2017-01-28 14:52:13', 75),
(3, 'Screenshot_20170125_233928-1485604350.png', 349351, '2017-01-28 14:52:30', 20),
(4, '2017-02-02_21-25-06-1486291530.png', 485256, '2017-02-05 13:45:30', 0),
(5, '2017-02-02_21-25-06-1486298138.png', 485256, '2017-02-05 15:35:38', 0),
(6, '2017-02-02_21-25-06-1486298150.png', 485256, '2017-02-05 15:35:50', 0),
(7, '2017-02-02_21-25-06-1486298197.png', 485256, '2017-02-05 15:36:37', 0),
(8, '2017-02-02_21-25-06-1486298207.png', 485256, '2017-02-05 15:36:47', 0),
(9, '2017-02-02_21-25-06-1486298572.png', 485256, '2017-02-05 15:42:52', 0),
(10, 'gost_View02-1486298585.jpg', 1173077, '2017-02-05 15:43:05', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_login` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_last_action` timestamp NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_login`, `user_password`, `user_last_action`) VALUES
(6, 'User Name', 'user', 'user', '0000-00-00 00:00:00'),
(7, 'User Name', 'user2', 'user2', '0000-00-00 00:00:00'),
(8, '1111', 'MaDMaxX111', 'MaDMaxX111', '0000-00-00 00:00:00'),
(9, '111', 'MaDMaxX11', 'MaDMaxX11', '0000-00-00 00:00:00'),
(10, '111', 'MaDMaxX1111', 'MaDMaxX1111', '0000-00-00 00:00:00'),
(11, '111', 'MaDMaxX11111', 'MaDMaxX11111', '0000-00-00 00:00:00');

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
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
