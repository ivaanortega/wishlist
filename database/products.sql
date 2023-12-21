-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2023 a las 13:56:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wishlist`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `priority` int(11) DEFAULT 1,
  `url` varchar(2048) DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `image_url` varchar(2048) DEFAULT NULL,
  `buyed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lists_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `priority`, `url`, `image`, `image_url`, `buyed`, `created_at`, `updated_at`, `lists_id`) VALUES
(1, 'Pantalones montaña', 'Pantalones para ir a caminar (La imagen es de referencia)', 0, 1, NULL, NULL, 'https://media.revolutionrace.com/api/media/image/80554cf8-6c6d-451c-ae19-9731ad7487e1?maxWidth=1200', 0, '2023-12-21 09:54:34', '2023-12-21 10:32:48', 1),
(2, 'Chaqueta deporte', 'Chaqueta para hacer deporte estilo la de la foto impermeable', 0, 1, NULL, NULL, 'https://media.revolutionrace.com/api/media/image/0ec6d14a-993a-493c-8b34-2d060c337e6c?maxWidth=1200', 0, '2023-12-21 10:08:35', '2023-12-21 10:35:06', 1),
(3, 'Muelle', 'Muelle para la silla, el mio pierde presion y se baja todo el rato', 17, 1, 'https://www.amazon.es/gp/product/B07D76W1D5/ref=ox_sc_act_title_2?smid=A2WSY2WMYCW728&psc=1&tag=ivaanortega-21', NULL, 'https://m.media-amazon.com/images/I/61so0VtxgRL._AC_SL1500_.jpg', 0, '2023-12-21 10:37:12', '2023-12-21 10:37:12', 1),
(4, 'Bambas Pádel', 'Bambas para jugar a pádel', 70, 1, 'https://www.tiendapadelpoint.com/zapatillas-de-padel-hombre/zapatillas-bullpadel-paquito-navarro-hack-hybrid-fly-23v-blanco?tag=ivaanortega-21', NULL, 'https://www.tiendapadelpoint.com/image/cache/data/zapatillas-bullpadel-paquito-navarro-hack-hybrid-fly-23v-blanco-800x800.jpg', 0, '2023-12-21 10:45:10', '2023-12-21 10:45:41', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_lists_id_foreign` (`lists_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_lists_id_foreign` FOREIGN KEY (`lists_id`) REFERENCES `lists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
