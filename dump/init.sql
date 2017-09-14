n SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql01-farm8.kinghost.net
-- Tempo de geração: 14/09/2017 às 15:31
-- Versão do servidor: 5.5.54-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `jean01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Reservas`
--

CREATE TABLE IF NOT EXISTS `Reservas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Reservas`
--

INSERT INTO `Reservas` (`id`, `data`, `hora`, `id_sala`, `id_usuario`) VALUES
(35, '2017-09-14', '16:00:00', 10, 5),
(36, '2017-09-14', '17:00:00', 10, 5),
(45, '2017-09-14', '19:00:00', 10, 1),
(46, '2017-09-14', '16:00:00', 11, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Salas`
--

CREATE TABLE IF NOT EXISTS `Salas` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `projetor` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Salas`
--

INSERT INTO `Salas` (`id`, `numero`, `apelido`, `projetor`) VALUES
(10, 304, 'Python', 0),
(11, 502, 'Wordpress', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `setor` varchar(20) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `nome`, `setor`, `email`, `username`, `password`) VALUES
(1, 'Jean Chagas Fernandes', 'N1', 'jean.chagas@kinghost.com.br', 'jean.chagas', 'e1f409c74416730459e65fd0443c4824'),
(2, 'teste', NULL, 'teste@testando.com.br', 'teste', 'aa1bf4646de67fd9086cf6c79007026c'),
(3, 'teste2', NULL, 'teste2@teste.com.br', 'teste2', 'aa1bf4646de67fd9086cf6c79007026c'),
(4, 'teste3', NULL, 'testeiseuemail@gmail.com', 'testeiseuemail', '6b94fcdacad33e6b586d54d642e4ff66'),
(5, 'teste4', NULL, 'teste4@teste4.com.br', 'teste4', '73bf3127fb3c9791e88a4d308171fd85'),
(6, 'teste5', NULL, 'teste5@teste5.com.br', 'teste5', '6ee7a7f22c4024cef59d25be2365a5a7'),
(7, 'Jadiel', NULL, 'jadiel.klaus@cyberweb.com.br', 'jadiel.klaus', '480f263db81ca6e513fb7b9232d96f16'),
(8, 'José', NULL, 'lucas.abreu@kinghost.com.br', 'lucas.abreu', '8e6f6f815b50f474cf0dc22d4f400725');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Reservas`
--
ALTER TABLE `Reservas`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_RESERVAS_SALAS` (`id_sala`), ADD KEY `FK_RESERVAS_USUARIOS` (`id_usuario`);

--
-- Índices de tabela `Salas`
--
ALTER TABLE `Salas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Reservas`
--
ALTER TABLE `Reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de tabela `Salas`
--
ALTER TABLE `Salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Reservas`
--
ALTER TABLE `Reservas`
ADD CONSTRAINT `FK_RESERVAS_USUARIOS` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`),
ADD CONSTRAINT `FK_RESERVAS_SALAS` FOREIGN KEY (`id_sala`) REFERENCES `Salas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
