-- drop database db;
-- create database db;
-- drop table user;

use db;

CREATE TABLE user (
    id INTEGER NOT NULL AUTO_INCREMENT,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(200) NOT NULL,
    Primary key(id)
);

CREATE TABLE category (
	id INTEGER NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    Primary key(id)
);

--SELECT * FROM `category`;
--INSERT INTO category SET id = 2, title = 'Bootstrap';






