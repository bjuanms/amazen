DROP DATABASE IF EXISTS Amazen;

CREATE DATABASE Amazen DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE Amazen;

	CREATE TABLE usuario ( 
		id_usuario BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		nombre VARCHAR(50) NOT NULL,
		apellidos VARCHAR(50) NOT NULL,
		email VARCHAR(100) UNIQUE NOT NULL,
		passwd VARCHAR (25) NOT NULL,
		telefono CHAR(9) NOT NULL,
		direccion VARCHAR(100) NOT NULL,
		ciudad VARCHAR(50) NOT NULL,
		jotas INT UNSIGNED NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE categoria ( 
		id_categoria INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		nombre VARCHAR(50) UNIQUE NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE producto ( 
		id_producto BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		titulo_prod VARCHAR(100) UNIQUE NOT NULL,
		nombre_prod VARCHAR(50) UNIQUE NOT NULL,
		descripcion TEXT NOT NULL,
		precio FLOAT(10,2) UNSIGNED NOT NULL,
		marca_autor VARCHAR(50) NOT NULL,
		img_1 VARCHAR(255) UNIQUE NOT NULL,
		img_2 VARCHAR(255) UNIQUE,
		id_categoria INT UNSIGNED NOT NULL REFERENCES categoria(id_categoria)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE valoracion ( 
		id_valoracion BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		titulo_valoracion VARCHAR(50),
		texto_valoracion TEXT NOT NULL,
		fecha DATE NOT NULL,
		rate INT(2) NOT NULL,
		imagen VARCHAR(50), 
		id_producto BIGINT UNSIGNED NOT NULL REFERENCES valoracion(id_valoracion),
		id_usuario  BIGINT UNSIGNED NOT NULL REFERENCES usuario(id_usuario)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE publicidad (
		id_publicidad INT(2) UNSIGNED NOT NULL PRIMARY KEY,
		logo_marca VARCHAR(20) UNIQUE NOT NULL,
		titulo VARCHAR(50) NOT NULL,
		precio FLOAT(10,2) UNSIGNED NOT NULL,
		img VARCHAR(255) UNIQUE NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE cesta ( 
		id_usuario BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		id_producto BIGINT NOT NULL,
		nombre_prod VARCHAR(50) UNIQUE NOT NULL,
		cantidad INT NOT NULL,
		precio INT  NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE pedido ( 
		id_pedido BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		id_usuario BIGINT UNSIGNED,
		fecha_pedido DATETIME NOT NULL,
		unidades_total INT NOT NULL,
		precio_total INT  NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE productos_pedido ( 
		id_pedido BIGINT UNSIGNED REFERENCES pedido(id_pedido),
		id_producto BIGINT NOT NULL,
		unidades_producto INT NOT NULL,
		precio_producto INT  NOT NULL,
		nombre_prod VARCHAR(50) UNIQUE NOT NULL,
		img_1 VARCHAR(255) UNIQUE NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;