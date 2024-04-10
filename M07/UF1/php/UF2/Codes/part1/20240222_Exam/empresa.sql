use mysql;
create user 'romsar'@'localhost' identified by "fjeclot24";

create database empresa_romasar;
use empresa_romasar;

create table treballadors_romsar(
	id int(5) unsigned auto_increment primary key,
	nom varchar(30) not null,
	cognoms varchar(50) not null,
	categoria int(2) not null,
	observacions varchar(150) not null
);       

grant select,insert,update,delete on treballadors_romsar to 'romsar'@'localhost';
grant create on empresa_romasar.* to 'romsar'@'localhost';

delimiter //
create procedure gentrecat1()
begin
	set @nTreb = 1;
	while @nTreb <= 10 do
		insert into treballadors_romsar (nom, cognoms, categoria, observacions) values (concat('nom', @nTreb), concat('cognom',@nTreb), 1, 'Treballador generic - categoria 1');		
		set @nTreb = @nTreb + 1;
	end while; 
end//
delimiter ;
call gentrecat1();

delimiter //
create procedure gentrecat2()
begin
	set @nTreb = 11;
	while @nTreb <= 50 do
		insert into treballadors_romsar (nom, cognoms, categoria, observacions) values (concat('nom', @nTreb), concat('cognom',@nTreb), 2, 'Treballador generic - categoria 2');
		set @nTreb = @nTreb + 1;
	end while; 
end//
delimiter ;
call gentrecat2();