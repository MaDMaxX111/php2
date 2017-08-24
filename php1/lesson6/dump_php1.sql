-- MySQL dump 10.13  Distrib 5.5.48, for Win64 (x86)
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
INSERT INTO `news` VALUES (1,'Новость №1','Предпросмотр новости №1','Содержимое новости №1'),(2,'Заголовок новости №2','Краткое содержание новости №2','Содержание новости №2'),(3,'CSS3 Анимация','Для браузеров Chrome и Safari перед свойством требуется добавить префикс -webkit.\r\nДля создания анимации в CSS3 используется свойство @keyframes.\r\nДанное свойство представляет собой контейнер, в который должны помещаться различные свойства оформления.','<h1>Эффекты перехода. Применение трансформации.</h1>\r\n \r\n <h2> CSS3 функции трансформирования</h2>\r\n<table border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"623\">\r\n  <tr>\r\n    <th>Функция </th>\r\n    <th width=\"443\">Описание</th>\r\n  </tr>\r\n  <tr>\r\n    <td><p>translate(x,y)</p></td>\r\n    <td width=\"443\"><p>Смещает элемент от изначальной позиции по горизонтали и вертикали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>translateX(x)</p></td>\r\n    <td width=\"443\"><p>Смещает элемент по горизонтали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>translateY(y)</p></td>\r\n    <td width=\"443\"><p>Смещает элемент по вертикали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>scale(x,y)</p></td>\r\n    <td width=\"443\"><p>Растягивает элемент по вертикали и горизонтали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>scaleX(x)</p></td>\r\n    <td width=\"443\"><p>Растягивает элемент по горизонтали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>scaleY(y)</p></td>\r\n    <td width=\"443\"><p>Растягивает элемент по вертикали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>rotate(градусы)</p></td>\r\n    <td width=\"443\"><p>Поворачивает элемент по часовой стрелке.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>skew(x,y)</p></td>\r\n    <td width=\"443\"><p>Скашивает элемент по горизонтали и вертикали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>skewX(x)</p></td>\r\n    <td width=\"443\"><p>Скашивает элемент по горизонтали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>skewY(y)</p></td>\r\n    <td width=\"443\"><p>Скашивает элемент по вертикали.</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p>matrix(x,x,x,x,x,x)</p></td>\r\n    <td width=\"443\"><p>Совмещает все перечисленные выше методы в один.</p></td>\r\n  </tr>\r\n</table>');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-18 14:32:49
