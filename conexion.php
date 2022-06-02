<?php
$host_db="127.0.0.1";
$user_db="root";
$pass_db="";
$db_name="birthday";

$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

if($conexion->connect_error){
    echo"<h1>Error, no se pueden acceder a las consultas</h1>";
} 


?>