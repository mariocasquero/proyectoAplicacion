<?php
/**
     * @author Mario Casquero Jáñez
     */
    
    $entradaOK=true; //Se declara e inicializa la variable
    
    //Se declara e inicializa el array con los mensajes de error
    $aErrores=[
        "descUsuario"=>NULL
    ];
    
    //Se obtienen los datos del departamento buscando por el código
    $usuario=Usuario::buscarUsuarioPorCodigo($_SESSION["codUsuario"]); //Se almacena en la variable el usuario correspondiente
    
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
    //Si el administrador PULSA MODIFICAR
    if(isset($_REQUEST["modificarPer"])){
        $aErrores["descUsuario"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descUsuario"], 255, 3, 1); //Se valida la descripción y se almacenan los posibles errores en el array
        
        //Se recorre el array en busca de mensajes de error
        foreach($aErrores as $campo=>$error){ 
            if($error!=null){ //Si alguna posición contiene un mensaje de error
                $entradaOK=false; //Se le cambia el valor a la variable
                $_REQUEST[$campo]=""; //Se limpia el campo erróneo
            }
        }
    }
    //Si el usuario PULSA MODIFICAR y NO hay ERRORES
    if(isset($_REQUEST["modificarPer"]) && $entradaOK){
        $descUsuario=$_REQUEST["descUsuario"];
        $perfil=$_REQUEST["perfil"];
        
        $modificado=$usuario->modificarUsuario($descUsuario);//Se almacena en la variable boolena el valor devuelto por el método modificarUsuario
        
        //Si se ha MODIFICADO el departamento
        if($modificado){
            $_SESSION["pagina"]="mtoUsuarios"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha MODIFICADO el departamento
        else{
            $_SESSION["pagina"]="modificarPerfil"; //Se guarda en la variable de sesión la ventana de modificar perfil
            require_once $vistas["layout"]; //Se carga la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="modificarPerfil"; //Se guarda en la variable de sesión la ventana de modificar perfil
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>
