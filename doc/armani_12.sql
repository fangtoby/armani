/*
MySQL Data Transfer
Source Host: 127.1.1.0
Source Database: armani
Target Host: 127.1.1.0
Target Database: armani
Date: 2015-08-11 9:40:38 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2015 at 10:00 AM
-- Server version: 5.1.63
-- PHP Version: 5.2.17p1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `masterofglow_comeyes_cn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `createTime`, `updateTime`) VALUES
(0, 'masterofglow', '61185739c685afa80ab2c39850def3faddb62a9ba51b64afce2dc1dd1ce5e7f9', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`CityID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `CityName`, `isDel`) VALUES
(1, '北京', 0),
(2, '西安', 0),
(3, '沈阳', 0),
(4, '大连', 0),
(5, '长春', 0),
(6, '哈尔滨', 0),
(7, '天津', 0),
(8, '济南', 0),
(9, '上海', 0),
(10, '合肥', 0),
(11, '武汉', 0),
(12, '郑州', 0),
(13, '长沙', 0),
(14, '南京', 0),
(15, '无锡', 0),
(16, '常州', 0),
(17, '成都', 0),
(18, '乌鲁木齐', 0),
(19, '重庆', 0),
(20, '杭州', 0),
(21, '温州', 0),
(22, '宁波', 0),
(23, '贵阳', 0),
(24, '广州', 0),
(25, '深圳', 0),
(26, '其他城市', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daylimit`
--

CREATE TABLE IF NOT EXISTS `daylimit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `dayTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `daylimit`
--

INSERT INTO `daylimit` (`id`, `pid`, `count`, `dayTime`, `createTime`, `updateTime`, `isDel`) VALUES
(35, 2, 3, '2015-08-13 00:00:13', '2015-08-13 00:00:13', '2015-08-13 00:09:42', 0),
(34, 3, 11, '2015-08-12 21:53:03', '2015-08-12 21:53:03', '2015-08-12 23:58:44', 0),
(33, 2, 9, '2015-08-12 21:38:47', '2015-08-12 21:38:47', '2015-08-12 23:53:40', 0),
(32, 1, 11, '2015-08-12 21:32:00', '2015-08-12 21:32:00', '2015-08-12 23:56:39', 0),
(31, 2, 1, '2015-08-11 23:50:09', '2015-08-11 23:50:09', '2015-08-11 23:50:09', 0),
(30, 1, 1, '2015-08-11 20:47:10', '2015-08-11 20:47:10', '2015-08-11 20:47:10', 0),
(36, 3, 2, '2015-08-13 00:03:58', '2015-08-13 00:03:58', '2015-08-13 00:05:21', 0),
(37, 1, 1, '2015-08-13 00:09:12', '2015-08-13 00:09:12', '2015-08-13 00:09:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `createTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `pid`, `name`, `url`, `createTime`, `updateTime`, `isDelete`) VALUES
(1, 1, 'Nude', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', 0),
(2, 2, 'Gebe', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', 0),
(3, 1, 'Gebe', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hourlimit`
--

CREATE TABLE IF NOT EXISTS `hourlimit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `hourTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `hourlimit`
--

INSERT INTO `hourlimit` (`id`, `pid`, `count`, `hourTime`, `createTime`, `updateTime`, `isDel`) VALUES
(56, 1, 1, '2015-08-13 00:09:12', '2015-08-13 00:09:12', '2015-08-13 00:09:12', 0),
(55, 3, 2, '2015-08-13 00:03:58', '2015-08-13 00:03:58', '2015-08-13 00:05:21', 0),
(54, 2, 3, '2015-08-13 00:00:13', '2015-08-13 00:00:13', '2015-08-13 00:09:42', 0),
(53, 1, 2, '2015-08-12 23:35:29', '2015-08-12 23:35:29', '2015-08-12 23:56:39', 0),
(52, 3, 3, '2015-08-12 23:02:37', '2015-08-12 23:02:37', '2015-08-12 23:58:44', 0),
(51, 2, 4, '2015-08-12 23:01:13', '2015-08-12 23:01:13', '2015-08-12 23:53:40', 0),
(50, 2, 4, '2015-08-12 22:28:51', '2015-08-12 22:28:51', '2015-08-12 22:33:39', 0),
(49, 3, 7, '2015-08-12 22:22:25', '2015-08-12 22:22:25', '2015-08-12 22:54:17', 0),
(48, 1, 6, '2015-08-12 22:01:03', '2015-08-12 22:01:03', '2015-08-12 22:53:32', 0),
(47, 3, 1, '2015-08-12 21:53:03', '2015-08-12 21:53:03', '2015-08-12 21:53:03', 0),
(46, 2, 1, '2015-08-12 21:38:47', '2015-08-12 21:38:47', '2015-08-12 21:38:47', 0),
(45, 1, 3, '2015-08-12 21:32:00', '2015-08-12 21:32:00', '2015-08-12 21:47:37', 0),
(44, 2, 1, '2015-08-11 23:50:09', '2015-08-11 23:50:09', '2015-08-11 23:50:09', 0),
(43, 1, 1, '2015-08-11 20:47:10', '2015-08-11 20:47:10', '2015-08-11 20:47:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE IF NOT EXISTS `lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `marketId` int(11) DEFAULT NULL,
  `giftId` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `win` int(11) DEFAULT '0',
  `receive` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=401 ;

--
-- Dumping data for table `lottery`
--

INSERT INTO `lottery` (`id`, `uid`, `phone`, `cityId`, `marketId`, `giftId`, `from`, `type`, `createTime`, `updateTime`, `win`, `receive`) VALUES
(400, NULL, '13764793406', 9, 166, 2, 0, 0, '2015-08-13 00:09:42', '2015-08-13 00:09:42', 1, 0),
(399, NULL, '13795353588', 9, 25, 1, 0, 0, '2015-08-13 00:09:12', '2015-08-13 00:09:12', 1, 0),
(398, NULL, '13795353588', 9, 25, 2, 1, 0, '2015-08-13 00:07:27', '2015-08-13 00:07:27', 1, 0),
(397, NULL, '13764793406', 9, 166, 3, 1, 0, '2015-08-13 00:05:21', '2015-08-13 00:05:21', 1, 0),
(396, NULL, '15201916123', 9, 166, 3, 1, 0, '2015-08-13 00:03:58', '2015-08-13 00:03:58', 1, 0),
(395, NULL, '15201939590', 9, 25, 2, 0, 0, '2015-08-13 00:00:13', '2015-08-13 00:00:13', 1, 0),
(394, NULL, '15201939590', 9, 166, 3, 1, 0, '2015-08-12 23:58:44', '2015-08-12 23:58:44', 1, 0),
(393, NULL, '14782593339', 25, 167, 1, 1, 0, '2015-08-12 23:56:39', '2015-08-12 23:56:39', 1, 0),
(392, NULL, '15201916414', 25, 167, 2, 1, 0, '2015-08-12 23:53:40', '2015-08-12 23:53:40', 1, 0),
(391, NULL, '15201916413', 9, 166, 3, 0, 0, '2015-08-12 23:53:17', '2015-08-12 23:53:17', 1, 0),
(390, NULL, '15201916413', 25, 167, 2, 1, 0, '2015-08-12 23:37:55', '2015-08-12 23:37:55', 1, 0),
(389, NULL, '15201916319', 9, 25, 2, 0, 0, '2015-08-12 23:37:14', '2015-08-12 23:37:14', 1, 0),
(388, NULL, '15201916319', 9, 166, 1, 1, 0, '2015-08-12 23:35:29', '2015-08-12 23:35:29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `ShopID` int(11) NOT NULL,
  `CityID` int(11) DEFAULT NULL,
  `CounterManager` varchar(100) DEFAULT NULL,
  `DirectorName` varchar(100) DEFAULT NULL,
  `ShopAddress` varchar(200) DEFAULT NULL,
  `ShopCode` varchar(50) DEFAULT NULL,
  `ShopEmail` varchar(300) DEFAULT NULL,
  `ShopLocation_X` varchar(100) DEFAULT NULL,
  `ShopLocation_Y` varchar(100) DEFAULT NULL,
  `ShopName` varchar(200) DEFAULT NULL,
  `ShopPhone` varchar(100) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `prize` int(11) DEFAULT '1',
  `count` int(11) DEFAULT '0',
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`ShopID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`ShopID`, `CityID`, `CounterManager`, `DirectorName`, `ShopAddress`, `ShopCode`, `ShopEmail`, `ShopLocation_X`, `ShopLocation_Y`, `ShopName`, `ShopPhone`, `createTime`, `updateTime`, `prize`, `count`, `startTime`, `endTime`, `rate`, `isDel`) VALUES
(2, 1, '付珊珊', '马丽娜', '北京市朝阳区建国路87号新光天地一层化妆品', 'A30', 'gac.cn-bej.xinguang@lorealposasia.com', '116.484893', '39.915465', '北京新光', '010-65331980', '2015-08-10 22:24:58', '2015-08-10 22:24:58', 1, 0, '2015-08-07 00:00:00', '2015-08-26 00:00:00', 1, 0),
(3, 2, '宋海涛', '伍光瑜', '西安市莲湖区西大街1号世纪金花钟楼店', 'A80', 'gac.cn-xia.jinhua@lorealposasia.com', '108.952124', '34.266097', '西安金花', '029-87631788', NULL, NULL, 1, 0, '2015-08-12 00:00:00', '2015-08-27 00:00:00', 0.003, 0),
(4, 2, '尚琳', '伍光瑜', '西安市碑林区环城南路东段336号', 'AY0', 'gac.cn-xiajinhuazj@lorealposasia.com', '108.955125', '34.255908', '西安珠江', '029-89358142', '2015-08-07 08:35:53', '2015-08-07 08:35:53', 1, 0, '2015-08-15 00:00:00', '2015-08-22 00:00:00', 0.001, 0),
(5, 2, '雷蕾', '伍光瑜', '西安市解放市场6号', 'AU0', 'gac.cn-xia.kaiyuan@lorealposasia.com', '108.95479', '34.264919', '西安开元', '029-87367558', '2015-08-07 08:36:06', '2015-08-07 08:36:06', 1, 0, '2015-08-26 00:00:00', '2015-08-28 00:00:00', 0.003, 0),
(6, 3, '吴昊', '伍光瑜', '沈阳市和平区太原北街86号中兴商业大厦', 'AB0', 'gac.cn-shy.zhxing@lorealposasia.com', '123.407034', '41.798254', '沈阳中兴', '024--23402088', '2015-08-07 08:36:27', '2015-08-07 08:36:27', 1, 0, '2015-08-22 00:00:00', '2015-08-28 00:00:00', 0.001, 0),
(7, 4, '邓慧', '龙凤', '大连市清泥街57号', 'A50', 'gac.cn-dal.mycal@lorealposasia.com', '121.642079', '38.922058', '大连麦凯乐', '0411-82309497', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(8, 5, '李爽', '龙凤', '长春市朝阳区重庆路1255号卓展购物中心B座一层', 'AK0', 'gac.cn-chc.zhuozhan@lorealposasia.com', '125.327302', '43.897192', '长春卓展', '0431-88926129', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(9, 6, '高飞', '龙凤', '哈尔滨市道里区安隆街106号-1-6层', 'AG0', 'gac.cn-heb.zhuozhan@lorealposasia.com', '126.611515', '45.764437', '哈尔滨卓展', '0451-87736850', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(10, 3, 'NULL', '龙凤', '沈阳市沈河区北京街7-1号1楼', 'G20', 'gac.cn-shy.zhuozhan@lorealposasia.com', '123.440391', '41.813948', '沈阳卓展', 'NULL', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(11, 1, '王靖', '王超', '北京建国门外大街22号赛特购物中心', 'A00', 'gac.cn-bej.scitech@lorealposasia.com', '116.44825', '39.913757', '北京赛特', '010-65155078', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(12, 1, '刘靖', '王超', '北京市西城区复兴门内大街101号百盛购物中心', 'A90', 'gac.cn-bej.parkson@lorealposasia.com', '116.365199', '39.913708', '北京百盛', '010-66535601', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(13, 7, '陈燕', '王超', '天津市和平区解放路188号信达广场', 'AP0', 'tianjinhaixin1031@163.com ', '117.224512', '39.122932', '天津海信', '022-23198176', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(14, 8, '韩泽康', '王超', '济南市泺源大街66号银座商场', 'AQ0 ', 'gac.cn-jin.inzone@lorealposasia.com', '117.038079', '36.665898', '济南银座', '0531-81917879', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(15, 9, '李辰', '蔡小玲', '上海市南京西路1038号', 'A40', 'gac.cn-sha.isetan@lorealposasia.com', '121.46316', '31.234833', '上海梅陇镇', '021-62189115', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(16, 10, '康康', '蔡小玲', '合肥市庐阳区长江中路98号华侨广场10层', 'G10', 'gac.cn-hef.intime@lorealposasia.com', '117.299116', '31.868198', '合肥银泰', '0551-68106911', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(17, 11, '夏', '张慧', '武汉市解放大道688号武商广场', 'A60', 'gac.cn-wuh.plaza@lorealposasia.com', '114.275885', '30.586714', '武商广场', '027-85717100 ', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(18, 12, '张莹', '张慧', '郑州金水区人民路丹尼斯百货', 'AA0', 'gac.cn-zhz.dannis@lorealposasia.com', '113.681522', '34.763362', '郑州丹尼斯', '0371-66288525', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(19, 13, '张婧', '张慧', '长沙开福区中山路589号长沙万达广场百货楼', 'AR0', 'gac.cn-chs.wanda@lorealposasia.com', '112.976833', '28.205061', '长沙万达', '0731-83878546', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(20, 13, '方颖', '张慧', '长沙袁家岭友谊商店B座1楼', 'AX0', 'gac.cn-chs.youyi@lorealposasia.com', '113.004137', '28.201623', '长沙友谊', '0731-84624418', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(21, 14, '徐丽', '汪静', '南京市中山路18号德基广场', 'AM0', 'gac.cn-naj.deji@lorealposasia.com', '118.790823', '32.051916', '南京德基', '025-86777002', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(22, 14, '苏琼', '汪静', '南京市汉中路89号金鹰国际购物中心', 'A20', 'gac.cn-naj.goldeneg@lorealposasia.com', '118.787509', '32.047899', '南京金鹰', '025-84731009', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(23, 15, '钱璟', '汪静', '无锡市中山路343号', 'AN0', 'gac.cn-wux.eastall@lorealposasia.com', '120.305679', '31.582721', '无锡商业', '0510-82727073', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(24, 9, '李燕', '汪静', '上海市张杨路501号', 'AD0', 'gac.cn-sha.yaohan@lorealposasia.com', '121.547591', '31.227062', '上海八佰伴', '021-58352015', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(25, 9, '朱爱莲', '汪静', '上海静安区南京西路1618号', 'AT0', 'gac.cn-sha.sogo@lorealposasia.com', '121.452703', '31.229839', '上海久光', '021-52925253', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(26, 16, '高亮', '汪静', '常州市延陵西路95号', 'AO0', 'gac.cn-chz.taifu@lorealposasia.com', '119.96167', '31.784733', '常州泰富', '0519-86671017', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(27, 17, '小美', '马丽霞', '成都市人民东路59号仁和大厦', 'AC0', 'gac.cn-chd.renhe@lorealposasia.com', '104.075387', '30.663853', '成都仁和', '028-86665933', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(28, 17, '李渝', '马丽霞', '成都市青羊区二环路西二段19号', 'AJ0', 'gac.cn-chd.renhe2@lorealposasia.com', '104.027258', '30.668862', '成都仁和春天光华', '028-88240979', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(29, 17, '赵清华', '马丽霞', '成都市总府路15号', 'AH0', 'gac.cn-chd.wangfj@lorealposasia.com', '104.086343', '30.664272', '成都王府井', '028-86789585', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(30, 17, '倪金凤', '马丽霞', '成都市锦江区红星路三段1号成都国际金融中心商场L302-303及L401号', 'AV0', 'gac.cn-chd.lanecf@lorealposasia.com', '104.087387', '30.661111', '成都连卡佛', 'NULL', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(31, 18, '梁文娟', '马丽霞', '新疆乌鲁木齐市和平北路16号天山百货1楼', 'AL0', 'gac.cn-wlq.tianbai@lorealposasia.com', '87.627662', '43.800544', '乌鲁木齐天百', '0991-2337865', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(32, 19, '谢娟', '马丽霞', '重庆市江北区洋河路10号', 'AW0', 'gac.cn-chq.yuandong@lorealposasia.com', '106.540323', '29.584612', '重庆远东', '023-89076018', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(33, 17, '孙怡', '马丽霞', '成都市大科甲巷8号利都广场8座1F', 'AZ0', 'gac.cn-chdisetan@lorealposasia.com', '104.0861', '30.660475', '成都伊势丹', '028-86610807', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(34, 20, '尤方方', '章蔚', '杭州市武林广场1号杭州大厦', 'A10', 'gac.cn-hzh.tower@lorealposasia.com', '120.168117', '30.277779', '杭州大厦', '0571-85153750', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(35, 20, '郑卓娅', '章蔚', '杭州市延安路530号 ', 'AI0', 'gab-hangzhouyintai@126.com', '120.17021', '30.273841', '杭州银泰', '0571-85837007', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(36, 21, '徐密', '章蔚', '温州鹿城区解放南路荷花路口世贸群楼一楼', 'AS0', 'gac.cn-wzh.intime@lorealposasia.com', '120.671304', '28.01219', '温州银泰', '0577-88008599', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(37, 22, '刁璐烨', '章蔚', '宁波市和义路66号和义大道购物中心', 'AE0', 'gac.cn-nib.heyi@lorealposasia.com', '121.561137', '29.879792', '宁波和义', '0574-87526109', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(38, 23, '龙跻方', '章蔚', '贵阳市中华北路1号振华广场1楼', 'AF0', 'gac.cn-guy.guomao@lorealposasia.com', '106.717911', '26.590523', '贵阳国贸', '0851-5371539', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(39, 24, '谭慧敏', '章蔚', '广州市越秀区环市东路369号', 'G00', 'gac.cn-gzh.youyi@lorealposasia.com', '113.293482', '23.143952', '广州友谊', '020-83493441 ', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(166, 9, '赵静', '', '上海市南京东路228号', 'G80', 'gac.cn-sha.nwdawan@lorealposasia.com', '', '', '上海大丸', '13818008371', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(167, 25, '黄文婷', '', '深圳市福田区华强北茂业百货华强北店一楼阿玛尼柜台', 'G70', 'gac.cn-shz.nsmaoye2@lorealposasia.com', '', '', '深圳茂业', '0755-83996649', NULL, NULL, 1, 0, NULL, NULL, NULL, 0),
(174, 26, '', '', '', '000', '', '', '', '其它柜台', '', NULL, NULL, 1, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE IF NOT EXISTS `prize` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` text,
  `note` text,
  `count` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `rate` double DEFAULT '0.001',
  `hourNumber` int(11) DEFAULT '0',
  `dayNumber` int(11) DEFAULT '0',
  `type` int(11) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prize`
--

INSERT INTO `prize` (`id`, `name`, `note`, `count`, `number`, `rate`, `hourNumber`, `dayNumber`, `type`, `startTime`, `endTime`, `createTime`, `updateTime`, `isDel`) VALUES
(1, '明星底妆体验组合', '1ml x 1ml ', 30000, 13, 1, 30000, 30000, 0, '2015-08-05 00:00:00', '2015-09-05 00:00:00', '2015-08-07 10:43:38', '2015-08-13 00:09:12', 0),
(2, '大师造型粉底乳', '5ml ', 3000, 13, 1, 3000, 3000, 0, '2015-08-04 00:00:00', '2015-09-05 00:00:00', '2015-08-07 10:45:33', '2015-08-13 00:09:42', 0),
(3, ' 黑钥匙赋活水', '10ml', 800, 13, 1, 800, 800, 0, '2015-08-05 00:00:00', '2015-09-23 00:00:00', '2015-08-07 11:00:30', '2015-08-13 00:05:21', 0),
(4, ' 正品小滴管粉底液', NULL, 1, 0, 0.001, 10, 10, 1, '2015-08-04 20:41:39', '2015-08-27 20:41:43', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `subname` varchar(200) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `createTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `subname`, `url`, `createTime`, `updateTime`) VALUES
(1, 'Nude', 'nude is beautiflu', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23'),
(2, 'Gene', 'Gene is Beautflu', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `apercent` double DEFAULT NULL,
  `aset` int(11) DEFAULT NULL,
  `acount` int(11) DEFAULT '0',
  `bpercent` double DEFAULT NULL,
  `bset` int(11) DEFAULT NULL,
  `bcount` int(11) DEFAULT '0',
  `cpercent` double DEFAULT NULL,
  `cset` int(11) DEFAULT NULL,
  `ccount` int(11) DEFAULT '0',
  `dpercent` double DEFAULT NULL,
  `dset` int(11) DEFAULT NULL,
  `dcount` int(11) DEFAULT '0',
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `pid`, `apercent`, `aset`, `acount`, `bpercent`, `bset`, `bcount`, `cpercent`, `cset`, `ccount`, `dpercent`, `dset`, `dcount`, `startTime`, `endTime`, `createTime`, `updateTime`, `isDelete`) VALUES
(1, 1, 0.001, NULL, 0, 0.005, NULL, 0, 0.01, NULL, 0, 0.0002, NULL, 0, NULL, '2015-08-14 19:00:34', '2015-08-05 19:03:09', '2015-08-05 19:03:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sex` int(11) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `unionid` varchar(300) DEFAULT NULL,
  `headimgurl` text,
  `token` text,
  `expire_time` datetime DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `can_login` int(11) DEFAULT '1',
  `login_times` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `marketId` int(11) DEFAULT NULL,
  `isShare` int(11) DEFAULT '0',
  `countReward` int(11) DEFAULT '0',
  `path` int(11) DEFAULT NULL,
  `utm_source` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `sex`, `nickname`, `unionid`, `headimgurl`, `token`, `expire_time`, `phone`, `createTime`, `updateTime`, `can_login`, `login_times`, `product_id`, `detail_id`, `cityId`, `marketId`, `isShare`, `countReward`, `path`, `utm_source`) VALUES
(18, 2, '"\\u5b9d\\u74a8\\u2605\\u5f61Grace"', 'oPV4Ht9015L5vfJoUngGivRLfwP8', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDt8TmuMdLlXgLcJtDLSqgUk0UAk9LdQNWvl5ebVmoRliaSmC1cAEg45Tgyp5o87gKYWp6EDcG8fDw/0', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(17, 1, '"jay chang"', 'oPV4Ht1t5KaicP91GWw8nL_Fe63E', 'http://wx.qlogo.cn/mmopen/poV1g18lwGwtHpNXvQickT4IkHfX7xcoHg4AZ0AN63qJ4grLicBPoIoMxgWKiaeIqZuvMa93F3Mr79hBtlmLnKzQ6ibgNyc7oibA8/0', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(15, 1, '"\\ud83d\\ude05\\ud83d\\ude1d\\ud83d\\ude14\\ud83d\\ude1a\\ud83d\\ude10Yomi\\ud83d\\ude04\\ud83d\\udca6"', 'oPV4Ht7hM8LFcOB2LT8CAtTe1nw0', 'http://wx.qlogo.cn/mmopen/3sARqwhTOjHybkW7Q1icNxRoALVhRrXib47w4xwTW05nLRok83wJXJGNtiaqiaV4pFT3l8Kmnbr71glHNEjS7QROaibDlyl3zYXuJ/0', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(16, 2, '"\\u8881\\u94b0\\ud83d\\udc7d"', 'oPV4Ht0yokB6n-DEcr5JocRNPZv4', 'http://wx.qlogo.cn/mmopen/3sARqwhTOjHybkW7Q1icNxQtQsJfRZ1ZOPiap5Bsxd9pzWoMRbSNlMYa1sibruLLv00rd8sHdBkdVzaXrxEEn0fpwOKnFG2Y7Ix/0', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(19, 1, '"\\u6ed5\\u4f1f\\u2728Mario"', 'oPV4Ht66LizPUCFheRpo87-Gf7_Y', 'http://wx.qlogo.cn/mmopen/sc8lJYpicUaWibp6onbxgbdR5aapic6WFs0t2w6zGj8mUnfwGs2kYpB0gJf13bl2HG6f4vJRCk7nibq5xZEVqUMF8EJ3Ydnv178l/0', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(20, 2, '"Momo"', 'oPV4Ht4eIoP6d40cG4p-RLTF1oBc', 'http://wx.qlogo.cn/mmopen/poV1g18lwGzy75iaePx8hZKQicVNRgDjCl0qbK2icKrk7xePjkJW9f0w22bpFd7bs1xGf3QQtCkqxjopgdtnRH3HQ/0', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(21, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
