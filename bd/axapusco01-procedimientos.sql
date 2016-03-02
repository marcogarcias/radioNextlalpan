/* ******************************************************
*** PROCEDIMIENTOS PARA LA PARTE VISIBLE DE LA PAGINA ***
****************************************************** */
CREATE PROCEDURE datosComunicados()
BEGIN
	SELECT * FROM galeriadinamica01 WHERE visibleArticulo=1;
END//

CALL datosComunicados();
DROP PROCEDURE datosComunicados;



CREATE PROCEDURE datosComunicado(IN idCom int(11))
BEGIN
	SELECT * FROM galeriadinamica01 WHERE idImg=idCom AND visibleArticulo=1;
END//

CALL datosComunicado(1);
DROP PROCEDURE datosComunicado;



CREATE PROCEDURE datosCarrusel()
BEGIN
	SELECT * FROM galeriadinamica01 WHERE visibleCarrusel=1 AND orden<>0 ORDER BY orden ASC LIMIT 5;
END//

CALL datosCarrusel();
DROP PROCEDURE datosCarrusel;


/* ***********************************************
*** PROCEDIMIENTOS PARA LA PARTE ADMINISTRABLE ***
*********************************************** */

CREATE PROCEDURE obtenerUsuarios(IN mail varchar(100), IN pas varchar(25))
BEGIN
	SELECT * FROM usuarios WHERE email=mail and password=pas;
END//

DROP PROCEDURE obtenerUsuarios;



CREATE PROCEDURE galeriaDinamicaTotal()
BEGIN
	SELECT * FROM galeriadinamica01;
END//



CREATE PROCEDURE insertarArticuloGaleriaDinamica(IN titImg varchar(50), IN desMiniImg varchar(255), IN desFullImg text, IN nombre varchar(50))
BEGIN
	INSERT INTO galeriadinamica01(nombreImg, tituloImg, descripcionMiniImg, descripcionCompletaImg, fechaCreacionImg, horaCreacionImg, url) VALUES(nombre, titImg, desMiniImg, desFullImg, curdate(), curtime(), "#");
END//

call insertarArticuloGaleriaDinamica('eruviel llega a mexico', 'eruviel llega apenas al estado de mexico', 'este pasado martes eruviel avila llego a el estado de mexicodespues de una gran gira en estados unidos', 'eruviel');
drop procedure insertarArticuloGaleriaDinamica;



CREATE PROCEDURE elegirFila(IN idComunicado INT(11))
BEGIN
	DECLARE seleccion tinyint(1);
	SET seleccion = (SELECT seleccionado FROM galeriadinamica01 WHERE idImg=idComunicado);
	if seleccion=0 THEN
		UPDATE galeriadinamica01 set seleccionado=1 WHERE idImg=idComunicado;
	else
		UPDATE galeriadinamica01 set seleccionado=0 WHERE idImg=idComunicado;
	END IF;
END//

CALL elegirFila(6);



CREATE PROCEDURE elegirCarrusel(IN idComunicado INT(11))
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
END//

CALL elegirCarrusel(6);

DROP PROCEDURE elegirCarrusel;



CREATE PROCEDURE obtenerNumerosOrden()
BEGIN
	SELECT orden FROM galeriadinamica01 WHERE visibleCarrusel=1 AND orden<>0;
END//

DROP PROCEDURE obtenerNumerosOrden;



CREaTE PROCEDURE cambiarOrdenCarrusel(IN idComunic INT(11), IN numOrden INT(1))
BEGIN
	UPDATE galeriadinamica01 SET orden=numOrden WHERE idImg=idComunic;
END//



CREATE PROCEDURE comprobarEstadoOrden(IN idComunic INT(11))
BEGIN
	DECLARE numero int(1);
	SET numero = (SELECT count(idImg) FROM galeriadinamica01 WHERE seleccionado=1 AND orden<>0 AND idImg=idComunic);
	IF numero=0 THEN
		UPDATE galeriadinamica01 set visibleCarrusel=0, orden=0 WHERE idImg=idComunic;
	END IF;
END//

CALL comprobarEstadoOrden(16);

DROP PROCEDURE comprobarEstadoOrden;



CREATE PROCEDURE elegirComunicados(IN idComunicado INT(11))
BEGIN 
	DECLARE seleccion tinyint(1);
	SET seleccion = (SELECT visibleArticulo FROM galeriadinamica01 WHERE idImg=idComunicado);
	if seleccion=0 THEN
		UPDATE galeriadinamica01 set visibleArticulo=1 WHERE idImg=idComunicado;
	else
		UPDATE galeriadinamica01 set visibleArticulo=0 WHERE idImg=idComunicado;
	END IF;
END//

CALL elegirComunicados(6);



CREATE PROCEDURE obtenerArticuloPorId(IN idComunicado int(11))
BEGIN
	SELECT * FROM galeriadinamica01 WHERE idImg=idComunicado;
END//

CALL obtenerArticuloPorId(9);



CREATE PROCEDURE nombreImagenesEliminar()
BEGIN
	SELECT nombreImg FROM galeriadinamica01 WHERE seleccionado=1;
END//

CALL nombreImagenesEliminar();



CREATE PROCEDURE galDin01EliminarImagen()
BEGIN
	DELETE FROM galeriadinamica01 WHERE seleccionado=1;
END//

CALL galDin01EliminarImagen();



CREATE PROCEDURE galDin01ModificarImagenRegistro(IN idIm int(11), IN nombre varchar(50), IN titImg varchar(50), IN desMiniImg varchar(255), IN desFullImg text)
BEGIN
	UPDATE galeriadinamica01 SET nombreImg=nombre, tituloImg=titImg, descripcionMiniImg=desMiniImg, descripcionCompletaImg=desFullImg WHERE idImg=idIm;
END//

DROP PROCEDURE galDin01ModificarImagenRegistro;