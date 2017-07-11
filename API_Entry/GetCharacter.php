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

if(!empty($userID))
{
$statement=$conexion->prepare('SELECT characters.id,characters.nombre,characters.level FROM characters JOIN users_data ON characters.user_id = users_data.id WHERE users_data.id=:_userid');
$statement->execute( array(':_userid'=>$userID) );
$statement->setFetchMode(PDO::FETCH_ASSOC);
$result=$statement->fetchAll();

foreach($result as $r)
  {
      //Debere de conocer cada columna para imprimirla por separado dandole una estructura;
           
            echo $r['id'],";";
            echo $r['nombre'],";";
            echo $r['level'];
            
  }
  /*Hacer la query de todos los personajes que estan en un clan y haci retornar los en un array diferente*/

}
else
{
    die();
}


?>