<?php
require "conexion.php";
//echo "<link rel='stylesheet' href='style.php' media='screen'>";
mysqli_set_charset($conexion,'utf8');
/*$consulta_sql="SELECT * FROM regalos1";
$resultador1 = $conexion->query($consulta_sql);
if($resultador1 != false) $countr1 = mysqli_num_rows($resultador1); 
else $countr1 = 0;*/
echo "
<div class='row'><div class='column1'>
Welcome to ~What's in the box!~<br>
In this game, you pick a box with an item from any of the lists below to keep! But you don't know what's that item<br>
To get closer to knowing, you must open the remaining boxes one by one until the last one remains<br>
Will you keep your choice? Or will you succumb to the shark's offers?<br>
The rules of the game are simple:<br>
-There are 2 players: The Shark, and the Receiver<br>
-Starting the game, the Receiver will be able to pick a box from the randomized items<br>
-This box will be opened at the end of the game, and either the Shark or the Receiver will open depending on how the game goes<br>
-After that, the remaining boxes will be opened, one by one, by the Receiver, until we reach the starting box<br>
-Once a gift is elminated, it will be shown in a list, and the Receiver will get closer to figuring out what's the secret gift<br>
-The game is divided in several rounds. Every 4 gifts the Receiver eliminates, a round will end<br>
-When a round ends, the Shark will be able to offer a better alternative of the final box to the Receiver<br>
-If the Receiver accepts, the game ends, the Receiver gets the offer, and the Shark goes away with the final box<br>
-If the Receiver rejects, the game continues until there are no more boxes<br>
-The ammount of boxes needed to be opened before finishing a round decreases over time<br>
-If all the boxes get eliminated without accepting any offer, the game ends and the Receiver gets the final box<br>
<br>
Click on the 'enter' button above a list to enter it, or the delete button to remove it<br>
WARNING: There is no confirmation button before deleting a list. BE CAREFUL<br>
<form method='POST' action='create.php'>
<input type='text' id='Create' name='Create'>
<input type='submit' value='Crear lista de regalos' name='Create new list'>
</form>
</div>
<div class='column2'>
";

$tablas = $conexion->query("Show tables where 
(Tables_in_birthday not like 'contador') AND
(Tables_in_birthday not like 'regalos2') AND
(Tables_in_birthday not like 'regalos3') AND
(Tables_in_birthday not like 'tomado') AND
(Tables_in_birthday not like 'abierta');");

while($row = mysqli_fetch_assoc($tablas)){
	echo "<form method='POST' action='enter.php'><button type='submit' name='Enter' value='".$row['Tables_in_birthday']."'>Enter</button></form>";
	echo "<form method='POST' action='delete.php'><button type='submit' name='Delete' value='".$row['Tables_in_birthday']."'>Delete</button></form>";
	$regalosejemplo = $conexion->query('Select * from '.$row['Tables_in_birthday'].' limit 3;');
	echo '| '.$row['Tables_in_birthday'].' ';
	while($row2 = mysqli_fetch_assoc($regalosejemplo)){
		
		echo '| '.$row2['nombre'].' ';
	}
	echo '<br><br><br>';
}

echo "</div></div>";
?>

 