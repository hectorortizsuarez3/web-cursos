-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 28-05-2025 a las 12:07:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-intermodular`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `texto` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `texto2` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `texto`, `telefono`, `texto2`, `email`) VALUES
(1, 'Puede contactarnos directamente en el siguiente número de teléfono: ', '123456789', 'de luneas a viernes entre las 09:30 y las 20:00 o a la siguiente dirección de correo: 		', 'hectorortizsuarez3@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `duracion` varchar(100) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_comienzo` varchar(50) DEFAULT NULL,
  `limite_matriculacion` varchar(50) DEFAULT NULL,
  `fecha_fin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `duracion`, `precio`, `descripcion`, `fecha_comienzo`, `limite_matriculacion`, `fecha_fin`) VALUES
(1, 'Curso de html y css', '90 horas, convalidable por 5ECTS', '119€', 'Aprenderás desde cero a crear páginas web con HTML y CSS, los lenguajes fundamentales del diseño web. Conoce la estructura, estilos y diseño responsive para dar a tus sitios un aspecto profesional.', '18/09/2025', '16/09/2025', '15/02/2026'),
(2, 'Curso de bases de datos', '250 horas, convalidable por 10ECTS', '299€', 'Aprenderás a manejar el lenguaje estándar de bases de datos, que es sql, y a hacer consultas complejas mediante pl sql (triggers, cursores, procedimientos, funciones, etc). Fórmate en uno de los sectores con más demanda laboral.', '15/09/2025', '12/09/2025', '18/02/2026'),
(3, 'Curso de JavaScript', '250 horas, convalidable por 10ECTS', '249€', 'Domina el lenguaje que da vida a las páginas web. Aprenderás a crear sitios dinámicos, interactuar con el usuario y mejorar la experiencia web. Complementa tus conocimientos de HTML y CSS con JavaScript.', '21/09/2025', '18/09/2025', '31/01/2026');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal`
--

CREATE TABLE `legal` (
  `id` int(11) NOT NULL,
  `texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `legal`
--

INSERT INTO `legal` (`id`, `texto`) VALUES
(1, 'Esta página web ha sido desarrollada con fines exclusivamente educativos como parte del proyecto intermodular del ciclo formativo de Desarrollo de Aplicaciones Web (DAW).\r\n\r\nEl sitio no tiene carácter comercial y no recoge datos personales de ningún tipo.\r\n\r\nTodos los contenidos presentados en esta web (textos, imágenes, estilos, funcionalidades) son simulados o genéricos, y no representan ningún curso real ni empresa existente.\r\n\r\nLa finalidad de esta web es demostrar competencias técnicas adquiridas durante el curso académico.\r\n\r\nEn caso de que se utilicen recursos externos (como imágenes o bibliotecas), se ha intentado respetar siempre el uso libre o bajo licencia adecuada. Si detecta algún contenido que vulnera derechos, puede comunicarlo al autor del proyecto para su retirada inmediata.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `legal`
--
ALTER TABLE `legal`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
