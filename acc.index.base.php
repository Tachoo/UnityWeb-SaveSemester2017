<html>
    <head>
        
      <link rel="stylesheet" type="text/css" href="css/BaseStruct.css">
      <link rel="stylesheet" type="text/css" href="CSS/BaseAcc.css">
    </head>
    <body>
        <div id="warper">
             
             <div id="top">

             <div class="posfix" id="nav">
  
             <div class="infoslogan">
                 <h1>SaveSemesterRPG2017</h1>
             </div>
  <!--Menu-->
            <div id="Contenedor">
                 <ul id="navbar">
                  <li id="home"><a href="#"> Home</a></li><!--Home-->
                  <li id="register"><a href="#"> Register</a></li><!--Register-->
                  <li id="login"><a href="#" >LogIn</a></li><!--LogIn-->
                </ul>
            
                <div id="Dinamic">
                     <div class="posfix" id="DinamicSection">
                         <p><?php echo '<strong>Username : </strong>'.$_SESSION['user']?></p>
                         <span style="width:5px;"></span>
                         <p><?php echo '<strong>Premium : </strong>'.$_SESSION['premium']?></p>
                         <span style="width:20px;"></span>
                         <span style="width:5px; border-left:2px solid #fff;"></span>
                         <a href="acc.index.php?logout=kjsdjkf">logout</a>
                         
                    </div>
                </div>
            </div>

             </div>
             </div>
             <!---->

             <div class="posfix" id="content">

                <div id="warpcontent">
                     
                   <div id="warpIz">

                   </div>
                   <div id="warpDr">
                       
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