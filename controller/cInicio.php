<?php
    /**
    * @author Mario Casquero Jáñez
    */
    
    date_default_timezone_set("Europe/Madrid"); //Se establece la zona horaria española
    setlocale(LC_ALL, "es_ES.UTF-8"); //Se establece como localización la española
    $mensaje=""; //Se declara e inicializa la variable
    $idioma=$_REQUEST["idioma"];

    if($idioma=="en"){
        require_once "config/variablesEn.php"; //Se incluye el archivo con los mensajes
    }
    else{
        require_once "config/variablesSp.php"; //Se incluye el archivo con los mensajes
    }
    
    $descripcion=$_SESSION["usuario"]->getDescUsuario(); //Se almacena la descripción del usuario correspondiente en la variable
    $numAccesos=$_SESSION["usuario"]->getNumAccesos(); //Se almacena el número de accesos del usuario correspondiente en la variable
    $fechaHora=$_SESSION["usuario"]->getFechaHoraUltimaConexion(); //Se almacena el último login del usuario correspondiente en la variable
    
    //Si el usuario PULSA MTO DEPARTAMENTOS
    if(isset($_REQUEST["mtoDepartamentos"])){
        $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el administrador PULSA MTO USUARIOS
    if(isset($_REQUEST["mtoUsuarios"])){
        $_SESSION["pagina"]="mtoUsuarios"; //Se guarda en la variable de sesión la ventana de mantenimiento de usuarios
        $_SESSION["idioma"]="en";
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA SOAP
    if(isset($_REQUEST["bSoap"])){
        $_SESSION["pagina"]="soap"; //Se guarda en la variable de sesión la ventana de soap
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA REST
    if(isset($_REQUEST["bRest"])){
        $_SESSION["pagina"]="rest"; //Se guarda en la variable de sesión la ventana de rest
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA EDITAR PERFIL
    if(isset($_REQUEST["editarPerfil"])){        
        $_SESSION["pagina"]="editarPerfil"; //Se guarda en la variable de sesión la ventana de editar perfil
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si NO EXISTE la SESIÓN del USUARIO
    if(!isset($_SESSION["usuario"])){
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si EXISTE la SESIÓN del USUARIO
    else{
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>

