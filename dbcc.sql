-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Ноя 09 2017 г., 17:52
-- Версия сервера: 5.5.42
-- Версия PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `dbcc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attacks_stats`
--

CREATE TABLE `attacks_stats` (
  `attack_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `count` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `logs_common`
--

CREATE TABLE `logs_common` (
  `id` varchar(255) NOT NULL,
  `attack` varchar(255) NOT NULL,
  `first_stage` varchar(255) NOT NULL,
  `second_stage` varchar(255) NOT NULL,
  `third_stage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `logs_makros`
--

CREATE TABLE `logs_makros` (
  `attack` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `logs_phishing`
--

CREATE TABLE `logs_phishing` (
  `id` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL DEFAULT '',
  `user_agent` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `logs_visited`
--

CREATE TABLE `logs_visited` (
  `id` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `command_id` varchar(255) NOT NULL,
  `part_id` int(5) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `replies`
--

INSERT INTO `replies` (`id`, `client_id`, `command_id`, `part_id`, `data`) VALUES
(1, '', '', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `active_flag` int(11) NOT NULL,
  `operation` varchar(255) NOT NULL,
  `argument` text NOT NULL,
  `status` int(11) NOT NULL,
  `argument_human` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `template`
--

CREATE TABLE `template` (
  `filename` varchar(255) NOT NULL,
  `filename_logo` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `template`
--

INSERT INTO `template` (`filename`, `filename_logo`, `zip`, `dir`, `description`) VALUES
('Яндекс.Диск.jpg', 'Яндекс.Диск_logo.jpg', 'Яндекс.Диск.zip', 'Яндекс.Диск/', '5'),
('Обновление VPN.jpg', 'Обновление VPN_logo.jpg', 'Обновление VPN.zip', 'Обновление VPN/', '213'),
('Outlook.jpg', 'Outlook_logo.jpg', 'Outlook.zip', 'Outlook/', '123'),
('Яндекс.Паспорт.jpg', 'Яндекс.Паспорт_logo.jpg', 'Яндекс.Паспорт.zip', 'Яндекс.Паспорт/', '123'),
('Проверка пароля.jpg', 'Проверка пароля_logo.jpg', 'Проверка пароля.zip', 'Проверка пароля/', ''),
('Вебинар.jpg', 'Вебинар_logo.jpg', 'Вебинар.zip', 'Вебинар/', '234'),
('Установка антивируса.jpg', 'Установка антивируса_logo.jpg', 'Установка антивируса.zip', 'Установка антивируса/', '123'),
('Перерасчет ЗП.jpg', 'Перерасчет ЗП_logo.jpg', 'Перерасчет ЗП.zip', 'Перерасчет ЗП/', '123'),
('Премия.jpg', 'Премия_logo.jpg', 'Премия.zip', 'Премия/', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `timelog`
--

CREATE TABLE `timelog` (
  `client_id` int(11) NOT NULL,
  `command_id` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timelog`
--

INSERT INTO `timelog` (`client_id`, `command_id`, `time`) VALUES
(0, '', '2017-11-09 13:55:42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attacks_stats`
--
ALTER TABLE `attacks_stats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attacks_stats`
--
ALTER TABLE `attacks_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
