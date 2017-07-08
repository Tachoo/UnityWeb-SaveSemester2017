
<!DOCTYPE html>
<html>
    <head>
        
      <link rel="stylesheet" type="text/css" href="CSS/BaseStruct.css">
      <link rel="stylesheet" type="text/css" href="CSS/Register.css">
    </head>
    <body>
        <div id="warper">
             
             <div id="top">

             <div class="posfix" id="nav">
  
             <div class="infoslogan">
                 <a href="index.php?page=1"><h1>SaveSemesterRPG2017</h1></a>
             </div>
  <!--Menu-->
             <ul id="navbar">
                 <li id="home"><a href="index.php?page=1"> Home</a></li><!--Home-->
                 <li id="register"><a href="index.php?page=2"> Register</a></li><!--Register-->
                 <li id="login"><a href="index.php?page=3" >LogIn</a></li><!--LogIn-->
             </ul>

             </div>
             </div>
             <!---->

             <div class="posfix" id="content">
<?php
        if(isset($_GET['page']))
          {
              if(!empty($_GET['page']))
              {
                  switch ($_GET['page']) {
                      case 1:
                      //home
                      require 'index.home.php';
                          break;
                      case 2:
                      //register
                      require 'index.register.php';
                          break;
                      case 3:
                      require 'index.login.php';
                      //login                     
                break;
                      default:
                          require 'index.home.php';
                          break;
                  }
              }
          }            
?>       
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