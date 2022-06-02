<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$consulta_sql = 'select * from regalos1 order by rand()';
$resultado = $conexion->query($consulta_sql);
$tempcount = 1;

	while($row = mysqli_fetch_assoc($resultado)){
		$conexion->query('Insert into regalos2 values('.$tempcount.',"'.$row['nombre'].'");');
		$conexion->query('Insert into regalos3 values('.$row['id'].',"'.$row['nombre'].'");');
		$tempcount++;
    }
	

header('Location: index.php');
?>