use mysql;
create user 'rosaca'@'localhost' identified by "FjeClot23@";
create database rosaca2023;
use bdcli;

create table tlcli(
	codi int(10) unsigned not null,
	nom varchar(20) not null,
	cognoms varchar(50) not null,
	email varchar(50) not null,
	ctsnya varchar(255) not null
);   
    
alter table tlcli add primary key(codi);
alter table tlcli modify codi int(10) unsigned not null auto_increment;
grant select,insert,delete, update on bdcli.tlcli to 'adcli'@'localhost';
insert into tlcli (nom,cognoms,email,ctsnya) values("paula", "pérez pons", "app@clot.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("joan", "ramírez rocamora", "jrr@fje.net","");
insert into tlcli (nom,cognoms,email,ctsnya) values("pere", "masponts matadepera", "pmm@daw2.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("esther", "casajoana contreras", "mcc@fjeclot.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("sergi", "dalmau delacroix", "jdd@clotfje.net","");
