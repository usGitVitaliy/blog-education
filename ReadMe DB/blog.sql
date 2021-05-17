-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 17 2021 г., 13:08
-- Версия сервера: 8.0.23-0ubuntu0.20.04.1
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int UNSIGNED NOT NULL,
  `surname` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `login` char(25) NOT NULL DEFAULT '',
  `password` char(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `surname`, `name`, `login`, `password`) VALUES
(1, 'Пупыкин', 'Вася', 'pupok', 'pupo'),
(2, 'Иванов', 'Гриша', 'iva', 'ivan'),
(3, 'Петров', 'Федя', 'flash', 'flash'),
(4, 'Маслова', 'Светлана', 'svetik', 'svet'),
(5, 'Бойко', 'Ирина', 'boka', 'boka'),
(6, 'Нестеренко', 'Богдан', 'ice', 'icem'),
(7, 'Обиван', 'Кенобе', 'yoda', 'yoda'),
(8, 'Степаненко', 'Марина', 'marina', 'marina'),
(9, 'Казявкин', 'Федя', 'Kazan', '1132');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int UNSIGNED NOT NULL,
  `post_item` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `post_item`) VALUES
(1, 1, 'Обогащение урана в домашних условиях'),
(3, 2, 'Как собрать нано-робота в гараже'),
(4, 3, 'Теория квантовой телепартации на примерах'),
(5, 4, 'Замена стартера на грузовике \"Урал-4320\"'),
(6, 5, 'Как быстро ликвидировать утечку фреона в адронном колайдере при помощи подручных средств'),
(7, 6, 'Как провести операцию собаке без наркоза. Молоток и доска - практическое применение'),
(8, 7, 'Приемы фехтования на люменесцентных лампах'),
(9, 8, 'Правка тормозных дисков на горном велосипеде при помощи газового ключа');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
