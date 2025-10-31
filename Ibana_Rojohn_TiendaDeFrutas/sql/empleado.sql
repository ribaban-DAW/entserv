CREATE TABLE IF NOT EXISTS empleado(
    PK_NIF VARCHAR(20),
    Nombre VARCHAR(50),
    Edad INT,
    Cargo VARCHAR(50),
    Sueldo DOUBLE,

    PRIMARY KEY (PK_NIF)
);

INSERT INTO empleado
VALUES ("E1", "EN1", 25, "EC1", 1300),
("E2", "EN2", 26, "EC2", 1400),
("E3", "EN3", 27, "EC3", 1500),
("E123", "Ana", 27, "EC3", 1500);

SELECT * FROM empleado;
