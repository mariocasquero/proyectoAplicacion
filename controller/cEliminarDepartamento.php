<?php
    /**
     * @author Mario Casquero Jáñez
     */
    
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
    //Si el usuario PULSA ELIMINAR
    if(isset($_REQUEST["eliminarDep"])){
        $codDepartamento=$departamento->getCodDepartamento(); //Se almacena en la variable el código del departamento correspondiente
        $eliminado=$departamento->bajaFisicaDepartamento($codDepartamento); //Se almacena en la variable boolena el valor devuelto por el método bajaFisicaDepartamento
        
        //Si se ha ELIMINADO el departamento
        if($eliminado){
            $_SESSION["pagina"]="mtoDepartamentos"; //Se guarda en la variable de sesión la ventana de mantenimiento de departamentos
            header('Location: index.php'); //Se le redirige al index
            exit;
        }
        //Si NO se ha ELIMINADO el departamento
        else{
            $_SESSION["pagina"]="eliminarDepartamento"; //Se guarda en la variable de sesión la ventana de borrar usuario
            require_once $vistas["layout"]; //Se carga la vista correspondiente
        }
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="eliminarDepartamento"; //Se guarda en la variable de sesión la ventana de eliminar departamento
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>

