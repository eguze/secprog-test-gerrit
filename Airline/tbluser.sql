/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50130
Source Host           : localhost:3306
Source Database       : airline

Target Server Type    : MYSQL
Target Server Version : 50130
File Encoding         : 65001

Date: 2015-06-27 09:43:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `UserType` char(1) NOT NULL DEFAULT '',
  `Description` varchar(255) NOT NULL DEFAULT '',
  `Interface` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`UserType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('A', 'Admin', 'admin.php');
INSERT INTO `category` VALUES ('M', 'Member', 'member.php');

-- ----------------------------
-- Table structure for `flight`
-- ----------------------------
DROP TABLE IF EXISTS `flight`;
CREATE TABLE `flight` (
  `Code` int(4) NOT NULL AUTO_INCREMENT,
  `Origin` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `LowFare` varchar(10) NOT NULL,
  `PremiumFlex` varchar(10) NOT NULL,
  `DepartTime` varchar(10) NOT NULL,
  `ArriveTime` varchar(10) NOT NULL,
  `Duration` varchar(10) NOT NULL,
  PRIMARY KEY (`Code`),
  KEY `Loct` (`Origin`),
  KEY `Loct2` (`Destination`),
  CONSTRAINT `Loct` FOREIGN KEY (`Origin`) REFERENCES `locate` (`Origin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Loct2` FOREIGN KEY (`Destination`) REFERENCES `locate` (`Origin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1123 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of flight
-- ----------------------------
INSERT INTO `flight` VALUES ('1000', 'Johor Bahru (JHB)        ', 'Kota Kinabalu (BKI)        ', '99.00', '238.17', '07:25', '09:45', '2h 20m');
INSERT INTO `flight` VALUES ('1001', 'Kota Kinabalu (BKI)', 'Johor Bahru (JHB)', '99.00', '234.99', '10:10', '12:25', '2h 15m');
INSERT INTO `flight` VALUES ('1002', 'Johor Bahru (JHB)', 'Kuala Lumpur (KUL)', '39.01', '165.00', '07:10', '08:00', '50m');
INSERT INTO `flight` VALUES ('1003', 'Kuala Lumpur (KUL)', 'Johor Bahru (JHB)', '39.01', '165.00', '08:25', '09:15', '50m');
INSERT INTO `flight` VALUES ('1004', 'Johor Bahru (JHB)', 'Kuching (KCH)', '69.01', '204.99', '07:00', '08:25', '1h 25m');
INSERT INTO `flight` VALUES ('1005', 'Kuching (KCH)', 'Johor Bahru (JHB)', '69.01', '204.99', '08:50', '10:15', '1h 25m');
INSERT INTO `flight` VALUES ('1006', 'Johor Bahru (JHB)', 'Miri (MYY)', '99.00', '245.00', '13:15', '15.10', '1h 55m');
INSERT INTO `flight` VALUES ('1007', 'Miri (MYY)', 'Johor Bahru (JHB)', '99.00', '245.00', '15:35', '17:30', '1h 55m');
INSERT INTO `flight` VALUES ('1008', 'Johor Bahru (JHB)', 'Penang (PEN)', '69.01', '204.99', '08:50', '10:00', '1h 10m');
INSERT INTO `flight` VALUES ('1009', 'Penang (PEN)', 'Johor Bahru (JHB)', '69.01', '204.99', '07:15', '08:25', '1h 10m');
INSERT INTO `flight` VALUES ('1010', 'Johor Bahru (JHB)', 'Sibu (SBW)', '79.00', '234.99', '09:45', '11.25', '1h 40m');
INSERT INTO `flight` VALUES ('1011', 'Sibu (SBW)', 'Johor Bahru (JHB)', '128.99', '234.99', '11:50', '13.25', '1h 40m');
INSERT INTO `flight` VALUES ('1012', 'Johor Bahru (JHB)', 'Kota Kinabalu (BKI)', '152.17', '258.17', '07:25', '09.45', '2h 20m');
INSERT INTO `flight` VALUES ('1013', 'Johor Bahru (JHB)', 'Kota Kinabalu (BKI)', '186.18', '292.17', '14:35', '16:55', '2h 20m');
INSERT INTO `flight` VALUES ('1014', 'Alor Setar (AOR) ', 'Kuala Lumpur (KUL) ', '128.00', '234.00', '08:35', '09:35', '1h');
INSERT INTO `flight` VALUES ('1015', 'Alor Setar (AOR) ', 'Kuala Lumpur (KUL) ', '78.99', '184.99', '21:45', '22:50', '1h 5m');
INSERT INTO `flight` VALUES ('1016', 'Bintulu (BTU)', 'Kuala Lumpur (KUL)', '254.99', '360.99', '09:20', '11:20', '2h');
INSERT INTO `flight` VALUES ('1017', 'Bintulu (BTU)', 'Kuala Lumpur (KUL)', '212.00', '318.00', '19:45', '21:45', '2h');
INSERT INTO `flight` VALUES ('1018', 'Bintulu (BTU)', 'Kuching (KCH)', '109.00', '215.00', '10:45', '11:35', '50m');
INSERT INTO `flight` VALUES ('1019', 'Bintulu (BTU)', 'Kuching (KCH)', '89.00', '195.00', '17:55', '18:45', '50m');
INSERT INTO `flight` VALUES ('1020', 'Johor Bahru (JHB)', 'Kuala Lumpur (KUL)', '101.99', '207.99', '07:10', '08:00', '50m');
INSERT INTO `flight` VALUES ('1021', 'Johor Bahru (JHB)', 'Kuala Lumpur (KUL)', '59.00', '165.00', '22:05', '23:00', '55m');
INSERT INTO `flight` VALUES ('1022', 'Johor Bahru (JHB)', 'Kuching (KCH)', '119.00', '225.00', '07:00', '08:25', '1h 25m');
INSERT INTO `flight` VALUES ('1023', 'Johor Bahru (JHB)', 'Kuching (KCH)', '181.99', '287.99', '17:00', '18:25', '1h 25m');
INSERT INTO `flight` VALUES ('1024', 'Johor Bahru (JHB)', 'Miri (MYY)', '178.54', '284.54', '13:15', '15:10', '1h 55m');
INSERT INTO `flight` VALUES ('1025', 'Johor Bahru (JHB)', 'Penang (PEN)', '171.00', '277.00', '08:50', '10:00', '1h 10m');
INSERT INTO `flight` VALUES ('1026', 'Johor Bahru (JHB)', 'Penang (PEN)', '98.99', '204.99', '20:40', '21:50', '1h 10m');
INSERT INTO `flight` VALUES ('1027', 'Johor Bahru (JHB)', 'Sibu (SBW)', '79.00', '234.99', '09:45', '11:25', '1h 40m');
INSERT INTO `flight` VALUES ('1028', 'Johor Bahru (JHB)', 'Sibu (SBW)', '128.99', '234.99', '17:40', '19:20', '1h 40m');
INSERT INTO `flight` VALUES ('1029', 'Johor Bahru (JHB)', 'Tawau (TWU)', '202.99', '308.99', '10:40', '13:20', '2h 40m');
INSERT INTO `flight` VALUES ('1030', 'Kota Bharu (KBR)', 'Kuala Lumpur (KUL)', '255.99', '361.99', '09:25', '10:25', '1h');
INSERT INTO `flight` VALUES ('1031', 'Kota Bharu (KBR)', 'Kuala Lumpur (KUL)', '351.00', '510.00', '18:55', '19:55', '1h');
INSERT INTO `flight` VALUES ('1032', 'Kota Kinabalu (BKI)', 'Johor Bahru (JHB)', '327.00', '433.00', '10:10', '12:25', '2h 15m');
INSERT INTO `flight` VALUES ('1033', 'Kota Kinabalu (BKI)', 'Johor Bahru (JHB)', '327.00', '433.00', '17:20', '19:35', '2h 15m');
INSERT INTO `flight` VALUES ('1034', 'Kota Kinabalu (BKI)', 'Kuala Lumpur (KUL)', '320.82', '426.82', '09:30', '12:00', '2h 30m');
INSERT INTO `flight` VALUES ('1035', 'Kota Kinabalu (BKI)', 'Kuala Lumpur (KUL)', '262.82', '368.82', '15:45', '18:15', '2h 30m');
INSERT INTO `flight` VALUES ('1036', 'Kota Kinabalu (BKI)', 'Kuching (KCH)', '355.00', '514.00', '15:30', '16:55', '1h 25m');
INSERT INTO `flight` VALUES ('1037', 'Kota Kinabalu (BKI)', 'Kuching (KCH)', '192.00', '298.00', '22:30', '23:55', '1h 25m');
INSERT INTO `flight` VALUES ('1038', 'Kota Kinabalu (BKI)', 'Miri (MYY)', '69.00', '175.00', '08:45', '09:35', '50m');
INSERT INTO `flight` VALUES ('1039', 'Kota Kinabalu (BKI)', 'Miri (MYY)', '69.00', '175.00', '19:30', '20:20', '50m');
INSERT INTO `flight` VALUES ('1040', 'Kuala Lumpur (KUL) ', 'Alor Setar (AOR) ', '255.99', '361.99', '07:10', '08:10', '1h');
INSERT INTO `flight` VALUES ('1041', 'Kuala Lumpur (KUL)', 'Alor Setar (AOR)', '192.99', '298.99', '20:20', '21:20', '1h');
INSERT INTO `flight` VALUES ('1042', 'Kuala Lumpur (KUL)', 'Bintulu (BTU)', '128.99', '234.99', '06:45', '08:55', '2h 10m');
INSERT INTO `flight` VALUES ('1043', 'Kuala Lumpur (KUL)', 'Bintulu (BTU)', '128.99', '234.99', '17:10', '19:20', '2h 10m');
INSERT INTO `flight` VALUES ('1044', 'Kuala Lumpur (KUL)', 'Johor Bahru (JHB)', '59.00', '165.00', '08:25', '09:15', '50m');
INSERT INTO `flight` VALUES ('1045', 'Kuala Lumpur (KUL)', 'Johor Bahru (JHB)', '78.99', '184.99', '20:50', '21:40', '50m');
INSERT INTO `flight` VALUES ('1046', 'Kuala Lumpur (KUL)', 'Kota Bharu (KBR)', '139.99', '245.99', '07:55', '09:00', '1h 5m');
INSERT INTO `flight` VALUES ('1047', 'Kuala Lumpur (KUL)', 'Kota Bharu (KBR)', '89.00', '195.00', '20:30', '21:30', '1h');
INSERT INTO `flight` VALUES ('1048', 'Kuala Lumpur (KUL)', 'Kota Kinabalu (BKI)', '129.00', '235.00', '06:30', '09:05', '2h 35m');
INSERT INTO `flight` VALUES ('1049', 'Kuala Lumpur (KUL)', 'Kota Kinabalu (BKI)', '169.00', '275.00', '09:30', '12:05', '2h 35m');
INSERT INTO `flight` VALUES ('1050', 'Kuala Lumpur (KUL)', 'Kuala Terengganu (TGG)', '236.00', '342.00', '07:00', '07:50', '50m');
INSERT INTO `flight` VALUES ('1051', 'Kuala Lumpur (KUL)', 'Kuala Terengganu (TGG)', '133.99', '239.99', '15:55', '16:50', '55m');
INSERT INTO `flight` VALUES ('1052', 'Kuala Lumpur (KUL)', 'Kuching (KCH)', '79.00', '215.00', '07:10', '08:55', '1h 45m');
INSERT INTO `flight` VALUES ('1053', 'Kuala Lumpur (KUL)', 'Kuching (KCH)', '129.00', '215.00', '14:10', '15:50', '1h 45m');
INSERT INTO `flight` VALUES ('1054', 'Kuala Lumpur (KUL)', 'Labuan (LBU)', '109.01', '254.99', '07:25', '09:50', '2h 25m');
INSERT INTO `flight` VALUES ('1055', 'Kuala Lumpur (KUL)', 'Labuan (LBU)', '99.00', '254.99', '16:45', '19:10', '2h 25m');
INSERT INTO `flight` VALUES ('1056', 'Kuala Lumpur (KUL)', 'Langkawi (LGK)', '49.00', '175.00', '08:35', '09:45', '1h 10m');
INSERT INTO `flight` VALUES ('1057', 'Kuala Lumpur (KUL)', 'Langkawi (LGK)', '128.00', '234.00', '12:00', '13:00', '1h');
INSERT INTO `flight` VALUES ('1058', 'Kuala Lumpur (KUL)', 'Miri (MYY)', '119.00', '225.00', '11:35', '13:55', '2h 15m');
INSERT INTO `flight` VALUES ('1059', 'Kuala Lumpur (KUL)', 'Miri (MYY)', '183.99', '289.99', '16:10', '18:15', '2h 15m');
INSERT INTO `flight` VALUES ('1060', 'Kuala Lumpur (KUL)', 'Penang (PEN)', '69.00', '175.00', '10:00', '10:55', '55m');
INSERT INTO `flight` VALUES ('1061', 'Kuala Lumpur (KUL)', 'Penang (PEN)', '113.00', '219.00', '21:00', '21:55', '55m');
INSERT INTO `flight` VALUES ('1062', 'Kuala Lumpur (KUL)', 'Sandakan (SDK)', '179.00', '285.00', '06:25', '09:15', '2h 50m');
INSERT INTO `flight` VALUES ('1063', 'Kuala Lumpur (KUL)', 'Sandakan (SDK)', '279.00', '385.00', '13:20', '16:10', '2h 50m');
INSERT INTO `flight` VALUES ('1064', 'Kuala Lumpur (KUL)', 'Sibu (SBW)', '89.01', '215.00', '06:00', '07:55', '1h 55m');
INSERT INTO `flight` VALUES ('1065', 'Kuala Lumpur (KUL)', 'Sibu (SBW)', '139.00', '215.00', '18:40', '20:35', '1h 55m');
INSERT INTO `flight` VALUES ('1066', 'Kuala Lumpur (KUL)', 'Tawau (TWU)', '209.00', '315.00', '07:00', '09:50', '2h 55m');
INSERT INTO `flight` VALUES ('1067', 'Kuala Lumpur (KUL)', 'Tawau (TWU)', '293.01', '399.01', '15:40', '18:30', '2h 50m');
INSERT INTO `flight` VALUES ('1068', 'Kuala Terengganu (TGG)', 'Kuala Lumpur (KUL)', '169.00', '275.00', '08:20', '09:15', '55m');
INSERT INTO `flight` VALUES ('1069', 'Kuala Terengganu (TGG)', 'Kuala Lumpur (KUL)', '205.99', '311.99', '13:10', '14:05', '55m');
INSERT INTO `flight` VALUES ('1070', 'Kuching (KCH)', 'Bintulu (BTU)', '89.00', '195.00', '09:25', '10:20', '55m');
INSERT INTO `flight` VALUES ('1071', 'Kuching (KCH)', 'Bintulu (BTU)', '89.00', '195.00', '16:35', '17:30', '55m');
INSERT INTO `flight` VALUES ('1072', 'Kuching (KCH)', 'Johor Bahru (JHB)', '119.00', '225.00', '08:50', '10:15', '1h 25m');
INSERT INTO `flight` VALUES ('1073', 'Kuching (KCH)', 'Johor Bahru (JHB)', '148.99', '254.99', '18:50', '20:15', '1h 25m');
INSERT INTO `flight` VALUES ('1074', 'Kuching (KCH)', 'Kota Bharu (KBR)', '434.99', '540.99', '12:00', '13:55', '1h 55m');
INSERT INTO `flight` VALUES ('1075', 'Kuching (KCH)', 'Kota Kinabalu (BKI)', '92.18', '198.18', '06:10', '07:35', '1h 25m');
INSERT INTO `flight` VALUES ('1076', 'Kuching (KCH)', 'Kota Kinabalu (BKI)', '92.18', '198.18', '20:35', '22:05', '1h 30m');
INSERT INTO `flight` VALUES ('1077', 'Kuching (KCH)', 'Kuala Lumpur (KUL)', '194.00', '300.00', '07:00', '08:45', '1h 45m');
INSERT INTO `flight` VALUES ('1078', 'Kuching (KCH)', 'Kuala Lumpur (KUL)', '194.00', '300.00', '10:40', '12:25', '1h 45m');
INSERT INTO `flight` VALUES ('1079', 'Kuching (KCH)', 'Miri (MYY)', '78.99', '184.99', '07:40 ', '08:45', '1h 5m');
INSERT INTO `flight` VALUES ('1080', 'Kuching (KCH)', 'Miri (MYY)', '109.00', '215.00', '19:35', '20:40', '1h 5m');
INSERT INTO `flight` VALUES ('1081', 'Kuching (KCH)', 'Penang (PEN)', '380.00', '486.00', '09:35', '11:35', '2h');
INSERT INTO `flight` VALUES ('1082', 'Kuching (KCH)', 'Penang (PEN)', '230.00', '336.00', '19:10', '21:10', '2h');
INSERT INTO `flight` VALUES ('1083', 'Kuching (KCH)', 'Sibu (SBW)', '69.00', '175.99', '07:10', '07:55', '45m');
INSERT INTO `flight` VALUES ('1084', 'Kuching (KCH)', 'Sibu (SBW)', '78.99', '184.99', '17:20', '18:05', '45m');
INSERT INTO `flight` VALUES ('1085', 'Labuan (LBU)', 'Kuala Lumpur (KUL)', '286.46', '392.46', '10:25', '12:45', '2h 20m');
INSERT INTO `flight` VALUES ('1086', 'Labuan (LBU)', 'Kuala Lumpur (KUL)', '339.46', '445.46', '19:35', '22:00', '2h 25m');
INSERT INTO `flight` VALUES ('1087', 'Langkawi (LGK)', 'Kuala Lumpur (KUL)', '211.46', '317.46', '08:55', '10:05', '1h 10m');
INSERT INTO `flight` VALUES ('1088', 'Langkawi (LGK)', 'Kuala Lumpur (KUL)', '303.47', '409.47', '14:10', '15:15', '1h 5m');
INSERT INTO `flight` VALUES ('1089', 'Langkawi (LGK)', 'Penang (PEN)', '39.01', '154.46', '10:10', '10:45', '35m');
INSERT INTO `flight` VALUES ('1090', 'Langkawi (LGK)', 'Penang (PEN)', '39.01', '154.46', '17:15', '17:50', '35m');
INSERT INTO `flight` VALUES ('1091', 'Miri (MYY)', 'Kota Kinabalu (BKI)', '92.18', '198.18', '14:55', '15:45', '50m');
INSERT INTO `flight` VALUES ('1092', 'Miri (MYY)', 'Kota Kinabalu (BKI)', '72.18', '178.18', '20:45', '21:35', '50m');
INSERT INTO `flight` VALUES ('1093', 'Miri (MYY)', 'Kuala Lumpur (KUL)', '223.00', '329.00', '10:00', '12:15', '2h 15m');
INSERT INTO `flight` VALUES ('1094', 'Miri (MYY)', 'Kuala Lumpur (KUL)', '262.00', '368.00', '14:20', '16:30', '2h 15m');
INSERT INTO `flight` VALUES ('1095', 'Miri (MYY)', 'Kuching (KCH)', '109.00', '215.00', '09:10', '10:10', '1h');
INSERT INTO `flight` VALUES ('1096', 'Miri (MYY)', 'Kuching (KCH)', '78.99', '184.99', '21:05', '22:05', '1h');
INSERT INTO `flight` VALUES ('1097', 'Miri (MYY)', 'Penang (PEN)', '281.99', '387.99', '09:10', '11:40', '2h 30m');
INSERT INTO `flight` VALUES ('1098', 'Penang (PEN)', 'Johor Bahru (JHB)', '119.00', '225.00', '07:15', '08:25', '1h 10m');
INSERT INTO `flight` VALUES ('1099', 'Penang (PEN)', 'Johor Bahru (JHB)', '98.99', '204.99', '19:30', '20:40', '1h 10m');
INSERT INTO `flight` VALUES ('1100', 'Penang (PEN)', 'Kota Kinabalu (BKI)', '182.17', '288.17', '10:25', '13:10', '2h 45m');
INSERT INTO `flight` VALUES ('1101', 'Penang (PEN)', 'Kota Kinabalu (BKI)', '182.17', '288.17', '16:40', '19:25', '2h 45m');
INSERT INTO `flight` VALUES ('1102', 'Penang (PEN)', 'Kuala Lumpur (KUL)', '49.00', '155.00', '06:50', '07:50', '1h');
INSERT INTO `flight` VALUES ('1103', 'Penang (PEN)', 'Kuala Lumpur (KUL)', '69.00', '175.00', '08:35', '09:35', '1h');
INSERT INTO `flight` VALUES ('1104', 'Penang (PEN)', 'Kuching (KCH)', '252.05', '358.05', '07:05', '09:10', '2h 5m');
INSERT INTO `flight` VALUES ('1105', 'Penang (PEN)', 'Langkawi (LGK)', '69.00', '175.00', '11:10', '11:45', '35m');
INSERT INTO `flight` VALUES ('1106', 'Penang (PEN)', 'Langkawi (LGK)', '49.00', '155.00', '16:15', '16:50', '35m');
INSERT INTO `flight` VALUES ('1107', 'Penang (PEN)', 'Miri (MYY)', '109.00', '215.00', '12:05', '14:45', '2h 40m');
INSERT INTO `flight` VALUES ('1108', 'Sandakan (SDK)', 'Kota Kinabalu (BKI)', '72.18', '178.18', '08:15', '09:00', '45m');
INSERT INTO `flight` VALUES ('1109', 'Sandakan (SDK)', 'Kota Kinabalu (BKI)', '72.18', '178.18', '14:30', '15:15', '45m');
INSERT INTO `flight` VALUES ('1110', 'Sandakan (SDK)', 'Kuala Lumpur (KUL)', '179.00', '285.00', '09:40', '12:20', '2h 40m');
INSERT INTO `flight` VALUES ('1111', 'Sandakan (SDK)', 'Kuala Lumpur (KUL)', '129.00', '285.00', '16:35', '19:15', '2h 40m');
INSERT INTO `flight` VALUES ('1112', 'Sibu (SBW)', 'Johor Bahru (JHB)', '159.00', '265.00', '11:50', '13:25', '1h 35m');
INSERT INTO `flight` VALUES ('1113', 'Sibu (SBW)', 'Johor Bahru (JHB)', '159.00', '265.00', '19:45', '21:20', '1h 35m');
INSERT INTO `flight` VALUES ('1114', 'Sibu (SBW)', 'Kuala Lumpur (KUL)', '139.00', '245.00', '08:20', '10:15', '1h 55m');
INSERT INTO `flight` VALUES ('1115', 'Sibu (SBW)', 'Kuala Lumpur (KUL)', '109.00', '215.00', '13:10', '15:05', '1h 55m');
INSERT INTO `flight` VALUES ('1116', 'Sibu (SBW)', 'Kuching (KCH)', '69.00', '175.00', '08:20', '09:00', '40m');
INSERT INTO `flight` VALUES ('1117', 'Sibu (SBW)', 'Kuching (KCH)', '69.00', '175.00', '18:30', '19:10', '40m');
INSERT INTO `flight` VALUES ('1118', 'Tawau (TWU)', 'Johor Bahru (JHB)', '119.01', '234.99', '13:45', '16:20', '2h 35m');
INSERT INTO `flight` VALUES ('1119', 'Tawau (TWU)', 'Kota Kinabalu (BKI)', '112.18', '218.18', '10:15', '11:05', '50m');
INSERT INTO `flight` VALUES ('1120', 'Tawau (TWU)', 'Kota Kinabalu (BKI)', '92.18', '198.18', '21:45', '22:35', '50m');
INSERT INTO `flight` VALUES ('1121', 'Tawau (TWU)', 'Kuala Lumpur (KUL)', '188.00', '294.00', '10:15', '12:55', '2h 40m');
INSERT INTO `flight` VALUES ('1122', 'Tawau (TWU)', 'Kuala Lumpur (KUL)', '188.00', '294.00', '15:40', '18:30', '2h 50m');

-- ----------------------------
-- Table structure for `images_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `images_tbl`;
CREATE TABLE `images_tbl` (
  `images_id` int(4) NOT NULL AUTO_INCREMENT,
  `images_path` varchar(40) NOT NULL,
  `submission_date` date DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images_tbl
-- ----------------------------
INSERT INTO `images_tbl` VALUES ('13', '../profile_images/26-06-2015-1435362396.', '2015-06-26', 'rs@yahoo.com');
INSERT INTO `images_tbl` VALUES ('14', '../profile_images/26-06-2015-1435362124.', '2015-06-26', 'aw@yahoo.com');

-- ----------------------------
-- Table structure for `infoflight`
-- ----------------------------
DROP TABLE IF EXISTS `infoflight`;
CREATE TABLE `infoflight` (
  `Trans` int(5) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Code` int(4) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Adults` varchar(2) NOT NULL,
  `Kids` varchar(2) NOT NULL,
  `Infants` varchar(2) NOT NULL,
  `TotalPrice` varchar(12) NOT NULL,
  `Payment` varchar(20) NOT NULL,
  `CreditNo` varchar(10) DEFAULT '-',
  `AccountNo` varchar(10) DEFAULT '-',
  `Bank` varchar(20) DEFAULT '-',
  PRIMARY KEY (`Trans`),
  KEY `Email` (`Email`),
  KEY `Code` (`Code`),
  CONSTRAINT `Code` FOREIGN KEY (`Code`) REFERENCES `flight` (`Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `tbluser` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10051 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of infoflight
-- ----------------------------
INSERT INTO `infoflight` VALUES ('10046', 'aw@yahoo.com', '1050', 'June 29, 2015', '1', '1', '0', '817.5', 'Credit Card', '6587', '', '');
INSERT INTO `infoflight` VALUES ('10047', 'aw@yahoo.com', '1002', 'June 29, 2015', '1', '1', '0', '211.52', 'Internet Banking', '', '324523', 'Bank Islam');
INSERT INTO `infoflight` VALUES ('10048', 'aw@yahoo.com', '1002', 'June 17, 2015', '1', '1', '0', '78.02', 'Internet Banking', '', 'qDFAWED', 'CIMB Clicks');
INSERT INTO `infoflight` VALUES ('10049', 'aw@yahoo.com', '1003', 'June 18, 2015', '1', '1', '0', '78.02', 'Internet Banking', '', 'qDFAWED', 'CIMB Clicks');
INSERT INTO `infoflight` VALUES ('10050', 'aw@yahoo.com', '1002', 'June 21, 2015', '1', '1', '0', '78.02', 'Internet Banking', '', '2323', 'CIMB Clicks');

-- ----------------------------
-- Table structure for `locate`
-- ----------------------------
DROP TABLE IF EXISTS `locate`;
CREATE TABLE `locate` (
  `Origin` varchar(50) NOT NULL,
  PRIMARY KEY (`Origin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of locate
-- ----------------------------
INSERT INTO `locate` VALUES ('Alor Setar (AOR)');
INSERT INTO `locate` VALUES ('Bintulu (BTU)');
INSERT INTO `locate` VALUES ('Johor Bahru (JHB)');
INSERT INTO `locate` VALUES ('Kota Bharu (KBR)');
INSERT INTO `locate` VALUES ('Kota Kinabalu (BKI)');
INSERT INTO `locate` VALUES ('Kuala Lumpur (KUL)');
INSERT INTO `locate` VALUES ('Kuala Terengganu (TGG)');
INSERT INTO `locate` VALUES ('Kuching (KCH)');
INSERT INTO `locate` VALUES ('Labuan (LBU)');
INSERT INTO `locate` VALUES ('Langkawi (LGK)');
INSERT INTO `locate` VALUES ('Miri (MYY)');
INSERT INTO `locate` VALUES ('Penang (PEN)');
INSERT INTO `locate` VALUES ('Sandakan (SDK)');
INSERT INTO `locate` VALUES ('Sibu (SBW)');
INSERT INTO `locate` VALUES ('Tawau (TWU)');

-- ----------------------------
-- Table structure for `tbluser`
-- ----------------------------
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Title` varchar(3) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `DateOfBirth` varchar(15) NOT NULL,
  `ICPassport` varchar(15) NOT NULL,
  `Nationality` varchar(5) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `State` varchar(50) NOT NULL,
  `TownCity` varchar(50) NOT NULL,
  `PostcodeZIP` varchar(10) NOT NULL,
  `MobilePhone` varchar(15) NOT NULL,
  `UserType` char(1) NOT NULL,
  `Department` varchar(50) DEFAULT '-',
  `IDWorker` varchar(20) NOT NULL DEFAULT '-',
  `ImgPath` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Email`,`IDWorker`),
  KEY `UserType` (`UserType`),
  KEY `Email` (`Email`),
  CONSTRAINT `UserType` FOREIGN KEY (`UserType`) REFERENCES `category` (`UserType`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbluser
-- ----------------------------
INSERT INTO `tbluser` VALUES ('abc@gmail.com', '79b7cdcd14db14e9cb498f1793817d69', 'Ms', 'Su', 'Mi', '04/06/1987', '23421412412', 'AU', 'Street 1, Abc Park ', 'Penang', 'Seberang Perai', '12321421', '0142432432234', 'A', 'Main Office', '01393', 'profile_images/noPic.png');
INSERT INTO `tbluser` VALUES ('aw@yahoo.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Mr ', 'Asyraf', 'Hanif', '01/01/1995', '951111-11-1111', 'MY   ', 'Abc, Jalan Kemaman', 'Terengganu', 'Chendering', '21341', '0134567890', 'M', '-', '-', 'profile_images/26-06-2015-1435362124.jpg');
INSERT INTO `tbluser` VALUES ('dd', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Mr', 'dd', 'dd', 'dd', 'dd', 'MY   ', 'gg', 'Terengganu', 'gg', 'gg', 'gg', 'M', '-', '-', 'profile_images/noPic.png');
INSERT INTO `tbluser` VALUES ('gg', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Mr', 'gg', 'gg', 'gg', 'gg', 'MY   ', 'gg', 'Terengganu', 'gg', 'gg', 'gg', 'M', '-', '-', 'profile_images/noPic.png');
INSERT INTO `tbluser` VALUES ('lut@yahoo.com', '3d2172418ce305c7d16d4b05597c6a59', 'Mr', 'Lutfi', 'Rohim', '28/02/1995', '951111-11-1111', 'AU', 'No 7, Taman Equine ', 'Kuala Lumpur', 'Klang', '90909', '0132342452', 'M', '-', '-', 'profile_images/noPic.png');
INSERT INTO `tbluser` VALUES ('rr', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Mr', 'rr', 'rr', 'rr', 'rr', 'MY   ', 'gg', 'Terengganu', 'gg', 'gg', 'gg', 'M', '-', '-', 'profile_images/noPic.png');
INSERT INTO `tbluser` VALUES ('rs@yahoo.com', 'dcddb75469b4b4875094e14561e573d8', 'Mr ', 'Radhi', 'Shari', '30/05/1995', '950530-06-5311', 'MY   ', 'No. 19, Jalan Indera', 'Pahang', 'Temerloh', '81000', '0139388931', 'A', 'Airline Office', 'A14CS0167', 'profile_images/26-06-2015-1435362396.jpg');
INSERT INTO `tbluser` VALUES ('test@hotmail.com', 'b7bc2a2f5bb6d521e64c8974c143e9a0', 'Ms', 'Dummy', 'Test', '18/02/1989', '23423432532532', 'FR', 'Abc, Street 1, Avenue', 'Terengganu', 'Kemaman', '324342', '0134562342', 'A', 'Flight Engineer Department', 'A14CS1234', 'profile_images/noPic.png');
INSERT INTO `tbluser` VALUES ('uu', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Mr', 'uu', 'uu', 'uu', 'uu', 'MY   ', 'gg', 'Terengganu', 'gg', 'gg', 'gg', 'M', '-', '-', 'profile_images/noPic.png');
