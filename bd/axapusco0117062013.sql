-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2013 a las 17:38:29
-- Versión del servidor: 5.1.53
-- Versión de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `axapusco01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriadinamica01`
--

CREATE TABLE IF NOT EXISTS `galeriadinamica01` (
  `idImg` int(11) NOT NULL AUTO_INCREMENT,
  `nombreImg` varchar(50) DEFAULT 'galDin00',
  `tituloImg` varchar(50) DEFAULT NULL,
  `descripcionMiniImg` varchar(255) DEFAULT NULL,
  `descripcionCompletaImg` text,
  `visibleCarrusel` tinyint(1) DEFAULT '0',
  `visibleArticulo` tinyint(1) DEFAULT '0',
  `fechaCreacionImg` date DEFAULT NULL,
  `horaCreacionImg` time DEFAULT NULL,
  `url` varchar(200) DEFAULT '#',
  `seleccionado` tinyint(1) NOT NULL DEFAULT '0',
  `orden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idImg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `galeriadinamica01`
--

INSERT INTO `galeriadinamica01` (`idImg`, `nombreImg`, `tituloImg`, `descripcionMiniImg`, `descripcionCompletaImg`, `visibleCarrusel`, `visibleArticulo`, `fechaCreacionImg`, `horaCreacionImg`, `url`, `seleccionado`, `orden`) VALUES
(9, '2d9_animalitos.jpg', 'prueba con ie', 'esta es una prueba con internet explorer', 'esta es la prueba numero cuatro con el explorador internet explorer nuemro quien sabe', 0, 1, '2013-06-15', '18:57:04', '#', 1, 0),
(10, 'c50_angel_anime_10.jpg', 'prueba de nuevo', 'esta es de nuevo una breve prueba de funcionamiento', 'esta es una prueba mas para asegurar el correcto funcionamiento de la pagina web', 1, 1, '2013-06-15', '19:28:04', '#', 0, 0),
(12, '112_anime-chica_15.jpg', 'ttt ttt ttttt tt ttttt t', 'ddd dd d dddd d dddd d dddd dd ddd dd', 'dfdfd d df dfdfdfd df df dfdfd d dfdfdfddfdfd d df dfdfdfd df df dfdfd d dfdfdfd', 0, 0, '2013-06-16', '16:00:14', '#', 0, 0),
(14, '0fe_ari_01.jpg', 'pppp', 'pppppppp', 'ppppppppppppppp ppp ppp ppppppppp ppp pp pppp pp', 1, 0, '2013-06-16', '16:03:14', '#', 0, 0),
(15, 'e74_beetlejuice_01.gif', 'tituto ok', 'descripcion ok', 'descripcion completa, ok ok ok ko ', 0, 0, '2013-06-16', '19:48:28', '#', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `ap` varchar(25) DEFAULT NULL,
  `am` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nivel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `nombre`, `ap`, `am`, `email`, `password`, `nivel`) VALUES
(1, 'goku', 'son', 'gohanda', 'max@hotmail.com', 'max', 1),
(2, 'bulma', 'briefs', 'briefs', 'bulma@hotmail.com', 'bul', 0);
