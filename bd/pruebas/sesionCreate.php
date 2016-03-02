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
 $_SESSION['user'] = "max";
 echo $_SESSION['user'];
 echo "\nstatus: ".session_status();
 echo "\nid: ".$id;
?>
<p>
  <a href="sesion.php">index</a>
</p>

<p>
  <a href="sesionDestroy.php">destruir sesion</a>
</p>
 </body>
</html>