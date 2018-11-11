drop schema if exists VJV_CLINIC;
create schema if not exists VJV_CLINIC;
use VJV_CLINIC;

create table VJV_MESSAGES
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

create table VJV_USERS
(
	ID int auto_increment,
	USER_EMAIL varchar(255) not null,
	USER_PASSWORD varchar(255) not null,
	constraint VJV_USERS_ID_uindex
		unique (ID)
)
;

create table if not exists VJV_EMPLOYEES
(
	ID int auto_increment,
	EMPLOYEE_NAME varchar(255) not null,
	EMPLOYEE_BIRTHDAY varchar(255) not null,
	ESTADO_CIVIL varchar(30),
	EMPLOYEE_SEX varchar(10) not null,
	EMPLOYEE_ROLE varchar(20) not null,
	EMPLOYEE_SPECIALTY varchar(40),
	EMPLOYEE_CPF varchar(13) not null unique,
	EMPLOYEE_RG varchar(10) not null,
	constraint VJV_EMPLOYEES_ID_uindex
		unique (ID)
);

alter table VJV_EMPLOYEES
  add primary key (ID)
;

create table if not exists VJV_EMPLOYEES_ADDRESS
(
  ID int auto_increment,
	ID_EMPLOYEE int not null,
	CEP varchar(8) not null,
	STREET_TYPE int,
	STREET varchar(255) not null,
	`NUMBER` int not null,
	COMPLEMENT varchar(25),
	NEIGH varchar(255) not null,
	CITY varchar(255) not null,
	PROVINCE varchar(255) not null,
	FOREIGN KEY (ID_EMPLOYEE) REFERENCES VJV_EMPLOYEES(ID),
	constraint VJV_EMPLOYEES_ADDRESS_ID_uindex
	  unique (ID)
);
