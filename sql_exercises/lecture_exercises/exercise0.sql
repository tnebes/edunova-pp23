drop database if exists counties;
create database counties;
use counties;

create table county(
    id int not null primary key auto_increment,
    `name` varchar(50) not null,
    county_governor int not null
);

create table county_governor(
    id int not null primary key auto_increment,
    first_name varchar(50),
    last_name varchar(50)
);

create table municipality(
    id int not null primary key auto_increment,
    county int not null,
    `name` varchar(50)
);

alter table county
	add foreign key (county_governor) references county_governor(id);
alter table municipality
	add foreign key (county) references county(id);

INSERT INTO county_governor (first_name, last_name) VALUES
	('Stipe', 'Stipic'),
	('Pero', 'Peric'),
	('Ivan', 'Ivanovic');
	
insert into county (`name`, county_governor) values
	('Osječko-baranjska županija', 1),
	('Zadarska županija', 2),
	('Ličko-senjska županija', 3);
	
insert into municipality (`name`, county) values
	('Bobotina', 1),
	('Donji Šikanovci', 1),
	('Gornji Gorani', 2),
	('Zadar', 2),
	('Gospić', 3),
	('Lički Osik', 3);