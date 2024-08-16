create database if not exists crud;
use crud;
drop table if exists users;
create table users
(
    id int auto_increment primary key,
    name varchar(100) not null ,
    email varchar(100) not null ,
    password varchar(255) not null,
    created_at timestamp default current_timestamp
);