<?php
    /**
     * @author Mario Casquero Jáñez
     */

    //Se obtienen los datos del usuario buscando por el código
    $usuario=Usuario::buscarUsuarioPorCodigo($_SESSION["codUsuario"]);
    
    //Si el administrador PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el administrador PULSA CANCELAR
    if(isset($_REQUEST["cancelar"])){
        $_SESSION["pagina"]="mtoUsuarios"; //Se guarda en la variable de sesión la ventana de mantenimiento de usuarios
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el administrador PULSA ELIMINAR
    if(isset($_REQUEST["eliminarPer"])){
        $codUsuario=$usuario->getCodUsuario(); //Se almacena en la variable el código del usuario correspondiente
        $eliminado=$usuario->borrarUsuario($codUsuario); //Se almacena en la variable boolena el valor devuelto por el método borrarUsuario
        
        //Si se ha ELIMINADO el perfil
        if($eliminado){
            $_SESSION["pagina"]="mtoUsuarios"; //Se guarda en la variable de sesión la ventana de mantenimiento de usuarios
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha ELIMINADO el perfil
        else{
            $_SESSION["pagina"]="borrarPerfil"; //Se guarda en la variable de sesión la ventana de eliminar perfil
            require_once $vistas["layout"]; //Se carga la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="borrarPerfil"; //Se guarda en la variable de sesión la ventana de eliminar perfil
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>
