-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Out-2018 às 19:39
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `league_of_languages`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `cod_admin` int(11) NOT NULL,
  `cod_login` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(90) NOT NULL,
  `rg` int(50) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `celular` int(11) NOT NULL,
  `data_nascimento` varchar(233) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(42, 568, 572, 'OI lindo\ngostaria de aprender com o senhor ', '2018-10-27 13:41:08', 1),
(43, 570, 573, 'OlÃ¡, gostaria de comeÃ§ar o curso de Russo no periodo da tarde', '2018-10-27 14:05:47', 1),
(44, 570, 573, 'Aguardo chamada no email', '2018-10-27 14:05:58', 1),
(45, 568, 574, 'OlÃ¡', '2018-10-27 14:26:29', 0),
(46, 573, 568, 'oi\n', '2018-10-27 14:40:29', 1),
(47, 569, 575, 'oi, seu puto', '2018-10-27 14:42:53', 0),
(48, 569, 575, 'quero fazer aula de linguas com vocÃª ', '2018-10-27 14:43:25', 0),
(49, 569, 575, 'quero fazer aula de linguas com vocÃª ', '2018-10-27 14:43:30', 0),
(50, 568, 576, 'Oi professor. Gostaria de fazer sua aula.', '2018-10-27 15:05:20', 0),
(51, 568, 576, 'aguardo resposta email', '2018-10-27 15:05:32', 0),
(52, 569, 577, 'OlÃ¡ professor, gostaria de iniciar um curso de alemÃ£o', '2018-10-27 15:19:14', 0),
(53, 569, 577, 'aguardo resposta no email', '2018-10-27 15:19:21', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `cod_login` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `rg` int(50) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `complemento` varchar(90) NOT NULL,
  `sobrenome` varchar(90) NOT NULL,
  `numero` varchar(90) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `data_nascimento` varchar(200) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `cod_login`, `nome`, `rg`, `cpf`, `email`, `rua`, `estado`, `cep`, `cidade`, `telefone`, `bairro`, `complemento`, `sobrenome`, `numero`, `celular`, `data_nascimento`, `imagem`) VALUES
(39, 571, 'Tabatha', 572649460, '24824824885', 'tabacesa@gmail.com', 'Rua DivinÃ³polis', 'SP', 12233210, 'SÃ£o JosÃ© dos Campos', '1234312279', 'Bosque dos Eucaliptos', 'Casa', 'Romanini', '218', '12988646895', '21/11/2004', 'fotos_usuarios/5c2abfc606abdaef6933aee3a5947812.png'),
(40, 572, 'Gabriel', 500425012, '49504166857', 'furyblack001@gmail.com', 'leticia', 'sp', 12230840, 'SÃ£o JosÃ© dos Campos', '1231241231', 'satelite', '', 'Cavalcante', '171', '11940858540', '04/03/2001', 'fotos_usuarios/90a20ed31a2cb101efa03babcb1da985.png'),
(41, 573, 'Aisla ', 823712381, '33333333333', 'aislacriayin@gmail.com', 'Rua das ChÃ¡caras', 'SP', 12236080, 'SÃ£o JosÃ© dos Campos', '1239381722', 'Jardim Oriente', '7A', 'Cristina de Carvalho', '351', '12988716749', '23/12/2003', 'fotos_usuarios/305b15b63168cc395bf70f0912ef8c15.png'),
(42, 574, 'Jack', 223333333, '21846859840', 'jack@gmail.com', 'Rua Lira', 'SP', 12230600, 'SÃ£o JosÃ© dos Campos', '1239347070', 'Jardim SatÃ©lite', 'Casa', 'Jack', '900', '12993728712', '26/29/1980', 'fotos_usuarios/d060e3f26230210464481d44d4f401af.png'),
(43, 575, 'Clara', 396627080, '51941871810', 'claraespindola08@gmail.com', 'DivinÃ³polis', 'SP', 12233200, 'SÃ£o JosÃ© dos Campos', '1239584895', 'Bosque dos Eucaliptos', '', 'EspÃ­ndola', '218', '12981122399', '09/07/2002', 'fotos_usuarios/f5a5f593a59437e53d1ac484fc8cf90e.png'),
(44, 576, 'Nilsy Helena ', 929408940, '02613671882', 'nilsypsy@hotmail.com', 'Pedro Tursi', 'SP', 12230075, 'SÃ£o JosÃ© dos Campos', '1230298092', 'Jardim SatÃ©lite', '', 'Madeira', '200', '12981282014', '19/09/1961', 'fotos_usuarios/6ca293e2877ffed10cb44a92b5342832.png'),
(45, 577, 'Victor Mateus', 250123812, '99999999999', 'victormateus@gmail.com', 'Nagano', 'SP', 12230600, 'SÃ£o JosÃ© dos Campos', '1299108457', 'Jardim Oriente', 'Casa', 'Carvalho', '900', '1299455244', '04/04/2001', 'fotos_usuarios/59193c717b4a6e4b52438965f86c1ac6.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  `tempo_curso` varchar(50) NOT NULL,
  `nivel` varchar(200) NOT NULL,
  `cod_professor` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cobranca` varchar(200) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `definicao` varchar(50) NOT NULL,
  `nome_completo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cod_curso`, `preco`, `disciplina`, `tempo_curso`, `nivel`, `cod_professor`, `cod_cliente`, `cobranca`, `periodo`, `definicao`, `nome_completo`) VALUES
(74, 'De R$ 1000 a R$ 2000', 'InglÃªs', '1', 'BÃ¡sico I', 4, 0, 'A combinar', 'Noite', 'Professor', 'Fabiana Caldeiran'),
(79, 'De 1000 a 2000 R$', 'AlemÃ£o', '2', 'Iniciante', 6, 0, 'A combinar', 'Tarde', 'Professor', 'Johann Romanini'),
(80, 'De 300 a 800 R$', 'Italiano', '3', 'IntermediÃ¡rio', 5, 0, 'PreÃ§o Fixo', 'Noite', 'Professor', 'Guilherme Madeira'),
(81, '', 'Russo ', '2', 'BÃ¡sico I', 0, 40, '', 'Noite', 'Aluno', 'Gabriel Cavalcante Serafim'),
(82, 'De R$ 1000 a R$ 2000', 'Russo', '3', 'AvanÃ§ado', 7, 0, 'PreÃ§o Fixo', 'ManhÃ£', 'Professor', 'Victor Hugo MagalhÃ£es'),
(83, '', 'Russo ', '2', 'BÃ¡sico II', 0, 41, '', 'Noite', 'Aluno', 'Aisla Cristina de Carvalho'),
(84, '', 'Italiano ', '1', 'IntermediÃ¡rio I', 0, 42, '', 'Noite', 'Aluno', 'Jack'),
(85, '', 'InglÃªs', '1', 'IntermediÃ¡rio II', 0, 43, '', 'Tarde', 'Aluno', 'Clara Carolina EspÃ­ndola'),
(86, '', 'Italiano ', '1', 'IntermediÃ¡rio I', 0, 44, '', 'Noite', 'Aluno', 'Nilsy Helena'),
(87, '', 'FrancÃªs', '2', 'BÃ¡sico I', 0, 45, '', 'Tarde', 'Aluno', 'Victor Mateus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `login` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `privilegio` int(11) NOT NULL,
  `cod_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`login`, `senha`, `privilegio`, `cod_login`) VALUES
('Fabiana', '123123', 1, 556),
('Madeira', 'zedriven7', 1, 568),
('johann', 'coco222', 1, 569),
('vmagalhaes', 'teste123', 1, 570),
('Tabatha', 'romacre2', 0, 571),
('FuryMaozinhaGameplays', 'queropote', 0, 572),
('aislacarvalho', 'aala2312', 0, 573),
('jackjack', '123456', 0, 574),
('Clara ', 'wendys2', 0, 575),
('nhqm77', 'nilsyhqm', 0, 576),
('victormatheus', '123456', 0, 577);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `cod_professor` int(11) NOT NULL,
  `cod_login` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `complemento` varchar(90) NOT NULL,
  `sobrenome` varchar(90) NOT NULL,
  `numero` varchar(90) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `data_nascimento` varchar(200) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `especializacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cod_professor`, `cod_login`, `nome`, `rg`, `cpf`, `email`, `rua`, `estado`, `cep`, `cidade`, `telefone`, `bairro`, `complemento`, `sobrenome`, `numero`, `celular`, `data_nascimento`, `imagem`, `especializacao`) VALUES
(4, 556, 'Fabiana', 222222223, '22222222222', 'fcalderandomingues@gmail.com', 'Nagano', 'SP', 12230600, 'SÃ£o JosÃ© dos Campos', '1239238372', 'Jardim Oriente', 'Casa', 'Caldeiran', '159', '12988032540', '12/31/2312', 'fotos_usuarios/732cd78e689e12f650d45bf68b61c4d3.jpg', 'InglÃªs'),
(5, 568, 'Guilherme', 525207697, '49985172876', 'guilhermemadeirasteam@gmail.com', 'Rua das ChÃ¡caras', 'SP', 12236080, 'SÃ£o JosÃ© dos Campos', '1239378109', 'Jardim Oriente', '7A', 'Madeira da Silveira', '351', '12997473744', '23/10/2001', 'fotos_usuarios/d99a1fef328032f100c07901333f2369.jpg', 'Italiano'),
(6, 569, 'Johann', 391952420, '51202455875', 'seasukegamer@gmail.com', 'Rua DivinÃ³polis', 'SP', 12233200, 'SÃ£o JosÃ© dos Campos', '1239571927', 'Bosque dos Eucaliptos', 'Casa', 'Romanini', '218', '12988547579', '01/06/2001', 'fotos_usuarios/42d0c3cb2dab2b815df12bab9f035f22.jpg', 'AlemÃ£o'),
(7, 570, 'Victor', 111111112, '55555555555', 'victorjunho798@gmail.com', 'rua pedro nunes de sousa', 'SP', 12236067, 'SÃ£o JosÃ© dos Campos', '1239362905', 'Terras do Sul', 'apt 12', 'magalhaes', '169', '12981400141', '18/02/1982', 'fotos_usuarios/95044b38c4e096649cc6ca14e5fca65e.jpg', 'Russo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`cod_admin`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cod_login`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod_professor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `cod_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cod_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `cod_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
