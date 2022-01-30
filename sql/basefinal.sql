-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 07:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basefinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(50) NOT NULL,
  `contrasena_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre_admin`, `contrasena_admin`) VALUES
(1, 'admin', 'admin555');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `imagen_categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `imagen_categoria`) VALUES
(1, 'Comedor y Cocina', '1.jpg'),
(2, 'Decoración', '2.jpg'),
(3, 'Electrodomésticos', '3.jpg'),
(4, 'Dormitorio y Baño', '4.jpg'),
(5, 'Tecnología', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre_ciudad`) VALUES
(1, 'Ambato'),
(2, 'Bogotá'),
(3, 'Brasilia'),
(4, 'Buenos Aires'),
(5, 'Cali'),
(6, 'Caracas'),
(7, 'Guaranda'),
(8, 'La Paz'),
(9, 'Lima'),
(10, 'Medellín'),
(11, 'Montevideo'),
(12, 'Quito'),
(13, 'Río de Janeiro '),
(14, 'Santiago de Chile'),
(15, 'Santa Fe');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `ciudades_id_ciudad` int(11) NOT NULL,
  `nombres_cliente` varchar(50) NOT NULL,
  `apellidos_cliente` varchar(50) NOT NULL,
  `cod_cliente` varchar(26) NOT NULL,
  `celular_cliente` varchar(10) NOT NULL,
  `direccion_cliente` varchar(90) NOT NULL,
  `correo_cliente` varchar(30) NOT NULL,
  `contraseña_cliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `ciudades_id_ciudad`, `nombres_cliente`, `apellidos_cliente`, `cod_cliente`, `celular_cliente`, `direccion_cliente`, `correo_cliente`, `contraseña_cliente`) VALUES
(1, 12, 'Daniela Estefania', 'Cisneros Jacome', '1717431942', '0992987634', 'Jaime Roldos Aguilera OE1417', 'danicisneros2@hotmail.com', '$2y$10$F5OVHkZVvO1.qME0frbOg.xGag2vGS2cDqCoMlVbaiB7HDO4XxOZe'),
(2, 4, 'Juan Manuel', 'Viteri Torres', '1708765423', '0936754387', 'Av. Paseo Colón', 'juanma86@gmail.com', '$2y$10$X2ryzZKBtHJs0KK.mkuEB.IDXy4irjW3rOAKTEUun.3.8SiTPl1sG'),
(3, 9, 'Diana Micaela', 'Flores Guerra', '1534862257', '0299765221', 'Malecón de la Reserva, Miraflores', 'dianaflores1997@hotmail.com', '$2y$10$tW.9MJuNe2Vjqu1OPevmluP4skqnBRjefmnzAGYYmBtOHaaECqrYa'),
(7, 12, 'Jorge David', 'Vaca', '177777777', '099999999', 'America', 'd@gmail.com', '$2y$10$e/kUgujxY/Tw3sxMC4YKlupLd5.jiKCEa9dnZxkVI2IYWnGG.rGRi'),
(8, 12, 'Viviana', 'Arcos', '0413214798', '0997812378', 'Solca', 'vivian@msn.com', '$2y$10$yBUJJYcqwHlNIRh7UKV5d./oP60g/IDWX6n1tRKGZJrw4E8qpzxJK'),
(9, 10, 'Julio', 'Aguirre', '0500313652', '0995396814', 'Transversal E4', 'comida@hotmai.com', '$2y$10$pd8wFYmew2U4BR5kg9eKw.NtOuYatIcupFBw9I2u0MZE2DD9dJEdG');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compra` varchar(15) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `estado_compra` enum('Atendido','Pendiente') NOT NULL DEFAULT 'Pendiente',
  `precioFinal_compra` decimal(10,2) NOT NULL,
  `clientes_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `fecha_compra`, `estado_compra`, `precioFinal_compra`, `clientes_id_cliente`) VALUES
('20224212Da1', '2021-11-20 22:42:12', 'Atendido', '729.22', 1),
('21172250Da1', '2021-11-21 17:22:50', 'Atendido', '90.69', 1),
('21172516Da1', '2021-11-21 17:25:16', 'Pendiente', '987.20', 1),
('21173136Da1', '2021-11-21 17:31:36', 'Pendiente', '74.59', 1),
('22213516Vi8', '2021-11-22 21:35:16', 'Pendiente', '59.99', 8),
('22221506Da7', '2021-11-22 22:15:06', 'Pendiente', '24.15', 7),
('23180343Da7', '2021-11-23 18:03:43', 'Pendiente', '569.28', 7),
('23181218Ju2', '2021-11-23 18:12:18', 'Pendiente', '174.82', 2),
('23183528Ju2', '2021-11-23 18:35:28', 'Pendiente', '30.65', 2),
('23195347Ju2', '2021-11-23 19:53:47', 'Pendiente', '42.40', 2),
('25014138Da1', '2021-11-25 01:41:38', 'Pendiente', '236.53', 1),
('25014716Jo7', '2021-11-25 01:47:16', 'Pendiente', '699.17', 7),
('25104524Ju9', '2021-11-25 10:45:24', 'Pendiente', '168.80', 9),
('25105012Ju9', '2021-11-25 10:50:12', 'Pendiente', '1147.20', 9),
('25162140Da1', '2021-11-25 16:21:40', 'Pendiente', '128.34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detallecompras`
--

CREATE TABLE `detallecompras` (
  `id_detalleCompra` int(11) NOT NULL,
  `compras_id_compra` varchar(15) NOT NULL,
  `cantidad_detalleCompra` int(11) NOT NULL,
  `productos_id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detallecompras`
--

INSERT INTO `detallecompras` (`id_detalleCompra`, `compras_id_compra`, `cantidad_detalleCompra`, `productos_id_producto`) VALUES
(1, '20224212Da1', 2, 233),
(1, '21172250Da1', 1, 230),
(1, '21172516Da1', 1, 268),
(1, '21173136Da1', 1, 114),
(1, '22213516Vi8', 1, 26),
(1, '22221506Da7', 1, 94),
(1, '23180343Da7', 3, 149),
(1, '23181218Ju2', 1, 234),
(1, '23183528Ju2', 1, 243),
(1, '23195347Ju2', 3, 208),
(1, '25014138Da1', 1, 79),
(1, '25014716Jo7', 1, 152),
(1, '25104524Ju9', 1, 198),
(1, '25105012Ju9', 1, 217),
(1, '25162140Da1', 2, 55),
(2, '21172250Da1', 1, 237),
(2, '23181218Ju2', 1, 247),
(2, '23195347Ju2', 2, 213),
(2, '25014138Da1', 1, 85),
(2, '25014716Jo7', 1, 222),
(2, '25104524Ju9', 1, 15),
(2, '25105012Ju9', 1, 84),
(3, '21172250Da1', 2, 82),
(3, '23181218Ju2', 1, 7),
(3, '25014138Da1', 2, 210),
(3, '25105012Ju9', 1, 210);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `descripcionCorta_producto` text NOT NULL,
  `foto_producto` varchar(25) NOT NULL,
  `descripcionLarga_producto` text NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `habilitado_producto` tinyint(1) NOT NULL,
  `categorias_id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `descripcionCorta_producto`, `foto_producto`, `descripcionLarga_producto`, `precio_producto`, `habilitado_producto`, `categorias_id_categoria`) VALUES
(1, 'Vajilla de 20 piezas de Cristal de Opal Blanco Haus', '5011.jpg', 'El enfoque científico que se aplica, lo hace estar seguro de que sea una vajilla duradera, resistente y absolutamente del más alto nivel. Y así, lograr una armonía perfecta entre crear atractivo estético y resolver necesidades prácticas, se aplica lo que se llama \"buen diseño\" y asegura que el cristal opal sea durable.', '53.83', 1, 1),
(2, 'Colección Michelangelo Bormioli', '5012.jpg', 'La línea de cristalería Michelangelo, está elaborada mediante un proceso que garantiza transparencia, brillo y durabilidad. Además, es libre de plomo y otros metales pesados. La piezas cuentan con tallos, reforzados con titanio, que garantiza mayor resistencia a roturas. Su sencillo pero elegante diseño italiano, es ideal para ocasiones especiales. Puede completar su juego de cristalería de acuerdo a sus necesidades.', '16.35', 1, 1),
(3, 'Tabla con 3 pozuelos para postre y tenedores Novo', '5013.jpg', 'Este juego de 3 pozuelos está elaborados en vidrio, un material que puede considerarse uno de los más higiénicos porque no es nada poroso, por lo que no acumula restos de alimentos, gérmenes o bacterias. Ideal para la presentación de sus aperitivos, postres o cualquier otro plato que se sirva en pequeñas porciones.', '28.59', 1, 1),
(4, 'Servilleta Ipanema Haus', '5014.jpg', 'Esta servilleta está confeccionada en poliéster y algodón, por lo que le aporta la suavidad y resistencia que necesita para poder usarlas a diario.', '1.28', 1, 1),
(5, 'Mantel antifluido Flor', '5015.jpg', 'Este mantel está elaborado en 100% poliéster, por lo que le proporciona ligereza para que lo puedas manejar con comodidad y una mayor resistencia al desgaste para usarse todos los días en la mesa. ', '21.33', 1, 1),
(6, 'Individual Mullos Rojo Haus', '5016.jpg', 'Lo más importante del individual es que cumple su función básica: proteger. Pero gracias a su decoración en mullos también es perfecto para complementar y destacar la decoración de su mesa.', '8.16', 1, 1),
(7, 'Porta botellas 5 servicios Rústico Guayacán', '5017.jpg', 'Este porta botellas está elaborado en madera, un material resistente a la humedad, que no se desquebraja y que conserva su apariencia con el pasar de los años. Ofrece una capacidad para organizar hasta 5 botellas de vino.', '32.86', 1, 1),
(8, 'Juego de cubiertos con caja de madera Maitre 18 piezas Pinti', '5018.jpg', 'Este juego de cubiertos está elaborado en acero inoxidable 18/10, esta composición permite que sean resistentes a la corrosión, calor y desgaste, lo que garantiza su larga vida útil. Además, son neutros al contacto con alimentos.Cuentan con un diseño italiano e incluye un práctico estuche de madera wengue para su almacenamiento.', '28.10', 1, 1),
(9, 'Fuente para bocaditos Martillado Dorado Haus', '5019.jpg', 'Esta fuente es única y está hecha a mano, puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.Su diseño de uno o dos niveles es ideal para servir y presentar diferentes tipos de bocaditos y postres. Además, su asa permite una cómoda y fácil manipulación.', '15.48', 1, 1),
(10, 'Porta pastel con tapa y pie Silver Haus', '5020.jpg', 'Este porta pastel es único y está hecho a mano, puede tener variaciones del color o imperfecciones leves, estas son inherentes y deben ser vistas como parte de su belleza natural y encanto. La tapa es de vidrio y su pie está elaborado en cobre, acero inoxidable y bañado en plata genuina, por lo que cuenta con un brillo especial y único.', '33.89', 1, 1),
(11, 'Canasta frutera de rattan Haus', '5021.jpg', 'Esta canasta está elaborada en fibra natural de rattan, un material con una alta resistencia al desgaste, corrosión e impactos moderados o fuertes. Para su limpieza se recomienda utilizar un paño suave, para retirar manchas o cualquier tipo de suciedad.', '18.45', 1, 1),
(12, 'Juego de ollas de acero inoxidable para inducción 9 piezas Electrolux', '5022.jpg', 'Este juego de ollas asegura la cocción ideal y más sana de los alimentos. El fondo triple permite que la olla se utilice en cocinas y planchas a gas, eléctricas y de inducción. También puede usarse en hornos a gas y eléctricos con una temperatura máxima de 200°C. Sus recetas van a brillar en la cocina y en su mesa. Fondo triple y tapa de cristal para una cocción mucho más rápida y sin dejar residuos de metal en sus recetas.', '68.95', 1, 1),
(13, 'Sartén grill para inducción de aluminio forjado / antiadherente Vulcano', '5023.jpg', 'Esta sartén grill está elaborada en aluminio forjado con recubrimiento interior antiadherente extra resistente, por lo que es fácil de lavar, los alimentos nunca se pegan y para la preparación usa menos aceite y es totalmente resistente a golpes.', '38.70', 1, 1),
(14, 'Plancha asadora grill con asas para inducción Valira', '5024.jpg', 'Esta plancha asadora está elaborada en aluminio fundido indeformable, un material puro que cuida su salud ya que está libre de sustancias nocivas para su salud y asegura que no se va a deformar con el tiempo. Cuenta con un recubrimiento interior antiadherente reforzado multicapa, esto le permite cocinar de una manera más saludable ya que sus alimentos necesitarán menos cantidad de aceite durante su cocción y también evita que los alimentos se peguen lo que facilita su limpieza.', '73.50', 1, 1),
(15, 'Cafetera para expresso cremoso Brikka Silver Bialetti', '5025.jpg', 'Brikka es la única cafetera que le permite preparar y servir un café intenso y cremoso como el de la cafetería. Prepara tacitas de café expreso (4 tazas en total) con una concentración de café casi doble respecto de la del café preparado con la cafetera Moka tradicional.', '53.30', 1, 1),
(16, 'Cucharón con mango negro', '5026.jpg', 'Este cucharón está elaborado en acero inoxidable, por lo que es resistente al calor y no presenta aberturas, muescas o fisuras en las que se puedan acumular restos de alimentos, evitando por completo la acumulación de bacterias o gérmenes. ', '6.73', 1, 1),
(17, 'Colador con asa de acero inoxidable', '5027.jpg', 'Este colador de malla fina cubre todas tus necesidades de un colador de alimentos y tamiz. Está elaborado en acero inoxidable duradero y de alta calidad, no se oxida, corroe, se dobla o se deforma.', '3.45', 1, 1),
(18, 'Tabla para picar Totally Bamboo', '5028.jpg', 'Totally Bamboo Poli-Boo es una tabla para picar reversible de bambú y poli, combinando los beneficios de los dos materiales en una sola tabla. El poli lado no es poroso y es perfecto para cortar carne, pescado y aves de corral. El lado de bambú es suave con los cuchillos y es ideal para cortar queso, verduras, frutas para amasar.', '13.93', 1, 1),
(19, 'Cuchillos de acero inoxidable con bloque de madera 7 piezas', '5029.jpg', 'Conserve su orgullosa colección de cuchillos en el clásico juego de bloques de cuchillas de 7 piezas de la serie Brenta de BALLARINI y protéjalos. Pero no solo por razones de seguridad y para la protección de la cuchilla es útil el almacenamiento en un bloque de cuchillas. El bloque de almacenamiento de madera brillante ofrece aún más ventajas. Los cuchillos de alta calidad están siempre a mano cuando cocina. ', '34.82', 1, 1),
(20, 'Escurridor para platos Novo', '5030.jpg', 'Este escurridor para platos cuenta con una bandeja de drenaje extraíble, que permite eliminar fácilmente el exceso de agua y limpiar. También cuenta con espacio plano para colocar vasos o tazas y el porta cubiertos dividido es removible.', '35.45', 1, 1),
(21, 'Tazón medidor con antideslizante Mix&Bake Emsa', '5031.jpg', 'Este tazón medidor cuenta en la parte inferior con un revestimiento antideslizante y zona de agarre para una sujeción segura, incluso cuando está inclinado. Tiene marcas de medidas, por lo que podrá medir fácilmente sus ingredientes.', '19.00', 1, 1),
(22, 'Canasta para pan Equis Novo', '5032.jpg', 'Esta canasta para pan está elaborada en alambre cromado, un material que ofrece una gran resistencia al desgaste y corrosión. Para su limpieza se recomienda utilizar un paño suave y semihúmedo.', '9.28', 1, 1),
(23, 'Jarra con tapa 2.5L Flash', '5033.jpg', 'Esta jarra está elaborada en plástico, un material irrompible, ligero y resistente a manchas y malos olores. Ideal para almacenar sus bebidas frías. Además su tapa se puede acomodar en dos posiciones: una para verter bebidas con hielo o frutas, evitando que caigan al vaso, y otra para cerrarla.', '15.30', 1, 1),
(24, 'Botella tomatodo térmico 16oz / 475ml Mate Canteen Corkcicle', '5034.jpg', 'Disfrute de su bebida fría o caliente en cualquier momento y lugar. Esta botella tomatodo está elaborada a mano en acero inoxidable con aislamiento triple patentado. Mantiene las bebidas frías hasta por 25 horas o calientes hasta por 12 horas, sin que se congele o sude. El frío se mantendrá incluso por más tiempo en las bebidas que contienen hielo.', '13.70', 1, 1),
(25, 'Juego de Ollas Warenhaus', '5035.jpg', 'Juego de ollas de acero inoxidable lo cual le da una durabilidad mayor al producto, son fáciles de mantener y limpiar, no alberga gérmenes y no le cambia el sabor a la comida.', '75.89', 1, 1),
(26, 'Olla de Presión Vancouver', '5036.jpg', 'Esta olla soporta cualquier presión para lucirse en la cocina. Son tres válvulas de seguridad que actúan juntas para mejorar al maximo la cocción sin riesgos de accidentes.', '59.99', 1, 1),
(27, 'Paila Bordeada Umco 20 cm', '5037.jpg', 'Elaborada en aluminio virgen. Apto para cocinas a Gas.Está especializada en proporcionar a los consumidores productos y servicios de calidad.', '13.70', 1, 1),
(28, 'Olla para Huevo Poché', '5038.jpg', 'Elaborado en aluminio con revestimiento interno y externo, fácil de limpiar porque, debido al antiadherente, los alimentos no se pegan y permanecen más bonitas durante más tiempo.', '10.70', 1, 1),
(29, 'Freidora Escurridora', '5039.jpg', 'Elaborada en metal, su color puede variar dependiendo del monitor en el que se observe. Sus dimenciones son 18 x 40 cm para escurrir con comodidad todo tipo de alimentos ', '3.75', 0, 1),
(30, 'Batidor de Cocina 22.5 cm', '5040.jpg', 'Echa en material de acero, su textura permite facilitar los movimientos de la mano al batir los alimentos que se van a mesclar de forma homogenea. ', '2.87', 1, 1),
(31, 'Afilador de Cuchillo', '5041.jpg', 'Afilador de Cuchillo 3 Etapas Cocina Afiladores Manuales, diseño antideslizante y ergonómico, Fácil y seguro de usar al momento de afilar.', '6.50', 1, 1),
(32, 'Guantes de Cocina', '5042.jpg', 'ayudan a proteger las manos mientras sostienen platos calientes y vajilla, trabajan sobre la parrilla o llegan a los hornos.', '7.62', 1, 1),
(33, 'Espátula Calada', '5043.jpg', 'Utensilio de cocina formado por una larga hoja rectangular, plana y flexible, de punta redondeada, y con un mango largo lo que permite un mejor agarre y evitar accidentes en la cocina.', '4.70', 0, 1),
(34, 'Cuchara Para Arroz', '5044.jpg', 'Utensilio imprescindible de la cocina, principalmente para repartir porciones del arroz sin dañar el grano y no daña el recipiente de cocción a la hora de mover los ingredientes que se están cocinando', '2.18', 0, 1),
(35, 'Majador de Papa', '5045.jpg', 'Este Majador está elaborado en metal, es ideal para las realizar puré de papa, puré de zanahorias, etc. gracias a su material son menos propensos a absorber olores', '3.28', 1, 1),
(36, 'Bandeja para Hornear Galletas', '5046.jpg', 'Betty Crocker es una famosa marca de de productos para hornear y utensilios de cocina. Sumérgete en el delicioso mundo de la repostería y prepara los mejores postres.', '5.35', 1, 1),
(37, 'Molde para Cupcake', '5047.jpg', 'Molde para hornear Cupcake.Elaborado en acero al carbono, antiadherente. Prepare los mejores postres, limpie y rocíe el interior con manteca o aceite.', '8.32', 1, 1),
(38, 'Molde Cake Umco', '5048.jpg', 'Sumérgete en el delicioso mundo de la repostería y prepara los mejores postres con los utensilios Umco. Molde antiadherente para hornear Cake con diámetro de 16 cm.', '5.70', 1, 1),
(39, 'Repostero Redondo Innova', '5049.jpg', 'Repostero. Modelo:Innova . Repostero apto para Microondas, Congelador. Resistente. Abre fácil. Ideal para la decoración y organización en su cocina.', '2.30', 0, 1),
(40, 'Set de Aceiteras y Saleros', '5050.jpg', 'Este set contiene 2 botellas de almacenamiento de vidrio para salsa, vinagrera de cocina con aceite de 150 ml y 2 saleros de vidrio con capacidad de 80 ml.', '23.70', 1, 1),
(41, 'Porta Cubiertos', '5051.jpg', 'Elaborado en aluminio, recistente a el agua y calor. Es ideal para tu cocina organizando tus cubiertos de una forma mas elegante.', '8.25', 1, 1),
(42, 'Porta Rollo de Cocina', '5052.jpg', 'Porta Rollo de Cocina 14 X 27 cm de plastico, util para sostener un rollo de papel y hacer que se desenrrolle con facilidad para no manchar la cocina.', '3.70', 1, 1),
(43, 'Azucarera Acrílica', '5053.jpg', 'Azucarera Acrílica con Cuchara 9 x 10 cm, necesaria para la decoración de su mesa y util para endulzar bebidas como el café o el té ', '13.70', 0, 1),
(44, 'Servilletero Metálico', '5054.jpg', 'Con un diseño elegante y discreto, el Servilletero es un comodín para todo tipo de decoración y puesta en la mesa. Sostiene servilletas pequeñas o dobladas.', '6.25', 1, 1),
(45, 'Bombonera de Vidrio', '5055.jpg', 'Esta hermosa Bombonera tiene un diseño elegante, es una buena opción para colocar los dulces para tus invitados. Puedes colocarla en el centro de la mesa.', '13.99', 1, 1),
(46, 'Utensilios para Queso', '5056.jpg', 'Utensilios para Queso Laguiole de 3 piezas echo en acero inoxidable con asas de plástico ABS multicolor de aspecto agradable.Apto para lavaplatos, pero se recomienda lavar a mano.', '12.48', 1, 1),
(47, 'Abrelatas Victorinox', '5057.jpg', 'No todas las latas tienen un abrefácil así que el abrelatas es indispensable. Este tipo de abrelatas sirve para abrir cómodamente y sin esfuerzo latas de conservas.', '4.70', 1, 1),
(48, 'Encendedor de Cocina', '5058.jpg', 'Al apretar el pulsador se libera una dosis de gas y, simultáneamente, se produce la chispa, dando lugar a la llama en la parte superior del encendedor.', '5.85', 0, 1),
(49, 'Rallador de Cocina', '5059.jpg', 'Elaborado en acero inoxidable, idela para rallar quesos,todo tipo de verduras, con una forma bastante simple y de muy fácil uso.', '4.70', 1, 1),
(50, 'Pelador de Verduras', '5060.jpg', 'Utensillo de cocina elaborado en metal, ideal para pelar verduras con piel dura capaces de ser laminadas. ', '4.87', 1, 1),
(51, 'Sacacorcho con Estuche', '5061.jpg', 'Set de vino en forma de botella con accesorios como:Descorchador con navaja y destapador, argolla antigoteo y tapas para botella de vino, rompe cápsula.', '14.95', 1, 1),
(52, 'Jarro Cervecero Cooler', '5062.jpg', 'Elaborado en vidrio transparente con alto brillo, resistente a la abrasión y a la rotura. De fácil cuidado y apto para lavavajillas. Ideal para bebidas frías.', '4.90', 1, 1),
(53, 'Juego de Shots Lexington', '5063.jpg', 'Juego de 6 Shots. De la Marca Cristar. Es una nueva serie de copas de cristal sonoro superior, caracterizadas por su innovadora altura uniforme.', '8.93', 0, 1),
(54, 'Quesera con Tapa ', '5064.jpg', 'Tapa transparente para conservar el contenido. La campana plana constituye una cómoda base de apoyo doble función de la base: bandeja y tabla.', '15.75', 1, 1),
(55, 'Lámpara de mesa Envejecido Haus', '5122.jpg', 'Las lámparas de mesa son esenciales como elementos decorativos además de aportar un punto de iluminación extra en cualquier ambiente de su hogar. Gracias al interruptor incorporado en el cable podrá encender / apagar de una manera fácil y sencilla.', '64.17', 1, 2),
(56, 'Cuadro con marco Multi Paisaje', '5123.jpg', 'Los cuadros son probablemente uno de los objetos decorativos que nunca faltan en una casa. Su diseño combina un estilo personal y moderno. La armonía de la decoración la podemos encontrar precisamente en este elemento, por eso es muy importante no utilizar los cuadros como relleno, allí donde nos queda un hueco libre que no sabemos cómo utilizar.', '56.17', 1, 2),
(57, 'Espejo Geométrico Haus', '5124.jpg', 'Este espejo cuenta con un marco de plástico, un material que no se oxida ni se rompe, además no se deteriora con la humedad y es resistente al desgaste. Estratégicamente bien ubicado, el espejo sirve para recuperar zonas ausentes, activar sectores débiles, ampliar espacios reducidos, multiplicar y desviar energía.', '35.21', 1, 2),
(58, 'Reloj de pared Dorado / Negro 30cm', '5125.jpg', 'Este reloj está elaborado en metal, un material con gran resistencia al desgaste, Gracias a su tamaño y diseño es perfecto para su hogar, oficina o como un detalle para regalar. Para su limpieza se recomienda utilizar un paño suave y semihúmedo.', '26.34', 1, 2),
(59, 'Vinilo decorativo Chandelier MyVinilo', '5126.jpg', 'Este vinilo está elaborado en un material resistente y de calidad profesional. Viene en piezas, fáciles de armar y colocar sobre cualquier superficie lisa como paredes, cristales, muebles, espejos, puertas y mucho más. Además, es resistente al agua, no se decolora y es removible.', '4.17', 1, 2),
(60, 'Portarretrato con pedestal Infinity Sqround Umbra', '5127.jpg', 'Infinity es un llamativo marco de fotos que hace flotar su foto entre dos paneles de vidrio mientras agrega una nueva dimensión a su espacio con su forma rectangular. Este marco de fotos puede ser independiente o montado en la pared. Con un diseño original que no se parece a ningún otro marco de fotos.', '24.67', 1, 2),
(61, 'Porta llaves / cartas magnético Umbra', '5128.jpg', 'Este porta llaves cuenta con un sistema de 3 anillos magnéticos que mantienen sus llaves en el lugar. Además, en la parte superior tiene un diseño curvo que le permite almacenar cartas, facturas y demás papeles.', '14.17', 1, 2),
(62, 'Farol Porta velón con agarradera Líneas Entrelazadas Haus', '5129.jpg', 'Este farol está hecho a mano en hierro, un material que posee una alta resistencia al desgaste, lo que garantiza su larga vida útil. Al ser elaborado de manera artesanal puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.', '36.87', 1, 2),
(63, 'Florero Jarrón Trilogy Haus', '5130.jpg', 'Este florero es único y está hecho a mano, puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.', '53.28', 1, 2),
(64, 'Vela Pilar Degrade Dorado', '5131.jpg', 'Esta vela es un accesorio perfecto para decorar y aportar calidez a cualquier rincón de su hogar u oficina en esta época navideña.', '24.17', 1, 2),
(65, 'Adorno Elefante Café Marrés', '5132.jpg', 'Este adorno está elaborado a mano en poliresina, un material de aspecto parecido a la porcelana, pero mucho menos frágil, lo que garantiza su larga vida útil.', '51.23', 1, 2),
(66, 'Sofá cama Mánchester Ultra Comfort', '5133.jpg', 'Este sofá cama, con altura de una cama, ofrece durabilidad ya que permite que la tela mantenga su color y textura en el transcurso del tiempo. Además, es repele al líquidos y humedad, al mismo tiempo permite la circulación de aire, y es de fácil limpieza gracias a su barrera de protección contra manchas.', '384.17', 1, 2),
(67, 'Comedor de 6 puestos Morgan', '5134.jpg', 'Este juego de comedor está elaborado en madera, un material que se destaca por su gran resistencia al desgaste, durabilidad y alta calidad. Además, conservará sus cualidades naturales por muchos años.', '386.27', 1, 2),
(68, 'Mesa de centro Sol Dorado Haus', '5135.jpg', 'Esta mesa de centro es única y está hecha a mano, puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.', '63.58', 1, 2),
(69, 'Aparador 3 niveles y 3 cajones Natural Madera / Hierro', '5136.jpg', 'Este aparador ofrece 3 niveles y 3 cajones, ideales para almacenar y organizar su vajilla, cubertería, lencería de mesa y demás. Los cajones cuentan con manubrios grandes que ofrecen una cómoda manipulación.', '54.27', 1, 2),
(70, 'Librero Repisa 4 niveles', '5137.jpg', 'Este librero de madera de pino y hierro es perfecto para organizar sus objetos favoritos. Sus materiales en conjunto forman un mueble de calidad y resistente al desgaste. Gracias a su diseño resulta muy práctico incluso fuera del hogar, como repisa o exhibidor de artículos resaltando no solo los productos sino también la decoración de sus ambientes.', '48.17', 1, 2),
(71, 'Alfombra Argentum Beige / Café Ragolle', '5138.jpg', 'Esta alfombra está elaborada en polipropileno, una fibra sintética con grandes propiedades que se caracteriza por su gran resistencia al desgaste. Además, es muy fácil de limpiar, y al no tener pelo la hace más fina, evitando que se acumule polvo y suciedad, por lo que es ideal para personas con alergias.', '64.69', 1, 2),
(72, 'Lámpara de mesa con pantalla redonda Trípode', '5139.jpg', 'Esta lámpara de mesa cuenta con una estructura resistente a la decoloración, corrosión y desgaste, lo que garantiza su gran durabilidad. Para su limpieza se recomienda utilizar un paño suave y semihúmedo o con un plumero.', '34.23', 1, 2),
(73, 'Cortina Lucerna con ojal Haus', '5140.jpg', 'La confección de esta cortina en algodón y poliéster consigue que el tejido sea ligero, resistente, con la densidad suficiente para proteger tus ventanas, pero dejando pasar sutilmente la luz y el aire y además, no se arruga.', '31.17', 1, 2),
(74, 'Escultura Mujer Acostada con base Haus', '5141.jpg', 'Esta escultura cuenta con un diseño que resulta distinguido y aportará un toque único a la estancia donde la coloque. Es una pieza única y está hecha a mano, puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.', '74.77', 1, 2),
(75, 'Juego de 3 ramas Serpentín Grueso Belinda Flowers', '5142.jpg', 'Belinda Flowers es una empresa que cuenta con artesanos ecuatorianos que se dedican a la elaboración de flores y elementos decorativos con fibras naturales. Sus productos son cosechados de manera sustentable, en distintas épocas del año, y provienen de distintas regiones del Ecuador.', '7.27', 1, 2),
(76, 'Flor artificial Lirio Haus', '5143.jpg', 'Esta flor artificial conservará su forma durante años ya que está elaborada en plástico y alambre. Estos materiales son totalmente resistentes al desgaste y además logran un efecto muy natural.', '14.17', 1, 2),
(77, 'Botella decorativa Dual Haus', '5144.jpg', 'Esta pieza decorativa es única y está hecha a mano, puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.', '31.23', 1, 2),
(78, 'Portavotiva Copa Silver / Brillos Haus', '5145.jpg', 'Este portavotiva es única y está hecha a mano en aluminio, puede tener variaciones del color o imperfecciones leves, éstas son inherentes y deben ser vistas como parte de su belleza natural y encanto.', '24.15', 1, 2),
(79, 'Adorno Manzana Dorada', '5146.jpg', 'Disfruta decorando tu hogar con accesorios que le den personalidad. Dale vida a tus espacios colocando adornos decorativos con colores y diseños innovadores.', '48.17', 1, 2),
(80, 'Adorno Africana Dorada', '5147.jpg', 'Este adorno adorno está elaborado en poliresina en acabado negro con dorado, ideal para la mesa de centro, la consola de recibidor o escritorio.', '29.38', 1, 2),
(81, 'Figura Decorativa Tribal', '5148.jpg', 'Este hermoso adorno está elaborado en poliresina en acabado dorado y base color negro, ideal para la mesa de centro.', '35.20', 0, 2),
(82, 'Adorno Piña Blanca', '5149.jpg', 'Esta piña decorativa elaborada en cerámica y con acabado brillante es ideal para la mesa de centro o para la consola de recibidor. Dimensión: 10.5 x 10.5 x 13.5 cm', '20.15', 1, 2),
(83, 'Decorativo Flor Blanca', '5150.jpg', 'Este hermoso aplique decorativo está elaborado en poliresina en acabado blanco, ideal para decorar tus paredes del salón o pasillos.', '26.95', 1, 2),
(84, 'Adorno Busto Gentleman', '5151.jpg', 'Este adorno busto gentleman esta elaborado en cerámica en color negro es ideal para la mesa de centro, la consola de recibidor o escritorio', '24.50', 1, 2),
(85, 'Jarrón Naval Blue', '5152.jpg', 'Los jarrones complementan cada rincón del hogar haciendo que se vea más acogedora. Este hermoso jarrón trae un diseño moderno en tonos azules y fondo blanco.', '52.36', 1, 2),
(86, 'Florero Vibes Blanco', '5153.jpg', 'Los florero complementan cada rincón del hogar haciendo que se vea mas acogedora. Este hermoso florero trae un diseño de líneas en color blanco con estilo moderno.', '14.15', 0, 2),
(87, 'Florero de Cristal', '5154.jpg', 'Este hermoso florero de cristal transparente contiene diseño de burbujas, hará que tus espacios se vean más elegantes y modernos. Dimension: 16 x 16 x 27 cm', '22.95', 1, 2),
(88, 'Jarrón Caramel Chic', '5155.jpg', 'Este hermoso jarrón trae un diseño de líneas y puntos en tono cálido, está elaborado en cerámica. Podrás exhibir esta hermosa pieza decorativa en tu sala o en el recibidor.', '34.75', 1, 2),
(89, 'Candelabro Hojas Doradas', '5156.jpg', 'Los candelabros complementan cada rincón del hogar iluminando tus espacios y haciendo de este un lugar acogedor de paz y armonía.', '16.50', 1, 2),
(90, 'Vela Tuscany Sparkling', '5157.jpg', 'Complementa cualquier espacio con un estilo atemporal y una mezcla de fragancias tradicionales y de moda, esta vela cuenta con 3 mechas sin plomo para una agradable experiencia', '17.15', 1, 2),
(91, 'Portavela Black & Rose', '5158.jpg', 'Las portavelas pueden crear una atmósfera relajante, romántica o espiritual. Esta hermosa portavela trae un diseño elegante en colores rosa con negro', '25.50', 1, 2),
(92, 'Lampara de Mesa Basica', '5159.jpg', 'Esta hermosa lámpara trae un diseño moderno y elegante. Aportará un ambiente agradable y luminoso en el salón o dormitorio.', '34.49', 0, 2),
(93, 'Set de 8 Portarretratos', '5160.jpg', 'Estos hermoso y elegantes set de portarretratos son ideales para enmarca tus recuerdos fotográficos de familiares y decorar tu hogar.', '44.50', 1, 2),
(94, 'Portarretrato Collage de Pared', '5161.jpg', 'La decoración de tu hogar es fundamental para construir una atmósfera perfecta. Este hermosos y elegante portarretrato collage de pared es ideales para enmarca tus recuerdos fotográficos.', '24.15', 1, 2),
(95, 'Set de Cuadros Collage', '5162.jpg', 'Los cuadros son los elementos ideales para generar armonía en tu hogar. Estos hermosos cuadros traen un diseño abstracto en tonos cálidos, le dará un estilo moderno y de moda a tu hogar.', '38.20', 1, 2),
(96, 'Cuadro Horn Black & White', '5163.jpg', 'Este hermoso cuadro trae un diseño de detalle de instrumento musical en colores blanco y negro, le dará un estilo moderno a tu sala.', '14.35', 0, 2),
(97, 'Cuadro Abstracto Hojas', '5164.jpg', 'Los cuadros se convierten en el centro de atención al entrar a tu sala. Este hermoso cuadro trae un diseño abstracto de hojas en tonos cálidos.  ', '38.15', 1, 2),
(98, 'Cuadro Tribal', '5165.jpg', 'Este hermoso cuadro trae un diseño tribal en tonos neutros, llenará de personalidad y moda a tu sala de estar.', '35.50', 0, 2),
(99, 'Bandeja Decorativa Modern', '5166.jpg', 'Esta hermosa bandeja decorativa es super versátil ya que la puedes utilizar para organizar tus floreros o simplemente para colocar las copas de vinos de tus invitados.', '22.75', 1, 2),
(100, 'Cojín Decorativo Dorado', '5167.jpg', 'Los cojines son una gran herramienta decorativa según sus diseños, formas y textura. Disfruta decorando tu hogar con la tendencia de cojines de moda que tenemos para ti.', '12.15', 1, 2),
(101, 'Cojín Decorativo Ocre', '5168.jpg', 'Este hermoso cojín esta elaborado en poliéster. Su diseño, forma y textura decora tu salada dandole un toque moderno. ', '12.75', 1, 2),
(102, 'Sofá en L Francia', '5169.jpg', 'Este hermoso sofá en \"L\" contiene un estilo y un confort que enamorarán a tus invitados.Diseñado para hacerte sentir cómodo mientras lees un libro o ves una película.', '324.15', 1, 2),
(103, 'Sofá Reclinable Walton', '5170.jpg', 'El sofá reclinable Walton cuenta con un respaldar de gran tamaño para la cabeza y la espalda, tapizado en cuerina negro para brindarle máxima comodidad.', '368.50', 1, 2),
(104, 'Sofá Kobe 2 Puestos', '5171.jpg', 'El Sofá Kobe ha sido diseñado para brindarte comodidad. Super acolchado tanto en el asiento como en el respaldar, el diseño y color del sofá Kobe le aportará a tu salón un estilo moderno.', '249.75', 1, 2),
(105, 'Mesa de Centro Wood', '5172.jpg', 'La mesa de centro en el salón es fundamental ya que da funcionalidad y versatilidad. Wood trae una hermosa base con diseño minimalista en acabado dorado mate y tablero de MDF.', '115.05', 0, 2),
(106, 'Mesa de Centro Lincon', '5173.jpg', 'Lincon trae un hermoso diseño minimalista, contiene una estructura metálica con diseño de líneas rectas en acabado dorado y tablero de vidrio.', '218.15', 1, 2),
(107, 'Bar Meridan Wengue', '5174.jpg', 'Diseño elegante y sofisticado que permite organizar tus vasos y copas como decoración. Es lo que su hogar necesita, una combinación entre elegancia y estilo que sin lugar a usted debe tener.', '159.20', 1, 2),
(108, 'Silla de Bar Lena Negro', '5175.jpg', 'Las sillas de bar son elementos fundamentales para los espacios del hogar ya que ayudan a definir el caracter de la estancia ya sea por su color o diseño.', '75.15', 0, 2),
(109, 'Electrolux Refrigerador Side by Side con dispensador', '5231.jpg', 'Este refrigerador cuenta con una gran capacidad de 545 litros, control de temperatura electrónico y dispensador de agua y hielo. Además, su sistema de flujo múltiple permite un enfriamiento rápido y eficiente.', '538.67', 1, 3),
(110, 'Indurama Cocina a gas 4 quemadores con Encendido eléctrico', '5232.jpg', 'Esta cocina a gas cuenta con diferentes tamaños de quemadores que le ofrecen la cantidad de fuego necesaria para preparar desde un café hasta mole de olla. Su intensidad de flama se adapta a todas sus necesidades.', '409.23', 1, 3),
(111, 'Horno eléctrico multifunción', '5233.jpg', 'Este horno cuenta con la función de limpieza Teka Hydroclean, que consigue mediante la acción conjunta del vapor de agua y las excelentes propiedades del nuevo esmalte Teka Hydroclean, hace que las grasas y restos de suciedad que han quedado adheridos en las paredes se desprenda sin esfuerzo. Gracias a la nueva tecnología Teka Hydroclean, no es necesario repasar el horno con ningún producto antigrasa.', '448.17', 1, 3),
(112, 'Electrolux Extractor de olores de pared 3 velocidades', '5234.jpg', 'Con la campana extractora de pared EJWB369TDIS Electrolux mantendrás tus espacios libres de olores y tu cocina se verá con un aire vanguardista. Ofrece una extracción libre de 710m³/hr, por lo que será perfecta para brindarte un rendimiento excepcional .', '367.78', 1, 3),
(113, 'Indurama Microondas 8 funciones con temporizador ', '5235.jpg', 'Gracias al microondas MWI-30NE de Indurama de 1000 watts de potencia tendrás 8 opciones de cocción para preparar increíbles platos rápidos y fáciles. Su diseño en color negro le dará un toque diferente a tu cocina y gracias al seguro para niños tus hijos siempre estarán protegidos.', '164.17', 1, 3),
(114, 'Licuadora 10 velocidades + Pulso con vaso de vidrio de 1.25 L', '5236.jpg', 'Ideal para preparar licuados con alto valor nutrimental, cremas, triturar cereales suaves, salsas y malteadas. La licuadora DuraPro de Black+Decker lo tiene todo para ayudarte desde el desayuno hasta la cena.', '74.59', 1, 3),
(115, 'KitchenAid Batidora pedestal 4.5QT K45SSOB Classic', '5237.jpg', 'La batidora Classic de KitcheAid cuenta con un tazón de acero inoxidable de 4.3 litros (4.5 cuartos), para preparar hasta 8 docenas de galletas.', '238.49', 1, 3),
(116, 'Oster Extractor de jugos 2 velocidades + Pulso con jarra 1.25L', '5238.jpg', 'El extractor de jugos Oster extrae lo mejor de la innovación. Cuenta con prácticamente todos los beneficios que te gustaría tener en un solo extractor, e inclusive más. Su boca de alimentación es dos veces más grande, cuenta con accesorios removibles y sus dos velocidades + pulso permiten extraer el jugo tanto de ingredientes blandos como duros', '115.38', 1, 3),
(117, 'Procesador de alimentos NutriBullet Pro', '5239.jpg', 'Ideal para preparar sus batidos favoritos, NutriBullet está diseñado para usarse de manera rápida y sencilla, ya que en segundos obtendrá una bebida suave, saludable y refrescante además de deliciosos y únicos sabores que le ayudarán a mejorar su salud, puede usar ingredientes 100% naturales y sin desperdiciar ni una sola pieza de fruta o vegetal, cuidará su bolsillo y le ayudará a bajar de peso, controlar el azúcar y el colesterol en su cuerpo.', '108.37', 1, 3),
(118, 'Sanduchera para 4 panes 1400W Umco', '5240.jpg', 'Esta sanduchera le permitirá preparar hasta 4 rabanadas de pan en cuestión de minutos. Las placas con revestimiento antiadherente, libre de PFOA, evitan que los alimentos se peguen, facilitando su limpieza.', '53.46', 1, 3),
(119, 'Waflera antiadherente', '5241.jpg', 'Con esta waflera podrá preparar cuatro deliciosos gofres separados en cuestión de minutos. Experimente con diferentes recetas y haga papas fritas o paninis caseros. Simplemente enchufe su electrodoméstico y ya estás listo para cocinar.', '53.84', 1, 3),
(120, 'Crepera antiadherente con disipador y espátula PCRM12 Nutrichef', '5242.jpg', 'Con esta crepera de 12 pulgadas (30.48 cm), es posible hacer un crepe grande o preparar el desayuno a la vez. Además, la construcción de aluminio antiadherente hace que los alimentos vueltos o eliminados sean libres de complicaciones y sin problemas.', '59.82', 1, 3),
(121, 'Cafetera digital Programable con filtro permanente 12 tazas', '5243.jpg', 'Obtenga su dosis ideal durante el día con la Cafetera Térmica de 12 Tazas de BLACK+DECKER. La jarra térmica de acero inoxidable es sellada al vacío para asegurar que su café se mantenga caliente y listo para tomar por horas, la boquilla PerfectPour elimina los derrames y goteos.', '164.78', 1, 3),
(122, 'LG Lavadora de carga frontal Inverter', '5244.jpg', 'Las tecnologías Steam exclusivas de las lavadoras LG, mejoran el cuidado de su salud al brindar una limpieza más profunda libre de alérgenos. TrueSteam sanitiza y elimina hasta el 99.9% de alérgenos, SteamFresh elimina olores, reduce arrugas y refresca y TurboSteam refresca la ropa en tan solo 10 minutos.', '749.28', 1, 3),
(123, 'LG Secadora eléctrica carga frontal Vapor', '5245.jpg', 'El sistema de secado con sensor mide los niveles de humedad durante el ciclo y ajusta automáticamente el tiempo de secado, para que la ropa siempre salga seca. Cuando tu secadora utiliza alrededor de un 20% menos de energía, verás resultados favorables en las facturas de servicios públicos, el consumo de energía, y lo más importante, ayudarás al medio ambiente.', '846.17', 1, 3),
(124, 'Samsung Lavadora / Secadora eléctrica Inverter 24 lbs Lavado', '5246.jpg', 'Reduzca la cantidad de veces que usa la lavadora y ahorre tiempo, esfuerzo y agua. La gran capacidad de 24 libras le permite lavar pilas de ropa en una sola carga. Incluso puede agregar prendas realmente grandes.', '845.76', 1, 3),
(125, 'Plancha a vapor con suela de cerámica Oster', '5247.jpg', 'Esta plancha cuenta con la nueva tecnología de suela con nano hendiduras cóncavas y plexo canales de vaporización que incorpora principios aerodinámicos para un deslizamiento superior y más rápido.', '56.43', 1, 3),
(126, 'Aire acondicionado Inverter Panasonic', '5248.jpg', 'Este aire acondicionado cuenta con AEROWINGS, que son solapas dobles flexibles que pueden dirigir y concentrar el flujo de aire para enfrían un área eficazmente. Estas son capaces de canalizar y concentrar el aire frío hacia arriba, desplegando hacia bajo una suave y uniforme sensación de aire frío en la habitación una vez alcanzada la temperatura deseada. Es lo que se denomina efecto Shower Cooling.', '549.24', 1, 3),
(127, 'Calefactor digital multidireccional Honeywell', '5249.jpg', 'Diseñado con capacidades de calefacción de cerámica inteligente y potente, el Calefactor de Cerámica HeatGenius se puede ajustar para brindar calefacción personal, en su habitación o en el área de piso con sólo pulsar un botón.', '173.48', 1, 3),
(128, 'Ventilador 3 en 1 con sistema repelente de mosquitos ', '5250.jpg', 'Este ventilador cuenta con la función repelente contra insectos, por lo que acepta todas las pastillas del mercado. El exclusivo sistema fácil y seguro permite ajustar la inclinación vertical. Además la oscilación horizontal brinda una mayor distribución del aire.', '112.17', 1, 3),
(129, 'Aspiradora con filtro de agua 1200W', '5251.jpg', 'Esta aspiradora cuenta con el primer avance significativo en tecnología para aspiradoras de los últimos 50 años, ya que reúne todas estas prestaciones en una sola: aspiradora húmeda, aspiradora en seco, purificador de aire y aspiradora con filtro de agua. ', '262.37', 1, 3),
(130, 'Electrolux Lavavajillas 14 puestos', '5252.jpg', 'Este lavavajillas tiene 6 opciones de lavado. Para seleccionar un programa basta presionar la respectiva tecla ACQUAJET que sirve para enjaguar las vajillas que se lavarán más tardes o Lava ollas que es para cargas muy sucias, como potes, ollas, cacerolas y vajillas que fueron dejadas sucias por mucho tiempo.', '537.58', 1, 3),
(131, 'Dispensador de agua 3 controles con botellón escondido MXCBL01D', '5253.jpg', 'Disfrutar se hace más fácil con este novedoso dispensador que brinda agua al clima, fría y caliente para disfrutar de tus bebidas favoritas al instante. Además es fácil de instalar y adaptar el botellón. Gracias a su novedosa bomba se succión que alimenta los dispensadores.', '123.17', 1, 3),
(132, 'Whirlpool Purificador de agua con dispensador ajustable', '5254.jpg', 'Los purificadores de Whirlpool permitirán que tú y toda tu familia puedan beber agua sin preocuparse por las bacterias, contaminantes e impurezas. Este purificador reduce el 99.99% de bacterias, sedimentos y sabor y olor a cloro. Además, es de fácil instalación en el grifo o toma directa de la línea de agua.', '112.86', 1, 3),
(133, 'Enfriador de Aire Prima', '5255.jpg', 'Múltiples funciones: puricador, ventilador y humicador. Tiene 3 velocidades y 7 horas de temporizador. Caja para hielo,ruedas y control remoto a distancia.', '139.50', 1, 3),
(134, 'Purificador de Aire Bazzuka', '5256.jpg', 'Libera iones negativos que purifican el aire eliminando eficazmente las bacterias en diferentes lugares del hogar, elimina varios olores e inhibe el crecimiento de bacterias.', '65.75', 0, 3),
(135, 'Congelador Horizontal Indurama', '5257.jpg', 'El interior del congelador consta con: Sistema doble acción: congelador y enfriador. Mayor capacidad para hacer hielo. Canasta metálica anticorrosiva ', '412.86', 1, 3),
(136, 'Minibar Electrolux', '5258.jpg', 'Este frigobar es ideal para conservar sus bebidas o bocaditos favoritos de manera práctica y sencilla ya sea en su hogar u oficina.', '195.50', 0, 3),
(137, 'Refrigeradora Samsung', '5259.jpg', 'Dale a tu hogar un aspecto moderno, distinguido y minimalista. El diseño distinguido y minimalista tiene una apariencia sencilla y contemporánea para integrarse armoniosamente en tu cocina.', '612.99', 1, 3),
(138, 'Refrigeradora LG Invert', '5260.jpg', 'Abastece tu refrigerador gracias a su amplio espacio de almacenamiento de 28.2 pies cúbicos. La tecnología SpaceMax™ ofrece mayor espacio en el interior, sin aumentar las dimensiones exteriores.', '912.86', 1, 3),
(139, 'Encimera a Inducción', '5261.jpg', 'Vidrio vitrocerámico de fácil limpieza y alta resistencia. Eficiencia que se acomoda a tu necesidad. Sensor de bloqueo para sobrecalentamiento. Nueve niveles de potencia.', '349.86', 1, 3),
(140, 'Hornilla Eléctrica', '5262.jpg', 'Una hornilla 1100 watts de potencia. Fabricada en acero inoxidable. Control de temperatura ajustable. Luz indicadora de encendido. Base antideslizante', '68.75', 0, 3),
(141, 'Hornilla Eléctrica Doble', '5263.jpg', 'Controles de Temperatura ajustables. Permite seleccionar la temperatura necesaria. Luces indicadoras de encendido. Pies engomados antideslizantes. Parrilla.', '95.50', 1, 3),
(142, 'Encimera a Gas Indurama', '5264.jpg', 'Tablero de acero inoxidable. Quemador ultra-rápido triple corona. 5 quemadores con sistema de seguridad cortagas: 1 triple corona, 1 rápido, 2 semi rápidos, 1 auxiliar. Parrillas de hierro fundido.', '499.50', 1, 3),
(143, 'Cocina a Gas 6 quemadores', '5265.jpg', 'Capelo de cristal templado. Cubierta de acero inoxidable. 3 parrillas de hierro fundido. 6 quemadores de aluminio. Horno de 5.1 pies cúbicos. Encendido de cerillo en el horno. ', '779.86', 1, 3),
(144, 'Campana Extractora Indurama', '5266.jpg', 'Campana tipo Slim en acero inoxidable. Panel con pulsantes. 3 Velocidades. Filtros de aluminio de 3 capas lavables. Filtro de Carbón. Iluminación con 2 lámparas tipo dicroico ', '199.86', 1, 3),
(145, 'Dispensador de Agua Indurama', '5267.jpg', 'Tres grifos con opciones de temperatura: caliente , ambiente y fría. Seguro para niños en el grifo de agua caliente. Bandeja removible de fácil limpieza. Luces indicadoras.', '259.00', 1, 3),
(146, 'Lavadora Semiautomática Indurama', '5268.jpg', 'Bandeja para prelavado fácil. Sistema de lavado por impulsor. 2 motores independientes. Lavadora semiautomática con centrifugado plus. Disponible en blanco.', '329.50', 0, 3),
(147, 'Lavadora Automática Whirlpool', '5269.jpg', 'Lavadora de carga superior con agitador Triple Action. 8 ciclos automáticos. 4 ciclos manuales. 3 depósitos automáticos. 2 paneles de control electrónico. ', '812.86', 0, 3),
(148, 'Torre de Lavado y Secado a Gas', '5270.jpg', 'Esta torre de lavado es liberadora cuenta con 8 movimientos especializados que limpian a fondo las prendas, además tiene Dry Xpert un sensor automático que detiene el proceso cuando tu ropa está seca.', '986.86', 1, 3),
(149, 'Freidora de Aire Oster', '5271.jpg', 'Esta freidora utiliza hasta un 99.5% menos aceite que las freidoras tradicionales. El aire caliente circula alrededor de la comida, lo que permite cocinar dejando una capa crujiente y jugosa', '189.76', 1, 3),
(150, 'Parrilla Electrica Black', '5272.jpg', 'Prepare el desayuno con rápidez con la superficie de cocción antiadherente grande y con temperaturas variables. A la hora de limpiar, la bandeja de goteo es apta para lavavajillas.', '64.75', 1, 3),
(151, 'Cafetera Percoladora Oster', '5273.jpg', 'Ahora es posible disfrutar todo el sabor, aroma y textura de un buen café sirviendo hasta 35 tazas y respetando su esencia hasta la última gota.', '82.20', 1, 3),
(152, 'Hervidor de Agua Eléctrico', '5274.jpg', 'Este hervidor usa 1500 watts de potencia para hervir rápidamente hasta siete tazas, para así disfrutar de agua caliente fresca para té, chocolate caliente, entre otras bebidas.', '45.00', 1, 3),
(153, 'Máquina de Café Espresso', '5275.jpg', 'Disfruta de los mejores espressos con la cafetera Gourmet Kitchen. Fácil y rápido de preparar, solo vierte 0.8 litros de agua a la cafetera y coloca una cápsula de café Carracci y tendrás listo tu espresso.', '149.75', 1, 3),
(154, 'Picatodo Eléctrico Oster', '5276.jpg', 'Amplio recipiente de 3 tazas. 2 Velocidades con opción a pulso para mayor control. ccesorios fáciles de remover y lavar, inclusive en lavaplatos.', '59.25', 1, 3),
(155, 'Exprimidor de Jugo Oster', '5277.jpg', 'Exprimidor de jugo con diseño moderno. Con pico vertedor antigoteo. Mecanismo de arranque automático. Un exprimidor que te permitirá preparar deliciosos jugos para el desayuno.', '59.50', 0, 3),
(156, 'Waflera Giratoria Negro', '5278.jpg', 'El desayuno es mucho mejor con la waflera de Black+ Decker. Las ranuras son antiadherentes extra profundas, hacen espacio para todos tus ingredientes favoritos.', '85.99', 1, 3),
(157, 'Tostadora Black & Decker', '5279.jpg', 'Disfrute versatilidad de tostado con solo tocar un botón. Tueste todo tipo de pan, waffles y pastelería, acabados de sacar del congelador, con controles fáciles de usar.', '48.50', 1, 3),
(158, 'Batidora de Inmersión', '5280.jpg', 'Batidora de inmersión 3-en-1 de Black+Decker incluye: Taza de mezclar, recipiente para picar, batidor de huevos. El mini picador es perfecto para picar nueces, vegetales y más.', '75.86', 1, 3),
(159, 'Esterilizador de Alimentos', '5281.jpg', 'Mediante la esterilización por catalizador de agua se puede desinfectar y esterilizar objetos en un corto período de tiempo a través de iones de hidroxilo.', '289.20', 1, 3),
(160, 'Horno Microondas Panasonic', '5282.jpg', 'El Horno Microondas Panasonic Negro 25 Litros tiene 7 opciones de menú automáticos, función de palomitas, función Quick 30 y bloqueos para niños.', '219.86', 1, 3),
(161, 'Aspiradora Robótica Electrolux', '5283.jpg', 'Sistema de visión con cámara 3D y láser, para realizar una limpieza personalizada en su hogar. Detecta obstáculos en tres dimensiones, lo que evita que la aspiradora robot se atasque.', '112.86', 0, 3),
(162, 'Aspiradora de Mano Black', '5284.jpg', 'Esta aspiradora manual viene con una cabeza de mascota motorizada que te ayuda a recoger el pelo de tu mascota, a su vez le brinda una poderosa succión para ayudar a recoger desordenes aún más grandes, como comida y basura.', '129.86', 1, 3),
(163, 'Juego de sábanas Robot Dinosaurios Multi Haus', '5341.jpg', 'Estas sábanas están elaboradas en 100% poliéster, una fibra que le aporta gran resistencia al desgaste, durabilidad y su capacidad para no arrugarse. Además, las puede usar y lavar tantas veces como desee sin que pierda sus propiedades técnicas ni estéticas.', '22.50', 1, 4),
(164, 'Colchón Natasha Pillow Top Beautyrest Black Simmons', '5342.jpg', 'Exclusivo de Beautyrest Black. Resortes independientes fabricados con tres alambres de acero enlazados para darte el mejor soporte y durabilidad.', '560.00', 1, 4),
(165, 'Almohada ergonómica Memory Foam Haus', '5343.jpg', 'Esta almohada de memory foam suavemente sostiene su cabeza y cuello, cambiando de forma según sus movimientos, proporcionando soporte toda la noche.', '59.99', 1, 4),
(166, 'Cama Madox Carrusel', '5344.jpg', 'Esta cama está elaborada en madera, un material natural que hace que la casa se sienta acogedora. Además es muy duradera, fácil de limpiar y conservar.', '915.99', 1, 4),
(167, 'Velador con 2 cajones Natural Organic Haus', '5345.jpg', 'Está elaborado en madera de acacia que destaca por su dureza y elasticidad. Se trata de un material pesado, muy duradero, capaz de resistir muy bien los cambios de humedad. Lo que garantiza notablemente su vida útil y disfrutará de ellos durante mucho tiempo.', '150.17', 1, 4),
(168, 'Armario para guardar ropa', '5346.jpg', 'Este armario está elaborado en PEVA, un material que no permite la acumulación de malos olores, además de ser resistente al desgaste', '49.59', 1, 4),
(169, 'Baúl / Banco Bench Ultra Comfort', '5347.jpg', 'Este banco es ideal para poner a los pies de la cama en el dormitorio, aunque también puede ponerlo en el recibidor, en el salón o para decorar pasillos o rincones.', '122.59', 1, 4),
(170, 'Sofá cama inflable 1 puesto Intex', '5348.jpg', 'Este sofá cama está diseñado para ofrecer versatilidad, es ideal para relajarse casi en cualquier lugar, si está en casa mirando televisión, lee un libro o simplemente desea relajarse en el suave y aterciopelado sofá y luego conviértalo fácilmente en un colchón de aire de tamaño Twin cuando esté listo para acostarse.', '77.35', 1, 4),
(171, 'Alfombra Hojas Beige Lana NV Verbatex', '5349.jpg', 'Esta alfombra está confeccionada en lana y poliamida. La lana es uno de los tejidos que conservan bien su color durante mucho tiempo y es muy flexibles, tiene la propiedad de la resilencia, con lo que puede volver a recuperar su forma tras haber estado soportando el peso de un mueble durante mucho tiempo (al contrario que las fibras sintéticas)', '215.99', 1, 4),
(172, 'Zapatera expandible 4 niveles', '5350.jpg', 'La práctica zapatera telescópica antideslizante «Hero» se puede ampliar en anchura de 62 a 115 cm y se puede adaptar a diversas habitaciones. La zapatera ofrece un orden claro y un espacio generoso en cuatro niveles para 20 pares de zapatos en el pasillo, el guardarropa y demás habitaciones del hogar.', '46.79', 1, 4),
(173, 'Perchero para pared 3 servicios Mini Cubby Umbra', '5351.jpg', 'Cubby Mini de Umbra es un organizador compacto que le servirá bien en la puerta de su casa o en otro espacio de su hogar donde le gustaría tener lo esencial a mano y organizado.', '23.24', 1, 4),
(174, 'Spa Sonido con Máscara masajeadora / 1 Esencia Ellia Relax Homedics', '5352.jpg', 'Comience aplicando el Roll-On de Aceite Esencial Dream Away en los puntos del pulso, las sienes, la parte posterior del cuello o las plantas de los pies y deje que su aroma herbáceo y relajante calme su mente.', '58.49', 1, 4),
(175, 'Alfombra para ducha con antideslizante Ondas Novo', '5353.jpg', 'Esta alfombra está elaborada en polivinilo, un material sintético que ofrece una superficie suave y agradable a la pisada y resistente a la humedad.', '17.00', 1, 4),
(176, 'Organizador esquinero para ducha con ventosas Silver Everett', '5354.jpg', 'Este organizador con revestimiento anticorrosivo proporciona un aspecto clásico y seguirá luciendo nuevo durante años de uso constante. La estructura de rejilla permite un drenaje rápido del agua a medida que se seca el jabón o la esponja', '25.96', 1, 4),
(177, 'Hamper mediano Haus', '5355.jpg', 'Este hamper está elaborado en mimbre, una fibra vegetal que se caracteriza por ser un recurso muy ligero y robusto, al mismo tiempo, que es fácil de trasladar y resistente al desgaste. Cuenta con un forro de poliéster, por lo que permite una ventilación adecuada y no atrapa humedad, evitando la acumulación de malos olores.', '35.11', 1, 4);
INSERT INTO `productos` (`id_producto`, `descripcionCorta_producto`, `foto_producto`, `descripcionLarga_producto`, `precio_producto`, `habilitado_producto`, `categorias_id_categoria`) VALUES
(178, 'Rasuradora / Brocha para barba con base Labrado Becker Solingen', '5356.jpg', 'Este práctico juego incluye una rasuradora Gillete Mach3 y una brocha elaborada con cerdas naturales de un suave pelo de tejón.', '32.53', 1, 4),
(179, 'Plancha alisadora 1\" Titanio 11 ajustes de temperatura / Pantalla LCD', '5357.jpg', 'Alisa y peina tu cabello como profesional con esta plancha alisadora de alto rendimiento. Las placas flotantes de cerámica y titanio de 1\" proporcionan un calor uniforme, eliminan los espacios y llegan bien cerca de la raíz para lograr un estilo super lacio que amarás.', '80.99', 1, 4),
(180, 'Secador Smooth Brilliance Styler Revlon', '5358.jpg', 'El motor CA profesional de alta calidad y duración extiende la vida de su secador hasta 3 veces más comparado a un motor regulador CC. El potente flujo de aire seca el cabello rápido, limitando exponer el cabello al calor sellando con un brillo y suavidad en menos tiempo.', '41.39', 1, 4),
(181, 'Masajeador programable para pies con calor Shiatsu Air 2.0', '5359.jpg', 'Con un calor relajante, innumerables controles de intensidad y sensación y la poderosa marca de tecnología Shiatsu de masaje profundo, se preguntarás por qué alguna vez tiene que volver a ponerse los zapatos.', '212.99', 1, 4),
(182, 'Basurero con tapa vaivén Koziol', '5360.jpg', 'Este basurero está elaborado en polipropileno, un material que no se oxida ni se rompe, además no se deteriora con la humedad y es resistente a los impactos moderados o fuertes y al desgaste.', '11.27', 1, 4),
(183, 'Tapa para inodoro alargado Metallic Wood Ginsey', '5361.jpg', 'Esta tapa se adapta a inodoros alargados y cuenta con bisagras cromadas que ofrecen un pulido sofisticado.', '35.09', 1, 4),
(184, 'Bolsa para agua caliente Avantex', '5362.jpg', 'Su uso es ideal para aliviar dolores de espalada, cintura, extremidades, músculos, calambres, cólicos menstruales o para días y noches frías.', '26.62', 1, 4),
(185, 'Cortina de baño Líneas Darian Croscill', '5363.jpg', 'Esta cortina está confeccionada en 100% poliéster, por lo que ofrece una gran resistencia al desgaste y suavidad al tacto , además de que tiene la ventaja de que es lavable en la lavadora.', '15.27', 1, 4),
(186, 'Bata con pantuflas Noel Haus', '5364.jpg', 'Esta bata de baño está elaborada en 100% poliéster, por lo que súper suave al tacto y al mismo tiempo muy absorbente. Ideal para los que disfrutan de una textura suave en la piel luego de ducharse y asegurando la rapidez en el secado. Además, incluye unas pantuflas para que se sienta cómodo en todo momento.', '20.49', 1, 4),
(187, 'Cobertor Básico Azul', '5365.jpg', 'La ropa de cama es una parte fundamental en nuestro dormitorio, según su textura y diseño te dará la sensación de confort. Además de proteger el colchón y la almohada te abrigará durante la noche.', '35.00', 0, 4),
(188, 'Colchón 1 plaza y media', '5366.jpg', 'Lujosa tela increíblemente suave que se adapta a los movimientos del cuerpo para mayor comodidad. Además nuestras espumas AirCool proporcionar soporte y alivio de presión.', '235.70', 1, 4),
(189, 'Colchón Inflable Intex', '5367.jpg', 'El sencillo y conveniente sistema de inflado de batería de 2 pasos tendrá su colchón de aire listo para funcionar en minutos. Simplemente infle el colchón de aire con la bomba a batería y luego ajuste su nivel de comodidad.', '61.50', 1, 4),
(190, 'Cama Nápoles 2 Plazas', '5368.jpg', 'La cama tiene una sólida estructura de madera de copal, canelo y eucalipto, maderas amargas que evita la contaminación. Cama bajo pedido con un tiempo de 8 días laborables.', '399.00', 0, 4),
(191, 'Cama 1 plaza y media', '5369.jpg', 'Este producto requiere armado, se entrega en cajas desarmado. La cama se compone de 1 Cabecero + 1 Base. La cama tiene una sólida estructura de madera de copal, canelo y eucalipto.', '255.45', 1, 4),
(192, 'Cobija Arabesco Flor Beige', '5370.jpg', 'Esta hermosa cobija contiene una textura suave y delicada que permitirá relajarte y tener un descanso placentero. Es super versátil ya que la puedes utilizar en el dormitorio para descansar.', '29.00', 1, 4),
(193, 'Liera con cajones', '5371.jpg', 'Esta hermosa litera echa en madera de eucalipto aparte de ahorrar espacio permite dar una buena apariencia a tu dormitorio. Contiene dos camas, una escalera y 6 cajones para guardar tu ropa o sabanas. No incluye conchones.', '523.00', 1, 4),
(194, 'Litera Sofá Cama', '5372.jpg', 'Esta bonita litera además de servir como cama para dormir y descansar la parta inferior de la litera tiene la capacidad de convertirse en un novedoso Sofá.', '339.00', 1, 4),
(195, 'Velador 1 Cajón Wengue', '5373.jpg', 'El velador trae un diseño moderno de 1 cajones con 1 nicho a debajo. Es ideal para guardar tus libros, accesorios etc. Está elaborada en MDP. Dimensiones: 53 x 36 x 55 cm', '109.00', 0, 4),
(196, 'Veladora Moderna de Melanina', '5374.jpg', 'Este hermoso diseño de velador dará un estilo moderno a tu dormitorio, esta echo a base de melanina pero con acabado similar a la madera. En la parte superior tiene un vidrio resistente a cualquier golpe.', '78.35', 1, 4),
(197, 'Consola con Espejo', '5375.jpg', 'Con un diseño moderno y elegante, este mueble de dormitorio es un complemento perfecto como mueble de recibidor, dale más personalidad combinándolo con pequeños adornos.', '159.10', 1, 4),
(198, 'Base para Colchon Paraíso', '5376.jpg', 'Estructuras de madera solida con patas de madera con tratamiento antipolilla, cubiertas con espuma de alta densidad en la parte superior e inferior, que brindan los atributos técnicos para el máximo desempeño de su colchón.', '115.50', 1, 4),
(199, 'Coqueta Isabella con espejo', '5377.jpg', 'Este mueble es decorativo y optimiza espacio, ideal para la decoracion de su dormitorio. Elaborado en Madera color Wengue. Contiene 1 Cajón en la parte inferior y repisa para organizar lo que desee.', '158.87', 1, 4),
(200, 'Espejo de Cuerpo Entero', '5378.jpg', 'Este hermoso diseño aparte de dar un buen estilo a tu dormitorio te permitirá ver cómo quedo tu vestuario desde los pies hasta la cabeza. Está elaborado en madera MDF y acabado UV premium', '50.00', 0, 4),
(201, 'Ropero Amendola 3 Puerta', '5379.jpg', 'El ropero Amendola es ideal para dormitorios con poco espacio, contiene un diseño moderno con espacio interno. Cuenta con estantes y cajones para organizar tus prendas y accesorios.', '219.35', 1, 4),
(202, 'Cómoda Aurora 7 Cajones', '5380.jpg', 'La cómoda Aurora es ideal para mantener organizado tus prendas de vestir o ropa de cama. Cuenta con 7 cajones y 1 puerta. Su color y diseño combinará perfectamente con la decoración de tu dormitorio.', '185.00', 1, 4),
(203, 'Armario Lotus 6 Puertas', '5381.jpg', 'El armario Lotus te ayudará a ordenar tus prendas y accesorios. Su diseño moderno y elegante le dará personalidad a tu dormitorio. Contiene 6 puertas con espacios internos y 2 cajones para una mejor organización.', '264.85', 1, 4),
(204, 'Toalla Triz Terracota', '5382.jpg', 'Elaborada en 100% Algodón. Para conservar su textura y color se recomienda lavar a una temperatura máxima de lavado de 40°C en proceso moderado, no usar blanqueador, secado normal por escurrimiento a la sombra.', '3.20', 1, 4),
(205, 'Dispensador de Jabón', '5383.jpg', 'Dispensador de jabón plástico turquesa, echo en alumunio, con una valvula resistente ya que a la hora de extraer jabón no permite que se desperdicie ni una sola gota. Es ideal para decorar tu baño.', '6.89', 0, 4),
(206, 'Cortina de Tela Floreada', '5384.jpg', 'Este hermoso estampado de flores dará un gran estilo a tu baño. Elaborado en 100% Poliéster, 100 g. Medidas de 180 x 180 cm. Diseño estampado de Flores.', '15.04', 1, 4),
(207, 'Alfombra de Baño Chenille', '5385.jpg', 'Es absorbente y cómoda. Trae un diseño clásico en color celeste. La alfombra de baño Chenille está elabora en poliéster lo que la hace suave al tacto y una superficie resistente.', '12.99', 1, 4),
(208, 'Toallero Metálico Doble', '5386.jpg', 'Este toallero está elaborado en metal en acabado plata. Permite colocar hasta dos toallas, su diseño moderno dará un gran estilo a tu baño.', '10.00', 1, 4),
(209, 'Repisa de Baño', '5387.jpg', 'Esta hermosa repisa de madera le dará a tu baño un gran estilo. Incluye un espejo por delante y por detras tiene 3 niveles, los cuales son ideales para guardas el jabón, sepillo de dientes, cremas faciales, shampoo, entre otras.', '45.65', 1, 4),
(210, 'Lavamanos Soler Blanco', '5388.jpg', 'Fabricado en porcelana sanitaria vitrificada. Esmaltado en todas sus áreas visibles. Se recomienda combinar con monocomando alto o grifería de pared. Se puede instalar sobre cualquier tipo de mesada.', '68.00', 1, 4),
(211, 'Inodoro Briggs Ego', '5389.jpg', 'Tecnología Pure y su sistema de 3 jets generan un lavado en espiral que aumenta la limpieza total del inodoro y potencializa la fuerza de descarga.', '158.25', 0, 4),
(212, 'Jabonera Metálica Plata', '5390.jpg', 'Esta jabonera está elaborada en metal, cuenta con un atractivo diseño en acabado plata. Es el complemento ideal para organizar tus productos de higiene personal.', '5.35', 1, 4),
(213, 'Porta Cepillos Blanco', '5391.jpg', 'Este porta cepillos de dientes elaborado en plástico, cuenta con un atractivo diseño en color blanco. Completa el juego con el dispensador de jabón (no incluido).', '6.20', 1, 4),
(214, 'Juego de Accesorios para Baño', '5392.jpg', 'Accesorios fabricados totalmente en resinas plásticas. Juego Completo incluye 6 piezas: Portacepillos, Jabonera, Portarrollo, Gancho para Ropa, Toallero de Barra, Toallero de Aro. Sistema de sujeción mediante tornillos a la pared.', '22.19', 0, 4),
(215, 'Ducha Shelby Edesa', '5393.jpg', 'Renueva los accesorios de baño con calidad y con diseños modernos. La mezcladora de ducha contiene un moderno diseño que armoniza perfectamente en tu ambiente de baño.', '154.84', 1, 4),
(216, 'Cabina de Baño Square', '5394.jpg', 'Si piensas en renovar tu baño te presentamos esta cabina de baño que contiene un diseño moderno con textura de rayas horizontales y esquina de punta. Se adapta a cualquier a cualquier cuarto de baño.', '554.99', 1, 4),
(217, 'Samsung Smart TV QLED Q60A 4K Wi-Fi / BT / 3 HDMI / 2 USB', '5411.jpg', 'Color brillante y duradero con Quantum Dot. La tecnología Quantum Dot ofrece la mejor imagen hasta la fecha. Con Color Volume 100%, Quantum Dot toma la luz y la convierte en un color impresionante que se mantiene fiel a cualquier nivel de brillo.', '1054.70', 1, 5),
(218, 'Teléfono inalámbrico con 3 auriculares ybloqueo de llamadas  Panasonic', '5412.jpg', 'Estos teléfonos inalámbricos cuentan con una pantalla LCD de 1.6\" con iluminación color ámbar, teclado iluminado más fácil de observar, incluso en la obscuridad, y botón de intercomunicación especial para hacer llamadas a extensiones fácilmente.', '78.19', 1, 5),
(219, 'Proyector S31 3200 lúmenes / HDMI 800x600 Epson', '5413.jpg', 'Este proyector es ideal tanto para el hogar como para la oficina. Además, podrá visualizar tanto películas y fotos familiares en una pantalla grande, así como también ofrecer presentaciones nítidas y claras.', '164.43', 1, 5),
(220, 'JBL Barra de sonido con subwoofer 110W SB130', '5414.jpg', 'La JBL Cinema SB130 ofrece 110 W de potencia del sistema, Dolby Digital, dos unidades de gama completa y un subwoofer con cable. Disfruta de un sonido potente con bajos profundos que da vida al cine y a la música. ', '149.37', 1, 5),
(221, 'Panasonic Parlante para fiesta Bluetooth/ USB/ Radio AM-FM / Karaoke', '5415.jpg', ' Los bajos robustos y la resonancia que demandan las fiestas han sido fortalecidas aún más gracias al exclusivo Bass Reflex System. ', '314.48', 1, 5),
(222, 'Dell Laptop Latitude 3410 Intel Core i5-8265 8GB/1T', '5416.jpg', 'La laptop empresarial esencial de 14\" más pequeña del mundo, que se ajusta a su forma de trabajar dondequiera que usted esté. La nueva Dell Latitude 3410 es más pequeña y más delgada, con un acabado más liviano y biseles de pantalla angostos que le brindan más espacio para trabajar.', '654.17', 1, 5),
(223, 'HP AIO 24-dd0011la Athlon 3150U 4GB / 1T Win10 Home 23.8\"', '5417.jpg', 'La HP All-in-One combina la potencia de una computadora con la belleza de una pantalla delgada y moderna en un dispositivo confiable. Actualízala fácilmente para que siempre tengas lo último en tecnología.', '725.79', 1, 5),
(224, 'Impresora multifunción con tinta continua Wi-Fi DCP-T420W Brother', '5418.jpg', 'El multifuncional de inyección de tinta a color DCP-T420W de la serie InkBenefit Tank es ideal para usuarios del hogar o la oficina que necesiten un equipo de tamaño compacto, fácil de usar y con conectividad inalámbrica.', '214.17', 1, 5),
(225, 'Disco duro USB 3.0 Seagate', '5419.jpg', 'Este disco duro portátil ofrece una sencilla solución cuando necesita agregar almacenamiento instantáneo a su computadora y llevar archivos con usted. Se instala fácilmente con la conexión de un solo cable USB. Puede comenzar a guardar sus archivos digitales en este disco duro externo después de sólo segundos de su instalación.', '86.17', 1, 5),
(226, 'Flash Memory USB 3.0 Data Traveler 100 G3 Kingston', '5420.jpg', 'Esta memoria flash cumple con las especificaciones USB 3.0 de la próxima generación para beneficiarse de las tecnologías de notebooks, PCs y dispositivos digitales. Garantiza almacenamientos y transferencias rápidas y sencillas de documentos, música, video y mucho más.', '9.28', 1, 5),
(227, 'Samsung Galaxy A02S CH29727 4GB / 64GB 13MP / 5MP 5000mAh 6.5\"', '5421.jpg', 'Menos bordes, más pantalla para disfrutar. Expande tu vista con el Infinity-V Display de 6.5” de Galaxy A02s. Gracias a la tecnología HD+, tus contenidos lucirán aun mejor, nítidos y claros.', '268.19', 1, 5),
(228, 'Samsung Tablet Galaxy Tab A 32GB / Android 9.0 / 5100mAh 8\"', '5422.jpg', 'La Galaxy Tab A es tu compañera de viaje ideal, con amplia capacidad para tu día a día y mucho más. Su diseño, fácil de sostener en una sola mano, es delgado, compacto y portátil; una combinación perfecta de rendimiento y diseño.', '197.35', 1, 5),
(229, 'Apple iPad Air Wi-Fi 64GB Space Gray 10.9\"', '5423.jpg', 'Lleno de potencia, color y posibilidades. El iPad Air es más capaz que una computadora, y todo lo hace de una forma más mágica y sencilla. Y ahora, con aún más funcionalidades y capacidades, es más versátil que nunca.', '846.67', 1, 5),
(230, 'Base de carga inalámbrica para celular con soporte 10W Belkin', '5424.jpg', 'CARGA INALÁMBRICA RÁPIDA DISEÑADA PARA EL USO DIARIO. Carga rápida y segura de hasta 10 W para dispositivos habilitados con Qi*. Diseñado para funcionar en cualquier orientación es perfecto para cargar mientras navegas por internet o ves vídeos por streaming.', '33.17', 1, 5),
(231, 'Sensor de Movimiento Inalámbrico Yacaré', '5425.jpg', 'El sensor de movimiento inalámbrico es un accesorio del sistema de alarma inteligente, sobre todo para uso en interiores. El sensor infrarrojo de alto rendimiento, funciona bajo la programación lógica operativa que permite análisis inteligente. Esto significa que detecta con precisión movimiento del cuerpo humano y efectivamente evita falsas alarmas.', '31.65', 1, 5),
(232, 'Sensor de Humo Inalámbrico Yacaré', '5426.jpg', 'El sensor de humo inalámbrico es un accesorio del sistema de alarma inteligente. Utiliza un microprocesador que funciona con señales fotoeléctricas, tiene protección al polvo, a plagas, etc. El sensor responde bien al humo de la combustión lenta y ardiente.', '34.19', 1, 5),
(233, 'Cerradura inteligente Apertura Derecha Interno Yacaré', '5427.jpg', 'Las cerraduras inteligentes son uno de los mejores productos para el hogar inteligente cuando se trata de combinar estilo y automatización. Si es propietario de una casa o departamento que alquila durante las vacaciones, es cliente de servicios de limpieza o de paseador de perros, o alguien que tiene familiares y amigos que aparecen con frecuencia en su casa, una cerradura inteligente puede hacer la vida más fácil para todos.', '364.61', 1, 5),
(234, 'Cámara 1080P / Audio doble vía / Detecta movimiento', '5428.jpg', 'Cámara de seguridad inteligente compacta, para interiores, con video de alta definición 1080P, detección de movimiento y audio de dos vías que te permite monitorear el interior de tu casa día y noche. Funciona con Alexa', '76.48', 1, 5),
(235, 'Conector inteligente Wi-Fi DSP-W215 D-Link', '5429.jpg', 'El conector Inteligente mydlink Home Smart Plug es un dispositivo de Smart Home compacto, multifuncional y fácil de usar, que le permite monitorizar y controlar los aparatos eléctricos de su hogar esté donde esté.', '48.33', 1, 5),
(236, 'Sensor Wi-Fi para puerta de Garaje Yacaré', '5430.jpg', 'El sensor para puerta de garaje inalámbrico es un accesorio del sistema de alarma inteligente. El sistema informa al usuario cuando es necesario reemplazar la batería mediante la aplicación cuando sea necesario. Cuando la puerta del garaje se abre mientras está en estado armado, el sensor activará una alarma.', '33.97', 1, 5),
(237, 'Teclado gaming LED 104 teclas KB-305 Xtrike Me', '5431.jpg', 'Teclas multimedia Acceda y controle rápidamente el volumen de su reproductor multimedia, consulte el correo electrónico y más.', '17.22', 1, 5),
(238, 'Audífonos gaming iluminado 7 colores HP-311 Xtrike Me', '5432.jpg', 'Los audífonos estéreo para juegos Xtrike Me HP-311 brindan comodidad y versatilidad para todas sus necesidades de juegos y entretenimiento de audio.', '17.32', 1, 5),
(239, 'Memoria micro SDHC de 16GB con adaptador Verbatim', '5433.jpg', 'La tarjeta de memoria micro SDHC con adaptador, es la solución de almacenamiento extraíble más popular para dispositivos móviles. Es compatibles con todos los dispositivos, cámaras, lector de tarjetas o computadora equipados con ranura micro SDHC.', '12.17', 1, 5),
(240, 'Video reproductor DVD Sony', '5434.jpg', 'Con este reproductor usted tendrá acceso al contenido de DVD’s, CD’s, o memorias USB. Permite la reproducción de aproximadamente 1.5 veces más rápido que lo normal para realizar un escaneo rápido, o la reproducción lenta para ver jugadas deportivas o escuchar programas a menor velocidad.', '54.58', 1, 5),
(241, 'Micrófono Inalámbrico Bazzuka', '5435.jpg', 'Micrófono Bazzuka con sistema inalámbrico que te ofrece una reproducción vocal limpia y nítida. Ideal para corear tu canciones favoritas entre amigos o para eventos sociales.', '119.05', 1, 5),
(242, 'Micrófono Gaming Xtrike', '5436.jpg', 'Este tipo de micrófono es ideal para aquellas personas que dedican muchas horas de su semana o día a día, para jugar en la internet. Este dispositivo es una excelente opción para jugar y divertirse.', '15.25', 1, 5),
(243, 'Parlante Portable Bazzuka', '5437.jpg', 'Disfruta de tu música con el Portable Bazzuka. Batería recargable con duración de 3 - 4 horas. Conexión bluetooth para que puedas reproducir tus canciones desde tu celular.', '30.65', 1, 5),
(244, 'Echo Dot 4ta Generación', '5438.jpg', 'Completa cualquier habitación con Alexa. Nuestro altavoz inteligente más vendido tiene un diseño elegante y compacto que resulta ideal para espacios pequeños. Ofrece un sonido de calidad.', '91.50', 0, 5),
(245, 'Kit de Seguridad Vizzion', '5439.jpg', 'La mejor opción para mantener tu casa o tu negocio seguros, con monitoreo 24/7 por medio de una conexión a internet podrás ver en tiempo real que sucede en un cuarto, una sala o el patio de tu casa.', '409.35', 1, 5),
(246, 'Altavoces Xtrike Me', '5440.jpg', 'Los altavoces de alta calidad ofrecen un sonido limpio y preciso. Alimentado por USB, no requiere una fuente de alimentación externa. Mando a distancia en línea. Diseño compacto.', '13.99', 1, 5),
(247, 'Adaptador Multipuerto', '5441.jpg', 'El adaptador multipuerto AV digital USB-C le permite conectar su Mac o iPad con USB-C habilitado a una pantalla HDMI, al mismo tiempo que conecta un dispositivo USB estándar y un cable de carga USB-C.', '65.48', 1, 5),
(248, 'Cargador Portátil Joyroom', '5442.jpg', 'Este cargador proporciona protección contra cortocircuitos, protección de sobrecalentamiento, protección contra sobretensión y protección de sobrecarga para garantizar la seguridad para su amado teléfono celular.', '31.43', 0, 5),
(249, 'Cable Thunderbolt Apple', '5443.jpg', 'La tecnología Thunderbolt permite transferencias de datos ultrarrápidas con dos canales independientes de 10 Gbps cada uno. Utiliza este cable para conectar dispositivos compatibles con Thunderbol.', '28.49', 1, 5),
(250, 'Soporte Magnético para celular', '5444.jpg', 'Con su poderoso magnetismo, mantendrá su teléfono inteligente seguro mientras conduce. Este soporte magnetico para coche movil telefono puede rotar 360 grados con el diseño especial de bola giratoria.', '9.15', 1, 5),
(251, 'Disco Duro Interno 2TB', '5445.jpg', 'Dele a su computadora de escritorio un impulso en su rendimiento y almacenamiento al combinar su disco duro con un disco para maximizar el espacio para guardar tus datos y archivos.', '66.95', 1, 5),
(252, 'Disco Duro Solido 960 GB', '5446.jpg', 'La unidad A400 de estado sólido de Kingston ofrece enormes mejoras en la velocidad de respuesta, sin actualizaciones adicionales del hardware. Brinda lapsos de arranque, carga y de transferencia de archivos veloces.', '180.45', 0, 5),
(253, 'Apple Watch SE', '5447.jpg', 'Puedes usar el Apple Watch para seguir al tanto de lo que ocurre en tus redes sociales, ver los mensajes de WhatsApp y responder o los correos electrónicos o incluso se puede utilizar para hacer fotografías con el teléfono a distancia.', '215.22', 1, 5),
(254, 'Samsung Galaxy Watch', '5448.jpg', 'El Samsung Galaxy Watch es un smartwatch bien acabado. Además del inmejorable bisel giratorio, en el lateral se distinguen dos botones físicos que facilitan la navegación e interactuar con los distintos menús del smartwatch.', '135.16', 0, 5),
(255, 'Interruptor de Led Inteligente', '5449.jpg', 'Este aparato inteligente te permite controla la luz desde distintos lugares de la casa, genera diversas atmósferas según la situación y permite programar rutinas.', '36.46', 1, 5),
(256, 'Puerta Inteligente para Mascotas', '5450.jpg', 'Este producto tecnológico para el hogar detecta mediante un sensor de Bluetooth si un perro o gato quiere salir o entrar a casa.', '118.50', 1, 5),
(257, 'Termómetro Inteligente', '5451.jpg', 'Es un producto tecnológico que administra la temperatura de manera eficiente, lo cual se traduce en un ahorro de electricidad y cuidado del medioambiente. ', '54.75', 1, 5),
(258, 'Colchón Inteligente Xiomi', '5452.jpg', 'Se trata de un colchón inteligente que actúa como una especie de Mi Band. Este producto tecnológico sabe cuándo estamos cansados y modifica su superficie para ofrecer un mejor descanso.', '562.85', 1, 5),
(259, 'Purificador de Aire Inteligente', '5453.jpg', 'Comercializado hace ya unos años, es infaltable en un hogar inteligente. Este producto tecnológico controla el flujo de aire y permite que haya aire limpio siempre.', '65.94', 0, 5),
(260, 'Echo Spot', '5454.jpg', 'Echo Spot es un dispositivo con una pequeña pantalla que hace la función de reloj con alarma inteligente. Se trata un dispositivo de pequeño tamaño con pantalla, que puede ser colocado en cualquier lugar de la casa y que integra el asistente Alexa.', '168.37', 1, 5),
(261, 'Termostato Nest', '5455.jpg', 'esta tecnología para la casa permite administrar el sistema de calefacción o refrigeración. Al programarse automáticamente, cuenta con las ventajas de ahorro energético y cuidado del medioambiente.', '112.28', 1, 5),
(262, 'Kit Gaming Xtrike', '5456.jpg', 'Teclado retroiluminado con diseño ergonómico. Mause seño de alto perfil con soporte completo para la palma y el pulgar y auriculares cerrados para colocar sobre las orejas para sonidos graves potentes.', '50.37', 1, 5),
(263, 'Audífonos Inalámbricos Panasonic', '5457.jpg', 'Los auriculares combinan un sonido nítido y dinámicos con 50 horas de reproducción continua, para que pueda sumergirse en su banda sonora personal. Cuentan con un diseño estilizado y colores elegantes.', '52.76', 0, 5),
(264, 'Audífonos Deportivos', '5458.jpg', 'El diseño tipo canal y el sistema de sujeción ajustable, mantienen estos audífonos tipo clip cómodamente en su lugar, mientras se realizan actividades deportivas. Su diseño resistente al agua, protege contra el ingreso del sudor.', '35.50', 1, 5),
(265, 'Tablet + Teclado Alcatel', '5459.jpg', 'Tablet + Teclado Alcatel 1T10 Negro cuenta con un procesador: Quad-Core 1.3 GHz CPU. Pantalla: 10\" 800 x 1280. RAM: 1 GB. Memoria: Interna 16 GB / Expandible 128GB MicoSD. Sistema Operativo: Android Oreo 8.0. y Conectividad: WIFI', '0.06', 1, 5),
(266, 'MacBook Air Apple Oro', '5460.jpg', 'Nuestra notebook más ligera y delgada vuelve completamente renovada por dentro. Gracias al chip M1 de Apple, el CPU es hasta 3.5 veces más rápido y el GPU hasta 5 veces más veloz.', '1263.05', 1, 5),
(267, 'Laptop Huawei X', '5461.jpg', 'El MateBook X tiene un cuerpo metálico delgado de 13,6 mm de grosor, lo que lo hace elegante y fácil de transportar. El MateBook X cuenta con una pantalla táctil LTPS con resolución de 3000 x 2000 píxeles y gama de colores 100% sRGB.', '1098.10', 1, 5),
(268, 'iPhone 12', '5462.jpg', 'El iPhone 12 es el primer móvil capaz de grabar en 4K Dolby Vision. En concreto, es capaz de grabar vídeo con una profundidad de color de 10 bits. Del mismo modo, se puede editar vídeos Dolby Vision desde la app Fotos desde el teléfono.', '987.20', 1, 5),
(269, 'Televisor LG LED Smart', '5463.jpg', 'LG UHD AI ThinQ siempre supera las expectativas. Experimenta una calidad de imagen realista y colores vivos con cuatro veces más precisión de píxeles que Full HD.', '1129.50', 1, 5),
(270, 'Impresora HP', '5464.jpg', 'Imprima, escanee y copie los documentos cotidianos y conéctese de forma inalámbrica sin preocupaciones. La configuración sencilla con la aplicación HP Smart hará que esté preparado desde cualquier dispositivo.', '128.50', 0, 5),
(271, 'Prueba1', '6.jpg', 'lol', '35.00', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `ciudades_clientes` (`ciudades_id_ciudad`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `clientes_compras` (`clientes_id_cliente`);

--
-- Indexes for table `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`id_detalleCompra`,`compras_id_compra`),
  ADD KEY `productos_detalleCompras` (`productos_id_producto`),
  ADD KEY `compras_detalleCompras` (`compras_id_compra`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categorias_productos` (`categorias_id_categoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `ciudades_clientes` FOREIGN KEY (`ciudades_id_ciudad`) REFERENCES `ciudades` (`id_ciudad`);

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `clientes_compras` FOREIGN KEY (`clientes_id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Constraints for table `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD CONSTRAINT `compras_detalleCompras` FOREIGN KEY (`compras_id_compra`) REFERENCES `compras` (`id_compra`),
  ADD CONSTRAINT `productos_detalleCompras` FOREIGN KEY (`productos_id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categorias_productos` FOREIGN KEY (`categorias_id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
