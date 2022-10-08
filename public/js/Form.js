var Form_ = Form_ || {};
Form_.atRules = {'email':/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/};


Form_.atOnInitLogin = function(idForm){
	var _this = this;
	$('#'+idForm+' :input:first').focus();
	$('#loginBtn').on('click', function(){
		_this.atChekForm(idForm);
	});
	$('#'+idForm+' input').keydown(function(k){
		k.keyCode == 13 && _this.atChekForm(idForm);
	});
};

Form_.atOnInitPatrocinadorAdd = function(idForm){
	var _this = this;
	$('#'+idForm+' :input:first').focus();
	$('#patrocinadorAddBtn').on('click', function(){
		_this.atChekForm(idForm);
	});
	$('#'+idForm+' input').keydown(function(k){
		k.keyCode == 13 && _this.atChekForm(idForm);
	});
};

Form_.atOnInitAdd = function(cfg){
	let _this = this;

  let idForm = cfg["idForm"] ? cfg["idForm"] : "";
	$(`#${idForm} :input:first`).focus();
	$(`#${idForm}Btn`).on('click', function(){
		_this.atChekForm(idForm);
	});
	$(`#${idForm} input`).keydown(function(k){
		k.keyCode == 13 && _this.atChekForm(idForm);
	});
};
/**
  * valida formularios de espacios vacios, formatos correctos de correo electrónico, etc
  * Para validar que un campo no esté vacio (requerido) se tiene que poner en el input el atributo "data-notnull='1'",
  * si no se quiere validar se pone un cero o no se especifica dicho atributo. 
  * Si se quiere validar un campo en especial, como un campo donde hay un correo se agrega el atributo "data-type",
  * por ejemplo para un correo electrónico sería "data-type='email'", si no se especifica el atributo "data-type"
  * se toma como un simple campo de texto sin ningún formato en específico
  * @param String idForm indica el id que tiene el formulario a validar
  **/
Form_.atChekForm = function(idFrm){
	var _this = this;
	var expr = Form_.atRules.email || '';
	var err = {'length_':0};
	var frm = $('#'+idFrm);
	frm.find(':input').each(function(){
		var idInpt = this.id;
		var inpt = $('#'+idInpt);
		var tyInpt = inpt.prop('type');
		var exclude = ['button', 'submit', 'hidden'];
		// excluyendo algunos tipos de input que no se requiere validar (button, submit, etc)
		if(exclude.indexOf(tyInpt)<0){
			_this.atInputFormat(idInpt, 15, 'error');
			var type = inpt.data('type');
			var notNull = parseInt(inpt.data('notnull'));
			// comprobando valores nulos en los campos especificados con el data-notnull="1"
			notNull && _this.atCheckNotNull(idInpt) && (err[idInpt] = 'Complete este campo', err.length_++);
			// comprobando que los campos tipo 'mail' tengan el formato correcto
			if(type=='email')
				err.hasOwnProperty(idInpt) || expr.test(inpt.val()) || (err[idInpt] = 'Correo electrónico no válido', err.length_++);
		}
	});
	// si no hay campos con errores se manda el formulario por submit,
	// de lo contrario se pone la leyenda en los input con errores
	if(!err.length_)
		frm.submit();
	else
		for(var k in err)
			k!='length_' && this.atInputFormat(k, 15, 'error', 1, err[k]);
};
/**
  * verifica y retorna si un campo esta vacio (true) o no (false)
  * @param String idInpt indica el id del campo a verificar
  *
  */
Form_.atCheckNotNull = function(idInpt){
	var input = $('#'+idInpt);
	var type = $('#'+idInpt).prop('type');
	var val = input.val();
	var res = false;
	switch(type){
		case 'text':
		case 'password':
			res = val==null || val=='';
			break;
	}
	return res;
};
/**
  * agrega (add=1) o elimina (add=0) clases y estilos de los inputs de un 
  * formulario por medio de comprobaciones "bitwise" (nivel de bits)
  * @param String idInpt indica el id del campo a verificar
  * @param Integer lv indica el nivel de bits para agregar una clase/estilo
  * @param String type cadena que contiene el tipo de comprobación, 
  		si hay más de una se separa con un pipe. P.E: "error|success|warning"
  * @param Integer add indica si se va a agregar (add=1) o eliminar (add=0) la clase/estilo 
  * @param String txt indica el texto a poner en caso de que se vaya a requerir
  *
  */
Form_.atInputFormat = function(idInpt, lv, type, add, txt){
	lv = lv || 15;
	if(idInpt && type){
		if(add){
			// agrega clases/estilos al elemento
			lv & 1 && $('#'+idInpt+'-group').addClass('has-'+type);
			lv & 2 && $('#'+idInpt+'-icon-help-block').css('display', 'block');
			lv & 4 && $('#'+idInpt+'-help-block').text(txt);
			lv & 8 && $('#'+idInpt+'-help-block').css({'display':'block', 'color':'red'});
		}else{
			// elimina clases al elemento
			type = type.split('|');
			for(var k in type)
				lv & 1 && $('#'+idInpt+'-group').removeClass('has-'+type[k]);
			lv & 2 && $('#'+idInpt+'-icon-help-block').css('display', 'none');
			lv & 4 && $('#'+idInpt+'-help-block').text('');
			lv & 8 && $('#'+idInpt+'-help-block').css({'display':'none'});
		}
	}
};