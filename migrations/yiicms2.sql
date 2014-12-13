-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 13 2014 г., 13:50
-- Версия сервера: 5.5.40-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yiicms2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1416664821);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator', NULL, NULL, 1416664724, 1416664724),
('admin.settings', 2, 'Админ : настройки', NULL, NULL, 1417363347, 1417377726),
('dynamic_page.admin.add', 2, 'Динамические страницы : добавить', NULL, NULL, 1417377796, 1417377796),
('dynamic_page.admin.delete', 2, 'Динамические страницы : удалить', NULL, NULL, 1417377925, 1417377925),
('dynamic_page.admin.delete-selected', 2, 'Динамические страницы : удалить выбранные', NULL, NULL, 1417378051, 1417378051),
('dynamic_page.admin.edit', 2, 'Динамические страницы : изменить', NULL, NULL, 1417377859, 1417377859),
('dynamic_page.admin.index', 2, 'Динамические страницы : список', NULL, NULL, 1417377666, 1417555922),
('menu.admin.add', 2, 'Меню : добавить', NULL, NULL, 1417379360, 1417379360),
('menu.admin.delete', 2, 'Меню : удалить', NULL, NULL, 1417379430, 1417379430),
('menu.admin.delete-selected', 2, 'Меню : удалить выбранные', NULL, NULL, 1417379460, 1417379460),
('menu.admin.edit', 2, 'Меню : изменить', NULL, NULL, 1417379395, 1417379395),
('menu.admin.index', 2, 'Меню : список', NULL, NULL, 1417379314, 1417379314),
('menu.admin.item-add', 2, 'Меню : пункт добавить', NULL, NULL, 1417379505, 1417379505),
('menu.admin.item-delete', 2, 'Меню : пункт удалить', NULL, NULL, 1417379561, 1417379561),
('menu.admin.item-edit', 2, 'Меню : пункт изменить', NULL, NULL, 1417379534, 1417379534),
('rbac.admin.permissions', 2, 'Rbac операции : список', NULL, NULL, 1417378453, 1417379626),
('rbac.admin.permissions-add', 2, 'Rbac операции : добавить', NULL, NULL, 1417378496, 1417378496),
('rbac.admin.permissions-delete', 2, 'Rbac операции : удалить', NULL, NULL, 1417378994, 1417378994),
('rbac.admin.permissions-delete-selected', 2, 'Rbac операции : удалить выбранные', NULL, NULL, 1417379056, 1417379056),
('rbac.admin.permissions-edit', 2, 'Rbac операции : редактировать', NULL, NULL, 1417378968, 1417378968),
('rbac.admin.roles', 2, 'Rbac роли : список', NULL, NULL, 1417378138, 1417378138),
('rbac.admin.roles-add', 2, 'Rbac роли : добавить', NULL, NULL, 1417378189, 1417378189),
('rbac.admin.roles-delete', 2, 'Rbac роли : удалить', NULL, NULL, 1417378275, 1417378275),
('rbac.admin.roles-delete-selected', 2, 'Rbac роли : удалить выбранные', NULL, NULL, 1417378333, 1417378333),
('rbac.admin.roles-edit', 2, 'Rbac роли : редактировать', NULL, NULL, 1417378239, 1417378239),
('superadmin', 1, 'Суперадмин', NULL, NULL, 1417377716, 1417377716),
('user.admin.add', 2, 'Пользователи : добавить', NULL, NULL, 1417379182, 1417379182),
('user.admin.delete', 2, 'Пользователи : удалить', NULL, NULL, 1417379243, 1417379243),
('user.admin.delete-selected', 2, 'Пользователи : удалить выбранные', NULL, NULL, 1417379276, 1417379276),
('user.admin.edit', 2, 'Пользователи : редактировать', NULL, NULL, 1417379213, 1417379213),
('user.admin.index', 2, 'Пользователи : список', NULL, NULL, 1416664770, 1417379106);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'admin.settings'),
('superadmin', 'admin.settings'),
('admin', 'dynamic_page.admin.add'),
('superadmin', 'dynamic_page.admin.add'),
('admin', 'dynamic_page.admin.delete'),
('superadmin', 'dynamic_page.admin.delete'),
('admin', 'dynamic_page.admin.delete-selected'),
('superadmin', 'dynamic_page.admin.delete-selected'),
('admin', 'dynamic_page.admin.edit'),
('superadmin', 'dynamic_page.admin.edit'),
('admin', 'dynamic_page.admin.index'),
('superadmin', 'dynamic_page.admin.index'),
('admin', 'menu.admin.add'),
('superadmin', 'menu.admin.add'),
('admin', 'menu.admin.delete'),
('superadmin', 'menu.admin.delete'),
('admin', 'menu.admin.delete-selected'),
('superadmin', 'menu.admin.delete-selected'),
('admin', 'menu.admin.edit'),
('superadmin', 'menu.admin.edit'),
('admin', 'menu.admin.index'),
('superadmin', 'menu.admin.index'),
('admin', 'menu.admin.item-add'),
('superadmin', 'menu.admin.item-add'),
('admin', 'menu.admin.item-delete'),
('superadmin', 'menu.admin.item-delete'),
('admin', 'menu.admin.item-edit'),
('superadmin', 'menu.admin.item-edit'),
('admin', 'rbac.admin.permissions'),
('superadmin', 'rbac.admin.permissions'),
('admin', 'rbac.admin.permissions-add'),
('superadmin', 'rbac.admin.permissions-add'),
('admin', 'rbac.admin.permissions-delete'),
('superadmin', 'rbac.admin.permissions-delete'),
('admin', 'rbac.admin.permissions-delete-selected'),
('superadmin', 'rbac.admin.permissions-delete-selected'),
('admin', 'rbac.admin.permissions-edit'),
('superadmin', 'rbac.admin.permissions-edit'),
('admin', 'rbac.admin.roles'),
('superadmin', 'rbac.admin.roles'),
('admin', 'rbac.admin.roles-add'),
('superadmin', 'rbac.admin.roles-add'),
('admin', 'rbac.admin.roles-delete'),
('superadmin', 'rbac.admin.roles-delete'),
('admin', 'rbac.admin.roles-delete-selected'),
('superadmin', 'rbac.admin.roles-delete-selected'),
('admin', 'rbac.admin.roles-edit'),
('superadmin', 'rbac.admin.roles-edit'),
('admin', 'user.admin.add'),
('superadmin', 'user.admin.add'),
('admin', 'user.admin.delete'),
('superadmin', 'user.admin.delete'),
('admin', 'user.admin.delete-selected'),
('superadmin', 'user.admin.delete-selected'),
('admin', 'user.admin.edit'),
('superadmin', 'user.admin.edit'),
('admin', 'user.admin.index'),
('superadmin', 'user.admin.index');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dynamic_page`
--

CREATE TABLE IF NOT EXISTS `dynamic_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `dt_created` datetime NOT NULL,
  `display` tinyint(2) NOT NULL,
  `public` tinyint(2) NOT NULL,
  `translit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `display` (`display`,`public`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `dynamic_page`
--

INSERT INTO `dynamic_page` (`id`, `name`, `text`, `dt_created`, `display`, `public`, `translit`) VALUES
(1, 'about', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2014-11-30 19:58:33', 1, 0, 'about'),
(2, 'pg2', '<p>pg 3</p>', '2014-11-30 19:59:05', 1, 1, NULL),
(6, 'еее', '', '2014-11-30 20:03:43', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'Main menu');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_menu` (`id_menu`,`id_parent`,`display`,`position`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `id_menu`, `id_parent`, `url`, `name`, `display`, `position`) VALUES
(6, 1, 5, '', 'item_1_1_1', 0, 1),
(10, 1, 7, '', 'item_3_1_2', 0, 0),
(11, 1, 0, '/', 'Главная', 0, 1),
(12, 1, 0, '/pg-about', 'О компании', 0, 1),
(13, 1, 12, '/pg-about/sds', 'Направление', 0, 0),
(14, 1, 12, '/clients', 'Clients', 0, 1),
(15, 1, 0, '/contacts', 'Contacts', 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1416664685),
('m140506_102106_rbac_init', 1416664699);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `dt_created` datetime NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`, `dt_created`, `auth_key`, `access_token`) VALUES
(1, 'admin', '$2y$13$t6K0.4DBTSjR455nCZLu8OBnzvUeRuSA/1hX0slksp6UncO367e0S', 'sa_shok333@mail.ru', 1, '2014-11-22 14:00:20', '', 'xhMlyJm7CgEUmR6Hh8bjKJw6nqwnpAX0');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
