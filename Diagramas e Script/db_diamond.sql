-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2024 às 18:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_diamond`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alimentacao`
--

CREATE TABLE `alimentacao` (
  `id_alimentacao` int(10) UNSIGNED NOT NULL,
  `id_cidade` int(10) UNSIGNED NOT NULL,
  `id_catAlimentacao` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cat_alimentacao`
--

CREATE TABLE `cat_alimentacao` (
  `id_catAlimentacao` int(10) UNSIGNED NOT NULL,
  `descritivo` varchar(100) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cat_hospedagem`
--

CREATE TABLE `cat_hospedagem` (
  `id_catHospedagem` int(10) UNSIGNED NOT NULL,
  `descritivo` varchar(50) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cat_pontoturistico`
--

CREATE TABLE `cat_pontoturistico` (
  `id_catPontoTuristico` int(10) UNSIGNED NOT NULL,
  `descritivo` varchar(100) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospedagem`
--

CREATE TABLE `hospedagem` (
  `id_hospedagem` int(10) UNSIGNED NOT NULL,
  `id_cidade` int(10) UNSIGNED NOT NULL,
  `id_catHospedagem` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `classificacao` char(1) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontoturistico`
--

CREATE TABLE `pontoturistico` (
  `id_pontoTuristico` int(10) UNSIGNED NOT NULL,
  `id_cidade` int(10) UNSIGNED NOT NULL,
  `id_catPontoTuristico` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `ingresso` float DEFAULT NULL,
  `horarioFuncionamento` time DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `uf`
--

CREATE TABLE `uf` (
  `id_uf` int(10) NOT NULL,
  `sigla` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `id_cidade` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alimentacao`
--
ALTER TABLE `alimentacao`
  ADD PRIMARY KEY (`id_alimentacao`),
  ADD KEY `alimentacao_FKIndex1` (`id_catAlimentacao`),
  ADD KEY `alimentacao_FKIndex2` (`id_cidade`);

--
-- Índices de tabela `cat_alimentacao`
--
ALTER TABLE `cat_alimentacao`
  ADD PRIMARY KEY (`id_catAlimentacao`);

--
-- Índices de tabela `cat_hospedagem`
--
ALTER TABLE `cat_hospedagem`
  ADD PRIMARY KEY (`id_catHospedagem`);

--
-- Índices de tabela `cat_pontoturistico`
--
ALTER TABLE `cat_pontoturistico`
  ADD PRIMARY KEY (`id_catPontoTuristico`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Índices de tabela `hospedagem`
--
ALTER TABLE `hospedagem`
  ADD PRIMARY KEY (`id_hospedagem`),
  ADD KEY `hospedagem_FKIndex1` (`id_catHospedagem`),
  ADD KEY `hospedagem_FKIndex2` (`id_cidade`);

--
-- Índices de tabela `pontoturistico`
--
ALTER TABLE `pontoturistico`
  ADD PRIMARY KEY (`id_pontoTuristico`),
  ADD KEY `pontoTuristico_FKIndex1` (`id_catPontoTuristico`),
  ADD KEY `pontoTuristico_FKIndex2` (`id_cidade`);

--
-- Índices de tabela `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`id_uf`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `usuario_FKIndex1` (`id_cidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimentacao`
--
ALTER TABLE `alimentacao`
  MODIFY `id_alimentacao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cat_alimentacao`
--
ALTER TABLE `cat_alimentacao`
  MODIFY `id_catAlimentacao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cat_hospedagem`
--
ALTER TABLE `cat_hospedagem`
  MODIFY `id_catHospedagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cat_pontoturistico`
--
ALTER TABLE `cat_pontoturistico`
  MODIFY `id_catPontoTuristico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hospedagem`
--
ALTER TABLE `hospedagem`
  MODIFY `id_hospedagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pontoturistico`
--
ALTER TABLE `pontoturistico`
  MODIFY `id_pontoTuristico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `uf`
--
ALTER TABLE `uf`
  MODIFY `id_uf` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alimentacao`
--
ALTER TABLE `alimentacao`
  ADD CONSTRAINT `alimentacao_ibfk_1` FOREIGN KEY (`id_catAlimentacao`) REFERENCES `cat_alimentacao` (`id_catAlimentacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `alimentacao_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `hospedagem`
--
ALTER TABLE `hospedagem`
  ADD CONSTRAINT `hospedagem_ibfk_1` FOREIGN KEY (`id_catHospedagem`) REFERENCES `cat_hospedagem` (`id_catHospedagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hospedagem_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pontoturistico`
--
ALTER TABLE `pontoturistico`
  ADD CONSTRAINT `pontoturistico_ibfk_1` FOREIGN KEY (`id_catPontoTuristico`) REFERENCES `cat_pontoturistico` (`id_catPontoTuristico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pontoturistico_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
