-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 31 2022 г., 01:14
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.10

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
  `full_name` varchar(255) NOT NULL,
  `phone_numbers` decimal(11,0) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'Ожидается',
  `approved` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reg_car`
--

INSERT INTO `reg_car` (`id`, `id_user`, `num_car`, `add_info`, `data_time`, `address`, `full_name`, `phone_numbers`, `comment`, `status`, `approved`) VALUES
(24, 59, 'A123AВ', 'Желтая машина', '2021-12-26 00:09:00', 'dszdsczdzs', 'Иванова Иван Иванович', '79812311223', 'Я хочу заехать', 'На парковке', NULL),
(27, 13, 'П100ПВ', 'Синяя машина', '2021-12-21 00:32:00', 'фывфывфывфыв', 'Серый Сергей Сергеевич', '78945612345', 'Я хочу заехать', 'Завершена', NULL),
(28, 13, 'П100ПП', 'Зеленая машина', '2021-12-21 00:32:00', 'фывфывфывфыв', 'Серый Сергей Сергеевич', '78945612345', 'Я хочу заехать', 'Завершена', NULL),
(30, 13, 'A123AA', 'фывфывфы', '2022-01-21 11:12:00', 'фывфывфыв', 'Иванова Иван Иванович', '78945612345', ' Я хочу заехать', 'Завершена', NULL),
(32, 59, 'A123AA', 'Синяя машина', '2022-01-21 11:13:00', 'fghfhkjkj', 'Серый Сергей Сергеевич', '79812311223', ' sdfgsdfg', 'На парковке', NULL),
(33, 61, 'П100КК', 'Красная машина', '2022-01-25 07:16:00', 'rsdfgh', 'Серый Сергей Сергеевич', '79812311223', ' Я хочу заехать', 'Ожидается', NULL),
(35, 13, 'П100ПП', 'Красная машина', '2022-01-24 23:19:00', 'ваыпываыва', 'Серый Сергей Сергеевич', '79812311223', ' Я хочу заехать', 'На парковке', NULL),
(36, 0, 'П100ПП', 'Синяя машина', '2022-01-23 23:21:00', 'ыфв', 'Иванова Иван Иванович', '79812311223', ' Я хочу заехать', 'Завершена', NULL),
(37, 61, 'П100ПП', '', '2022-01-23 23:23:00', '', 'Валерий Иванов Валерьевич', '0', '', 'Завершена', NULL),
(38, 0, 'ASDAS123', '', '2022-01-13 00:53:00', '', 'Валерий Иванов Валерьевич', '0', '', 'Завершена', NULL),
(39, 61, 'asdas', 'Синяя машина', '2022-01-26 06:15:00', 'фывфыв', 'Иванова Иван Иванович', '79812311223', ' ', 'Ожидается', NULL),
(40, 61, 'A123AA', '', '2022-01-02 01:04:00', '', 'Валерий Иванов Валерьевич', '0', '', 'Отменена', NULL),
(41, 61, 'A123AA', '', '2022-01-25 05:41:00', '', 'Валерий Иванов Валерьевич', '0', '', 'Отменена', NULL),
(42, 61, 'фывфыв', '', '2022-01-28 05:46:00', '', 'Сергей', '0', '', 'Отменена', NULL),
(43, 0, 'П100ПП', 'Синяя машина', '2022-01-25 06:21:00', 'Csaqwsad', 'Серый Сергей Сергеевич', '99999999999', ' ', 'Ожидается', NULL);

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
  `approved` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`name`, `phone_number`, `lot_number`, `id_user`, `id_telegramm`, `approved`) VALUES
('Иванов Иван Иванович', '79812311223', 'Ул. Красная д.10 кв. 55', 13, 533873246, 'Одобрено'),
('Евгений', '79654321111', 'Ул Длинная дом 10 кв 60', 59, 214748364, 'Одобрено'),
('Васильев Владимир Викторович', '78945612345', 'Ул Длинная дом 12 кв 11', 60, 83523165, 'Одобрено'),
('Охрана', '79176524509', 'Ул Длинная дом', 61, 111222112, 'Одобрено'),
('Антон', '89176524508', 'Ул Длинная дом 10 кв 54', 73, 533873224, 'Одобрено');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reg_car`
--
ALTER TABLE `reg_car`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
