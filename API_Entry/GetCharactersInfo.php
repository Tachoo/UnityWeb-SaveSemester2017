<?php
/*Hacemos la puerta de entrada para el uso con unity*/
require '../funciones.php';
//Hacemos que el php se conecte a la base de datos.
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
//Debemos de sacar los datos de el stack global

if(isset($_POST['id']))
{
    if(!empty($_POST['id']))
    {
        $userID=$_POST['id'];
        
    }
    else
    {
      //no quiero que se haga mal uso el script 
      die();
    }
}
if(isset($_GET['id']))
{
    if(!empty($_GET['id']))
    {
        $userID=$_GET['id'];
        
    }
    else
    {
      //no quiero que se haga mal uso el script 
      die();
    }
}

if(!empty($userID))
{
$statement=$conexion->prepare('SELECT characters.id,characters.nombre,class.nombre,characters.level,clan.nombre FROM clan INNER JOIN characters ON clan.id = characters.clan_id JOIN users_data ON characters.user_id=users_data.id JOIN class ON class.id=characters.classe_id WHERE users_data.id=:_userid LIMIT 7');
$statement->execute( array(':_userid'=>$userID) );

$result=$statement->fetchAll();

foreach($result as $r)
  {
      //Debere de conocer cada columna para imprimirla por separado dandole una estructura;
            
            echo $r[0],";";//id

            echo $r[1],";";//Nombre
            echo $r[2],";";//classe
            echo $r[3],";"; //nivel
            echo $r[4],";"; //clan
            // print_r($r);
  }
  

}
else
{

die();
}

?>