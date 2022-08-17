$(document).ready(function(){
// http://109.169.76.104:12017/admin.cgi?mode=viewjson&page=1&sid=1
// http://109.169.76.104:12017/stats?sid=1&json=1
// http://109.169.76.104:12017/stats?sid=1&json=1&callback=func

    let rep2 = {
    audio: '',
    mute: '0',
    img: 'public/html/reproductor1/img/reproductor2',
    imgs: ['rep-btn-facebook-2', 'rep-btn-twitter-2', 'rep-btn-instagram-2', 'rep-btn-youtube-2'],
    init: function(){
      // https://www.w3schools.com/jsref/dom_obj_audio.asp
      // https://github.com/Wavestreaming/jquery-shoutcast
      // http://109.169.76.104:12017/index.html
      this.audio = new Audio();
      this.audio.type= 'audio/mpeg';
      //this.audio.src= 'http://109.169.76.104:12017/;stream.mp3';
      this.audio.src= 'http://78.129.185.84:38582/;stream.mp3';
      this.audio.volume=1;
      this.audio.volumeTmp=1;
      this.audio.autoplay = true;
      //this_.audio.load();
      //setTimeout(function(){ console.log('>>>>> load'); }, 3000);
      this.buttons();
      this.preloadImgs();
      $(".rep2-play").trigger("click");
    },
    buttons: function(){
      let t = this;

      /*$('.rep2-play').mouseover(function(){
        $(this).find('img').attr('src', t.img+'/rep-btn-play-2.png');
      }).mouseout(function(){
        $(this).find('img').attr('src', t.img+'/rep-btn-play-1.png');
      });*/
      // botón de play
      $('.rep2-play').on('click', function(){
        let status = $(this).attr('data-status');
        if(status != 'play'){
          //$(this).attr('src', '<?php echo $img; ?>/rep-btn-stop-1.png');
          $(this).attr('data-status', 'play');
          $(this).attr('title', 'Detener');
          t.audio.play();
        }else if(status != 'stop'){
          //$(this).attr('src', '<?php echo $img; ?>/rep-btn-play-1.png');
          $(this).attr('data-status', 'stop');
          $(this).attr('title', 'Reproductir');
          t.audio.pause();
        }
      });
      // botón de mute
      $('.rep2-volume-cont').on('click', function(){
        let img = $(this).find('img');
        if(t.audio.mute==0){
          t.audio.volume = 0;
          t.audio.mute = 1;
          img.attr('src', t.img+'/rep-btn-volume-2.png');
        }else{
          t.audio.volume = t.audio.volumeTmp;
          t.audio.mute = 0;
          img.attr('src', t.img+'/rep-btn-volume-1.png');
        }
      });
      // barra de volumen
      $('#rep2-volume').on('change mousemove', function(){
        t.audio.mute || (t.audio.volume = $(this).val()/100);
        t.audio.volumeTmp = $(this).val()/100;
      });
      // botones de redes sociales
      $('.rep2-social').mouseover(function(){
        let social = $(this).attr('data-social');
        $(this).find('img').attr('src', t.img+'/rep-btn-'+social+'-2.png');
      }).mouseout(function(){
        let social = $(this).attr('data-social');
        $(this).find('img').attr('src', t.img+'/rep-btn-'+social+'-1.png');
      });
    },
    // precargando imágenes
    preloadImgs: function(){
      let url = this.img;
      for(img in this.imgs)
        new Image().src=url+'/'+this.imgs[img]+'.png';
    }
  };

  rep2.init();
});
// https://www.w3schools.com/jsref/dom_obj_audio.asp
/*var myaudio = new Audio();
myaudio.type= 'audio/mpeg';
myaudio.src= 'http://109.169.76.104:12017/;stream.mp3';
//myaudio.load();
myaudio.volume=1;
//myaudio.play();
*/

// https://www.youtube.com/watch?v=lsjOKbiZ3Ck - 
// https://www.youtube.com/watch?v=ez2pqzbDfnM - www.zenomedia.com