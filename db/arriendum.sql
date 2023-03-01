-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2023 a las 00:49:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arriendum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galery_property`
--

CREATE TABLE `galery_property` (
  `id_galery_property` int(11) NOT NULL,
  `id_property` int(11) NOT NULL,
  `name_galery_property` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galery_property`
--

INSERT INTO `galery_property` (`id_galery_property`, `id_property`, `name_galery_property`) VALUES
(1, 1, 0x2e2e2f2e2e2f6173736574732f696d672f696e6d7565626c65732f756e6b6e6f776e2e706e67),
(3, 3, 0x2e2e2f2e2e2f6173736574732f696d672f696e6d7565626c65732f63617361312e6a7067),
(4, 4, 0x2e2e2f2e2e2f6173736574732f696d672f696e6d7565626c65732f63617361332e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location_property`
--

CREATE TABLE `location_property` (
  `id_location_property` int(11) NOT NULL,
  `name_location_property` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `location_property`
--

INSERT INTO `location_property` (`id_location_property`, `name_location_property`) VALUES
(1, 'Usaquén'),
(2, 'Chapinero'),
(3, 'Santa Fe'),
(4, 'San Cristóbal'),
(5, 'Usme'),
(6, 'Tunjuelito'),
(7, 'Bosa'),
(8, 'Kennedy'),
(9, 'Fontibón'),
(10, 'Engativá'),
(11, 'Suba'),
(12, 'Barrios Unidos'),
(13, 'Teusaquillo'),
(14, 'Los Mártires'),
(15, 'Antonio Nariño'),
(16, 'Puente Aranda'),
(17, 'Candelaria'),
(18, 'Rafael Uribe Uribe'),
(19, 'Ciudad Bolívar'),
(20, 'Sumapaz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `option_property`
--

CREATE TABLE `option_property` (
  `id_option_property` int(11) NOT NULL,
  `name_option_property` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `option_property`
--

INSERT INTO `option_property` (`id_option_property`, `name_option_property`) VALUES
(1, 'Arrendar'),
(2, 'Vender');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property`
--

CREATE TABLE `property` (
  `id_property` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `state_property` int(11) NOT NULL,
  `direction_property` varchar(50) NOT NULL,
  `type_property` int(11) NOT NULL,
  `option_property` int(11) NOT NULL,
  `location_property` int(11) NOT NULL,
  `neighborhood_property` varchar(20) NOT NULL,
  `information_property` varchar(255) NOT NULL,
  `description_property` varchar(255) NOT NULL,
  `cost_property` decimal(10,0) NOT NULL,
  `create_property` datetime NOT NULL,
  `update_property` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `property`
--

INSERT INTO `property` (`id_property`, `id_user`, `state_property`, `direction_property`, `type_property`, `option_property`, `location_property`, `neighborhood_property`, `information_property`, `description_property`, `cost_property`, `create_property`, `update_property`) VALUES
(1, 12345, 1, 'calle 89 # 64 - 15', 2, 2, 2, 'La sureña', '12 x 15 mtrs', 'Tiene una Rana, Tiene ventanas, Tiene una puerta', '200000000', '2022-12-13 12:37:15', '2022-12-13 12:37:15'),
(3, 111111, 1, 'carrera 15', 2, 2, 6, 'Unidos', '5 metros cubicos', 'dos baños, una alcoba, cocina', '1500000000', '2022-12-13 15:26:20', '2022-12-13 15:26:20'),
(4, 111111, 1, 'carrer 80', 3, 1, 14, 'los angeles', 'dfsdf', 'qfwlñemgñkwe', '80000000', '2022-12-13 15:29:16', '2022-12-13 15:29:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_user`
--

CREATE TABLE `rol_user` (
  `id_rol_user` int(11) NOT NULL,
  `name_rol_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_user`
--

INSERT INTO `rol_user` (`id_rol_user`, `name_rol_user`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_property`
--

CREATE TABLE `state_property` (
  `id_state_property` int(11) NOT NULL,
  `name_state_property` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `state_property`
--

INSERT INTO `state_property` (`id_state_property`, `name_state_property`) VALUES
(1, 'Disponible'),
(2, 'Arrendado'),
(3, 'Vendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_user`
--

CREATE TABLE `state_user` (
  `id_state_user` int(11) NOT NULL,
  `name_state_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `state_user`
--

INSERT INTO `state_user` (`id_state_user`, `name_state_user`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_document`
--

CREATE TABLE `type_document` (
  `id_type_document` int(11) NOT NULL,
  `name_type_document` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_document`
--

INSERT INTO `type_document` (`id_type_document`, `name_type_document`) VALUES
(1, 'Cédula de Ciudadanía'),
(2, 'Cédula de Extranjería'),
(3, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_property`
--

CREATE TABLE `type_property` (
  `id_type_property` int(11) NOT NULL,
  `name_type_property` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_property`
--

INSERT INTO `type_property` (`id_type_property`, `name_type_property`) VALUES
(1, 'Apartamento'),
(2, 'Casa'),
(3, 'Local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `state_user` int(11) NOT NULL,
  `rol_user` int(11) NOT NULL,
  `type_document` int(11) NOT NULL,
  `name_user` varchar(45) NOT NULL,
  `lastname_user` varchar(45) NOT NULL,
  `phone_user` varchar(11) NOT NULL,
  `email_user` varchar(40) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `create_user` datetime NOT NULL,
  `update_user` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `state_user`, `rol_user`, `type_document`, `name_user`, `lastname_user`, `phone_user`, `email_user`, `password_user`, `create_user`, `update_user`) VALUES
(1234, 1, 2, 1, 'shaiel', 'pepe', '32032', 'juan@gmail.com', '$2y$10$1QQ0rchqRnBi2mK15GPWMekqZU3qoLfvPBqQLRKns1YcQ9hQK9Jni', '2022-12-13 16:52:11', '2022-12-13 16:52:11'),
(12345, 1, 2, 1, 'Arriendum ', 'User', '12345', 'user@gmail.com', '$2y$10$cgSDdTnUqxjC2FjcnMfyHuJlARRL90mbH.lPRuoDrRJi77xwLPV3q', '2022-12-13 12:33:43', '2022-12-13 16:24:43'),
(111111, 1, 2, 2, 'Pedro', 'Navajas', '222222', 'navaja@gmail.com', '$2y$10$NIxC8uU3sJTMatNEQ1Xvku8uUtpKFXr4OeNjgACQK6Wwb2j6XEhEO', '2022-12-13 15:12:31', '2022-12-13 15:12:31'),
(123456, 1, 1, 1, 'Arriendum', 'Admin', '123456', 'admin@gmail.com', '$2y$10$in211nXcb2MnvXX.hh6Rle/.cE62l13zjAjfXXMCj5kJJxPwrTCdu', '2022-12-13 12:32:48', '2022-12-13 12:32:48'),
(1000035011, 1, 2, 1, 'shaiel esteban ', 'romero ', '3203635362', 'alejo@gmail.com', '$2y$10$amuru.9icuzoa3hzBDjMNewPyEkucZX3iD3rcRqmQXIvUSUBcKPr6', '2022-12-13 15:48:04', '2022-12-13 16:25:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `galery_property`
--
ALTER TABLE `galery_property`
  ADD PRIMARY KEY (`id_galery_property`),
  ADD KEY `id_property` (`id_property`);

--
-- Indices de la tabla `location_property`
--
ALTER TABLE `location_property`
  ADD PRIMARY KEY (`id_location_property`);

--
-- Indices de la tabla `option_property`
--
ALTER TABLE `option_property`
  ADD PRIMARY KEY (`id_option_property`);

--
-- Indices de la tabla `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id_property`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `state_property` (`state_property`),
  ADD KEY `type_property` (`type_property`),
  ADD KEY `option_property` (`option_property`),
  ADD KEY `location_property` (`location_property`);

--
-- Indices de la tabla `rol_user`
--
ALTER TABLE `rol_user`
  ADD PRIMARY KEY (`id_rol_user`);

--
-- Indices de la tabla `state_property`
--
ALTER TABLE `state_property`
  ADD PRIMARY KEY (`id_state_property`);

--
-- Indices de la tabla `state_user`
--
ALTER TABLE `state_user`
  ADD PRIMARY KEY (`id_state_user`);

--
-- Indices de la tabla `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`id_type_document`);

--
-- Indices de la tabla `type_property`
--
ALTER TABLE `type_property`
  ADD PRIMARY KEY (`id_type_property`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`),
  ADD KEY `rol_user` (`rol_user`),
  ADD KEY `state_user` (`state_user`),
  ADD KEY `type_document` (`type_document`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `galery_property`
--
ALTER TABLE `galery_property`
  MODIFY `id_galery_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `location_property`
--
ALTER TABLE `location_property`
  MODIFY `id_location_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `option_property`
--
ALTER TABLE `option_property`
  MODIFY `id_option_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `property`
--
ALTER TABLE `property`
  MODIFY `id_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol_user`
--
ALTER TABLE `rol_user`
  MODIFY `id_rol_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `state_property`
--
ALTER TABLE `state_property`
  MODIFY `id_state_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `state_user`
--
ALTER TABLE `state_user`
  MODIFY `id_state_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type_document`
--
ALTER TABLE `type_document`
  MODIFY `id_type_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `type_property`
--
ALTER TABLE `type_property`
  MODIFY `id_type_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galery_property`
--
ALTER TABLE `galery_property`
  ADD CONSTRAINT `galery_property_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id_property`);

--
-- Filtros para la tabla `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`state_property`) REFERENCES `state_property` (`id_state_property`),
  ADD CONSTRAINT `property_ibfk_3` FOREIGN KEY (`type_property`) REFERENCES `type_property` (`id_type_property`),
  ADD CONSTRAINT `property_ibfk_4` FOREIGN KEY (`option_property`) REFERENCES `option_property` (`id_option_property`),
  ADD CONSTRAINT `property_ibfk_5` FOREIGN KEY (`location_property`) REFERENCES `location_property` (`id_location_property`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rol_user`) REFERENCES `rol_user` (`id_rol_user`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`state_user`) REFERENCES `state_user` (`id_state_user`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`type_document`) REFERENCES `type_document` (`id_type_document`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
