-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Abr-2018 às 18:26
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ver_duvida`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_verifica`
--

DROP TABLE IF EXISTS `categoria_verifica`;
CREATE TABLE IF NOT EXISTS `categoria_verifica` (
  `pk_id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(35) NOT NULL,
  `fk_id_usu` int(11) NOT NULL,
  PRIMARY KEY (`pk_id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comenta_verifica`
--

DROP TABLE IF EXISTS `comenta_verifica`;
CREATE TABLE IF NOT EXISTS `comenta_verifica` (
  `pk_id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `fk_id_resposta` int(11) NOT NULL,
  `fk_id_usu` int(11) NOT NULL,
  `data_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id_comentario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia_verifica`
--

DROP TABLE IF EXISTS `materia_verifica`;
CREATE TABLE IF NOT EXISTS `materia_verifica` (
  `pk_materia_id` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(35) NOT NULL,
  `fk_id_categoria` int(11) NOT NULL,
  `fk_usu` int(11) NOT NULL,
  PRIMARY KEY (`pk_materia_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta_verifica`
--

DROP TABLE IF EXISTS `pergunta_verifica`;
CREATE TABLE IF NOT EXISTS `pergunta_verifica` (
  `pk_id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_materia` int(11) NOT NULL,
  `pergunta` text NOT NULL,
  `fk_id_usu` int(11) NOT NULL,
  `data_pergunta` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`pk_id_pergunta`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_verifica`
--

DROP TABLE IF EXISTS `resposta_verifica`;
CREATE TABLE IF NOT EXISTS `resposta_verifica` (
  `pk_id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` text NOT NULL,
  `class_resposta` int(11) DEFAULT '0',
  `fk_id_pergunta` int(11) NOT NULL,
  `fk_id_usu` int(11) NOT NULL,
  `data_resposta` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`pk_id_resposta`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobre_nome` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `usu_categoria` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_verifica`
--

DROP TABLE IF EXISTS `usu_verifica`;
CREATE TABLE IF NOT EXISTS `usu_verifica` (
  `fk_id_usu` int(11) NOT NULL,
  `id_nivel` varchar(35) NOT NULL,
  `id_materia` varchar(35) NOT NULL,
  PRIMARY KEY (`fk_id_usu`,`id_nivel`,`id_materia`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
