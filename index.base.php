<html>
    <head>
        
      <link rel="stylesheet" type="text/css" href="css/BaseStruct.css">
      <link rel="stylesheet" type="text/css" href="CSS/Register.css">
    </head>
    <body>
        <div id="warper">
             
             <div id="top">

             <div class="posfix" id="nav">
  
             <div class="infoslogan">
                 <h1>SaveSemesterRPG2017</h1>
             </div>
  <!--Menu-->
             <ul id="navbar">
                 <li id="home"><a href="#"> Home</a></li><!--Home-->
                 <li id="register"><a href="#"> Register</a></li><!--Register-->
                 <li id="login"><a href="#" >LogIn</a></li><!--LogIn-->
             </ul>

             </div>
             </div>
             <!---->

             <div class="posfix" id="content">
                        
            <div id="formcontainer">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="Formulario">
                 <!--Email-->
                 <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if(!$enviado && isset($user)){echo $user;} ?>">
                 <!--Password-->
                 <input type="password" class="form-control" name="password" placeholder="password" value="">
                 <!--Elementos Dinamicos-->
                 <?php if(!empty($errores)): ?>
                 <div class="alert error"><?php echo $errores;?></div>
                 <?php elseif($enviado):?>
                 <?php
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        
                ?>
                 <div class="alert success"><?php ob_start();  header("refresh: 3; url = acc.index.php"); echo $enviado; ob_end_flush(); ?></div>
                <?php endif;?>
                 <input type="submit" name="submit" class="submit" value="Acceder">
            </form>
            </div>

             </div>
             <!---->
             <div id="bot">
             <div class="posfix" id="footer">
                  
                  <div id="support">
                   <div class="posfix" id="ulfix">
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
                  
                  <div id="semanario">
                       <div class="posfix" id="semanariowarp">
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