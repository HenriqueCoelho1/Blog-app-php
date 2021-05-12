-- drop database db;
-- create database db;
--drop table user;
use db;

CREATE TABLE usr_user (
    usr_id INTEGER NOT NULL AUTO_INCREMENT,
    usr_name VARCHAR(40) NOT NULL,
    usr_password VARCHAR(200) NOT NULL,
    Primary key(usr_id)
);

CREATE TABLE ctg_category (
	ctg_id INTEGER NOT NULL AUTO_INCREMENT,
    cat_title VARCHAR(255) NOT NULL,
    Primary key(ctg_id)
);







