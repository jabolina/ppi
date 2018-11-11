drop schema if exists VJV_CLINIC;
create schema if not exists VJV_CLINIC;
use VJV_CLINIC;

create table VJV_EMPLOYEES
(
	ID int auto_increment,
	EMPLOYEE_NAME varchar(255) not null,
	EMPLOYEE_BIRTHDAY varchar(255) not null,
	ESTADO_CIVIL varchar(30) null,
	EMPLOYEE_SEX varchar(10) not null,
	EMPLOYEE_ROLE varchar(20) not null,
	EMPLOYEE_SPECIALTY varchar(40) null,
	EMPLOYEE_CPF varchar(13) not null,
	EMPLOYEE_RG varchar(10) not null,
	constraint EMPLOYEE_CPF
		unique (EMPLOYEE_CPF),
	constraint VJV_EMPLOYEES_ID_uindex
		unique (ID)
)
;

alter table VJV_EMPLOYEES
	add primary key (ID)
;

create table VJV_EMPLOYEES_ADDRESS
(
	ID int auto_increment,
	ID_EMPLOYEE int not null,
	CEP varchar(8) not null,
	STREET_TYPE int null,
	STREET varchar(255) not null,
	NUMBER int not null,
	COMPLEMENT varchar(25) null,
	NEIGH varchar(255) not null,
	CITY varchar(255) not null,
	PROVINCE varchar(255) not null,
	constraint VJV_EMPLOYEES_ADDRESS_ID_uindex
		unique (ID),
	constraint VJV_EMPLOYEES_ADDRESS_ibfk_1
		foreign key (ID_EMPLOYEE) references VJV_EMPLOYEES (ID)
)
;

create index ID_EMPLOYEE
	on VJV_EMPLOYEES_ADDRESS (ID_EMPLOYEE)
;

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

create table VJV_SCHEDULES
(
	ID int auto_increment,
	ID_DOCTOR int,
	DOCTOR_SPECIALTY varchar(40) not null,
	SCHEDULE_DATE varchar(255) not null,
	SCHEDULE_TIME varchar(255) not null,
	PATIENT_NAME varchar(255) not null,
	PATIENT_EMAIL varchar(255) not null,
	PATIENT_PHONE varchar(20) not null,
	constraint VJV_SCHEDULES_ID_uindex
		unique (ID),
	constraint VJV_SCHEDULES_ibfk_1
		foreign key (ID_DOCTOR) references VJV_EMPLOYEES (ID)
)
;

create index ID_DOCTOR
	on VJV_SCHEDULES (ID_DOCTOR)
;

alter table VJV_SCHEDULES
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

