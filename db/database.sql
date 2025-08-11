CREATE DATABASE IF NOT EXISTS garden;

USE garden;

-- TABLAS 


CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
);

CREATE TABLE plantas (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(150) NOT NULL,
    familia varchar(150) NOT NULL,
);

CREATE TABLE riego (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(150) NOT NULL UNIQUE
    frecuencia_riego VARCHAR(50) NOT NULL
);


INSERT INTO usuarios(nombre, correo, contraseña) VALUES
('adrian', 'adrian@gmail.com', SHA2('h3ll0.', 512)),
('ana', 'ana@gmail.com', SHA2('h3ll0.', 512));

INSERT INTO plantas(nombre, familia, categoria) VALUES
('Aloe Vera', 'Asphodelaceae', 'cactus'),
('Lavanda', 'Lamiaceae', 'ornamental'),
('Fresa', 'Rosaceae', 'frutal');

INSERT INTO riego(categoria, frecuencia_riego) VALUES
('cactus', '10 dias'),
('ornamental', '3 dias'),
('frutal', '5 dias');
