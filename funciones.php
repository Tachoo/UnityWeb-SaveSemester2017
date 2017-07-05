<?php
function conexion($tabla, $usuario, $pass){
	try {
		$conexion = new PDO("mysql:host=localhost;dbname=$tabla", $usuario, $pass);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}
//Funcion para debugear
function printArray($var)
{
	echo"<pre>";
	print_r($var);
	echo"</pre>";
}
?>