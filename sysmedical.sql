-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30-Maio-2022 às 14:28
-- Versão do servidor: 5.7.33
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sysmedical`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `cpf`, `telefone`, `email`) VALUES
(1, 'MÃ©dico 1', 1, 'GO/123451', '111.111.111-11', '(11) 11111-1111', 'medico1@teste.com'),
(2, 'MÃ©dico 2', 1, 'GO/123452', '111.111.111-12', '(11) 11111-1112', 'medico2@teste.com'),
(18, 'MÃ©dico 3', 1, 'GO/123453', '111.111.111-13', '(11) 11111-1113', 'medico3@teste.com'),
(23, 'mÃ©dico 5', 1, 'GO/123455', '111.111.111-15', '(11) 11111-1115', 'medico5@teste.com'),
(24, 'MÃ©dico 4', 1, 'GO/123454', '111.111.111-14', '(11) 11111-1114', 'medico4@teste.com'),
(25, 'MÃ©dico 6', 1, 'GO/123456', '111.111.111-16', '(11) 11111-1116', 'medico6@teste.com'),
(26, 'MÃ©dico 7', 1, 'GO/123457', '111.111.111-17', '(11) 11111-1117', 'medico7@teste.com'),
(27, 'MÃ©dico 8', 1, 'GO/123458', '111.111.111-18', '(11) 11111-1118', 'medico8@teste.com'),
(28, 'Pedro', 1, 'GO/123459', '111.111.111-19', '(11) 11111-1119', 'pedro@teste.com'),
(31, 'Julia', 1, 'GO/123460', '111.111.111-60', '(11) 11111-1160', 'julia@teste.com'),
(33, 'Lucas', 1, 'GO/123461', '111.111.111-61', '(11) 11111-1161', 'lucas@teste.com'),
(34, 'JosÃ©', 1, 'GO/123462', '111.111.111-62', '(11) 11111-1162', 'jose@teste.com'),
(35, 'Tiago', 1, 'GO/123164', '111.111.111-64', '(11) 11111-1164', 'tiago@teste.com'),
(36, 'Regina', 1, 'GO/123465', '111.111.111-65', '(11) 11111-1165', 'regina@teste.com'),
(37, 'Arthur', 1, 'GO/123466', '111.111.111-66', '(11) 11111-1166', 'arthur@teste.com'),
(38, 'Lais', 1, 'GO/123467', '111.111.111-67', '(11) 11111-1167', 'lais@teste.com'),
(39, 'Francisco', 1, 'GO/123468', '111.111.111-68', '(11) 11111-1168', 'francisco@teste.com'),
(40, 'Julio', 1, 'GO/123469', '111.111.111-69', '(11) 11111-1169', 'julio@teste.com'),
(41, 'Barbara', 1, 'GO/123470', '111.111.111-70', '(11) 11111-1170', 'barbara@teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `senha_original`, `nivel`) VALUES
(2, 'medico', 'medico@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'medico'),
(9, 'Administrador', 'admin@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(10, 'Teste Teste', 'teste@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(11, 'Teste 2', 'teste2@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'admin'),
(12, 'Teste 3', 'teste3@teste.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin'),
(14, 'Teste 4', 'teste4@teste.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'admin'),
(15, 'Teste 5', 'teste5@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'admin'),
(16, 'Teste 6', 'teste6@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(17, 'Teste 7', 'teste7@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'admin'),
(18, 'teste 8', 'teste8@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(19, 'Teste 9', 'teste9@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(20, 'Teste 10', 'teste10@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(21, 'Teste 1', 'teste1@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(23, 'Teste 11', 'teste11@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
