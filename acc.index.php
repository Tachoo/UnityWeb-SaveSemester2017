<?php
$old='';
$new='';
$typeform="";
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
    $ChangeLinks='#';

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
    if(!empty($_GET['change']))
    {
        switch ($_GET['change'])
         {
            case 1:
               $_SESSION['change']="email"; 
               
                $namefromOld='serverold';
                $namefromNew='servernew';
                break;
            case 2:
                $_SESSION['change']="password";
                
                $namefromOld='passold';
                $namefromNew='passnew';
                break;
            case 3:
               
              $_SESSION['change']="server";
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
 //echo $_SESSION['change'];    
     
    //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $old=$_POST['old'];
   $new=$_POST['new'];
   $typeform=$_SESSION['change']; 
     
      //Preparamos  la Query
     if(!empty($new)&&!empty($old))
     {
         switch ($typeform) {
             case 'server':
             if($result['server']==$old&&$new!=$old)
             {
                 $statement=$conexion->prepare('UPDATE users_data SET server=:value WHERE id =:id');
             }else{$errores.="no concuerdan los datos";}
                 
                 break;
             
             case 'password':
             if($result['password']==$old&&$new!=$old)
             {
                 $statement=$conexion->prepare('UPDATE users_data SET password=:value WHERE id =:id');
             }else{$errores.="no concuerdan los datos";}
                 
                 break;
             
             case 'email':
             if($result['email']==$old&&$new!=$old)
             {
                 $statement=$conexion->prepare('UPDATE users_data SET email=:value WHERE id =:id');
             }else{$errores.="no concuerdan los datos";}
                 
                 break;
             
             default:
                 
                 break;
         }
    
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':value'=>$new,':id'=>$_SESSION['id']) );
       $enviado.="Actualizacion de datos exitosa";
        
   
     }else
     {
      $errores.="No deje espacios en blanco";
     }


}
 
if(isset($_POST['cancel']))
{
    header("refresh: 2; url = acc.index.php?page=2");
}


require 'acc.index.base.php';
?>