-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 19 2021 г., 18:33
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
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reg_car`
--

INSERT INTO `reg_car` (`id`, `id_user`, `num_car`, `add_info`, `data_time`, `address`, `full_name`, `phone_numbers`, `comment`) VALUES
(13, 0, 'A123AA', 'Синяя машина', '2021-12-19 21:52:00', 'Полевая', 'Иванова Иван Иванович', '79812311223', 'Я хочу заехать'),
(14, 0, 'Г999ББ', 'Желтая машина', '2021-12-20 22:25:00', 'Красная улица', 'Серый Сергей Сергеевич', '79812311223', ' Заезд домой'),
(15, 0, 'П100ПП', 'Красная машина', '2021-12-19 00:15:00', 'У синего моря', 'Сергей', '79812311223', 'Я хочу заехать'),
(16, 0, 'П100ПП', 'Красная машина', '2021-12-19 23:30:00', 'gjkyu', 'Сергей', '78945612345', 'Заезд домой'),
(17, 0, 'П100ПП', 'Красная машина', '2021-12-19 23:30:00', 'gjkyu', 'Сергей', '78945612345', 'Заезд домой'),
(18, 0, 'П100ПП', 'Красная машина', '2021-12-19 23:30:00', 'gjkyu', 'Сергей', '78945612345', 'Заезд домой'),
(19, 1, 'П100ПП', 'Зеленая машина', '2021-12-19 23:34:00', 'ыпаывпыв', 'Серый Сергей Сергеевич', '78945612345', 'Я хочу заехать'),
(20, 0, 'Г999ГГ', 'Фиолетовая машина', '2021-12-19 23:40:00', 'фывфывфыв', 'Валерий Иванов Валерьевич', '79812311223', 'Я хочу заехать'),
(21, 0, 'A123AВ', 'Фиолетовая машина', '2022-01-02 23:59:00', 'ergwrgwerg', 'Иванова Иван Иванович', '79812311223', 'Я хочу заехать'),
(22, 13, 'Г999ГГ', 'Красная машина', '2021-12-24 00:00:00', 'sdxada', 'Иванова Иван Иванович', '79812311223', 'Я хочу заехать'),
(24, 59, 'A123AВ', 'Желтая машина', '2021-12-26 00:09:00', 'dszdsczdzs', 'Иванова Иван Иванович', '79812311223', 'Я хочу заехать');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `name` varchar(255) DEFAULT NULL,
  `phone_number` decimal(11,0) DEFAULT NULL,
  `lot_number` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_telegramm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`name`, `phone_number`, `lot_number`, `id_user`, `id_telegramm`) VALUES
('Иванов Иван Иванович', '79812311223', 'Ул. Красная д.10 кв. 55', 13, 533873246),
('Козлов Даниил Анатольевич', '79027220728', '1', 19, 865231654),
('Василий', '79888111333', 'Ул Длинная дом 10 кв 54', 58, 2147483647),
('Евгений', '79654321111', 'Ул Длинная дом 10 кв 60', 59, 214748364),
('Васильев Владимир Викторович', '78945612345', 'Ул Длинная дом 12 кв 11', 60, 83523165),
('Охрана', '79176524509', 'Ул Длинная дом', 61, 111222112);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
