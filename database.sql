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

drop table post;

CREATE TABLE post(
    id INTEGER NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    dh_insert DATETIME DEFAULT NOW(),
    image TEXT NOT NULL,
    content TEXT NOT NULL,
    tags VARCHAR(255) NOT NULL,
    comment_count INTEGER NOT NULL,
    status VARCHAR(255) DEFAULT 'Draft' NOT NULL,
    category INTEGER NOT NULL, 
    PRIMARY KEY(id),
    FOREIGN KEY(category) REFERENCES category(id)
);

CREATE TABLE comment(
    id INTEGER NOT NULL AUTO_INCREMENT,
    author VARCHAR(255) NOT NULL,
    email VARCHAR(255)NOT NULL,
    content TEXT NOT NULL,
    status VARCHAR(255) NOT NULL,
    dh_insert DATETIME DEFAULT NOW(),
    post INTEGER NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(post) REFERENCES post(id)	
);

-- DELETE FROM post WHERE id = 1;
-- ALTER TABLE post MODIFY comment_count INTEGER NOT NULL;
-- ALTER TABLE post MODIFY content TEXT NOT NULL;
-- SELECT * FROM `category`;
-- SELECT * FROM `post`;
-- INSERT INTO category SET id = 2, title = 'Bootstrap';
-- INSERT INTO user (id, username, password) VALUES (3, 'Claypson', 123456);
INSERT INTO comment (id, author, email, content, status, post) VALUES (1, 'Jeremias', 'jeremias@gmail.com', 'A really great text', 'Stoped', 1);
-- UPDATE post SET tags = 'cavalo' WHERE id = 1;
-- UPDATE post SET image = 'sample-6.png' WHERE id = 1;
-- SELECT * FROM `user`; 
-- INSERT INTO post SET id = 1, title = 'Teste', author = 'Ogro', image = 'minha_roupa.jpg', content = 'nothing.jpg', tags='N/A', comment_count = 1, status = 'running', category = 1;






