-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2022 a las 22:05:00
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pqrs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `clasificacion` int(10) NOT NULL,
  `opinion` text COLLATE latin1_spanish_ci NOT NULL,
  `id_resusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrs`
--

CREATE TABLE `pqrs` (
  `id` int(11) NOT NULL,
  `tipo_solicitud` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `asunto` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `mensaje` text COLLATE latin1_spanish_ci NOT NULL,
  `ruta` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_archivo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `peso` double NOT NULL,
  `anonimo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pqrs`
--

INSERT INTO `pqrs` (`id`, `tipo_solicitud`, `asunto`, `mensaje`, `ruta`, `nombre_archivo`, `peso`, `anonimo`, `fecha`, `estado`, `id_usuario`) VALUES
(37, 'Sugerencia', 'prueba numero 10 mensaje largo', 'Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American Apparel.', 'default.jpg', 'vacio', 0, 'no', '2022-11-14 00:00:00', 'activo', 58),
(41, 'Sugerencia', 'prueba numero 10 mensaje largo anonimo', 'Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American Apparel.', 'default.jpg', 'vacio', 0, 'si', '2022-11-14 00:00:00', 'revisado', 0),
(43, 'Sugerencia', 'prueba numero 10 mensaje largo un poco mas', 'Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American ApparelKeffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American Apparel.', 'default.jpg', 'vacio', 0, 'no', '2022-11-14 00:00:00', 'activo', 61),
(45, 'Queja', 'prueba numero 11 subir archivo', 'sdasdasdas a sdad aaosazsfdasdas daasdf aSfd aaf sdfasdad aasfdas rfwqafsafasd adasda s asdasdasf sd sfsdf sd sas dfsfsdf sf a dasdasfdas dfadjahfja gdaukysdg auygd auydguaysdg ag yuasdg iuyagiyasdgf ay8yasdg iauygf087syrf wlyfg07srgf siygfsghryusefyabeshurfbhebnbejwdb78ewfhjsfbhxbwnejdb  gae dhvebsdgyebrfhsgdyabdnbabsydeb nxcnjgjhdbnuiehnebdhjewhrjabd jhyagdewaohsbdnjagdueydhuagdahbed ayuhaeb yadasdhabdyhaeg dfhabdyag dhjadghajsdvby agewdjbnabsdgasjhdbahjudbahjsgfdabrfszhjggflbñfiqfñquiefhpa asdasd a', '1668613991.jpg', 'vacio.jpg', 15.9, 'no', '2022-11-16 00:00:00', 'en espera', 67),
(46, 'Reclamo', 'prueba numero 2 anonima con archivo', 'asdadfss dfsdfg afdfasfgf asjb dasdaihjsdg sadh aisfdgh usadf aisuhfdihfsdljkfb asudfh isf hddhauihdaosd hadh auSDH iuasdh  uasda sdAISD HAuisdh uiaHD PUIAhsdpiu AHSdpiuha', '1668614392.jpg', 'vacio.jpg', 15.9, 'si', '2022-11-16 00:00:00', 'revisado', 0),
(47, 'Reclamo', 'prueba numero 1 con pdf', 'dasdasf asdasda sdasfd sdafadsf asdasf dasdasdasda adsasd asd', '1668614710.pdf', 'vacio.pdf', 15.9, 'no', '2022-11-16 00:00:00', 'en espera', 68),
(48, 'Peticion', 'prueba numero 3 anonima', 'sdasdasd asdasda s', 'default.jpg', '', 0, 'si', '2022-11-16 00:00:00', 'activo', 0),
(49, 'Queja', 'prueba numero 4 aruchivo pdf', 'dasdasfdsdfsd', '1668615502.pdf', 'vacio.pdf', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(50, 'Queja', 'prueba numero 1 documento docx', 'adsasdfasfsf asfasdf sfsadfg safwaeasffsad fsdafasd', '1668615666.docx', 'vacio.docx', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(51, 'Sugerencia', 'prueba numero 1 espacios vacios', 'fsdcasda sdas asdasdasfsdf asfdasFS AEDGFSF SADFSDF ASEDFS asdasd as', '1668615775.pdf', 'vacio.pdf', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(52, 'Peticion', 'prueba numero 10 mensaje largo', 'dasda asdasdasd asdas dasda fdsfsdf sd', '1668616191.zip', 'vacio.zip', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(53, 'Reclamo', 'prueba numero 5 anonima', 'qadasdasd das as', '1668616289.txt', 'vacio.txt', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(54, 'Peticion', 'prueba numero 5 anonima', 'dasdasd asdasda sdasda sdas dasda sdasdasdas ', '1668616947.pdf', 'CV Joellizarazo  (1).pdf', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(55, 'Peticion', 'prueba numero 10 mensaje largo', 'dasdasfds sfsadf asdf asdfasd fasfasfdas', '1668622923.pdf', 'admin.pdf', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(56, 'Queja', 'prueba numero 10 mensaje largo', 'u6yrftcviujnikm', '1668623474.pdf', 'admin (1).pdf', 15.9, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(57, 'Reclamo', 'dasdsdasdasdsdefg af afs daf asfd', 'sdasfd sdf asdfasdfasd ', '1668625668.jpg', 'Tulips.jpg', 606.3, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(58, 'Peticion', 'prueba numero 5 anonima', 'sdasfds adad a afafssd adas ', '1668625790.jpg', 'Lighthouse.jpg', 548.1, 'si', '2022-11-16 00:00:00', 'anonimo', 0),
(59, 'Reclamo', 'prueba numero usuario interno', 'holaaaaaaaaaaaaaaaaaaaaaaa', 'default.jpg', '', 0, 'si', '2022-11-17 00:00:00', 'activo', 0),
(60, 'Queja', 'prueba numero 10 mensaje largo lolsito', 'sdasd asdasdf asdf adsf sadfsdfasdf asfdsdfasdf', '1668666642.zip', '2020-10-20-RefugioAnimal-master.zip', 697.4, 'si', '2022-11-17 00:00:00', 'anonimo', 0),
(61, 'Sugerencia', 'prueba numero 10 mensaje largo', 'dasdasd D SAdasdASDAS ASDsad asd SD AD FSD dfsdf sdfsdf', '1668666709.zip', '2021-online-shoestore-master.zip', 67.8, 'no', '2022-11-17 00:00:00', 'en tramite', 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `espera` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `asuntoRes` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `resualto` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `espera`, `asuntoRes`, `resualto`) VALUES
(1, 'fue recibida con exito, pronto recibira respuesta', 'fue resuelta con exito.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resusuario`
--

CREATE TABLE `resusuario` (
  `id` int(11) NOT NULL,
  `esperaU` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `asuntoResU` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `respuestaU` text COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_img` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `peso` double NOT NULL,
  `id_pqrs` int(11) NOT NULL,
  `noSolucion` text COLLATE latin1_spanish_ci NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `resusuario`
--

INSERT INTO `resusuario` (`id`, `esperaU`, `asuntoResU`, `respuestaU`, `imagen`, `nombre_img`, `peso`, `id_pqrs`, `noSolucion`, `hora`) VALUES
(1, 'Su Sugerencia sera respondida lo antes posible.', 'Su Sugerencia fue resuelta con exito.', 'su sugerencia ya esta resuelta, que pena la demora', '1668653251.jpg', 'Penguins.jpg', 759.6, 42, '', '00:00:00'),
(2, 'Su Peticion sera respondida lo antes posible.', 'Su Peticion fue resuelta con exito.', '', '', '', 0, 44, '', '00:00:00'),
(3, 'Gracias por su comprension', '', '', '', '', 0, 45, '', '00:00:00'),
(4, 'Su Sugerencia sera respondida lo antes posible.', 'Su Sugerencia fue resuelta con exito.', 'solucionado', '1668670657.jpg', 'Lighthouse.jpg', 548.1, 61, 'solucionen el problema pronto', '00:20:22'),
(5, 'Su Reclamo fue recibida con exito, pronto recibira respuesta', '', '', '', '', 0, 47, '', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_solicitante` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_identificacion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `identificacion` int(50) NOT NULL,
  `email` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `img_perfil` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `nivel` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `tipo_solicitante`, `tipo_identificacion`, `identificacion`, `email`, `password`, `img_perfil`, `nivel`) VALUES
(55, 'Rahel Marchan', 'Natural', 'CC', 1004914530, 'enderson@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '1668403582.jpg', 'admin'),
(61, 'Cristian Anderis', 'Natural', 'CC', 2147483647, 'enderson45@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'default.jpg', 'cliente'),
(67, 'Juan Castilla', 'Natural', 'CC', 1004914530, 'enderson45@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'default.jpg', 'cliente'),
(68, 'Claudia Lizarazo', 'Natural', 'CC', 2147483647, 'enderson82@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'default.jpg', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `pqrs` ADD FULLTEXT KEY `mensaje` (`mensaje`);
ALTER TABLE `pqrs` ADD FULLTEXT KEY `mensaje_2` (`mensaje`);
ALTER TABLE `pqrs` ADD FULLTEXT KEY `mensaje_3` (`mensaje`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resusuario`
--
ALTER TABLE `resusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `resusuario`
--
ALTER TABLE `resusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
