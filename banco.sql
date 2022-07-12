-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Ago-2017 às 19:14
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(35) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` varchar(10) NOT NULL,
  `formato` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `naoperca`
--

CREATE TABLE `naoperca` (
  `naoperca` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `naoperca`
--

INSERT INTO `naoperca` (`naoperca`) VALUES
('naopercaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `performace`
--

CREATE TABLE `performace` (
  `id_performace` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(35) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `formato` varchar(6) DEFAULT NULL,
  `link` varchar(15) DEFAULT NULL,
  `video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `performace`
--

INSERT INTO `performace` (`id_performace`, `nome`, `descricao`, `formato`, `link`, `video`) VALUES
(0000000002, 'black sabbath', 'supernauteee', NULL, '_xFc86tzFG4', 1),
(0000000003, 'blacksabbath', 'snowblind', NULL, 'L7GJKPXTuuo', 1),
(0000000004, 'Judas', 'Hammer and anvil', NULL, 'NOGMQ-ySqOY', 1),
(0000000005, 'deep', 'learning', 'jpg', NULL, 0),
(0000000006, 'alexandre', 'sujeiro', NULL, 'gO5PNgQPvm4', 1),
(0000000007, 'asdasdsaddsa', 'asdsa', NULL, 'z-nqgNeYZ44', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quadros`
--

CREATE TABLE `quadros` (
  `id_quadro` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(35) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(50) COLLATE utf8_bin NOT NULL,
  `formato` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE `sobre` (
  `sobre` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sobre`
--

INSERT INTO `sobre` (`sobre`) VALUES
('kkkkkkk');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(35) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `admin`) VALUES
(00000000011, 'Lek', 'fera@fera', 'e10adc3949ba59abbe56e057f20f883e', 0),
(00000000012, 'Lekkkk', 'lukas_tf@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(00000000013, 'cris', 'cris@cris', 'e10adc3949ba59abbe56e057f20f883e', 1),
(00000000014, 'otavio', 'oktavio45@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(00000000015, 'afdas', 'sasda@qdqw', 'e10adc3949ba59abbe56e057f20f883e', 0),
(00000000016, 'tgyhujikolpç', 'wwrwe@qwe', 'e10adc3949ba59abbe56e057f20f883e', 0),
(00000000018, 'bandeiradff', 'suhaushuash@aushuashua', 'e10adc3949ba59abbe56e057f20f883e', 0),
(00000000019, 'buying gfsadssa', 'gf@gf', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `performace`
--
ALTER TABLE `performace`
  ADD PRIMARY KEY (`id_performace`);

--
-- Indexes for table `quadros`
--
ALTER TABLE `quadros`
  ADD PRIMARY KEY (`id_quadro`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `performace`
--
ALTER TABLE `performace`
  MODIFY `id_performace` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `quadros`
--
ALTER TABLE `quadros`
  MODIFY `id_quadro` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
