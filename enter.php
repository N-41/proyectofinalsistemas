<?php //enter
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$entertable = $_POST['Enter'];
$conexion->query('Delete from abierta;');
$conexion->query('Insert into abierta values ("'.$entertable.'");');
header('Location: game.php');
?>