/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

-- Creación de base de datos para taller de electrónica.
CREATE DATABASE IF NOT EXISTS taller_electronica CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE taller_electronica;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  rol ENUM('admin','tecnico','recepcionista') NOT NULL,
  activo TINYINT(1) DEFAULT 1,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  telefono VARCHAR(30),
  email VARCHAR(120),
  direccion VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE equipos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT NOT NULL,
  marca VARCHAR(80) NOT NULL,
  categoria VARCHAR(40) NOT NULL,
  modelo VARCHAR(80) NOT NULL,
  numero_serie VARCHAR(120) UNIQUE,
  especificaciones TEXT,
  contrasena VARCHAR(120),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE ordenes_trabajo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  numero_ot VARCHAR(30) UNIQUE,
  cliente_id INT NOT NULL,
  equipo_id INT NOT NULL,
  diagnostico TEXT,
  falla_reportada TEXT,
  presupuesto DECIMAL(10,2) DEFAULT 0,
  estado ENUM('pendiente','presupuestado','aprobado','en reparacion','reparado','entregado','cancelado') DEFAULT 'pendiente',
  fecha_ingreso DATETIME DEFAULT CURRENT_TIMESTAMP,
  fecha_prometida DATE,
  fecha_entrega DATETIME NULL,
  dias_garantia INT DEFAULT 90,
  qr_path VARCHAR(255) NULL,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id),
  FOREIGN KEY (equipo_id) REFERENCES equipos(id)
);

CREATE TABLE ot_tecnicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ot_id INT NOT NULL,
  tecnico_id INT NOT NULL,
  comision_tipo ENUM('porcentaje','fijo') DEFAULT 'porcentaje',
  comision_valor DECIMAL(10,2) DEFAULT 0,
  FOREIGN KEY (ot_id) REFERENCES ordenes_trabajo(id),
  FOREIGN KEY (tecnico_id) REFERENCES usuarios(id)
);

CREATE TABLE logs_acciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  accion VARCHAR(120) NOT NULL,
  fecha DATETIME NOT NULL,
  ip VARCHAR(45),
  detalles TEXT,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE notificaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  titulo VARCHAR(120) NOT NULL,
  mensaje TEXT NOT NULL,
  leida TINYINT(1) DEFAULT 0,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE caja_movimientos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  tipo ENUM('ingreso','egreso') NOT NULL,
  concepto VARCHAR(150) NOT NULL,
  monto DECIMAL(10,2) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO usuarios (nombre,email,password_hash,rol) VALUES
('Admin','admin@taller.com','$2y$10$Mt8x1MVz3jK4xFX5vrF6Ku99p2ev0Ir65w4wjpGCrD6Nke6dpJ6WO','admin');
