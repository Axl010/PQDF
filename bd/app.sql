-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-10-2024 a las 16:16:45
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `fechaInsert`) VALUES
(1, 'Inspeccion de Equipo', '2024-06-05 22:21:10'),
(2, 'Acceso Lógico', '2024-06-05 22:21:22'),
(3, 'Dispositivos de Seguridad', '2024-06-05 22:21:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE IF NOT EXISTS `documento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ruta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `id_categoria`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(2, 1, 'PQV-PCP-ZIV-STI-NE-001-2024.pdf', 'pdf', 'archivos/PQV-PCP-ZIV-STI-NE-001-2024.pdf', '2024-09-11 23:03:08'),
(3, 1, 'PQV-PCP-ZIV-STI-NE-002-2024.pdf', 'pdf', 'archivos/PQV-PCP-ZIV-STI-NE-002-2024.pdf', '2024-09-11 23:05:27'),
(4, 1, 'PQV-PCP-ZIV-STI-NE-003-2024.pdf', 'pdf', 'archivos/PQV-PCP-ZIV-STI-NE-003-2024.pdf', '2024-09-11 23:07:44'),
(5, 1, 'PQV-PCP-ZIV-STI-NE-004-2024.pdf', 'pdf', 'archivos/PQV-PCP-ZIV-STI-NE-004-2024.pdf', '2024-09-11 23:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Admin'),
(2, 'Editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `rol`) VALUES
(1, 'Actcel Chirinos', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
(2, 'Editor', 'editor', '1553cc62ff246044c683a61e203e65541990e7fcd4af9443d22b9557ecc9ac54', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
