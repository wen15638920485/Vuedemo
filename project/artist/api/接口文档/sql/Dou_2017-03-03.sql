# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.9)
# Database: Dou
# Generation Time: 2017-03-03 05:00:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dou_banner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_banner`;

CREATE TABLE `dou_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) DEFAULT NULL,
  `location` varchar(1024) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table dou_book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_book`;

CREATE TABLE `dou_book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `author` varchar(128) DEFAULT NULL,
  `price` varchar(128) DEFAULT NULL,
  `introduce` varchar(1024) DEFAULT NULL,
  `catalog` varchar(1024) DEFAULT NULL,
  `publisher` varchar(128) DEFAULT NULL,
  `pubdate` varchar(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dou_book` WRITE;
/*!40000 ALTER TABLE `dou_book` DISABLE KEYS */;

INSERT INTO `dou_book` (`id`, `name`, `image`, `author`, `price`, `introduce`, `catalog`, `publisher`, `pubdate`, `rating`)
VALUES
	(1,'疯子的自由','images/sea.jpg','弗朗索瓦.勒洛尔','85','看到那位老人仰望天空惊叹的样子，我明白了我为什么会有这么强烈的愿望去释放精神病患。他应该很久没有听到别人教他的名字，我们可以想想这样的凄凉吗？',NULL,'生活.读书.新知三联书店','2016-9',90),
	(2,'半面维纳斯','images/半面维纳斯.jpg','BENJAMIN','67.6','故事聚焦于大城市中生活的年轻女性，着力描绘“平凡女孩”的爱情和生活状态，真实又梦幻，阴暗又鲜活，这种对美的发现以小见大的折射出中国当代女孩的生存现状','No.1 你的眼，你的腿 No.2 少女 No.3 明天','江苏凤凰文艺出版社','2016-9',93),
	(3,'丹麦女孩','images/丹麦女孩','大卫.埃贝尔舍夫','32.8','是一部关于爱与勇气的书，写给所有敢于追求真爱和活出自我的人。','','南海出版公司','2016-10-1',88);

/*!40000 ALTER TABLE `dou_book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dou_favorite
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_favorite`;

CREATE TABLE `dou_favorite` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `mediaId` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dou_favorite` WRITE;
/*!40000 ALTER TABLE `dou_favorite` DISABLE KEYS */;

INSERT INTO `dou_favorite` (`id`, `userId`, `mediaId`, `type`)
VALUES
	(3,6,1,1),
	(4,6,2,1),
	(5,6,3,1),
	(6,6,200000,3),
	(7,6,200001,3),
	(8,6,300000,2),
	(9,6,300001,2),
	(11,1,1,1);

/*!40000 ALTER TABLE `dou_favorite` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dou_film
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_film`;

CREATE TABLE `dou_film` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `introduce` varchar(1024) DEFAULT NULL,
  `pubdate` varchar(128) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `price` varchar(128) DEFAULT NULL,
  `rating` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `director` varchar(128) DEFAULT NULL,
  `actor` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dou_film` WRITE;
/*!40000 ALTER TABLE `dou_film` DISABLE KEYS */;

INSERT INTO `dou_film` (`id`, `name`, `introduce`, `pubdate`, `image`, `price`, `rating`, `time`, `director`, `actor`)
VALUES
	(200000,'机械师2：复活','系列电影《机械师》第一部中，假装死亡的顶级杀手亚瑟','2016-10-21',NULL,'280','57',98,'丹尼斯.甘塞','杰森.斯坦森'),
	(200001,'湄公河行动','2011年10月5日，两艘中国商船在湄公河金三角水域遭遇袭击','2016-09-30',NULL,'330','82',124,'林超贤','张涵予，彭于晏'),
	(200002,'侠探杰克：永不回头','这部最新小说里，除了主人公杰克外','2016-10-21',NULL,'230','62',118,'爱德华.兹威','汤姆.克鲁斯');

/*!40000 ALTER TABLE `dou_film` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dou_music
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_music`;

CREATE TABLE `dou_music` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `introduce` varchar(1024) DEFAULT NULL,
  `artist` varchar(128) DEFAULT NULL,
  `pubdate` varchar(128) DEFAULT NULL,
  `rating` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dou_music` WRITE;
/*!40000 ALTER TABLE `dou_music` DISABLE KEYS */;

INSERT INTO `dou_music` (`id`, `name`, `image`, `introduce`, `artist`, `pubdate`, `rating`)
VALUES
	(300000,'那年火热的八月',NULL,'我一直想翻唱儿歌，去年和乐队录了这几首','李志','2016-10-18','62'),
	(300001,'火炭麗琪',NULL,'My Little Airport 表示第八张大碟《火炭麗琪》是张[纯爱专辑]','My Little  Airport','2016-09-15','82'),
	(300002,'年轮说',NULL,'时间是我们巨大的商人在时间面前我们只能卑微的献出一切','杨丞琳','2016-09-30','70');

/*!40000 ALTER TABLE `dou_music` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dou_rating
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_rating`;

CREATE TABLE `dou_rating` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `mediaId` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dou_rating` WRITE;
/*!40000 ALTER TABLE `dou_rating` DISABLE KEYS */;

INSERT INTO `dou_rating` (`id`, `userId`, `mediaId`, `rating`)
VALUES
	(4,24123,2,8),
	(5,1,1,5);

/*!40000 ALTER TABLE `dou_rating` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dou_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dou_user`;

CREATE TABLE `dou_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(1024) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `nickname` varchar(1024) DEFAULT NULL,
  `sign` varchar(1024) DEFAULT NULL,
  `level` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dou_user` WRITE;
/*!40000 ALTER TABLE `dou_user` DISABLE KEYS */;

INSERT INTO `dou_user` (`id`, `username`, `password`, `image`, `nickname`, `sign`, `level`, `phone`)
VALUES
	(6,'zz','5555',NULL,NULL,NULL,NULL,'1361111222');

/*!40000 ALTER TABLE `dou_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
