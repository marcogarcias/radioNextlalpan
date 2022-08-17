<?php
$img = './img';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RADIONEXTLALPAN</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

<div class="rep2">
  <div class="border rep2-header">
    <div class="border2 rep2-play" title="Reproducir">
      <img id="rep2-play" src="<?php echo $img; ?>/reproductor2/rep-btn-play-1.png?<?php echo microtime(); ?>" data-status="" alt="Play">
    </div>
    <div class="border2 rep2-display">
      <!-- <span class="border3">Título de la canción</span>
      <hr width="80%">
      <span class="border3">Intérprete</span> -->
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
      <div class="rep2-social" data-social="youtube"><a href="https://www.youtube.com/channel/UCKOd5NM7zp82XhEBmckjjxg" target="_blanck"><img src="<?php echo $img; ?>/reproductor2/rep-btn-youtube-1.png?<?php echo microtime(); ?>" title="Youtube" alt="Youtube"></a></div>
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="./js/script.js"></script>
</body>
</html>