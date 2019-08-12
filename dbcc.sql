/*
 Navicat Premium Data Transfer

 Source Server         : mr-gpoup.ru
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : localhost:3306
 Source Schema         : dbcc

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 13/08/2019 01:34:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attacks_stats
-- ----------------------------
DROP TABLE IF EXISTS `attacks_stats`;
CREATE TABLE `attacks_stats` (
  `attack_name` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `count` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for deployed
-- ----------------------------
DROP TABLE IF EXISTS `deployed`;
CREATE TABLE `deployed` (
  `attack_name` varchar(255) NOT NULL,
  `dir` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for logs_common
-- ----------------------------
DROP TABLE IF EXISTS `logs_common`;
CREATE TABLE `logs_common` (
  `id` varchar(255) NOT NULL,
  `attack` varchar(255) NOT NULL,
  `first_stage` varchar(255) NOT NULL,
  `second_stage` varchar(255) NOT NULL,
  `third_stage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for logs_makros
-- ----------------------------
DROP TABLE IF EXISTS `logs_makros`;
CREATE TABLE `logs_makros` (
  `attack` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for logs_phishing
-- ----------------------------
DROP TABLE IF EXISTS `logs_phishing`;
CREATE TABLE `logs_phishing` (
  `id` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL DEFAULT '',
  `user_agent` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for logs_visited
-- ----------------------------
DROP TABLE IF EXISTS `logs_visited`;
CREATE TABLE `logs_visited` (
  `id` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for replies
-- ----------------------------
DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) NOT NULL,
  `command_id` varchar(255) NOT NULL,
  `part_id` int(5) NOT NULL,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) NOT NULL,
  `active_flag` int(11) NOT NULL,
  `operation` varchar(255) NOT NULL,
  `argument` text NOT NULL,
  `status` int(11) NOT NULL,
  `argument_human` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for template
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `filename` varchar(255) NOT NULL,
  `filename_logo` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template
-- ----------------------------
BEGIN;
INSERT INTO `template` VALUES ('Яндекс.Диск.jpg', 'Яндекс.Диск_logo.jpg', 'Яндекс.Диск.zip', 'Яндекс.Диск/', '');
INSERT INTO `template` VALUES ('Обновление VPN.jpg', 'Обновление VPN_logo.jpg', 'Обновление VPN.zip', 'Обновление VPN/', '');
INSERT INTO `template` VALUES ('Outlook.jpg', 'Outlook_logo.jpg', 'Outlook.zip', 'Outlook/', '');
INSERT INTO `template` VALUES ('Яндекс.Паспорт.jpg', 'Яндекс.Паспорт_logo.jpg', 'Яндекс.Паспорт.zip', 'Яндекс.Паспорт/', '');
INSERT INTO `template` VALUES ('Проверка пароля.jpg', 'Проверка пароля_logo.jpg', 'Проверка пароля.zip', 'Проверка пароля/', '');
INSERT INTO `template` VALUES ('Вебинар.jpg', 'Вебинар_logo.jpg', 'Вебинар.zip', 'Вебинар/', '');
INSERT INTO `template` VALUES ('Установка антивируса.jpg', 'Установка антивируса_logo.jpg', 'Установка антивируса.zip', 'Установка антивируса/', '');
INSERT INTO `template` VALUES ('Премия.jpg', 'Премия_logo.jpg', 'Премия.zip', 'Премия/', '');
INSERT INTO `template` VALUES ('Kerio.jpg', 'Kerio_logo.jpg', 'Kerio.zip', 'Kerio/', 'Kerio Connect');
INSERT INTO `template` VALUES ('Перерасчет ЗП.jpg', 'Перерасчет ЗП_logo.jpg', 'Перерасчет ЗП.zip', 'Перерасчет ЗП/', '');
COMMIT;

-- ----------------------------
-- Table structure for timelog
-- ----------------------------
DROP TABLE IF EXISTS `timelog`;
CREATE TABLE `timelog` (
  `client_id` int(11) NOT NULL,
  `command_id` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
