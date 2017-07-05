<?php
function conexion($tabla, $usuario, $pass){
	try {
		$conexion = new PDO("10.1.2.121;dbname=$tabla", $usuario, $pass);
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