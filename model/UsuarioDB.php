<?php
/**
 * Archivo UsuarioDB.php
 * 
 * Especifica los métodos que han de ser implementados en UsuarioPDO
 * 
 * @author Mario Casquero Jáñez
 * @package modelo
 */

/**
 * Class UsuarioDB
 */
interface UsuarioDB{
    /**
     * Función validarUsuario
     * 
     * Implementa la función validarUsuario
     * 
     * @author Mario Casquero Jáñez
     * @param string $codUsuario codigo del usuario
     * @param string $password contraseña propia del usuario
     */
    public static function validarUsuario($codUsuario, $password);
    /**
     * Función altaUsuario
     * 
     * Implementa la función altaUsuario
     * 
     * @author Mario Casquero Jáñez
     * @param string $codUsuario código del usuario
     * @param string $password contraseña propia del usuario
     * @param string $descUsuario descripción del usuario
     */
    public static function altaUsuario($codUsuario, $password, $descUsuario);
    /**
     * Función modificarUsuario
     * 
     * Implementa la función modificarUsuario
     * 
     * @author Mario Casquero
     * @param string $codUsuario código del usuario
     * @param string $descusuario descripción del usuario
     */
    public static function modificarUsuario($codUsuario, $descusuario);
    /**
     * Función cambiarPassword
     * 
     * Implementa la función cambiarPassword
     * 
     * @author Mario Casquero Jáñez
     * @param string $password contraseña propia del usuario
     * @param string $codUsuario código del usuario
     */
    public static function cambiarPassword($password, $codUsuario);
    /**
     * Función borrarUsuario
     * 
     * Implementa la función borrarUsuario
     * 
     * @author Mario Casquero Jáñez
     * @param string $codUsuario código del usuario
     */
    public static function borrarUsuario($codUsuario);
    /**
     * Función registrarUltimaConexion
     * 
     * Implementa la función registrarUltimaConexion
     * 
     * @author Mario Casquero Jáñez
     * @param string $codUsuario código del usuario
     */
    public static function registrarultimaConexion($codUsuario);
    /**
     * Función validarCodNoExiste
     * 
     * Implementa la función validarCodNoExiste
     * 
     * @author Mario Casquero Jáñez
     * @param string $codusuario código del usuario
     */
    public static function validarCodNoExiste($codusuario);
}
?>