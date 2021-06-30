-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2021 a las 07:37:19
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noelookdental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'Eduardo', 'edusoftrivera15@gmail.com', '1234abcd..', '2021-03-15 20:31:45', '2021-04-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre_completo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` int(9) NOT NULL,
  `edad` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tconsulta` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `message` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_sn` varchar(255) NOT NULL,
  `course_fn` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(8, 'ORTO1', 'ORTO', 'Ortodoncia', '2019-12-13 19:53:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seater` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feespm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodstatus` int(11) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(500) NOT NULL,
  `regno` int(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `egycontactno` bigint(11) NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` bigint(11) NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `corresState` varchar(500) NOT NULL,
  `corresPincode` int(11) NOT NULL,
  `pmntAddress` varchar(500) NOT NULL,
  `pmntCity` varchar(500) NOT NULL,
  `pmnatetState` varchar(500) NOT NULL,
  `pmntPincode` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(40, '08:00 - 09:00 am', '  Dra Noemi  ', '  Ortodoncia / Ortopedia Maxilar  ', 1, '2021-04-22', 'Si', 'Ortodoncia', 45905195, 'Eduardo', 'Rivera', 'Contreras', 'male', 929461929, 'edusoftrivera15@gmail.com', 0, 'edu', 'edu', 123, 'aqp', 'aqp', 'CAUCA', 120, 'aqp', 'aqp', 'CAUCA', 120, '2021-04-22 00:11:35', ''),
(41, '10:00 - 11:00 am', '  Dra Ruth  ', '  Endodoncias / Cirugias  ', 0, '2021-05-08', 'Si', 'Extracción', 15953453, 'Fernando', 'Rioz', 'Gomez', 'male', 982534916, 'fernando@gmail.com', 0, 'edu', 'edu', 123, 'aqp', 'aqp', 'CAUCA', 120, 'aqp', 'aqp', 'CAUCA', 120, '2021-04-22 01:29:13', ''),
(42, '09:00 - 10:00 am', '  Dr Eduardo  ', '  Rehabilitaci&oacute;n Oral / Cirugias  ', 1, '2021-04-28', 'Si', 'Endodoncia', 75132649, 'Briana Antuane', 'Rivera', 'Pacco', 'female', 939562623, 'briana@gmail.com', 0, 'edu', 'edu', 123, 'aqp', 'aqp', 'CAUCA', 120, 'aqp', 'aqp', 'CAUCA', 120, '2021-04-22 23:40:04', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(11, 'Dra Noemi', '08:00 - 09:00 am', 'Ortodoncia / Ortopedia Maxilar', '2019-12-13 20:40:20'),
(12, 'Dr Eduardo', '09:00 - 10:00 am', 'Rehabilitación Oral / Cirugias', '2019-12-13 20:40:53'),
(13, 'Dra Ruth', '10:00 - 11:00 am', 'Endodoncias / Cirugias', '2019-12-13 20:41:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(88, 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA'),
(86, 'PUTUMAYO'),
(85, 'CASANARE'),
(81, 'ARAUCA'),
(76, 'VALLE DEL CAUCA'),
(73, 'TOLIMA'),
(70, 'SUCRE'),
(68, 'SANTANDER'),
(66, 'RISARALDA'),
(63, 'QUINDIO'),
(54, 'NORTE DE SANTANDER'),
(52, 'NARIÑO'),
(50, 'META'),
(47, 'MAGDALENA'),
(44, 'LA GUAJIRA'),
(41, 'HUILA'),
(27, 'CHOCÓ'),
(25, 'CUNDINAMARCA'),
(23, 'CÓRDOBA'),
(20, 'CESAR'),
(19, 'CAUCA'),
(18, 'CAQUETÁ'),
(17, 'CALDAS'),
(15, 'BOYACÁ'),
(13, 'BOLÍVAR'),
(11, 'BOGOTÁ, D.C.'),
(8, 'ATLÁNTICO'),
(5, 'ANTIOQUIA'),
(91, 'AMAZONAS'),
(94, 'GUAINÍA'),
(95, 'GUAVIARE'),
(97, 'VAUPÉS'),
(99, 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `country` varchar(255) CHARACTER SET latin1 NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(7, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 17:42:38'),
(8, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 18:17:09'),
(9, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 18:17:39'),
(10, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 18:54:35'),
(11, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 19:48:14'),
(12, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 20:54:24'),
(13, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 21:18:43'),
(14, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 21:50:23'),
(15, 23, 'hello@cw.com', 0x3a3a31, '', '', '2019-12-13 21:55:13'),
(16, 23, 'hello@cw.com', 0x3a3a31, '', '', '2019-12-13 22:50:51'),
(17, 22, 'hola@cw.com', 0x3a3a31, '', '', '2019-12-13 22:52:22'),
(18, 22, 'hola@cw.com', 0x3a3a31, '', '', '2021-04-21 01:54:24'),
(19, 22, 'hola@cw.com', 0x3a3a31, '', '', '2021-04-21 02:42:17'),
(20, 22, 'hola@cw.com', 0x3a3a31, '', '', '2021-04-21 03:50:16'),
(21, 23, 'hello@cw.com', 0x3a3a31, '', '', '2021-04-21 04:03:54'),
(22, 21, 'm@g.com', 0x3a3a31, '', '', '2021-04-21 05:32:04'),
(23, 23, 'hello@cw.com', 0x3a3a31, '', '', '2021-04-21 06:09:57'),
(24, 24, 'edusoftrivera15@gmail.com', 0x3a3a31, '', '', '2021-04-21 07:27:18'),
(25, 23, 'hello@cw.com', 0x3a3a31, '', '', '2021-04-21 22:32:38'),
(26, 23, 'hello@cw.com', 0x3a3a31, '', '', '2021-04-21 22:37:56'),
(27, 23, 'hello@cw.com', 0x3a3a31, '', '', '2021-04-21 23:18:32'),
(28, 26, 'edusoftrivera15@gmail.com', 0x3a3a31, '', '', '2021-04-22 00:09:45'),
(29, 26, 'edusoftrivera15@gmail.com', 0x3a3a31, '', '', '2021-04-22 00:13:27'),
(30, 26, 'edusoftrivera15@gmail.com', 0x3a3a31, '', '', '2021-04-22 00:28:35'),
(31, 25, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 00:52:50'),
(32, 27, 'fernando@gmail.com', 0x3a3a31, '', '', '2021-04-22 01:28:50'),
(33, 29, 'brenda@gmail.com', 0x3a3a31, '', '', '2021-04-22 03:06:11'),
(34, 25, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 03:20:58'),
(35, 29, 'brenda@gmail.com', 0x3a3a31, '', '', '2021-04-22 03:38:10'),
(36, 25, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 03:38:21'),
(37, 32, 'alfredo@gmail.com', 0x3a3a31, '', '', '2021-04-22 04:12:52'),
(38, 32, 'alfredo@gmail.com', 0x3a3a31, '', '', '2021-04-22 04:28:42'),
(39, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 04:31:46'),
(40, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 04:33:08'),
(41, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 04:39:56'),
(42, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 04:43:59'),
(43, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 14:04:58'),
(44, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 14:22:13'),
(45, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 15:55:39'),
(46, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 15:56:47'),
(47, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 23:38:55'),
(48, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-22 23:59:07'),
(49, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-23 01:00:02'),
(50, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-23 01:16:35'),
(51, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-04-23 01:43:00'),
(52, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-14 04:21:59'),
(53, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-26 17:37:54'),
(54, 28, 'rosana@gmail.com', 0x3a3a31, '', '', '2021-05-26 17:41:21'),
(55, 28, 'rosana@gmail.com', 0x3a3a31, '', '', '2021-05-26 17:42:41'),
(56, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-26 17:44:48'),
(57, 28, 'rosana@gmail.com', 0x3a3a31, '', '', '2021-05-27 02:46:05'),
(58, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 02:54:51'),
(59, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 03:00:44'),
(60, 28, 'rosana@gmail.com', 0x3a3a31, '', '', '2021-05-27 03:12:37'),
(61, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 03:21:19'),
(62, 28, 'rosana@gmail.com', 0x3a3a31, '', '', '2021-05-27 03:23:05'),
(63, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 03:50:16'),
(64, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 04:14:33'),
(65, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 04:54:34'),
(66, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 04:59:10'),
(67, 35, 'briana@gmail.com', 0x3a3a31, '', '', '2021-05-27 05:10:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(26, '45905195', 'Eduardo', 'Rivera', 'Contreras', 'male', 929461929, 'edusoftrivera15@gmail.com', '654321', '2021-04-22 00:09:18', '', '22-04-2021 05:42:51'),
(27, '15953453', 'Fernando', 'Rioz', 'Gomez', 'male', 982534916, 'fernando@gmail.com', '123456', '2021-04-22 01:27:18', '', ''),
(28, '15952646', 'Nancy Rosana', 'Contreras', 'Martienez', 'female', 946192846, 'rosana@gmail.com', '123456', '2021-04-22 01:48:04', '', ''),
(35, '75132649', 'Briana Antuane', 'Rivera', '', 'female', 939562623, 'briana@gmail.com', '123456', '2021-04-22 04:31:21', '27-05-2021 09:46:52', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cel` int(9) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Usuario Paciente',
  `tipo_usuario` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `cel`, `correo`, `usuario`, `password`, `nombre`, `tipo_usuario`) VALUES
(1, '', 0, '', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador Web', 1),
(2, '', 0, '', 'usuario', 'b665e217b51994789b02b1838e730d6b93baa30f', 'Usuario Paciente', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
