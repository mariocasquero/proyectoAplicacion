<?php
    /**
     * @author Mario Casquero Jáñez
     */

    $entradaOK=true; //Se declara e inicializa la variable
    
    //Se declara e inicializa el array con los mensajes de error
    $aErrores=[
        "codDepartamento"=>NULL,
        "descDepartamento"=>NULL,
        "volNegocio"=>NULL        
    ];
    
    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA CANCELAR
    if(isset($_REQUEST["cancelarDep"])){
        $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
        header('Location: index.php'); //Se le redirige al index
        require_once $vistas["layout"]; //Se carga la vista correspondiente
        exit;
    }
    //Si el usuario PULSA AÑADIR DEPARTAMENTO
    if(isset($_REQUEST["anyadirDep"])){
        $aErrores["codDepartamento"]=validacionFormularios::comprobarAlfabetico($_REQUEST["codDepartamento"], 3, 3, 1); //Se valida el departamento y se almacenan los posibles errores en el array
        $aErrores["descDepartamento"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descDepartamento"], 255, 3, 1); //Se valida la descripción y se almacenan los posibles errores en el array
        $aErrores["volNegocio"]=validacionFormularios::comprobarEntero($_REQUEST["volNegocio"], 1000000, 1, 1); //Se valida el volumen de negocio y se almacenan los posibles errores en el array
        
        //Si el DEPARTAMENTO con el que se intenta registrar YA EXISTE
        if(!(Departamento::validaCodNoExiste($_REQUEST["codDepartamento"]))){
            $aErrores["codDepartamento"].=" El departamento ya existe!"; //Se almacena un mensaje de error
        }
        
        //Se recorre el array en busca de mensajes de error
        foreach($aErrores as $campo=>$error){
            if($error!=null){ //Si alguna posición contiene un mensaje de error
                $entradaOK=false; //Se le cambia el valor a la variable
                $_REQUEST[$campo]=""; //Se limpia el campo erróneo
            }
        }
    }
    //Si el usuario PULSA AÑADIR y NO hay ERRORES
    if(isset($_REQUEST["anyadirDep"]) && $entradaOK){
        $departamento=NULL; //Se declara e inicializa la objeto
        
        $codDepartamento=$_REQUEST["codDepartamento"]; //Se almacena el departamento en la variable
        $descDepartamento=$_REQUEST["descDepartamento"]; //Se almacena la descripción en la variable
        $volumenDeNegocio=$_REQUEST["volNegocio"]; //Se almacena el volumen de negocio en la variable
        
        //Se almacena en el objeto el resultado del método altaDepartamento
        $departamento=Departamento::altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio);
        
        //Si el departamento guardado como resultado es NULL
        if(is_null($departamento)){
            $_SESSION["pagina"]="altaDepartamento"; //Se guarda en la variable de sesión la ventana de alta departamento
            require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
        }
        //Si el departamento guardado como resultado es un objeto de la clase Departamento
        else{
            $_SESSION["departamento"]=$departamento; //Se guarda en la variable de sesión el objeto departamento
            $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN o los DATOS son ERRÓNEOS
    else{
        $_SESSION["pagina"]="altaDepartamento"; //Se guarda en la variable de sesión la ventana de alta de departamento
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>