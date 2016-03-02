<?php session_start(); ?>
<!DOCTYPE html>
 
<html lang="es">
 <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
 <title>Crear una sesión</title>
 </head>
 <body>
 <h1>Creación de una sesión</h1>
 <?php
  $id = session_id();
  if(isset($_SESSION['user']))
    echo "usree: ".$_SESSION['user'];
  else
    echo "--------: ";
  echo "\nstatus: ".session_status();
  echo "\nid: ".$id;
?>
<p>
  <a href="sesionCreate.php">crear sesion</a>
</p>

<p>
  <a href="sesionDestroy.php">destruir sesion</a>
</p>

</body>
</html>