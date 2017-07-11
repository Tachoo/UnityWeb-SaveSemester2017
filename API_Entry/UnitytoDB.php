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

$statement=$conexion->prepare('SELECT id FROM users_data WHERE password=:_password AND email=:_email OR username=:_username');
$statement->execute( array(':_password'=>$password,':_email'=>$Usuario,':_username'=>$_Usuario) );
$statement->setFetchMode(PDO::FETCH_ASSOC);
$result=$statement->fetchAll();

foreach($result as $r)
  {
      //Debere de conocer cada columna para imprimirla por separado dandole una estructura;
            echo $r['id'].";",;
  }

}
else
{
    die();
}


?>