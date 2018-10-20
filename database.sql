drop schema if exists VJV_CLINIC;
create schema VJV_CLINIC;
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

