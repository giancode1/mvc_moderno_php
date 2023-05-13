CREATE DATABASE mvc_moderno_php;

USE mvc_moderno_php;

CREATE TABLE `contacts` (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `contacts` (name, email, phone) VALUES
  ('Juan Pérez', 'juan1perez@example.com', '55123464'),
  ('María Muñoz', 'maria.rodriguez@example.com', '55561178'),
  ('Pedro González', 'pedro.gonzalez@example.com', '55249012'),
  ('Ana Martínez', 'ana.martinez@example.com', '553456245'),
  ('Luisa Fernández', 'luisa.fernandez@example.com', '557890253'),
  ('Carlos Sánchez', 'carlos6sanchez@example.com', '552123453'),
  ('Lucía García', 'luchogarcia@example.com', '556713289'),
  ('Jorge Torres', 'jorge.torres@example.com', '525011123'),
  ('Marta Llerna', 'marta.llerena@example.com', '554125676'),
  ('Karina López', 'karina.lopez@example.com', '558349017');
