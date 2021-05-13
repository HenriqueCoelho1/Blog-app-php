-- drop database db;
-- create database db;
-- drop table user;
-- drop table posts;

use db;

CREATE TABLE user (
    id INTEGER NOT NULL AUTO_INCREMENT,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE category (
	id INTEGER NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE post(
    id INTEGER NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    dh_insert DATETIME NOT NULL,
    image TEXT NOT NULL,
    content TEXT NOT NULL,
    tags VARCHAR(255) NOT NULL,
    comment_count VARCHAR(255) NOT NULL,
    status VARCHAR(255) DEFAULT 'Draft' NOT NULL,
    category INTEGER NOT NULL, 
    PRIMARY KEY(id),
    FOREIGN KEY(category) REFERENCES category(id)
);

--SELECT * FROM `category`;
--INSERT INTO category SET id = 2, title = 'Bootstrap';












