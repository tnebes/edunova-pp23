drop database if exists example_1;
create database example_1;
use example_1;

create table muskarac (
	id int primary key auto_increment not null,
	maraka decimal(17,7) not null,
	hlace varchar(45) not null,
	prstena int not null,
	nausnica int,
	neprijateljica int not null
);
create table neprijateljica (
	id int primary key auto_increment not null,
	indiferentno bit not null,
	modelnaocala varchar(39) not null,
	maraka decimal(12,10) not null,
	kratkamajica varchar(32) not null,
	ogrlica int
);
create table sestra (
	id int primary key auto_increment not null,
	introvertno bit not null,
	carape varchar(41),
	suknja varchar(41),
	narukvica int not null
);
create table punac (
	id int primary key auto_increment not null,
	modelnaocala varchar(39),
	treciputa datetime,
	drugiputa datetime,
	novcica decimal(14,6) not null,
	narukvica int
);
create table zarucnica (
	id int primary key auto_increment not null,
	stilfrizura varchar(40),
	prstena int not null,
	gustoca decimal(14,5),
	modelnaocala varchar(35) not null,
	nausnica int not null
);

alter table muskarac 
	add foreign key (neprijateljica) references neprijateljica(id);