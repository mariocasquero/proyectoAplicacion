<?php
    /**
    * @author Mario Casquero Jáñez
    */

    $entradaOK=true; //Se declara e inicializa la variable
    
    //Se declara e inicializa el array con los mensajes de error
    $aErrores=[
        "descripcionE"=>NULL
    ];
    
    //Si el usuario PULSA CANCELAR
    if(isset($_REQUEST["cancelarE"])){
        $_SESSION["pagina"]="inicio"; //Se carga en la variable de sesión la ventana de inicio
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA CAMBIAR PASSWORD
    if(isset($_REQUEST["cPassword"])){
        $_SESSION["pagina"]="cambiarPassword"; //Se guarda en la variable de sesión la ventana de cambiar password
        header('Location: index.php'); //Se le redirige al index
        require_once $vistas["layout"]; //Se carga la vista correspondiente
        exit;
    }
    //Si el usuario PULSA BORRAR USUARIO
    if(isset($_REQUEST["bUsuario"])){
        $_SESSION["pagina"]="borrarUsuario"; //Se guarda en la variable de sesión la ventana de borrar usuario
        header('Location: index.php'); //Se le redirige al index
        require_once $vistas["layout"]; //Se carga la vista correspondiente
        exit;
    }
    //Si el usuario PULSA ACEPTAR
    if(isset($_REQUEST["aceptarE"])){
        $aErrores["descripcionE"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcionE"], 100, 3, 1); //Se valida la descripción y se almacenan los posibles errores en el array
        
        //Se recorre el array en busca de mensajes de error
        foreach($aErrores as $campo=>$error){ 
            if($error!=null){ //Si alguna posición contiene un mensaje de error
                $entradaOK=false; //Se le cambia el valor a la variable
                $_REQUEST[$campo]=""; //Se limpia el campo erróneo
            }
        }
    }
    //Si el usuario PULSA ACEPTAR y NO hay ERRORES
    if(isset($_REQUEST["aceptarE"]) && $entradaOK){
        $descUsuario=$_REQUEST["descripcionE"]; //Se almacena la nueva descripción en la variable
        
        $modificado=$_SESSION["usuario"]->modificarUsuario($descUsuario); //Se almacena en la variable boolena el valor devuelto por el método modificarUsuario
        
        //Si el usuario NO ha sido MODIFICADO
        if(!$modificado){
            $_SESSION["pagina"]="editarPerfil"; //Se guarda en la variable de sesión la ventana de editar perfil
            require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
        }
        //Si el usuario ha sido MODIFICADO
        else{
            $_SESSION["pagina"]="inicio"; //Se guarda en la variable de sesión la ventana de inicio
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="editarPerfil"; //Se guarda en la variable de sesión la ventana de editar perfil
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>