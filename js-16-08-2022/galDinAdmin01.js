function galDin01AgregarImagen(){
	location.href="galDin01AgregarImagen.php";
}
/*
function comprobarLogin(){
	var email, pass;
	email = $("#email").val();
	pass = $("#pass").val();
	if(!email){
		$("#emailNull").html("campo requerido");
		$("#email").focus();
		$("#passNull").html("");
	}
	else if(!pass){
		$("#passNull").html("campo requerido");
		$("#pass").focus();
		$("#nickNull").html("");
	}
	else{
		$("#nickNull").html("");
		$("#passNull").html("");
		jQuery.post("comprobarLogin.php", { email:email, pass:pass }, function(acceso){
			$("#resultadoAjax").html(acceso);
		});
	}
}
*/
function cerrarSesion(){
	if(confirm("Seguro que deseas cerrar tu sesion?")){
		location.href="cerrarSesion.php";
	}
}

// validacion para comprobar que no haya campos vacios en el formulario para subir un nuevo articulo
// a la seccion noticias y al carrusel dinamico
function comprobarArchivoCargado(){
	var titImg=$("#titImg").val(); // campo que contiene el titulo de la noticia
	var desMiniImg=$("#desMiniImg").val(); // campo que contiene la breve descripcion de la noticia
	var desFullImg=$("#desFullImg").val(); // campo que contiene  la descripcion complerta de la notica
	var agregarImgCampo=$("#agregarImgCampo").val(); // campo que contiene la imagen de la noticia
	//var visibleCarrusel=$("#visibleCarrusel").val(); // campo que indica si la noticia aparecera en el carrusel
	//var visibleArticulo=$("#visibleArticulo").val(); // campo que indica si la noticia aparecera en la seccion noticias
	
	if(titImg==""){
		$("#desMiniImgNull").html("");
		$("#desFullImgNull").html("");
		$("#agregarImgNull").html("");
		$("#visibleCarruselNull").html("");
		$("#visibleArticuloNull").html("");
		
		$("#titImgNull").html("Introdusca un titulo para el articulo.");
		$("#titImg").focus();
	}
	else if(desMiniImg==""){
		$("#titImgNull").html("");
		$("#desFullImgNull").html("");
		$("#agregarImgNull").html("");
		$("#visibleCarruselNull").html("");
		$("#visibleArticuloNull").html("");
		
		$("#desMiniImgNull").html("Introdusca una breve descripcion para el articulo.");
		$("#desMiniImg").focus();
	}
	else if(desFullImg==""){
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		$("#agregarImgNull").html("");
		$("#visibleCarruselNull").html("");
		$("#visibleArticuloNull").html("");
		
		$("#desFullImgNull").html("Introdusca una breve descripcion para el articulo.");
		$("#desFullImg").focus();
	}
	else if(agregarImgCampo==''){
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		$("#agregarImgNull").html("");
		$("#visibleCarruselNull").html("");
		$("#visibleArticuloNull").html("");
		
		$("#agregarImgNull").html("Introdusca una breve descripcion para el articulo.");
		$("#agregarImgCampo").focus();
	}
	/*else if(!$("input[name=visibleCarrusel]:checked").val()){
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		$("#desFullImgNull").html("");
		$("#agregarImgNull").html("");
		$("#visibleArticuloNull").html("");
		
		$("#visibleCarruselNull").html("Seleccione si el articulo quiere que sea visible en el carrusel.");
		$("#visibleCarrusel").focus();
	}
	else if(!$("input[name=visibleArticulo]:checked").val()){
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		$("#desFullImgNull").html("");
		$("#agregarImgNull").html("");
		$("#visibleCarruselNull").html("");
		
		$("#visibleArticuloNull").html("Seleccione si el articulo quiere que sea visible.");
		$("#visibleArticulo").focus();
	}*/
	else{
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		$("#desFullImgNull").html("");
		//$("#visibleCarruselNull").html("");
		//$("#visibleArticuloNull").html("");
		
		document.agregarImg.submit();
	}
} 

// llama de manera asincrona al archivo "elegirFila.php" que cambia el atributo "seleccionado" a "0" o a "1" (0=inactivo; 10=activo)
// verifica si el checkbox esta seleccionado ya, si esta seleccionado cambia el fondo a un color y si esta sin seleccionar lo cambia a otro color
function elegirFila(idComunicado){
	jQuery.post("elegirFila.php", { idComunicado:idComunicado }, function(){
		var checkeado=$("#check"+idComunicado+"").is(':checked');
		if(checkeado){
			$("#fila"+idComunicado+"").css({ 'background':'#F7E8C3' });
		}
		else{
			$("#fila"+idComunicado+"").css({ 'background':'#ade0e3' });
		}
		
	});
}

// llama de manera asincrona el archivo "elegirCarrusel.php" el cual actualiza la base de datos el campo "visibleCarrusel" poniendolo activo o desactivado
function elegirCarrusel(idComunicado){
	jQuery.post("elegirCarrusel.php", { idComunicado:idComunicado }, function(res){
		if(res<5){
		// se comprueba si el check esta activo
		//si lo esta aparece una ventana modal con los lupares disponibles para el orden del carrusel
		// si no esta activo el check no pasa nada
			if($("#checkCarrusel"+idComunicado+"").is(":checked")){
				jQuery.get("verOrdenGalDin.php", { idComunicado:idComunicado, res:res }, function(mensaje){
					$("#modalContenido").html(mensaje);
					mostrarVentanaModal();
				});
			}
		}
		else{
			jQuery.get("verOrdenGalDin.php", { idComunicado:idComunicado, res:res }, function(mensaje){
				$("#modalContenido").html(mensaje);
				mostrarVentanaModal();
				$("#checkCarrusel"+idComunicado+"").prop("checked", false);
			});
		}
	});
}

//primero vuelve a poner el atributo seleccionado a 0, y posteriormente desactiva el check para finalmente cerrar la ventana.
function cambiarOrdenCarrusel(idComunicado){
	var orden;
	orden=$("input[name='orden']:checked").val();
	if(orden){
		jQuery.post("cambiarOrdenCarrusel.php", { idComunicado:idComunicado, orden:orden }, function(res){
			cerrarVentanaModal();
			homeAdmin();
		});
	}
	else{
		jQuery.post("comprobarEstadoOrden.php", { idComunicado:idComunicado }, function(res){
			$("#checkCarrusel"+idComunicado+"").prop("checked", false);
			cerrarVentanaModal();
			homeAdmin();
		});
	}
}

//primero vuelve a poner el atributo seleccionado a 0, y posteriormente desactiva el check para finalmente cerrar la ventana.
function cerrarVentanaModalCarrusel(idComunicado){
	jQuery.post("elegirCarrusel.php", { idComunicado:idComunicado }, function(res){
		$("#checkCarrusel"+idComunicado+"").prop("checked", false);
		cerrarVentanaModal();
		homeAdmin();
	});
}

// llama de manera asincrona el archivo "elegirComunicados.php" el cual actualiza la base de datos el campo "visibleArticulo" poniendolo activo o desactivado
function elegirComunicados(idComunicado){
	jQuery.post("elegirComunicados.php", { idComunicado:idComunicado }, function(){
		// sin contenido
	});
}

// manda a llamar de manera asincrona el archivo "galDin01EliminarImagen.php" el cual elimina las imagenes seleccionadas del directorio donde se encuentran
function galDin01EliminarImagen(){
	if(confirm("Seguro que deseas eliminar estos archivos?")){
		jQuery.post("galDin01EliminarImagen.php", function(){
			galDin01EliminarImagenRegistro();
		});
	}
}

function galDin01ModificarImagen(idComunicado){
	location.href="galDin01ModificarImagen.php?idComunic="+idComunicado;
}

function comprobarModificarArchivo(idComunicado){
	var titImg=$("#titImg").val(); // campo que contiene el titulo de la noticia
	var desMiniImg=$("#desMiniImg").val(); // campo que contiene la breve descripcion de la noticia
	var desFullImg=$("#desFullImg").val(); // campo que contiene  la descripcion complerta de la notica
	var agregarImgCampo=$("#agregarImgCampo").val(); // campo que contiene la imagen de la noticia

	if(titImg==""){
		$("#desMiniImgNull").html("");
		$("#desFullImgNull").html("");
		
		$("#titImgNull").html("Introdusca un titulo para el articulo.");
		$("#titImg").focus();
	}
	else if(desMiniImg==""){
		$("#titImgNull").html("");
		$("#desFullImgNull").html("");
		
		$("#desMiniImgNull").html("Introdusca una breve descripcion para el articulo.");
		$("#desMiniImg").focus();
	}
	else if(desFullImg==""){
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		
		$("#desFullImgNull").html("Introdusca una breve descripcion para el articulo.");
		$("#desFullImg").focus();
	}
	else{
		$("#titImgNull").html("");
		$("#desMiniImgNull").html("");
		$("#desFullImgNull").html("");
		
		document.modificarImg.submit();
	}
}

// manda a llamar de manera asincrona el archivo "galDin01EliminarImagenRegistro.php" el cual elimina los registros de la tabla "galeriaDinamica01" cuyo atributo "seleccionado" sea igual a "1"
function galDin01EliminarImagenRegistro(){
	jQuery.post("galDin01EliminarImagenRegistro.php", function(){
		location.href="galeriaDinamicaAdmin01.php";
	});
}

function homeAdmin(){
	location.href="galeriaDinamicaAdmin01.php";
}

/* ************************************
*** FUNCIONES PARA LA VENTANA MODAL ***
************************************ */

function mostrarVentanaModal(){
	$("#modalDark").css({ "display":"block" });
	$("#modalLight").css({ "display":"block" });
}

function cerrarVentanaModal(){
	$("#modalDark").css({ "display":"none" });
	$("#modalLight").css({ "display":"none" });
}