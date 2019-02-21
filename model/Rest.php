<?php
/**
 * Archivo Rest.php
 * 
 * Ofrece un web service del tipo API REST obtenido de la aemet
 *
 * @package modelo
 * @author Mario Casquero Jáñez
 */
/**
 * Class Rest
 */
class Rest{
    /**
     * Función datosAemet
     * 
     * Última revisión 04/02/2019
     * Devuelve los datos climatológicos de la estación recibida
     * 
     * @author Mario Casquero Jáñez
     * @param string $estacion código de la estación de la aemet
     * @return array $datos devuelve un array con los resultados formateados que han sido obtenidos en la consulta al web service
     */
    public static function datosAemet($estacion){
        $datos=NULL; //Array que se devuelve con los datos de la estación
        $respuesta=NULL; //Array con la primera respuesta del servicio
        $estado=true; //Declaración e inicialización de la variable del esatdo de la respuesta
        
        $key="eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJtYXJpb2J0ZTIyQGdtYWlsLmNvbSIsImp0aSI6IjdkOGU2MGU1LTk4NGUtNDY2Yy05NjM3LWU1NWI0YTQyNzRjYSIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNTQ5MDEzNjUwLCJ1c2VySWQiOiI3ZDhlNjBlNS05ODRlLTQ2NmMtOTYzNy1lNTViNGE0Mjc0Y2EiLCJyb2xlIjoiIn0.T3qbUkxxc8LsyghphzboJhFTQ5VD4nS7gaLsKAobnb0";
        
        $peticion=file_get_contents("https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/".$estacion."/?api_key=".$key."");
        $respuesta=json_decode($peticion, true);

        $peticion02=file_get_contents($respuesta["datos"]);
        $datos=json_decode($peticion02, true);
        
        return $datos[0];
    }
}