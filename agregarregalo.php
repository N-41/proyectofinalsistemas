<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$gift = $_POST["nuevoregalo"];
$current = mysqli_fetch_assoc($conexion->query('Select * from abierta limit 1;'));
$countr = mysqli_num_rows($conexion->query('Select * from '.$current['nombre'].';')) + 1;
$consulta_sql = 'Insert into '.$current['nombre'].' values (';
$consulta_sql .= $countr;
$consulta_sql .= ',"';
$consulta_sql .= $gift;
$consulta_sql .= '");';
$conexion->query($consulta_sql);

header('Location: game.php');
?>