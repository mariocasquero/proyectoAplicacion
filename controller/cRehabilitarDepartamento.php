<?php
    /**
     * @author Mario Casquero Jáñez
     */
    //Se obtienen los datos del departamento buscando por el código
    $departamento=Departamento::buscaDepartamentoPorCodigo($_SESSION["codDepartamento"]);
    
    date_default_timezone_set("Europe/Madrid"); //Se establece la zona horaria española
    setlocale(LC_ALL, "es_ES.UTF-8"); //Se establece como localización la española 
    
    $marcaBaja=$departamento->getFechaBajaDepartamento(); //Se almacena la marca de tiempo de la posible fecha de baja en la variable
    $fechaBaja=NULL; //Se declara e inicializa la variable
    
    //Si la fecha de baja NO es NULA
    if($marcaBaja!=NULL){
        $fechaBaja=date("d-m-Y", $marcaBaja); //Se formatea la marca de tiempo y se almacena en la variable
    }
    
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
    
    //Si el usuario PULSA REHABILITAR
    if(isset($_REQUEST["rehabilitar"])){
        $rehabilitado=$departamento->rehabilitarDepartamento(); //Se almacena en la variable boolena el valor devuelto por el método rehabilitarDepartamento
        
        //Si se ha REHABILITADO el departamento
        if($rehabilitado){
            $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha REHABILITADO el departamento
        else{
            $_SESSION["pagina"]="rehabilitar"; //Se guarda en la variable de sesión la ventana de rehabilitar departamento
            require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="rehabilitar"; //Se guarda en la variable de sesión la ventana de rehabilitar departamento
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>

