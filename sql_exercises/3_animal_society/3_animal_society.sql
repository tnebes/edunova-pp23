/*
 * The society has multiple employees. Each employee cares for one or more wards.
 * The animals are wards. Each ward is located in one area.
*/

DROP database IF EXISTS 3_animal_society;
CREATE database 3_animal_society;
use 3_animal_society;

CREATE TABLE employee(
	id int PRIMARY KEY NOT NULL auto_increment,
	first_name varchar(50) NOT NULL,
	last_name varchar(50) NOT NULL,
	iban varchar(32) NOT NULL,
	phone_number varchar(32) NOT NULL
);

CREATE TABLE animal(
	id int PRIMARY KEY NOT NULL auto_increment,
	`name` varchar(255),
	latin_name varchar(255),
	herbivore bit NOT NULL,
	carnivore bit NOT NULL
);

CREATE TABLE ward(
	id int PRIMARY KEY NOT NULL auto_increment,
	animal int NOT NULL,
	ward_name varchar(255),
	date_admitted datetime NOT NULL DEFAULT current_timestamp,
	date_expunged datetime,
	area int NOT NULL
);

CREATE TABLE area(
	id int PRIMARY KEY NOT NULL auto_increment,
	`size` decimal(14,2),
	max_occupants SMALLINT NOT NULL
);

CREATE TABLE employee_ward(
	employee int NOT NULL,
	ward int NOT NULL
);

ALTER TABLE ward
	ADD FOREIGN KEY (animal) REFERENCES animal(id);
ALTER TABLE ward
	ADD FOREIGN KEY (area) REFERENCES area(id);
	
ALTER TABLE employee_ward
	ADD FOREIGN KEY (employee) REFERENCES employee(id);
ALTER TABLE employee_ward
	ADD FOREIGN KEY (ward) REFERENCES ward(id);