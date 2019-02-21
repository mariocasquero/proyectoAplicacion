<?php
    /**
    * @author Mario Casquero Jáñez
    */

    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA VOLVER
    if(isset($_REQUEST["volverRest"])){
        $_SESSION["pagina"]="inicio"; //Se guarda en la variable de sesión la ventana de inicio
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA ACEPTAR
    if(isset($_REQUEST["aceptarRest"])){
        $estacion=$_REQUEST["resEst"]; //Se almacena en la variable el código de la estación meteorológica
        $resultado=Rest::datosAemet($estacion); //Se almacena en la variable la matriz de datos que devuelve el método
        $_SESSION["respuesta"]=$resultado; //Se guarda en la variable de sesión el primer elemento de la matriz, es decir un array (Todos los de la matriz son iguales)
        $_SESSION["pagina"]="rest"; //Se guarda en la variable de sesión la ventana de rest
        require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="rest"; //Se guarda en la variable de sesión la ventana de rest
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>