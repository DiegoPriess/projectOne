-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 06:53 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projectone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`) VALUES
(001, 'Casaco', 'Casacos pretos.'),
(002, 'Chapéu', 'Chapéu caipira'),
(003, 'Camisas', 'Camisas Amarelas'),
(004, 'Calças', 'Calças Jeans'),
(005, 'Sapato', 'Sapato 46'),
(006, 'Diego', 'Um cara muito top'),
(010, 'Celulares Motorola', 'Celulares produzidos pela Motorola'),
(011, 'Panelas', 'Panelas de Barro');

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `codigo` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `valor` decimal(7,2) UNSIGNED NOT NULL,
  `descricao` text DEFAULT NULL,
  `categorias_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`codigo`, `modelo`, `valor`, `descricao`, `categorias_id`) VALUES
(00001, 'Casaco Canguru ', '130.00', 'Casaco com bolso de canguru ', 001),
(00007, 'Casaco Senai', '122.00', 'Casaco uniforme da escola SENAI', 002),
(00011, '1245', '23123.00', 'Sapato 46', 002);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `senha` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permissao` tinyint(1) UNSIGNED NOT NULL,
  `ativo` tinyint(1) UNSIGNED NOT NULL COMMENT '0 - ATIVO\n1 - INATIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `permissao`, `ativo`) VALUES
(11, '123', '202cb962ac59075b964b07152d234b70', 'diego_priess@estudante.sc.senai.br', 0, 0),
(12, 'Rodrigo', '202cb962ac59075b964b07152d234b70', 'anonymousknx@gmail.co', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_produtos_categorias_idx` (`categorias_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
