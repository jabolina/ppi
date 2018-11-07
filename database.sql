drop schema if exists VJV_CLINIC;
create schema if not exists VJV_CLINIC;
use VJV_CLINIC;

create table if not exists VJV_MESSAGES
(
	ID int auto_increment,
	CLIENT_NAME varchar(255) not null,
	CLIENT_EMAIL varchar(255) null,
	CLIENT_REASON varchar(40) not null,
	CLIENT_MESSAGE varchar(255) not null,
	constraint VJV_MESSAGES_ID_uindex
		unique (ID)
)
;

alter table VJV_MESSAGES
	add primary key (ID)
;

create table if not exists VJV_USERS
(
	ID int auto_increment,
	USER_EMAIL varchar(255) not null,
	USER_PASSWORD varchar(255) not null,
	constraint VJV_USERS_ID_uindex
		unique (ID)
)
;

insert into VJV_USERS
value
(
	null,
	'admin@vjvclinic.com',
	'@@vjv_cl1n1c@@'
);


create table if not exists VJV_EMPLOYEES
(
	ID int auto_increment,
	NOME varchar(255) not null,
	NASCIMENTO date not null,
	ESTADO_CIVIL int not null,
	GENERO int not null,
	CARGO int not null,
	ESPECIALIDADE int,
	CPF varchar(13) not null,
	RG varchar(10) not null,
	constraint VJV_EMPLOYEES_ID_uindex
		unique (ID)
);

create table if not exists VJV_EMPLOYEES_ADRESS
(
	ID_EMPLOYEE int not null,
	CEP varchar(8) not null,
	TIPO_LOGRADOURO int not null,
	LOGRADOURO varchar(255) not null,
	NUMERO int not null,
	COMPLEMENTO varchar(25),
	BAIRRO varchar(255) not null,
	CIDADE int not null,
	ESTADO char(2) not null,
	FOREIGN KEY (ID_EMPLOYEE) REFERENCES VJV_EMPLOYEES(ID)
);