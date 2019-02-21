<?php

    /**
     * @author Mario Casquero Jáñez
     */
    require_once "core/nuSoap/nusoap.php"; //Se incluye la librería de nuSoap
    
    //Si el usuario PULSA SALIR
    if(isset($_REQUEST["salir"])){
        unset($_SESSION["usuario"]); //Se destruye la variable de sesión que almacena el objeto de la clase Usuario
        session_destroy(); //Se destruye la sesión
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA VOLVER
    if(isset($_REQUEST["volverS"])){
        $_SESSION["pagina"]="inicio"; //Se guarda en la variable de sesión la ventana de inicio
        header('Location: index.php'); //Se le redirige al index
        exit;
    }
    //Si el usuario PULSA ACEPTAR CATASTRO
    if(isset($_REQUEST["aceptarProv"])){
        $provincia=$_REQUEST["provinciaS"]; //Se almacena la provincia recogida en el campo
        
        $wdsl="core/documento.wsdl"; //Se almacena en la variable la URL con el documento WSDL
        
        //Se declara e inicializa el array con los parámetros
        $parametros=[
            "ConsultaProvincia"=>$provincia
        ];
        
        $cliente=new nusoap_client($wdsl); //Se crea el cliente del servicio nuSoap
        $respuesta=$cliente->call("ObtenerProvincias"); //Se hace la petición al servicio y se almacena la respuesta de este en la variable
        $_SESSION["resultadoC"]=$respuesta; //Se guarda en la variable de sesión la respuesta obtenida por el servicio
        
        $_SESSION["pagina"]="soap"; //Se guarda en la variable de sesión la ventana de soap
        require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
    }
    
    //Si el usuario PULSA ACEPTAR CIUDADES
    if(isset($_REQUEST["aceptarS"])){
        $codigo=$_REQUEST["codigos"]; //Se almacena el código postal recogido en el desplegable
        
        $wdsl="https://graphical.weather.gov/xml/SOAP_server/ndfdXMLserver.php?wsdl"; //Se almacena en la variable la URL con el documento WSDL
        
        //Se declara e inicializa el array con los parámetros
        $parametros=[
            "zipCodeList"=>$codigo
        ];
        
        $cliente=new nusoap_client($wdsl); //Se crea el cliente del servicio nuSoap
        $respuesta=$cliente->call("LatLonListZipCode", $parametros); //Se hace la petición al servicio y se almacena la respuesta de este en la variable
        $_SESSION["resultado"]=$respuesta; //Se guarda en la variable de sesión la respuesta obtenida por el servicio
        
        $_SESSION["pagina"]="soap"; //Se guarda en la variable de sesión la ventana de soap
        require_once $vistas["layout"]; //Se carga de nuevo la vista correspondiente
    }
    //Si NO se ha PULSADO ningún BOTÓN
    else{
        $_SESSION["pagina"]="soap"; //Se guarda en la variable de sesión la ventana de soap
        require_once $vistas["layout"]; //Se carga la vista correspondiente
    }
?>