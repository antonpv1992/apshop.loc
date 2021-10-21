-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 21 2021 г., 21:06
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `apshop_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'tablet'),
(3, 'smartphone');

-- --------------------------------------------------------

--
-- Структура таблицы `feature`
--

CREATE TABLE `feature` (
  `id` int NOT NULL,
  `feature` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feature`
--

INSERT INTO `feature` (`id`, `feature`) VALUES
(1, 'screen_diagonal'),
(2, 'screen_type'),
(3, 'cpu'),
(4, 'cpu_frequency'),
(5, 'core'),
(6, 'chipset'),
(7, 'ram_type'),
(8, 'ram_memory'),
(9, 'memory_type'),
(10, 'memory_amount'),
(11, 'memory_slot'),
(12, 'graphics_model'),
(13, 'graphics_memory'),
(14, 'sim'),
(15, 'sim_size'),
(16, 'connector'),
(17, 'camera'),
(18, 'camera_quantity'),
(19, 'camera_quality'),
(20, 'module'),
(21, 'battery'),
(22, 'battery_capacity'),
(23, 'color'),
(24, 'country'),
(25, 'frame'),
(26, 'weight'),
(27, 'system');

-- --------------------------------------------------------

--
-- Структура таблицы `feature_value`
--

CREATE TABLE `feature_value` (
  `id` int NOT NULL,
  `feature_id` int NOT NULL,
  `value` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feature_value`
--

INSERT INTO `feature_value` (`id`, `feature_id`, `value`) VALUES
(1, 1, '15.6'),
(2, 1, '14'),
(3, 1, '8.7'),
(4, 1, '10.95'),
(5, 1, '12.9'),
(6, 1, '6.67'),
(7, 1, '6.43'),
(8, 1, '6.44'),
(9, 2, 'ips'),
(10, 2, 'oled'),
(11, 2, 'amoled'),
(12, 3, 'Intel Core i7-11370H'),
(13, 3, 'Intel Core i5-1135G7'),
(14, 3, 'Intel Core i5-10300H'),
(15, 3, 'MediaTek Helio P22T'),
(16, 3, 'Qualcomm Snapdragon 865'),
(17, 3, 'Apple M1'),
(18, 3, 'MediaTek Dimensity 1200'),
(19, 3, 'MediaTek Helio P95'),
(20, 3, 'Qualcomm Snapdragon 765G'),
(21, 3, 'Intel Core i7-10750H'),
(22, 4, '3.3 - 4.8'),
(23, 4, '2.4 - 4.2'),
(24, 4, '2.5 - 4.5'),
(25, 4, '2.3'),
(26, 4, '2.4'),
(27, 4, '3'),
(28, 4, '2.2'),
(29, 4, '2.6 - 5'),
(30, 5, '4'),
(31, 5, '6'),
(32, 5, '8'),
(33, 6, 'Intel'),
(34, 6, 'MediaTek'),
(35, 6, 'Qualcomm'),
(36, 6, 'Apple'),
(37, 7, 'DDR4'),
(38, 8, '3'),
(39, 8, '6'),
(40, 8, '8'),
(41, 8, '16'),
(42, 9, 'hdd'),
(43, 9, 'ssd'),
(44, 10, '512'),
(45, 10, '128'),
(46, 10, '32'),
(47, 11, 'integrated'),
(48, 11, 'm2'),
(49, 11, 'sata'),
(50, 12, 'NVIDIA GeForce RTX 3060'),
(51, 12, 'integrated'),
(52, 12, 'NVIDIA GeForce GTX 1650 Ti'),
(53, 12, 'ARM Mali-G77 MC9'),
(54, 12, 'PowerVR IMG9XM-HP8'),
(55, 12, 'Qualcomm Adreno 620'),
(56, 13, '1'),
(57, 13, '4'),
(58, 13, '6'),
(59, 14, 'yes'),
(60, 14, 'no'),
(61, 15, 'sim'),
(62, 15, 'micro-sim'),
(63, 15, 'nano-sim'),
(64, 16, 'usb'),
(65, 16, 'micro-usb'),
(66, 16, 'hdmi'),
(67, 16, 'lan'),
(68, 16, 'audio'),
(69, 16, 'microphone'),
(70, 16, 'combo'),
(71, 17, 'yes'),
(72, 17, 'no'),
(73, 18, '1'),
(74, 18, '2'),
(75, 19, '8'),
(76, 19, '10'),
(77, 19, '12'),
(78, 19, '13'),
(79, 20, 'Bluetooth'),
(80, 20, 'Wi-Fi'),
(81, 21, '3.6'),
(82, 21, '3.7'),
(83, 21, '4.2'),
(84, 21, '4.4'),
(85, 21, '7.2'),
(86, 21, '10.8'),
(87, 22, '7200'),
(88, 22, '5800'),
(89, 22, '4750'),
(90, 22, '10000'),
(91, 22, '14000'),
(92, 22, '20000'),
(93, 23, 'gray'),
(94, 23, 'green'),
(95, 23, 'black'),
(96, 23, 'white'),
(97, 23, 'purple'),
(98, 23, 'orange'),
(99, 23, 'blue'),
(100, 23, 'red'),
(101, 24, 'china'),
(102, 24, 'korea'),
(103, 25, 'plastic'),
(104, 25, 'metal'),
(105, 25, 'aluminum'),
(106, 26, '2'),
(107, 26, '1.05'),
(108, 26, '2.3'),
(109, 26, '0.37'),
(110, 26, '0.5'),
(111, 26, '0.68'),
(112, 26, '0.2'),
(113, 26, '0.18'),
(114, 26, '0.19'),
(115, 26, '2.4'),
(116, 9, 'integrated'),
(117, 27, 'DOS'),
(118, 27, 'Windows'),
(119, 27, 'Android'),
(120, 27, 'HarmonyOS'),
(121, 27, 'iPadOS');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `status` enum('In Progress','Complited','Canceled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'In Progress', '2021-10-17 19:41:07', '2021-10-17 19:41:10', 2),
(21, 'In Progress', '2021-10-20 19:14:19', '2021-10-20 19:14:20', 2),
(22, 'In Progress', '2021-10-20 19:14:10', '2021-10-20 19:14:10', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `quantity` smallint NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`product_id`, `order_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1000),
(1, 21, 1, 1000),
(2, 22, 1, 700),
(3, 22, 1, 700),
(5, 21, 3, 500),
(6, 1, 2, 550),
(8, 21, 2, 600),
(9, 22, 2, 400);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `full_title` varchar(256) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` smallint NOT NULL,
  `old_price` smallint DEFAULT NULL,
  `image` varchar(256) NOT NULL DEFAULT 'no-image.jpg',
  `alias` varchar(256) NOT NULL,
  `new` smallint NOT NULL DEFAULT '0',
  `hot` smallint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `full_title`, `description`, `brand`, `price`, `old_price`, `image`, `alias`, `new`, `hot`) VALUES
(1, 'Asus ROG Strix G15', 'Asus ROG Strix G15 G512LI-HN057 Black', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore, fugit corrupti. Vel similique eligendi illo sint doloremque adipisci dolores quasi consectetur excepturi natus ut deleniti qui, nihil in repellat impedit veniam ducimus sapiente! Fugiat, exercitationem. Quaerat repellat totam vero impedit quasi!', 'Asus', 1000, 1200, 'no-image.jpg', 'asus-rog-strix-g15', 1, 1),
(2, 'Asus TUF Dash F15', 'Asus TUF Dash F15 FX516PM-HN023 Eclipse Gray', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore, fugit corrupti.', 'Asus', 700, 800, 'no-image.jpg', 'asus-tuf-dash-f15', 0, 0),
(3, 'Acer Swift 5', 'Acer Swift 5 SF514-55TA-55U6 Mist Green', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore, fugit corrupti.', 'Acer', 700, 750, 'no-image.jpg', 'acer-swift-5', 0, 1),
(4, 'Lenovo Legion 5', 'Lenovo Legion 5 15IMH05 Phantom Black', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore, fugit corrupti. Vel similique eligendi illo sint doloremque adipisci dolores quasi consectetur excepturi natus ut deleniti qui, nihil in repellat impedit veniam ducimus sapiente! Fugiat, exercitationem.', 'Lenovo', 800, 900, 'no-image.jpg', 'lenovo-legion-5', 1, 0),
(5, 'Samsung Galaxy Tab A7', 'Samsung Galaxy Tab A7 Lite LTE Grey', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque.', 'Samsung', 500, 550, 'no-image.jpg', 'samsung-galaxy-tab-a7', 0, 1),
(6, 'Huawei MatePad 11', 'Huawei MatePad 11 Matte Grey', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore.', 'Huawei', 550, 650, 'no-image.jpg', 'huawei-matepad-11', 1, 0),
(7, 'Apple iPad Pro', 'Apple iPad Pro Space Gray', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore, fugit corrupti.', 'Apple', 1000, 1100, 'no-image.jpg', 'apple-ipad-pro', 0, 1),
(8, 'Xiaomi 11T', 'Xiaomi 11T Meteorite Gray', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas.', 'Xiaomi', 600, 750, 'no-image.jpg', 'xiaomi-11t', 0, 0),
(9, 'OPPO Reno5 ', 'OPPO Reno5 Lite Purple', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium, sunt fugiat ducimus libero, maxime vel nostrum tempore.', 'Oppo', 400, 500, 'no-image.jpg', 'oppo-reno5', 1, 0),
(10, 'OnePlus Nord', 'OnePlus Nord Blue Marble', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam architecto qui recusandae dolorem exercitationem, in quasi vitae illum perspiciatis tempora, omnis repellat odio, quas repudiandae? Animi numquam consectetur beatae. Aperiam, sit consequuntur animi, harum esse inventore laudantium et laboriosam mollitia facere, fugiat ad dolores id modi error assumenda! Amet labore ut doloremque possimus asperiores facere eveniet sit, sed et? Nesciunt esse vero culpa velit veritatis quo tempore ut voluptas, et, incidunt perferendis quasi nostrum cumque? Neque non vero laudantium.', 'OnePlus', 450, 600, 'no-image.jpg', 'oneplus-nord', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 3),
(9, 3),
(10, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `product_feature_value`
--

CREATE TABLE `product_feature_value` (
  `product_id` int NOT NULL,
  `feature_value_feature_id` int NOT NULL,
  `feature_value_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_feature_value`
--

INSERT INTO `product_feature_value` (`product_id`, `feature_value_feature_id`, `feature_value_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 2),
(4, 1, 1),
(5, 1, 3),
(6, 1, 4),
(7, 1, 5),
(8, 1, 6),
(9, 1, 7),
(10, 1, 8),
(1, 2, 9),
(2, 2, 9),
(3, 2, 9),
(4, 2, 9),
(5, 2, 9),
(6, 2, 9),
(7, 2, 9),
(8, 2, 10),
(9, 2, 11),
(10, 2, 11),
(1, 3, 21),
(2, 3, 12),
(3, 3, 13),
(4, 3, 14),
(5, 3, 15),
(6, 3, 16),
(7, 3, 17),
(8, 3, 18),
(9, 3, 19),
(10, 3, 20),
(1, 4, 29),
(2, 4, 22),
(3, 4, 23),
(4, 4, 24),
(5, 4, 25),
(6, 4, 26),
(7, 4, 27),
(8, 4, 27),
(9, 4, 28),
(10, 4, 26),
(1, 5, 31),
(2, 5, 30),
(3, 5, 30),
(4, 5, 30),
(5, 5, 32),
(6, 5, 32),
(7, 5, 32),
(8, 5, 32),
(9, 5, 32),
(10, 5, 32),
(1, 6, 33),
(2, 6, 33),
(3, 6, 33),
(4, 6, 33),
(5, 6, 34),
(6, 6, 35),
(7, 6, 36),
(8, 6, 34),
(9, 6, 34),
(10, 6, 35),
(1, 7, 37),
(2, 7, 37),
(3, 7, 37),
(4, 7, 37),
(1, 8, 41),
(2, 8, 41),
(3, 8, 41),
(4, 8, 40),
(5, 8, 38),
(6, 8, 39),
(7, 8, 40),
(8, 8, 40),
(9, 8, 40),
(10, 8, 40),
(1, 9, 43),
(2, 9, 43),
(3, 9, 43),
(4, 9, 43),
(5, 9, 116),
(6, 9, 116),
(7, 9, 116),
(8, 9, 116),
(9, 9, 116),
(10, 9, 116),
(1, 10, 44),
(2, 10, 44),
(3, 10, 44),
(4, 10, 44),
(5, 10, 46),
(6, 10, 45),
(7, 10, 45),
(8, 10, 45),
(9, 10, 45),
(10, 10, 45),
(1, 11, 48),
(2, 11, 48),
(3, 11, 48),
(4, 11, 48),
(5, 11, 47),
(6, 11, 47),
(7, 11, 47),
(8, 11, 47),
(9, 11, 47),
(10, 11, 47),
(1, 12, 52),
(2, 12, 50),
(3, 12, 51),
(4, 12, 52),
(5, 12, 51),
(6, 12, 51),
(7, 12, 51),
(8, 12, 53),
(9, 12, 54),
(10, 12, 55),
(1, 13, 57),
(2, 13, 58),
(3, 13, 57),
(4, 13, 57),
(5, 13, 56),
(6, 13, 56),
(7, 13, 56),
(8, 13, 56),
(9, 13, 56),
(10, 13, 56),
(1, 14, 60),
(2, 14, 60),
(3, 14, 60),
(4, 14, 60),
(5, 14, 59),
(6, 14, 60),
(7, 14, 60),
(8, 14, 59),
(9, 14, 59),
(10, 14, 59),
(5, 15, 63),
(8, 15, 63),
(9, 15, 63),
(10, 15, 63),
(1, 16, 64),
(1, 16, 66),
(1, 16, 67),
(1, 16, 70),
(2, 16, 64),
(2, 16, 66),
(2, 16, 67),
(2, 16, 70),
(3, 16, 64),
(3, 16, 66),
(3, 16, 70),
(4, 16, 64),
(4, 16, 66),
(4, 16, 67),
(4, 16, 70),
(5, 16, 65),
(5, 16, 70),
(6, 16, 65),
(6, 16, 70),
(7, 16, 65),
(7, 16, 70),
(8, 16, 65),
(8, 16, 70),
(9, 16, 65),
(9, 16, 70),
(10, 16, 65),
(10, 16, 70),
(1, 17, 71),
(2, 17, 71),
(3, 17, 72),
(4, 17, 71),
(5, 17, 71),
(6, 17, 71),
(7, 17, 71),
(8, 17, 71),
(9, 17, 71),
(10, 17, 71),
(1, 18, 73),
(2, 18, 73),
(4, 18, 73),
(5, 18, 74),
(6, 18, 74),
(7, 18, 74),
(8, 18, 74),
(9, 18, 74),
(10, 18, 74),
(1, 19, 76),
(2, 19, 76),
(4, 19, 76),
(5, 19, 75),
(6, 19, 75),
(7, 19, 77),
(8, 19, 78),
(9, 19, 75),
(10, 19, 75),
(1, 20, 79),
(1, 20, 80),
(2, 20, 79),
(2, 20, 80),
(3, 20, 79),
(3, 20, 80),
(4, 20, 79),
(4, 20, 80),
(5, 20, 79),
(5, 20, 80),
(6, 20, 79),
(6, 20, 80),
(7, 20, 79),
(7, 20, 80),
(8, 20, 79),
(8, 20, 80),
(9, 20, 79),
(9, 20, 80),
(10, 20, 79),
(10, 20, 80),
(1, 21, 85),
(2, 21, 85),
(3, 21, 86),
(4, 21, 85),
(5, 21, 84),
(6, 21, 83),
(7, 21, 84),
(8, 21, 82),
(9, 21, 81),
(10, 21, 81),
(1, 22, 91),
(2, 22, 91),
(3, 22, 92),
(4, 22, 90),
(5, 22, 88),
(6, 22, 87),
(7, 22, 88),
(8, 22, 88),
(9, 22, 89),
(10, 22, 89),
(1, 23, 95),
(2, 23, 93),
(3, 23, 94),
(4, 23, 95),
(5, 23, 97),
(6, 23, 98),
(7, 23, 96),
(8, 23, 100),
(9, 23, 95),
(10, 23, 99),
(1, 24, 101),
(2, 24, 101),
(3, 24, 101),
(4, 24, 101),
(5, 24, 102),
(6, 24, 101),
(7, 24, 102),
(8, 24, 101),
(9, 24, 101),
(10, 24, 101),
(1, 25, 104),
(2, 25, 103),
(3, 25, 103),
(4, 25, 105),
(5, 25, 104),
(6, 25, 103),
(7, 25, 104),
(8, 25, 103),
(9, 25, 103),
(10, 25, 103),
(1, 26, 115),
(2, 26, 106),
(3, 26, 107),
(4, 26, 108),
(5, 26, 109),
(6, 26, 110),
(7, 26, 111),
(8, 26, 112),
(9, 26, 113),
(10, 26, 114),
(1, 27, 118),
(2, 27, 117),
(3, 27, 117),
(4, 27, 118),
(5, 27, 119),
(6, 27, 120),
(7, 27, 121),
(8, 27, 119),
(9, 27, 119),
(10, 27, 119);

-- --------------------------------------------------------

--
-- Структура таблицы `product_storage`
--

CREATE TABLE `product_storage` (
  `product_id` int NOT NULL,
  `storage_id` int NOT NULL,
  `amount` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_storage`
--

INSERT INTO `product_storage` (`product_id`, `storage_id`, `amount`) VALUES
(1, 1, 12588),
(2, 1, 10347),
(3, 1, 11891),
(4, 1, 15781),
(5, 1, 9737),
(6, 1, 13928),
(7, 1, 6895),
(8, 1, 14737),
(9, 1, 18248),
(10, 1, 7597);

-- --------------------------------------------------------

--
-- Структура таблицы `storage`
--

CREATE TABLE `storage` (
  `id` int NOT NULL,
  `storage` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `storage`
--

INSERT INTO `storage` (`id`, `storage`) VALUES
(1, 'main');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`) VALUES
(1, 'apshop', 'apshop@email.loc', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(2, 'test', 'test@test.loc', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feature_value`
--
ALTER TABLE `feature_value`
  ADD PRIMARY KEY (`id`,`feature_id`),
  ADD KEY `fk_feature_idx` (`feature_id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_user_idx` (`user_id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `fk_order_idx` (`order_id`),
  ADD KEY `fk_product_ord_idx` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`),
  ADD KEY `title_idx` (`title`),
  ADD KEY `price_idx` (`price`);

--
-- Индексы таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `fk_categories_idx` (`category_id`),
  ADD KEY `fk_product_idx` (`product_id`);

--
-- Индексы таблицы `product_feature_value`
--
ALTER TABLE `product_feature_value`
  ADD PRIMARY KEY (`product_id`,`feature_value_id`) USING BTREE,
  ADD KEY `fk_feature_id_idx` (`feature_value_feature_id`),
  ADD KEY `fk_product_feat_idx` (`product_id`),
  ADD KEY `fk_value_id_idx` (`feature_value_id`);

--
-- Индексы таблицы `product_storage`
--
ALTER TABLE `product_storage`
  ADD PRIMARY KEY (`product_id`,`storage_id`),
  ADD KEY `fk_storage_idx` (`storage_id`),
  ADD KEY `fk_product_stor_idx` (`product_id`);

--
-- Индексы таблицы `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `email_idx` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feature_value`
--
ALTER TABLE `feature_value`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feature_value`
--
ALTER TABLE `feature_value`
  ADD CONSTRAINT `fk_feature` FOREIGN KEY (`feature_id`) REFERENCES `feature` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_ord` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_feature_value`
--
ALTER TABLE `product_feature_value`
  ADD CONSTRAINT `fk_feature_id` FOREIGN KEY (`feature_value_feature_id`) REFERENCES `feature_value` (`feature_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_feat` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_value_id` FOREIGN KEY (`feature_value_id`) REFERENCES `feature_value` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_storage`
--
ALTER TABLE `product_storage`
  ADD CONSTRAINT `fk_product_stor` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_storage` FOREIGN KEY (`storage_id`) REFERENCES `storage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
