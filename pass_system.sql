-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2022 г., 02:08
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
  `address` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_numbers` decimal(11,0) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reg_car`
--

INSERT INTO `reg_car` (`id`, `id_user`, `num_car`, `add_info`, `data_time`, `address`, `full_name`, `phone_numbers`, `comment`, `approved`) VALUES
(69, 865231654, '123', '4124', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', '412414', 0),
(70, 865231654, '123', 'wfa', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', 'faw', 0),
(71, 865231654, '123', '213', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', '321', 0),
(72, 865231654, '421', '421', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', '421', 0),
(73, 865231654, '123', 'car', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', '0', 0),
(74, 865231654, '24141', 'car', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', '0', 0),
(75, 865231654, '1232231241', 'carwfa', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', NULL, 0),
(76, 865231654, '32213', 'car', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', NULL, 0),
(77, 865231654, '3123213', 'car', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', NULL, 0),
(78, 865231654, '23131', 'carwafwa', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', NULL, 0),
(79, 865231654, '31231', 'car', '0000-00-00 00:00:00', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', NULL, 0),
(80, 865231654, '3123213', 'car', '2022-01-23 04:05:14', 'Первомайская д92', 'Козлов Даниил Анатольевич', '79027220728', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `name` varchar(255) DEFAULT NULL,
  `phone_number` decimal(11,0) DEFAULT NULL,
  `lot_number` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_telegramm` int(11) DEFAULT NULL,
  `approved` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`name`, `phone_number`, `lot_number`, `id_user`, `id_telegramm`, `approved`) VALUES
('Иванов Иван Иванович', '79812311223', 'Ул. Красная д.10 кв. 55', 13, 533873246, 0),
('Козлов Даниил Анатольевич', '79027220728', 'Первомайская д92', 116, 865231654, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
