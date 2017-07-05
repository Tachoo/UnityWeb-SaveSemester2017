<?php


//Punto de Acceso
try
{                   /*         10.1.2.121        u720179037_3exam u720179037_ana  SergioAnastacio20*/
                    /*         127.0.0.1        db_web_4_test        root                         */
 $conexion=new PDO('mysql:host=127.0.0.1;dbname=savesemester','root','');

}catch(PDOException $e)
{
echo "Error:".$e->getMessage();
}

$id="";
$name="";
$errores="";
$enviado="";
$login=false;
//Primero veo si  la variable en post de submit existe 
// digamos que es para validar desde este mismo php los datos antes de enviar a otro php

if(isset($_POST['submit']))
{
    //Si se envio el formulario entonces
    // vamos a guardarlo en una variable tipo post para que no sea privada
   $user=$_POST['email'];
   $password=$_POST['password'];
     
     //Tenemos algo pero no sabemos que es lo que tenemos... creo que es emomento de ver que es
     //estara vacio ?
     if(!empty($user))
     {
         //Pues ya sabemos que no esta vacio  es momento de limpear lo que tenga adentro
         $user=trim($user);
         $user=filter_var($user,FILTER_SANITIZE_EMAIL);
         if(!filter_var($user,FILTER_VALIDATE_EMAIL))
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
     echo"ok";
     //Preparamos  la Query
     $statement=$conexion->prepare('SELECT id,username,email,premium FROM users_data WHERE email=:_username OR username=:_username');
     //lanzamos la Query con el valor obtenido del formulario ( correo y contrase;a)
     $statement->execute( array(':_username'=>$user) );

     $result=$statement->fetch();
     //Debemos de ver si el arreglo es mayor a 0 de ser asi es que se lanzo la Query Bien y por consecuente si existe el correo en la base de datos

     if($result>0)
     {
     $enviado="Bienvenido De Nuevo Maestro.".$name; 
     $login==true;

     }else
     {
         $errores.="<br> User/password incorrect";
     }


     } 
}

//Inportamos el test.php
require 'index.base.php';

?>