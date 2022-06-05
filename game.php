<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$current = mysqli_fetch_assoc($conexion->query('Select * from abierta limit 1;'));
//$consulta_sql="SELECT * FROM regalos1";
$consulta_sql="SELECT * FROM ".$current['nombre'].";";
$resultador1 = $conexion->query($consulta_sql);
if($resultador1 != false) $countr1 = mysqli_num_rows($resultador1); 
else $countr1 = 0;
$consulta_sql="SELECT * FROM regalos2";
$resultador2 = $conexion->query($consulta_sql);
if($resultador2 != false) $countr2 = mysqli_num_rows($resultador2);
else $countr2 = 0;
$consulta_sql="SELECT * FROM regalos3";
$resultador3 = $conexion->query($consulta_sql);
if($resultador3 != false) $countr3 = mysqli_num_rows($resultador3);
else $countr3 = 0;
$consulta_sql="SELECT * FROM tomado";
$resultadot = $conexion->query($consulta_sql);
if($resultadot != false) $countt = mysqli_num_rows($resultadot); 
else $countt = 0;



if($countr2 <= 0 && $countt <= 0){ //pagina 1, el juego todavia no empieza

echo "
<form method='POST' action='agregarregalo.php'>
<input type='text' id='nuevoregalo' name='nuevoregalo'>
<input type='submit' value='Upload' name='Upload'>
</form>
<br>
";

echo "
<form method='POST' action='return.php'>
<input type='submit' value='Return' name='Return'>
</form>
<br>
";

echo "
<form method='POST' action='empezarjuego.php'>
<input type='submit' value='Start!' name='Start!'>
</form>
";

echo $countr1;
echo "<form method='POST' action='borrarregalo1.php'>";
if($countr1 > 0){
	while($row = mysqli_fetch_assoc($resultador1)){
		echo $row['nombre'];
		echo "<button type='submit' value='".$row['id']."' name='Borrar' id='Borrar'>Delete</button>";
		echo "<br>";
	}
}
echo "</form>";

}



else if($countr2 > 0 && $countt <= 0){ //pagina 2: todavia no se toma un regalo

echo "<form method='POST' action='tomarregalo.php'>";
$tmpcount = 1;
while($row = mysqli_fetch_assoc($resultador2)){
	echo "<button type='submit' name='Tomar' value='".$row['id']."'>".$row['id']."</button>";
	if($tmpcount % 5 == 0) echo "<br>";
	$tmpcount ++;
}
echo "</form>";

}



else if($countr2 > 0 && $countt > 0){
	$contadortabla = mysqli_num_rows($conexion->query('Select * from contador limit 1;'));
	if($contadortabla > 0){
	$antesderound = mysqli_fetch_assoc($conexion->query('Select * from contador limit 1;'));
	$regalotomado = mysqli_fetch_assoc($conexion->query('Select * from tomado limit 1;'));

	if($antesderound['cajasabiertas'] <= 0){ //un round ha terminado, pantalla 5
		
		//echo "<div class='row'>";
		//echo "<div class='column1>";
		echo "<form method='POST' action='oferta.php'>";
		echo "<button type='submit' name='Decision' value='0'>Accept</button>";
		//echo "</form></div><div class='column1>";
		//echo "</form>";
		//echo "<form method='POST' action='oferta.php>";
		echo "<button type='submit' name='Decision' value='1'>Reject</button>";
		echo "</form>";
		//echo "</form></div><div class='column2>";
		echo "Round ".$antesderound['round']." has finished";
		//echo "</div></div>";
		

	}
	else{ //jugando en medio de un round, pantalla 3 que lleva a la 4
		
		echo "<div class='row'><div class='column1'>";
		echo "<form method='POST' action='borrarregalo2.php'>";
		$tmpcount = 1;

		while($row = mysqli_fetch_assoc($resultador2)){
			echo "<button type='submit' name='Borrar' value='".$row['id']."'>".$row['id']."</button>";
			if($tmpcount % 5 == 0) echo "<br>";
			$tmpcount ++;
		}
		echo "</form></div>";
		
		echo "<div class='column2'>";
		echo "Round ".$antesderound['round']."<br>";
		echo "<button>".$regalotomado['numeroderegalo']."</button>";
		echo "</div>";
		
		echo "<div class='column1'>";

		while($row = mysqli_fetch_assoc($resultador3)){
			//if(mysqli_num_rows($conexion->query('Select * from regalos2 where newid = '.$row['ogid'].';')) <= 0) echo "<s>";
			if(mysqli_num_rows($conexion->query('Select * from regalos2 where nombre = "'.$row['nombre'].'";')) <= 0 && mysqli_num_rows($conexion->query('Select * from tomado where nombre = "'.$row['nombre'].'";')) <= 0) echo "<s>";
			echo $row['nombre'];
			if(mysqli_num_rows($conexion->query('Select * from regalos2 where nombre = "'.$row['nombre'].'";')) <= 0 && mysqli_num_rows($conexion->query('Select * from tomado where nombre = "'.$row['nombre'].'";')) <= 0 ) echo "</s>";
			//if(mysqli_num_rows($conexion->query('Select * from regalos2 where newid = '.$row['ogid'].';')) <= 0) echo "</s>";
			echo "<br>";
		}
		
		echo "</div></div>";

	}
}


}

else{ //pagina 6
	$regalotomado = mysqli_fetch_assoc($conexion->query('Select * from tomado limit 1;'));
	//$conexion->query('Delete from regalos2;');
	echo "<div class='row'><div class='column1'>";
	echo "<button onclick='reveal();'>Reveal</button>";
	echo "<p id='p1'></p>";
	echo "<script>function reveal(){document.getElementById('p1').innerHTML = '".$regalotomado['nombre']."';}</script></div>";
	echo "<div class='column2'>";
	echo "<form action='game.php' method='POST'><button type='submit' name='submit'>Finish</button></form>";
	echo "</div></div>";
	$conexion->query('Delete from tomado;');
}
?>