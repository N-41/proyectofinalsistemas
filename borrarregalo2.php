<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$giftid = $_POST["Borrar"];
$regalo = mysqli_fetch_assoc($conexion->query('Select * from regalos2 where id = '.$giftid.';'));
$conexion->query('UPDATE contador SET cajasabiertas = cajasabiertas - 1 limit 1;');
echo "<div class='row'><div class='column1'>";
echo "<button onclick='reveal();'>Reveal</button>";
echo "<p id='p1'></p>";
echo "<script>function reveal(){document.getElementById('p1').innerHTML = '".$regalo['nombre']."';}</script></div>";
echo "<div class='column2'>";
echo "<form action='borrarregalo3.php' method='POST'><button type='submit' name='Borrar' id='Borrar' value='".$giftid."'>Next!</button></form>";
echo "</div></div>";
?>