/*
1- Bucle while
2- variables
3- concatenació
4- delimitadors
5- creació de procedures
6- crida a procedures
7- creació de bases de dades, taules i usuaris
8- Assignació de passwords a usuaris
9- Donant permisos a usuaris
*/

/*
Treballant amb usuaris
*/
use mysql;
alter user 'root'@'localhost' IDENTIFIED BY 'fjeclot';
flush privileges;
create user 'admin'@'localhost' identified by "clotfje";
/*
Creant base de dades i taula
*/
create database escola;
use escola;
create table alumnes(
	id_usuari int(10) unsigned auto_increment primary key,
	nom_usuari varchar(20) not null,
	contrasenya_usuari varchar(10)		
);       

/*
# Donant permisos a  admin dins de la base de dades escola
*/
grant create on escola.* to 'admin'@'localhost';
grant select,insert,delete, update on escola.* to 'admin'@'localhost';

/*
# Afegin dades amb un bucle while
*/
delimiter //
create procedure crea20alumnes()
begin
	set @nalum = 1;
	while @nalum <= 20 do
		insert into alumnes (nom_usuari,contrasenya_usuari) values (concat('alum',@nalum), concat('fjeclot',@nalum));		
		set @nalum = @nalum + 1;
	end while; 
end//
delimiter ;
call crea20alumnes();
