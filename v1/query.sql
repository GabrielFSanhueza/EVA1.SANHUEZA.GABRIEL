-- mysql
CREATE DATABASE ciisa_proyectoBackEnd;
CREATE USER  "ciisa_proyectoBackEnd"@localhost IDENTIFIED BY "14v14v3-ciisa" 
GRANT ALL PRIVILEGES ON ciisa_proyectoBackEnd.* TO "ciisa_proyectoBackEnd"@"localhost";
FLUSH PRIVILEGES;

CREATE TABLE mantenedor(
    id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    activo BOOLEAN NOT NULL DEFAULT FALSE
)

-- GET / ALL
SELECT id, nombre, activo FROM mantenedor;
-- GET / BY ID
SELECT id, nombre, activo FROM mantenedor WHERE id = 3;
--POST
INSERT INTO mantenedor (id, nombre) VALUES
(1, "Ejemplo 1"),
(2, "Ejemplo 2"),
(3, "Ejemplo 3");
--PATCH ENABLE
UPDATE mantenedor SET activo = true WHERE id = 3;
--PATCH DISABLE
UPDATE mantenedor SET activo = false WHERE id = 3;
--PUT

UPDATE mantenedor SET nombre = 'Example 3' WHERE id = 3;

--DELETE
DELETE FROM mantenedor WHERE id = 3; 
