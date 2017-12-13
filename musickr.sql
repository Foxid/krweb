/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : musickr

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-06 21:06:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `music`
-- ----------------------------
DROP TABLE IF EXISTS `music`;
CREATE TABLE `music` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artist` varchar(32) COLLATE cp1251_bin NOT NULL,
  `genre` varchar(32) COLLATE cp1251_bin NOT NULL,
  `file` varchar(200) COLLATE cp1251_bin DEFAULT NULL,
  `title` varchar(32) COLLATE cp1251_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

-- ----------------------------
-- Records of music
-- ----------------------------
INSERT INTO `music` VALUES ('1', 'NBSPLV', 'unknown', '9e7e10ec46d2dd.mp3', 'too late');
INSERT INTO `music` VALUES ('2', 'NBSPLV', 'unknow', 'daa7b9e032ce54.mp3', 'redox');
INSERT INTO `music` VALUES ('3', 'Teste', 'Rock', '9e7e10ec46d2dd.mp3', 'test');
