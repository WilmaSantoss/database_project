-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2024 às 11:56
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `caso_pratico_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_criacao` date NOT NULL DEFAULT current_timestamp(),
  `tecnologia_associada` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `user_id`, `data_criacao`, `tecnologia_associada`, `status`) VALUES
(8, 11, '2024-06-27', 'JavaScript', 'marcado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reunioes`
--

CREATE TABLE `reunioes` (
  `id_reuniao` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `reunioes`
--

INSERT INTO `reunioes` (`id_reuniao`, `user_id`, `data`, `horario`) VALUES
(8, 11, '2024-06-26', '11:00:00'),
(9, 10, '2024-06-28', '13:16:00'),
(10, 10, '2024-06-28', '13:16:00'),
(11, 11, '2024-07-01', '03:03:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `user_id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `apelido` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`user_id`, `nome`, `apelido`, `email`, `password`, `user_type`) VALUES
(1, 'Jane', 'Doe', 'janedoe@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'administrador'),
(10, 'Gilbert', 'Martins', 'gilbert@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'utilizador'),
(11, 'Wilma', 'Santos', 'wilma@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'utilizador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `reunioes`
--
ALTER TABLE `reunioes`
  ADD PRIMARY KEY (`id_reuniao`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reunioes`
--
ALTER TABLE `reunioes`
  MODIFY `id_reuniao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilizadores` (`user_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `reunioes`
--
ALTER TABLE `reunioes`
  ADD CONSTRAINT `reunioes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilizadores` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
