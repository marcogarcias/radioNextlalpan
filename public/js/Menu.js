var Menu = Menu || {};

Menu.atAttr = {
		sec:'inicio',
		secAfter:'inicio'
	}

Menu.onInit = function(sections){
	sections || (sections = {})
	this.addClick({sec:'patrocinadores', file:'patrocinadoresList.php'});
	this.addClick({sec:'inicio', file:'inicio.php'});
	this.addClick({sec:'programacion', file:'construccion.php'});
	this.addClick({sec:'servicios', file:'construccion.php'});
	this.addClick({sec:'facebook', file:'construccion.php'});
};

Menu.addClick = function(secObj){
	secObj || (sec = {})
	var this_ = this;
	$('#'+secObj.sec, '#menuHorizontal').on('click', function(e){
		e.preventDefault();
		this_.cleanArea(7);
		switch(secObj.sec){
			case 'inicio':
				this_.toHome();
				break;
			default:
				this_.toAjax(secObj);
				break;
		}
		// se cambia la última sección visitada y se actualiza la sección actual
		this_.atAttr.secAfter=this_.atAttr.sec;
		this_.atAttr.sec=secObj.sec;
		// se quita el color rojo a la última sección visitada y se agrega el colo rojo a la sección actual
		$('#'+this_.atAttr.secAfter, '#menuHorizontal').removeClass('seccionA');
		$('#'+this_.atAttr.secAfter, '#menuHorizontal').addClass('seccion');
		$('#'+secObj.sec, '#menuHorizontal').removeClass('seccion');
		$('#'+secObj.sec, '#menuHorizontal').addClass('seccionA');
	});
};

/**
 * limpia las áreas necesarias por medio de una comprobacion bitwise
 * @param int clean indica el nivel de bits para limpiar el o las áreas determinadas.
 * Pj: 	0 =  no limpia ninguna área.
 * 		1 =  Elimina el área con id = "contenido".
 * 		2 =  Elimina el área con id = "galDinNavegacion".
 * 		4 =  vacia el área con id = "art".
 */
Menu.cleanArea = function(clean){
	clean = parseInt(clean) || 7;
	clean & 1 && $('#contenido').remove();
	clean & 2 && $('#galDinNavegacion').remove();
	clean & 4 && $('#art').empty();
};

Menu.toHome = function(){
	window.location.replace("index.php");
};

/**
  * llama el contenido de una sección via ajax
  * @param Object SecObj indica el objecto que contiene los datos de la 
  * 	sección a mostrar Ej: secObj={sec:'patrocinadores', file:'patrocinadoresList.php'}
  */
Menu.toAjax = function(secObj){
	var this_ = this;
	$.ajax({
		url:   'public/html/'+secObj.sec+'/'+secObj.file, //'./public/html/patrocinadores/patrocinadoresList.php',
		type:  'post',
		beforeSend: function(){
			// lo que se hará antes de mandar la petición ajax
		},
		success: function(res){
			$('#art').html(res);
		},
		error:    function(xhr,err){
			console.log("Ocurrio un error, intentelo nuevamente:", xhr);
		}
	});
};