<?php
/**
 * Archivo Departamento.php
 * 
 * Trabaja con la lógica de negocio creando departamentos y alterando su estado
 *
 * @package modelo
 */
require_once "DepartamentoPDO.php";
/**
 * Class Departamento
 * 
 * Clase que crea, borra, modifica y valida departamentos
 * 
 * @author Mario Casquero Jáñez
 */
class Departamento{
    /**
     * @var string $codDepartamento código del departamento
     */
    private $codDepartamento;
    /**
     * @var string $descDepartamento descripción del departamento
     */
    private $descDepartamento;
    /**
     * @var int $fechaCreacionDepartamento marca de tiempo de la creación del departamento 
     */
    private $fechaCreacionDepartamento;
    /**
     * @var int $volumenDeNegocio ingresos del departamento 
     */
    private $volumenDeNegocio;
    /**
     * @var int $fechaBajaDepartamento marca de tiempo de la baja del departamento
     */
    private $fechaBajaDepartamento;
    /**
     * Función constructor
     * 
     * Última revisión 04/02/2019
     * Crea el objeto departamento con los parámetros recibidos
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @param string $descDepartamento descripción del departamento
     * @param int $fechaCreacionDepartamento marca de tiempo de la creación del departamento
     * @param int $volumenDeNegocio ingresos del departamento
     * @param int $fechaBajaDepartamento marca de tiempo de la baja del departamento
     */
    function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento){
        $this->codDepartamento=$codDepartamento;
        $this->descDepartamento=$descDepartamento;
        $this->fechaCreacionDepartamento=$fechaCreacionDepartamento;
        $this->volumenDeNegocio=$volumenDeNegocio;
        $this->fechaBajaDepartamento=$fechaBajaDepartamento;
    }
    /**
     * Función getCodDepartamento
     * 
     * Devuelve el código del departamento
     * 
     * @return string
     */
    function getCodDepartamento(){
        return $this->codDepartamento;
    }
    /**
     * Función getDescDepartamento
     * 
     * Devuelve la descripción del departamento
     * 
     * @return string
     */
    function getDescDepartamento(){
        return $this->descDepartamento;
    }
    /**
     * Función getFechaCreacionDepartamento
     * 
     * Devuelve la fecha de la creación del departamento
     * 
     * @return int
     */
    function getFechaCreacionDepartamento(){
        return $this->fechaCreacionDepartamento;
    }
    /**
     * Función getVolumenDeNegocio
     * 
     * Devuelve el volumen de negocio
     * 
     * @return int
     */
    function getVolumenDeNegocio(){
        return $this->volumenDeNegocio;
    }
    /**
     * Función getFechaBajaDepartamento
     * 
     * Devuelve la fecha de baja del departamento
     * 
     * @return int
     */
    function getFechaBajaDepartamento(){
        return $this->fechaBajaDepartamento;
    }
    /**
     * Función setCodDepartamento
     * 
     * Modifica el código de departamento
     * 
     * @param string $codDepartamento código del departamento
     */   
    function setCodDepartamento($codDepartamento){
        $this->codDepartamento=$codDepartamento;
    }
    /**
     * Función setDescDepartamento
     * 
     * Modifica la descripción del departamento
     * 
     * @param string $descDepartamento descripción del departamento
     */
    function setDescDepartamento($descDepartamento){
        $this->descDepartamento=$descDepartamento;
    }
    /**
     * Función setFechaCreaciónDepartamento
     * 
     * Modifica la fecha de creación del departamento
     * 
     * @param int $fechaCreacionDepartamento marca de tiempo de la creación del departamento
     */
    function setFechaCreacionDepartamento($fechaCreacionDepartamento){
        $this->fechaCreacionDepartamento=$fechaCreacionDepartamento;
    }
    /**
     * Función setVolumenDeNegocio
     * 
     * Modifica los ingresos del departamento
     * 
     * @param int $volumenDeNegocio ingresos del departamento
     */
    function setVolumenDeNegocio($volumenDeNegocio){
        $this->volumenDeNegocio=$volumenDeNegocio;
    }
    /**
     * Función setFechaBajaDepartamento
     * 
     * Modifica la fecha de baja del departamento
     * 
     * @param int $fechaBajaDepartamento marca de tiempo de la baja del departamento
     */
    function setFechaBajaDepartamento($fechaBajaDepartamento){
        $this->fechaBajaDepartamento=$fechaBajaDepartamento;
    }
    /**
     * Función buscaDepartamentoPorCodigo
     * 
     * Última revisión 06/02/2019
     * Extrae toda la información del departamento en base al código proporcionado
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @return \Departamento $departamento objeto de la clase departamento con los atributos de éste
     */
    public static function buscaDepartamentoPorCodigo($codDepartamento){
        $departamento=NULL;
        
        $aDepartamento=DepartamentoPDO::buscaDepartamentoPorCodigo($codDepartamento);
        
        if(!empty($aDepartamento)){
            $departamento=new Departamento($aDepartamento["codDepartamento"], $aDepartamento["descDepartamento"], $aDepartamento["fechaCreacionDepartamento"], $aDepartamento["volumenDeNegocio"], $aDepartamento["fechaBajaDepartamento"]);
        }
        
        return $departamento;
    }
    /**
     * Función buscaDepartamentoPorDescripcion
     * 
     * Última revisión 06/02/2019
     * Extrae toda la información de todos los departamentos coincidentes
     * 
     * @author Mario Casquero Jáñez
     * @param string $descDepartamento descripción del departamento
     * @param string $filtro criterio de búsqueda
     * @param int $pagina página actual de la ventana
     * @param int $tamanyoPag número de registros por página
     * @return \Departamento $aDepartamentos array de objetos de la clase departamento con los atributos de éste
     */
    public static function buscaDepartamentoPorDescripcion($descDepartamento, $filtro, $pagina, $tamanyoPag){
        $departamentos=[];
        $aDepartamentos=[];
        
        $departamentos=DepartamentoPDO::buscaDepartamentoPorDescripcion($descDepartamento, $filtro, $pagina, $tamanyoPag);

        if(!empty($departamentos)){
            for($i=0; $i<count($departamentos); $i++){
                $aDepartamentos[$i]=new Departamento($departamentos[$i]["codDepartamento"], $departamentos[$i]["descDepartamento"], $departamentos[$i]["fechaCreacionDepartamento"], $departamentos[$i]["volumenDeNegocio"], $departamentos[$i]["fechaBajaDepartamento"]);
            }
        }
        return $aDepartamentos;
    }
    /**
     * Función contarDepartamentos
     * 
     * Última revisión 06/02/2019
     * Cuenta el número total de departamentos
     * 
     * @author Mario Casquero Jáñez
     * @param string $descDepartamento descripción del departamento
     * @param string $filtro criterio de búsqueda
     * @return int número de departamentos totales
     */
    public static function contarDepartamentos($descDepartamento, $filtro){
        return DepartamentoPDO::contarDepartamentos($descDepartamento, $filtro);
    }
    /**
     * Función altaDepartamento
     * 
     * Última revisión 04/02/2019
     * registra un nuevo departamento en la aplicación
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @param string $descDepartamento descripción del departamento
     * @param int $volumenDeNegocio ingresos del departamento
     * @return \Departamento $departamento objeto de la clase departamento con los atributos de éste
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
        $departamento=NULL;
        $arrayDepartamento=[];
        
        $arrayDepartamento=DepartamentoPDO::altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio);
        
        if(!empty($arrayDepartamento)){
            $departamento=new Departamento($codDepartamento, $descDepartamento, $arrayDepartamento["fechaCreacionDepartamento"], $volumenDeNegocio, $arrayDepartamento["fechaBajaDepartamento"]);
        }
        
        return $departamento;
    }
    /**
     * Función bajaFisicaDepartamento
     * 
     * Última revisión 04/02/2019
     * Borra un departamento de la aplicación
     * 
     * @author Mario Casquero Jáñez
     * @param string $codDepartamento código del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public function bajaFisicaDepartamento($codDepartamento){
        return DepartamentoPDO::bajaFisicaDepartamento($codDepartamento);
    }
    /**
     * Función modificarDepartamento
     * 
     * Última revisión 04/02/2019
     * Modifica un departamento de la aplicación
     * 
     * @author Mario Casquero Jáñez
     * @param string $descDepartamento descripción del departamento
     * @param int $volumenDeNegocio ingresos del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public function modificarDepartamento($descDepartamento, $volumenDeNegocio){
        $this->setDescDepartamento($descDepartamento);
        $this->setVolumenDeNegocio($volumenDeNegocio);
        return DepartamentoPDO::modificarDepartamento($this->getCodDepartamento(), $descDepartamento, $volumenDeNegocio);
    }
    /**
     * Función bajaLogicaDepartamento
     * 
     * Última revisión 05/02/2019
     * Da de baja temporal, un departamento de la aplicación
     * 
     * @author Mario Casquero Jáñez 
     * @param int $fechaBajaDepartamento marca de tiempo de la creación del departamento
     * @return boolean dependiendo de si todo es correcto o no
     */
    public function bajaLogicaDepartamento($fechaBajaDepartamento){
        $this->setFechaBajaDepartamento($fechaBajaDepartamento);
        return DepartamentoPDO::bajaLogicaDepartamento($this->getCodDepartamento(), $fechaBajaDepartamento);
    }
    /**
     * Función rehabilitarDepartamento
     * 
     * Última revisión 05/02/2019
     * Da de alta un departamento que estaba de baja temporal o lógica
     * 
     * @author Mario Casquero Jáñez
     * @return boolean dependiendo de si todo es correcto o no
     */
    public function rehabilitarDepartamento(){
        $this->setFechaBajaDepartamento(NULL);
        return DepartamentoPDO::rehabilitarDepartamento($this->getCodDepartamento());
    }
    /**
     * Función validaCodNoExiste
     * 
     * Última revisión 04/02/2019
     * @param string $codDepartamento código del departamento
     * 
     * @author Mario Casquero Jáñez
     * @return boolean dependiendo de si no existe ningún departamento
     */
    public static function validaCodNoExiste($codDepartamento){
        return DepartamentoPDO::validaCodNoExiste($codDepartamento);
    }
}
?>
