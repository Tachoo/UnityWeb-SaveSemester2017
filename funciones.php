<?php
function conexion($tabla, $usuario, $pass){
	try {
		// Debemos de especificar el tipo de base de datos seguido de  la direcion de la base de datos
		// separamos por un ; y seguido especificamos la  tabla con la que vamos a trabjar
		// en la segunda y tercer espacio  sera la acreditacion  (Usuario , PASS);
		$conexion = new PDO('mysql:host=mysql.hostinger.mx;dbname='.$tabla.'', $usuario, $pass);
		return $conexion;
		
	} catch (PDOException $e)
	{
		echo 'Connection failed: ' . $e->getMessage();
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