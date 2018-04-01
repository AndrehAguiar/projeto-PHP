-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Mar-2018 às 05:59
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_verifica`
--

INSERT INTO `categoria_verifica` (`pk_id_categoria`, `categoria`, `fk_id_usu`) VALUES
(1, 'Exatas', 1),
(2, 'Humanas', 1),
(4, 'Técnicas', 6);

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

--
-- Extraindo dados da tabela `materia_verifica`
--

INSERT INTO `materia_verifica` (`pk_materia_id`, `materia`, `fk_id_categoria`, `fk_usu`) VALUES
(1, 'Matemática', 1, 0),
(2, 'Gramática', 2, 0),
(3, 'Informática', 4, 6),
(4, 'Geografia', 1, 6),
(5, 'Geometria', 1, 6),
(6, 'Redação', 2, 6);

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
  PRIMARY KEY (`pk_id_pergunta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta_verifica`
--

INSERT INTO `pergunta_verifica` (`pk_id_pergunta`, `fk_id_materia`, `pergunta`, `fk_id_usu`) VALUES
(1, 1, 'TEste.ln zlkmnx cçkmzxn lkzbc lkzxnbc .zxbnc .kzxnbc lzkxnbc lkzjxb lkzjxbc lzkxjb clzkxjbc lkzjxb clzxkjb ', 1),
(2, 2, 'Teste pergunta 2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_verifica`
--

DROP TABLE IF EXISTS `resposta_verifica`;
CREATE TABLE IF NOT EXISTS `resposta_verifica` (
  `pk_id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` text NOT NULL,
  `fk_id_categoria` int(11) NOT NULL,
  `fk_materia_id` int(11) NOT NULL,
  `fk_id_usu` int(11) NOT NULL,
  `fk_id_pergunta` int(11) NOT NULL,
  PRIMARY KEY (`pk_id_resposta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resposta_verifica`
--

INSERT INTO `resposta_verifica` (`pk_id_resposta`, `resposta`, `fk_id_categoria`, `fk_materia_id`, `fk_id_usu`, `fk_id_pergunta`) VALUES
(1, 'Teste REspostas', 1, 1, 1, 1),
(2, 'Teste 2 Resposta 2', 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Usuário', 'user@user.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498'),
(2, 'Usuário 2', 'user2@user.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498'),
(3, 'Usuário 3', 'user3@user.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498'),
(6, 'Andre', 'and@and.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_verifica`
--

DROP TABLE IF EXISTS `usu_verifica`;
CREATE TABLE IF NOT EXISTS `usu_verifica` (
  `pk_id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usu` varchar(35) NOT NULL,
  `sobre_nome_usu` varchar(35) NOT NULL,
  `email_usu` varchar(35) NOT NULL,
  `nivel_usu` int(11) NOT NULL,
  PRIMARY KEY (`pk_id_usu`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
