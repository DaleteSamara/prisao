-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 08-Jun-2018 às 18:30
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cidade_estado`
--

INSERT INTO `cidade_estado` (`Id_cidade_estado`, `nome_cidade`, `uf`) VALUES
(1, 'Araraquara', 'SP'),
(2, 'aaa', 'RJ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Extraindo dados da tabela `detento`
--

INSERT INTO `detento` (`id_detento`, `nome_detento`, `idade`, `cod_cidade_estado`, `motivo`, `foto`) VALUES
(1, 'Luís', 35, 1, 'Tráfico', ''),
(2, 'Fernando', 19, 2, 'Assalto', ''),
(111, '56u5', 23, 1, 'ytu', ''),
(112, 'ty', 20, 2, 'df', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `detento_prisao_ibfk_2` FOREIGN KEY (`cod_prisao`) REFERENCES `prisao` (`id_prisao`),
  ADD CONSTRAINT `detento_prisao_ibfk_1` FOREIGN KEY (`cod_detento`) REFERENCES `detento` (`id_detento`);

--
-- Limitadores para a tabela `prisao`
--
ALTER TABLE `prisao`
  ADD CONSTRAINT `prisao_ibfk_1` FOREIGN KEY (`cod_cidade_estado`) REFERENCES `cidade_estado` (`Id_cidade_estado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
