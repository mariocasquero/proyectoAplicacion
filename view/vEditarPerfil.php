<?php
    $aErrores=[
        "descripcionE"=>NULL
    ];
?>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="fEdicion">
    <fieldset>
        <legend><?php echo EPERFIL?></legend>
        
        <label><?php echo CUSUARIO?> </label>
        <input type="text" name="usuarioE" id="usuarioE" value="<?php echo $_SESSION["usuario"]->getCodUsuario();?>" size="35" disabled><br><br><br>
        
        <label>Password</label>
        <input type="password" name="passwordE" id="passwordE" value="<?php echo $_SESSION["usuario"]->getPassword();?>" size="35" disabled><br><br><br>
        
        <label><?php echo DUSUARIO?> </label>
        <input type="text" name="descripcionE" id="descripcionE" value="<?php echo $_SESSION["usuario"]->getDescUsuario();?>" size="35"><br><br>
        <label class="errores"><?php echo $aErrores["descripcionE"];?></label><br><br>
        
        <input type="submit" name="aceptarE" id="aceptarE" value="<?php echo CAMBIAR?>">
        <input type="submit" name="cancelarE" id="cancelarE" value="<?php echo CANCELAR?>">
    </fieldset>
</form>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" class="field2">
    <h2><?php echo OPCIONES?></h2>
    <input type="submit" name="cPassword" id="cPassword" value="<?php echo CPASSWORD?>">
    <input type="submit" name="bUsuario" id="bUsuario" value="<?php echo BUSUARIO?>">
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