<?php
session_start();
if(isset($_SESSION)) 
{
    if(empty($_SESSION))
    {
        header("refresh: 0; url = index.php");
    }
}
if(isset($_GET["logout"]))
{   
    session_destroy();
    header("refresh: 0; url = index.php");
}
if(isset($_GET['page']))
{
    switch ($_GET['page']) {
        case 1:
              
              $page=1;
            break;
        case 2:
             $page=2;
            break;
        case 3:
        session_destroy();
        header("refresh: 0; url = index.php?logout=ACCOut");
            break;
        default:
              $page=1;
            break;
    }
}

require 'funciones.php';

$conexion = conexion('savesemester', 'root', '');

if (!$conexion) 
{
	die();
}else
{
    //Preparamos  la Query
     $statement=$conexion->prepare('SELECT * FROM users_data WHERE id=:_id');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':_id'=>$_SESSION['id']) );

     $result=$statement->fetch();
     //Debemos de ver si el arreglo es mayor a 0 de ser asi es que se lanzo la Query Bien y por consecuente si existe el correo en la base de datos
    
}
$Labels=array();
$opciones=array();
$Detalles=array();
if($page==1)
{

array_push($opciones,"Perfil publico");
array_push($opciones,"Balance");
array_push($opciones,"Servidor");    


array_push($Labels,"Server");
array_push($Labels,"HoursPlayed");
array_push($Labels,"Rango");
   

array_push($Detalles,$result['server']);
array_push($Detalles,$result['horasjugadas']);
array_push($Detalles,$result['rango']);   

}
if($page==2)
{

array_push($opciones,"Cambiar Email");
array_push($opciones,"Cambiar Password");
array_push($opciones,"Cambiar Servidor");   



array_push($Labels,"Server");
array_push($Labels,"HoursPlayed");
array_push($Labels,"Rango");


array_push($Detalles,$result['server']);
array_push($Detalles,$result['horasjugadas']);
array_push($Detalles,$result['rango']);   
}


require 'acc.index.base.php';
?>