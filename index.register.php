<div id="formcontainer">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="Formulariol" >
                 <!--Email-->
                 <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if(!$enviado && isset($user)){echo $user;} ?>">
                 <!--Password-->
                 <input type="password" class="form-control" name="password" placeholder="password" value="">
                 <!--Elementos Dinamicos-->
                 <?php if(!empty($errores)): ?>
                 <div class="alert error"><?php echo $errores;?></div>
                 <?php elseif($enviado):?>
                 <?php
                       
                        $_SESSION['id'] = $result['id'];
                        
                ?>
                 <div class="alert success"><?php ob_start();  header("refresh: 3; url = index.php?page=3"); echo $enviado; ob_end_flush(); ?></div>
                <?php endif;?>
                 <input type="submit" name="register" class="submit" value="Registrate">
            </form>
</div>