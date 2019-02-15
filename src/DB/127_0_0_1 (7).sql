-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Fev-2019 às 05:30
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
  `id_condominio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato_vaga`
--

INSERT INTO `candidato_vaga` (`id`, `id_usuario`, `id_condominio`) VALUES
(5, 1, 1);

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

--
-- Extraindo dados da tabela `condominio`
--

INSERT INTO `condominio` (`id`, `id_solicitante`, `nome_cond`, `cnpj_cond`, `tel_fix_cond`, `tipo_cond`, `unidades_cond`, `idade_cond`, `cep_cond`, `pais_cond`, `estado_cond`, `cidade_cond`, `endereco_cond`, `complemento_cond`, `numero_cond`) VALUES
(1, 1, 'Konoha Businnes', '74.555.512/4578-54', '0222-2202', 'misto', 45, 25, '56456-465', 'br', 'sp', 'Konoha', 'k', '', 2),
(2, 1, 'prize', '56.465.464/6464-66', '5465-4654', 'comercial', 4, 5, '45646-546', 'br', 'rj', 'Gavea', 'rua teste', '5', 55),
(3, 2, 'TESTE', '44.564.654/5646-54', '5454-5454', 'comercial', 5, 5, '02020-202', 'br', 'pr', 'Sp', 'rua teste sp', '', 99);

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

--
-- Extraindo dados da tabela `ecolaridade`
--

INSERT INTO `ecolaridade` (`id`, `id_usuario`, `nome_curso`, `instituicao`, `pais`, `tipo_curso`, `inicio`, `conclusao`, `situacao`) VALUES
(1, 1, 'Ciencia da computação', 'UNICID', 'BRASIL', 'pressencial', '2018-01-01', '2021-12-31', 'cursando'),
(2, 2, 'Sindic', 'ecossistema', 'brasil', 'pres', '2005-12-12', '2010-12-12', 'interrompido'),
(3, 3, 'Cienecia', 'Unicid', 'brasil', 'pres', '1999-12-12', '2011-12-12', 'cursando');

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

--
-- Extraindo dados da tabela `exp_profissional`
--

INSERT INTO `exp_profissional` (`id`, `nome_empresa`, `cargo`, `inicio`, `fim`, `situacao`, `id_usuario`) VALUES
(1, 'Resource IT', 'Developer', '2019-02-04', '', 'trabalhando', 1),
(2, 'sei la', 'se la', '1999-12-01', '2015-02-11', '', 2),
(3, 'teste', 'kaghe', '2015-04-12', '2019-12-12', 'trabalhando', 3);

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

--
-- Extraindo dados da tabela `seguindo`
--

INSERT INTO `seguindo` (`id`, `id_usuario`, `id_condominio`, `seguindo`) VALUES
(5, 1, 1, 0),
(6, 1, 3, 0),
(7, 1, 2, 0);

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

--
-- Extraindo dados da tabela `solicitante_cond`
--

INSERT INTO `solicitante_cond` (`id`, `nome`, `senha`, `email`, `celular`, `cpf`, `funcao`, `tel_fixo`, `data_aniversario`, `sexo`, `cep`, `pais`, `estado`, `cidade`, `endereco`, `complemento`, `numero`, `nivel`) VALUES
(1, 'Tobirama', '123', 'tobrama@tob.com', '45545-4545', '787.878.989-89', 'Hokage', '1213-2132', '1960-12-12', 'masculino', '45465-465', 'br', 'sp', 'Konoha', 'konoha street', '', 555, 'solicitante'),
(2, 'Hash', '123', 'hash@rama.com', '54646-5464', '456.546.546-54', 'sei la', '6546-5656', '1990-12-12', 'masculino', '12212-121', 'br', 'pr', 'bangu', 'teste', 'comple', 555, 'solicitante'),
(4, 'Greg', '123', 'greg@cond.com', '45459-5656', '888.888.888-88', 'liv', '2121-2121', '1999-12-12', 'masculino', '05000-500', 'br', 'pr', 'Algum luga', 'lugar', 'comple', 555, 'solicitante');

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

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha`, `cpf`, `telefone_fixo`, `data_aniversario`, `sexo`, `apresentacao`, `idiomas`, `link_video`, `cep`, `pais`, `estado`, `cidade`, `endereco`, `complemento`, `numero_casa`, `curriculo`, `nivel`) VALUES
(1, 'Mateus', 'mateuslima565@gmail.com', '20202-0222', '123', '456.456.546-54', '1212-1212', '1996-12-12', 'masculino', 'nbdnsbfnmdbnmfbdnmfbdnbfdbmfbdmfbnmdbfdnmbnmsdbnmfdsbnfbdnmsfbsdnbfmnsdbfnmdbfnmdsbfnmdbnmfbsdmnbfm,nfdbsnmfbdsmnfbdsnvfgdhsvgh', 'ingles', 'https://www.youtube.com/embed/67cHb49kTMw', '22121-212', 'br', 'sp', 'são paulo', 'rua samuel, 112', '112', '112', 'Relação de Documentos - Estágio.pdf', 'sindico'),
(2, 'Sind', 'sindico@sind.com.br', '20202-0202', '123', '456.456.456-46', '5465-4654', '1992-12-12', 'feminino', 'bla bla bla', 'ingles,espanhol', 'https://www.youtube.com/embed/67cHb49kTMw', '08041-020', 'br', 'mg', 'sao paulo', 'samuel, teste', 'teste', '', 'Exame Mateus Lima de Matos-converted.pdf', 'sindico'),
(3, 'Hashirama', 'hashirama@teste.com', '45454-5454', '123', '848.494.656-56', '3232-3232', '1990-12-12', 'masculino', 'djhfhsdgjhsdfgkjfdkjghfdjkghfdjkghfdjkghsdfjkhgjkfsdhjk', 'latim', 'https://www.youtube.com/embed/67cHb49kTMw', '56465-465', 'br', 'rj', 'paris', 'rua teste', 'complemne teste', '', 'RESOURCE - Declaração de Veracidade-signed.pdf', 'sindico');

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
-- Extraindo dados da tabela `vagas_condominio`
--

INSERT INTO `vagas_condominio` (`id`, `id_condominio`, `id_solicitante`, `posicao`, `horas_trabalho`, `nivel_escolaridade`, `honorario`, `descricao`, `competencias`, `requisitos`) VALUES
(1, 1, 1, 'sindico', '21:02', 'superior', 'R$: 1.500,00', 'liderar a ambu', 'ser jounin', 'ingles'),
(2, 2, 1, 'aadministrador', '', 'superior', 'R$: 5.455,55', 'testetestetestetestetstetsetstetsteste', 'ennjhjhghjghjgh', 'jhjhgjhsgdhjsghjds'),
(3, 3, 2, 'gerente', '', 'Superior', 'R$: 4.545,44', 'testeteste', 'resrerfvbjn', 'nenhum'),
(4, 3, 2, 'aadministrador', '', 'Superior', 'R$: 9.000,00', 'tesetestetetestettstetsttetstetstetettste', 'tetgkjhgkjgkjhgkhjgkjhghkjghjghjgkjgkj', 'hjghgkjhgkhgbkklkhbkvbkjhbvjvkjvjhvlhvlvkhjvljhbv');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `condominio`
--
ALTER TABLE `condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ecolaridade`
--
ALTER TABLE `ecolaridade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exp_profissional`
--
ALTER TABLE `exp_profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seguindo`
--
ALTER TABLE `seguindo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `solicitante_cond`
--
ALTER TABLE `solicitante_cond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `solicitante_condominio`
--
ALTER TABLE `solicitante_condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vagas_condominio`
--
ALTER TABLE `vagas_condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
