-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 05 2022 г., 22:16
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pass_system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reg_car`
--

CREATE TABLE `reg_car` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `num_car` varchar(12) NOT NULL,
  `add_info` varchar(255) NOT NULL,
  `data_time` datetime NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reg_car`
--

INSERT INTO `reg_car` (`id`, `id_user`, `num_car`, `add_info`, `data_time`, `comment`, `status`) VALUES
(98, 865231654, 'daw', 'dwa', '2022-02-02 01:02:42', NULL, 'Ожидается'),
(99, 865231654, 'dwa', 'daw', '2022-02-02 01:23:11', NULL, 'Ожидается'),
(100, 865231654, 'awd', 'dwa', '2022-02-02 01:28:34', NULL, 'Ожидается'),
(101, 865231654, 'dwa', 'da', '2022-02-02 01:36:53', NULL, 'Ожидается'),
(102, 865231654, 'dw', 'adaw', '2022-02-02 01:38:28', NULL, 'Ожидается'),
(103, 865231654, 'dwa', 'dwa', '2022-02-02 01:38:55', NULL, 'Ожидается'),
(104, 865231654, 'вцф', 'вфц', '2022-02-02 01:40:27', NULL, 'Ожидается'),
(105, 865231654, '312', '312', '2022-02-03 00:57:50', NULL, 'Ожидается');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `lot_number` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_telegramm` int(11) DEFAULT NULL,
  `approved` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`name`, `phone_number`, `lot_number`, `id_user`, `id_telegramm`, `approved`) VALUES
('Иванов Иван Иванович', '79812311223', 'Ул. Красная д.10 кв. 55', 13, 533873246, 0),
('Козлов Даниил Анатольевич', '+7 902 722-07-28', '123', 152, 865231654, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reg_car`
--
ALTER TABLE `reg_car`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_id` (`id_telegramm`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reg_car`
--
ALTER TABLE `reg_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
