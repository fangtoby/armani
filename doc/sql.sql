/*
MySQL Data Transfer
Source Host: localhost
Source Database: armani
Target Host: localhost
Target Database: armani
Date: 2015/7/21 16:43:14
*/

create database hello;

use hello;

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `createTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for market
-- ----------------------------
DROP TABLE IF EXISTS `market`;
CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `subname` varchar(200) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `createTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `expire_time` datetime NOT NULL,
  `phone` varchar(100) NOT NULL,
  `createTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  `can_login` int(11) NOT NULL DEFAULT '1',
  `login_times` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `marketId` int(11) DEFAULT NULL,
  `isShare` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `detail` VALUES ('1', '1', 'Nude', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', '0');
INSERT INTO `detail` VALUES ('2', '2', 'Gebe', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', '0');
INSERT INTO `detail` VALUES ('3', '1', 'Gebe', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', '0');
INSERT INTO `product` VALUES ('1', 'Nude', 'nude is beautiflu', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23');
INSERT INTO `product` VALUES ('2', 'Gene', 'Gene is Beautflu', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23');
INSERT INTO `user` VALUES ('3', '^*&fhug(*&ye(r*)e(*uf)(ds', '2015-07-21 16:02:02', '14782593339', '2015-07-21 16:02:10', '2015-07-21 16:02:13', '1', '0', null, null, '23', '32', null);
