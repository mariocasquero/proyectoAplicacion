<?php
    require_once "core/181025validacionFormularios.php"; //Se incluye la librería de validación de formularios
    require "model/Usuario.php"; //Se incluye la clase Usuario
    require_once "model/Departamento.php"; //Se incluye la clase Departamento
    require_once "model/Rest.php"; //Se incluye la clase Rest
    
    define("NUMREGISTROS", 3);
    
    //Se almacena en el array asociativo las rutas a los controladores
    $controladores=[
        "login"=>"controller/cLogin.php",
        "inicio"=>"controller/cInicio.php",
        "registro"=>"controller/cRegistro.php",
        "editarPerfil"=>"controller/cEditarPerfil.php",
        "mtoDepartamentos"=>"controller/cMtoDepartamentos.php",
        "cambiarPassword"=>"controller/cCambiarPassword.php",
        "borrarUsuario"=>"controller/cBorrarUsuario.php",
        "altaDepartamento"=>"controller/cAltaDepartamento.php",
        "eliminarDepartamento"=>"controller/cEliminarDepartamento.php",
        "modDepartamento"=>"controller/cConsultarModificarDepartamento.php",
        "bajaLogica"=>"controller/cBajaLogicaDepartamento.php",
        "rehabilitar"=>"controller/cRehabilitarDepartamento.php",
        "soap"=>"controller/cSoap.php",
        "rest"=>"controller/cRest.php",
        "apiRest"=>"controller/cApiRest.php",
        "mtoUsuarios"=>"controller/cMtoUsuarios.php",
        "borrarPerfil"=>"controller/cEliminarPerfil.php",
        "modificarPerfil"=>"controller/cModificarPerfil.php",
        "tecnologias"=>"controller/cTecnologiasUtilizadas.php"
        
    ];
    //Se almacena en el array asociativo las rutas a las vistas
    $vistas=[
        "layout"=>"view/layout.php",
        "login"=>"view/vLogin.php",
        "inicio"=>"view/vInicio.php",
        "registro"=>"view/vRegistro.php",
        "editarPerfil"=>"view/vEditarPerfil.php",
        "mtoDepartamentos"=>"view/vMtoDepartamentos.php",
        "cambiarPassword"=>"view/vCambiarPassword.php",
        "borrarUsuario"=>"view/vBorrarUsuario.php",
        "altaDepartamento"=>"view/vAltaDepartamento.php",
        "eliminarDepartamento"=>"view/vEliminarDepartamento.php",
        "modDepartamento"=>"view/vConsultarModificarDepartamento.php",
        "bajaLogica"=>"view/vBajaLogicaDepartamento.php",
        "rehabilitar"=>"view/vRehabilitarDepartamento.php",
        "soap"=>"view/vSoap.php",
        "rest"=>"view/vRest.php",
        "apiRest"=>"view/vApiRest.php",
        "mtoUsuarios"=>"view/vMtoUsuarios.php",
        "borrarPerfil"=>"view/vEliminarPerfil.php",
        "modificarPerfil"=>"view/vModificarPerfil.php",
        "tecnologias"=>"view/vTecnologiasUtilizadas.php"
    ];
?>