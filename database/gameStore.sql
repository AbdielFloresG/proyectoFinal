DROP DATABASE gameStore;
CREATE DATABASE gameStore;
USE gameStore;

CREATE TABLE log_(
idCambio INT PRIMARY KEY AUTO_iNCREMENT,
fechaModificacion DATETIME NOT NULL, 
descripcionCambio VARCHAR(500)
);

CREATE TABLE usuario(
idUsuario INT PRIMARY KEY AUTO_INCREMENT, 
nombreUsuario VARCHAR(50) NOT NULL,
apellidoUsuario VARCHAR(50) NOT NULL,  
correoUsuario VARCHAR(50) NOT NULL UNIQUE,  
passwordUsuario VARCHAR(1000) NOT NULL,
rolUsuario ENUM('user','admin') DEFAULT 'user' NOT NULL
);

CREATE TABLE juego(
idJuego INT PRIMARY KEY AUTO_INCREMENT, 
nombreJuego VARCHAR(50) NOT NULL, 
precio FLOAT NOT NULL,
desarrollador VARCHAR(50) NOT NULL,
genero VARCHAR(100) NOT NULL,
fechaLanzamiento INT NOT NULL,
descripcion VARCHAR(1000) NOT NULL,
activo INT NOT NULL
);

CREATE TABLE venta(
idVenta INT PRIMARY KEY AUTO_INCREMENT,
idUsuario INT, FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE,
correoUsuario VARCHAR(50), FOREIGN KEY(correoUsuario) REFERENCES usuario(correoUsuario) ON UPDATE CASCADE ON DELETE CASCADE,
fechaVenta DATETIME,
monto FLOAT NOT NULL
);

CREATE TABLE detalleVenta(
	idTrasaccion INT PRIMARY KEY AUTO_INCREMENT,
    idVenta INT, FOREIGN KEY(idVenta) REFERENCES venta(idVenta) ON UPDATE CASCADE ON DELETE CASCADE,
    idJuego int,
    nombreJuego varchar(200),
    cantidad float
);

CREATE TRIGGER insercionUsuario AFTER INSERT ON usuario
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una insercion en la tabla Usuario,
nombre: ',NEW.nombreUsuario));

CREATE TRIGGER eliminarUsuario AFTER DELETE ON usuario
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una eliminacion en la tabla Usuario,
nombre: ',OLD.nombreUsuario));

CREATE TRIGGER actualizarUsuario AFTER UPDATE ON usuario
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una actualizar en la tabla Usuario,
nuevo usuario: ',NEW.nombreUsuario));

CREATE TRIGGER insercionJuegos AFTER INSERT ON juego
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una insercion en la tabla Usuario,
nombre del juego: ',NEW.nombreJuego));

CREATE TRIGGER eliminarJuego AFTER DELETE ON juego
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una eliminacion en la tabla Usuario,
nombre del juego: ',OLD.nombreJuego));

CREATE TRIGGER actualizarJuego AFTER UPDATE ON juego
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una actualizar en la tabla Usuario,
nuevo del juego: ',NEW.nombreJuego));

CREATE TRIGGER insercionVenta AFTER INSERT ON venta
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una insercion en la tabla Venta'));

CREATE TRIGGER eliminarVenta AFTER DELETE ON venta
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una eliminacion en la tabla Venta'));

CREATE TRIGGER actualizarVenta AFTER UPDATE ON venta
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una actualizar en la tabla Venta'));

CREATE TRIGGER insercionDetalleVenta AFTER INSERT ON detalleVenta
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una insercion en la tabla detalleVenta'));

CREATE TRIGGER eliminarDetalleVenta AFTER DELETE ON detalleVenta
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una eliminacion en la tabla detalleVenta'));

CREATE TRIGGER actualizarDetalleVenta AFTER UPDATE ON detalleVenta
FOR EACH ROW
INSERT INTO log_
VALUES(0,CURRENT_TIMESTAMP(),CONCAT('Se realizo una actualizar en la tabla detalleVenta'));


##contraseña :'123456'
INSERT INTO usuario (nombreUsuario, apellidoUsuario, correoUsuario, passwordUsuario,rolUsuario) VALUES ('Abdiel', 'Flores', 'admin@admin.com', '9d3b8487f1fcc17d70c4af51077db384fa2834fb','admin');

INSERT INTO juego VALUES (0, 'Rainbow Six Siege', 200.00, 'Ubisoft', 'Shooter', 2015,'Videojuego de disparos táctico en línea desarrollado por Ubisoft Montreal y distribuidor por Ubisoft.', 1);
INSERT INTO juego VALUES (0, 'GTA V', 300.00, 'Rockstar', 'Accion/Aventura', 2013,'Es un videojuego de acción-aventura de mundo abierto desarrollado por el estudio Rockstar North y distribuido por Rockstar Games.', 1);
INSERT INTO juego VALUES (0, 'Rocket League', 100.00, 'Psyonix', 'Futbol/Deportes', 2015,'Es un videojuego que combina el fútbol con los vehículos. Fue desarrollado por Psyonix y lanzado el 7 de julio de 2015.', 1);
INSERT INTO juego VALUES (0, 'FIFA 22', 1400.00, 'Electronic Arts', 'Futbol/Deportes', 2021,'FIFA es una saga de videojuegos de fútbol publicados anualmente por Electronic Arts bajo el sello de EA Sports creado en Japón Cuando la saga comenzó a finales de 1993 se destacó por ser el primero en tener una licencia oficial de la FIFA', 1);
INSERT INTO juego VALUES (0, 'NBA 2K22', 400.00, '2K Games', 'Baloncesto/Deportes', 2021, 'NBA 2K22 es un videojuego de simulación de baloncesto de 2021 desarrollado por Visual Concepts y publicado por 2K Sports, basado en la National Basketball Association. Es la entrega número 23 de la franquicia NBA 2K y el sucesor de NBA 2K21.', 1);
INSERT INTO juego VALUES (0, 'FIFA 21', 1300.00, 'Electronic Arts', 'Futbol/Deportes', 2020,'FIFA 21 es un videojuego de fútbol del año 2020 disponible para Microsoft Windows, PlayStation 4, Xbox One y Nintendo Switch el 9 de octubre de 2020, y también es el primer videojuego de la serie FIFA para PlayStation 5 y Xbox Series X|S.', 1);
INSERT INTO juego VALUES (0, 'Madden NFL 22', 1400.00, 'Electronic Arts', 'Futbol/Deportes', 2021,'Madden NFL 22 es un videojuego de fútbol americano basado en la National Football League, desarrollado por EA Tiburon y publicado por Electronic Arts. Es una entrega de la larga serie Madden NFL', 1);
INSERT INTO juego VALUES (0, 'Minecraft', 400.00, 'Mojang', 'Aventura', 2012,'Minecraft es un juego sobre colocar bloques y aventuras.', 1);
INSERT INTO juego VALUES (0, 'Cars', 500.00, 'THQ', 'Coches/Carreras', 2005,'Cars es un videojuego basado en la película del mismo nombre. Está disponible para las consolas de Mac, Windows, S PlayStation 2, Xbox, Xbox360, Nintendo GameCube, Wii, Game Boy Advance', 1);
INSERT INTO juego VALUES (0, 'Spore', 400.00, 'Electronic Arts', 'Aventura/Mundo abierto', 2008,'Spore es un videojuego de simulación de vida y estrategia para Apple Macintosh y Microsoft Windows que simula la evolución de una especie desde las etapas más primitivas, hasta la colonización de la galaxia por parte del ser evolucionado.', 1);






##update usuario set passwordUsuario = "ef8eb12674e8e1358266c00f9380fe1be78c07dc" where correoUsuario ='a';
##update usuario set passwordUsuario = "9d3b8487f1fcc17d70c4af51077db384fa2834fb" where correoUsuario ='a';

SELECT * FROM venta;
SELECT * FROM detalleVenta;

SELECT * FROM usuario;
SELECT * FROM juego;
SELECT * FROM venta;