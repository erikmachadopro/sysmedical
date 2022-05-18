-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 18-Maio-2022 às 19:18
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
(10, 'Teste', 'teste@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(11, 'Teste 2', 'teste2@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'admin'),
(12, 'Teste 3', 'teste3@teste.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin'),
(14, 'Teste 4', 'teste4@teste.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'admin'),
(15, 'Teste 5', 'teste5@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'admin'),
(16, 'Teste 6', 'teste6@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(17, 'Teste 7', 'teste7@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'admin'),
(18, 'teste 8', 'teste8@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(19, 'Teste 9', 'teste9@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(20, 'Teste 10', 'teste10@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(21, 'Teste 1', 'teste1@teste.com', '202cb962ac59075b964b07152d234b70', '123', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
