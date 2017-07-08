<?php
/*Hacemos la puerta de entrada para el uso con unity*/
require '../funciones.php';
//Hacemos que el php se conecte a la base de datos.
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
// hacemos  un select sensillo para fines de prueba;
     $statement=$conexion->prepare('SELECT * FROM users_data');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute();
    $result=$statement->fetchall();
    printArray($result);

?>