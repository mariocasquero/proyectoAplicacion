/**
 * Author:  Mario Casquero Jañéz DAW2
 * Created: 23-ene-2019
 * Script de creación de la base de datos DAW209Aplicacion1819, la tabla Usuarios, la tabla Departamentos y el usuario de la base de datos
 */

--Se crea la base de datos--
create database if not exists DAW209Aplicacion1819;
--Se utiliza la base de datos creada--
use DAW209Aplicacion1819;
--Se crean las tablas--
create table if not exists Usuarios(codUsuario varchar(8) primary key, password varchar(255), descUsuario varchar(255), numAccesos int, fechaHoraUltimaConexion int, perfil enum('usuario', 'administrador'))engine=INNODB;
create table if not exists Departamentos(codDepartamento char(3) primary key, descDepartamento varchar(255), fechaCreacionDepartamento int, volumenDeNegocio int, fechaBajaDepartamento int)engine=INNODB;
--Se crea el usuario--
create user 'usuarioDBAplicacion1819'@'%' identified by 'paso';
--Se le asignan los privilegios al usuario--
grant all privileges on DAW209Aplicacion1819.* to 'usuarioDBAplicacion1819'@'%';