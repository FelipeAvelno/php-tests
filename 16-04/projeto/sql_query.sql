 create database estacionamento;
 use estacionamento;
 
 CREATE TABLE tbl_pessoa(
	id_pessoa integer auto_increment primary key,
    nome_pessoa varchar(200) not null,
    cpf_pessoa char(11) not null unique,
    estatus char(1) not null
);

CREATE TABLE tbl_carros(
	id_carro integer auto_increment primary key,
    marca varchar(50) not null,
    modelo varchar(100) not null,
    placa varchar(10) not null unique,
    cor varchar(20) not null,
    ano integer not null,
    id_tbl_pessoa integer,
    foreign key (id_tbl_pessoa) references tbl_pessoa (id_pessoa)
);

insert into tbl_pessoa(nome_pessoa, cpf_pessoa, estatus) values ("abcd", "12345", "1");
insert into tbl_carros(marca, modelo, placa, cor, ano, id_tbl_pessoa) values ("marca", "modelo", "placa", "cor", 0, 1);

select * from tbl_carros;
select * from tbl_pessoa;

drop table tbl_pessoa;
drop table tbl_carros;