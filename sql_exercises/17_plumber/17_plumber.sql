/*
 * A plumber repairs plumbing. During one repair he can repair multiple installations. A repair can be done more than once.
 * His apprentice helps him during certain repairs.
*/

drop database if exists 17_plumber;
create database 17_plumber;
use 17_plumber;

create table apprentice(
    id int not null primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null
);

create table installation(
    id int not null primary key auto_increment,
    `name` varchar(255),
    `location` varchar(255)
);

create table malfunction(
    id int not null primary key auto_increment,
    installation int not null,
    `name` varchar(100),
    `description` text,
    repaired bit not null default 0,
    date_reported datetime not null default current_timestamp,
    date_repaired datetime
);

create table repair(
    id int not null primary key auto_increment,
    installation int not null,
    repair_date_start datetime not null,
    repair_date_done datetime,
    repair_done bit not null default 0
);

create table malfunction_repair(
    malfunction int not null,
    repair int not null,
    repair_date datetime not null,
    apprentice int
);

alter table malfunction
    add foreign key (installation) references installation(id);

alter table repair
    add foreign key (installation) references installation(id);

alter table malfunction_repair
    add foreign key (malfunction) references malfunction(id);
alter table malfunction_repair
    add foreign key (repair) references repair(id);
alter table malfunction_repair
    add foreign key (apprentice) references apprentice(id);


