-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Mar-2018 às 00:29
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

--
-- Extraindo dados da tabela `categoria_verifica`
--

INSERT INTO `categoria_verifica` (`pk_id_categoria`, `categoria`, `fk_id_usu`) VALUES
(1, 'Exatas', 1),
(2, 'Humanas', 1),
(4, 'Técnicas', 6);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comenta_verifica`
--

INSERT INTO `comenta_verifica` (`pk_id_comentario`, `comentario`, `fk_id_resposta`, `fk_id_usu`, `data_comentario`) VALUES
(1, 'Teste comentário.', 3, 6, '2018-03-11 22:26:43'),
(2, 'Teste 2', 3, 6, '2018-03-11 22:34:39'),
(3, 'Correto', 4, 6, '2018-03-11 23:03:11');

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
  `data_pergunta` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`pk_id_pergunta`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta_verifica`
--

INSERT INTO `pergunta_verifica` (`pk_id_pergunta`, `fk_id_materia`, `pergunta`, `fk_id_usu`, `data_pergunta`) VALUES
(1, 1, 'TEste.ln zlkmnx cçkmzxn lkzbc lkzxnbc .zxbnc .kzxnbc lzkxnbc lkzjxb lkzjxbc lzkxjb clzkxjbc lkzjxb clzxkjb ', 1, '2018-03-10 18:08:12.987110'),
(2, 2, 'Teste pergunta 2', 2, '2018-03-10 18:08:12.987110'),
(3, 5, 'Calcular área?', 8, '2018-03-10 20:26:35.576907'),
(4, 1, 'Quanto é 2 + 2?', 8, '2018-03-10 20:34:09.695053'),
(5, 1, 'Quanto é 2 + 2?', 8, '2018-03-10 20:37:43.640142'),
(6, 2, 'Quando usar crase?', 6, '2018-03-11 22:27:56.691416');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resposta_verifica`
--

INSERT INTO `resposta_verifica` (`pk_id_resposta`, `resposta`, `class_resposta`, `fk_id_pergunta`, `fk_id_usu`, `data_resposta`) VALUES
(1, 'Teste REspostas', 0, 1, 1, '2018-03-10 18:18:32.910164'),
(2, 'Teste 2 Resposta 2', 3, 1, 2, '2018-03-10 18:18:32.910164'),
(3, '4', 2, 5, 8, '2018-03-10 21:43:06.917714'),
(4, '2 + 2 = 4', 1, 4, 6, '2018-03-11 03:04:50.967046');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobre_nome` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `usu_categoria` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `sobre_nome`, `usu_categoria`, `email`, `password`) VALUES
(1, 'Usuário', '0', '', 'user@user.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498'),
(2, 'Usuário 2', '0', '', 'user2@user.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498'),
(3, 'Usuário 3', '0', '', 'user3@user.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498'),
(6, 'Andre', 'Gomes', '', 'and@and.com', 'adcd7048512e64b48da55b027577886ee5a36350'),
(8, 'Teste', 'Cadastro', '', 'teste@cadastro.com', 'adcd7048512e64b48da55b027577886ee5a36350');

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

--
-- Extraindo dados da tabela `usu_verifica`
--

INSERT INTO `usu_verifica` (`fk_id_usu`, `id_nivel`, `id_materia`) VALUES
(6, '1', '1'),
(6, '2', '2'),
(6, '2', '5'),
(6, '3', '1'),
(6, '3', '3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
