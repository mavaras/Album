DROP DATABASE esteban_y_mario;
CREATE DATABASE esteban_y_mario;
USE esteban_y_mario;

CREATE TABLE esteban_y_mario.user (
	id INTEGER(16) PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(32) NOT NULL,
	nickname VARCHAR(32) NOT NULL,
	email VARCHAR(64) NOT NULL,
	pass VARCHAR(32) NOT NULL,
	avatar VARCHAR(255),
	rol VARCHAR(32) NOT NULL
);

CREATE TABLE esteban_y_mario.album (
	id INTEGER(16) PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(32) NOT NULL,
	description VARCHAR(255),
	user INTEGER(16),
	FOREIGN KEY(user) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE esteban_y_mario.photo (
	id INTEGER(16) PRIMARY KEY AUTO_INCREMENT,
	img VARCHAR(32) NOT NULL,
	description VARCHAR(255),
	title VARCHAR(255),
	comments VARCHAR(255)
);

CREATE TABLE esteban_y_mario.album_photo (
	id_album INTEGER(16),
	id_photo INTEGER(16),
	indice INTEGER(16),
	FOREIGN KEY(id_album) REFERENCES album(id) ON DELETE CASCADE,
	FOREIGN KEY(id_photo) REFERENCES photo(id) ON DELETE CASCADE,
	PRIMARY KEY(id_album, id_photo)
);

-- Consultas

-- SELECT *
-- FROM album_photo AS AP, album AS A, photo AS P
-- WHERE A.id = AP.id_album AND P.id = AP.id_photo AND A.id = 1;