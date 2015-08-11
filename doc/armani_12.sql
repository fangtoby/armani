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
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for daylimit
-- ----------------------------
DROP TABLE IF EXISTS `daylimit`;
CREATE TABLE `daylimit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `dayTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
-- Table structure for hourlimit
-- ----------------------------
DROP TABLE IF EXISTS `hourlimit`;
CREATE TABLE `hourlimit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `hourTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isDel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lottery
-- ----------------------------
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for market
-- ----------------------------
DROP TABLE IF EXISTS `market`;
CREATE TABLE `market` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for prize
-- ----------------------------
DROP TABLE IF EXISTS `prize`;
CREATE TABLE `prize` (
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
-- Table structure for reward
-- ----------------------------
DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('0', 'masterofglow', '61185739c685afa80ab2c39850def3faddb62a9ba51b64afce2dc1dd1ce5e7f9', null, null);
INSERT INTO `city` VALUES ('1', '北京', '0');
INSERT INTO `city` VALUES ('2', '西安', '0');
INSERT INTO `city` VALUES ('3', '沈阳', '0');
INSERT INTO `city` VALUES ('4', '大连', '0');
INSERT INTO `city` VALUES ('5', '长春', '0');
INSERT INTO `city` VALUES ('6', '哈尔滨', '0');
INSERT INTO `city` VALUES ('7', '天津', '0');
INSERT INTO `city` VALUES ('8', '济南', '0');
INSERT INTO `city` VALUES ('9', '上海', '0');
INSERT INTO `city` VALUES ('10', '合肥', '0');
INSERT INTO `city` VALUES ('11', '武汉', '0');
INSERT INTO `city` VALUES ('12', '郑州', '0');
INSERT INTO `city` VALUES ('13', '长沙', '0');
INSERT INTO `city` VALUES ('14', '南京', '0');
INSERT INTO `city` VALUES ('15', '无锡', '0');
INSERT INTO `city` VALUES ('16', '常州', '0');
INSERT INTO `city` VALUES ('17', '成都', '0');
INSERT INTO `city` VALUES ('18', '乌鲁木齐', '0');
INSERT INTO `city` VALUES ('19', '重庆', '0');
INSERT INTO `city` VALUES ('20', '杭州', '0');
INSERT INTO `city` VALUES ('21', '温州', '0');
INSERT INTO `city` VALUES ('22', '宁波', '0');
INSERT INTO `city` VALUES ('23', '贵阳', '0');
INSERT INTO `city` VALUES ('24', '广州', '0');
INSERT INTO `city` VALUES ('25', '深圳', '0');
INSERT INTO `city` VALUES ('26', '其他城市', '0');
INSERT INTO `daylimit` VALUES ('2', '1', '2', '2015-08-09 08:30:46', '2015-08-09 08:30:46', '2015-08-09 08:30:53', '0');
INSERT INTO `detail` VALUES ('1', '1', 'Nude', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', '0');
INSERT INTO `detail` VALUES ('2', '2', 'Gebe', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', '0');
INSERT INTO `detail` VALUES ('3', '1', 'Gebe', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23', '0');
INSERT INTO `hourlimit` VALUES ('3', '1', '2', '2015-08-09 08:30:46', '2015-08-09 08:30:46', '2015-08-09 08:30:53', '0');
INSERT INTO `lottery` VALUES ('309', null, '14782593339', '1', '2', '1', '0', '0', '2015-08-09 08:30:46', '2015-08-09 08:30:46', '1');
INSERT INTO `lottery` VALUES ('310', null, '14782593339', '1', '2', '1', '1', '0', '2015-08-09 08:30:53', '2015-08-09 08:30:53', '1');
INSERT INTO `market` VALUES ('2', '1', '付珊珊', '马丽娜', '北京市朝阳区建国路87号新光天地一层化妆品', 'A30', 'gac.cn-bej.xinguang@lorealposasia.com', '116.484893', '39.915465', '北京新光', '010-65331980', '2015-08-07 07:54:34', '2015-08-08 18:16:22', '1', '0', '2015-08-07 00:00:00', '2015-08-26 00:00:00', '0.5', '0');
INSERT INTO `market` VALUES ('3', '2', '宋海涛', '伍光瑜', '西安市莲湖区西大街1号世纪金花钟楼店', 'A80', 'gac.cn-xia.jinhua@lorealposasia.com', '108.952124', '34.266097', '西安金花', '029-87631788', null, null, '1', '0', '2015-08-12 00:00:00', '2015-08-27 00:00:00', '0.003', '0');
INSERT INTO `market` VALUES ('4', '2', '尚琳', '伍光瑜', '西安市碑林区环城南路东段336号', 'AY0', 'gac.cn-xiajinhuazj@lorealposasia.com', '108.955125', '34.255908', '西安珠江', '029-89358142', '2015-08-07 08:35:53', '2015-08-07 08:35:53', '1', '0', '2015-08-15 00:00:00', '2015-08-22 00:00:00', '0.001', '0');
INSERT INTO `market` VALUES ('5', '2', '雷蕾', '伍光瑜', '西安市解放市场6号', 'AU0', 'gac.cn-xia.kaiyuan@lorealposasia.com', '108.95479', '34.264919', '西安开元', '029-87367558', '2015-08-07 08:36:06', '2015-08-07 08:36:06', '1', '0', '2015-08-26 00:00:00', '2015-08-28 00:00:00', '0.003', '0');
INSERT INTO `market` VALUES ('6', '3', '吴昊', '伍光瑜', '沈阳市和平区太原北街86号中兴商业大厦', 'AB0', 'gac.cn-shy.zhxing@lorealposasia.com', '123.407034', '41.798254', '沈阳中兴', '024--23402088', '2015-08-07 08:36:27', '2015-08-07 08:36:27', '1', '0', '2015-08-22 00:00:00', '2015-08-28 00:00:00', '0.001', '0');
INSERT INTO `market` VALUES ('7', '4', '邓慧', '龙凤', '大连市清泥街57号', 'A50', 'gac.cn-dal.mycal@lorealposasia.com', '121.642079', '38.922058', '大连麦凯乐', '0411-82309497', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('8', '5', '李爽', '龙凤', '长春市朝阳区重庆路1255号卓展购物中心B座一层', 'AK0', 'gac.cn-chc.zhuozhan@lorealposasia.com', '125.327302', '43.897192', '长春卓展', '0431-88926129', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('9', '6', '高飞', '龙凤', '哈尔滨市道里区安隆街106号-1-6层', 'AG0', 'gac.cn-heb.zhuozhan@lorealposasia.com', '126.611515', '45.764437', '哈尔滨卓展', '0451-87736850', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('10', '3', 'NULL', '龙凤', '沈阳市沈河区北京街7-1号1楼', 'G20', 'gac.cn-shy.zhuozhan@lorealposasia.com', '123.440391', '41.813948', '沈阳卓展', 'NULL', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('11', '1', '王靖', '王超', '北京建国门外大街22号赛特购物中心', 'A00', 'gac.cn-bej.scitech@lorealposasia.com', '116.44825', '39.913757', '北京赛特', '010-65155078', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('12', '1', '刘靖', '王超', '北京市西城区复兴门内大街101号百盛购物中心', 'A90', 'gac.cn-bej.parkson@lorealposasia.com', '116.365199', '39.913708', '北京百盛', '010-66535601', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('13', '7', '陈燕', '王超', '天津市和平区解放路188号信达广场', 'AP0', 'tianjinhaixin1031@163.com ', '117.224512', '39.122932', '天津海信', '022-23198176', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('14', '8', '韩泽康', '王超', '济南市泺源大街66号银座商场', 'AQ0 ', 'gac.cn-jin.inzone@lorealposasia.com', '117.038079', '36.665898', '济南银座', '0531-81917879', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('15', '9', '李辰', '蔡小玲', '上海市南京西路1038号', 'A40', 'gac.cn-sha.isetan@lorealposasia.com', '121.46316', '31.234833', '上海梅陇镇', '021-62189115', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('16', '10', '康康', '蔡小玲', '合肥市庐阳区长江中路98号华侨广场10层', 'G10', 'gac.cn-hef.intime@lorealposasia.com', '117.299116', '31.868198', '合肥银泰', '0551-68106911', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('17', '11', '夏', '张慧', '武汉市解放大道688号武商广场', 'A60', 'gac.cn-wuh.plaza@lorealposasia.com', '114.275885', '30.586714', '武商广场', '027-85717100 ', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('18', '12', '张莹', '张慧', '郑州金水区人民路丹尼斯百货', 'AA0', 'gac.cn-zhz.dannis@lorealposasia.com', '113.681522', '34.763362', '郑州丹尼斯', '0371-66288525', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('19', '13', '张婧', '张慧', '长沙开福区中山路589号长沙万达广场百货楼', 'AR0', 'gac.cn-chs.wanda@lorealposasia.com', '112.976833', '28.205061', '长沙万达', '0731-83878546', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('20', '13', '方颖', '张慧', '长沙袁家岭友谊商店B座1楼', 'AX0', 'gac.cn-chs.youyi@lorealposasia.com', '113.004137', '28.201623', '长沙友谊', '0731-84624418', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('21', '14', '徐丽', '汪静', '南京市中山路18号德基广场', 'AM0', 'gac.cn-naj.deji@lorealposasia.com', '118.790823', '32.051916', '南京德基', '025-86777002', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('22', '14', '苏琼', '汪静', '南京市汉中路89号金鹰国际购物中心', 'A20', 'gac.cn-naj.goldeneg@lorealposasia.com', '118.787509', '32.047899', '南京金鹰', '025-84731009', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('23', '15', '钱璟', '汪静', '无锡市中山路343号', 'AN0', 'gac.cn-wux.eastall@lorealposasia.com', '120.305679', '31.582721', '无锡商业', '0510-82727073', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('24', '9', '李燕', '汪静', '上海市张杨路501号', 'AD0', 'gac.cn-sha.yaohan@lorealposasia.com', '121.547591', '31.227062', '上海八佰伴', '021-58352015', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('25', '9', '朱爱莲', '汪静', '上海静安区南京西路1618号', 'AT0', 'gac.cn-sha.sogo@lorealposasia.com', '121.452703', '31.229839', '上海久光', '021-52925253', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('26', '16', '高亮', '汪静', '常州市延陵西路95号', 'AO0', 'gac.cn-chz.taifu@lorealposasia.com', '119.96167', '31.784733', '常州泰富', '0519-86671017', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('27', '17', '小美', '马丽霞', '成都市人民东路59号仁和大厦', 'AC0', 'gac.cn-chd.renhe@lorealposasia.com', '104.075387', '30.663853', '成都仁和', '028-86665933', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('28', '17', '李渝', '马丽霞', '成都市青羊区二环路西二段19号', 'AJ0', 'gac.cn-chd.renhe2@lorealposasia.com', '104.027258', '30.668862', '成都仁和春天光华', '028-88240979', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('29', '17', '赵清华', '马丽霞', '成都市总府路15号', 'AH0', 'gac.cn-chd.wangfj@lorealposasia.com', '104.086343', '30.664272', '成都王府井', '028-86789585', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('30', '17', '倪金凤', '马丽霞', '成都市锦江区红星路三段1号成都国际金融中心商场L302-303及L401号', 'AV0', 'gac.cn-chd.lanecf@lorealposasia.com', '104.087387', '30.661111', '成都连卡佛', 'NULL', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('31', '18', '梁文娟', '马丽霞', '新疆乌鲁木齐市和平北路16号天山百货1楼', 'AL0', 'gac.cn-wlq.tianbai@lorealposasia.com', '87.627662', '43.800544', '乌鲁木齐天百', '0991-2337865', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('32', '19', '谢娟', '马丽霞', '重庆市江北区洋河路10号', 'AW0', 'gac.cn-chq.yuandong@lorealposasia.com', '106.540323', '29.584612', '重庆远东', '023-89076018', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('33', '17', '孙怡', '马丽霞', '成都市大科甲巷8号利都广场8座1F', 'AZ0', 'gac.cn-chdisetan@lorealposasia.com', '104.0861', '30.660475', '成都伊势丹', '028-86610807', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('34', '20', '尤方方', '章蔚', '杭州市武林广场1号杭州大厦', 'A10', 'gac.cn-hzh.tower@lorealposasia.com', '120.168117', '30.277779', '杭州大厦', '0571-85153750', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('35', '20', '郑卓娅', '章蔚', '杭州市延安路530号 ', 'AI0', 'gab-hangzhouyintai@126.com', '120.17021', '30.273841', '杭州银泰', '0571-85837007', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('36', '21', '徐密', '章蔚', '温州鹿城区解放南路荷花路口世贸群楼一楼', 'AS0', 'gac.cn-wzh.intime@lorealposasia.com', '120.671304', '28.01219', '温州银泰', '0577-88008599', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('37', '22', '刁璐烨', '章蔚', '宁波市和义路66号和义大道购物中心', 'AE0', 'gac.cn-nib.heyi@lorealposasia.com', '121.561137', '29.879792', '宁波和义', '0574-87526109', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('38', '23', '龙跻方', '章蔚', '贵阳市中华北路1号振华广场1楼', 'AF0', 'gac.cn-guy.guomao@lorealposasia.com', '106.717911', '26.590523', '贵阳国贸', '0851-5371539', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('39', '24', '谭慧敏', '章蔚', '广州市越秀区环市东路369号', 'G00', 'gac.cn-gzh.youyi@lorealposasia.com', '113.293482', '23.143952', '广州友谊', '020-83493441 ', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('166', '9', '赵静', '', '上海市南京东路228号', 'G80', 'gac.cn-sha.nwdawan@lorealposasia.com', '', '', '上海大丸', '13818008371', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('167', '25', '黄文婷', '', '深圳市福田区华强北茂业百货华强北店一楼阿玛尼柜台', 'G70', 'gac.cn-shz.nsmaoye2@lorealposasia.com', '', '', '深圳茂业', '0755-83996649', null, null, '1', '0', null, null, null, '0');
INSERT INTO `market` VALUES ('174', '26', '', '', '', '000', '', '', '', '其它柜台', '', null, null, '1', '0', null, null, null, '0');
INSERT INTO `prize` VALUES ('1', '明星底妆体验组合', '1ml x 1ml ', '30000', '4', '0.5', '100', '1000', '0', '2015-08-05 00:00:00', '2015-08-21 00:00:00', '2015-08-07 10:43:38', '2015-08-09 08:30:53', '0');
INSERT INTO `prize` VALUES ('2', '大师造型粉底乳', '5ml ', '3000', '0', '0.5', '50', '1400', '0', '2015-08-04 00:00:00', '2015-08-07 00:00:00', '2015-08-07 10:45:33', '2015-08-08 17:13:34', '0');
INSERT INTO `prize` VALUES ('3', ' 黑钥匙赋活水', '10ml', '800', '0', '0.5', '10', '20', '0', '2015-08-05 00:00:00', '2015-08-07 00:00:00', '2015-08-07 11:00:30', '2015-08-08 17:13:26', '0');
INSERT INTO `prize` VALUES ('4', ' 正品小滴管粉底液', null, '1', '0', '0.001', '10', '10', '1', '2015-08-04 20:41:39', '2015-08-27 20:41:43', null, null, '0');
INSERT INTO `product` VALUES ('1', 'Nude', 'nude is beautiflu', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23');
INSERT INTO `product` VALUES ('2', 'Gene', 'Gene is Beautflu', '/images/list/logo.png', '2015-07-21 14:10:23', '2015-07-21 14:10:23');
INSERT INTO `reward` VALUES ('1', '1', '0.001', null, '0', '0.005', null, '0', '0.01', null, '0', '0.0002', null, '0', null, '2015-08-14 19:00:34', '2015-08-05 19:03:09', '2015-08-05 19:03:12', '0');
INSERT INTO `user` VALUES ('5', '2', '袁钰', 'oPV4Ht0yokB6n-DEcr5JocRNPZv4', 'http://wx.qlogo.cn/mmopen/3sARqwhTOjHybkW7Q1icNxQtQsJfRZ1ZOPiap5Bsxd9pzWoMRbSNlMYa1sibruLLv00rd8sHdBkdVzaXrxEEn0fpwOKnFG2Y7Ix/0', null, null, null, null, null, '1', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `user` VALUES ('6', '1', 'Yomi', 'oPV4Ht7hM8LFcOB2LT8CAtTe1nw0', 'http://wx.qlogo.cn/mmopen/3sARqwhTOjHybkW7Q1icNxRoALVhRrXib47w4xwTW05nLRok83wJXJGNtiaqiaV4pFT3l8Kmnbr71glHNEjS7QROaibDlyl3zYXuJ/0', null, null, null, null, null, '1', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `user` VALUES ('7', null, null, null, null, null, null, null, null, null, '1', '0', null, null, null, null, '0', '0', null, null);
