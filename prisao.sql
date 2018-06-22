-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Jun-2018 às 13:10
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `prisao`
--
CREATE DATABASE IF NOT EXISTS `prisao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prisao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade_estado`
--

CREATE TABLE IF NOT EXISTS `cidade_estado` (
  `Id_cidade_estado` int(100) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(100) NOT NULL,
  `uf` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_cidade_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cidade_estado`
--

INSERT INTO `cidade_estado` (`Id_cidade_estado`, `nome_cidade`, `uf`) VALUES
(1, 'Araraquara', 'SP'),
(2, 'aaa', 'RJ'),
(3, 'Jau', 'SP'),
(4, 'jacarepagua', 'RJ'),
(5, 'Florianópolis2', 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detento`
--

CREATE TABLE IF NOT EXISTS `detento` (
  `id_detento` int(100) NOT NULL AUTO_INCREMENT,
  `nome_detento` varchar(100) NOT NULL,
  `idade` int(100) NOT NULL,
  `cod_cidade_estado` int(100) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_detento`),
  KEY `cod_cidade_estado` (`cod_cidade_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Extraindo dados da tabela `detento`
--

INSERT INTO `detento` (`id_detento`, `nome_detento`, `idade`, `cod_cidade_estado`, `motivo`, `foto`) VALUES
(1, 'Luís', 35, 1, 'Tráfico', ''),
(2, 'Fernando', 19, 2, 'Assalto', ''),
(111, '56u5', 23, 1, 'ytu', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detento_prisao`
--

CREATE TABLE IF NOT EXISTS `detento_prisao` (
  `cod_detento` int(100) NOT NULL,
  `id_detento_prisao` int(100) NOT NULL AUTO_INCREMENT,
  `cod_prisao` int(100) NOT NULL,
  PRIMARY KEY (`id_detento_prisao`),
  KEY `cod_detento` (`cod_detento`),
  KEY `cod_prisao` (`cod_prisao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `detento_prisao`
--

INSERT INTO `detento_prisao` (`cod_detento`, `id_detento_prisao`, `cod_prisao`) VALUES
(2, 2, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prisao`
--

CREATE TABLE IF NOT EXISTS `prisao` (
  `id_prisao` int(100) NOT NULL AUTO_INCREMENT,
  `nome_prisao` varchar(100) NOT NULL,
  `cod_cidade_estado` int(100) NOT NULL,
  PRIMARY KEY (`id_prisao`),
  KEY `cod_cidade_estado` (`cod_cidade_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `prisao`
--

INSERT INTO `prisao` (`id_prisao`, `nome_prisao`, `cod_cidade_estado`) VALUES
(10, 'tgt', 1),
(11, 'ji', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detento`
--
CREATE TABLE IF NOT EXISTS `view_detento` (
`id_detento` int(100)
,`nome_detento` varchar(100)
,`idade` int(100)
,`motivo` varchar(100)
,`foto` varchar(100)
,`nome_cidade` varchar(100)
,`uf` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detento_prisao`
--
CREATE TABLE IF NOT EXISTS `view_detento_prisao` (
`id_prisao` int(100)
,`nome_prisao` varchar(100)
,`nome_detento` varchar(100)
,`idade` int(100)
,`motivo` varchar(100)
,`id_detento_prisao` int(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_prisao`
--
CREATE TABLE IF NOT EXISTS `view_prisao` (
`id_prisao` int(100)
,`nome_prisao` varchar(100)
,`nome_cidade` varchar(100)
,`uf` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `view_detento`
--
DROP TABLE IF EXISTS `view_detento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detento` AS select `detento`.`id_detento` AS `id_detento`,`detento`.`nome_detento` AS `nome_detento`,`detento`.`idade` AS `idade`,`detento`.`motivo` AS `motivo`,`detento`.`foto` AS `foto`,`cidade_estado`.`nome_cidade` AS `nome_cidade`,`cidade_estado`.`uf` AS `uf` from (`detento` join `cidade_estado` on((`detento`.`cod_cidade_estado` = `cidade_estado`.`Id_cidade_estado`)));

-- --------------------------------------------------------

--
-- Structure for view `view_detento_prisao`
--
DROP TABLE IF EXISTS `view_detento_prisao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detento_prisao` AS select `id_prisao` AS `id_prisao`,`nome_prisao` AS `nome_prisao`,`detento`.`nome_detento` AS `nome_detento`,`detento`.`idade` AS `idade`,`detento`.`motivo` AS `motivo`,`detento_prisao`.`id_detento_prisao` AS `id_detento_prisao` from ((`prisao` join `detento_prisao` on((`id_prisao` = `detento_prisao`.`cod_prisao`))) join `detento` on((`detento_prisao`.`cod_detento` = `detento`.`id_detento`)));

-- --------------------------------------------------------

--
-- Structure for view `view_prisao`
--
DROP TABLE IF EXISTS `view_prisao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_prisao` AS select `id_prisao` AS `id_prisao`,`nome_prisao` AS `nome_prisao`,`cidade_estado`.`nome_cidade` AS `nome_cidade`,`cidade_estado`.`uf` AS `uf` from (`prisao` join `cidade_estado` on((`cod_cidade_estado` = `cidade_estado`.`Id_cidade_estado`)));

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `detento`
--
ALTER TABLE `detento`
  ADD CONSTRAINT `detento_ibfk_1` FOREIGN KEY (`cod_cidade_estado`) REFERENCES `cidade_estado` (`Id_cidade_estado`);

--
-- Limitadores para a tabela `detento_prisao`
--
ALTER TABLE `detento_prisao`
  ADD CONSTRAINT `detento_prisao_ibfk_1` FOREIGN KEY (`cod_detento`) REFERENCES `detento` (`id_detento`),
  ADD CONSTRAINT `detento_prisao_ibfk_2` FOREIGN KEY (`cod_prisao`) REFERENCES `prisao` (`id_prisao`);

--
-- Limitadores para a tabela `prisao`
--
ALTER TABLE `prisao`
  ADD CONSTRAINT `prisao_ibfk_1` FOREIGN KEY (`cod_cidade_estado`) REFERENCES `cidade_estado` (`Id_cidade_estado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
