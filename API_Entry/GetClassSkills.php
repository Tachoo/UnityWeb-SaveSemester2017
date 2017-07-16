<?php
/*Hacemos la puerta de entrada para el uso con unity*/
require '../funciones.php';
//Hacemos que el php se conecte a la base de datos.
$conexion = conexion('u720179037_saves', 'u720179037_savea', 'yYjaa9iVQ8OD');
//Debemos de sacar los datos de el stack global
$ClassID;
if(isset($_POST['classname']))
{
    if(!empty($_POST['classname']))
    {
        $ClassName=$_POST['classname'];
        
    }
    else
    {
      //no quiero que se haga mal uso el script 
      die();
    }
}
if(isset($_GET['classname']))
{
    if(!empty($_GET['classname']))
    {
        $ClassName=$_GET['classname'];
        
    }
    else
    {
      //no quiero que se haga mal uso el script 
      die();
    }
}

if(!empty($ClassName))
{
    //debemos de encontrar el id dependiendo el nombre de la classe
$statement=$conexion->prepare('SELECT id FROM class WHERE nombre=:_ClassName');
$statement->execute( array(':_ClassName'=>$ClassName) );

$result=$statement->fetch();
 $ClassID=$result['id'];
 
     //Buscar los elementos que queremos para las habilidades
 $statement=$conexion->prepare('SELECT Skills.id,Skills.nombre,Skills.descripcion,elementos.nombre FROM Skills INNER JOIN elementos ON Skills.elemento_id = elementos.id JOIN class ON Skills.class_id=class.id WHERE class.id=:_classid LIMIT 4');
 $statement->execute( array(':_classid'=>$ClassID) );
 $result=$statement->fetchAll();


 foreach($result as $r)
   {
      //Debere de conocer cada columna para imprimirla por separado dandole una estructura;
            
              echo $r[0],";";//id
              echo $r[1],";";//Nombre de la Skill
              echo $r[2],";";//Description
              echo $r[3],";"; //elemento
            //   echo $r[4],";"; //classe
            //print_r($r);
   }
  

}
else
{

die();
}

?>