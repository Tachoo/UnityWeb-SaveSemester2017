<html>
    <head>
      <link rel="stylesheet" type="text/css" href="CSS/Register.css">  
      <link rel="stylesheet" type="text/css" href="CSS/BaseStruct.css">
      <link rel="stylesheet" type="text/css" href="CSS/BaseAcc.css">
    </head>
    <body>
        
        
        <div id="warper">
             <?php if(!empty($_GET['change'])): ?>
                <div id="elementosemergentes">
                <div id="MidScreen">
                 <form action=" acc.index.php?page=2<?php echo'&change='.$_GET['change']?>" method="POST" id="Formulario">
                      <!--Email-->
                      <input type="text" class="form-control" name="old" placeholder="old" value="">
                       <!--Password-->
                      <input type="text" class="form-control" name="new" placeholder="new" value="">
                       <!--Elementos Dinamicos-->
                       <?php if(!empty($errores)): ?>
                       <div class="alert error"><?php echo $errores;?></div>
                       <?php elseif($enviado):?>
                       <div class="alert success"><?php ob_start(); header("refresh: 2; url = acc.index.php?page=2"); echo $enviado; ob_end_flush(); ?></div>
                      <?php endif;?>
                      <input type="submit" name="submit" class="submit" value="Change ">
                      <input type="submit" name="cancel" class="submit" value="Cancel ">
                 </form>
                </div>
                 </div>
                 <?php elseif(empty($_GET['change'])):?>
                 
                <?php endif;?>
             <div id="top">

             <div class="posfix" id="nav">
  
             <div class="infoslogan">
                 <h1>SaveSemesterRPG2017</h1>
             </div>
  <!--Menu-->
            <div id="Contenedor">
                 <ul id="navbar">
                  <li id="home"><a href="acc.index.php?page=1">Acount profile</a></li><!--Home-->
                  <li id="register"><a href="acc.index.php?page=2">Acount Settings</a></li><!--Register-->
                  <li id="login"><a href="acc.index.php?page=3" >LogOut</a></li><!--LogIn-->
                </ul>
            
                <div id="Dinamic">
                     <div class="posfix" id="DinamicSection">
                         <p><?php echo '<strong>Account Name : </strong>'.$result['username']?></p>
                         <span style="width:5px;"></span>
                         <p><?php echo '<strong>Premium : </strong>'.$result['premium'].' days left'?></p>
                         <span style="width:20px;"></span>
                         
                         
                    </div>
                </div>
            </div>

             </div>
             </div>
             <!---->

             <div class="posfix" id="content">

                <div id="warpcontent">
                     
                   <div id="warpIz">
                        <?php
                        for ($i=0; $i < 3; $i++)
                        { 
                            $inc=1+$i;
                            echo'<div class="opciones">
                            <a href="'.$ChangeLinks.$inc.'"><p><strong>'.$opciones[$i].'</strong></p></a>
                        </div>   ';
                        }
                        ?>
                   </div>
                   <div id="warpDr">
                        <?php
                        for ($i=0; $i <3; $i++) { 
                           echo '<div id="contenido">
                            <div id="FOne"><P>'.$Labels[$i].'</P></div>
                            <div id="SOne"><P>'.$Detalles[$i].'</P><span style="width:10px;"></span><P class="showmore"> <a href="#">'.$Additionaltext.'</a></P></div>
                        </div>';
                        }
                        
                        ?>
                   </div>



                 </div>        
                

             </div>
             <!---->
             <div id="bot">
             <div class="posfix" id="footer">
                  
                  <div id="support" >
                   <div class="posfix" id="ulfix" style="display:none">
                       <ul id="internallinks">
                           <li>Carrers</li>
                           <li>Manifesto</li>
                           <li>Awards</li>
                           <li>World</li>
                       </ul>
                   </div>
                  </div>
                  
                  <div id="socialmedia">
                   <div class="posfix" id="socialimg">
                   <div class="smedia"><figure><img src="img/socialmedia/facebook.png"></figure></div><!--Facebook-->
                   <div class="smedia"><figure><img src="img/socialmedia/twitter.png"></figure></div><!--Twitter-->
                   <div class="smedia"><figure><img src="img/socialmedia/twitch.png"></figure></div><!--Twitch-->
                   <div class="smedia"><figure><img src="img/socialmedia/instagram.png"></figure></div><!--Instagram-->
                   </div>
                  </div>
                  
                  <div id="semanario" >
                       <div class="posfix" id="semanariowarp" style="display:none">
                           <h3>Noticiero Semanal</h3>
                           <dd>Subscribete al noticierosemanal para estar al tanto de las novedades del juego.<br>es<strong> Gratis!</strong></dd>
                           <form>
                               <input type="email" name="correo">
                               <input type="submit" name="submit" value="submit" >
                           </form>
                       </div>
                  </div>
                  
             </div>
             </div>
        </div>
    </body>
</html>