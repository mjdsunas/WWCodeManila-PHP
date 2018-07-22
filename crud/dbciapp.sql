/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbciapp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-23 01:23:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tblitem`
-- ----------------------------
DROP TABLE IF EXISTS `tblitem`;
CREATE TABLE `tblitem` (
  `image` varchar(50) DEFAULT 'avatar.png',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblitem
-- ----------------------------
INSERT INTO `tblitem` VALUES ('3.jpg', '3', 'bananas', '            ripe     banana       ', '2004', '4');
INSERT INTO `tblitem` VALUES ('4.jpg', '4', 'pearl', '        masarap        ', '50', '5');
INSERT INTO `tblitem` VALUES ('5.jpg', '5', 'Straberry', '        red and sweet s       ', '600', '6');
INSERT INTO `tblitem` VALUES ('8.png', '8', 'Melon', '               sdfsdf sdf sddfojjsd; sdfh slfhhlks hsdf               ', '56', '7');
INSERT INTO `tblitem` VALUES ('9.jpg', '9', 'banana', '         color orange na papaya         ', '12', '8');
INSERT INTO `tblitem` VALUES ('avatar.png', '10', 'avocado', 'color orange na papaya       ', '12', '9');
INSERT INTO `tblitem` VALUES ('avatar.png', '13', 'rtgthyrt', 'yrtyrty', '456', null);
