-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/09/2025 às 23:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ongdogs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adocoes`
--

CREATE TABLE `adocoes` (
  `id_adocao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `data_adocao` date NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adocoes`
--

INSERT INTO `adocoes` (`id_adocao`, `id_usuario`, `id_animal`, `data_adocao`, `status`) VALUES
(1, 1, 1, '2025-09-12', 'Concluída');

-- --------------------------------------------------------

--
-- Estrutura para tabela `animais`
--

CREATE TABLE `animais` (
  `id_animal` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `especie` varchar(20) NOT NULL,
  `raca` varchar(20) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `descricao` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animais`
--

INSERT INTO `animais` (`id_animal`, `nome`, `especie`, `raca`, `idade`, `sexo`, `descricao`) VALUES
(1, 'Rex', 'Cachorro', 'Vira-lata', 3, 'Macho', 'Cachorro brincalhão e dócil'),
(2, 'Luna', 'Cachorro', 'Poodle', 5, 'Fêmea', 'Muito carinhosa e tranquila'),
(3, 'Mingau', 'Gato', 'Persa', 2, 'Macho', 'Gato calmo e independente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `apadrinhamentos`
--

CREATE TABLE `apadrinhamentos` (
  `id_apadrinhamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `data_adocao` date NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `apadrinhamentos`
--

INSERT INTO `apadrinhamentos` (`id_apadrinhamento`, `id_usuario`, `id_animal`, `data_adocao`, `status`) VALUES
(1, 2, 2, '2025-09-18', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id_doacoes` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `data_doacao` date NOT NULL,
  `forma_paga` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doacoes`
--

INSERT INTO `doacoes` (`id_doacoes`, `id_usuario`, `valor`, `data_doacao`, `forma_paga`, `status`) VALUES
(1, 2, '150.00', '2025-09-15', 'PIX', 'Confirmado'),
(2, 3, '500.00', '2025-09-20', 'Cartão', 'Confirmado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(90) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nome`, `descricao`, `data_inicio`, `data_fim`) VALUES
(1, 'Feira de Adoção Setembro', 'Feira com animais resgatados', '2025-09-10', '2025-09-12'),
(2, 'Campanha de Vacinação', 'Vacinação gratuita para cães e gatos', '2025-10-05', '2025-10-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participacoes`
--

CREATE TABLE `participacoes` (
  `id_participacao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `participacoes`
--

INSERT INTO `participacoes` (`id_participacao`, `id_usuario`, `id_evento`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `CPF` varchar(16) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `telefone`, `CPF`, `tipo_usuario`) VALUES
(1, 'Maria Silva', 'maria@email.com', '123456', '11988887777', '12345678901', 'Adotante'),
(2, 'João Souza', 'joao@email.com', '654321', '11999996666', '98765432100', 'Doador'),
(3, 'Ana Lima', 'ana@email.com', 'abc123', '21977775555', '45678912311', 'Administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adocoes`
--
ALTER TABLE `adocoes`
  ADD PRIMARY KEY (`id_adocao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Índices de tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`id_animal`);

--
-- Índices de tabela `apadrinhamentos`
--
ALTER TABLE `apadrinhamentos`
  ADD PRIMARY KEY (`id_apadrinhamento`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Índices de tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id_doacoes`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices de tabela `participacoes`
--
ALTER TABLE `participacoes`
  ADD PRIMARY KEY (`id_participacao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adocoes`
--
ALTER TABLE `adocoes`
  MODIFY `id_adocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `apadrinhamentos`
--
ALTER TABLE `apadrinhamentos`
  MODIFY `id_apadrinhamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id_doacoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `participacoes`
--
ALTER TABLE `participacoes`
  MODIFY `id_participacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `adocoes`
--
ALTER TABLE `adocoes`
  ADD CONSTRAINT `adocoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `adocoes_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `animais` (`id_animal`);

--
-- Restrições para tabelas `apadrinhamentos`
--
ALTER TABLE `apadrinhamentos`
  ADD CONSTRAINT `apadrinhamentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `apadrinhamentos_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `animais` (`id_animal`);

--
-- Restrições para tabelas `doacoes`
--
ALTER TABLE `doacoes`
  ADD CONSTRAINT `doacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `participacoes`
--
ALTER TABLE `participacoes`
  ADD CONSTRAINT `participacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `participacoes_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
