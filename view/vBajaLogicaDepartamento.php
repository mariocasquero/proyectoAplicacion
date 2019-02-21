<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" id="fBajaLogica">
    <fieldset>
        <legend><?php echo BAJADEP?></legend>
        
        <label><?php echo CODDEP?></label>
        <input type="text" name="codDepartamento" id="codDepartamento" value="<?php echo $departamento->getCodDepartamento();?>" size="30" disabled><br><br>

        <label><?php echo DESCRIPCIONDEP?></label>
        <input type="text" name="descDepartamento" id="descDepartamento" value="<?php echo $departamento->getDescDepartamento();?>" size="30" disabled><br><br>
        
        <label><?php echo FECHABAJA?></label>
        <input type="text" name="fechaBaja" id="fechaBaja" value="<?php echo $fechaBaja->format("d-m-Y")?>" size="30"><br><br>
        <label class="errores"><?php echo $aErrores["fechaBaja"];?></label><br>
        
        <input type="submit" name="bajaDep" id="bajaDep" value="<?php echo DARBAJA?>">
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