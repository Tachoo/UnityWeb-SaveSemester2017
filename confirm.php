<?php
/*Se supone que nos dan dos variables por get*/
//Solo devemos de hacer la conexion y solo mover el  parametro de validar.

require'funciones.php';
//Conectamos
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
//verificamos la conexion
         if(!$conexion)
         {
             die();
         }
//Hacemos el casteo de  datos esenciales para el funcionamiento del php
$_username=trim($_GET['username']);
$_username=filter_var($_username,FILTER_SANITIZE_STRING);
//
$_code=trim($_GET['code']);
$_code=filter_var($_code,FILTER_SANITIZE_STRING);
//Casting por si acaso
$username=(string)$_username;
$code= (int)$_code;
$value=1;
/*
*por si acaso que ya esta validado la cuenta deberia de saltarme todo esto
*/
      $statement=$conexion->prepare('SELECT validate FROM users_data WHERE(username=:username)AND code =:code');
      //lanzamos la Query  con los valores de usuario y codigo unico
      $statement->execute(array(':username'=>$username,':code'=>$code));
      $result=$statement->fetch();

      if($result['validate']!=0)
       {
    //Si entramos a qui entonces  solo vamos a mandarlo a la pagina de log in
  
   header('refresh: 0; url = index.php?page=3&validate=1');
      
       }
       else
       {
      //Preparamos  la Query
     $statement=$conexion->prepare('UPDATE users_data SET validate=:value WHERE(username=:username)AND code =:code');
     //lanzamos la Query  con los valores de usuario y codigo unico
      $statement->execute(array(':value'=>$value,':username'=>$username,':code'=>$code));
    
       header('refresh: 0; url = index.php?page=3');
       }

?>