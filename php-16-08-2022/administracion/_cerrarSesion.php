<?php
session_start();
include("adminLibrerias.php");
cerrarSesion();
echo "<script>location.href='login.php'</script>";
?>