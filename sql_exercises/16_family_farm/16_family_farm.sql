/*
 * A family farm produces raw materials.
 * One product can contain more raw materials.
 * One raw material can be found in one product.
 * One employee is responsible for one or more products.
 */

drop database if exists 16_family_farm;
create database 16_family_farm;
use 16_family_farm;

create table raw_material(
	id int primary key not null auto_increment,
	name varchar(100) not null,
	description varchar(255),
	dangerous bit not null default 0,
	quantity int not null default 0
);

create table employee(
	id int primary key not null auto_increment,
	first_name varchar(255) not null,
	last_name varchar(255) not null,
	iban varchar(32) not null,
	oib char(11) not null,
	phone_number varchar(32) not null,
	active bit not null default 1
);

create table product(
	id int primary key not null auto_increment,
	name varchar(50) not null,
	description text,
	quantity int not null default 0,
	dangerous bit not null default 0,
	price decimal(14,2) not null,
	employee int
);

create table raw_material_product(
	raw_material int not null,
	product int not null,
	date_added datetime not null default current_timestamp
);

alter table product
	add foreign key (employee) references employee(id);

alter table raw_material_product
	add foreign key (raw_material) references raw_material(id);
alter table raw_material_product
	add foreign key (product) references product(id);

