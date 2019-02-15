-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Fev-2019 às 03:18
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qi_condominio`
--
CREATE DATABASE IF NOT EXISTS `qi_condominio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qi_condominio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato_vaga`
--

CREATE TABLE `candidato_vaga` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_condominio` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominio`
--

CREATE TABLE `condominio` (
  `id` int(11) NOT NULL,
  `id_solicitante` int(11) NOT NULL,
  `nome_cond` varchar(255) NOT NULL,
  `cnpj_cond` varchar(50) NOT NULL,
  `tel_fix_cond` varchar(50) NOT NULL,
  `tipo_cond` varchar(50) NOT NULL,
  `unidades_cond` int(11) NOT NULL,
  `idade_cond` int(11) NOT NULL,
  `cep_cond` varchar(25) NOT NULL,
  `pais_cond` varchar(255) NOT NULL,
  `estado_cond` varchar(255) NOT NULL,
  `cidade_cond` varchar(255) NOT NULL,
  `endereco_cond` varchar(255) NOT NULL,
  `complemento_cond` varchar(255) NOT NULL,
  `numero_cond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ecolaridade`
--

CREATE TABLE `ecolaridade` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_curso` varchar(255) NOT NULL,
  `instituicao` varchar(255) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `tipo_curso` varchar(200) NOT NULL,
  `inicio` date NOT NULL,
  `conclusao` date NOT NULL,
  `situacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exp_profissional`
--

CREATE TABLE `exp_profissional` (
  `id` int(11) NOT NULL,
  `nome_empresa` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `inicio` varchar(200) NOT NULL,
  `fim` varchar(200) NOT NULL,
  `situacao` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguindo`
--

CREATE TABLE `seguindo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_condominio` int(11) NOT NULL,
  `seguindo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitante_cond`
--

CREATE TABLE `solicitante_cond` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `tel_fixo` varchar(255) NOT NULL,
  `data_aniversario` date NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `complemento` varchar(400) NOT NULL,
  `numero` int(11) NOT NULL,
  `nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitante_condominio`
--

CREATE TABLE `solicitante_condominio` (
  `id` int(11) NOT NULL,
  `id_solicitante` int(11) NOT NULL,
  `id_condominio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(400) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `telefone_fixo` varchar(20) NOT NULL,
  `data_aniversario` varchar(200) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `apresentacao` varchar(600) NOT NULL,
  `idiomas` text NOT NULL,
  `link_video` varchar(200) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(500) NOT NULL,
  `numero_casa` varchar(200) NOT NULL,
  `curriculo` varchar(200) NOT NULL,
  `nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas_condominio`
--

CREATE TABLE `vagas_condominio` (
  `id` int(11) NOT NULL,
  `id_condominio` int(11) NOT NULL,
  `id_solicitante` int(11) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `horas_trabalho` varchar(7) NOT NULL,
  `nivel_escolaridade` varchar(255) NOT NULL,
  `honorario` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `competencias` text NOT NULL,
  `requisitos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidato_vaga`
--
ALTER TABLE `candidato_vaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condominio`
--
ALTER TABLE `condominio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj_cond` (`cnpj_cond`);

--
-- Indexes for table `ecolaridade`
--
ALTER TABLE `ecolaridade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_profissional`
--
ALTER TABLE `exp_profissional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seguindo`
--
ALTER TABLE `seguindo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitante_cond`
--
ALTER TABLE `solicitante_cond`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `solicitante_condominio`
--
ALTER TABLE `solicitante_condominio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vagas_condominio`
--
ALTER TABLE `vagas_condominio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidato_vaga`
--
ALTER TABLE `candidato_vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `condominio`
--
ALTER TABLE `condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecolaridade`
--
ALTER TABLE `ecolaridade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exp_profissional`
--
ALTER TABLE `exp_profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seguindo`
--
ALTER TABLE `seguindo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitante_cond`
--
ALTER TABLE `solicitante_cond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitante_condominio`
--
ALTER TABLE `solicitante_condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vagas_condominio`
--
ALTER TABLE `vagas_condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
