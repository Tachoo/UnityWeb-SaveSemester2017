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
//Solo para el registro que funcione correctamente sin que se repita el usuario ni el email.
 // no queremos que existan multiples instancias de correo o de usuario. 
$validate_user="";
$validate_email="";



//Primero veo si  la variable en post de submit existe 
// digamos que es para validar desde este mismo php los datos antes de enviar a otro php


/*TO DO  : Limitar el numero de personas que tengan el mismo nombre a 1 (Solo uno puede llamarse asi )*/
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
             $errores.="<br> Ingresa un correo valido ";
         }else
         {
             //ya que tenemos  limpio deberiamos de  rellenar los restantes
         //usuario
         $username=trim($username);
         $username=filter_var($username,FILTER_SANITIZE_STRING);
         //password
         $password=trim($password);
         $password=filter_var($password,FILTER_SANITIZE_STRING);
         
        
          
          /*Checkar que el nombre no este siendo usado*/
         $statement=$conexion->prepare('SELECT username FROM users_data WHERE username=:_username');          
         $statement->execute( array(':_username'=>$username) );
         $result=$statement->fetch();
         if($result>0)
         {
           //mandamos a llamar la variable de erorres
           $validate_user=$username;
           $errores.="<br> El nombre de usuario: ".$validate_user." ya ha sido vinculada a una cuenta existente lo sentimos :C";
           
         }

         /*Ahora veamos si el correo es el mismo.  no queremos que existan dos correos iguales o si ? ????. */
          /*Checkar que el email no este siendo usado*/
         $statement=$conexion->prepare('SELECT email FROM users_data WHERE email=:_email');          
         $statement->execute( array(':_email'=>$email) );
         $result=$statement->fetch();
         if($result>0)
         {
           //mandamos a llamar la variable de erorres
            $validate_user=$email;
           $errores.="<br> La cuenta de correo ya ha sido vinculada a una cuenta existente lo sentimos :C";
         }




//Seguimos con el flujo de datos;

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
         //Hacemos la instancia de el codigo cuando estemos ya por  hacer el Insert
      $codigo=rand(); /*--> Creo que es lo mejor para no estar instanceando multiples veces la variable*/

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
         $_username=trim($username);
         $_username=filter_var($username,FILTER_SANITIZE_STRING);

         $username=trim($username);
         $username=filter_var($username,FILTER_SANITIZE_EMAIL);
        //  if(!filter_var($username,FILTER_VALIDATE_EMAIL))
        //  {
        //      $errores.="Ingresa un correo valido <br\>";
        //  }
     
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
     /*CHecamos si la cuenta ya ha fue validada*/
     $statement=$conexion->prepare('SELECT validate FROM users_data WHERE email=:username OR username=:_username');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':username'=>$username,':_username'=>$_username) );
    $result=$statement->fetch();
     $validate=$result['validate'];
     /*Ahora solo debemos de sacar el valor de validate*/
     if($validate!=0)
     {
        /*Ahora debemos de ver si las credenciales son correctas*/

     //Preparamos  la Query
     $statement=$conexion->prepare('SELECT id,username FROM users_data WHERE password=:_password AND email=:username OR username=:_username');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':username'=>$username,':_username'=>$_username,':_password'=>$password) );

     $result=$statement->fetch();
     $name=$result['username'];
     
     //Debemos de ver si el arreglo es mayor a 0 de ser asi es que se lanzo la Query Bien y por consecuente si existe el correo en la base de datos

     if($result>0)
     {
      $enviado="Bienvenido De Nuevo Maestro.".$name; 
      $login==true;

     }else
     {
         $errores.="<br> User/password incorrect";
     }

     }else
     {
          $errores.="<br> Falta validad su correo electronico";
     }

     


     }

 } 
}


//Inportamos el test.php
require 'index.base.php';

?>
