<?php
/**
 * Archivo DepartamentoPDO.php
 * 
 * Trabaja contra la capa de datos, creando departamentos y alterando su estado
 *
 * @package modelo
 */
require_once "DBPDO.php";
/**
 * Class DepartamentoPDO
 * 
 * Clase que crea, borra, modifica y valida departamentos
 * 
 * @author Mario Casquero Jáñez
 */
class DepartamentoPDO{
    /**
     * Función buscaDepartamentoPorCodigo
     * 
     * Última revisión 05/02/2019
     * Se extraen todos los datos del departamento correspondiente
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @return array $aDepartamento el departamento correspondiente al código introducido
     */
    public static function buscaDepartamentoPorCodigo($codDepartamento){
        $aDepartamento=[]; //Se declara e inicializa la variable
        
        //Se construye la consulta
        $sql="select * from Departamentos where codDepartamento=:cod";
        //Se almacenan los parámetros
        $parametros=[":cod"=>$codDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros); //Se ejecuta la consulta
        
        if($resultado->rowCount()==1){
            $registros=$resultado->fetchObject();
            $aDepartamento["codDepartamento"]=$registros->codDepartamento;
            $aDepartamento["descDepartamento"]=$registros->descDepartamento;
            $aDepartamento["fechaCreacionDepartamento"]=$registros->fechaCreacionDepartamento;
            $aDepartamento["volumenDeNegocio"]=$registros->volumenDeNegocio;
            $aDepartamento["fechaBajaDepartamento"]=$registros->fechaBajaDepartamento;
        }
        
        return $aDepartamento; //Se devuelve el array de departamentos
    }
    /**
     * Función buscaDepartamentoPorDescripcion
     * 
     * Última revisión 06/02/2019
     * Se extraen todos los departamentos correspondientes a la descripción
     * 
     * @author Mario Casquero Jáñez
     * @param string $descDepartamento descripción del departamento
     * @param string $filtro criterio de búsqueda
     * @param int $pagina página actual de la ventana
     * @param int $tamanyoPag número de registros por página
     * @return array $aDepartamentos array con todos los departamentos encontrados
     */
    public static function buscaDepartamentoPorDescripcion($descDepartamento, $filtro, $pagina, $tamanyoPag){
        $contador=0;
        $aDepartamentos=[];
        $aDepartamento=[];
        
        if($pagina>0){
            $inicio=($pagina-1)*$tamanyoPag;
        }
        else{
            $inicio=0;
        }
        
        $limite=" LIMIT $inicio, $tamanyoPag";
        
        $sql="select * from Departamentos where descDepartamento like concat('%',?,'%')";
        $parametros=[$descDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql.$filtro.$limite, $parametros);
        
        if($resultado->rowCount()>0){
            while($registros=$resultado->fetchObject()){
                $aDepartamento["codDepartamento"]=$registros->codDepartamento;
                $aDepartamento["descDepartamento"]=$registros->descDepartamento;
                $aDepartamento["fechaCreacionDepartamento"]=$registros->fechaCreacionDepartamento;
                $aDepartamento["volumenDeNegocio"]=$registros->volumenDeNegocio;
                $aDepartamento["fechaBajaDepartamento"]=$registros->fechaBajaDepartamento;
                $aDepartamentos[$contador]=$aDepartamento;
                $contador++;
            }            
        }
        
        return $aDepartamentos;
    }
    /**
     * Función contarDepartamentos
     * 
     * Última revisión 06/02/2019
     * Cuenta el total de departamentos de la aplicación
     * 
     * @author Mario Casquero Jáñez
     * @param string $descDepartamento descripción del departamento
     * @param string $filtro criterio de búsqueda
     * @return int $registros número de departamentos totales
     */
    public static function contarDepartamentos($descDepartamento, $filtro){
        $sql="select count(*) from Departamentos where descDepartamento like concat('%',?,'%')";
        
        $resultado=DBPDO::ejecutaConsulta($sql.$filtro, [$descDepartamento]);
        if($resultado->rowCount()>0){
            $registros=$resultado->fetchColumn(0);
        }
        else{
            $registros=0;
        }
        return $registros;
    }
    /**
     * Función altaDepartamento
     * 
     * Última revisión 03/02/2019
     * Inserta un registro en la DB correspondiente a un nuevo departamento
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @param string $descDepartamento descripción del departamento
     * @param int $volumenDeNegocio ingresos del departamento
     * @return array $departamento array con los datos del nuevo departamento
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
        $fechaHora=new dateTime();
        $departamento=[];
        
        $sql="insert into Departamentos values (:cod, :desc, :fCreacion, :vlm, :fBaja)";
        $parametros=[":cod"=>$codDepartamento, ":desc"=>$descDepartamento, ":fCreacion"=>$fechaHora->getTimestamp(), ":vlm"=>$volumenDeNegocio, ":fBaja"=>NULL];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros);
        
        if($resultado->rowCount()==1){
            $departamento["codDepartamento"]=$codDepartamento;
            $departamento["descDepartamento"]=$descDepartamento;
            $departamento["fechaCreacionDepartamento"]=$fechaHora->getTimestamp();
            $departamento["volumenDeNegocio"]=$volumenDeNegocio;
            $departamento["fechaBajaDepartamento"]=NULL;
        }
        
        return $departamento;
    }
    /**
     * Función bajaFisicaDepartamento
     * 
     * Última revisión 05/02/2019
     * Se borra el registro en la DB borrando a su vez el departamento
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public static function bajaFisicaDepartamento($codDepartamento){
        $sql="delete from Departamentos where codDepartamento=:cod";
        $parametros=[":cod"=>$codDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros);
        
        if($resultado->rowCount()==1){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Función modificarDepartamento
     * 
     * Última revisión 04/02/2019
     * Se actualizan los registros en la DB actualizando a su vez los datos del departamento
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @param string $descDepartamento descripción del departamento
     * @param int $volumenDeNegocio ingresos del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public static function modificarDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
        $sql="update Departamentos set descDepartamento=:desc, volumenDeNegocio=:vol where codDepartamento=:cod";
        $parametros=[":desc"=>$descDepartamento, ":vol"=>$volumenDeNegocio, ":cod"=>$codDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros);
        
        if($resultado->rowCount()==1){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Función bajaLogicaDepartamento
     * 
     * Última revisión 05/02/2019
     * Se actualizan los campos en la DB actualizando a su vez los datos del departamento
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @param int $fechaBajaDepartamento fecha de baja del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public static function bajaLogicaDepartamento($codDepartamento, $fechaBajaDepartamento){
        $sql="update Departamentos set fechaBajaDepartamento=:fechaBaja where codDepartamento=:cod";
        $parametros=[":fechaBaja"=>$fechaBajaDepartamento, ":cod"=>$codDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros);
        
        if($resultado->rowCount()==1){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Función rehabilitarDepartamento
     * 
     * Última revisión 05/02/2019
     * Se actualizan los campos en la DB actualizando a su vez los datos del departamento
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public static function rehabilitarDepartamento($codDepartamento){
        $sql="update Departamentos set fechaBajaDepartamento=NULL where codDepartamento=:cod";
        $parametros=[":cod"=>$codDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros);
        
        if($resultado->rowCount()==1){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Función validaCodNoExiste
     * 
     * Última revisión 04/02/2019
     * Comprueba en la DB si existen los datos para el departamento correspondiente
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public static function validaCodNoExiste($codDepartamento){
        $sql="select * from Departamentos where codDepartamento=:cod";
        $parametros=[":cod"=>$codDepartamento];
        
        $resultado=DBPDO::ejecutaConsulta($sql, $parametros);
        
        if($resultado->rowCount()==0){
            return true;
        }
        else{
            return false;
        }
    }
}
?>