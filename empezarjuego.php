<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$current = mysqli_fetch_assoc($conexion->query('Select * from abierta limit 1;'));
$consulta_sql = 'select * from '.$current['nombre'].' order by rand()';
$resultado = $conexion->query($consulta_sql);
$temp1 = 1;
$giftcount = mysqli_num_rows($resultado);
$contadorcount = mysqli_num_rows($conexion->query('Select * from contador'));
$tempcount = 1;
$conexion->query('Delete from regalos3');

	while($row = mysqli_fetch_assoc($resultado)){
		$conexion->query('Insert into regalos2 values('.$tempcount.',"'.$row['nombre'].'",'.$row['id'].');');
		$conexion->query('Insert into regalos3 values('.$row['id'].',"'.$row['nombre'].'",'.$tempcount.');');
		
		$tempcount++;
		$temp1--;
		if($temp1 == 0){
			
			if($giftcount == 1 || $giftcount == 2 || $giftcount == 3 || $giftcount == 4 || $giftcount == 5 || $giftcount == 7 || $giftcount == 9 || $giftcount == 12){
				$conexion->query('Insert into contador values('.$contadorcount.', 1);');
				$contadorcount = mysqli_num_rows($conexion->query('Select * from contador'));
				$temp1 = 1;
			}
			else if($giftcount == 6 || $giftcount == 8 || $giftcount == 10 || $giftcount == 13){
				$conexion->query('Insert into contador values('.$contadorcount.', 2);');
				$contadorcount = mysqli_num_rows($conexion->query('Select * from contador'));
				$temp1 = 2;
			}
			else if($giftcount == 11 || $giftcount == 14){
				$conexion->query('Insert into contador values('.$contadorcount.', 3);');
				$contadorcount = mysqli_num_rows($conexion->query('Select * from contador'));
				$temp1 = 3;
			}
			else{
				$conexion->query('Insert into contador values('.$contadorcount.', '.(4 - (($giftcount - 14) % 4)).');');
				$contadorcount = mysqli_num_rows($conexion->query('Select * from contador'));
				$temp1 = 4 - (($giftcount - 14) % 4);
			}
			
			
		}
		$giftcount--;
    }
	

header('Location: game.php');
?>