/**
 * Author:  Mario Casquero Jáñez DAW2
 * Created: 23-ene-2019
 * Script de insercción de valores en las tablas Usuarios y Departamentos
 */

--Se usa la base de datos--
use DAW209Aplicacion1819;
--Se insertan valores en la tabla Usuarios--
insert into Usuarios values ('mario', sha2('paso', 256), 'Mario Casquero', 0, 0, 'usuario');
insert into Usuarios values ('heraclio', sha2('paso', 256), 'Heraclio Borbujo', 0, 0, 'usuario');
insert into Usuarios values ('admin', sha2('paso', 256), 'Administrador', 0, 0, 'administrador');
--Se insertan valores en la tabla Departamentos-
insert into Departamentos values ('INF', 'Departamento de Informática', 0, 20000, NULL);
insert into Departamentos values ('MAT', 'Departamento de Matemáticas', 0, 10000, NULL);
insert into Departamentos values ('LNG', 'Departamento de Lengua', 0, 5000, NULL);