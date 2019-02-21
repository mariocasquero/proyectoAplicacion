<section>
    <div class="modelo clases animacion">
        <img src="doc/modelosAplicacion/190205_DiagramaClasesMarioCasquero.JPG">
        <p><?php echo DCLASES?></p>
    </div>
    
    <div class="modelo usos animacion">
        <img src="doc/modelosAplicacion/190205_CasosDeUsoMarioCasquero.JPG">
        <p><?php echo DCASOS?></p>
    </div>
        
    <div class="modelo navegacion animacion">
        <img src="doc/modelosAplicacion/190205_ArbolDeNavegacionMarioCasquero.jpg">
        <p><?php echo ANAVEGACION?></p>
    </div>
    
    <div class="modelo almacenamiento animacion">
        <img src="doc/modelosAplicacion/190206_EstructuraAlmacenamientoMarioCasquero.JPG">
        <p><?php echo EALMACENAMIENTO?></p>
    </div>
    
    <div class="modelo datos animacion">
        <img src="doc/modelosAplicacion/190203_ModeloFisicoDeDatosMarioCasquero.png">
        <p><?php echo MDATOS?></p>
    </div>
    
    <div class="modelo mapa animacion">
        <img src="doc/modelosAplicacion/190205_MapaWebMarioCasquero.jpg">
        <p><?php echo MAPAWEB?></p>
    </div>
</section>
<footer>
    <div class="nombre">
        <p>Mario Casquero Jáñez</p>
    </div>
    <div class="derecha">
        <p>
            <a href="doc/PHPdoc/index.html" target="_blank"><img src="webroot/media/phpdoc.png" id="phpdoc"> PHPDoc</a> 
        </p>
        <p>
            <a href="http://daw-usgit.sauces.local/mario.casjan/MCJProyectoAplicacion1819/tree/Aplicacion1819" target="_blank"><i class="fab fa-gitlab"></i><?php echo REPO?></a>
        </p>
        <p>
            <a href="doc/190211_canalRssMarioCasquero.xml"><i class="fas fa-rss-square"></i><?php echo SUBS?></a>
        </p>
    </div>
    
    <div class="centro">
        <p>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>"><input type="submit" name="tecnologias" id="tecnologias" value="<?php echo TUSADAS?>"></form>
        </p>
    </div>

    <div class="izquierda">
        <p>
        <a href="doc/EIE_CVMarioCasquero.pdf" target="_blank" id="enlacesPie1"><i class="far fa-file"></i> <?php echo CURRICULUM?></a>
        </p>
        <p>
            <a href="" id="enlacesPie2"><i class="fas fa-globe"></i> <?php echo WIMITADA?></a>
        </p>
        <p>
            <a href="doc/modelosAplicacion/190205_CatalogoRequisitosMarioCasquero.pdf" target="_blank"><i class="fas fa-clipboard-list"></i> <?php echo CREQUISITOS?></a>
        </p>
    </div>

</footer>