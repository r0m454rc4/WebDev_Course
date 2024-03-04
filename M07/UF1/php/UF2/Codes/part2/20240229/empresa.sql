use mysql;
create user 'administrador'@'localhost' identified by "FjeClot24#";
create database empresa;
use empresa;
grant all privileges on empresa.* to 'administrador'@'localhost';
