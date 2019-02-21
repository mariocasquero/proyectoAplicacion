<?php
    /**
     * @author Mario Casquero Jáñez
     */
    
    $pag=$_REQUEST["pagina"]; //Se almacena el valor de la página actual en la variable
    $descUsuario=$_REQUEST["descripcionUs"]; //Se almacena el valor de la descripción en la variable
    //Si el usuario no ha escrito nada en la descripción se guarda como campo vacío
    if($descUsuario==NULL){
        $descUsuario='';
    }      
    
    if($pag==NULL){
        $pag=1;
    }
    
    $numeroReg=Usuario::contarUsuarios($descUsuario); //Se cuenta el número de usuarios totales
    $totalPaginas=ceil($numeroReg/NUMREGISTROS); //Se establece el total de páginas que se van a tener
    $usuarios=Usuario::buscaUsuarioPorDescripcion($descUsuario, $pag, NUMREGISTROS); //Se guardan los usuarios obtenidos como resultado del metodo buscar por descripcion   
    //Si el administrador PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el administrador PULSA VOLVER
    if(isset($_REQUEST["volver"])){
        $_SESSION["pagina"]="inicio"; //Se guarda en la variable de sesión la ventana de inicio
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    
    //Para saber que botón ha sido pulsado, se recorren todos los botones
    for($i=0; $i<count($usuarios); $i++){
        //Si el administrador PULSA ELIMINAR
        if(isset($_REQUEST["eliminarUs".$i])){
            $_SESSION["codUsuario"]=$usuarios[$i]->getCodUsuario();
            $_SESSION["pagina"]="borrarPerfil";
            header('Location: index.php');
            exit;            
        }
        //Si el administrador PULSA MODIFICAR
        if(isset($_REQUEST["modificarUs".$i])){
            $_SESSION["codUsuario"]=$usuarios[$i]->getCodUsuario();
            $_SESSION["pagina"]="modificarPerfil";
            header('Location: index.php');
            exit;            
        }
    }    
    //Si el administrador PULSA BUSCAR
    if(isset($_REQUEST["buscarUs"])){
        $descUsuario=$_REQUEST["descripcionUs"]; //Se almacena en la variable la descripción del usuario correspondiente
        $numeroReg=Usuario::contarUsuarios($descUsuario); //Se cuenta el número de usuarios totales
        $totalPaginas=ceil($numeroReg/NUMREGISTROS); //Se establece el total de páginas que se van a tener
        $usuarios=Usuario::buscaUsuarioPorDescripcion($descUsuario, $pag, NUMREGISTROS); //Se guardan los usuarios obtenidos como resultado del metodo buscar por descripcion  
        require_once $vistas["layout"]; //Se carga la vista correspondiente        
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $numeroReg=Usuario::contarUsuarios($descUsuario); //Se cuenta el número de usuarios totales
        $totalPaginas=ceil($numeroReg/NUMREGISTROS); //Se establece el total de páginas que se van a tener
        $usuarios=Usuario::buscaUsuarioPorDescripcion($descUsuario, $pag, NUMREGISTROS); //Se guardan los usuarios obtenidos como resultado del metodo buscar por descripcion  
        $_SESSION["pagina"]="mtoUsuarios"; //Se guarda en la variable de sesión la ventana de mantenimiento de usuarios
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }