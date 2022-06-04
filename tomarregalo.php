<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$giftid = $_POST["Tomar"];
$conexion->query('Delete from tomado;');
$regalo = mysqli_fetch_assoc($conexion->query('Select * from regalos2 where id = '.$giftid.';'));
echo $regalo['nombre'];
$consulta_sql = 'Insert into tomado values(';
$consulta_sql .= $regalo['id'];
$consulta_sql .= ',"';
$consulta_sql .= $regalo['nombre'];
$consulta_sql .= '");';
$conexion->query($consulta_sql);
$consulta_sql = 'Delete from regalos2 where id = ';
$consulta_sql .= $giftid;
$consulta_sql .= ';';
$conexion->query($consulta_sql);
header('Location: game.php');
?>
