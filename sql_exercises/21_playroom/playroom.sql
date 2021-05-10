/*
 * In the children's playroom, children play in groups. One child can play in more
 * group and one group consists of several children. Each group is led by one educator. 
*/

drop database if exists playroom;
create database playroom;
use playroom;

create table person(
    id int not null primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null
);

create table child(
    id int not null primary key auto_increment,
    person int not null,
    parent_phone varchar(24) not null,
    parent_email varchar(255) not null,
    dob date not null,
    is_active bit not null default 1
);

create table educator(
    id int primary key not null auto_increment,
    person int not null,
    email varchar(255) not null,
    phone_number varchar(24) not null,
    iban varchar(32) not null
);

create table `group`(
    id int primary key not null auto_increment,
    `name` varchar(100) not null,
    min_age tinyint not null,
    max_age tinyint not null,
    educator int not null
);

create table child_group(
    child int not null,
    `group` int not null,
    date_joined date not null default current_date,
    date_left date,
    is_in_group bit default 1
);

alter table child
    add foreign key (person) references person(id);

alter table educator
    add foreign key (person) references person(id);

alter table `group`
    add foreign key (educator) references educator(id);

alter table child_group
    add foreign key (child) references child(id);
alter table child_group
    add foreign key (`group`) references `group`(id);
