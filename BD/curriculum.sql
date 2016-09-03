-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2015 às 04:48
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `curriculum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `curriculum`
--

INSERT INTO `curriculum` (`id`, `email`, `senha`, `nome`, `sobrenome`, `foto`, `telefone`, `cep`, `area`, `objetivo`) VALUES
(15, 'goncalvestrindade@gmail.com', '202cb962ac59075b964b', 'Luis Henrique', 'Trindade', '1449457200.jpeg', '(41) 4141-4141', '33333-333', 'informatia', 'estagio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_conteudo`
--

CREATE TABLE IF NOT EXISTS `c_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `experiencia` varchar(255) NOT NULL,
  `ano1` varchar(255) NOT NULL,
  `ano2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
