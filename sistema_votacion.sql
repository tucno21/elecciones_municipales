-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-09-2022 a las 01:37:50
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `logo` varchar(60) DEFAULT NULL,
  `group_name` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id`, `name`, `dni`, `photo`, `logo`, `group_name`, `estado`) VALUES
(3, 'carlos tucno', 42769197, '67b58f5e74af1dd748d68d1a82797471.jpg', 'c67db21ee9761d492ea9a8d64dbaf06a.jpg', 'Alianza por el cambio', 1),
(4, 'jorge juana', 25856599, '2dc126a99657e1c44225e57b53e4be38.jpg', 'ca9f65f114f8f19ebe031260e5a5574e.jpg', 'mejorar el cambio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_votacion`
--

CREATE TABLE `fecha_votacion` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fecha_votacion`
--

INSERT INTO `fecha_votacion` (`id`, `fecha`, `hora_inicio`, `hora_fin`) VALUES
(1, '2022-09-19', '13:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modlogin`
--

CREATE TABLE `modlogin` (
  `id` int(11) NOT NULL,
  `name_ie` varchar(45) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `color_b` varchar(45) DEFAULT NULL,
  `color_s` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modlogin`
--

INSERT INTO `modlogin` (`id`, `name_ie`, `photo`, `color_b`, `color_s`, `fecha`) VALUES
(1, 'IE JOSE FELIX IGUAIN', 'c62622030769532de9efa74e6ec277ad.png', '#009933', '#197635', '2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `aula` varchar(45) DEFAULT NULL,
  `candidatoId` int(11) DEFAULT NULL,
  `date_access` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `name`, `dni`, `aula`, `candidatoId`, `date_access`) VALUES
(1, 'ARAUJO MENDOZA, MAYLI LUCERO', 60316777, '2A', 3, '2022-09-19 20:06:56'),
(2, 'BARRETO PARE, RUTH BIANIA', 60232279, '2A', 3, '2022-09-19 20:37:25'),
(3, 'CONDORAY PEÑA, DIESE ANHILA', 60262486, '2A', 4, '2022-09-19 20:51:53'),
(4, 'CURO SANCHEZ,  MILAGROS RUTH', 74437346, '2A', 3, NULL),
(5, 'ESCOBAR ÑAUPA, YULIANA', 60316781, '2A', 4, NULL),
(6, 'GARAY IGNACIO, DAVID JAVIER', 71182522, '2A', NULL, NULL),
(7, 'HUAMAN CENTENO, FLOR ELIANA', 60148888, '2A', NULL, NULL),
(8, 'HUILLCAYAURE ROJAS, FRED PAUL', 61205627, '2A', NULL, NULL),
(9, 'ÑAÑA LAMILLA, EMERSON', 60602442, '2A', NULL, NULL),
(10, 'PARIONA GUILLEN, ROGER EDWIN', 60316759, '2A', NULL, NULL),
(11, 'QUISPE LLANTOY, ABDON', 60246496, '2A', NULL, NULL),
(12, 'RODRIGUEZ GIL, JHONY', 60336764, '2A', NULL, NULL),
(13, 'RODRIGUEZ IZARRA, FRINE KORAIMA', 60316783, '2A', NULL, NULL),
(14, 'VILLAR QUISPE, FRANK REYNER', 61805792, '2A', NULL, NULL),
(15, 'BERMUDO LEON, SOSALY', 60047905, '2B', NULL, NULL),
(16, 'GUTIERREZ HUAMAN, RENSO SEBASTIAN', 60246465, '2B', NULL, NULL),
(17, 'HUAMAN GALVEZ, MARGOT FIORELA', 60209795, '2B', NULL, NULL),
(18, 'HUAMANI CASAFRANCA, ARIANA', 60289377, '2B', NULL, NULL),
(19, 'LAPA FLORES, RUTH NEYRA', 60498038, '2B', NULL, NULL),
(20, 'PALANTE TAIPE, JHON ANDER', 60301171, '2B', NULL, NULL),
(21, 'POLANCO ARAUJO, SAYRA JIMENA', 60540569, '2B', NULL, NULL),
(22, 'QUISPE CONDOR, JIMENA ANGELITA', 60199379, '2B', NULL, NULL),
(23, 'QUISPE CUSICHI, BRAHAN', 60148796, '2B', NULL, NULL),
(24, 'QUISPE SALINAS, NERIO', 72037407, '2B', NULL, NULL),
(25, 'QUISPE LLANTOY, CRIS DANIELA', 61334210, '2B', NULL, NULL),
(26, 'RODRIGUEZ GAMBOA, JUAN', 60244795, '2B', NULL, NULL),
(27, 'SINCHITULLO GUTIERREZ, EKDAH SARAI', 61164587, '2B', NULL, NULL),
(28, 'SINCHITULLO ROJAS, JUNIOR', 60316762, '2B', NULL, NULL),
(29, 'TAIPE CCENTE, ROSA MILAGROS', 60262460, '2B', NULL, NULL),
(30, 'ARAUJO ÑAUPA, LUCIA ESPERANZA', 71588592, '4A', NULL, NULL),
(31, 'ÁVILA ÑAUPA, RUTH', 72045834, '4A', NULL, NULL),
(32, 'AYALA BERMUDO, DIEGO SMITH', 61383187, '4A', NULL, NULL),
(33, 'CONDOR QUISPE, RUTH KARINA', 60310357, '4A', NULL, NULL),
(34, 'CRESPO ROJAS, MAYLI', 71794018, '4A', NULL, NULL),
(35, 'FERNANDEZ CERDAN, BETZAIDA', 72027234, '4A', NULL, NULL),
(36, 'MENESES GONZALES, ANDY', 72392930, '4A', NULL, NULL),
(37, 'ONOFRE TALAVERA, YASIRA MITZEE', 71749393, '4A', NULL, NULL),
(38, 'PRADO CONTRERAS, RENZO', 60209780, '4A', NULL, NULL),
(39, 'PRADO PORRAS, MILUSKA', 60922746, '4A', NULL, NULL),
(40, 'QUISPE GUITIERREZ, MICHAEL FERNANDO', 60922886, '4A', NULL, NULL),
(41, 'ROMERO HUILLCA, MAYKOL ALEXANDER', 76876705, '4A', NULL, NULL),
(42, 'SOTO MARMON, GLORIA EDITH', 60209775, '4A', NULL, NULL),
(43, 'TORRES APARCO, SONALY', 71229826, '4A', NULL, NULL),
(44, 'ARAUJO MENDOZA, HEIDY KEVELYN', 71591397, '4B', NULL, NULL),
(45, 'BAUTISTA QUISPE, ROSALINDA ROSELI', 77228199, '4B', NULL, NULL),
(46, 'CONDORI VARGAS, GARDENIA', 74028789, '4B', NULL, NULL),
(47, 'CRUZ CURO, HERLINDA', 60148030, '4B', NULL, NULL),
(48, 'CRUZ HUACHACA, JENNEFER', 71433670, '4B', NULL, NULL),
(49, 'DE LA CRUZ TAIPE, HILDEBRAND', 76962678, '4B', NULL, NULL),
(50, 'HUAMAN CAPCHA, SONILDA KATY', 71808256, '4B', NULL, NULL),
(51, 'HUAMAN PARIONA, ENIO', 73899177, '4B', NULL, NULL),
(52, 'LAMILLA SALINAS, KEVIN', 73984195, '4B', NULL, NULL),
(53, 'LLANTOY CÁCERES, ENEDINA', 72037251, '4B', NULL, NULL),
(54, 'MENDOZA CHAVEZ, YANETH THALIA', 71715960, '4B', NULL, NULL),
(55, 'ORÉ PARIONA, ROBER NEX', 71411946, '4B', NULL, NULL),
(56, 'SALAZAR PRADO, NASHIRA SHIOMARA', 60316757, '4B', NULL, NULL),
(57, 'VALDEZ GUZMÁN, JHERSON JHON', 71745519, '4B', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rango` varchar(45) DEFAULT NULL,
  `date_access` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `estado`, `rango`, `date_access`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$8A.945fSIelkEy.Gw./NwOteONE5V9Hd6Jx6znZ/DUM.5Wk3dijJW', NULL, 1, 'Administrador', '2022-09-16 23:39:14'),
(5, 'director', 'director@director.com', '$2y$10$s3IR.RfxLqrQuFM4BJSUIO8li3ZbOdy.8RI7Bwzj9Ncgv.F3UP/aG', '648607b6af5f759384bb4ac0b3990a7d.jpg', 1, 'Director', '2022-09-20 01:08:38'),
(6, 'docente', 'docente@docente.com', '$2y$10$LCZunmTX/pjZKJ/MpNI2iOgV/eFeLglj8V9LtJ0w04yi/HtHNgdqG', '3a4caa2feb49082a06604e038aa531b5.jpg', 1, 'Docente', '2022-09-20 01:36:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fecha_votacion`
--
ALTER TABLE `fecha_votacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modlogin`
--
ALTER TABLE `modlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canditatoId_idx` (`candidatoId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fecha_votacion`
--
ALTER TABLE `fecha_votacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modlogin`
--
ALTER TABLE `modlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
