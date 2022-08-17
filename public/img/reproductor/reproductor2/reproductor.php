<?php
$img = 'public/img/reproductor';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RADIONEXTLALPAN</title>
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="jquery.shoutcast.min.js"></script>
<style>
.border{
  border:0px solid #000;
}

.border2{
  border:0px solid #f00;
}

.border3{
  border:0px solid #0f0;
}

.rep{
  border: 5px solid #75ba00;
  border-radius: 10px;
  width: 25%;
}

.rep-logo{
  display:inline-block;
  width:34%;
}

.rep-logo img{
  width: 100%;
}

.rep-buttons-cont{
  text-align: center;
  display:inline-block;
  vertical-align: top;
  width:60%;
}

.rep-buttons{
  margin: auto;
  width: 50%;
}

.rep-buttons img{
  width: 100%;
}

.volume{
  width: 100%;
}



.rep2{
  display: block;

  margin: 0;
  padding: 0;
  max-width: 500px;
  width: 100%;
}

.rep2-header{
  background-color: #3703FD;
}

.rep2-play{
  display: inline-block;
  margin: 0;
  padding: 0;
  width: 20%;

  -webkit-animation: rotateanti 10s linear infinite 0s;
  -moz-animation: rotateanti 10s linear infinite 0s;
  -o-animation: rotateanti 10s linear infinite 0s;
  -ms-animation: rotateanti 10s linear infinite 0s;
  animation: rotateanti 10s linear infinite 0s;
}

.rep2-play img{
  width: 100%;
}

.rep2-display{
  display: inline-block;
  font-size: 25px;
  font-weight: bold;
  margin-top: 10px;
  padding: 0;
  text-align: center;
  vertical-align: top;
  width: 78%;
}

.rep2-display hr{
  margin: 0 auto;
}

.rep2-footer{
  background-color: #07620D;
  padding: 5px;
  position: relative;
  text-align: center;
}

.rep2-foot{
  display: inline-block;
  width: 31%;
}

.rep2-radionextlalpan{
  bottom: 10px;
  color: #6C0309;
  font-size: 20px;
  font-weight: bold;
  position: absolute;
  text-align: center;
  text-shadow: 2px 0 0 #000, -2px 0 0 #000, 0 2px 0 #000, 0 -2px 0 #000, 1px 1px #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000;
}

.rep2-social{
  display: inline-block;
  text-align: center;
  width: 20%;
}

.rep2-social img{
  width: 100%;
}

.rep2-volume-cont{
  display: inline-block;
  width: 20%;
}

.rep2-volume-cont img{
  width: 100%;
}

.rep2-volume{
  display: inline-block !important;
  width: 70% !important;
}

</style>
</head>
<body>
<audio controls>
	<source src="http://109.169.76.104:12017/;stream.mp3" type="audio/mp3">
	Your browser does not support the audio element.
</audio>
<br><br>
<div class="rep">
  <div class="border rep-logo">
    <img src="<?php echo $img; ?>/rep-logo.jpg?<?php echo microtime(); ?>" alt="RADIONEXTLALPAN">
  </div>
  <div class="border rep-buttons-cont">
    <div class="border rep-buttons"><img id="play" data-status="" src="<?php echo $img; ?>/rep-btn-play-1.png" alt="Reproducir"></div>
    <div class="border">
      <input type="range" min="0" max="100" value="90" class="volume" id="volume">
    </div>
  </div>
</div>

<br><br>

<div class="rep2">
  <div class="border rep2-header">
    <div class="border2 rep2-play" title="Reproducir">
      <img id="rep2-play" src="<?php echo $img; ?>/reproductor2/rep-btn-play-1.png?<?php echo microtime(); ?>" data-status="" alt="Play">
    </div>
    <div class="border2 rep2-display">
      <span class="border3">Título de la canción</span>
      <hr width="80%">
      <span class="border3">Intérprete</span>
    </div>
  </div>
  <div class="border rep2-footer">
    <div class="border2 rep2-foot">
      <div class="rep2-radionextlalpan">RADIO <br> NETXLALPAN</div>
    </div>
    <div class="border2 rep2-foot">
      <div class="rep2-volume-cont"><img src="<?php echo $img; ?>/reproductor2/rep-btn-volume-1.png" alt=""></div>
      <input id="rep2-volume" type="range" min="0" max="100" value="100" class="rep2-volume" id="volume">
    </div>
    <div class="border2 rep2-foot">
      <div class="rep2-social" data-social="facebook"><a href="https://es-la.facebook.com/RADIONEXTALPAN" target="_blanck"><img src="<?php echo $img; ?>/reproductor2/rep-btn-facebook-1.png?<?php echo microtime(); ?>" title="Facebook" alt="Facebook"></a></div>
      <div class="rep2-social" data-social="twitter"><a href="https://twitter.com/radio_nex" target="_blanck"><img src="<?php echo $img; ?>/reproductor2/rep-btn-twitter-1.png?<?php echo microtime(); ?>" title="Twitter" alt="Twitter"></a></div>
      <div class="rep2-social" data-social="instagram"><a href="https://www.instagram.com/radio.nextlalpan" target="_blanck"><img src="<?php echo $img; ?>/reproductor2/rep-btn-instagram-1.png?<?php echo microtime(); ?>" title="Instagram" alt="Instagram"></a></div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
// http://109.169.76.104:12017/admin.cgi?mode=viewjson&page=1&sid=1
// http://109.169.76.104:12017/stats?sid=1&json=1
// http://109.169.76.104:12017/stats?sid=1&json=1&callback=func
  let rep = {
    audio: '',
    init: function(){
      // https://www.w3schools.com/jsref/dom_obj_audio.asp
      // https://github.com/Wavestreaming/jquery-shoutcast
      // http://109.169.76.104:12017/index.html
      this.audio = new Audio();
      this.audio.type= 'audio/mpeg';
      this.audio.src= 'http://109.169.76.104:12017/;stream.mp3';
      this.audio.volume=1;

      this.buttons();
    },
    buttons: function(){
      let t = this;
      $('#play').on('click', function(){
        let status = $(this).attr('data-status');
        if(status != 'play'){
          $(this).attr('src', '<?php echo $img; ?>/rep-btn-stop-1.png');
          $(this).attr('data-status', 'play');
          t.audio.play();
        }else if(status != 'stop'){
          $(this).attr('src', '<?php echo $img; ?>/rep-btn-play-1.png');
          $(this).attr('data-status', 'stop');
          t.audio.pause();
        }
      });

      $('#volume').on('change mousemove', function(){
        t.audio.volume = $(this).val()/100;
      });
    }
  };
  // http://www.radio-noise.com/docs/DNAS_Server_JSON_Responses.html
  // http://109.169.76.104:12017/stats?sid=1&json=1&callback=func
  /*$.ajax({
      url: 'http://109.169.76.104:12017/stats?sid=1&json=1&callback=func',
      type: 'GET',
      contentType: "json",
      async: true,
      dataType: 'jsonp',
      jsonp: 'func',
      success: function(jsonp){
        console.log('>>>>> success', jsonp);
      }
    });*/

    let rep2 = {
    audio: '',
    img: 'public/img/reproductor/reproductor2',
    init: function(){
      // https://www.w3schools.com/jsref/dom_obj_audio.asp
      // https://github.com/Wavestreaming/jquery-shoutcast
      // http://109.169.76.104:12017/index.html
      this.audio = new Audio();
      this.audio.type= 'audio/mpeg';
      this.audio.src= 'http://109.169.76.104:12017/;stream.mp3';
      this.audio.volume=1;

      this.buttons();
    },
    buttons: function(){
      let t = this;
      $('.rep2-play').on('click', function(){
        let status = $(this).attr('data-status');
        if(status != 'play'){
          //$(this).attr('src', '<?php echo $img; ?>/rep-btn-stop-1.png');
          $(this).attr('data-status', 'play');
          $(this).attr('title', 'Detener');
          t.audio.play();
          console.log('>>>>>>> song: ', t.audio.textTracks);
        }else if(status != 'stop'){
          //$(this).attr('src', '<?php echo $img; ?>/rep-btn-play-1.png');
          $(this).attr('data-status', 'stop');
          $(this).attr('title', 'Reproductir');
          t.audio.pause();
        }
      });



      $('#rep2-volume').on('change mousemove', function(){
        t.audio.volume = $(this).val()/100;
      });
      // botones de redes sociales
      $('.rep2-social').mouseover(function(){
        let social = $(this).attr('data-social');
        $(this).find('img').attr('src', t.img+'/rep-btn-'+social+'-2.png');
      }).mouseout(function(){
        let social = $(this).attr('data-social');
        $(this).find('img').attr('src', t.img+'/rep-btn-'+social+'-1.png');
      });
    }
  };

  rep.init();
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
</script>
</body>
</html>