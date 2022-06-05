<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$gift = $_POST["nuevoregalo"];
$current = mysqli_fetch_assoc($conexion->query('Select * from abierta limit 1;'));
$giftnames = $conexion->query('Select * from '.$current['nombre'].';');
$temptrue = true;
while($row = mysqli_fetch_assoc($giftnames)){
	if($row['nombre'] == $gift) $temptrue = false;
}
if($temptrue == true && $gift != ''){
	$countr = mysqli_num_rows($conexion->query('Select * from '.$current['nombre'].';')) + 1;
	$consulta_sql = 'Insert into '.$current['nombre'].' values (';
	$consulta_sql .= $countr;
	$consulta_sql .= ',"';
	$consulta_sql .= $gift;
	$consulta_sql .= '");';
	$conexion->query($consulta_sql);
	header('Location: game.php');
}
else{
	echo "
	Error: The name of the gift given is either already on the list or is blank.
	<form method='POST' action='game.php'>
	<input type='submit' name='Return' value='Return'>
	</form>
	";
}

?>