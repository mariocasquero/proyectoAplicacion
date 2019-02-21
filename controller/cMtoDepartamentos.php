<?php
    /**
     * @author Mario Casquero Jáñez
     */
    
    if($_SESSION["idioma"]=="en"){
        require_once "config/variablesEn.php"; //Se incluye el archivo con los mensajes
    }
    else{
        require_once "config/variablesSp.php"; //Se incluye el archivo con los mensajes
    }
     
    $pag=$_REQUEST["pagina"]; //Se almacena el valor de la página actual en la variable
    $descDepartamento=$_REQUEST["descripcionDep"]; //Se almacena el valor de la descripción en la variable
    //Si el usuario no ha escrito nada en la descripción se guarda como campo vacío
    if($descDepartamento==NULL){
        $descDepartamento='';
    }      
    
    if($pag==NULL){
        $pag=1;
    }   
    
    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }    
    //Si el usuario ha SELECCIONADO un criterio
    if(isset($_REQUEST["criterio"])){
        //Si el criterio es igual a ALTA
        if($_REQUEST["criterio"]=="alta"){
            $filtro=" and fechaBajaDepartamento IS NULL "; //Se guarda el filtro en la variable
        }
        else{
            //Si el criterio es igual a BAJA
            if($_REQUEST["criterio"]=="baja"){
                $filtro=" and fechaBajaDepartamento IS NOT NULL "; //Se guarda el filtro en la variable
            }
        }
    }
    
    //Si el usuario PULSA VOLVER
    if(isset($_REQUEST["volver"])){
        $_SESSION["pagina"]="inicio"; //Se guarda en la variable de sesión la ventana de inicio
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA AÑADIR
    if(isset($_REQUEST["anyadir"])){
        $_SESSION["pagina"]="altaDepartamento"; //Se guarda en la variable de sesión la ventana de alta de departamento
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    
    //Para saber que botón ha sido pulsado, se recorren todos los botones
    for($i=0; $i<count($departamentos); $i++){
        
        //Si el usuario PULSA ELIMINAR
        if(isset($_REQUEST["eliminarDep".$i])){
            $_SESSION["codDepartamento"]=$departamentos[$i]->getCodDepartamento();
            $_SESSION["pagina"]="eliminarDepartamento";
            header('Location: index.php');
            exit;            
        }
        //Si el usuario PULSA MODIFICAR
        if(isset($_REQUEST["modificarDep".$i])){
            $_SESSION["codDepartamento"]=$departamentos[$i]->getCodDepartamento();
            $_SESSION["pagina"]="modDepartamento";
            header('Location: index.php');
            exit;            
        }
        //Si el usuario PULSA DAR DE BAJA
        if(isset($_REQUEST["bajaDep".$i])){
            $_SESSION["codDepartamento"]=$departamentos[$i]->getCodDepartamento();
            $_SESSION["pagina"]="bajaLogica";
            header('Location: index.php');
            exit;            
        }
        if(isset($_REQUEST["rehabilitar".$i])){
            $_SESSION["codDepartamento"]=$departamentos[$i]->getCodDepartamento();
            $_SESSION["pagina"]="rehabilitar";
            header('Location: index.php');
            exit;            
        }
    }
    
    //Si el usuario PULSA BUSCAR
    if(isset($_REQUEST["buscarDep"])){
        $descDepartamento=$_REQUEST["descripcionDep"]; //Se almacena en la variable la desccripción del departamento correspondiente
        $numeroReg=Departamento::contarDepartamentos($descDepartamento, $filtro); //Se cuenta el número de departamentos totales
        $totalPaginas=ceil($numeroReg/NUMREGISTROS); //Se establece el total de páginas que se van a tener
        $departamentos=Departamento::buscaDepartamentoPorDescripcion($descDepartamento, $filtro, $pag, NUMREGISTROS); //Se guardan los departamentos obtenidos como resultado del metodo buscar por descripcion
        $_SESSION["departamentos"]=$departamentos;
        require_once $vistas["layout"]; //Se carga la vista correspondiente        
    }
    //Si NO se ha PULSADO ningún BOTÓN
    
    $numeroReg=Departamento::contarDepartamentos($descDepartamento, $filtro); //Se cuenta el número de departamentos totales
    $totalPaginas=ceil($numeroReg/NUMREGISTROS); //Se establece el total de páginas que se van a tener
    $departamentos=Departamento::buscaDepartamentoPorDescripcion($descDepartamento, $filtro, $pag, NUMREGISTROS); //Se guardan los departamentos obtenidos como resultado del metodo buscar por descripcion     
    $_SESSION["departamentos"]=$departamentos;
    $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    
?>