<?php //create
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$newtable = $_POST['Create'];
$tablenames = $conexion->query('Show tables;');
$temptrue = true;
while($row = mysqli_fetch_assoc($tablenames)){
	if($row['Tables_in_birthday'] == $newtable) $temptrue = false;
}
if($temptrue == true && $newtable != ''){
	$conexion->query('Create table '.$newtable.' (`id` int(2) not null, `nombre` varchar(255), primary key (id));');
	header('Location: index.php');
}
else{
	echo "
	Error: The table name given is either already on the database or is blank.
	Make sure the name of it is not any of the following:
	regalos2, regalos3, contador, tomado, abierta
	<form method='POST' action='index.php'>
	<input type='submit' name='Return' value='Return'>
	</form>
	";
}
?>