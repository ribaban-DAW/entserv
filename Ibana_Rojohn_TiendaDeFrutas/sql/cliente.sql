CREATE TABLE IF NOT EXISTS cliente(
    PK_NIF VARCHAR(20),
    Nombre VARCHAR(50),
    Edad INT,
    Pais VARCHAR(50),
    Ciudad VARCHAR(50),

    PRIMARY KEY (PK_NIF)
);

INSERT INTO cliente
VALUES ("C1", "CN1", 25, "PC1", "CC1"),
("C2", "CN2", 26, "PC2", "CC2"),
("C3", "CN3", 27, "PC3", "CC3"),
("C123", "Pepe", 28, "Inexistente", "Inexistente");

SELECT * FROM cliente;
