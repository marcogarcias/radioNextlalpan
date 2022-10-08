var SliderV1 = {
	'atAttr': {
				'atContainer': null, 
				'atImgs':[], 
				'atWidth':0, 
				'atHeight':0, 
				'atChangeTime':0, 
				'atFadeTime':0, 
				'atLoop':true, 
				'atImgTmp':null,
				'atCfg':{}
			}
}
/**
 * inicializando las propiedades del objeto SliderV1 de 
 * acuerdo a la configuración proporcionada
 * @param Object cfg indica el JSON de configuración
 */
SliderV1.atInitProperties = function(cfg){
	cfg = cfg || {};
	var attr = this.atAttr;
	attr.atContainer = cfg.container || 'sliderV1';
	attr.atImgs = this.atGetImgs(this.atAttr.atContainer);
	attr.atWidth = cfg.width || 990;
	attr.atHeight = cfg.height || 300;
	attr.atChangeTime = cfg.changeTime || 6000;
	attr.atFadeTime = cfg.fadeTime || 500;
	attr.atLoop = cfg.loop || true;
	attr.atCfg = cfg;
};
/**
 * obteniendo las imagenes que hay dentro del contenedor y 
 * extrayendo/guardando sus datos a un array
 * @param  String $container
 */
SliderV1.atGetImgs = function(container){
	container = container || this.atAttr.atContainer;
	var _this = this;
	var imgs = [];
	var container_ = $('#'+container+' img');
	var tot = container_.length;
	container_.each(function(idx){
		_this.atSetIndex($(this).prop('id'), (tot-idx));
		imgs.push({'id':$(this).prop('id'), 'src':$(this).attr('src')});
	});
	return imgs;
};
/**
 * Oculta las imágenes del contenedor dejando visdible solo la primera
 * 
 */
SliderV1.atHideImgs = function(){
	var imgs = this.atAttr.atImgs;
	for(var k in imgs){
		k!=0 && $('#'+imgs[k].id).hide();
	}
};
/**
 * poniendo la propiedad css "z-index" a la imagen dada
 * @param String idImg indica el id de la imagen
 * @param Integer z indica el valor que tendrá la 
 *		propiedad z-index para la imagen dada
 */
SliderV1.atSetIndex = function(idImg, z){
	idImg = idImg || 'slider1';
	z = z || 1;
	$('#'+idImg).css('z-index', z);
};
/**
 * inicia la animación del slider
 */
SliderV1.atAnim = function(){
	var cfg = this.atAttr;
	this.atAttr.count = 0;
	setInterval("SliderV1.atShowHide()", cfg.atChangeTime);
};
/**
 * muestra una imagen con un fadeIn y oculta las demás imágenes y 
 * reajusta los z-index de las imágenes
 */
SliderV1.atShowHide = function(){
	var _this = this;
	var img_, z, z_;
	var attrs = this.atAttr;
	var idx = attrs.count;
	var imgs = attrs.atImgs;
	var img = imgs[idx];
	var imgTmp = attrs.atImgTmp;
	var tot = imgs.length;
	
	$("#"+img.id).fadeIn(attrs.atFadeTime, function(){
		for(var k in imgs){
			img_ = imgs[k];
			(img.id == img_.id || imgTmp == img_.id) || $('#'+img_.id).hide();
			z = parseInt($('#'+img_.id).css('z-index'));
			z_ = z>=tot ? 1 : z+1;
			_this.atSetIndex(img_.id, z_);
		}
		imgTmp && $('#'+imgTmp).hide();
		attrs.atImgTmp = img.id;
		attrs.count = attrs.count>=(tot-1) ? 0 : attrs.count+1;
	});
};

/**
 * ocultando las imágenes del sliders
 * QUITAR SLIDER, YA NO SE USA...
 */
SliderV1.atOnInit = function(cfg){
	cfg = cfg || {};
	this.atInitProperties(cfg);
	this.atHideImgs();
	this.atAnim();
	return this;
};
