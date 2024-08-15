create database if not exists api;
use api;
drop table if exists users;
create table users
(
    id       int primary key auto_increment,
    name     varchar(255) not null,
    email    varchar(255) not null,
    password varchar(255) not null
);