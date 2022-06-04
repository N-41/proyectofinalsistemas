<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
/*$consulta_sql="SELECT * FROM regalos1";
$resultador1 = $conexion->query($consulta_sql);
if($resultador1 != false) $countr1 = mysqli_num_rows($resultador1); 
else $countr1 = 0;*/
echo "
<form method='POST' action='create.php'>
<input type='text' id='Create' name='Create'>
<input type='submit' value='Crear lista de regalos' name='Crear lista de regalos'>
</form>
<br>
";

$tablas = $conexion->query("Show tables where 
(Tables_in_birthday not like 'contador') AND
(Tables_in_birthday not like 'regalos2') AND
(Tables_in_birthday not like 'regalos3') AND
(Tables_in_birthday not like 'tomado') AND
(Tables_in_birthday not like 'abierta');");

while($row = mysqli_fetch_assoc($tablas)){
	echo "<form method='POST' action='enter.php'><button type='submit' name='Enter' value='".$row['Tables_in_birthday']."'>Enter</button>";
	echo "<form method='POST' action='delete.php'><button type='submit' name='Delete' value='".$row['Tables_in_birthday']."'>Delete</button>";
	$regalosejemplo = $conexion->query('Select * from '.$row['Tables_in_birthday'].' limit 3;');
	echo '| '.$row['Tables_in_birthday'].' ';
	while($row2 = mysqli_fetch_assoc($regalosejemplo)){
		
		echo '| '.$row2['nombre'].' ';
	}
	echo '<br>';
}
?>

 