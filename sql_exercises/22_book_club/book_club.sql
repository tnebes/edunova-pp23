/*
 * The Readers' Club consists of members who read books. One reader can read more
 * a book, while one book over a longer period of time can be read by multiple readers.
 * Each book has one and only one owner while one owner can have more than one
 * book. The owner is also the reader. 
*/

drop database if exists book_club;

create database book_club;

use book_club;

create table member(
    id int not null primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    date_joined date not null default CURRENT_TIMESTAMP,
    date_left date
);

create table owner(
    id int not null primary key auto_increment,
    member int not null
);

create table book(
    id int not null primary key auto_increment,
    title varchar(150) not null,
    author varchar(255) not null,
    `year` date,
    `owner` int not null
);

create table member_book(
    member int not null,
    book int not null,
    reading_start date not null default CURRENT_TIMESTAMP,
    reading_end date,
    is_read bit not null
);

alter table owner
    add foreign key (member) references member(id);

alter table book
    add foreign key (owner) references owner(id);

alter table member_book
    add foreign key (member) references member(id);
alter table member_book
    add foreign key (book) references book(id);





