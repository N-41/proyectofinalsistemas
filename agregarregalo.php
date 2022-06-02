<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$gift = $_POST["nuevoregalo"];
$consulta_sql = 'Insert into regalos1 (nombre) values ("';
$consulta_sql .= $gift;
$consulta_sql .= '");';
$conexion->query($consulta_sql);

header('Location: index.php');
?>