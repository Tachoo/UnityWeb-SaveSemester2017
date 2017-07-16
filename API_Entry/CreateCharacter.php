<?php
/*Hacemos la puerta de entrada para el uso con unity*/
require '../funciones.php';
//Hacemos que el php se conecte a la base de datos.
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
//Debemos de sacar los datos de el stack global
       $userID=$_POST['id'];
       $charactername=$_POST['name'];
       $class=$_POST['class'];
       $gender=$_POST['gender'];
       $season=$_POST['season'];
       $hardcore=$_POST['hardcore'];
       $gold=60000;
       $perlas=3000;
       $lvl=1;
       $exp=0;
       $clanid=0;


if(!empty($userID))
{


 $statement=$conexion->prepare('INSERT INTO characters (user_id, nombre, oro, perlas, level, exp,classe_id, gender, season, hardcore) VALUES (:_userid, :_charname,:_gold,:_perlas,:_lvl,:exp,:_class,:_gender,:_season,:_hardcore)');
$statement->execute(array(':_userid'=>$userID, ':_charname'=>$charactername,':_gold'=>$gold,':_perlas'=>$perlas,':_lvl'=>$lvl,':exp'=>$exp,':_class'=>$class,':_gender'=>$gender,':_season'=>$season,':_hardcore'=>$hardcore));
          

 echo"ok";

}
else
{

die();
}

?>