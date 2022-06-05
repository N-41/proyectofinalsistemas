<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$take = $_POST["Decision"];
if($take == '0'){
	$conexion->query('Delete from contador');
	$conexion->query('Delete from regalos2;');
} //Accept
if($take == '1'){
	$conexion->query('Delete from contador where cajasabiertas = 0');
}
header('Location: game.php');
?>