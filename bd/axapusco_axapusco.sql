-- MySQL dump 10.13  Distrib 5.5.37, for Linux (x86_64)
--
-- Host: localhost    Database: axapusco_axapusco
-- ------------------------------------------------------
-- Server version	5.5.37-cll

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `galeriadinamica01`
--

DROP TABLE IF EXISTS `galeriadinamica01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeriadinamica01` (
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeriadinamica01`
--

LOCK TABLES `galeriadinamica01` WRITE;
/*!40000 ALTER TABLE `galeriadinamica01` DISABLE KEYS */;
INSERT INTO `galeriadinamica01` (`idImg`, `nombreImg`, `tituloImg`, `descripcionMiniImg`, `descripcionCompletaImg`, `visibleCarrusel`, `visibleArticulo`, `fechaCreacionImg`, `horaCreacionImg`, `url`, `seleccionado`, `orden`) VALUES (19,'3cb_galDin01.jpg','Lic. Gilberto RamÃ­rez Ãvila','Lic. Gilberto RamÃ­rez Ãvila Presidente Municipal Constitucional de Axapusco 2013-2015.','Lic. Gilberto RamÃ­rez Ãvila Presidente Municipal Constitucional de Axapusco 2013-2015.',0,1,'2013-07-22','16:15:49','#',0,0),(20,'fe6_galDin02.jpg','El gobernador del Estado de MÃ©xico','El gobernador del Estado de MÃ©xico Eruviel Ãvila Villegas encabezÃ³ la entrega del nombramiento de Pueblo con Encanto al Municipio de Axapusco el 12 de Marzo de 2013.','El gobernador del Estado de MÃ©xico Eruviel Ãvila Villegas encabezÃ³ la entrega del nombramiento de Pueblo con Encanto al Municipio de Axapusco el 12 de Marzo de 2013.',0,1,'2013-07-22','16:16:25','#',0,0),(21,'02e_galDin03.jpg','Eruviel Ãvila Villegasy el Lic. Gilberto RamÃ­rez','El gobernador del Estado de MÃ©xico Doctor Eruviel Ãvila Villegasy el Lic. Gilberto RamÃ­rez Ãvila Villegas Presidente Municipal de Axapusco entregan el nombramiento de Pueblo con Encanto a los orgullosos habitantes del Municipio de Axapusco.','El gobernador del Estado de MÃ©xico Doctor Eruviel Ãvila Villegasy el Lic. Gilberto RamÃ­rez Ãvila Villegas Presidente Municipal de Axapusco entregan el nombramiento de Pueblo con Encanto a los orgullosos habitantes del Municipio de Axapusco, Estado de MÃ©xico.',0,1,'2013-07-22','16:17:09','#',0,0),(22,'db5_galDin04.jpg','nombramiento de Pueblo con Encanto','El gobernador del Estado de MÃ©xico Doctor Eruviel Ãvila Villegas y el Lic. Gilberto RamÃ­rez Ãvila Presidente Municipal Constitucional de Axapusco develan la placa conmemorativa al nombramiento de Pueblo con Encanto al Municipio de Axapusco.','El gobernador del Estado de MÃ©xico Doctor Eruviel Ãvila Villegas y el Lic. Gilberto RamÃ­rez Ãvila Presidente Municipal Constitucional de Axapusco develan la placa conmemorativa al nombramiento de Pueblo con Encanto al Municipio de Axapusco, Estado de MÃ©xico el 12 de Marzo de 2013.',0,1,'2013-07-22','16:17:48','#',0,0),(23,'79a_galDin05.jpg','Lic. Gilberto RamÃ­rez Ãvila','Lic. Gilberto RamÃ­rez Ãvila Presidente Municipal Constitucional de Axapusco en el marco del nombramientode Axapusco como Pueblo con Encanto el 12 de Marzo de 2013.','Lic. Gilberto RamÃ­rez Ãvila Presidente Municipal Constitucional de Axapusco en el marco del nombramientode Axapusco como Pueblo con Encanto el 12 de Marzo de 2013.',0,1,'2013-07-22','16:18:45','#',0,0),(24,'8b2_becasAxapusco.jpg','Entrega de estimulos econÃ³micos a alumnos de exce','El pasado miercoles 10 de julio, se diÃ³ cumplimiento a uno mÃ¡s de los compromisos municipales asumidos en campaÃ±a,entregando estÃ­mulos econÃ³micos a alumnos de excelencia ','El pasado miercoles 10 de julio, se diÃ³ cumplimiento a uno mÃ¡s de los compromisos municipales asumidos en campaÃ±a,entregando estÃ­mulos econÃ³micos a alumnos de excelencia de nivel primaria, secundaria, y nivel medio superior, beneficiando a poco mÃ¡s de 700 alumnos de nuestro municipio, con recursos propios 100%.',0,1,'2013-07-22','23:38:28','#',0,0),(26,'b0e_colocacion piedra.jpg','COLOCACIÃ“N DE LA PRIMERA PIEDRA','COLOCACIÃ“N DE LA PRIMERA PIEDRA PARA LA CONSTRUCCIÃ“N DE LOS PORTALES DE LA PLAZA PRINCIPAL 1Â° ETAPA .','COLOCACIÃ“N DE LA PRIMERA PIEDRA PARA LA CONSTRUCCIÃ“N DE LOS PORTALES DE LA PLAZA PRINCIPAL 1Â° ETAPA \r\nY FIRMA DEL CONVENIO PARA LA REALIZACIÃ“N DEL \"PROGRAMA PUEBLOS CON ENCANTO 2013\" ',0,1,'2013-08-19','14:45:56','#',0,0),(27,'293_adultosmayores.jpg','Homenaje al Adulto Mayor','El DIF Municipal en coordinaciÃ³n con el H Ayuntamiento de Axapusco hacen extensiva la invitaciÃ³n al festejo con motivo del DÃ­a del Adulto Mayor.  Los esperamos el miÃ©rcoles 28 de agosto a partir de las 12:00 hrs. En el Auditorio Municipal.','El DIF Municipal en coordinaciÃ³n con el H Ayuntamiento de Axapusco hacen extensiva la invitaciÃ³n al festejo con motivo del DÃ­a del Adulto Mayor. \r\nLos esperamos el miÃ©rcoles 28 de agosto a partir de las 12:00 hrs. En el Auditorio Municipal.',0,1,'2013-08-27','12:41:13','#',0,0),(28,'426_FLYER_FERIA-1.jpg','Feria Nacional de las cactÃ¡ceas 2013','La Feria Nacional de las CactÃ¡ceas  en su sÃ©ptima ediciÃ³n (1,2 y 3 de Noviembre de 2013), es un esfuerzo de los axapusquenses por mostrar la riqueza histÃ³rica, cultural, artÃ­stica y gastronÃ³mica de nuestro pueblo, de la cual nos sentimos orgullosos.','La Feria Nacional de las CactÃ¡ceas  en su sÃ©ptima ediciÃ³n (1,2 y 3 de Noviembre de 2013), es un esfuerzo de los axapusquenses por mostrar la riqueza histÃ³rica, cultural, artÃ­stica y gastronÃ³mica de nuestro pueblo, y de la cual nos sentimos orgullosos. ',0,1,'2013-09-26','14:12:21','#',0,0),(29,'435_centro_acopio.jpg','Centro de Acopio en DIF Municipal Axapusco','Centro de Acopio en DIF Municipal Axapusco','De la mano con nuestros hermanos afectados por las inundaciones\r\n\r\n:: AyÃºdanos donando ::',0,1,'2013-10-10','13:10:51','#',0,0),(30,'372_2informe_eruviel.jpg','Segundo Informe de Gobierno del Dr. Eruviel Ãvila','Segundo Informe de Gobierno del Dr. Eruviel Ãvila Villegas','El H. Ayuntamiento de Axapusco hace extensa la invitaciÃ³n a quienes nos quieran acompaÃ±ar el dÃ­a de hoy, a ver el Segundo Informe de Gobierno del Dr. Eruviel Ãvila Villegas, Gobernador Constitucional del Estado de MÃ©xico, a las 8:00 pm en el SalÃ³n de Usos MÃºltiples ubicado en las instalaciones de este Ayuntamiento.',0,1,'2013-10-10','13:17:23','#',0,0),(31,'385_felicitacion_2informe.jpg','FelicitaciÃ³n al Dr. Eruviel Ãvila Villegas','El H. Ayuntamiento de Axapusco y el Lic. Gilberto Ramirez Ãvila Presidente Municipal, felicitan al Dr. Eruviel Ãvila Villegas Gobernador del Estado de MÃ©xico, por su innovador y brillante 2do. Informe de Gobierno.','El H. Ayuntamiento de Axapusco y el Lic. Gilberto Ramirez Ãvila Presidente Municipal, felicitan al Dr. Eruviel Ãvila Villegas, Gobernador del Estado de MÃ©xico, por su innovador y brillante 2do. Informe de Gobierno, dando muestra que en el Estado de MÃ©xico existe liderazgo, capacidad y voluntad de hacer las cosas responsablemente, de trabajar y LOGRAR en GRANDE. Â¡Â¡Felicidades!!',0,1,'2013-10-10','13:21:32','#',0,0),(32,'b26_visita_santa_maria.jpg','Visita a la comunidad de Santa MarÃ­a Actipac','El presidente Municipal Constitucional de Axapusco GilbÃ©rto RamÃ­rez Ãvila visito la comunidad de Santa MarÃ­a Actipac en gira de trabajo','El presidente Municipal Constitucional de Axapusco GilbÃ©rto RamÃ­rez Ãvila visito la comunidad de Santa MarÃ­a Actipac en gira de trabajo con la finalidad de supervisar las obras en proceso en las distintas instituciones.\r\nEn Escuela Primaria \"Justo Sierra\" se construyo el PATIO COMEDOR, mismo que beneficiara a los alumnos de la citada InstituciÃ³n.',0,1,'2013-10-10','13:24:43','#',0,0),(33,'d36_campani_esterilizacion.jpg','CampaÃ±a de EsterilizaciÃ³n Canina-Felina','Continuamos con la CampaÃ±a de EsterilizaciÃ³n Canina-Felina en el Municipio.','Continuamos con la CampaÃ±a de EsterilizaciÃ³n Canina-Felina en el Municipio. Les dejamos las comunidades y las fechas que ya tenemos programadas. El horario serÃ¡ de 9am a 1pm en el lugar de costumbre.',0,1,'2013-10-10','13:29:41','#',0,0),(34,'aab_sanpablo_xuchitl.jpg','Arranque de Obras San Pablo Xuchitl.','Arranque de Obras San Pablo Xuchitl.','Arranque de Obras San Pablo Xuchitl, en las calles 3 de mayo y San Pedro.......',0,1,'2013-10-10','13:33:30','#',0,0),(35,'430_santa_maria_actipac_arranque.jpg','Arranque de la pavimentaciÃ³n de concreto hidrÃ¡ul','Arranque de la pavimentaciÃ³n de concreto hidrÃ¡ulico en Santa MarÃ­a Actipac.','\"Manos a la Obra\" Arranque de la pavimentaciÃ³n de concreto hidrÃ¡ulico en Santa Maria Actipac, calle Plutarco ElÃ­as Calles.......',0,1,'2013-10-10','13:35:54','#',0,0),(36,'486_entrega_tinacos.jpg','Entrega de tinacos','Se realizÃ³ la primera entrega de 500 tinacos .','7 de Octubre 2013, Axapusco Estado de MÃ©xico.\r\nSe realizÃ³ la primera entrega de 500 tinacos a igual nÃºmero de beneficiarios de las Comunidades de Axapusco y sus barrios, Atla, San Miguel y San Antonio Ometusco, Santa Ana, Xala, Fracc. Xala y Jaltepec, subsidiando el Municipio el 50% del costo de cada uno de ellos. Con recursos provenientes del FISM 2013 en la acciÃ³n denominada Mejoramiento a la Vivienda (AdquisiciÃ³n de tinacos). En proximos dÃ­as se estarÃ¡ realizando la segunda etapa al resto de las Comunidades.',0,0,'2013-10-10','13:40:18','#',0,0),(37,'dbd_banderazo_camino_nacional.jpg','\"Manos a la Obra\"','Banderazo de salida para empezar con la pavimentaciÃ³n de la Av. Camino Nacional del Barrio San Bartolo Alto.','\"Manos a la Obra\"\r\nEl dÃ­a de hoy 7 de Octubre, el Presidente Municipal de Axapusco Gilberto Ramirez junto con su cabildo y servidores pÃºblicos de este Ayuntamiento, dieron el banderazo de salida para empezar con la pavimentaciÃ³n de la Av. Camino Nacional del Barrio San Bartolo Alto. Con esta obra se estÃ¡ cumpliendo con un compromiso mÃ¡s hecho en camp',0,1,'2013-10-10','13:44:16','#',0,0),(38,'c2d_primera_piedra.jpg','ColocaciÃ³n de Primera Piedra del Nuevo PanteÃ³n.','ColocaciÃ³n de Primera Piedra del Nuevo PanteÃ³n Municipal en la Comunidad de Jaltepec.','El Lic. Gilberto Ramirez Ãvila, Presidente Municipal de Axapusco, acompaÃ±ado del LÃ­der de la CNC en el Estado de MÃ©xico Ezequiel Contreras Contreras, el Diputado Local Felipe Borja, el representante del Gobernador Dr. Roberto GalvÃ¡n PeÃ±a, autoridades Auxiliares y pueblo de Jaltepec, colocaron la Primera Piedra del Nuevo PanteÃ³n Municipal en la Comunidad de Jaltepec. Con una inversiÃ³n de 3 millones de pesos con recursos del FEFOM 2013, esta obra estÃ¡ programada para entregarse en 3 meses. Adicionalmente el Presidente Municipal anunciÃ³ la compra del terreno de una hectÃ¡rea donde se construirÃ¡ el panteÃ³n con un costo de $400,000.00 con recursos propios.\r\nÂ¡Â¡Â¡Enhorabuena!!! Felicidades a la comunidad de Jaltepec.\r\n',0,1,'2013-10-10','17:02:19','#',0,0),(39,'f01_barda_xuchitl.jpg','Visita a  Primaria \"Francisco Villa\"','El Presidente Municipal de Axapusco el Lic. Gilberto Ramirez Ãvila, visita la Primaria \"Francisco Villa\"','El Presidente Municipal de Axapusco el Lic. Gilberto Ramirez Ãvila, visitÃ³ hoy la Primaria \"Francisco Villa\" de San Pablo XÃºchitl, donde cumpliÃ³ con el compromiso de entregar terminada la primera etapa de la construcciÃ³n de la barda perimetral. De igual forma, entregÃ³ material para terminar dicha barda, asÃ­ como, para ampliar su Plaza CÃ­vica.',0,1,'2013-10-21','14:42:10','#',0,0),(40,'7f2_organizacion_feria.jpg','Rueda de Prensa','Rueda de Prensa con los organizadores de la Feria de las CactÃ¡ceas 2013.','Rueda de Prensa con los organizadores de la Feria de las CactÃ¡ceas 2013 en la Hacienda Real Ometusco, para dar a conocer a los medios los detalles de la Feria y todo lo referente a la organizaciÃ³n de la misma.',0,1,'2013-10-21','22:17:00','#',0,0),(41,'551_felicitacion.jpg','Â¡Â¡Â¡Â¡Â¡Â¡Â¡ F E L I C I D A D E S !!!!!!','El H Ayuntamiento Axapusco felicita a los GANADORES del \"Concurso Intermunicipal para la Salud en Centros de Trabajo Saludables\"','El H Ayuntamiento Axapusco felicita a los GANADORES del \"Concurso Intermunicipal para la Salud en Centros de Trabajo Saludables\" quienes representaron al Municipio y dejaron el nombre de AXAPUSCO muy en alto.',0,1,'2013-10-21','22:32:33','#',0,0),(42,'ef4_felicitaciones.jpg','FelicitaciÃ³n','El Lic. Gilberto Ramirez felicita al grupo que con gusto y entusiasmo represento a este H Ayuntamiento, Ganando el 1er Lugar en el concurso intermunicipal de \"Pausa para la Salud en Centros de Trabajos Saludables\"','El Lic. Gilberto Ramirez felicita al grupo que con gusto y entusiasmo represento a este H Ayuntamiento, Ganando el 1er Lugar en el concurso intermunicipal de \"Pausa para la Salud en Centros de Trabajos Saludables\"',0,1,'2013-10-21','22:38:05','#',0,0),(43,'af6_dia_mundial.jpg','DÃ­a Mundial de lucha contra el CÃ¡ncer de Mama.','Cada 19 de octubre se celebra el DÃ­a Mundial de lucha contra el CÃ¡ncer de Mama con el fin de informar y sensibilizar a la poblaciÃ³n a cerca de esta enfermedad que mata a miles de mujeres en el mundo.','Cada 19 de octubre se celebra el DÃ­a Mundial de lucha contra el CÃ¡ncer de Mama con el fin de informar y sensibilizar a la poblaciÃ³n a cerca de esta enfermedad que mata a miles de mujeres en el mundo.\r\n\r\nLa incidencia de cÃ¡ncer de mama estÃ¡ aumentando en el mundo en desarrollo debido a la mayor esperanza de vida, el aumento de la urbanizaciÃ³n y la adopciÃ³n de modos de vida occidentales.\r\n\r\nLa OrganizaciÃ³n Mundial de la Salud (OMS) seÃ±ala que el cÃ¡ncer de mama es el mÃ¡s frecuente entre las mujeres. Aunque la mayorÃ­a de muertes por esta enfermedad se da en paÃ­ses con bajos ingresos, mujeres de paÃ­ses desarrollados y en desarrollo padecen de este mal. Esto se debe a la escasa informaciÃ³n y a los impedimentos para acceder a los servicios de salud.\r\n\r\nLos principales factores de riesgo de contraer cÃ¡ncer de mama incluyen una edad avanzada, la primera menstruaciÃ³n a temprana edad, edad avanzada en el momento del primer parto o nunca haber dado a luz, antecedentes familiares de cÃ¡ncer de mama, el hecho de consumir hormonas tales como estrÃ³geno y progesterona y consumir licor.\r\n\r\nEn este dÃ­a en especial, la OMS promueve la detecciÃ³n precoz a fin de mejorar el pronÃ³stico y la supervivencia de los casos de cÃ¡ncer de mama sigue siendo la piedra angular de la lucha contra este cÃ¡ncer.\r\n\r\nSegÃºn la OMS, cada Cada 19 de octubre se celebra el DÃ­a Mundial de lucha contra el CÃ¡ncer de Mama con el fin de informar y sensibilizar a la poblaciÃ³n a cerca de esta enfermedad que mata a miles de mujeres en el mundo.\r\n\r\nLa incidencia de cÃ¡ncer de mama estÃ¡ aumentando en el mundo en desarrollo debido a la mayor esperanza de vida, el aumento de la urbanizaciÃ³n y la adopciÃ³n de modos de vida occidentales.\r\n\r\nLa OrganizaciÃ³n Mundial de la Salud (OMS) seÃ±ala que el cÃ¡ncer de mama es el mÃ¡s frecuente entre las mujeres. Aunque la mayorÃ­a de muertes por esta enfermedad se da en paÃ­ses con bajos ingresos, mujeres de paÃ­ses desarrollados y en desarrollo padecen de este mal. Esto se debe a la escasa informaciÃ³n y a los impedimentos para acceder a los servicios de salud.\r\n\r\nLos principales factores de riesgo de contraer cÃ¡ncer de mama incluyen una edad avanzada, la primera menstruaciÃ³n a temprana edad, edad avanzada en el momento del primer parto o nunca haber dado a luz, antecedentes familiares de cÃ¡ncer de mama, el hecho de consumir hormonas tales como estrÃ³geno y progesterona y consumir licor.\r\n\r\nEn este dÃ­a en especial, la OMS promueve la detecciÃ³n precoz a fin de mejorar el pronÃ³stico y la supervivencia de los casos de cÃ¡ncer de mama sigue siendo la piedra angular de la lucha contra este cÃ¡ncer.\r\n\r\nSegÃºn la OMS, cada 30 segundos en algÃºn lugar del mundo se diagnostica un cÃ¡ncer de mama.',0,1,'2013-10-21','22:46:10','#',0,0),(44,'817_programa_axa.jpg','Programa iconogrÃ¡fico de la Feria Nacional de las','Programa iconogrÃ¡fico de la Feria Nacional de las Cactaceas 2013','programa iconogrÃ¡fico de la Feria Nacional de las Cactaceas 2013',0,1,'2013-10-30','23:57:29','#',0,0),(45,'ead_reunio_gabinete.jpg','5ta. ReuniÃ³n de Gabinete RegiÃ³n V Bis Otumba','5ta. ReuniÃ³n de Gabinete RegiÃ³n V Bis Otumba','5ta. ReuniÃ³n de Gabinete RegiÃ³n V Bis Otumba',0,1,'2013-10-31','00:01:35','#',0,0),(46,'14a_tinacos_2.jpg','Programa de subsidio para la adquisiciÃ³n de Tinac','Programa de subsidio para la adquisiciÃ³n de Tinacos Segunda Entrega dando un total de 1,000 tinacos.','En esta ocasiÃ³n los beneficiados pertenecen a las comunidades de Santo Domingo Aztacameca, San NicolÃ¡s Tetepantla, San Pablo XÃºchitl, San Felipe Zacatepec, San Antonio Coayuca, RancherÃ­a Zacatepec, Guadalupe Relinas y Santa MarÃ­a Actipac.',0,1,'2013-10-31','00:05:40','#',0,0),(47,'65c_convocatoria.jpg','PRESEA AL MÃ‰RITO MUNICIPAL AXAPUSCO 2013','El H. Ayuntamiento de Axapusco te invita a que propongas a ciudadanos Axapusquenses Distinguidos para recibir la :: PRESEA AL MÃ‰RITO MUNICIPAL AXAPUSCO 2013 ::','El H. Ayuntamiento de Axapusco te invita a que propongas a ciudadanos Axapusquenses Distinguidos para recibir la\r\n:: PRESEA AL MÃ‰RITO MUNICIPAL AXAPUSCO 2013 ::',0,1,'2013-11-05','14:06:21','#',0,0),(48,'73c_gracias.jpg','Gracias','\"La sÃ©ptima ediciÃ³n de la Feria de las CactÃ¡ceas fuÃ© todo un Ã©xito\"','\"La sÃ©ptima ediciÃ³n de la Feria de las CactÃ¡ceas fuÃ© todo un Ã©xito\"',0,1,'2013-11-05','14:11:49','#',0,0),(49,'14c_avicultura_familiar.jpg','\"Avicultura Familiar\"','En colaboraciÃ³n con la Secretaria de Desarrollo Agropecuario se entregaron 250 paquetes de pollas de postura, mediante el programa \"Avicultura Familiar\".','En colaboraciÃ³n con la Secretaria de Desarrollo Agropecuario se entregaron 250 paquetes de pollas de postura, mediante el programa \"Avicultura Familiar\".',0,1,'2013-11-17','23:12:47','#',0,0),(50,'499_ereccion4.jpg','CXL Aniversario de la ErecciÃ³n de Axapusco como M','CXL Aniversario de la ErecciÃ³n de Axapusco como Municipio','CXL Aniversario de la ErecciÃ³n de Axapusco como Municipio',0,1,'2013-11-17','23:30:29','#',0,0),(51,'661_primera_piedra.jpg','ColocaciÃ³n de la primera piedra de la lecherÃ­a e','ColocaciÃ³n de la primera piedra de la lecherÃ­a en Xala','El dÃ­a 11 de noviembre el Presidente Gilberto Ramirez Ãvila colocÃ³ la primera piedra de lo que serÃ¡ la LecherÃ­a en la Comunidad de Xala con autoridades de LICONSA y autoridades locales. Esta es la primera de dos que se gestionaron para nuestro Municipio. Los terrenos los dona la Comunidad y el Municipio harÃ¡ la construcciÃ³n de los inmuebles.\r\nCon estas acciones se sigue construyendo un Gobierno cercano a la Gente!',0,1,'2013-11-17','23:38:29','#',0,0),(52,'c3c_panteon_tlamapa.jpg','ConstrucciÃ³n de PanteÃ³n Municipal en la comunida','ConstrucciÃ³n de PanteÃ³n Municipal en la comunidad de Tlamapa','Autoridades Municipales, auxiliares y vecinos de la Comunidad de Tlamapa, dieron fe del inicio de la obra\"ConstrucciÃ³n de PanteÃ³n Municipal en la comunidad de Tlamapa\" dando asÃ­ cumplimiento al compromiso asumido por el Presidente Municipal Lic. Gilberto RamÃ­rez Ãvila, asÃ­ mismo se hizo entrega de equipo de radio comunicaciÃ³n al Delegado de esta comunidad, para mejorar la estrategia de comunicaciÃ³n implementada por la DirecciÃ³n de Seguridad PÃºblica Municipal.',0,1,'2013-11-21','22:45:54','#',0,0),(53,'8d2_informe_de_gobierno.jpg','Primer Informe de Gobierno','El Lic.Gilberto RamÃ­rez Ãvila, rinde su primer Informe de Gobierno.','Al rendir su Primer Informe de Gobierno el presidente municipal Lic. Gilberto RamÃ­rez Ãvila, expresÃ³ que ha trabajando principalmente en tres ejes rectores  que son la base de su administraciÃ³n para que los habitantes tengan mejores condiciones de vida.\r\n\r\nAcompaÃ±ado por el representante personal del Gobernador del Estado de MÃ©xico, Eruviel Ãvila Villegas, el secretario particular del mandatario estatal, Ernesto MillÃ¡n, el diputado local Felipe Borja Texocotitla, el edil puntualizÃ³ que estos ejes rectores se basan en ser un gobierno solidario, municipio progresista y sociedad protegida, para que los habitantes tengan una mejor calidad en los servicios, para cumplir con la expectativa de la gente.\r\n\r\n',0,1,'2013-12-12','19:28:04','#',0,0),(54,'996_navidad.jpg','deseos de Navidad 2013 y AÃ±o Nuevo 2014','deseos de Navidad 2013 y AÃ±o Nuevo 2014','El H Ayuntamiento de Axapusco, les desea una Feliz Navidad al lado de sus serses queridos, y que en su hogar reine la paz, el amor, la dicha y la uniÃ³n familiar.\r\nQue el proximo aÃ±o 2014, estÃ© lleno de bendiciones y se cumplan todos sus deseos y propositos!!!',0,1,'2014-02-13','18:36:20','#',0,0),(55,'ed8_foto_dia_de_reyes.jpg','Festejos de DÃ­a de Reyes','Festejos de dÃ­a de Reyes en todas y cada una de las comunidades del municipio.','Festejos de dÃ­a de Reyes en todas y cada una de las comunidades del municipio.',0,1,'2014-02-13','18:40:47','#',0,0),(56,'c4c_dia_de_reyes.jpg','Itinerario para el festejo de DÃ­a de Reyes en las','Itinerario para el festejo de DÃ­a de Reyes en las Comunidades del Municipio.','Itinerario para el festejo de DÃ­a de Reyes en las Comunidades del Municipio.\r\n',0,1,'2014-02-13','18:42:05','#',0,0),(57,'3be_telefonos.jpg','Telefonos de Emergencia.','Telefonos de Emergencia.','Telefonos de Emergencia.',0,1,'2014-02-13','18:44:28','#',0,0),(58,'07f_Hospital_axapusco.jpg','InauguraciÃ³n del Hospital de Axapusco.','InauguraciÃ³n del Hospital de Axapusco.','El Presidente de los Estados Unidos Mexicanos el Lic. Enrique\r\n PeÃ±a Nieto en compaÃ±Ã­a del Gobernador del Estado de MÃ©xico, el Dr. Eruviel Ãvila Villegas,y del Lic. Gilberto RamirÃ©z Ãvila, presidente municipal constitucional de Axapusco, dierÃ³n por inaugurado el Hospital General de Axapusco.',0,1,'2014-02-13','18:52:28','#',0,0),(59,'a32_primera-piedra-Santo-Domingo.jpg',' primera piedra  Secundaria  TÃ©cnica','ColocaciÃ³n de la primera piedra de la Secundaria  TÃ©cnica en la comunidad de Santo Domingo Aztacameca','El pasado 26 de febrero el Presidente Municipal dio inicio a uno mas de sus compromisos asumidos en campaÃ±a,para beneficio de la juventud Axapusquense, la construcciÃ³n de la Sec. tÃ©cnica en la comunidad de Santo Domingo. El terreno tambiÃ©n fue adquirido con recursos propios.',0,1,'2014-03-26','00:01:52','#',0,0),(60,'a44_DÃ­a-de--la-bandera.jpg','DÃ­a de la bandera','El pasado 24 de febrero  se  celebro el dÃ­a de la bandera,con la participaciÃ³n de las instituciones educativas de la Cabecera Municipal','El Presidente Municipal rememoro la historia de nuestro labaro patrio e invito a la niÃ±ez y juventud presente a honrar siempre a nuestros signos patrios. AsÃ­ mismo se presento una cronologÃ­a de la bandera de MÃ©xico.',0,1,'2014-03-26','00:14:20','#',0,0),(61,'e83_campania_canina.jpg',':: CALENDARIO DE LAS CAMPAÃ‘AS DE ESTERILIZACIÃ“N ',':: CALENDARIO DE LAS CAMPAÃ‘AS DE ESTERILIZACIÃ“N CANINA-FELINA 2015 ::',':: CALENDARIO DE LAS CAMPAÃ‘AS DE ESTERILIZACIÃ“N CANINA-FELINA 2015 ::',1,0,'2015-03-21','00:07:41','#',0,4),(62,'590_dia_bandera.jpg',':: CEREMONIA CÃVICA CON MOTIVO DEL DÃA DE LA BAN',':: CEREMONIA CÃVICA CON MOTIVO DEL DÃA DE LA BANDERA ::',':: CEREMONIA CÃVICA CON MOTIVO DEL DÃA DE LA BANDERA ::\r\n',1,0,'2015-03-21','00:10:11','#',0,1),(63,'9fc_vsol.jpg','Festival del V Sol','Festival del V Sol','\"Los pueblos indÃ­genas conservan tradiciones y costumbres ancestrales que les han sido heredadas; una de las cuales es la celebraciÃ³n del nacimiento del V Sol\".\r\nCasa de Cultura \"Toltecapan\" TE INVITA a participar en un espacio lleno de actividades culturales colmadas de nuestros antepasados, para reconocer las tradiciones y costumbres ancestrales de los pueblos indÃ­genas de la entidad, los cuales son la raÃ­z de la identidad Mexiquense.\r\n\"\"\"\"EVENTOS TOTALMENTE GRATUITOS\"\"\"\r\n',1,0,'2015-03-21','00:15:02','#',0,3),(64,'727_plaza_edomex.png','Plaza Estado de MÃ©xico','Avances de diferentes Ã¡reas en La plaza Estado de MÃ©xico, en el Deportivo Toltecapan.','La plaza Estado de MÃ©xico, en el Deportivo Toltecapan.',1,0,'2015-03-21','00:20:07','#',0,2),(65,'a6e_prospera.jpg','>> PROGRAMA PROSPERA <<','>> PROGRAMA PROSPERA <<',':: ENCUENTRO CON VOCALES Y ENTREGA DE NOMBRAMIENTOS ::\r\n',1,0,'2015-03-21','00:23:22','#',0,5);
/*!40000 ALTER TABLE `galeriadinamica01` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `ap` varchar(25) DEFAULT NULL,
  `am` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nivel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUser`, `nombre`, `ap`, `am`, `email`, `password`, `nivel`) VALUES (1,'Dionisio','Pacheco','Márquez','dionisio_pacheco@hotmail.com','dionisio_pacheco2013-2015',1),(2,'Arnulfo Erick','Pacheco','Márquez','erickpacheco59@hotmail.com','ax4pusc0.-',0),(3,'Anonimo','Anon','Imo','anonimo@hotmail.com','anon',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-29  2:52:21
