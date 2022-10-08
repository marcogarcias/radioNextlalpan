
function initSliderLocutores(){
  getImages(function(imgs){
    setSliderImages(imgs);
  });
}

function getImages(callback){
  $.ajax({
		dataType: 'json',
		data: {'func':'getImgsLocutores'},
		url: `${urlGlobal}/php/ajax.php`,
		type: 'post',
		beforeSend: function(){

		},
		success: function(res){
      if(callback && (typeof callback === 'function')){
        callback(res);
      }
		}, error: function(xhr, err){
			console.log("Ocurrio un error, intentelo nuevamente:", xhr);
		}
	});
}

function setSliderImages(imgs){
  let logoUrl = '';
	let logoName = '';
	let logoUrlFull = '';
  let item = "";
  let indicator = "";
  let num = 0;
	if((imgs instanceof Array) && imgs.length){
		for(var i in imgs){
			logoUrl = imgs[i].hasOwnProperty('path') ? imgs[i]['path'] : '';
			logoName = imgs[i].hasOwnProperty('image') ? imgs[i]['image'] : '';
			logoUrlFull = `${urlGlobal}/${logoUrl}/${logoName}`;
      indicator = `<li data-target="#carousel-locutores" data-slide-to="${num}" class="${!num?"active":""}"></li>`; 
      item = `
        <div class="item ${!num?"active":""}">
          <img src="${logoUrlFull}" alt="Locutores" title="locutores">
        </div>`;
      $("#carousel-locutores .carousel-indicators").append(indicator);  
      $("#carousel-locutores .carousel-inner").append(item);
      num++;
		}
	}
}

$(function(){
  initSliderLocutores();
});