
CREATE DATABASE IF NOT EXISTS basesegura 
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE basesegura;


DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
  idUsuarios int(11) NOT NULL AUTO_INCREMENT,
  nombres varchar(45) DEFAULT NULL,
  apellidos varchar(45) DEFAULT NULL,
  correo varchar(45) DEFAULT NULL,
  clave varchar(45) DEFAULT NULL,
  telefono varchar(45) DEFAULT NULL,
  direccion varchar(45) DEFAULT NULL,
  ciudad varchar(45) DEFAULT NULL,
  PRIMARY KEY (idUsuarios)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


