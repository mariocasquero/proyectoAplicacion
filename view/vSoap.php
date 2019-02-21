<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="fSoapRest">
    <fieldset>
        <legend><?php echo SOAP?></legend>
        
        <label><?php echo CIUDAD?> </label>
        <select name="codigos" id="codigos" onchange="mostrarCiudad()">
            <option>Seleccione una ciudad</option>
            <option value="87101">Albuquerque</option>
            <option value="30301">Atlanta</option>
            <option value="02101">Boston</option>
            <option value="60007">Chicago</option>
            <option value="75001">Dallas</option>
            <option value="48127">Detroit</option>
            <option value="77001">Houston</option>
            <option value="90001">Los Ángeles</option>
            <option value="33101">Miami</option>
            <option value="70032">New Orleans</option>
            <option value="10001">New York</option>
            <option value="73102">Oklahoma City</option>
            <option value="19019">Philadelphia</option>
            <option value="22434">San Diego</option>
            <option value="94016">San Francisco</option>
            <option value="98101">Seattle</option>
            <option value="20001">Washington D.C</option>
        </select>
        <br><br>
        
        <input type="submit" name="aceptarS" id="aceptarS" value="<?php echo BUSCAR?>">
        <input type="submit" name="volverS" id="volverS" value="<?php echo VOLVER?> ">
    </fieldset>
</form>

<div class="salida" onloadeddata="mostrarCiudad()">
    <p><?php echo COORDENADAS?> <?php echo $_SESSION["resultado"]?></p>
</div>

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

<script>
    function mostrarCiudad(){
        var desplegable=document.getElementById("codigos");
        var ciudad=desplegable.options[desplegable.selectedIndex].text;
        var mensaje="Ciudad "+ciudad;
        document.getElementById("mensajeCiudad").innerHTML=mensaje;
    }
</script>