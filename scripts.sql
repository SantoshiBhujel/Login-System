drop database if exists loginsystem;
create database loginsystem;
use loginsystem;

create table users(
    id int primary key auto_increment,
    username varchar(100) not null unique,
    password varchar(255) not null 
);

insert into users(username, password) values('admin', md5('admin'));
insert into users(username, password) values('user', md5('user'));