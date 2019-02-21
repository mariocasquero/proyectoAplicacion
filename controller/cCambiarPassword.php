<?php
    /**
    * @author Mario Casquero Jáñez
    */

    $entradaOK=true; //Se declara e inicializa la variable
    
    //Se declara e inicializa el array con los mensajes de error
    $aErrores=[
        "passwordViejo"=>NULL,
        "passwordNuevo"=>NULL,
        "passwordRepetido"=>NULL
    ];
    
    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA CANCELAR
    if(isset($_REQUEST["cancelarPass"])){
        $_SESSION["pagina"]="editarPerfil"; //Se guarda en la variable de sesión la ventana de editar perfil
        header('Location: index.php'); //Se le redirige al index
        require_once $vistas["layout"]; //Se carga la vista correspondiente
        exit;
    }
    //Si el usuario PULSA CAMBIAR PASSWORD
    if(isset($_REQUEST["cambiarPass"])){
        $aErrores["passwordViejo"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["passwordViejo"], 30, 1, 1); //Se valida el password anterior y se almacenan los posibles errores en el array
        $aErrores["passwordNuevo"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["passwordNuevo"], 30, 1, 1); //Se valida el password nuevo y se almacenan los posibles errores en el array
        $aErrores["passwordRepetido"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["passwordRepetido"], 30, 1, 1); //Se valida el password repetido y se almacenan los posibles errores en el array
        
        //Si el PASSWORD ANTIGUO es DIFERENTE al INTRODUCIDO
        if($_REQUEST["passwordViejo"]!=$_SESSION["usuario"]->getPassword()){
            $entradaOK=false; //Se cambia el valor a la variable
            $aErrores["passwordViejo"].=" Password incorrecto!"; //Se almacena un mensaje de error
        }
        //Si el PASSWORD NUEVO y el PASSWORD REPETIDO NO COINCIDEN
        if($_REQUEST["passwordNuevo"]!=$_REQUEST["passwordRepetido"]){
            $entradaOK=false; //Se cambia el valor a la variable
            $aErrores["passwordRepetido"].=" Las contraseñas no coinciden!"; //Se almacena un mensaje de error
        }
        
        //Se recorre el array en busca de mensajes de error
        foreach($aErrores as $campo=>$error){
            if($error!=null){ //Si alguna posición contiene un mensaje de error
                $entradaOK=false; //Se le cambia el valor a la variable
                $_REQUEST[$campo]=""; //Se limpia el campo erróneo
            }
        }
    }
    //Si el usuario PULSA CAMBIAR PASSWORD y NO hay ERRORES
    if(isset($_REQUEST["cambiarPass"]) && $entradaOK){
        $password=$_REQUEST["passwordNuevo"]; //Se almacena el password nuevo en la variable
        
        $modificado=$_SESSION["usuario"]->cambiarPassword($password); //Se almacena en la variable boolena el valor devuelto por el método cambiarPassword
        
        //Si NO se ha CAMBIADO el password
        if(!$modificado){
            $_SESSION["pagina"]="cambiarPassword"; //Se guarda en la variable de sesión la ventana de cambiar password
            require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
        }
        //Si el password ha sido CAMBIADO
        else{
            $_SESSION["pagina"]="editarPerfil"; //Se guarda en la variable de sesión la ventana de editar perfil
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="cambiarPassword"; //Se guarda en la variable de sesión la ventana de cambiar password
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>
