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
<style>
.border{
  border:0px solid #000;
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
    <img src="<?php echo $img; ?>/rep-logo.png" alt="RADIONEXTLALPAN">
  </div>
  <div class="border rep-buttons-cont">
    <div class="border rep-buttons"><img id="play" data-status="" src="<?php echo $img; ?>/rep-btn-play-1.png" alt="Reproducir"></div>
    <div class="border">
      <input type="range" min="0" max="100" value="90" class="volume" id="volume">
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  let rep = {
    audio: '',
    init: function(){
      // https://www.w3schools.com/jsref/dom_obj_audio.asp
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

  rep.init();
});
// https://www.w3schools.com/jsref/dom_obj_audio.asp
/*var myaudio = new Audio();
myaudio.type= 'audio/mpeg';
myaudio.src= 'http://109.169.76.104:12017/;stream.mp3';
//myaudio.load();
myaudio.volume=1;
//myaudio.play();
*/
</script>
</body>
</html>