$(document).ready(function(){
	$.ajax({
		dataType: 'json',
		data: {'func':'getImgsPatrocinadores'},
		url: 'php/ajax.php',
		type: 'post',
		beforeSend: function(){

		},
		success: function(res){
			//console.log('res: ', res);
			var logoUrl = '';
			var logoName = '';
			var logoUrlFull = '';
			if((res instanceof Array) && res.length){
				for(var k in res){
					logoUrl = res[k].hasOwnProperty('logoUrl') ? res[k]['logoUrl'] : '';
					logoName = res[k].hasOwnProperty('logoName') ? res[k]['logoName'] : '';
					logoUrlFull = logoUrl+'/'+logoName;
					var img = '<img src="'+logoUrlFull+'" id="slider'+(parseInt(k)+1)+'" width="990" height="225" />';
					$('#sliderV1').append(img);
					//console.log(img);
				}
				SliderV1.atOnInit({'container':'sliderV1'});
			}
		}, error: function(xhr, err){
			console.log("Ocurrio un error, intentelo nuevamente:", xhr);
		}
	});
	//$('#sliderV1');



	//indexZInicialCarruselCabecera();
	indexZInicialGaleriaDinamica01();
	cargarMenuHorizontal();
	//activarCarrusel();
	activarGaleriaDinamica01();
	//crearActivarDetenerSetInterval();
	asignarEventos();
});

function asignarEventos(){
	$(".fracciones p").click(function(){
		var sinContenido = $(this).parent().find(".contenidoFraccion").html();
		if(!sinContenido==""){
			//$(this).parent().find(".contenidoFraccion").css({ "top":"20%", "left":"20%" });
			$(this).parent().find(".contenidoFraccion").animate({ opacity:'toggle', height:'toggle' }, 500);
		}
	});
	
	$(".contenidoFraccion").hover(function(){
	
	}, function(){
		$(this).parent().find(".contenidoFraccion").animate({ opacity:'toggle', height:'toggle' }, 500);
	});
    // ocultar los submenus de la barra lateral de banners
    $(".subMenuDesp ul").css({display: "none"});
    // Defino que submenus deben estar visibles cuando se pasa el mouse por encima 
    $(".subMenuDesp li").hover(function(){   
      return false;
    },function(){ 
      $(this).find('ul:first').slideUp(400); 
    });
    // asignando eventos a los links de los submenus de la barra lateral
    $(".subMenuDesp li").click(function(e){
      e.preventDefault();  // para cancelar el comportamiento del link
      $(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(400);
    });

}

function hiddeSubMenuDesp(){
  showDivs();
  // se oculta el menu
  $('.subMenuDesp li').find('ul:first').slideUp(400); 
}
function showDivs(){
  // divs de las ventanas modales
  $('#conac2013').css({display : 'block'}); 
  $('#1erTrim2014').css({display : 'block'});
  $('#2ndoTrim2014').css({display : 'block'});
  $('#3erTrim2014').css({display : 'block'});
  $('#4toTrim2014').css({display : 'block'});
  $('#2doInfGob2014').css({display : 'block'});
  $('#1erTrim2015').css({display : 'block'});
  $('#2ndoTrim2015').css({display : 'block'});
  $('#3erTrim2015').css({display : 'block'});
}
function hiddeDivs(){
  $('#conac2013').css({display:'none'}); 
  $('#1erTrim2014').css({display : 'none'});
  $('#2ndoTrim2014').css({display : 'none'});
  $('#3erTrim2014').css({display : 'none'});
  $('#4toTrim2014').css({display:'none'});
  $('#2doInfGob2014').css({display:'none'}); 
  $('#1erTrim2015').css({display:'none'}); 
  $('#2ndoTrim2015').css({display:'none'}); 
  $('#3erTrim2015').css({display:'none'}); 
}
/*
function indexZInicialCarruselCabecera(){
	$("#carruselCabecera01").css({'z-index':'12'}); 
	$("#carruselCabecera02").css({'z-index':'11'});
	$("#carruselCabecera03").css({'z-index':'10'});
	$("#carruselCabecera04").css({'z-index':'9'});
	$("#carruselCabecera05").css({'z-index':'8'});
	$("#carruselCabecera06").css({'z-index':'7'});
	$("#carruselCabecera07").css({'z-index':'6'});
	$("#carruselCabecera08").css({'z-index':'5'});
	$("#carruselCabecera09").css({'z-index':'4'});
	$("#carruselCabecera10").css({'z-index':'3'});
	$("#carruselCabecera11").css({'z-index':'2'});
	$("#carruselCabecera12").css({'z-index':'1'});
	
	//$("#carruselCabecera13").css({'z-index':'2'});
	//$("#carruselCabecera14").css({'z-index':'1'});
}
*/

function indexZInicialGaleriaDinamica01(){
	$("#galDin01Div").css({'z-index':'5'});
	$("#galDin02Div").css({'z-index':'4'});
	$("#galDin03Div").css({'z-index':'3'});
	$("#galDin04Div").css({'z-index':'2'});
	$("#galDin05Div").css({'z-index':'1'});
}
/*
var contCarrusel=1;
function activarCarrusel(){
	setInterval("recorrerCarrusel()", 3000);
}
*/

function recorrerCarrusel(){
	if(contCarrusel==1){
		$("#carruselCabecera02").fadeIn("slow");
			$("#carruselCabecera01").fadeOut("slow", function(){
				$("#carruselCabecera02").css({'z-index':'12'});
				$("#carruselCabecera03").css({'z-index':'11'});
				$("#carruselCabecera04").css({'z-index':'10'});
				$("#carruselCabecera05").css({'z-index':'9'});
				$("#carruselCabecera06").css({'z-index':'8'});
				$("#carruselCabecera07").css({'z-index':'7'});
				$("#carruselCabecera08").css({'z-index':'6'});
				$("#carruselCabecera09").css({'z-index':'5'});
				$("#carruselCabecera10").css({'z-index':'4'});
				$("#carruselCabecera11").css({'z-index':'3'});
				$("#carruselCabecera12").css({'z-index':'2'});
				$("#carruselCabecera01").css({'z-index':'1'});
			});
		/*$("#carruselCabecera14").fadeIn("slow");
			$("#carruselCabecera13").fadeOut("slow", function(){
				$("#carruselCabecera14").css({'z-index':'2'});
				$("#carruselCabecera13").css({'z-index':'1'});
			});*/
		contCarrusel++;
	}
	else if(contCarrusel==2){
		$("#carruselCabecera03").fadeIn("slow");
		$("#carruselCabecera02").fadeOut("slow", function(){
			$("#carruselCabecera03").css({'z-index':'12'});
			$("#carruselCabecera04").css({'z-index':'11'});
			$("#carruselCabecera05").css({'z-index':'10'});
			$("#carruselCabecera06").css({'z-index':'9'});
			$("#carruselCabecera07").css({'z-index':'8'});
			$("#carruselCabecera08").css({'z-index':'7'});
			$("#carruselCabecera09").css({'z-index':'6'});
			$("#carruselCabecera10").css({'z-index':'5'});
			$("#carruselCabecera11").css({'z-index':'4'});
			$("#carruselCabecera12").css({'z-index':'3'});
			$("#carruselCabecera01").css({'z-index':'2'});
			$("#carruselCabecera02").css({'z-index':'1'});
		});
		contCarrusel++;
		/*$("#carruselCabecera13").fadeIn("slow");
			$("#carruselCabecera14").fadeOut("slow", function(){
				$("#carruselCabecera13").css({'z-index':'2'});
				$("#carruselCabecera14").css({'z-index':'1'});
			});
		contCarrusel=1;*/
	}
	else if(contCarrusel==3){
		$("#carruselCabecera04").fadeIn("slow");
			$("#carruselCabecera03").fadeOut("slow", function(){
				$("#carruselCabecera04").css({'z-index':'12'});
				$("#carruselCabecera05").css({'z-index':'11'});
				$("#carruselCabecera06").css({'z-index':'10'});
				$("#carruselCabecera07").css({'z-index':'9'});
				$("#carruselCabecera08").css({'z-index':'8'});
				$("#carruselCabecera09").css({'z-index':'7'});
				$("#carruselCabecera10").css({'z-index':'6'});
				$("#carruselCabecera11").css({'z-index':'5'});
				$("#carruselCabecera12").css({'z-index':'4'});
				$("#carruselCabecera01").css({'z-index':'3'});
				$("#carruselCabecera02").css({'z-index':'2'});
				$("#carruselCabecera03").css({'z-index':'1'});
			});
		contCarrusel++;
	}
	else if(contCarrusel==4){
		$("#carruselCabecera05").fadeIn("slow");
			$("#carruselCabecera04").fadeOut("slow", function(){
				$("#carruselCabecera05").css({'z-index':'12'});
				$("#carruselCabecera06").css({'z-index':'11'});
				$("#carruselCabecera07").css({'z-index':'10'});
				$("#carruselCabecera08").css({'z-index':'9'});
				$("#carruselCabecera09").css({'z-index':'8'});
				$("#carruselCabecera10").css({'z-index':'7'});
				$("#carruselCabecera11").css({'z-index':'6'});
				$("#carruselCabecera12").css({'z-index':'5'});
				$("#carruselCabecera01").css({'z-index':'4'});
				$("#carruselCabecera02").css({'z-index':'3'});
				$("#carruselCabecera03").css({'z-index':'2'});
				$("#carruselCabecera04").css({'z-index':'1'});
			});
		contCarrusel++;
	}
	else if(contCarrusel==5){
		$("#carruselCabecera06").fadeIn("slow");
			$("#carruselCabecera05").fadeOut("slow", function(){
				$("#carruselCabecera06").css({'z-index':'12'});
				$("#carruselCabecera07").css({'z-index':'11'});
				$("#carruselCabecera08").css({'z-index':'10'});
				$("#carruselCabecera09").css({'z-index':'9'});
				$("#carruselCabecera10").css({'z-index':'8'});
				$("#carruselCabecera11").css({'z-index':'7'});
				$("#carruselCabecera12").css({'z-index':'6'});
				$("#carruselCabecera01").css({'z-index':'5'});
				$("#carruselCabecera02").css({'z-index':'4'});
				$("#carruselCabecera03").css({'z-index':'3'});
				$("#carruselCabecera04").css({'z-index':'2'});
				$("#carruselCabecera05").css({'z-index':'1'});
			});
		contCarrusel++;
	}
	else if(contCarrusel==6){
		$("#carruselCabecera07").fadeIn("slow");
			$("#carruselCabecera06").fadeOut("slow", function(){
				$("#carruselCabecera07").css({'z-index':'12'});
				$("#carruselCabecera08").css({'z-index':'11'});
				$("#carruselCabecera09").css({'z-index':'10'});
				$("#carruselCabecera10").css({'z-index':'9'});
				$("#carruselCabecera11").css({'z-index':'8'});
				$("#carruselCabecera12").css({'z-index':'7'});
				$("#carruselCabecera01").css({'z-index':'6'});
				$("#carruselCabecera02").css({'z-index':'5'});
				$("#carruselCabecera03").css({'z-index':'4'});
				$("#carruselCabecera04").css({'z-index':'3'});
				$("#carruselCabecera05").css({'z-index':'2'});
				$("#carruselCabecera06").css({'z-index':'1'});
			});
		contCarrusel++;
	}
	else if(contCarrusel==7){
		$("#carruselCabecera08").fadeIn("slow");
			$("#carruselCabecera07").fadeOut("slow", function(){
				$("#carruselCabecera08").css({'z-index':'12'});
				$("#carruselCabecera09").css({'z-index':'11'});
				$("#carruselCabecera10").css({'z-index':'10'});
				$("#carruselCabecera11").css({'z-index':'9'});
				$("#carruselCabecera12").css({'z-index':'8'});
				$("#carruselCabecera01").css({'z-index':'7'});
				$("#carruselCabecera02").css({'z-index':'6'});
				$("#carruselCabecera03").css({'z-index':'5'});
				$("#carruselCabecera04").css({'z-index':'4'});
				$("#carruselCabecera05").css({'z-index':'3'});
				$("#carruselCabecera06").css({'z-index':'2'});
				$("#carruselCabecera07").css({'z-index':'1'});
			});
		contCarrusel++;
	}
	else if(contCarrusel==8){
		$("#carruselCabecera09").fadeIn("slow", function(){
			$("#carruselCabecera08").fadeOut("slow", function(){
				$("#carruselCabecera09").css({'z-index':'12'});
				$("#carruselCabecera10").css({'z-index':'11'});
				$("#carruselCabecera11").css({'z-index':'10'});
				$("#carruselCabecera12").css({'z-index':'9'});
				$("#carruselCabecera01").css({'z-index':'8'});
				$("#carruselCabecera02").css({'z-index':'7'});
				$("#carruselCabecera03").css({'z-index':'6'});
				$("#carruselCabecera04").css({'z-index':'5'});
				$("#carruselCabecera05").css({'z-index':'4'});
				$("#carruselCabecera06").css({'z-index':'3'});
				$("#carruselCabecera07").css({'z-index':'2'});
				$("#carruselCabecera08").css({'z-index':'1'});
			});
		});
		contCarrusel++;
	}
	else if(contCarrusel==9){
		$("#carruselCabecera10").fadeIn("slow", function(){
			$("#carruselCabecera09").fadeOut("slow", function(){
				$("#carruselCabecera10").css({'z-index':'12'});
				$("#carruselCabecera11").css({'z-index':'11'});
				$("#carruselCabecera12").css({'z-index':'10'});
				$("#carruselCabecera01").css({'z-index':'9'});
				$("#carruselCabecera02").css({'z-index':'8'});
				$("#carruselCabecera03").css({'z-index':'7'});
				$("#carruselCabecera04").css({'z-index':'6'});
				$("#carruselCabecera05").css({'z-index':'5'});
				$("#carruselCabecera06").css({'z-index':'4'});
				$("#carruselCabecera07").css({'z-index':'3'});
				$("#carruselCabecera08").css({'z-index':'2'});
				$("#carruselCabecera09").css({'z-index':'1'});
			});
		});
		contCarrusel++;
	}
	else if(contCarrusel==10){
		$("#carruselCabecera11").fadeIn("slow", function(){
			$("#carruselCabecera10").fadeOut("slow", function(){
				$("#carruselCabecera11").css({'z-index':'12'});
				$("#carruselCabecera12").css({'z-index':'11'});
				$("#carruselCabecera01").css({'z-index':'10'});
				$("#carruselCabecera02").css({'z-index':'9'});
				$("#carruselCabecera03").css({'z-index':'8'});
				$("#carruselCabecera04").css({'z-index':'7'});
				$("#carruselCabecera05").css({'z-index':'6'});
				$("#carruselCabecera06").css({'z-index':'5'});
				$("#carruselCabecera07").css({'z-index':'4'});
				$("#carruselCabecera08").css({'z-index':'3'});
				$("#carruselCabecera09").css({'z-index':'2'});
				$("#carruselCabecera10").css({'z-index':'1'});
			});
		});
		contCarrusel++;
	}
	else if(contCarrusel==11){
		$("#carruselCabecera12").fadeIn("slow", function(){
			$("#carruselCabecera11").fadeOut("slow", function(){
				$("#carruselCabecera12").css({'z-index':'12'});
				$("#carruselCabecera01").css({'z-index':'11'});
				$("#carruselCabecera02").css({'z-index':'10'});
				$("#carruselCabecera03").css({'z-index':'9'});
				$("#carruselCabecera04").css({'z-index':'8'});
				$("#carruselCabecera05").css({'z-index':'7'});
				$("#carruselCabecera06").css({'z-index':'6'});
				$("#carruselCabecera07").css({'z-index':'5'});
				$("#carruselCabecera08").css({'z-index':'4'});
				$("#carruselCabecera09").css({'z-index':'3'});
				$("#carruselCabecera10").css({'z-index':'2'});
				$("#carruselCabecera11").css({'z-index':'1'});
			});
		});
		contCarrusel++;
	}
	else if(contCarrusel==12){
		$("#carruselCabecera01").fadeIn("slow", function(){
			$("#carruselCabecera12").fadeOut("slow", function(){
				$("#carruselCabecera01").css({'z-index':'12'});
				$("#carruselCabecera02").css({'z-index':'11'});
				$("#carruselCabecera03").css({'z-index':'10'});
				$("#carruselCabecera04").css({'z-index':'9'});
				$("#carruselCabecera05").css({'z-index':'8'});
				$("#carruselCabecera06").css({'z-index':'7'});
				$("#carruselCabecera07").css({'z-index':'6'});
				$("#carruselCabecera08").css({'z-index':'5'});
				$("#carruselCabecera09").css({'z-index':'4'});
				$("#carruselCabecera10").css({'z-index':'3'});
				$("#carruselCabecera11").css({'z-index':'2'});
				$("#carruselCabecera12").css({'z-index':'1'});
			});
		});
		contCarrusel=1;
	}
}

var contGaleriaDinamica01=1;
var idSetInterval;
function activarGaleriaDinamica01(){
	ocultarPoeDeFoto();
	idSetInterval = setInterval("recorrerGaleriaDinamica01()", 3000);
}

// funcion para activar o detener el set interval. Detiene el carrusel de la galeria dinamica al pasar el mouse sobre una imagen y lo reactiva a quitarlo de la misma
function crearActivarDetenerSetInterval(){
	// detener el setInterval al pasar el moese encima de la foto
		$("#galeriaDinamica01Contenedor").hover(function(){
			detenerGaleriaDinamica01();
		}, function(){
			activarGaleriaDinamica01();
		});
}

function detenerGaleriaDinamica01(){
	clearInterval(idSetInterval);
}

function ocultarPoeDeFoto(){
	// ocultar todos los pie de foto
	$("#galDinPie01").css({ "display":"none" });
	$("#galDinPie02").css({ "display":"none" });
	$("#galDinPie03").css({ "display":"none" });
	$("#galDinPie04").css({ "display":"none" });
	$("#galDinPie05").css({ "display":"none" });
}

function recorrerGaleriaDinamica01(){
	if(contGaleriaDinamica01==1){
		// posicion del div que contiene la imagen y el pie
		$("#galDin01Div").css({"z-index":"5"});
		$("#galDin02Div").css({"z-index":"4"});
		$("#galDin03Div").css({"z-index":"3"});
		$("#galDin04Div").css({"z-index":"2"});
		$("#galDin05Div").css({"z-index":"1"});
		
		// visualizar pie de foto al pasar el moese encima de la foto
		$("#galDin01Div").hover(function(){
			$("#galDinPie01").fadeIn("slow");
		}, function(){
			$("#galDinPie01").fadeOut("slow");
		});
		
		// puntos de navegacion
		$("#galDinNavegacionBot01").css({"background":"url(img/varios/boton03.png)"});
		$("#galDinNavegacionBot02").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot03").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot04").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot05").css({"background":"url(img/varios/boton01.png)"});
		contGaleriaDinamica01++;
	}
	else if(contGaleriaDinamica01==2){
		$("#galDin02Div").css({"z-index":"5"});
		$("#galDin03Div").css({"z-index":"4"});
		$("#galDin04Div").css({"z-index":"3"});
		$("#galDin05Div").css({"z-index":"2"});
		$("#galDin01Div").css({"z-index":"1"});
		
		// visualizar pie de foto al pasar el muese encima de la foto
		$("#galDin02Div").hover(function(){
			$("#galDinPie02").fadeIn("slow");
		}, function(){
			$("#galDinPie02").fadeOut("slow");
		});
		
		$("#galDinNavegacionBot02").css({"background":"url(img/varios/boton03.png)"});
		$("#galDinNavegacionBot03").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot04").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot05").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot01").css({"background":"url(img/varios/boton01.png)"});
		
		contGaleriaDinamica01++;
	}
	else if(contGaleriaDinamica01==3){
		$("#galDin03Div").css({"z-index":"5"});
		$("#galDin04Div").css({"z-index":"4"});
		$("#galDin05Div").css({"z-index":"3"});
		$("#galDin01Div").css({"z-index":"2"});
		$("#galDin02Div").css({"z-index":"1"});
		
		// visualizar pie de foto al pasar el muese encima de la foto
		$("#galDin03Div").hover(function(){
			$("#galDinPie03").fadeIn("slow");
		}, function(){
			$("#galDinPie03").fadeOut("slow");
		});
		
		$("#galDinNavegacionBot03").css({"background":"url(img/varios/boton03.png)"});
		$("#galDinNavegacionBot04").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot05").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot01").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot02").css({"background":"url(img/varios/boton01.png)"});
		
		contGaleriaDinamica01++;
	}
	else if(contGaleriaDinamica01==4){
		$("#galDin04Div").css({"zindex":"5"});
		$("#galDin05Div").css({"z-.index":"4"});
		$("#galDin01Div").css({"z-index":"3"});
		$("#galDin02Div").css({"z-index":"2"});
		$("#galDin03Div").css({"z-index":"1"});
		
		// visualizar pie de foto al pasar el muese encima de la foto
		$("#galDin04Div").hover(function(){
			$("#galDinPie04").fadeIn("slow");
		}, function(){
			$("#galDinPie04").fadeOut("slow");
		});
		
		$("#galDinNavegacionBot04").css({"background":"url(img/varios/boton03.png)"});
		$("#galDinNavegacionBot05").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot01").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot02").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot03").css({"background":"url(img/varios/boton01.png)"});
		
		contGaleriaDinamica01++;
	}
	else if(contGaleriaDinamica01==5){
		$("#galDin05Div").css({"zindex":"5"});
		$("#galDin01Div").css({"z-.index":"4"});
		$("#galDin02Div").css({"z-index":"3"});
		$("#galDin03Div").css({"z-index":"2"});
		$("#galDin04Div").css({"z-index":"1"});
		
		// visualizar pie de foto al pasar el muese encima de la foto
		$("#galDin05Div").hover(function(){
			$("#galDinPie05").fadeIn("slow");
		}, function(){
			$("#galDinPie05").fadeOut("slow");
		});
		
		$("#galDinNavegacionBot05").css({"background":"url(img/varios/boton03.png)"});
		$("#galDinNavegacionBot01").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot02").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot03").css({"background":"url(img/varios/boton01.png)"});
		$("#galDinNavegacionBot04").css({"background":"url(img/varios/boton01.png)"});
		
		contGaleriaDinamica01=1;
	}
}

function galDinCambiarImg(noImg){
	contGaleriaDinamica01=noImg;
	recorrerGaleriaDinamica01();
}

function cargarMenuHorizontal(){	
	$(".menu li").hover(function(){
		$(this).find("> ul").stop(true, true).slideDown("slow");
	}, function(){
		$(this).find("> ul").stop(true, true).slideUp("slow");
	});
}

function verComunicado(idCom){
	jQuery.get("php/verComunicado.php", { idCom:idCom }, function(comunicado){
		$("#modalContenido").html(comunicado);
		mostrarVentanaModal();
	});
}

function traerFormDirectorio(id){
	jQuery.get("php/formDirectorio.php", { id:id }, function(form){
		$("#modalContenido").html(form);
		mostrarVentanaModal();
	});
}

function formDirMandarMensaje(id){
	var dirUsu=$("#dirUsu").val();
	var dirCorE=$("#dirCorE").val();
	var dirTel=$("#dirTel").val();
	var dirCom=$("#dirCom").val();
	var dirAsu=$("#dirAsu").val();
	var dirMen=$("#dirMen").val();
	
	if(!dirUsu){
		$("#dirUsu+div").html("campo obligatorio");
		$("#dirUsu").focus();
		
		$("#dirAsu+div").html("");
		$("#dirMen+div").html("");
	}
	else if(!dirAsu){
		$("#dirAsu+div").html("campo obligatorio");
		$("#dirAsu").focus();
		
		$("#dirUsu+div").html("");
		$("#dirMen+div").html("");
	}
	else if(!dirMen){
		$("#dirMen+div").html("campo obligatorio");
		$("#dirMen").focus();
		
		$("#dirUsu+div").html("");
		$("#dirAsu+div").html("");
	}
	else{
		// si no se puso alguno de estos campos no obligatorios, se le da un valor por defecto ("vacio")
		if(!dirCorE){
			dirCorE="vacio";
		}
		if(!dirTel){
			dirTel="vacio";
		}
		if(!dirCom){
			dirCom="vacio";
		}
		jQuery.post("php/formDirectorioEnviarMensaje.php", {id:id, dirUsu:dirUsu, dirCorE:dirCorE, dirTel:dirTel, dirCom:dirCom, dirAsu:dirAsu, dirMen:dirMen }, function(res){
			$("#modalContenido").html(res);
		});
		//alert("usu: "+dirUsu+", cor: "+dirCorE+", tel: "+dirTel+", com: "+dirCom+", asu: "+dirAsu+", men: "+dirMen);
	}
}

function mostrarVentanaModal(){
	$("#modalDark").css({ "display":"block" });
	$("#modalLight").css({ "display":"block" });
}

function cerrarVentanaModal(){
	$("#modalDark").css({ "display":"none" });
	$("#modalLight").css({ "display":"none" });
}

function ok(){
	alert("ok");
}