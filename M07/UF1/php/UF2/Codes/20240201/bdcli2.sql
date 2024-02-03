# Permisos adlci: creació, modificació i execució de procediments emmagatzemats dins de bcdcli 
use mysql;
grant create routine on bdcli.* to 'adcli'@'localhost';
grant alter routine on bdcli.* to 'adcli'@'localhost';
grant execute on bdcli.* to 'adcli'@'localhost';

