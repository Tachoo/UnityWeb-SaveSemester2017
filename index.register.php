<div id="formcontainer">
            <form action="index.php?page=2" method="POST" id="Formulario" style="border-top: 4px solid green;" >
                 <!--Email-->
                 <input type="text" class="form-control" name="username" placeholder="Username" value="">

                 <input type="text" class="form-control" name="email" placeholder="Email" value="">
                 <!--Password-->
                 <input type="password" class="form-control" name="password" placeholder="password" value="">
                 <!--Server-->
                 <label>Server</label>
                 <select name="server">
                    <option value="LAN">LatinoAmerica Norte</option>
                    <option value="LAS">LatinoAmerica Sur</option>
                    <option value="USA">Estados Unidos de America</option>
                 </select>
                 <br>
                 <!--Elementos Dinamicos-->
                 <?php if(!empty($errores)): ?>
                 <div class="alert error"><?php echo $errores;?></div>
                 <?php elseif($enviado):?>
                 
                 <div class="alert success"><?php ob_start();  header("refresh: 5; url = index.php?page=3"); echo $enviado; ob_end_flush(); ?></div>
                <?php endif;?>
                <input type="radio" name="politicas" value="ok" check >Politicas y etc...<br>
                 <input type="submit" name="register" class="submit" value="Registrate">
            </form>
</div>