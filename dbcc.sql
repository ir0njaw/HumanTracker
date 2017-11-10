-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 10 2017 г., 14:38
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbcc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attacks_stats`
--

CREATE TABLE `attacks_stats` (
  `attack_name` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `count` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `id` int(11) NOT NULL,
  `description` text CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
('Ð¯Ð½Ð´ÐµÐºÑ.Ð”Ð¸ÑÐº.jpg', 'Ð¯Ð½Ð´ÐµÐºÑ.Ð”Ð¸ÑÐº_logo.jpg', 'Ð¯Ð½Ð´ÐµÐºÑ.Ð”Ð¸ÑÐº.zip', 'Ð¯Ð½Ð´ÐµÐºÑ.Ð”Ð¸ÑÐº/', '5'),
('ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ VPN.jpg', 'ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ VPN_logo.jpg', 'ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ VPN.zip', 'ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ VPN/', '213'),
('Outlook.jpg', 'Outlook_logo.jpg', 'Outlook.zip', 'Outlook/', '123'),
('Ð¯Ð½Ð´ÐµÐºÑ.ÐŸÐ°ÑÐ¿Ð¾Ñ€Ñ‚.jpg', 'Ð¯Ð½Ð´ÐµÐºÑ.ÐŸÐ°ÑÐ¿Ð¾Ñ€Ñ‚_logo.jpg', 'Ð¯Ð½Ð´ÐµÐºÑ.ÐŸÐ°ÑÐ¿Ð¾Ñ€Ñ‚.zip', 'Ð¯Ð½Ð´ÐµÐºÑ.ÐŸÐ°ÑÐ¿Ð¾Ñ€Ñ‚/', '123'),
('ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ° Ð¿Ð°Ñ€Ð¾Ð»Ñ.jpg', 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ° Ð¿Ð°Ñ€Ð¾Ð»Ñ_logo.jpg', 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ° Ð¿Ð°Ñ€Ð¾Ð»Ñ.zip', 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ° Ð¿Ð°Ñ€Ð¾Ð»Ñ/', ''),
('Ð’ÐµÐ±Ð¸Ð½Ð°Ñ€.jpg', 'Ð’ÐµÐ±Ð¸Ð½Ð°Ñ€_logo.jpg', 'Ð’ÐµÐ±Ð¸Ð½Ð°Ñ€.zip', 'Ð’ÐµÐ±Ð¸Ð½Ð°Ñ€/', '234'),
('Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð°Ð½Ñ‚Ð¸Ð²Ð¸Ñ€ÑƒÑÐ°.jpg', 'Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð°Ð½Ñ‚Ð¸Ð²Ð¸Ñ€ÑƒÑÐ°_logo.jpg', 'Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð°Ð½Ñ‚Ð¸Ð²Ð¸Ñ€ÑƒÑÐ°.zip', 'Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð°Ð½Ñ‚Ð¸Ð²Ð¸Ñ€ÑƒÑÐ°/', '123'),
('ÐŸÐµÑ€ÐµÑ€Ð°ÑÑ‡ÐµÑ‚ Ð—ÐŸ.jpg', 'ÐŸÐµÑ€ÐµÑ€Ð°ÑÑ‡ÐµÑ‚ Ð—ÐŸ_logo.jpg', 'ÐŸÐµÑ€ÐµÑ€Ð°ÑÑ‡ÐµÑ‚ Ð—ÐŸ.zip', 'ÐŸÐµÑ€ÐµÑ€Ð°ÑÑ‡ÐµÑ‚ Ð—ÐŸ/', '123'),
('ÐŸÑ€ÐµÐ¼Ð¸Ñ.jpg', 'ÐŸÑ€ÐµÐ¼Ð¸Ñ_logo.jpg', 'ÐŸÑ€ÐµÐ¼Ð¸Ñ.zip', 'ÐŸÑ€ÐµÐ¼Ð¸Ñ/', '123');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
