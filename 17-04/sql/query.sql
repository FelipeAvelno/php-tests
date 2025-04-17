create database bd_estacionamento;
use bd_estacionamento;

create table sensores(
	id_leitura int auto_increment primary key,
    temperatura decimal(5, 2) default 0,
    umidade int default 0,
    luminosidade varchar(15),
    data_leitura datetime default now()
);