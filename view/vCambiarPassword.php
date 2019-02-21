<form method="post" action="<?php $_SERVER["PHP_SELF"]?>" id="fPassword">
    <fieldset>
        <legend><?php echo CPASSWORD?></legend>
        
        <label><?php echo PVIEJO?></label>
        <input type="password" name="passwordViejo" id="passwordViejo" size="25"><br><br>
        <label class="errores"><?php echo $aErrores["passwordViejo"];?></label><br>
        
        <label><?php echo PNUEVO?></label>
        <input type="password" name="passwordNuevo" id="passwordNuevo" size="25"><br><br>
        <label class="errores"><?php echo $aErrores["passwordNuevo"];?></label><br>
        
        <label><?php echo PREPE?></label>
        <input type="password" name="passwordRepetido" id="passwordRepetido" size="25"><br><br>
        <label class="errores"><?php echo $aErrores["passwordRepetido"];?></label><br>
        
        <input type="submit" name="cambiarPass" id="cambiarPass" value="<?php echo CAMBIAR?>">
        <input type="submit" name="cancelarPass" id="cancelarPass" value="<?php echo CANCELAR?>">
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