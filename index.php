<?php

 session_start();
require 'funciones.php';
//Realizamos la conexion a la base de datos
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
//Solo si algo salio mal hay que cortar la conexion;
if (!$conexion) 
{
	die();
}



$id="";
$name="";
$errores="";
$enviado="";
$login=false;
$confirm="";



//Primero veo si  la variable en post de submit existe 
// digamos que es para validar desde este mismo php los datos antes de enviar a otro php

if(isset($_POST['register']))
{

if(!empty($_POST['register']))
{

    //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $server=$_POST['server'];
   //$politicas=$_POST['politicas'];
     
     //Tenemos algo pero no sabemos que es lo que tenemos... creo que es emomento de ver que es
     //estara vacio ?
     if(!isset($politicas))
     {
       if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($server))
       {
         //email
         $email=trim($email);
         $email=filter_var($email,FILTER_SANITIZE_EMAIL);

         if(!filter_var($email,FILTER_VALIDATE_EMAIL))
         {
             $errores.="Ingresa un correo valido <br\>";
         }else
         {
             //ya que tenemos  limpio deberiamos de  rellenar los restantes
         //usuario
         $username=trim($username);
         $username=filter_var($username,FILTER_SANITIZE_STRING);
         //password
         $password=trim($password);
         $password=filter_var($password,FILTER_SANITIZE_STRING);
         
         $codigo=rand();

         }
         





       }else
       {
           $errores.="Alguno de los campos esta vacio";
       }
     }else
     {
         $errores.="Acepta nuestras politicas";
     }


/*Si no encuentra errores quiere decir que todo esta bien y listo para  hacer la query*/
    if(!$errores)
     {
     
     //Preparamos  la Query
     $statement=$conexion->prepare("INSERT INTO users_data (username,password,email,server,code)VALUES (:username, :password,:email,:server,:code)");
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute(array(':username'=>$username,':password'=>$password,':email'=>$email,':server'=>$server,':code'=>$codigo));
           $result=$statement->fetch();
          
           $subject= $username."Pleace confirm  you email";
           $mesagge='           
           Confirm You Email
           Click the link below to verify you account
           http://www.tachoo.xyz/confirm.php?username='.$username.'&code='.$codigo;
           
          mail($email,$subject,$mesagge,"From: DoNotRePly@tachoo.xyz");

          $enviado.="Check your Email for validation url";
     
     }

}

}
//
//verificar si ya fue enlazada la cuenta
//
if(isset($_GET['validate']))
{
    if(!empty($_GET['validate']))
    {
      if($_GET['validate']!=0)
      {
         $confirm.="Correo validado";

      }
    }
}

//log in

if(isset($_POST['login']))
{
 if(!empty($_POST['login']))
 {

   //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $username=$_POST['email'];
   $password=$_POST['password'];
     
     //Tenemos algo pero no sabemos que es lo que tenemos... creo que es emomento de ver que es
     //estara vacio ?
     if(!empty($username))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $username=trim($username);
         $username=filter_var($username,FILTER_SANITIZE_EMAIL);
         if(!filter_var($username,FILTER_VALIDATE_EMAIL))
         {
             $errores.="Ingresa un correo valido <br\>";
         }
     
     }else
     {
         $errores.="";
     }
    
         if(!empty($password))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $password=trim($password);
         $password=filter_var($password,FILTER_SANITIZE_STRING);
     }else
     {
         $errores.=" Rellene todos los campos de el Formulario";
     }


/*Si no encuentra errores quiere decir que todo esta bien y listo para  hacer la query*/
    if(!$errores)
     {
     
     //Preparamos  la Query
     $statement=$conexion->prepare('SELECT id,username,validate FROM users_data WHERE password=:_password AND email=:_username OR username=:_username');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':_username'=>$username,':_password'=>$password) );

     $result=$statement->fetch();
     $name=$result['username'];
     
     //Debemos de ver si el arreglo es mayor a 0 de ser asi es que se lanzo la Query Bien y por consecuente si existe el correo en la base de datos

     if($result['validate']==1)
     {
      $enviado="Bienvenido De Nuevo Maestro.".$name; 
      $login==true;

     }else
     {
         $errores.="<br> User/password incorrect";
     }


     }

 } 
}


//Inportamos el test.php
require 'index.base.php';

?>