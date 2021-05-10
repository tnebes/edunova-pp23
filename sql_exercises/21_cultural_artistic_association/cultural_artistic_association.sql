/*
 * A cultural and artistic association performs domestically and abroad.
 * Several members of a cultural and artistic association go to one performance, while one member can perform at several performances. Each performance takes place in one place. 
 */

drop database if exists 21_association;
create database 21_association;
use 21_association;

create table member(
    id int not null primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null
);

create table place(
    id int not null primary key auto_increment,
    city varchar(100) not null,
    street varchar(255),
    country varchar(100) not null
);

create table performance(
    id int not null primary key auto_increment,
    place int not null,
    time_of_performance datetime not null
);

create table member_performance(
    member int not null,
    performance int not null
);

alter table performance
    add foreign key (place) references place(id);

alter table member_performance
    add foreign key (member) references member(id);
alter table member_performance
    add foreign key (performance) references performance(id);



