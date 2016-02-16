-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Fev-2016 às 22:20
-- Versão do servidor: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(45) DEFAULT NULL,
  `FONE` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=438 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`CODIGO`, `NOME`, `FONE`, `EMAIL`) VALUES
(436, 'fffs', '23423', 'fdfsdffsd'),
(437, 'dfgsfhfgjsfdh', '23423523', 'asfsadgsdfh'),
(434, 'asdasasdasd', '33', 'asdasd@dasdas.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `CODPEDIDO` int(11) NOT NULL,
  `CODPRODUTO` int(10) DEFAULT NULL,
  `CODCLIENTE` int(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`CODPEDIDO`, `CODPRODUTO`, `CODCLIENTE`) VALUES
(1, 2250, 437),
(2, 2250, 434),
(3, 2250, 437),
(5, 2250, 436);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `CODPROD` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `PRECO` double DEFAULT NULL,
  `DESCR` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2252 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`CODPROD`, `NOME`, `PRECO`, `DESCR`) VALUES
(2251, 'yhhjj', 242532, 'dfd'),
(2250, 'adfgsrhyh', 4545, 'qerasdf'),
(2249, 'fgwbwg', 234234, 'dfadg'),
(2247, 'Teste111', 23423, 'sdfsdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`CODPEDIDO`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`CODPROD`),
  ADD KEY `CUSTO` (`PRECO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=438;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `CODPEDIDO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `CODPROD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2252;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
