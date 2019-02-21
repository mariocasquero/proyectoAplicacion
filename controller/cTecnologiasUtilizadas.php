<?php
    /**
    * @author Mario Casquero Jáñez
    */
    
    //Si el usuario PULSA VOLVER
    if(isset($_REQUEST["volver"])){
        $_SESSION["pagina"]="login"; //Se guarda en la variable de sesión la ventana de login
        header('Location: index.php'); //Se le redirige al login
        exit;
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="tecnologias"; //Se carga en la variable de sesión la ventana de tecnologias
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>