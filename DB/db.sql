--Tabla productos
CREATE TABLE PRODUCTOS(
ID SMALLSERIAL PRIMARY KEY,
nombre varchar(50) NOT NULL,
descripcion text NOT NULL,
categoria varchar(50) NOT NULL,
precio_unitario int NOT NULL,
stock_total int NOT NULL,
stock_min int NOT NULL
);

--Crear tipo enum de rol
CREATE TYPE Roles AS ENUM ('trabajador','gerente');

--Tabla usuarios
CREATE TABLE USUARIOS(
id_usuario SMALLSERIAL PRIMARY KEY,
nombre varchar(100) NOT NULL,
apellido varchar(100) NOT NULL,
correo varchar(100) UNIQUE NOT NULL,
telefono varchar(10) NOT NULL,
rol Roles NOT NULL,
username varchar(50) UNIQUE NOT NULL,
passwd varchar(255) NOT NULL
);

-- Tabla de Habitaciones
CREATE TABLE Habitaciones (
    id_habitacion SMALLSERIAL PRIMARY KEY,
    numero varchar(10) NOT NULL,
    tipo varchar(50) NOT NULL,
    capacidad int NOT NULL,
    descripcion text NOT NULL
);

--Crear tipo enum tipo_movimiento
CREATE TYPE tipo_movimiento AS ENUM ('entrada', 'salida', 'traslado');

--Tabla moviemientos
CREATE TABLE MOVIMIENTOS(
id_movimiento SERIAL PRIMARY KEY,
fecha DATETIME NOT NULL,
tipo tipo_movimiento NOT NULL,
id_producto int,
cantidad int NOT NULL,
descripcion text,
id_usuario int,
id_habitacion int NULL,
FOREIGN KEY (id_producto) REFERENCES Productos(id),
FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
FOREIGN KEY (id_habitacion) REFERENCES Habitaciones(id_habitacion)
);

