-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~trusty.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2017 at 11:29 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 7.1.2-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopaholic`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `content` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `slug`, `description`, `content`, `date`, `status`) VALUES
(1, 'Test post', 'test-post', 'test', 'test', '2017-03-15 06:18:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `sort_order`, `status`) VALUES
(1, 0, 'Планшеты', 0, 1),
(2, 0, 'Ноутбуки', 0, 1),
(3, 0, 'Телефоны', 0, 1),
(4, 0, 'Наушники', 0, 1),
(5, 0, 'Чехлы', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(3, 'userName', 'userPhone', 'userText', 1, '2017-03-12 18:21:11', '\"[{\\\"id\\\":\\\"109\\\",\\\"quantity\\\":\\\"3\\\"}]\"', 1),
(11, 'jan', 'userPhone', 'userText', 1, '2017-03-12 23:50:33', '\"[{\\\"id\\\":\\\"109\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(12, 'jan', 'userPhone', 'userText', 1, '2017-03-13 09:01:23', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"},{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(13, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:04:21', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"3\\\"}]\"', 1),
(14, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:27:23', '\"[{\\\"id\\\":\\\"107\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(15, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:28:37', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"2\\\"}]\"', 1),
(16, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:45:04', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"},{\\\"id\\\":\\\"111\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(17, 'root', 'userPhone', 'userText', 2, '2017-03-13 10:29:21', '\"[{\\\"id\\\":\\\"109\\\",\\\"quantity\\\":\\\"2\\\"},{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(3, 'Ноутбук Asus X200MA White', 2, 2028027, 2222, 1, 'Asus', 'Экран 11.6\" (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / белый', 0, 1, 1),
(4, 'Ноутбук Acer Aspire E3-112-C65X', 1, 2019487, 325, 1, 'Acer', 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Linpus / 1.29 кг / серебристый', 0, 1, 1),
(5, 'Ноутбук Acer TravelMate TMB115', 2, 1953212, 275, 1, 'Acer', 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linpus / 1.32 кг / черный', 0, 0, 1),
(6, 'Ноутбук Lenovo Flex 10', 1, 1602042, 370, 0, 'Lenovo', 'Экран 10.1\" (1366x768) HD LED, сенсорный, глянцевый / Intel Celeron N2830 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 / 1.2 кг / черный', 0, 0, 1),
(7, 'Ноутбук Asus X751MA', 1, 2028367, 430, 1, 'Asus', 'Экран 17.3\" (1600х900) HD+ LED, глянцевый / Intel Pentium N3540 (2.16 - 2.66 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / DOS / 2.6 кг / белый', 0, 1, 1),
(8, 'Samsung Galaxy Tab S 10.5 16GB', 2, 1129365, 780, 1, 'Samsung', 'Samsung Galaxy Tab S создан для того, чтобы сделать вашу жизнь лучше. Наслаждайтесь своим контентом с покрытием 94% цветов Adobe RGB и 100000:1 уровнем контрастности, который обеспечивается sAmoled экраном с функцией оптимизации под отображаемое изображение и окружение. Яркий 10.5” экран в ультратонком корпусе весом 467 г порадует вас высоким уровнем портативности. Работа станет проще вместе с Hancom Office и удаленным доступом к вашему ПК. E-Meeting и WebEx – отличные помощники для проведения встреч, когда вы находитесь вне офиса. Надежно храните ваши данные благодаря сканеру отпечатка пальцев.', 1, 1, 1),
(9, 'Samsung Galaxy Tab S 8.4 16GB', 2, 1128670, 640, 1, 'Samsung', 'Экран 8.4\" Super AMOLED (2560x1600) емкостный Multi-Touch / Samsung Exynos 5420 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 16 ГБ встроенной памяти + поддержка карт памяти microSD / Bluetooth 4.0 / Wi-Fi 802.11 a/b/g/n/ac / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 4.4.2 (KitKat) / 294 г / белый', 0, 0, 1),
(10, 'Gazer Tegra Note 7', 2, 683364, 210, 1, 'Gazer', 'Экран 7\" IPS (1280x800) емкостный Multi-Touch / NVIDIA Tegra 4 (1.8 ГГц) / RAM 1 ГБ / 16 ГБ встроенной памяти + поддержка карт памяти microSD / Wi-Fi / Bluetooth 4.0 / основная камера 5 Мп, фронтальная - 0.3 Мп / GPS / ГЛОНАСС / Android 4.4.2 (KitKat) / вес 320 г', 0, 0, 1),
(11, 'Мобильный телефон SONY Xperia V LT25i Black', 3, 355025, 175, 1, 'Sony', 'Sony Xperia V имеет довольно компактный размер, что уже выделяет его среди большинства современных устройств. Смартфон выполнен в фирменном для Sony «арочном» стиле – матовая задняя крышка имеет вогнутую форму, благодаря чему Xperia V удобно лежит в руке. Еще одной изюминкой дизайна является окантовка, внешне напоминающая металл.', 0, 0, 1),
(12, 'Наушники Sennheiser CX 150', 4, 1563832, 25, 1, 'Sennheiser', 'Высококачественные внутриканальные (Ear Canal) закрытые стереонаушники с мощным стереозвуком, насыщенным низкими частотами. Оптимизированы для высококачественного воспроизведения звука в движении. Комплект ушных вставок-адаптеров трёх разных размеров гарантирует высокий комфорт, оптимальную посадку в ушном канале и превосходное подавление внешних шумов. CX 150 идеально подходят для использования с МР3, CD, MD и DVD плеерами и другими портативными устройствами', 0, 0, 1),
(13, 'Ноутбук Asus X200MA (X200MA-KX315D)', 1, 1839707, 395, 1, 'Asus', 'Экран 11.6\" (1366x768) HD LED, глянцевый / Intel Pentium N3530 (2.16 - 2.58 ГГц) / RAM 4 ГБ / HDD 750 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / синий', 0, 0, 1),
(14, 'Ноутбук HP Stream 11-d050nr', 1, 2343847, 305, 0, 'Hewlett Packard', 'Экран 11.6” (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / eMMC 32 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 + MS Office 365 / 1.28 кг / синий', 1, 0, 1),
(15, 'Ноутбук Asus X200MA White ', 1, 2028027, 270, 1, 'Asus', 'Экран 11.6\" (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / белый', 0, 0, 1),
(16, 'Ноутбук Acer Aspire E3-112-C65X', 1, 2019487, 325, 1, 'Acer', 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Linpus / 1.29 кг / серебристый', 0, 0, 1),
(17, 'Ноутбук Acer TravelMate TMB115', 1, 1953212, 275, 1, 'Acer', 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linpus / 1.32 кг / черный', 0, 0, 1),
(18, 'Ноутбук Lenovo Flex 10', 1, 1602042, 370, 0, 'Lenovo', 'Экран 10.1\" (1366x768) HD LED, сенсорный, глянцевый / Intel Celeron N2830 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 / 1.2 кг / черный', 0, 0, 1),
(19, 'Ноутбук Asus X751MA', 1, 2028367, 430, 1, 'Asus', 'Экран 17.3\" (1600х900) HD+ LED, глянцевый / Intel Pentium N3540 (2.16 - 2.66 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / DOS / 2.6 кг / белый', 0, 0, 1),
(20, 'Ноутбук Asus X200MA (X200MA-KX315D)', 1, 1839707, 395, 1, 'Asus', 'Экран 11.6\" (1366x768) HD LED, глянцевый / Intel Pentium N3530 (2.16 - 2.58 ГГц) / RAM 4 ГБ / HDD 750 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / синий', 0, 0, 1),
(21, 'Ноутбук HP Stream 11-d050nr', 1, 2343847, 305, 0, 'Hewlett Packard', 'Экран 11.6” (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / eMMC 32 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 + MS Office 365 / 1.28 кг / синий', 1, 0, 1),
(22, 'Ноутбук Asus X200MA White ', 1, 2028027, 270, 1, 'Asus', 'Экран 11.6\" (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / белый', 0, 0, 1),
(23, 'Ноутбук Acer Aspire E3-112-C65X', 1, 2019487, 325, 1, 'Acer', 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Linpus / 1.29 кг / серебристый', 0, 0, 1),
(24, 'Ноутбук Acer TravelMate TMB115', 1, 1953212, 275, 1, 'Acer', 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linpus / 1.32 кг / черный', 0, 0, 1),
(25, 'Ноутбук Lenovo Flex 10', 1, 1602042, 370, 0, 'Lenovo', 'Экран 10.1\" (1366x768) HD LED, сенсорный, глянцевый / Intel Celeron N2830 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 / 1.2 кг / черный', 0, 0, 1),
(26, 'Ноутбук Asus X751MA', 1, 2028367, 430, 1, 'Asus', 'Экран 17.3\" (1600х900) HD+ LED, глянцевый / Intel Pentium N3540 (2.16 - 2.66 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / DOS / 2.6 кг / белый', 0, 0, 1),
(27, 'Ноутбук HP 255 (J0Y43EA)', 1, 2028367, 9200, 1, 'HP', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(28, 'Ноутбук Dell Vostro 5470 (V4545NDL-13/15) Haswell', 1, 2028367, 9200, 1, 'DELL', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 1, 0, 1),
(29, 'Ноутбук HP 255 (J0Y43EA)', 1, 2028367, 9200, 1, 'HP', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(30, 'Ноутбук ASUS E502MA-XX0030D (90NL0021-M00450)', 1, 2028367, 9200, 1, 'Asus', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(31, 'Ноутбук Lenovo IdeaPad G50-30 (80G00028UA) ', 1, 2028367, 9200, 1, 'Lenovo', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(32, 'Ноутбук LENOVO 100-15 (80QQ004RUA) ', 1, 2028367, 9200, 1, 'Lenovo', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(33, 'Ноутбук ASUS Zenbook Pro UX501JW-FJ410T (90NB0871-M06660)', 1, 2028367, 9200, 1, 'Asus', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(34, 'Ноутбук Apple A1502 MacBook Pro (MF839UA/A)', 1, 2028367, 9200, 1, 'Apple', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 1, 0, 1),
(35, 'Ноутбук LENOVO 100-15 (80QQ004NUA)', 1, 2028367, 9200, 1, 'Lenovo', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(36, 'Ноутбук LENOVO G5080 (80E502PTUA) ', 1, 2028367, 9200, 1, 'Lenovo', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(37, 'Ноутбук ASUS X553SA-XX185D (90NB0AC3-M02800)', 1, 2028367, 9200, 1, 'Asus', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(38, 'Ноутбук Lenovo G5080 (80E501JKUA)', 1, 2028367, 9200, 1, 'Lenovo', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 1, 0, 1),
(39, 'Нетбук Acer V5-131-10072G32NKK (NX.M89EU.005)', 1, 2028367, 9200, 1, 'Acer', 'Экран 11.3” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(40, 'Ноутбук Dell Vostro 5470 (V4345NDL-14) Haswell Silver', 1, 2028367, 9200, 1, 'DELL', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(41, 'Ноутбук Apple MacBook Pro 13\" (MD101UA/A)', 1, 2028367, 9200, 1, 'Apple', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(42, 'Ультрабук ASUS Transformer TX300CA-C4023H', 1, 2028367, 9200, 1, 'Asus', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(43, 'Ноутбук HP Pavilion 15-n292sr (G5E73EA)', 1, 2028367, 9200, 1, 'HP', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(44, 'Ноутбук Acer Packard Bell ENTF71BM-C5XC (NX.C3SEU.005)', 1, 2028367, 9200, 1, 'Acer', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(45, 'Ультрабук ASUS VivoBook S551LB-CJ042H', 1, 2028367, 9200, 1, 'Asus', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 0, 0, 1),
(46, 'Ноутбук ASUS K550CA-XX1043D (90NB00U3-M18860)', 1, 2028367, 9200, 1, 'Asus', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 1, 0, 1),
(47, 'Ноутбук HP 250 (J0X92EA)', 1, 2028367, 9200, 1, 'HP', 'Экран 15.6” (1366x768) HD LED, матовый / Intel Core i3-4005U (1.7 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.15 кг / черный', 1, 0, 1),
(48, 'Планшет Samsung Galaxy Tab S2 9.7\" 32GB Champagne', 2, 565974, 6900, 1, 'Samsung', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(49, 'Планшет Samsung Galaxy Tab S2 8.0\" 32GB Champagne', 2, 565974, 6900, 1, 'Samsung', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 1, 0, 1),
(50, 'Планшет Lenovo YOGA Tablet 3-850M LTE', 1, 565974, 6900, 1, 'Lenovo', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(51, 'Интернет-планшет Asus 7\" MeMO Pad ME70 8GB black', 2, 565974, 6900, 1, 'Asus', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(52, 'Интернет-планшет Lenovo 10.1\" Yoga Tablet 2-1050F', 2, 565974, 6900, 1, 'Lenovo', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 1, 0, 1),
(53, 'Интернет-планшет Globex 9,7\" (GU903С)', 2, 565974, 6900, 1, 'Globex', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(54, 'Интернет-планшет PocketBook 7\" SURFpad U7', 2, 565974, 6900, 1, 'PocketBook', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(55, 'Интернет-планшет SONY 9.4\" Xperia Tablet S 16 GB 3G (SGPT131RU/S.RU3)', 2, 565974, 6900, 1, 'Sony', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(56, 'Планшетный компьютер Apple iPad Mini with Retina Wi-Fi 16GB Space Gray', 2, 565974, 6900, 1, 'Apple', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 1, 0, 1),
(57, 'Планшетный компьютер Apple iPad Air Wi-Fi 16GB Silver', 2, 565974, 6900, 1, 'Apple', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 1, 0, 1),
(58, 'Планшетный компьютер Apple iPad Air Wi-Fi 16GB Space Gray', 2, 565974, 6900, 1, 'Apple', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(59, 'Интернет-планшет SAMSUNG 10.1\" Galaxy Note 2014 White', 2, 565974, 6900, 1, 'Samsung', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(60, 'Интернет-планшет 10\" Lenovo A7600 Navy Blue 16GB 3G', 2, 565974, 6900, 1, 'Lenovo', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(61, 'Планшетный компьютер Apple iPad Mini with Retina Wi-Fi 16GB Silver', 2, 565974, 6900, 1, 'Apple', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(62, 'Планшет Samsung Galaxy Tab 4 7.0 3G Ebony Black', 2, 565974, 6900, 1, 'Samsung', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(63, 'Планшет Microsoft Surface RT 32Gb (9HR-00016)', 2, 565974, 6900, 1, 'Microsoft', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(64, 'Планшет Microsoft Surface RT 32Gb (7XR-00028)', 2, 565974, 6900, 1, 'Microsoft', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(65, 'Интернет-планшет Acer 10\" Iconia Tab A200 Silver (HT.H9SEE.002)', 2, 565974, 6900, 1, 'Acer', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 1, 0, 1),
(66, 'Интернет-планшет Lenovo 10\" IdeaTab Miix 2 64GB', 2, 565974, 6900, 1, 'Lenovo', 'Экран 9.7\" Super AMOLED (2048x1536) емкостный MultiTouch / Samsung Exynos 5433 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD / 802.11 a/b/g/n/ac / Bluetooth 4.1 / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 5.0 (Lollipop) / 375 г / черный', 0, 0, 1),
(67, 'Мобильный телефон SONY Xperia V LT25i Black', 3, 64486, 6900, 1, 'Sony', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(68, 'Мобильный телефон Lenovo A536 DUAL SIM BLACK', 3, 64486, 6900, 1, 'Lenovo', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(69, 'Мобильный телефон SONY Xperia M2 D2302 DualSim Black', 3, 64486, 6900, 1, 'Sony', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(70, 'Смартфон Samsung Galaxy Star Advance Duos G350E Black', 3, 64486, 6900, 1, 'Samsung', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(71, 'Смартфон Samsung Galaxy S5 G900H Charcoal Black ', 3, 64486, 6900, 1, 'Samsung', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(72, 'Смартфон Samsung Note 4 N910 black', 3, 64486, 6900, 1, 'Samsung', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(73, 'Мобильный телефон HTC One M8 Metal Grey', 3, 64486, 6900, 1, 'HTC', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(74, 'Смартфон Samsung Galaxy A5 Duos A500H/DS Black', 3, 64486, 6900, 1, 'Samsung', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(75, 'Мобильный телефон Acer Liquid E700 Triple Sim Black', 3, 64486, 6900, 1, 'Acer', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(76, 'Мобильный телефон SONY Xperia M Dual C2005 Purple', 3, 64486, 6900, 1, 'Sony', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(77, 'Мобильный телефон Apple iPhone 6 Plus 16 GB SPACE GRAY', 3, 64486, 6900, 1, 'Apple', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(78, 'Мобильный телефон Apple iPhone 5S 16 GB SPACE GREY ', 3, 64486, 6900, 1, 'Apple', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(79, 'Мобильный телефон LG L Bello Dual D335 Black', 3, 64486, 6900, 1, 'LG', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(80, 'Мобильный телефон HTC One Mini 2 Metal Grey', 3, 64486, 6900, 1, 'HTC', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(81, 'Мобильный телефон LG G3 S D724 Dual Black Gold', 3, 64486, 6900, 1, 'LG', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(82, 'Мобильный телефон HTC One M8 Dual Sim Gunmetal Grey ', 3, 64486, 6900, 1, 'HTC', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(83, 'Мобильный телефон Apple iPhone 6 Plus 16 GB GOLD', 3, 64486, 6900, 1, 'Apple', 'Экран (5.7\", Super AMOLED, 2560х1440)/ Samsung Exynos 7420 (Quad 1.5 ГГц + Quad 2.1 ГГц)/ основная камера: 16 Мп, фронтальная камера: 5 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ Android 5.1 (Lollipop) / 3000 мА*ч', 0, 0, 1),
(84, 'Мышь Genius NS-6000 WL Black', 4, 64486, 6900, 1, 'Logitech', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(85, 'Мышь Logitech Performance MX WL Laser Black', 4, 64486, 6900, 1, 'Logitech', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(86, 'Мышь Microsoft ARC Touch WL Black', 4, 64486, 6900, 1, 'Microsoft', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(87, 'Мышь Genius NS-6005 WL Black', 4, 64486, 6900, 1, 'Genius', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(88, 'Мышь Microsoft WL ARC Touch Mouse Ru Ret', 4, 64486, 6900, 1, 'Microsoft', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(89, 'Клавиатура Беспроводная Logitech K400 WL Touch', 4, 64486, 6900, 1, 'Logitech', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(90, 'Клавиатура Apple Wireless Keyboard (aluminium)', 4, 64486, 6900, 1, 'Apple', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(91, 'Клавиатура Беспроводная Logitech K750 WL', 4, 64486, 6900, 1, 'Logitech', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(92, 'Клавиатура Apple Magic Trackpad', 4, 64486, 6900, 1, 'Apple', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(93, 'Подставка Cooler Master Choiix STASH,карман для 2.5\" HDD/SSD,3x-port USB HUB', 4, 64486, 6900, 1, 'CM', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(94, 'Подставка Cooler Master Choiix MINI AIR THROUGH,4x-port USB Hub,черная', 4, 64486, 6900, 1, 'CM', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(95, 'Подставка Cooler Master NotePal U-Lite, 1x100мм fan,черная', 4, 64486, 6900, 1, 'CM', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(96, 'Чехол к iPhone 5 Ozaki O!coat-0.3+Canvas Khaki', 4, 64486, 6900, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(97, 'Чехол к iPhone 5 Ozaki O!coat-0.3+Canvas Grey', 4, 64486, 6900, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(98, 'Чехол к iPhone 5 Ozaki O!coat-0.3+Wood Walnut', 4, 64486, 6900, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(99, 'Чехол к iPhone 5 Ozaki O!coat-0.3+Wood Ebony', 4, 64486, 6900, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(100, 'Защитная пленка ADPO для NOKIA Lumia 820', 4, 64486, 6900, 1, 'ADPO', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(101, 'Защитная пленка ADPO для iPhone 5', 4, 64486, 6900, 1, 'ADPO', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(102, 'Стекло OZAKI O!coat U-Glaz iPhone 6', 4, 64486, 6900, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(103, 'Защитная пленка EasyLink для Huawei Ascend G700-U10 DualSim (EL)', 4, 64486, 6900, 1, 'EL', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(104, 'Защитная пленка GlobalShield для LG D724 G3s (GS)', 4, 64486, 6900, 1, 'GS', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(105, 'Чехол к iPhone 5 Ozaki O!coat-0.3+Pocket Black', 4, 64486, 299, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 1, 0, 1),
(106, 'Чехол к iPad New Ozaki iCoat Slim-Y White/White for New iPad', 4, 64486, 399, 1, 'Ozaki', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(107, 'Мобильный телефон Apple iPhone 6 Plus 16 GB Space Gray', 3, 64486, 3399, 1, 'Apple', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 1, 0, 1),
(108, 'Мобильный телефон Apple iPhone 6 Plus 16 GB SILVER', 3, 64486, 2888, 1, 'Apple', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(109, 'Планшетный компьютер Apple iPad Air Wi-Fi 16GB Space Gray ', 2, 64486, 9000, 1, 'Apple', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 0, 0, 1),
(110, 'Ноутбук Apple MacBook Air 11\" (MD711UA/A) Haswell', 1, 64486, 6900, 1, 'Apple', 'Горизонтальная прокрутка, Для обеих рук (симметричный дизайн), овместимость с ОС: Mac OS, Microsoft Windows', 1, 0, 1),
(118, 'Test', 1, 22222, 223, 1, 'test', 'test for new proguct', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'jan', 'jan@uk.ua', '$2y$10$f3CcpjqvYjj6K9qhWcSRz.GnW5PW2ux8bG6.aPoSrHyViLyKbQoXe', 'user'),
(2, 'root', 'root@uk.ua', '$2y$10$nHwbL.IWz0s4iClOB8qkJ.D9yiampO/1y0A4CPx2yj40Ip.1BTAt6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
