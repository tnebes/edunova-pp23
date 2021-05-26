drop database if exists iwtl;
create database iwtl;
use iwtl;

create table user(
    id int primary key not null auto_increment,
    username varchar(50) not null,
    `password` varchar(255) not null,
    email varchar(255) not null,
    registration_date datetime not null default CURRENT_TIMESTAMP,
    last_online datetime,
    active bit not null default 1
);

create table operator(
    id int primary key not null auto_increment,
    user int not null
);

create table topic(
    id int primary key not null auto_increment,
    `name` varchar(255) not null,
    `description` text not null,
    date_posted datetime not null default CURRENT_TIMESTAMP,
    image int
);

create table material(
    id int primary key not null auto_increment,
    `user` int not null,
    title varchar(255) not null,
    short_description varchar(255),
    long_description text,
    topic int not null,
    date_posted datetime not null default CURRENT_TIMESTAMP
);

create table image(
    id int primary key not null auto_increment,
    alt_text varchar(255),
    file_path varchar(255),
    user int not null
);

create table material_image(
    material int not null,
    `image` int not null
);

/*
create table topic_material(
    topic int not null,
    material int not null
);
*/

create table user_topic(
    `user` int not null,
    topic int not null
);

create table user_material(
    `user` int not null,
    material int not null
);

alter table operator
    add foreign key (user) references user(id);
   
alter table topic
	add foreign key (image) references image(id);

alter table material
    add foreign key (user) references user(id);
alter table material
    add foreign key (topic) references topic(id);

alter table image 
    add foreign key (user) references user(id);

alter table material_image
    add foreign key (material) references material(id);
alter table material_image
    add foreign key (image) references image(id);

/*
alter table topic_material
    add foreign key (topic) references topic(id);
alter table topic_material
    add foreign key (material) references material(id);
*/
   
alter table user_topic
    add foreign key (user) references user(id);
alter table user_topic
    add foreign key (topic) references topic(id);

alter table user_material
    add foreign key (user) references user(id);
alter table user_material
    add foreign key (material) references material(id);




