<?php
    /**
     * @author Mario Casquero Jáñez
     */
    
    $entradaOK=true; //Se declara e inicializa la variable
    
    //Se declara e inicializa el array con los mensajes de error
    $aErrores=[
        "descDepartamento"=>NULL,
        "volumenDeNegocio"=>NULL
    ];
    
    //Se obtienen los datos del departamento buscando por el código
    $departamento=Departamento::buscaDepartamentoPorCodigo($_SESSION["codDepartamento"]); //Se almacena en la variable el departamento correspondiente
    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA CANCELAR
    if(isset($_REQUEST["cancelar"])){
        $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA MODIFICAR
    if(isset($_REQUEST["modificarDep"])){
        $aErrores["descDepartamento"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descDepartamento"], 255, 3, 1); //Se valida la descripción y se almacenan los posibles errores en el array
        $aErrores["volNegocio"]=validacionFormularios::comprobarEntero($_REQUEST["volNegocio"], 1000000, 1, 1); //Se valida el volumen de negocio y se almacenan los posibles errores en el array
        
        //Se recorre el array en busca de mensajes de error
        foreach($aErrores as $campo=>$error){ 
            if($error!=null){ //Si alguna posición contiene un mensaje de error
                $entradaOK=false; //Se le cambia el valor a la variable
                $_REQUEST[$campo]=""; //Se limpia el campo erróneo
            }
        }
    }
    //Si el usuario PULSA MODIFICAR y NO hay ERRORES
    if(isset($_REQUEST["modificarDep"]) && $entradaOK){
        $fechaBaja=$_REQUEST["fechaBaja"];
        $descDepartamento=$_REQUEST["descDepartamento"];
        $volumenDeNegocio=$_REQUEST["volNegocio"];
        
        $modificado=$departamento->modificarDepartamento($descDepartamento, $volumenDeNegocio);//Se almacena en la variable boolena el valor devuelto por el método modificarDepartamento
        
        //Si se ha MODIFICADO el departamento
        if($modificado){
            $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha MODIFICADO el departamento
        else{
            $_SESSION["pagina"]="modDepartamento"; //Se guarda en la variable de sesión la ventana de modificar consultar usuario
            require_once $vistas["layout"]; //Se carga la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="modDepartamento"; //Se guarda en la variable de sesión la ventana de modificar departamento
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>

