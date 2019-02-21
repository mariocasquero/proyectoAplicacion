<?php
    require_once '../conf/conexionDB.php';
    require_once '../conf/config.php';
    require_once '../model/Departamento.php';
    
    $aDepartamento=[];
    $codDepartamento=$_GET[codigo];
    $departamento=Departamento::buscaDepartamentosPorCodigo($codDepartamento);
    
    if ($departamento!=null) {
        $aDepartamento['CodDepartamento']=$departamento->getCodDepartamento();
        $aDepartamento['DescDepartamento']=$departamento->getDescDepartamento();
        $aDepartamento['VolumenNegocio']=$departamento->getVolumenDeNegocio();
        $aDepartamento['FechaCreacionDepartamento']=$departamento->getFechaCreacionDepartamento();
    } else {
        $aDepartamento['Error']='Datos incorrectos';
    }
    
    header('Content-type: application/json');
    echo json_encode($aDepartamento, JSON_PRETTY_PRINT);
?>