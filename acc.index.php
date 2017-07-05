<?php

$errores="";
$enviado="";
$login=false;
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

    //
$Labels=array();
$opciones=array();
$Detalles=array();
$Additionaltext='';
}

if($page==1)
{
    $Additionaltext='Show more...';
    

//Acount Profile
array_push($opciones,"Perfil publico");
array_push($opciones,"Balance");
array_push($opciones,"Archivements");    


array_push($Labels,"Server");
array_push($Labels,"HoursPlayed");
array_push($Labels,"Rango");
   

array_push($Detalles,$result['server']);
array_push($Detalles,$result['horasjugadas']);
array_push($Detalles,$result['rango']);   



}
if($page==2)
{
    $ChangeLinks="acc.index.php?page=2&change=";
     $Additionaltext='';
//Account Settingss
array_push($opciones,"Cambiar Email");
array_push($opciones,"Cambiar Password");
array_push($opciones,"Cambiar Servidor");   



array_push($Labels,"Email");
array_push($Labels,"password");
array_push($Labels,"Server");


array_push($Detalles,$result['email']);
array_push($Detalles,$result['horasjugadas']);
array_push($Detalles,$result['rango']);   
}
if(isset($_GET['change']))
{
    if(empty($_GET['change']))
    {
        switch ($_GET['change'])
         {
            case 1:
                $typeform="server";
                $namefromOld='serverold';
                $namefromNew='servernew';
                break;
            case 2:
                $typeform="password";
                $namefromOld='passold';
                $namefromNew='passnew';
                break;
            case 3:
               $typeform="email";
                $namefromOld='emailold';
                $namefromNew='emailnew';
                break;
            
            default:
                
                break;
        }
    }
}
//Quiere decir que quiere cambiar alguno de sus datos
if(isset($_POST['submit']))
{
    
     header("refresh: 0; acc.index.php?page=2");
    //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $old=$_POST[$namefromOld];
   $new=$_POST[$namefromNew];
     
     //Tenemos algo pero no sabemos que es lo que tenemos... creo que es emomento de ver que es
     //estara vacio ?
     if(!empty($user))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $old=trim($user);
         $old=filter_var($old,FILTER_SANITIZE_STRING);
         if(!filter_var($old,FILTER_SANITIZE_STRING))
         {
             $errores.="Ingresa un correo valido <br\>";
         }
     
     }else
     {
         $errores.="";
     }
    
         if(!empty($new))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $new=trim($new);
         $new=filter_var($new,FILTER_SANITIZE_STRING);
     }else
     {
         $errores.=" Rellene todos los campos de el Formulario";
     }
}
 if(!$errores)
{
     
     //Preparamos  la Query
     $statement=$conexion->prepare('UPDATE users_data SET :columna =:value WHERE users_data.id =:id');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':columna'=>$typeform,':value'=>$new,':id'=>$_SESSION['id']) );

     $result=$statement->fetch(); 
}



require 'acc.index.base.php';
?>