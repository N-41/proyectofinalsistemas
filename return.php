<?php //return
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
header('Location: index.php');
?>