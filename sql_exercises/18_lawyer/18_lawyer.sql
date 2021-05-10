/*
 * One lawyer defends multiple clients.
 * He can defend one client more than once. He is assisted in his defense by his associates.
 * There can be several associates on one defense and one associate can participate on several defenses. 
*/

drop database if exists 18_lawyer;
create database 18_lawyer;
use 18_lawyer;

create table person(
    id int not null primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    oib char(11) not null
);

create table client(
    id int not null primary key auto_increment,
    person int not null,
    is_active bit not null default 1
);

create table employee(
    id int not null primary key auto_increment,
    person int not null,
    iban varchar(32) not null,
    date_employed date not null default CURRENT_DATE
);

create table lawyer(
    id int not null primary key auto_increment,
    employee int not null
);

create table associate(
    id int not null primary key auto_increment,
    employee int not null
);

create table defence(
    id int not null primary key auto_increment,
    lawyer int not null,
    client int not null,
    `time` datetime not null default CURRENT_TIMESTAMP
);

create table associate_defence(
    associate int not null,
    defence int not null,
    `time` datetime not null default CURRENT_TIMESTAMP
);

alter table client
    add foreign key (person) references person(id);

alter table employee
    add foreign key (person) references person(id);

alter table lawyer
    add foreign key (employee) references employee(id);

alter table associate
    add foreign key (employee) references employee(id);

alter table defence
    add foreign key (lawyer) references lawyer(id);
alter table defence
    add foreign key (client) references client(id);

alter table associate_defence
    add foreign key (associate) references associate(id);
alter table associate_defence
    add foreign key (defence) references defence(id);