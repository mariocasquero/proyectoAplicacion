<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="fRegistro">
    <fieldset>
        <legend><?php echo REGISTRARSE?></legend>

        <label><?php echo CUSUARIO?></label>
        <input type="text" name="usuarioR" id="usuarioR" size="35" value="<?php echo $_REQUEST["usuarioR"]?>"><br><br>
        <label class="errores"><?php echo $aErrores["usuarioR"];?></label><br>

        <label><?php echo DESC?></label>
        <input type="text" name="descripcion" id="descripcionR" size="35" value="<?php echo $_REQUEST["descripcion"]?>"><br><br>
        <label class="errores"><?php echo $aErrores["descripcion"];?></label><br>

        <label>Password </label>
        <input type="password" name="passwordR" id="passwordR" size="35" value="<?php echo $_REQUEST["passwordR"]?>"><br><br>
        <label class="errores"><?php echo $aErrores["passwordR"];?></label><br>

        <input type="submit" name="aceptar" id="aceptar" value="<?php echo ACEP?>">
        <input type="submit" name="cancelar" id="cancelar" value="<?php echo CANCELAR?>">
    </fieldset>
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