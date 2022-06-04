<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$giftid = $_POST["Borrar"];
$consulta_sql = 'Delete from regalos2 where id = ';
$consulta_sql .= $giftid;
$consulta_sql .= ';';
$conexion->query($consulta_sql);
if(mysqli_num_rows($conexion->query('Select * from regalos2')) <= 0) $conexion->query('Delete from contador');
header('Location: game.php');
?>