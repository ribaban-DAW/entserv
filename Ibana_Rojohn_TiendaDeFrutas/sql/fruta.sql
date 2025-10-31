CREATE TABLE IF NOT EXISTS fruta(
    PK_ID INT AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Temporada VARCHAR(20),
    Precio DOUBLE,
    Stock INT,
    Origen VARCHAR(50),
    Proveedor VARCHAR(50),

    PRIMARY KEY (PK_ID)
);

INSERT INTO fruta(Nombre, Temporada, Precio, Stock, Origen, Proveedor)
VALUES ("FN1", "FT1", 10, 10, "FO1", "FP1"),
("FN2", "FT2", 20, 20, "FO2", "FP2"),
("FN3", "FT3", 30, 30, "FO3", "FP3"),
("Mango", "FT4", 40, 40, "FO4", "FP4");

SELECT * FROM fruta;
