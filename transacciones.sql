-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2023 a las 10:24:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Blockchain`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `Fecha - Hora` datetime NOT NULL DEFAULT current_timestamp(),
  `Banco Origen` text NOT NULL,
  `Cuenta Origen` int(11) NOT NULL,
  `Tipo Cuenta Origen` text NOT NULL,
  `Banco Destino` text NOT NULL,
  `Cuenta Destino` int(11) NOT NULL,
  `Tipo Cuenta Destino` text NOT NULL,
  `Numero Identificacion` int(11) NOT NULL,
  `Valor Transaccion` int(11) NOT NULL,
  `CUS` int(11) NOT NULL COMMENT 'Identificador Transaccion',
  `Descripcion` text DEFAULT NULL,
  `CBC` text DEFAULT NULL,
  `Time CBC` decimal(11,4) DEFAULT NULL,
  `ECB` text DEFAULT NULL,
  `Time ECB` decimal(11,4) DEFAULT NULL,
  `CFB` text DEFAULT NULL,
  `time CFB` decimal(11,4) DEFAULT NULL,
  `OFB` text DEFAULT NULL,
  `Time OFB` decimal(11,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`Fecha - Hora`, `Banco Origen`, `Cuenta Origen`, `Tipo Cuenta Origen`, `Banco Destino`, `Cuenta Destino`, `Tipo Cuenta Destino`, `Numero Identificacion`, `Valor Transaccion`, `CUS`, `Descripcion`, `CBC`, `Time CBC`, `ECB`, `Time ECB`, `CFB`, `time CFB`, `OFB`, `Time OFB`) VALUES
('2023-10-05 00:54:00', 'Banco Davivienda', 123123, 'Ahorros', 'Banco Davivienda', 999999, 'Ahorros', 1000589224, 10000, 1, 'Primera Transacción', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2023-10-05 00:55:00', 'Banco Davivienda', 321321, 'Ahorros', 'Banco Davivienda', 789789, 'Ahorros', 1000589224, 20000, 2, 'Segunda Transacción', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2023-10-05 02:09:00', 'Banco Davivienda', 12344512, 'Ahorros', 'Banco Davivienda', 9876523, 'Ahorros', 1000589224, 100000, 10, 'Transacción Cifrada', 'H+aXM6lMTuxqQCRXdxTatA==', NULL, 'H+aXM6lMTuyfMMJ6Vop/sQ==', NULL, 'UfN64tzCouXMmg==', NULL, 'UfN64tzCouUL2A==', NULL),
('2023-10-05 02:38:00', 'Banco Davivienda', 123214521, 'Ahorros', 'Banco Davivienda', 124215124, 'Ahorros', 1000589224, 103000, 20, 'Prueba Tiempos', 'GtekQgsl1NYxuoYOiofcuQ==', 5.5559, 'GtekQgsl1NbbMZVlPYaC6Q==', 0.0410, 'UfF86NTBo+4zIg==', 0.3338, 'UfF86NTBo+4D2A==', 0.1740),
('2023-10-05 02:44:00', 'Banco Davivienda', 42151251, 'Ahorros', 'Banco Davivienda', 909701924, 'Ahorros', 1000589224, 23000, 22, 'Prueba Tiempos', 'qkM5vsS+LlbQHpJNN3pqBA==', 3.4931, 'qkM5vsS+LlaC1H9MC3HsrA==', 0.0229, 'Ufp94tHFp+M3rg==', 0.1781, 'Ufp94tHFp+MG3g==', 0.1500),
('2023-10-10 15:30:00', 'Banco Davivienda', 123456789, 'Ahorros', 'Bancolombia', 987654321, 'Corriente', 1234567890, 500000, 555, 'Transferencia de fondos', 'Valor CBC', NULL, 'Valor ECB', NULL, 'Valor CFB', NULL, 'Valor OFB', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`CUS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
