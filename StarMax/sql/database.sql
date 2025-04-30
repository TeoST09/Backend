CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
saldo           VARCHAR(255) not null,
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
imagen          varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb;


CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id) 
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(null, 'Combos');
INSERT INTO categorias VALUES(null, 'Pantallas');
INSERT INTO categorias VALUES(null, 'Cuentas');

CREATE TABLE productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          varchar(510) not null,
stock           int(255) not null,
oferta          varchar(510) default null,
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;


CREATE TABLE pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
telefono        varchar(510) not null,
correo          varchar(510) not null,
direccion       varchar(255) not null,
coste           varchar(120) not null,
estado          varchar(150) not null,
fecha           date,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,


CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;


CREATE TABLE droper(
id              int(255) auto_increment not null,
producto_id     int(255) not null,
tipo            varchar(510) not null,
plataforma      varchar(510) not null,
correo          varchar(510) not null,
password        varchar(510) not null,
perfil          varchar(120) not null,
pin             varchar(120) not null,


CONSTRAINT pk_droper PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE plataformas(
id              int(255) auto_increment not null,
nombre          varchar(255),
PRIMARY KEY(id)
)ENGINE=InnoDb;


INSERT INTO plataformas VALUES(null, 'Netflix'); 
INSERT INTO plataformas VALUES(null, 'Disney');  
INSERT INTO plataformas VALUES(null, 'Paramount');
INSERT INTO plataformas VALUES(null, 'Amazon');
INSERT INTO plataformas VALUES(null, 'Max');

