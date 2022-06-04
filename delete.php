<?php //delete
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$deletetable = $_POST['Delete'];
$conexion->query('Drop table '.$deletetable.';');
header('Location: index.php');
?>