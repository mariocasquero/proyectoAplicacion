<?php
    /**
     * @author Mario Casquero Jáñez
     */
    
    date_default_timezone_set("Europe/Madrid"); //Se establece la zona horaria española
    setlocale(LC_ALL, "es_ES.UTF-8"); //Se establece como localización la española 
    $fechaBaja=new DateTime(); //Se crea e inicializa un objeto de la clase DateTime
    $entradaOK=true; //Se declara e inicializa la variable
    
    //Se declara e inicializa el array con los mensajes de error
    $aErrores=[
        "fechaBaja"=>NULL
    ];
    
    //Se obtienen los datos del departamento buscando por el código
    $departamento=Departamento::buscaDepartamentoPorCodigo($_SESSION["codDepartamento"]);
    
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
    //Si el usuario PULSA DAR DE BAJA
    if(isset($_REQUEST["bajaDep"])){
        $fechaValidar=NULL; //Se declara e inicializa la variable
        $fechaHora=NULL; //Se declara e inicializa la variable
        
        //Si la fecha introducida NO está VACÍA
        if(!empty($_REQUEST["fechaBaja"])){
            $fechaHora=new DateTime($_REQUEST["fechaBaja"]); //Se recoge el valor del campo fecha de baja y se crea otro objeto DateTime
            $fechaValidar=$fechaHora->format("Y-m-d"); //Se formatea la fecha para validarla y se almacena en la variable
        }

        $aErrores["fechaBaja"]=validacionFormularios::validarFecha($fechaValidar, 1); //Se valida la fecha de baja y se almacenan los posibles errores en el array
        
        //Se recorre el array en busca de mensajes de error
        foreach($aErrores as $campo=>$error){ 
            if($error!=null){ //Si alguna posición contiene un mensaje de error
                $entradaOK=false; //Se le cambia el valor a la variable
                $_REQUEST[$campo]=""; //Se limpia el campo erróneo
            }
        }
    }
    //Si el usuario PULSA MODIFICAR y NO hay ERRORES
    if(isset($_REQUEST["bajaDep"]) && $entradaOK){
        $marcaBaja=$fechaHora->getTimestamp();

        $dadoBaja=$departamento->bajaLogicaDepartamento($marcaBaja); //Se almacena en la variable boolena el valor devuelto por el método bajaLogicaDepartamento
        
        //Si se ha DADO DE BAJA el departamento
        if($dadoBaja){
            $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha DADO DE BAJA el departamento
        else{
            $_SESSION["pagina"]="bajaLogica"; //Se guarda en la variable de sesión la ventana de modificar consultar usuario
            require_once $vistas["layout"]; //Se carga la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="bajaLogica"; //Se guarda en la variable de sesión la ventana de eliminar departamento
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>