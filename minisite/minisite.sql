-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 14 2022 г., 17:35
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `minisite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `yearbirth` year NOT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `yearbirth`, `login`, `password`, `status_id`) VALUES
(1, 'Judy', 'Olsen', 'judy@example.com', 2000, 'judy@example.com', '12345', 2),
(2, 'Alexandra', 'Clubia', 'alexa@example.com', 2001, 'alexa@example.com', 'asdghxnk', 1),
(3, 'Robin', 'Jackson', 'robin@example.com', 2003, 'robin@example.com', 'jkldjw', 1),
(4, 'Lindsy', 'Willsony', 'one@example.com', 1999, 'one@example.com', '12345687', 1),
(5, 'Henry', 'Slown', 'henry@example.com', 2000, 'henry@example.com', 'asfscx51', 1),
(6, 'Hloya', 'Jhaspo', 'hloya@example.com', 2001, 'hloya@example.com', 'asdrmkfe', 1),
(7, 'Forjy', 'Lokit', 'three@example.com', 2004, 'three@example.com', 'asreddf', 1),
(8, 'Kise', 'Grace', 'bl@example.ru', 2001, 'bl@example.ru', 'dhesfgr', 1),
(9, 'Gabby', 'Smitt', 'fifty@example.com', 2004, 'fifty@example.com', 'sgfers', 1),
(10, 'Noki', 'Fremas', 'second@example.com', 2000, 'second@example.com', 'gasffas', 1),
(11, 'Yumi', 'Lo', 'four@example.com', 2004, 'four@example.com', 'safgeds', 1),
(12, 'Loky', 'Nord', 'nord@example.com', 1999, 'nord@example.com', 'edsafad', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
