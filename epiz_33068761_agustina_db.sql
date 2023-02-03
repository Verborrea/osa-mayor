-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2023 a las 18:41:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epiz_33068761_agustina_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `portada` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Articulos que se muestran en el apartado de blog.';

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `categoria`, `autor`, `contenido`, `fecha`, `portada`) VALUES
(1, 'Artículo de ejemplo', 'EVENTOS', 'Alan Monroy Bernedo', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus, dolor nec accumsan sagittis, leo turpis varius felis, sed placerat magna urna eget nisl. Aenean blandit at risus in auctor. Donec leo metus, sagittis non tellus nec, pulvinar eleifend enim. Pellentesque velit felis, fermentum non eros ac, consequat lobortis metus. Curabitur dapibus arcu ornare metus molestie, vel iaculis ex feugiat. In dictum viverra fermentum. Morbi aliquet posuere ipsum, sit amet maximus ligula volutpat non. Curabitur tempus lacus nec tristique faucibus. Phasellus lacinia sem non aliquam vehicula. Proin et sagittis nibh. Morbi cursus vitae turpis vel imperdiet. Donec non ultrices elit, sed ullamcorper sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.\r\n</p>\r\n<p>\r\nSecond ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus, dolor nec accumsan sagittis, leo turpis varius felis, sed placerat magna urna eget nisl. Aenean blandit at risus in auctor. Donec leo metus, sagittis non tellus nec, pulvinar eleifend enim. Pellentesque velit felis, fermentum non eros ac, consequat lobortis metus. Curabitur dapibus arcu ornare metus molestie, vel iaculis ex feugiat. In dictum viverra fermentum. Morbi aliquet posuere ipsum, sit amet maximus ligula volutpat non. Curabitur tempus lacus nec tristique faucibus. Phasellus lacinia sem non aliquam vehicula. Proin et sagittis nibh. Morbi cursus vitae turpis vel imperdiet. Donec non ultrices elit, sed ullamcorper sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.\r\n</p>', '2023-02-02', 'default.png'),
(2, 'Articulo de prueba', 'NOTICIAS', 'Bellakath', '&amp;lt;p&amp;gt;Udfgg fhdh sfd sdjkgh sdkj hsadkajg haskjadghsdakjhg.&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Skdjh sakjdgh lsdghskjdghalk jashdagl kjshd jkhsadgjk ds.&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Fsdkjgh kladsjghal kjsdhagklajsdhg s.&amp;lt;/p&amp;gt;', '2023-02-03', 'default.png'),
(3, 'Una gatita que le gusta el mambo', 'EVENTOS', 'Bellakath', '&amp;lt;p&amp;gt;Yo soy una gatita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Que me llama siempre que besarme necesita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Quiere que lo explote como explota dinamita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;No lo mueva r&aacute;pido, mi papi se excita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Y cuando estoy arriba&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;&amp;lt;img src=&amp;quot;../articles/3-6fd73ee60ed04.jpeg&amp;quot;&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Quiere que me baje como &eacute;l me lo indica&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Que le d&eacute; bien duro hasta que se derrita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;P&iacute;dele al DJ volumen y que lo repita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Cuando me bailas, beb&eacute;, yo soy tu fan&aacute;tica&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;T&uacute; eres mi gatito, yo, tu gatita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Te pones s&aacute;tiro, me pongo s&aacute;tira&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;T&uacute; eres mi loquito, y yo, tu loquita&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;Ja, ja, ja, ja&amp;lt;/p&amp;gt;', '2023-02-03', '3-portada.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda`
--

CREATE TABLE `ayuda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `razon` varchar(1000) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ayuda`
--

INSERT INTO `ayuda` (`id`, `nombre`, `correo`, `razon`, `tipo`) VALUES
(3, 'Alan Monroy Bernedo', 'alan.monroy@ucsp.edu.pe', 'Este es un ejemplo de necesito ayuda', 0),
(4, 'Diego Ulloa', 'pepe@gmail.com', 'Este es otro donde yo, Diego Ulloa quiero ayudar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `correo`, `mensaje`) VALUES
(1, 'ARENAS VILLACORTA ALEJANDRO TOMAS', 'alanmonroyb@gmail.com', 'Esta es otra prueba para ver el formulario de contacto, espero puedan considerarme.\r\nQue loco.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(130) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'IMG_0171.jpg', 'Chocolatada Navideña - Regalos'),
(2, 'IMG_0261.jpg', 'Chocolatada Navideña'),
(3, 'IMG_0240.jpg', 'Chocolatada Navideña'),
(4, 'IMG_0224.jpg', 'Chocolatada Navideña'),
(5, 'IMG_0265.jpg', 'Chocolatada Navideña - Ganador'),
(6, 'IMG_0255.jpg', 'Profesoras'),
(7, 'IMG_0250.jpg', 'Nueva descripcion 2'),
(8, 'IMG_0212.jpg', 'Auditorio'),
(9, 'IMG_0175.jpg', 'Chocolatada Navideña - Regalos'),
(10, 'IMG_0183.jpg', 'Chocolatada Navideña - Regalos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntarios`
--

CREATE TABLE `voluntarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `fechaNac` date NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `numeroContacto` varchar(12) NOT NULL,
  `sobreMi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ayuda`
--
ALTER TABLE `ayuda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ayuda`
--
ALTER TABLE `ayuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
