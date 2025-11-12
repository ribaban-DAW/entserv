DROP DATABASE crabadopt;
CREATE DATABASE crabadopt;

USE crabadopt;

CREATE TABLE categorias(
    id BIGINT(20) AUTO_INCREMENT,
    Nombre VARCHAR(50),

    PRIMARY KEY (id)
);

INSERT INTO categorias(Nombre) VALUES
("Azul"),
("Rojo"),
("Morado"),
("Amarillo"),
("Rosa");

CREATE TABLE adoptantes(
    id BIGINT(20) AUTO_INCREMENT,
    nif VARCHAR(10),
    nombre VARCHAR(200),
    apellidos VARCHAR(200),
    alta DATE,
    baja DATE,

    PRIMARY KEY (id)
);

INSERT INTO adoptantes(nif, nombre, apellidos, alta, baja) VALUES
("12345678a", "Paco", "El apellido de Paco", NOW(), NOW()),
("12345678b", "Yo", "El apellido de Yo", NOW(), NOW()),
("12345678c", "Tú", "El apellido de Tú", NOW(), NOW()),
("12345678d", "Él", "El apellido de Él", NOW(), NOW()),
("12345678e", "Ella", "El apellido de Ella", NOW(), NOW());

CREATE TABLE cangrejos(
    id BIGINT(20) AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Categoria BIGINT(11),
    FechaRecogida DATE,
    FechaAdopcion DATE,
    IdAcogedor BIGINT(20),

    PRIMARY KEY (id),
    CONSTRAINT CFK_IdCategoria FOREIGN KEY(Categoria) REFERENCES categorias(id),
    CONSTRAINT CFK_IdAcogedor FOREIGN KEY(IdAcogedor) REFERENCES adoptantes(id)
);

INSERT INTO cangrejos(Nombre, Categoria, FechaRecogida, FechaAdopcion, IdAcogedor) VALUES
("A", 1, NOW(), NOW(), 1),
("B", 2, NOW(), NOW(), 2),
("C", 3, NOW(), NOW(), 3),
("D", 4, NOW(), NOW(), 4),
("E", 5, NOW(), NOW(), 5);
