-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 21:53:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdventas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarProductoStock` (IN `pidproducto` INT, IN `pstock` DECIMAL(10,2))   BEGIN
		UPDATE producto SET
			stock=pstock
		WHERE idproducto = pidproducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spCategoria` (`pdescripcion` VARCHAR(100))   BEGIN		
		INSERT INTO categoria(descripcion)
		VALUES(pdescripcion);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spCliente` (IN `pdni` VARCHAR(8), IN `pnombre` VARCHAR(100), IN `papellido` VARCHAR(100), IN `ptelefono` VARCHAR(15), IN `pcorreo` VARCHAR(80), IN `pdireccion` VARCHAR(50), IN `pobsv` TEXT)   BEGIN		
		INSERT INTO cliente(dni,nombre,apellido,telefono,correo,direccion,obs)
		VALUES(pdni,pnombre,papellido,ptelefono,pcorreo,pdireccion,pobsv);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultaStockProducto` ()   BEGIN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.PrecioVenta,p.precioCompra,c.Descripcion AS categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria=c.IdCategoria
		ORDER BY p.IdProducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spEliminarCategoria` (`pidcategoria` INT)   BEGIN
		delete from categoria WHERE idcategoria = pidcategoria;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarCategoria` ()   BEGIN
		SELECT * FROM categoria;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarCategoriaPorParametro` (`pcriterio` VARCHAR(20), `pbusqueda` VARCHAR(20))   BEGIN
	IF pcriterio = "id" THEN
		SELECT c.IdCategoria,c.Descripcion FROM categoria AS c WHERE c.IdCategoria=pbusqueda;
	ELSEIF pcriterio = "descripcion" THEN
		SELECT c.IdCategoria,c.Descripcion FROM categoria AS c WHERE c.Descripcion LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT c.IdCategoria,c.Descripcion FROM categoria AS c;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarCliente` ()   BEGIN
		SELECT * FROM cliente;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarClientePorParametro` (IN `pcriterio` VARCHAR(20), IN `pbusqueda` VARCHAR(20))   BEGIN
	IF pcriterio = "id" THEN
		SELECT c.IdCliente,c.dni,c.Nombre,c.apellido,c.telefono,c.correo,c.direccion,c.obs FROM cliente AS c WHERE c.IdCliente=pbusqueda;
	ELSEIF pcriterio = "nombre" THEN
		SELECT c.IdCliente,c.dni,c.Nombre,c.apellido,c.telefono,c.correo,c.direccion,c.obs FROM cliente AS c WHERE c.Nombre LIKE CONCAT("%",pbusqueda,"%");
   ELSEIF pcriterio = "dni" THEN
		SELECT c.IdCliente,c.dni,c.Nombre,c.apellido,c.telefono,c.correo,c.direccion,c.obs FROM cliente AS c WHERE c.Dni LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT c.IdCliente,c.dni,c.Nombre,c.apellido,c.telefono,c.correo,c.direccion,c.obs FROM cliente AS c;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarProducto` ()   BEGIN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.precioVenta,p.precioCompra,c.Descripcion AS categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria=c.IdCategoria
		ORDER BY p.IdProducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarProductoPorParametro` (IN `pcriterio` VARCHAR(20), IN `pbusqueda` VARCHAR(50))   BEGIN
	IF pcriterio = "id" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.PrecioVenta,p.precioCompra,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.IdProducto=pbusqueda;
	ELSEIF pcriterio = "codigo" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.PrecioVenta,p.precioCompra,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.Codigo=pbusqueda;
	ELSEIF pcriterio = "nombre" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.PrecioVenta,p.precioCompra,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.Nombre LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.PrecioVenta,p.precioCompra,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarTipoComprobante` ()   BEGIN
		SELECT * FROM tipocomprobante;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarTipoComprobantePorParametro` (`pcriterio` VARCHAR(20), `pbusqueda` VARCHAR(20))   BEGIN
	IF pcriterio = "id" THEN
		SELECT td.idTipoComprobante,td.descripcion FROM tipocomprobante AS td WHERE td.idTipoComprobante=pbusqueda;
	ELSEIF pcriterio = "descripcion" THEN
		SELECT td.idTipoComprobante,td.descripcion FROM tipocomprobante AS td WHERE td.descripcion LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT td.idTipoComprobante,td.descripcion FROM tipocomprobante AS td;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarTipoUsuario` ()   BEGIN
		SELECT * FROM tipousuario;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarTipoUsuarioPorParametro` (`pcriterio` VARCHAR(20), `pbusqueda` VARCHAR(20))   BEGIN
	IF pcriterio = "id" THEN
		SELECT * FROM tipousuario AS tp WHERE tp.IdTipoUsuario=pbusqueda;
	ELSEIF pcriterio = "descripcion" THEN
		SELECT * FROM tipousuario AS tp WHERE tp.Descripcion LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT * FROM tipousuario AS tp;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarUsuario` ()   BEGIN
		SELECT e.idUsuario,e.nombre,e.apellidoPaterno,e.apellidoMaterno,e.dni,e.direccion,e.sexo,e.telefono,e.estado,
		e.usuario,e.`contraseña`,tu.descripcion AS TipoUsuario
		FROM usuario AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario=tu.IdTipoUsuario
		ORDER BY e.idUsuario;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarUsuarioPorParametro` (`pcriterio` VARCHAR(20), `pbusqueda` VARCHAR(20))   BEGIN
	IF pcriterio = "id" THEN
		SELECT e.idUsuario,e.nombre,e.apellidoPaterno,e.apellidoMaterno,e.dni,e.direccion,e.sexo,e.telefono,e.estado,
		e.usuario,e.`contraseña`,tu.descripcion AS TipoUsuario
		FROM usuario AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario 
		WHERE e.idUsuario=pbusqueda;
	ELSEIF pcriterio = "nombre" THEN
		SELECT e.idUsuario,e.nombre,e.apellidoPaterno,e.apellidoMaterno,e.dni,e.direccion,e.sexo,e.telefono,e.estado,
		e.usuario,e.`contraseña`,tu.descripcion AS TipoUsuario
		FROM usuario AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario 
		WHERE ((e.nombre LIKE CONCAT("%",pbusqueda,"%")) OR (e.apellidoPaterno LIKE CONCAT("%",pbusqueda,"%"))OR (e.apellidoMaterno LIKE CONCAT("%",pbusqueda,"%")));
	ELSEIF pcriterio = "dni" THEN
		SELECT e.idUsuario,e.nombre,e.apellidoPaterno,e.apellidoMaterno,e.dni,e.direccion,e.sexo,e.telefono,e.estado,
		e.usuario,e.`contraseña`,tu.descripcion AS TipoUsuario
		FROM usuario AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario 
		WHERE e.dni LIKE CONCAT("%",pbusqueda,"%");
	ELSE
	   SELECT e.idUsuario,e.nombre,e.apellidoPaterno,e.apellidoMaterno,e.dni,e.direccion,e.sexo,e.telefono,e.estado,
		e.usuario,e.`contraseña`,tu.descripcion AS TipoUsuario
		FROM usuario AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogin` (`pusuario` VARCHAR(50), `pcontraseña` TEXT, `pdescripcion` VARCHAR(50))   BEGIN
	
		SELECT e.idUsuario,e.nombre,e.apellidoPaterno,e.apellidoMaterno,e.dni,e.direccion,e.sexo,e.telefono,e.estado,
		e.usuario,e.`contraseña`,tu.descripcion
		FROM usuario AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario WHERE e.usuario = pusuario AND e.`contraseña` = pcontraseña AND tu.descripcion=pdescripcion;
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLoginPermisos` (`pnombre_usuario` VARCHAR(50), `pdescripcion_tipousuario` VARCHAR(80))   BEGIN
	
		SELECT tu.IdTipoUsuario,e.Usuario,tu.Descripcion,tu.pVenta,tu.pCompra,tu.pProducto,tu.pProveedor,tu.pUsuario,tu.pCliente,tu.pCtageoria,tu.pTipoUsuario,
		tu.pAnularVenta,tu.pAnularCompra,tu.pCaja
		FROM tipousuario AS tu INNER JOIN usuario AS e ON tu.IdTipoUsuario = e.IdTipoUsuario WHERE e.Usuario = pnombre_usuario AND tu.Descripcion=pdescripcion_tipousuario;
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarCategoria` (`pidcategoria` INT, `pdescripcion` VARCHAR(100))   BEGIN
		UPDATE categoria SET
			descripcion=pdescripcion	
		WHERE idcategoria = pidcategoria;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarCliente` (IN `pidcliente` INT, IN `pdni` VARCHAR(8), IN `pnombre` VARCHAR(100), IN `papellido` VARCHAR(100), IN `ptelefono` VARCHAR(15), IN `pcorreo` VARCHAR(80), IN `pdireccion` VARCHAR(50), IN `pobsv` TEXT)   BEGIN
		UPDATE cliente SET
        	dni = pdni,
			nombre=pnombre,
            apellido = papellido,
			telefono=ptelefono,
			correo=pcorreo,
			direccion=pdireccion,
			obs=pobsv
		WHERE idcliente = pidcliente;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarProducto` (IN `pidproducto` INT, IN `pcodigo` VARCHAR(50), IN `pnombre` VARCHAR(100), IN `pdescripcion` TEXT, IN `pstock` DECIMAL(10,2), IN `pprecioventa` DECIMAL(10,2), IN `ppreciocosto` DECIMAL(10,2), IN `pidcategoria` INT)   BEGIN
		UPDATE producto SET
			codigo=pcodigo,
			nombre=pnombre,
			descripcion=pdescripcion,
			stock=pstock,
			precioventa=pprecioventa,
            preciocompra=ppreciocosto,
			idcategoria=pidcategoria
			
		WHERE idproducto = pidproducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarTipoComprobante` (`pidtipodocumento` INT, `pdescripcion` VARCHAR(80))   BEGIN
		UPDATE tipocomprobante SET
			descripcion=pdescripcion	
		WHERE idtipocomprobante = pidtipodocumento;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarTipoUsuario` (IN `pidtipousuario` INT, IN `pdescripcion` VARCHAR(20), IN `pp_venta` INT, IN `pp_compra` INT, IN `pp_producto` INT, IN `pp_proveedor` INT, IN `pp_usuario` INT, IN `pp_cliente` INT, IN `pp_categoria` INT, IN `pp_tipousuario` INT, IN `pp_anularv` INT, IN `pp_anularc` INT, IN `pp_caja` INT)   BEGIN 
UPDATE tipousuario SET
		descripcion = pdescripcion,
        pVenta = pp_venta ,
        pCompra = pp_compra,
        pProducto = pp_producto,
        pProveedor = pp_proveedor,
        pUsuario = pp_usuario,
        pCliente = pp_cliente,
        pCtageoria = pp_categoria,
        pTipoUsuario = pp_tipousuario,
        pAnularVenta = pp_anularv,
        pAnularCompra = pp_anularc,
		pCaja = pp_caja
        WHERE IdTipoUsuario = pidtipousuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarUsuario` (IN `pidusuario` INT, IN `pnombre` VARCHAR(80), IN `papellidoPaterno` VARCHAR(80), IN `papellidoMaterno` VARCHAR(80), IN `pdni` VARCHAR(8), IN `pdireccion` VARCHAR(100), IN `psexo` VARCHAR(1), IN `ptelefono` VARCHAR(10), IN `pestado` VARCHAR(30), IN `pusuario` VARCHAR(50), IN `pcontraseña` VARCHAR(100), IN `pidtipousuario` INT)   BEGIN
		UPDATE usuario SET
			nombre=pnombre,
			apellidoPaterno=papellidoPaterno,
			apellidoMaterno=papellidoMaterno,
			dni=pdni,
			direccion=pdireccion,
			sexo=psexo,
			telefono=ptelefono,
			estado=pestado,
			usuario=pusuario,
			contraseña=pcontraseña,
			idTipoUsuario=pidtipousuario			
		WHERE idUsuario = pidusuario;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spProducto` (IN `pcodigo` VARCHAR(50), IN `pnombre` VARCHAR(100), IN `pdescripcion` TEXT, IN `pstock` DECIMAL(10,2), IN `ppreciocosto` DECIMAL(10,2), IN `pprecioventa` DECIMAL(10,2), IN `pidcategoria` INT)   BEGIN		
		INSERT INTO producto(codigo,nombre,descripcion,stock,precioventa,preciocompra,idcategoria)
		VALUES(pcodigo,pnombre,pdescripcion,pstock,pprecioventa,ppreciocosto,pidcategoria);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spTipoComprobante` (`pdescripcion` VARCHAR(80))   BEGIN		
		INSERT INTO tipocomprobante(descripcion)
		VALUES(pdescripcion);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spTipoUsuario` (IN `pdescripcion` VARCHAR(20), IN `pp_venta` INT, IN `pp_compra` INT, IN `pp_producto` INT, IN `pp_proveedor` INT, IN `pp_usuario` INT, IN `pp_cliente` INT, IN `pp_categoria` INT, IN `pp_tipousuario` INT, IN `pp_anularv` INT, IN `pp_anularc` INT, IN `pp_caja` INT)   BEGIN 
INSERT INTO 
 tipousuario (descripcion,pVenta,pCompra,pProducto,pProveedor,pUsuario,pCliente,pCtageoria,pTipoUsuario,pAnularVenta,pAnularCompra,pCaja)

 VALUES (pdescripcion,pp_venta,pp_compra,pp_producto,pp_proveedor,pp_usuario,pp_cliente,pp_categoria,pp_tipousuario,pp_anularv,pp_anularc,pp_caja);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUsuario` (IN `pnombre` VARCHAR(80), IN `papellidoPaterno` VARCHAR(80), IN `papellidoMaterno` VARCHAR(80), IN `pdni` VARCHAR(8), IN `pdireccion` VARCHAR(100), IN `psexo` VARCHAR(1), IN `ptelefono` VARCHAR(10), IN `pestado` VARCHAR(30), IN `pusuario` VARCHAR(50), IN `pcontraseña` VARCHAR(100), IN `pidtipousuario` INT)   BEGIN		
		INSERT INTO usuario(nombre,apellidoPaterno,apellidoMaterno,dni,direccion,sexo,telefono,estado, usuario, contraseña,idTipoUsuario)
		VALUES(pnombre,papellidoPaterno,papellidoMaterno,pdni,pdireccion,psexo,ptelefono,pestado,pusuario,pcontraseña,pidtipousuario);
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcion`) VALUES
(6, 'GENERAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`) VALUES
(1, 'ANDERSON', 'MORIANO', '900615531', 'amoriano192@gmail.com', 'bolivar'),
(2, 'pablito', 'perez', '9855454', 'pablito@gmail.com', 'Av.Abancay '),
(3, 'marco', 'lopez', '954711256', 'marcolopz132@gmail.com', 'Pueblo Joven 322'),
(4, 'rodrigo', 'Gomez', '987445268', 'rodrigo42323@gmail.com', 'Pueblo Joven 487'),
(5, 'Elias', 'Marca', '987445868', 'elias322323@gmail.com', 'Pueblo Joven 500'),
(6, 'PABLO ', 'PEREZ', '985587458', 'pablitoclavito@gmail.com', 'av.los girasoles 411');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`idVenta`, `idProducto`, `cantidad`) VALUES
(4, 4, 1),
(4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `stock` decimal(10,2) NOT NULL,
  `precioVenta` decimal(10,2) NOT NULL,
  `precioCompra` decimal(10,2) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `codigo`, `nombre`, `descripcion`, `stock`, `precioVenta`, `precioCompra`, `idCategoria`) VALUES
(1, 'PRO001', 'REDMI POCO X3', 'EQUIPO MOVIL REDMI POCO X3', '10.00', '1000.00', '700.00', 6),
(2, 'PRO002', 'SAMSUNG S10', 'EQUIPO MOVIL  SAMSUNG S10', '10.00', '1200.00', '800.00', 6),
(3, 'PRO003', 'MOTO G', 'EQUIPO MOVIL MOTO G', '0.01', '800.50', '500.00', 6),
(4, 'PRO004', 'Apple iPhone 12', 'Apple iPhone 12 64GB - Colores', '2.00', '3000.00', '2200.00', 6),
(5, 'PRO005', 'Redmi Note 11 ', 'Redmi Note 11 4GB RAM 128GB ROM', '7.00', '1100.00', '900.00', 6),
(6, 'PRO006', 'Xiaomi Redmi NOTE 11 PRO', 'Xiaomi Redmi NOTE 11 PRO 128gb Ram 6gb versión global DUAL SIM - GRIS', '8.00', '1500.00', '1000.00', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Ruc` varchar(15) NOT NULL,
  `Dni` varchar(8) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `email` varchar(80) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocomprobante`
--

CREATE TABLE `tipocomprobante` (
  `idTipoComprobante` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocomprobante`
--

INSERT INTO `tipocomprobante` (`idTipoComprobante`, `descripcion`) VALUES
(1, 'BOLETA'),
(2, 'PROFORMA'),
(3, 'TICKET');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `pVenta` int(11) DEFAULT NULL,
  `pCompra` int(11) DEFAULT NULL,
  `pProducto` int(11) DEFAULT NULL,
  `pProveedor` int(11) DEFAULT NULL,
  `pUsuario` int(11) DEFAULT NULL,
  `pCliente` int(11) DEFAULT NULL,
  `pCtageoria` int(11) DEFAULT NULL,
  `pTipoUsuario` int(11) DEFAULT NULL,
  `pAnularVenta` int(11) DEFAULT NULL,
  `pAnularCompra` int(11) DEFAULT NULL,
  `pCaja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `descripcion`, `pVenta`, `pCompra`, `pProducto`, `pProveedor`, `pUsuario`, `pCliente`, `pCtageoria`, `pTipoUsuario`, `pAnularVenta`, `pAnularCompra`, `pCaja`) VALUES
(13, 'ADMINISTRADOR', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `apellidoPaterno` varchar(80) DEFAULT NULL,
  `apellidoMaterno` varchar(80) DEFAULT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `idTipoUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `dni`, `direccion`, `sexo`, `telefono`, `estado`, `usuario`, `contraseña`, `idTipoUsuario`) VALUES
(1, 'Roel', 'Aldoradin', 'Santaria', '70260853', 'Av.Peru 2331', 'Masculino', '957445895', 'ACTIVO', 'roel_123', 'roel_123', 13),
(29, 'Ruth', 'Valcarcel', 'Sierra', '74558741', 'Av.Peru 123', 'Femenino', '998557445', 'ACTIVO', 'ruth_123', 'ruth_123', 13),
(30, 'Roel', 'Aldoradin', 'Santaria', '70260853', 'Av.Peru 2331', 'Masculino', '957445895', 'ACTIVO', 'roel_123', 'roel_123', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `codSerie` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `codSerie`, `fecha`, `idCliente`, `idUsuario`, `subtotal`) VALUES
(4, '', '2022-09-29', 7, 1, 4000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
  ADD PRIMARY KEY (`idTipoComprobante`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `fk_venta` (`idCliente`),
  ADD KEY `fk_usuario` (`idUsuario`),
  ADD KEY `fk_Cliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
  MODIFY `idTipoComprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
