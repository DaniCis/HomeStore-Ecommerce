/* Table 'productos' */
CREATE TABLE productos(
  id_producto INT NOT NULL AUTO_INCREMENT,
  `descripcionCorta_producto` TEXT NOT NULL,
  foto_producto VARCHAR(25) NOT NULL,
  `descripcionLarga_producto` TEXT NOT NULL,
  precio_producto DECIMAL(10,2) NOT NULL,
  habilitado_producto BOOLEAN NOT NULL,
  categorias_id_categoria INT NOT NULL,
  PRIMARY KEY(id_producto)
);

/* Table 'categorias' */
CREATE TABLE categorias(
id_categoria INT NOT NULL AUTO_INCREMENT, 
nombre_categoria VARCHAR(50) NOT NULL,
imagen_categoria VARCHAR(25) NOT NULL.
  PRIMARY KEY(id_categoria)
);

/* Table 'clientes' */
CREATE TABLE clientes(
  id_cliente INT NOT NULL AUTO_INCREMENT,
  ciudades_id_ciudad INT NOT NULL,
  nombres_cliente VARCHAR(50) NOT NULL,
  apellidos_cliente VARCHAR(50) NOT NULL,
  cod_cliente VARCHAR(26) NOT NULL,
  celular_cliente VARCHAR(10) NOT NULL,
  direccion_cliente VARCHAR(90) NOT NULL,
  correo_cliente VARCHAR(30) NOT NULL,
  contraseña_cliente VARCHAR(100) NOT NULL,
  PRIMARY KEY(id_cliente)
);


/* Table 'ciudades' */
CREATE TABLE ciudades(
id_ciudad INT NOT NULL AUTO_INCREMENT,
 nombre_ciudad VARCHAR(50) NOT NULL,
  PRIMARY KEY(id_ciudad)
);

/* Table 'administradores' */
CREATE TABLE administradores(
  id_admin INT NOT NULL AUTO_INCREMENT,
  nombre_admin VARCHAR(50) NOT NULL,
  contrasena_admin VARCHAR(100) NOT NULL,
  PRIMARY KEY(id_admin)
);

/* Table 'compras' */
CREATE TABLE compras(
  id_compra VARCHAR(15) NOT NULL,
  fecha_compra DATETIME NOT NULL,
  estado_compra ENUM('Atendido','Pendiente') NOT NULL DEFAULT 'Pendiente',
  `precioFinal_compra` DECIMAL(10,2) NOT NULL,
  clientes_id_cliente INT NOT NULL,
  PRIMARY KEY(id_compra)
);

/* Table 'detalleCompras' */
CREATE TABLE `detalleCompras`(
  `id_detalleCompra` INT NOT NULL,
  compras_id_compra VARCHAR(15) NOT NULL,
  `cantidad_detalleCompra` INT NOT NULL,
  productos_id_producto INT NOT NULL,
  PRIMARY KEY(`id_detalleCompra`, compras_id_compra)
);

/* Relation 'categorias_productos' */
ALTER TABLE productos
  ADD CONSTRAINT categorias_productos
    FOREIGN KEY (categorias_id_categoria) REFERENCES categorias (id_categoria);

/* Relation 'ciudades_clientes' */
ALTER TABLE clientes
  ADD CONSTRAINT ciudades_clientes
    FOREIGN KEY (ciudades_id_ciudad) REFERENCES ciudades (id_ciudad);

/* Relation 'clientes_compras' */
ALTER TABLE compras
  ADD CONSTRAINT clientes_compras
    FOREIGN KEY (clientes_id_cliente) REFERENCES clientes (id_cliente);

/* Relation 'productos_detalleCompras' */
ALTER TABLE `detalleCompras`
  ADD CONSTRAINT `productos_detalleCompras`
    FOREIGN KEY (productos_id_producto) REFERENCES productos (id_producto);

/* Relation 'compras_detalleCompras' */
ALTER TABLE `detalleCompras`
  ADD CONSTRAINT `compras_detalleCompras`
    FOREIGN KEY (compras_id_compra) REFERENCES compras (id_compra);
