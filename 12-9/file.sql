/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : file

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2020-12-09 16:21:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) NOT NULL,
  `size` int(20) NOT NULL,
  `time` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('1', 'contact_us_05.png', '1542', '1607480933');
INSERT INTO `files` VALUES ('2', 'contact_us_04.png', '426365', '1607481205');
INSERT INTO `files` VALUES ('3', 'banner1_05.png', '7623', '1607481395');
INSERT INTO `files` VALUES ('4', 'contact_us_03.png', '2052', '1607499618');
INSERT INTO `files` VALUES ('5', 'about_us_06.png', '1452', '1607501782');
INSERT INTO `files` VALUES ('6', 'index_17.png', '1048', '1607501828');
INSERT INTO `files` VALUES ('7', 'about_us_06 - 副本.png', '1452', '1607501861');
