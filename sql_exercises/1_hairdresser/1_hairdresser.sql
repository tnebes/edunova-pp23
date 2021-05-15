/*
 * A hair salon has multiple employees. An employee works with multiple customers.
 * A customer chooses a service during a visit.
*/

DROP database IF EXISTS 1_hairdresser;
CREATE database 1_hairdresser;
use 1_hairdresser;


create table person(
	id int primary key not null auto_increment,
	first_name varchar(50) not null,
	last_name varchar(50) not null,
	phone_number varchar(255)
);

create table employee(
	id int primary key not null auto_increment,
	person int not null,
	iban varchar(32) not null
);

create table customer(
	id int primary key not null auto_increment,
	person int not null,
	has_discount bit not null default 0
);

create table service(
	id int primary key not null auto_increment,
	price decimal(14,2) not null,
	`name` varchar(100) not null,
	description varchar(255)
);

create table visit(
	id int primary key not null auto_increment,
	customer int not null,
	service int not null,
	employee int not null,
	visit_time datetime not null
);

alter table employee 
	add foreign key (person) references person(id);

alter table customer
	add foreign key (person) references person(id);
	
alter table visit
	add foreign key (customer) references customer(id);
alter table visit
	add foreign key (service) references service(id);
alter table visit
	add foreign key (employee) references employee(id);
 