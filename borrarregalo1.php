<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$giftid = $_POST["Borrar"];
$current = mysqli_fetch_assoc($conexion->query('Select * from abierta limit 1;'));
$consulta_sql = 'Delete from '.$current['nombre'].' where id = ';
$consulta_sql .= $giftid;
$consulta_sql .= ';';
$conexion->query($consulta_sql);
header('Location: game.php');
?>