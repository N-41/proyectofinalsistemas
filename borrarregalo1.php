<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$giftid = $_POST["Borrar"];
$consulta_sql = 'Delete from regalos1 where id = ';
$consulta_sql .= $giftid;
$consulta_sql .= ';';
$conexion->query($consulta_sql);
header('Location: index.php');
?>