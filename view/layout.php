<?php
    //Si el usuario ha iniciado sesión se cargará la vista de inicio
    if(isset($_SESSION["usuario"])){
        $vista=$vistas["inicio"]; //Se almacena la vista de inicio en la variable
    }
    //Si no ha iniciado sesión se cargará la vista del login
    else{
        $vista=$vistas["login"]; //Se almacena la vista de login en la variable
    }
    //Si el usuario ha accedido a alguna ventana, se cargará la vista correspondiente
    if(isset($_SESSION["pagina"])){
        $vista=$vistas[$_SESSION["pagina"]]; //Se almacena la vista de la ventana en la variable
    }
?>

<html>
    <head>
        <title>MCJ Aplicacion1819</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <script src="webroot/jQuery/jquery-3.3.1.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>
    
    <body onload="ocultar()">
        <header>
            <a href="?idioma=es"><img src="webroot/media/spain.png"></a>
            <a href="?idioma=en"><img src="webroot/media/usa.png" id="segunda"></a>
            <h1><?php echo PAPLICACION?></h1>
            <?php
                if(!isset($_SESSION["usuario"])){
                    if($vista=="view/vRegistro.php" || $vista=="view/vTecnologiasUtilizadas.php"){
                         ?>
                            <div class="sesion">
                                <i class="fas fa-user"></i>
                                <p style="width: 160px; margin-left: -30px"><?php echo ISESION?></p>
                            </div>
                        <?php
                    }
                    else{
                    ?>  
                    <div class="sesion">
                        <i class="fas fa-user"></i>
                        <p><?php echo ISESION?></p>

                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="fLogin">
                            <fieldset>
                                <legend>Log in</legend>
                                    <label class="campos"><?php echo CUSUARIO?> </label>
                                    <input type="text" name="usuario" id="usuario" size="12.5"><br>
                                    <label class="errores"><?php echo $aErrores["usuario"];?></label><br>

                                    <label class="campos">Password </label>
                                    <input type="password" name="password" id="password" size="12.5"><br>
                                    <label class="errores"><?php echo $aErrores["password"];?></label><br>

                                    <input type="submit" name="acceder" id="acceder" value="<?php echo ISESION?>">
                                    <input type="submit" name="registrarse" id="registrarse" value="<?php echo REGISTRARSE?>">
                            </fieldset>
                        </form> 
                    </div>
                <?php
                    }
                }
                else{
                    
                    $mensaje=$_SESSION["usuario"]->getDescUsuario();
                    $_SESSION["mensajeLogin"]=$mensaje;
                    ?>
                        <div class="sesion">
                            <i class="fas fa-user"></i>
                            <p style="width: 160px; margin-left: -40px"><?php echo $_SESSION["mensajeLogin"]?></p>
                            <div id="botonSalir">
                                <form action="<?php echo $_SERVER["PHP_SELF"]?>" meethod="post">
                                    <input type="submit" name="salir" id="salir" value="<?php echo SALIR?>">
                                </form>
                            </div>
                        </div>
                    <?php
                }
            ?>    
        </header>
            
        <?php
            require_once $vista; //Se carga la vista
        ?>
    </body>
</html>
<script>    
    $(window).scroll(function() {
            $(".modelo").each(function(){
            var imagePos = $(this).offset().top;

            var topOfWindow = $(window).scrollTop();
                    if (imagePos < topOfWindow+500) {
                            $(this).addClass("animacion");
                    }
            });
    });
</script>