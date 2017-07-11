<?php
/*Hacemos la puerta de entrada para el uso con unity*/
require '../funciones.php';
//Hacemos que el php se conecte a la base de datos.
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
//Debemos de sacar los datos de el stack global
if(isset($_POST['user']))
{
    if(!empty($_POST['user']))
    {
        $Usuario=$_POST['user'];
        $_Usuario=$Usuario;
    }
    else
    {
      //no quiero que se haga mal uso el script 
      die();
    }
}
//
if(isset($_POST['pass']))
{
    if(!empty($_POST['pass']))
    {
        $password=$_POST['pass'];
    }
    else
    {
      //no quiero que se haga mal uso el script 
      die();
    }
}
if(!empty($Usuario)&&!empty($password))
{

$statement=$conexion->prepare('SELECT id,email,username,premium,password,server,rango,online,validate FROM users_data WHERE email=:_email OR username=:_username AND password=:_password');
$statement->execute( array(':_password'=>$password,':_email'=>$Usuario,':_username'=>$_Usuario) );
$statement->setFetchMode(PDO::FETCH_ASSOC);
$result=$statement->fetchAll();

//Si la Query tiene algo significa que el incio de session fue Exitoso.
if(!empty($result))
{
  
    foreach($result as $r)
            {
      //Debere de conocer cada columna para imprimirla por separado dandole una estructura;
            echo $r['id'],";";
            echo $r['email'],";";
            echo $r['username'],";";
            echo $r['premium'],";";
            echo $r['password'],";";
            echo $r['server'],";";
            echo $r['rango'],";";
            echo $r['online'],";";
            echo $r['validate'];          
            }

$UserID=$r['id'];
$Value=1; //Estamos conectados
// Modificar el campo de online a verdadero  para inciar que esta conectado.
$statement=$conexion->prepare('UPDATE users_data SET online =:_value  WHERE users_data.id =:_id ');
$statement->execute( array(':_value'=>$Value,':_id'=>$UserID));
//Terminamos el flujo de datos

  
}else
{
    echo"El nombre de usuario o la contraseña son incorrectos|Intenta iniciar secion de nuevo";
}


}
else
{
    die();
}


?>