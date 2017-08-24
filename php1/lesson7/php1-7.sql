-- MySQL dump 10.13  Distrib 5.5.48, for Win32 (x86)
--
-- Host: localhost    Database: php1
-- ------------------------------------------------------
-- Server version	5.5.48

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `php1`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `php1` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `php1`;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_body` text NOT NULL,
  `feedback_user` int(11) NOT NULL,
  `feedback_title` text NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (27,'asdfgfg',0,''),(29,'fdffffff',0,''),(30,'qwerty',0,'');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text NOT NULL,
  `news_preview` text NOT NULL,
  `news_content` text NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'<h2>Новость №1 Исправление</h2>\r\n','<h2>Предпросмотр новости №1</h2>\r\n','<p>Содержимое новости №1 Редактированная новость!!!!! Новая редакция</p>\r\n\r\n<p>Редактирование</p>\r\n'),(2,'<h2>Заголовок новости №2</h2>\r\n','<p>Краткое содержание новости №2</p>\r\n','<p>Содержание новости №2</p>\r\n'),(3,'<h2>CSS3 Анимация</h2>\r\n','<p>Для браузеров Chrome и Safari перед свойством требуется добавить префикс -webkit. Для создания анимации в CSS3 используется свойство @keyframes. Данное свойство представляет собой контейнер, в который должны помещаться различные свойства оформления.</p>\r\n','<h1>Эффекты перехода. Применение трансформации.</h1>\r\n\r\n<h2>CSS3 функции трансформирования</h2>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:623px\">\r\n	<tbody>\r\n		<tr>\r\n			<th>Функция</th>\r\n			<th>Описание</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>translate(x,y)</p>\r\n			</td>\r\n			<td>\r\n			<p>Смещает элемент от изначальной позиции по горизонтали и вертикали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>translateX(x)</p>\r\n			</td>\r\n			<td>\r\n			<p>Смещает элемент по горизонтали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>translateY(y)</p>\r\n			</td>\r\n			<td>\r\n			<p>Смещает элемент по вертикали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>scale(x,y)</p>\r\n			</td>\r\n			<td>\r\n			<p>Растягивает элемент по вертикали и горизонтали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>scaleX(x)</p>\r\n			</td>\r\n			<td>\r\n			<p>Растягивает элемент по горизонтали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>scaleY(y)</p>\r\n			</td>\r\n			<td>\r\n			<p>Растягивает элемент по вертикали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>rotate(градусы)</p>\r\n			</td>\r\n			<td>\r\n			<p>Поворачивает элемент по часовой стрелке.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>skew(x,y)</p>\r\n			</td>\r\n			<td>\r\n			<p>Скашивает элемент по горизонтали и вертикали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>skewX(x)</p>\r\n			</td>\r\n			<td>\r\n			<p>Скашивает элемент по горизонтали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>skewY(y)</p>\r\n			</td>\r\n			<td>\r\n			<p>Скашивает элемент по вертикали.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>matrix(x,x,x,x,x,x)</p>\r\n			</td>\r\n			<td>\r\n			<p>Совмещает все перечисленные выше методы в один.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `Fam` varchar(150) NOT NULL,
  `Ima` varchar(150) NOT NULL,
  `Otch` varchar(150) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `sport` varchar(10) NOT NULL,
  `turism` varchar(10) NOT NULL,
  `diving` varchar(10) NOT NULL,
  `travels` varchar(10) NOT NULL,
  `automobile` varchar(10) NOT NULL,
  `it` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'loign','pass','Фамилия','Имя','Отчество','7900-900-90-09','vvv@vvv.ru',21,'female','Комментарии','on','on','on','on','on','on'),(3,'admin','qwerty','Иванов','Иван','фывфыв','45434534','asdf@mail.ru',17,'female','Доп информация','on','on','on','on','on','on'),(4,'йцуккее','уцуцуц','','','','','',0,'female','','','','','','',''),(5,'йцуцйу','уцццуц','','','','','',0,'female','','','','','','',''),(6,'user','','','','','','',0,'female','','','','','','',''),(7,'aaaaa','','','','','','',0,'female','','','','','','',''),(8,'qwqwqw','','','','','','',0,'female','','','','','','',''),(9,'dddddd','','','','','','',0,'female','','','','','','',''),(10,'dddddd','','','','','','',0,'female','','','','','','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-02 23:00:06
