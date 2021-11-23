/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ web211 /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE web211;

DROP TABLE IF EXISTS cart;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'Create Time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'Update Time',
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `number` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS comments;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS orders;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `note` varchar(255) DEFAULT NULL,
  `number` int(10) unsigned DEFAULT NULL,
  `money` int(10) unsigned DEFAULT NULL,
  `is_paid` int(1) DEFAULT 0,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS payments;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS products;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `discount` int(10) unsigned DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `roles` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO cart(id,create_time,update_time,id_product,id_user,number) VALUES(13,'2021-11-22 12:12:04','2021-11-22 12:12:04',2,17,1);

INSERT INTO comments(id,create_time,update_time,id_product,id_user,content,is_deleted) VALUES(3,'2021-11-10 21:20:45','2021-11-10 21:20:45',1,18,'Goooood',0);

INSERT INTO orders(id,create_time,update_time,note,number,money,is_paid,id_product,id_user) VALUES(3,'2021-10-05 08:47:37','2021-10-05 08:47:37','mua2',3,600000,1,1,2),(4,'2021-10-05 08:48:01','2021-10-05 08:48:01','mua3',1,400000,1,2,2),(6,'2021-10-06 00:00:00','2021-10-06 00:00:00','mua5',2,150000,1,2,3),(7,'2021-10-07 00:00:00','2021-10-07 00:00:00','mua6',2,200000,1,1,3),(8,'2021-10-08 00:00:00','2021-10-08 00:00:00','mua7',2,800000,1,1,3),(9,'2021-10-09 00:00:00','2021-10-09 00:00:00','mua6',2,200000,1,1,3),(10,'2021-10-10 00:00:00','2021-10-10 00:00:00','mua6',2,200000,1,1,3),(11,'2021-10-11 00:00:00','2021-10-11 00:00:00','mua6',2,200000,1,1,3),(12,'2021-10-12 00:00:00','2021-10-12 00:00:00','mua6',2,500000,1,1,3),(13,'2021-10-05 10:18:33','2021-10-05 10:18:33','test',1,100000,1,1,3),(14,'2021-10-12 05:18:04','2021-10-12 05:18:04','mua12',2,900000,1,1,2),(15,'2021-10-09 08:07:47','2021-10-09 08:07:47',NULL,3,900000,1,1,2),(16,'2021-11-10 11:30:06','2021-11-10 11:30:06','test11',1,900000,1,1,18),(17,'2021-11-11 14:16:46','2021-11-11 14:16:46','test11',2,300000,1,1,18),(18,'2021-11-12 11:55:11','2021-11-12 11:55:11','test Nov12',1,399000,1,1,18),(19,'2021-11-12 11:56:29','2021-11-12 11:56:29','test Nov12-1',1,100000,1,2,18),(20,'2021-11-12 12:59:36','2021-11-12 12:59:36','saFSs',1,900000,1,2,18),(21,'2021-11-22 12:03:05','2021-11-22 12:03:05','mua',1,45000,0,1,17),(22,'2021-11-22 12:03:05','2021-11-22 12:03:05','mua',1,330000,0,2,17),(23,'2021-11-22 12:04:54','2021-11-22 12:04:54','mua',1,45000,0,1,17),(24,'2021-11-22 12:04:54','2021-11-22 12:04:54','mua',1,330000,0,2,17),(25,'2021-11-22 12:12:05','2021-11-22 12:12:05','mua',1,330000,0,2,17),(26,'2021-11-22 12:14:01','2021-11-22 12:14:01','mua',1,330000,0,2,17),(27,'2021-11-22 12:14:01','2021-11-22 12:14:01','mua',1,330000,0,2,17),(28,'2021-11-22 12:14:02','2021-11-22 12:14:02','mua',1,330000,0,2,17),(29,'2021-11-22 12:14:02','2021-11-22 12:14:02','mua',1,330000,0,2,17),(30,'2021-11-22 12:14:05','2021-11-22 12:14:05','mua',1,330000,0,2,17),(31,'2021-11-22 12:15:28','2021-11-22 12:15:28','mua',1,330000,0,2,17),(32,'2021-11-22 12:46:57','2021-11-22 12:46:57','mua',1,330000,0,2,17),(33,'2021-11-22 13:00:08','2021-11-22 13:00:08','mua',1,330000,0,2,17),(34,'2021-11-22 13:00:21','2021-11-22 13:00:21','mua',1,330000,0,2,17),(35,'2021-11-22 13:00:33','2021-11-22 13:00:33','mua',1,330000,0,2,17),(36,'2021-11-22 13:00:52','2021-11-22 13:00:52','mua',1,330000,0,2,17),(37,'2021-11-22 13:01:10','2021-11-22 13:01:10','mua',1,330000,0,2,17),(38,'2021-11-22 13:03:13','2021-11-22 13:03:13','mua',1,330000,0,2,17),(39,'2021-11-22 13:03:15','2021-11-22 13:03:15','mua',1,330000,0,2,17),(40,'2021-11-22 13:03:16','2021-11-22 13:03:16','mua',1,330000,0,2,17),(41,'2021-11-22 13:03:43','2021-11-22 13:03:43','mua',1,330000,0,2,17),(42,'2021-11-22 13:03:44','2021-11-22 13:03:44','mua',1,330000,0,2,17),(43,'2021-11-22 13:04:16','2021-11-22 13:04:16','mua',1,330000,0,2,17),(44,'2021-11-22 13:05:04','2021-11-22 13:05:04','mua',1,330000,0,2,17),(45,'2021-11-22 13:06:05','2021-11-22 13:06:05','mua',1,330000,0,2,17),(46,'2021-11-22 13:09:33','2021-11-22 13:09:33','mua',1,330000,0,2,17),(47,'2021-11-22 13:09:58','2021-11-22 13:09:58','mua',1,330000,0,2,17),(48,'2021-11-22 13:12:21','2021-11-22 13:12:21','mua',1,330000,0,2,17),(49,'2021-11-22 13:16:19','2021-11-22 13:16:19','mua',1,330000,0,2,17),(50,'2021-11-22 13:16:20','2021-11-22 13:16:20','mua',1,330000,0,2,17),(51,'2021-11-22 13:16:34','2021-11-22 13:16:34','mua',1,330000,0,2,17),(52,'2021-11-22 13:18:36','2021-11-22 13:18:36','mua',1,330000,0,2,17),(53,'2021-11-22 13:19:45','2021-11-22 13:19:45','mua',1,330000,0,2,17),(54,'2021-11-22 13:25:05','2021-11-22 13:25:05','mua',1,330000,0,2,17),(55,'2021-11-22 13:28:45','2021-11-22 13:28:45','mua',1,330000,0,2,17),(56,'2021-11-22 13:32:14','2021-11-22 13:32:14','mua',1,330000,0,2,17),(57,'2021-11-22 13:34:29','2021-11-22 13:34:29','mua',1,330000,0,2,17);

INSERT INTO payments(id,order_id,thanh_vien,money,note,vnp_response_code,code_vnpay,code_bank,time) VALUES(3,'1134065293','CT2',150000,'học phí','00','13407163','NCB','2020-10-22 23:00:00'),(4,'596509313','CT2',5000000,'học phí','00','13407176','NCB','2020-10-23 00:00:00'),(5,'70267166','CT2',5000000,'học phí','00','13407178','NCB','2020-10-23 00:00:00'),(6,'1672349048','CT1',150000,'học phí','00','13407729','NCB','2020-10-23 21:00:00'),(7,'619b39f52fd34','',297000,'Noi dung thanh toan','00','13637346','NCB','2021-11-22 13:00:00'),(8,'619b3d1e8c874','',297000,'Hoan','00','13637357','NCB','2021-11-22 13:00:00'),(9,'619b411096b7c','',297000,'Noi dung thanh toan','00','13637375','NCB','2021-11-22 14:00:00');

INSERT INTO products(id,create_time,update_time,type,name,number,description,price,discount,image,is_deleted) VALUES(1,'2021-09-27 09:53:35','2021-09-27 09:53:35','giải cảm','Bột Gừng Túi Lọc',2,'dùng để giải cảm',45000,10,'618de15c8ed5d.jpg',0),(2,'2021-09-27 09:54:38','2021-09-27 09:54:38','giải cảm','Combo Giải Cảm 1',5,'Combo giải cảm',330000,10,'combo1.jpg',0);
INSERT INTO users(id,create_time,update_time,username,password,name,email,address,roles,is_deleted) VALUES(2,'2021-09-27 09:31:13','2021-09-27 09:31:13','john','123123','John Nguyen','john@gmail.com','Test ',0,0),(3,'2021-09-27 09:32:23','2021-09-27 09:32:23','test','test','John Nguyen','1@gmail.com','test1',0,0),(17,'2021-11-08 06:25:56','2021-11-08 06:25:56','JohnHoan','$2y$10$Ci3SHgtte1/xPokCV1M5v.Z8CR2WjuXBwCMmnsXPeEF47kM5kz3Se','Nguyen John','nguyen@gmail.com','Ho Chi Minh city Viet Nam',0,0),(18,'2021-11-08 08:54:06','2021-11-08 08:54:06','Hoan1','$2y$10$umB141IP10hksK0.aJu5Ue7I8GBevtGuhdc09wZC.rurIYuVjygr2','Hoan','admin@gmail.com','aaaaaaaaaaaaaa',1,0),(19,'2021-11-09 08:14:39','2021-11-09 08:14:39','1','$2y$10$GteowiMRqxK5HrD9RYwAHejymVdrt4gO1u4jycUO6dCnnQVWTE7Iq','Test','121@gmail.com','AX',0,1),(20,'2021-11-11 14:07:28','2021-11-11 14:07:28','joinsdasda','$2y$10$x.Zi3jvDTSVVdD91zZ0rr.ZLBP27LZFW4O.ggQ.MXWOjWWSP6wzFu','','','',0,1),(21,'2021-11-12 11:28:04','2021-11-12 11:28:04','Test111','$2y$10$Ei6.ceCghTp2brmRDu2IauI1ghhXjkvb2WPE9TcF5mSB50MhR7VDG','test111','1@gmail.com','NA',1,1),(22,'2021-11-12 15:38:56','2021-11-12 15:38:56','das','$2y$10$yXG6z9X372N7.K8kK5OZqOMzU9L2PeUzxN.q4uO2/oxaP1VcFoFLu','sa','da','da',1,1),(23,'2021-11-12 15:40:32','2021-11-12 15:40:32','sda','$2y$10$hpGRIkHoXKSHmZlqKuuLlur9guMdE35jd2xdRf8GXpXJN6DmqJhQa','da','ads','da',1,1),(24,'2021-11-12 15:41:45','2021-11-12 15:41:45','xcz','$2y$10$VFyuA2r7Noauit8ksfez.euuMeoCtd7JCIarJnlFhDmbP6lKtD.9m','czxc','czx','czx',0,1),(25,'2021-11-12 16:38:31','2021-11-12 16:38:31','dsaadsda','$2y$10$mFy1EfEDBNwscfbzO2S0qOlkS.4UbsF5sInGbIGqjfKzEbrPEJc.S','dasdsa','dsads','dasda',0,1),(26,'2021-11-12 17:03:45','2021-11-12 17:03:45','sdasda','$2y$10$7P/Qpgh6kVNLMKzl8VvGGOUiivKZEfdFzONvLlApIdCk6lp7Dleyq','dads','2@gmail.com','dsads',0,0);