-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-07-2013 a las 19:47:22
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `axapusco01`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarOrdenCarrusel`(IN idComunic INT(11), IN numOrden INT(1))
BEGIN
	UPDATE galeriadinamica01 SET orden=numOrden WHERE idImg=idComunic;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `comprobarEstadoOrden`(IN idComunic INT(11))
BEGIN
	DECLARE numero int(1);
	SET numero = (SELECT count(idImg) FROM galeriadinamica01 WHERE seleccionado=1 AND orden<>0 AND idImg=idComunic);
	IF numero=0 THEN
		UPDATE galeriadinamica01 set visibleCarrusel=0, orden=0 WHERE idImg=idComunic;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosCarrusel`()
BEGIN
	SELECT * FROM galeriadinamica01 WHERE visibleCarrusel=1 ORDER BY orden ASC LIMIT 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosComunicado`(IN idCom int(11))
BEGIN
	SELECT * FROM galeriadinamica01 WHERE idImg=idCom AND visibleArticulo=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosComunicados`()
BEGIN
	SELECT * FROM galeriadinamica01 WHERE visibleArticulo=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elegirCarrusel`(IN idComunicado INT(11))
BEGIN 
	DECLARE cont tinyint(1);
	DECLARE seleccion tinyint(1);
	
	SET cont = (SELECT count(idImg) FROM galeriadinamica01 WHERE visibleCarrusel=1);
	IF cont<5 THEN
		SET seleccion = (SELECT visibleCarrusel FROM galeriadinamica01 WHERE idImg=idComunicado);
		IF seleccion=0 THEN
			UPDATE galeriadinamica01 set visibleCarrusel=1 WHERE idImg=idComunicado;
		ELSE
			UPDATE galeriadinamica01 set visibleCarrusel=0, orden=0 WHERE idImg=idComunicado;
		END IF;
	ELSE
		UPDATE galeriadinamica01 set visibleCarrusel=0, orden=0 WHERE idImg=idComunicado;
		SET cont = (SELECT count(idImg) FROM galeriadinamica01 WHERE visibleCarrusel=1);
	END IF;
	SELECT (cont);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elegirComunicados`(IN idComunicado INT(11))
BEGIN 
	DECLARE seleccion tinyint(1);
	SET seleccion = (SELECT visibleArticulo FROM galeriadinamica01 WHERE idImg=idComunicado);
	if seleccion=0 THEN
		UPDATE galeriadinamica01 set visibleArticulo=1 WHERE idImg=idComunicado;
	else
		UPDATE galeriadinamica01 set visibleArticulo=0 WHERE idImg=idComunicado;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elegirFila`(IN idComunicado INT(11))
BEGIN
	DECLARE seleccion tinyint(1);
	SET seleccion = (SELECT seleccionado FROM galeriadinamica01 WHERE idImg=idComunicado);
	if seleccion=0 THEN
		UPDATE galeriadinamica01 set seleccionado=1 WHERE idImg=idComunicado;
	else
		UPDATE galeriadinamica01 set seleccionado=0 WHERE idImg=idComunicado;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `galDin01EliminarImagen`()
BEGIN
	DELETE FROM galeriadinamica01 WHERE seleccionado=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `galDin01ModificarImagenRegistro`(IN idIm int(11), IN nombre varchar(50), IN titImg varchar(50), IN desMiniImg varchar(255), IN desFullImg text)
BEGIN
	UPDATE galeriadinamica01 SET nombreImg=nombre, tituloImg=titImg, descripcionMiniImg=desMiniImg, descripcionCompletaImg=desFullImg WHERE idImg=idIm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `galeriaDinamicaTotal`()
BEGIN
	SELECT * FROM galeriadinamica01;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarArticuloGaleriaDinamica`(IN titImg varchar(50), IN desMiniImg varchar(255), IN desFullImg text, IN nombre varchar(50))
BEGIN
	INSERT INTO galeriadinamica01(nombreImg, tituloImg, descripcionMiniImg, descripcionCompletaImg, fechaCreacionImg, horaCreacionImg, url) VALUES(nombre, titImg, desMiniImg, desFullImg, curdate(), curtime(), "#");
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreImagenesEliminar`()
BEGIN
	SELECT nombreImg FROM galeriadinamica01 WHERE seleccionado=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerArticuloPorId`(IN idComunicado int(11))
BEGIN
	SELECT * FROM galeriadinamica01 WHERE idImg=idComunicado;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerNumerosOrden`()
BEGIN
	SELECT orden FROM galeriadinamica01 WHERE visibleCarrusel=1 AND orden<>0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerUsuarios`(IN mail varchar(100), IN pas varchar(25))
BEGIN
	SELECT * FROM usuarios WHERE email=mail and password=pas;
END$$

DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `galeriadinamica01`
--

INSERT INTO `galeriadinamica01` (`idImg`, `nombreImg`, `tituloImg`, `descripcionMiniImg`, `descripcionCompletaImg`, `visibleCarrusel`, `visibleArticulo`, `fechaCreacionImg`, `horaCreacionImg`, `url`, `seleccionado`, `orden`) VALUES
(9, '2d9_animalitos.jpg', 'prueba con ie.;', 'esta es una prueba con internet explorer. . La imagen es de dos perros.', 'esta es la prueba numero cuatro con el explorador internet explorer nuemro quien sabe. La imagen es de dos perros.', 1, 1, '2013-06-15', '18:57:04', '#', 0, 5),
(10, 'c50_angel_anime_10.jpg', 'prueba de nuevo', 'esta es de nuevo una breve prueba de funcionamiento. . La imagen es de una chica angel.', 'esta es una prueba mas para asegurar el correcto funcionamiento de la pagina web. La imagen es de una chica angel.', 1, 1, '2013-06-15', '19:28:04', '#', 0, 3),
(12, '112_anime-chica_15.jpg', 'ttt ttt ttttt tt ttttt t', 'ddd dd d dddd d dddd d dddd dd ddd dd. . La imagen es de una chica.', 'dfdfd d df dfdfdfd df df dfdfd d dfdfdfddfdfd d df dfdfdfd df df dfdfd d dfdfdfd. . La imagen es de una chica anime black.', 0, 1, '2013-06-16', '16:00:14', '#', 0, 0),
(14, '0fe_ari_01.jpg', 'pppp', 'pppppppp. . La imagen es de maari.', 'ppppppppppppppp ppp ppp ppppppppp ppp pp pppp pp. La imagen es de mari.', 0, 1, '2013-06-16', '16:03:14', '#', 0, 0),
(15, 'e74_beetlejuice_01.gif', 'tituto ok', 'descripcion ok. . La imagen es de beetlejuice.', 'descripcion completa, ok ok ok ko . . La imagen es de beetlejuice.', 1, 1, '2013-06-16', '19:48:28', '#', 0, 4),
(16, '5ae_MAX_05.jpg', 'titulo de comunicado 01', 'esta es la descriocion del comunicado numero 01 con una breve extencion. . La imagen es de  max.', 'esta ya es la descripcion cpmpleta del comunicado numero 02. Este comunicado es mas extenzo que su resumen, por lo que puede tener varias lineas de texto. Esta es una prueba exitosa. 26 de junio del 2012 6:42 pm.', 1, 1, '2013-06-26', '18:43:03', '#', 0, 2),
(17, '61b_logo-kasar.png', 'titulo de prueba 29/06/2013', 'Esta es una prueba realizada el dia de 29/06/2013. ', '29/06/2013 29/06/2013 29/06/2013 29/06/2013 29/06/2013 29/06/2013 29/06/2013 29/06/2013', 0, 1, '2013-06-29', '17:05:57', '#', 0, 0),
(18, '533_ang-34.jpg', 'prueba con ie 29/jun/2013', 'esta es una prueba con la cosa de ie el dia 29 de junio del 2013', 'Esta es la mÃ¡xima prueba pues es la prueba con el peor navegador, si es exitosa en todos los navegadores me aseguro de que sirve. Esta prueba fue hecha el 29 de junio del 2013.', 1, 1, '2013-06-29', '17:40:34', '#', 0, 1);

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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `nombre`, `ap`, `am`, `email`, `password`, `nivel`) VALUES
(1, 'goku', 'son', 'gohanda', 'max@hotmail.com', 'max', 1),
(2, 'bulma', 'briefs', 'briefs', 'bulma@hotmail.com', 'bul', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
