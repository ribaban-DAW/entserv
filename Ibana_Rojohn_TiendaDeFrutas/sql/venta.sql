CREATE TABLE IF NOT EXISTS venta(
    Factura INT AUTO_INCREMENT,
    FK_NIFEmpleado VARCHAR(20),
    FK_NIFCliente VARCHAR(20),
    FK_IDFruta INT,
    Cantidad INT,
    Fecha DATETIME,

    PRIMARY KEY (Factura, FK_NIFEmpleado, FK_NIFCliente, FK_IDFruta),
    CONSTRAINT CFK_NIFEmpleado FOREIGN KEY(FK_NIFEmpleado) REFERENCES empleado(PK_NIF),
    CONSTRAINT CFK_NIFCliente FOREIGN KEY(FK_NIFCliente) REFERENCES cliente(PK_NIF),
    CONSTRAINT CFK_IDFruta FOREIGN KEY(FK_IDFruta) REFERENCES fruta(PK_ID)
);

INSERT INTO venta(FK_NIFEmpleado, FK_NIFCliente, FK_IDFruta, Cantidad, Fecha)
VALUES ("E1", "C1", 1, 2, NOW()),
("E2", "C2", 2, 3, NOW()),
("E3", "C3", 3, 5, NOW()),
("E123", "C123", 4, 5, NOW());

SELECT * FROM venta;

