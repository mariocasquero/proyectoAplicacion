<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="fBorrar">
    <fieldset>
        <legend><?php echo BUSUARIO?></legend>
        
        <label><?php echo CUSUARIO?> </label>
        <input type="text" name="usuarioB" id="usuarioB" value="<?php echo $_SESSION["usuario"]->getCodUsuario()?>" disabled size="30"><br><br><br>

        <label><?php echo DUSUARIO?></label>
        <input type="text" name="descripcionB" id="descripcionB" value="<?php echo $_SESSION["usuario"]->getDescUsuario()?>" disabled size="30"><br><br><br>

        <input type="submit" name="borrarU" id="borrarU" value="<?php echo BUSUARIO?>">
        <input type="submit" name="cancelarU" id="cancelarU" value="<?php echo CANCELAR?>">
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