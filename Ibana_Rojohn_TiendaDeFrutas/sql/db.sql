-- Testing
DROP DATABASE IF EXISTS frutisol;

CREATE DATABASE IF NOT EXISTS frutisol; 
USE frutisol;

SOURCE fruta.sql;
SOURCE empleado.sql;
SOURCE cliente.sql;
SOURCE venta.sql;
