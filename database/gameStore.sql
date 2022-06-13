DROP DATABASE gameStore;
CREATE DATABASE gameStore;
USE gameStore;

CREATE TABLE Log_(
idCambio INT PRIMARY KEY AUTO_iNCREMENT,
fechaModificacion DATETIME NOT NULL, 
descripcionCambio VARCHAR(500)
);

CREATE TABLE Usuario(
idUsuario INT PRIMARY KEY AUTO_INCREMENT, 
nombreUsuario VARCHAR(50) NOT NULL,
apellidoUsuario VARCHAR(50) NOT NULL,  
correoUsuario VARCHAR(50) NOT NULL UNIQUE,  
passwordUsuario VARCHAR(250) NOT NULL,
rolUsuario ENUM('user','admin') DEFAULT 'user' NOT NULL
);


CREATE TABLE detalleVenta(
	idTrasaccion INT PRIMARY KEY AUTO_INCREMENT,
    idVenta INT, FOREIGN KEY(idVenta) REFERENCES venta(idVenta) ON UPDATE CASCADE ON DELETE CASCADE,
    idJuego int,
    nombreJuego varchar(200),
    cantidad float
);


CREATE TABLE Venta(
idVenta INT PRIMARY KEY AUTO_INCREMENT,
idUsuario INT, FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE,
fechaVenta DATETIME,
monto FLOAT NOT NULL
);

CREATE TABLE Venta(
idVenta INT PRIMARY KEY AUTO_INCREMENT,
idUsuario INT, FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE,
idJuego INT, FOREIGN KEY(idJuego) REFERENCES Juego(idJuego) ON UPDATE CASCADE ON DELETE CASCADE,
cantidad INT NOT NULL,
monto FLOAT NOT NULL,
fechaVenta DATE NOT NULL
);



INSERT INTO `gamestore`.`usuario` (`nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `passwordUsuario`,`rolUsuario`) VALUES ('Abdiel', 'Flores', 'admin', '123456','admin');
INSERT INTO `gamestore`.`usuario` (`nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `passwordUsuario`,`rolUsuario`) VALUES ('Abdiel', 'Flores', 'a', '123456','user');


INSERT INTO juego VALUES (0, 'Rainbow Six Siege', 200.00, 'Ubisoft', 'Shooter', 2015,'Videojuego de disparos táctico en línea desarrollado por Ubisoft Montreal y distribuidor por Ubisoft.', 1);
INSERT INTO juego VALUES (0, 'GTA V', 300.00, 'Rockstar', 'Accion/Aventura', 2013,'Es un videojuego de acción-aventura de mundo abierto desarrollado por el estudio Rockstar North y distribuido por Rockstar Games.', 1);
INSERT INTO juego VALUES (0, 'Rocket League', 100.00, 'Psyonix', 'Futbol/Deportes', 2015,'Es un videojuego que combina el fútbol con los vehículos. Fue desarrollado por Psyonix y lanzado el 7 de julio de 2015.', 1);
INSERT INTO juego VALUES (0, 'FIFA 22', 1400.00, 'Electronic Arts', 'Futbol/Deportes', 2021,'FIFA es una saga de videojuegos de fútbol publicados anualmente por Electronic Arts bajo el sello de EA Sports creado en Japón Cuando la saga comenzó a finales de 1993 se destacó por ser el primero en tener una licencia oficial de la FIFA', 1);
INSERT INTO juego VALUES (0, 'NBA 2K22', 400.00, '2K Games', 'Baloncesto/Deportes', 2021, 'NBA 2K22 es un videojuego de simulación de baloncesto de 2021 desarrollado por Visual Concepts y publicado por 2K Sports, basado en la National Basketball Association. Es la entrega número 23 de la franquicia NBA 2K y el sucesor de NBA 2K21.', 1);
INSERT INTO juego VALUES (0, 'FIFA 21', 1300.00, 'Electronic Arts', 'Futbol/Deportes', 2020,'FIFA 21 es un videojuego de fútbol del año 2020 disponible para Microsoft Windows, PlayStation 4, Xbox One y Nintendo Switch el 9 de octubre de 2020, y también es el primer videojuego de la serie FIFA para PlayStation 5 y Xbox Series X|S.', 1);
INSERT INTO juego VALUES (0, 'Madden NFL 22', 1400.00, 'Electronic Arts', 'Futbol/Deportes', 2021,'Madden NFL 22 es un videojuego de fútbol americano basado en la National Football League, desarrollado por EA Tiburon y publicado por Electronic Arts.', 1);


SELECT * FROM usuario;
SELECT * FROM juego;
SELECT * from usuario WHERE (correoUsuario='b' && passwordUsuario = 'password');

