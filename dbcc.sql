/*
 Navicat Premium Data Transfer

 Source Server         : mr-gpoup
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : dbcc

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 21/04/2020 14:56:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attacks_stats
-- ----------------------------
DROP TABLE IF EXISTS `attacks_stats`;
CREATE TABLE `attacks_stats`  (
  `attack_name` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `count` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 248 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for deployed
-- ----------------------------
DROP TABLE IF EXISTS `deployed`;
CREATE TABLE `deployed`  (
  `attack_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logs_common
-- ----------------------------
DROP TABLE IF EXISTS `logs_common`;
CREATE TABLE `logs_common`  (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `attack` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_stage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `second_stage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logs_makros
-- ----------------------------
DROP TABLE IF EXISTS `logs_makros`;
CREATE TABLE `logs_makros`  (
  `attack` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `client_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logs_phishing
-- ----------------------------
DROP TABLE IF EXISTS `logs_phishing`;
CREATE TABLE `logs_phishing`  (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `referer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logs_visited
-- ----------------------------
DROP TABLE IF EXISTS `logs_visited`;
CREATE TABLE `logs_visited`  (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `referer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for replies
-- ----------------------------
DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `command_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `part_id` int(5) NOT NULL,
  `data` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `active_flag` int(11) NOT NULL,
  `operation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `argument` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `argument_human` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for template
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template`  (
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `filename_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `zip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('Обновление VPN.jpg', 'Обновление VPN_logo.jpg', 'Обновление VPN.zip', 'Обновление VPN/', '');
INSERT INTO `template` VALUES ('Outlook.jpg', 'Outlook_logo.jpg', 'Outlook.zip', 'Outlook/', 'Стандартный шаблон Outlook');
INSERT INTO `template` VALUES ('Проверка пароля.jpg', 'Проверка пароля_logo.jpg', 'Проверка пароля.zip', 'Проверка пароля/', '');
INSERT INTO `template` VALUES ('Вебинар.jpg', 'Вебинар_logo.jpg', 'Вебинар.zip', 'Вебинар/', '');
INSERT INTO `template` VALUES ('Установка антивируса.jpg', 'Установка антивируса_logo.jpg', 'Установка антивируса.zip', 'Установка антивируса/', '');
INSERT INTO `template` VALUES ('Kerio.jpg', 'Kerio_logo.jpg', 'Kerio.zip', 'Kerio/', 'Kerio Connect');
INSERT INTO `template` VALUES ('Перерасчет ЗП.jpg', 'Перерасчет ЗП_logo.jpg', 'Перерасчет ЗП.zip', 'Перерасчет ЗП/', 'Макросы');
INSERT INTO `template` VALUES ('LinkedIn.jpg', 'LinkedIn_logo.jpg', 'LinkedIn.zip', 'LinkedIn/', '');
INSERT INTO `template` VALUES ('Перерасчет ЗП (фишинг).jpg', 'Перерасчет ЗП (фишинг)_logo.jpg', 'Перерасчет ЗП (фишинг).zip', 'Перерасчет ЗП (фишинг)/', 'Фишинг через макросы');

-- ----------------------------
-- Table structure for timelog
-- ----------------------------
DROP TABLE IF EXISTS `timelog`;
CREATE TABLE `timelog`  (
  `client_id` int(11) NOT NULL,
  `command_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
