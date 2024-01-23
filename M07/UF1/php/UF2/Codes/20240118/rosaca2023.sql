-- SET PASSWORD FOR 'root'@localhost = PASSWORD("FjeClot23@");
-- Before I added the passwd for root, from https://mariadb.com/kb/en/set-password

use mysql;
create user 'rosaca'@'localhost' identified by "FjeClot23@";
create database rosaca23;
use rosaca23;

create table rosaca2023(
	codi int(10) unsigned not null,
	nom varchar(20) not null,
	cognoms varchar(50) not null,
	email varchar(50) not null,
	ctsnya varchar(255) not null
);       

alter table rosaca2023 add primary key(codi);
alter table rosaca2023 modify codi int(10) unsigned not null auto_increment;
grant select,insert,delete, update on rosaca2023 to 'rosaca'@'localhost';
insert into rosaca2023 (nom,cognoms,email,ctsnya) values("paula", "pérez pons", "app@clot.com","");
insert into rosaca2023 (nom,cognoms,email,ctsnya) values("joan", "ramírez rocamora", "jrr@fje.net","");
insert into rosaca2023 (nom,cognoms,email,ctsnya) values("pere", "masponts matadepera", "pmm@daw2.com","");
insert into rosaca2023 (nom,cognoms,email,ctsnya) values("esther", "casajoana contreras", "mcc@fjeclot.com","");
insert into rosaca2023 (nom,cognoms,email,ctsnya) values("sergi", "dalmau delacroix", "jdd@clotfje.net","");
