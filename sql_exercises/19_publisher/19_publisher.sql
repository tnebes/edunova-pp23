/*
 * The publisher publishes works.
 * One publisher can publish several works while one work can be published by several publishers.
 * A publisher is located in one place while one place can have several publishers.
*/

drop database if exists 19_publisher;
create database 19_publisher;
use 19_publisher;

create table place(
    id int not null primary key auto_increment,
    country varchar(100) not null,
    city varchar(100) not null,
    street varchar(100) not null
);

create table publisher(
    id int not null primary key auto_increment,
    `name` varchar(150) not null,
    place int not null
);

create table work(
    id int not null primary key auto_increment,
    title varchar(150) not null
);

create table author(
    id int not null primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    dob date
);

create table work_author(
    work int not null,
    author int not null
);

create table work_publisher(
    work int not null,
    publisher int not null,
    publishing_year date
);

alter table publisher
    add foreign key (place) references place(id);

alter table work_author
    add foreign key (work) references work(id);
alter table work_author
    add foreign key (author) references author(id);

alter table work_publisher
    add foreign key (work) references work(id);
alter table work_publisher
    add foreign key (publisher) references publisher(id);


