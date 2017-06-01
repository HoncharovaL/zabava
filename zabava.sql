-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2017 г., 19:13
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zabava`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comments` int(11) NOT NULL,
  `id_dogs` bigint(20) DEFAULT NULL,
  `id_services` int(11) DEFAULT NULL,
  `id_nursery` int(11) DEFAULT NULL,
  `klname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dogs`
--

CREATE TABLE IF NOT EXISTS `dogs` (
  `id_dogs` bigint(20) NOT NULL,
  `id_nursery` int(11) DEFAULT NULL,
  `id_litter` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quality` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `dogs`
--

INSERT INTO `dogs` (`id_dogs`, `id_nursery`, `id_litter`, `updated_at`, `name`, `name_en`, `bdate`, `description`, `description_en`, `photo`, `quality`, `sex`, `state`) VALUES
(1, NULL, NULL, '2017-05-28 13:21:41', 'Ветер', 'Wind', '2012-01-01', 'Лучший', 'About', '2--Nashi-sobaki_03.png', 'Show', '2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `dogs_photos`
--

CREATE TABLE IF NOT EXISTS `dogs_photos` (
  `id_dog_ph` bigint(20) NOT NULL,
  `id_dogs` bigint(20) DEFAULT NULL,
  `id_news` bigint(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dog_titles`
--

CREATE TABLE IF NOT EXISTS `dog_titles` (
  `id_dog_tit` int(11) NOT NULL,
  `id_titles` int(11) DEFAULT NULL,
  `id_dogs` bigint(20) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dog_vaccinations`
--

CREATE TABLE IF NOT EXISTS `dog_vaccinations` (
  `id_dog_vac` int(11) NOT NULL,
  `id_dogs` bigint(20) DEFAULT NULL,
  `id_vaccinations` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@ukr.net', 'admin@ukr.net', 1, NULL, '$2y$13$h/9RJeweH5Fs/Jbz98TLGOTFm435DI6HW6NXtnmeQtRlFKQZ1198a', '2017-05-28 13:16:41', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Структура таблицы `litters`
--

CREATE TABLE IF NOT EXISTS `litters` (
  `id_litters` int(11) NOT NULL,
  `id_mother` bigint(20) DEFAULT NULL,
  `id_father` bigint(20) DEFAULT NULL,
  `ldate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` bigint(20) NOT NULL,
  `updated_at` datetime NOT NULL,
  `ndate` date NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `newsdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `newsdesc_en` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `nursery`
--

CREATE TABLE IF NOT EXISTS `nursery` (
  `id_nursery` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `name_nur` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_nur_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `owner` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `about_en` text COLLATE utf8_unicode_ci,
  `site` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `nursery`
--

INSERT INTO `nursery` (`id_nursery`, `updated_at`, `name_nur`, `name_nur_en`, `bdate`, `owner`, `owner_en`, `adress`, `adress_en`, `phone`, `cellphone`, `email`, `photo`, `about`, `about_en`, `site`) VALUES
(1, '2017-05-28 13:19:45', 'Хвостатая забава', NULL, '2012-02-15', 'Трофименко Ирина', NULL, 'Мариуполь', NULL, NULL, '096-09-09-999', 'irina@mail.ru', 'pelerina-v-stile-retro.jpg', 'О нас', NULL, 'www.zabava');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_services` int(11) NOT NULL,
  `services` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `services_eng` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `price` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `id_titles` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title_eng` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `vaccinations`
--

CREATE TABLE IF NOT EXISTS `vaccinations` (
  `id_vaccinations` int(11) NOT NULL,
  `vaccinations` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vaccinations_eng` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` bigint(20) NOT NULL,
  `id_dogs` bigint(20) DEFAULT NULL,
  `id_news` bigint(20) DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `IDX_5F9E962A43C3BA3E` (`id_nursery`),
  ADD KEY `id_dogs` (`id_dogs`),
  ADD KEY `id_services` (`id_services`);

--
-- Индексы таблицы `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id_dogs`),
  ADD KEY `id_litter` (`id_litter`),
  ADD KEY `id_nursery` (`id_nursery`);

--
-- Индексы таблицы `dogs_photos`
--
ALTER TABLE `dogs_photos`
  ADD PRIMARY KEY (`id_dog_ph`),
  ADD KEY `id_dogs` (`id_dogs`),
  ADD KEY `id_news` (`id_news`);

--
-- Индексы таблицы `dog_titles`
--
ALTER TABLE `dog_titles`
  ADD PRIMARY KEY (`id_dog_tit`),
  ADD KEY `id_dogs` (`id_dogs`),
  ADD KEY `id_titles` (`id_titles`);

--
-- Индексы таблицы `dog_vaccinations`
--
ALTER TABLE `dog_vaccinations`
  ADD PRIMARY KEY (`id_dog_vac`),
  ADD KEY `id_dogs` (`id_dogs`),
  ADD KEY `id_vaccinations` (`id_vaccinations`);

--
-- Индексы таблицы `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Индексы таблицы `litters`
--
ALTER TABLE `litters`
  ADD PRIMARY KEY (`id_litters`),
  ADD KEY `id_mother` (`id_mother`),
  ADD KEY `id_father` (`id_father`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `news_type` (`news_type`),
  ADD KEY `ndate` (`ndate`);

--
-- Индексы таблицы `nursery`
--
ALTER TABLE `nursery`
  ADD PRIMARY KEY (`id_nursery`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- Индексы таблицы `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id_titles`);

--
-- Индексы таблицы `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`id_vaccinations`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `IDX_29AA6432BE1BF2B1` (`id_dogs`),
  ADD KEY `id_video` (`id_video`),
  ADD KEY `id_news` (`id_news`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id_dogs` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `dogs_photos`
--
ALTER TABLE `dogs_photos`
  MODIFY `id_dog_ph` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `dog_titles`
--
ALTER TABLE `dog_titles`
  MODIFY `id_dog_tit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `dog_vaccinations`
--
ALTER TABLE `dog_vaccinations`
  MODIFY `id_dog_vac` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `litters`
--
ALTER TABLE `litters`
  MODIFY `id_litters` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `nursery`
--
ALTER TABLE `nursery`
  MODIFY `id_nursery` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `titles`
--
ALTER TABLE `titles`
  MODIFY `id_titles` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `id_vaccinations` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A23E90DFC` FOREIGN KEY (`id_services`) REFERENCES `services` (`id_services`),
  ADD CONSTRAINT `FK_5F9E962A43C3BA3E` FOREIGN KEY (`id_nursery`) REFERENCES `nursery` (`id_nursery`),
  ADD CONSTRAINT `FK_5F9E962ABE1BF2B1` FOREIGN KEY (`id_dogs`) REFERENCES `dogs` (`id_dogs`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `dogs`
--
ALTER TABLE `dogs`
  ADD CONSTRAINT `FK_353BEEB343C3BA3E` FOREIGN KEY (`id_nursery`) REFERENCES `nursery` (`id_nursery`),
  ADD CONSTRAINT `FK_353BEEB36DC5B6E6` FOREIGN KEY (`id_litter`) REFERENCES `litters` (`id_litters`);

--
-- Ограничения внешнего ключа таблицы `dogs_photos`
--
ALTER TABLE `dogs_photos`
  ADD CONSTRAINT `FK_DD92A99196F38552` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `FK_DD92A991BE1BF2B1` FOREIGN KEY (`id_dogs`) REFERENCES `dogs` (`id_dogs`);

--
-- Ограничения внешнего ключа таблицы `dog_titles`
--
ALTER TABLE `dog_titles`
  ADD CONSTRAINT `FK_C76852F5BE1BF2B1` FOREIGN KEY (`id_dogs`) REFERENCES `dogs` (`id_dogs`),
  ADD CONSTRAINT `FK_C76852F5E772F44E` FOREIGN KEY (`id_titles`) REFERENCES `titles` (`id_titles`);

--
-- Ограничения внешнего ключа таблицы `dog_vaccinations`
--
ALTER TABLE `dog_vaccinations`
  ADD CONSTRAINT `FK_3984E09BB1079800` FOREIGN KEY (`id_vaccinations`) REFERENCES `vaccinations` (`id_vaccinations`),
  ADD CONSTRAINT `FK_3984E09BBE1BF2B1` FOREIGN KEY (`id_dogs`) REFERENCES `dogs` (`id_dogs`);

--
-- Ограничения внешнего ключа таблицы `litters`
--
ALTER TABLE `litters`
  ADD CONSTRAINT `FK_8C97E4803CE5CAF7` FOREIGN KEY (`id_mother`) REFERENCES `dogs` (`id_dogs`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_8C97E480E9128455` FOREIGN KEY (`id_father`) REFERENCES `dogs` (`id_dogs`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `FK_29AA643296F38552` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `FK_29AA6432BE1BF2B1` FOREIGN KEY (`id_dogs`) REFERENCES `dogs` (`id_dogs`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
