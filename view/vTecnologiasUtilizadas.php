<div class="tecno">
    
    <div class="php tec">
        <a href="http://www.php.net" target="_blank">
            <p>PHP</p>
            <div class="inf">
                Lenguaje de programación del lado del servidor, originalmente diseñado para el desarrollo web de contenido dinámico.
            </div>
        </a>
    </div>
    
    <div class="javascript tec">
        <a href="http://www.javascript.com" target="_blank">
            <p>JavaScript</p>
            <div class="inf">
                Lenguaje de programación interpretado, sigue el estándar ECMAScript. Se define como orientado a objetos y ​basado en prototipos
            </div>
        </a>
    </div>
    
    <div class="html tec">
        <a href="https://www.w3schools.com/html/html5_intro.asp" target="_blank">
            <p>HTML5</p>
            <div class="inf">
                 Quinta versión del lenguaje de marcado para la elaboración de páginas web. 
            </div>
        </a>
    </div>
    
    <div class="css tec">
        <a href="https://www.w3schools.com/css/" target="_blank">
            <p>CSS3</p>
            <div class="inf">
                Lenguaje de diseño gráfico para definir y crear la presentación de un documento estructurado escrito en un lenguaje de marcado.
            </div>
        </a>
    </div>
    
    <div class="apache tec">
        <a href="https://httpd.apache.org/" target="_blank">
            <p>Apache HTTP</p>
            <div class="inf">
                Servidor web HTTP de código abierto, es el más utilizado hasta la actualidad. Utilizado por Adobe, Paypal y Apple
            </div>
        </a>
    </div>
    
    <div class="mysql tec">
        <a href="https://www.mysql.com/" target="_blank">
            <p>MySQL</p>
            <div class="inf">
                Sistema de gestión de bases de datos relacional, considerada como la base datos de código abierto más popular del mundo
            </div>
        </a>
    </div>
    
    <div class="netbeans her">
        <a href="https://netbeans.org/" target="_blank">
            <p>NetBeans</p>
            <div class="inf">
                Entorno de desarrollo integrado libre, hecho principalmente para el lenguaje de programación Java. Libre, gratuito y sin restricciones de uso.
            </div>
        </a>
    </div>
    
    <div class="workbench her">
        <a href="https://www.mysql.com/products/workbench/" target="_blank">
            <p>Workbench</p>
            <div class="inf">
                Herramienta visual de administración, gestión y desarrollo de bases de datos que integra desarrollo de software.
            </div>
        </a>
    </div>
    
    <i class="fas fa-male"></i>
</div>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" id="fTecnologias">
    <input type="submit" name="volver" id="volverTec" value="Volver">
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