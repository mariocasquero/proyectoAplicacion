<?php    
    //Si el usuario es la primera vez que accede a la página se muestra un mensaje de bienvenida
    if($numAccesos==0){
        $mensaje=MENSPRIM;
    }
    //Si ya ha iniciado sesión más de una vez, se muestra el número de accesos y fecha y hora del último login
    else{
        $mensaje=MENSVIS.$numAccesos.MENSCON. strftime("%T, %e / %m / %Y", $fechaHora);
    }
?>

<div class="contenido">
    <div class="bienvenida1"><p id="mensaje01"><?php echo MENSBIEN?><?php echo $descripcion."!";?></p></div><div class="bienvenida2"><p id="mensaje02"><?php echo $mensaje;?></p></div>
</div>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" id="fInicio">
    <input type="submit" name="bSoap" id="bSoap" value="SOAP">
    <input type="submit" name="bRest" id="bRest" value="REST"><br><br>
    
    <input type="submit" name="mtoDepartamentos" id="mtoDepartamentos" value="<?php echo MDEPARTAMENTOS?>"><br><br>
    
    <input type="submit" name="editarPerfil" id="editarPerfil" value="<?php echo EPERFIL?>">
    <?php
        if($_SESSION["usuario"]->getPerfil()=="administrador"){
            ?>
                <br><br><input type="submit" name="mtoUsuarios" id="mtoUsuarios" value="<?php echo MTOUSUARIOS?>">
            <?php
        }
    ?>
</form>

<div class="pie">
    <p>
        <a href="doc/EIE_CVMarioCasquero.pdf" target="_blank" id="enlacesPie1"><i class="far fa-file"></i> <?php echo CURRICULUM?></a>
        <a href="http://www.gogoro.com" id="enlacesPie2"><i class="fas fa-globe"></i> <?php echo WIMITADA?></a>
        <a href="doc/modelosAplicacion/190205_CatalogoRequisitosMarioCasquero.pdf" target="_blank"><i class="fas fa-clipboard-list"></i> <?php echo CREQUISITOS?></a>
        
        <p>Mario Casquero Jáñez</p>
        
        <a href="doc/PHPdoc/index.html" target="_blank"><img src="webroot/media/phpdoc.png" id="phpdoc"> PHPDoc</a> 
        <a href="http://daw-usgit.sauces.local/mario.casjan/MCJProyectoAplicacion1819/tree/Aplicacion1819" target="_blank"><i class="fab fa-gitlab"></i><?php echo REPO?></a>
        <a href="doc/190211_canalRssMarioCasquero.xml"><i class="fas fa-rss-square"></i><?php echo SUBS?></a>
    </p>
</div>