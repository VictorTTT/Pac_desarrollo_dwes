-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-12-2020 a las 08:26:59
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `m07`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `Id` smallint(3) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Contenido` varchar(300) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Hora_creación` datetime NOT NULL,
  `Likes` int(6) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`Id`, `Titulo`, `Contenido`, `Autor`, `Hora_creación`, `Likes`) VALUES
(68, 'Primera noticia', 'Este es el contenido de la primera noticia', 'Víctor', '2020-11-26 21:54:44', NULL),
(69, 'Segunda noticia', 'Este es el contenido de la segunda noticia', 'Víctor', '2020-11-26 21:55:19', NULL),
(70, 'Tercera noticia', 'Este es el contenido de la tercera noticia', 'Víctor', '2020-11-26 21:55:50', NULL),
(71, 'Cuarta noticia', 'Este es el contenido de la carta noticia', 'Víctor', '2020-11-26 21:56:47', 1),
(72, ' Quinta noticia', 'jghmfdghjmnfghmnf', ' Víctor dghfnmdhgfn', '2020-11-27 17:16:14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Edad` tinyint(3) UNSIGNED NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Dirección` varchar(50) NOT NULL,
  `Código_postal` mediumint(10) UNSIGNED NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Genero` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
