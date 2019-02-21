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
    //Si el usuario PULSA CANCELAR
    if(isset($_REQUEST["cancelarU"])){
        $_SESSION["pagina"]="editarPerfil"; //Se guarda en la variable de sesión la ventana de editar perfil
        header('Location: index.php'); //Se le redirige al index
        require_once $vistas["layout"]; //Se carga la vista correspondiente
        exit;
    }
    
    //Si el usuario PULSA BORRAR USUARIO
    if(isset($_REQUEST["borrarU"])){
        $codUsuario=$_SESSION["usuario"]->getCodUsuario(); //Se almacena en la variable el código del usuario correspondiente
        $borrado=$_SESSION["usuario"]->borrarUsuario($codUsuario); //Se almacena en la variable boolena el valor devuelto por el método borrarUsuario
        
        //Si el usuario ha sido BORRADO
        if($borrado){
            unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
            session_destroy(); //Se destruye la sesión
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha BORRADO el usuario
        else{
            $_SESSION["pagina"]="borrarUsuario"; //Se guarda en la variable de sesión la ventana de borrar usuario
            require_once $vistas["layout"]; //Se carga la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="borrarUsuario"; //Se guarda en la variable de sesión la ventana de borrar usuario
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>