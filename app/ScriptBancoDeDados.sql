SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `crudmarcomaddoandroid`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT '50',
  `cidade` varchar(45) DEFAULT '50',
  `datainc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `cidade`, `datainc`) VALUES
(1, 'Nome 1', 'Cidade 1', '2017-06-17 17:09:34'),
(2, 'Nome 2', 'Cidade 2', '2017-06-17 17:09:39'),
(3, 'Nome 3', 'Cidade 3', '2017-06-17 17:09:42'),
(4, 'Nome 4', 'Cidade 4', '2017-06-17 17:09:46'),
(5, 'Nome 5', 'Cidade 5', '2017-06-17 17:10:13'),
(6, 'Nome 6', 'Cidade 6', '2017-06-17 17:10:16'),
(7, 'Nome 7', 'Cidade 7', '2017-06-17 17:10:50'),
(8, 'Nome 8', 'Cidade 8', '2017-06-17 17:10:53'),
(9, 'Nome 9', 'Cidade 9', '2017-06-17 17:10:56'),
(10, 'Nome 10', 'Cidade 10', '2017-06-17 17:10:58'),
(11, 'Nome 11', 'Cidade 11', '2017-06-17 17:46:46'),
(12, 'Nome 12', 'Cidade 12', '2017-06-17 17:47:00'),
(13, 'Nome 13', 'Cidade 13', '2017-06-17 17:47:07'),
(14, 'Nome 14', 'Cidade 14', '2017-06-17 17:47:11'),
(15, 'Nome 15', 'Cidade 15', '2017-06-17 17:47:14'),
(16, 'Nome 16', 'Cidade 16', '2017-06-17 17:47:15'),
(17, 'Nome 17', 'Cidade 17', '2017-06-17 17:47:16'),
(18, 'Nome 18', 'Cidade 18', '2017-06-17 17:47:16'),
(19, 'Nome 19', 'Cidade 19', '2017-06-17 17:47:18'),
(20, 'Nome 20', 'Cidade 20', '2017-06-17 17:47:19'),
(21, 'Nome 21', 'Cidade 21', '2017-06-17 20:53:17'),
(22, 'Nome 22', 'Cidade 22', '2017-06-17 21:29:26'),
(23, 'Nome 23', 'Cidade 23', '2017-06-17 21:29:31'),
(24, 'Nome 24', 'Cidade 24', '2017-06-17 22:52:14'),
(25, 'Nome 25', 'Cidade 25', '2017-06-18 16:38:45'),
(26, 'Nome 26', 'Cidade 26', '2017-06-18 16:38:50'),
(27, 'Nome 27', 'Cidade 27', '2017-06-18 16:38:54'),
(28, 'Nome 28', 'Cidade 28', '2017-06-18 16:39:21'),
(29, 'Nome 29', 'Cidade 29', '2017-06-18 16:39:23'),
(30, 'Nome 30', 'Cidade 30', '2017-06-18 16:39:24'),
(31, 'Nome 31', 'Cidade 31', '2017-06-18 16:48:49'),
(32, 'Nome 32', 'Cidade 32', '2017-06-18 16:48:50'),
(33, 'Nome 33', 'Cidade 33', '2017-06-18 16:49:01'),
(34, 'Nome 34', 'Cidade 34', '2017-06-18 16:49:03'),
(35, 'Nome 35', 'Cidade 35', '2017-06-18 16:49:05'),
(36, 'Nome 36', 'Cidade 36', '2017-06-18 16:49:36');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
