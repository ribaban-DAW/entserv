CREATE DATABASE IF NOT EXISTS examen7;

USE examen7;

CREATE TABLE IF NOT EXISTS productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  precio DECIMAL(10, 2) NOT NULL,
  stock INTEGER NOT NULL
);

INSERT INTO productos(nombre, precio, stock) VALUES
('Chocolate', 19.99, 100),
('Avellana', 29.99, 150),
('Azúcar', 9.99, 200);
