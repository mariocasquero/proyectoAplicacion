<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <fieldset>
        <legend>Servicio REST propio</legend>
        
        <label>Seleccione Departamento</label>
        <select name="departamentos">
            <option value="MAT">MAT</option>
            <option value="MAT">MEC</option>
            <option value="MAT">MUS</option>
        </select>
        <input type="submit" name="aceptarRest" id="aceptarRest" value="Aceptar">
        <input type="submit" name="cancelarRest" id="cancelarRest" value="Cancelar">        
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