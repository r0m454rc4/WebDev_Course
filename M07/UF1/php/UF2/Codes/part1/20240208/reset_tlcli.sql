use bdcli;
-- ESBORRANT DADES I REINICIANT DEL VALOR AUTO INCREMENTAL
delete from tlcli;
alter table tlcli auto_increment=1;
-- TAULA tlcli EN CONDICIONS INICIALS
insert into tlcli (nom,cognoms,email,ctsnya) values("paula", "pérez pons", "app@clot.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("joan", "ramírez rocamora", "jrr@fje.net","");
insert into tlcli (nom,cognoms,email,ctsnya) values("pere", "masponts matadepera", "pmm@daw2.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("esther", "casajoana contreras", "mcc@fjeclot.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("sergi", "dalmau delacroix", "jdd@clotfje.net","");
-- NOVES ENTRADES
insert into tlcli (nom,cognoms,email,ctsnya) values("antoni", "puig gilabert", "apg@clot.com","");
insert into tlcli (nom,cognoms,email,ctsnya) values("lluís", "gonzález tamariu", "jgt@clot.edu","");
insert into tlcli (nom,cognoms,email,ctsnya) values("júlia", "mas peremunt", "pmm@daw2.com","");
-- VISUALITZA ENTRADES
select * from tlcli;
