use mysql;
alter user 'root'@'localhost' IDENTIFIED BY 'fjeclot';
flush privileges;
create user 'admin'@'localhost' identified by "clotfje";
/*
Creant base de dades i taula
*/
create database testExam;
use testExam;
create table testForm(
	id_usuari int(10) unsigned auto_increment primary key,
	nom_usuari varchar(20) not null,
	contrasenya_usuari varchar(10)		
);       

/*
# Donant permisos a  admin dins de la base de dades escola
*/
grant create on testExam.* to 'admin'@'localhost';
grant select,insert,delete, update on testExam.* to 'admin'@'localhost';

-- grant create on testExam.* to 'root'@'localhost';
-- grant select,insert,delete, update on testExam.* to 'root'@'localhost';