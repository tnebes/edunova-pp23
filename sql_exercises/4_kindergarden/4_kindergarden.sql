/*
 * A kindergarden has multiple educational groups.
 * Each educational group has multiple children and is lead by an educator.
 * Each educator has a qualification
*/

drop database if exists 4_kindergarden;
create database 4_kindergarden;
use 4_kindergarden;

create table person(
    id int primary key not null auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null
);

create table qualification(
    id int primary key not null auto_increment,
    `name` varchar(255),
    `level` tinyint not null default 0
);

create table educator(
    id int primary key not null auto_increment,
    person int not null,
    qualification int not null,
    phone_number varchar(32) not null,
    email_address varchar(255) not null,
    iban varchar(32) not null
);

create table child(
    id int primary key not null auto_increment,
    person int not null,
    educational_group int not null,
    parent_phone varchar(32) not null,
    parent_email varchar(32) not null
);

create table educational_group(
    id int primary key not null auto_increment,
    educator int not null,
    `name` varchar(10) not null,
    max_children tinyint not null default 5
);

alter table educator
    add foreign key (qualification) references qualification(id);
alter table educator
    add foreign key (person) references person(id);

alter table child
    add foreign key (person) references person(id);
alter table child
    add foreign key (educational_group) references educational_group(id);
    
alter table educational_group
	add foreign key (educator) references educator(id);