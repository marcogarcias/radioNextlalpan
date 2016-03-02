CREATE DATABASE rnextlanpan
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

CREATE TABLE galeriaDinamica01(
idImg int AUTO_INCREMENT not null,
nombreImg varchar(50) DEFAULT 'galDin00',
tituloImg varchar(50) DEFAULT null,
descripcionMiniImg varchar(255) DEFAULT null,
descripcionCompletaImg text DEFAULT null,
visibleCarrusel bool DEFAULT 0,
visibleArticulo bool DEFAULT 0,
fechaCreacionImg date,
horaCreacionImg time,
url varchar(200) DEFAULT '#',
seleccionado bool DEFAULT 0,
orden tinyint(1) DEFAULT 0,
isDelete tinyint(1) DEFAULT 0,
PRIMARY KEY(idImg)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE usuarios(
idUser int AUTO_INCREMENT not null,
nombre varchar(25),
ap varchar(25),
am varchar(25),
email varchar(100),
password varchar(25),
nivel bool DEFAULT 0,
isDelete tinyint(1) DEFAULT 0,
PRIMARY KEY(idUser)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

/*
nivel: 0: admin; 1: normal
*/


INSERT INTO usuarios(nombre, ap, am, nick, password, nivel) VALUES
("goku", "son", "gohanda", "max@hotmail.com", "max", 1),
("bulma", "briefs", "briefs", "bulma@hotmail.com", "bul", 0);
