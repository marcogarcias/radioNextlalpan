<?php session_start(); ?>
<!DOCTYPE html>
 
<html lang="es">
 <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
 <title>Crear una sesi�n</title>
 </head>
 <body>
 <h1>Creaci�n de una sesi�n</h1>
 <?php
 session_destroy();
 $id = session_id();
 echo "status: ".session_status();
 echo "\nid: ".$id;
?>
<p>
  <a href="sesion.php">index</a>
</p>

<p>
  <a href="sesionCreate.php">crear sesion</a>
</p>
 </body>
</html>