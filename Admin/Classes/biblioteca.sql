-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2023 às 17:14
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `acesso` int(11) NOT NULL,
  `quem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `mes`, `ano`, `acesso`, `quem`) VALUES
(1, 'May', '2023', 8, ''),
(7, 'June', '2023', 17, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passe` text NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `passe`, `codigo`) VALUES
(1, 'Caetano Borges', 'cbcaetanoborges@gmail.com', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `quando` varchar(255) NOT NULL,
  `audio` text NOT NULL,
  `acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `audio`
--

INSERT INTO `audio` (`id`, `titulo`, `categoria`, `autor`, `descricao`, `quando`, `audio`, `acesso`) VALUES
(1, 'Titulo', '1', 'Autor', 'Detlaghg', '1681385374', '168363276502 Christmas Time Is Here.mp3', 19),
(2, 'tyrtytry', '1', 'trytrytry', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1681385385', '1681385385Factura Organizações Amaral Ribeiro lda.pdf', 9),
(3, 'tyrtytry', '1', 'trytrytry', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1681385464', '1681385463122471_00_01_WL301_welcome.mp4', 110),
(4, 'tyrtytry', '1', 'trytrytry', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1681385764', '1681385764122471_00_01_WL301_welcome.mp4', 30),
(5, 'Super titulo', '1', 'autor', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1683633485', '168363348511 Ave Maria.mp3', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'CAETANO BORGES ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `quando` varchar(255) NOT NULL,
  `capa` text NOT NULL,
  `pdf` text NOT NULL,
  `acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `categoria`, `autor`, `descricao`, `quando`, `capa`, `pdf`, `acesso`) VALUES
(1, 'Titulo', '1', 'autor', 'Descrição', '1681385242', '1683025429WhatsApp Image 2023-04-28 at 13.36.59.jpeg', '1683027402pedido de visto.pdf', 14),
(2, 'tyrtytry', '1', 'gtry rty rty', 'derevteryery tyubtru ru yu tyuiny uityui tyi', '1681385819', '1681385819girl.png', '1681385819(ADMIN)SimpleComerce-DBClassDiagram.drawio (1).pdf', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_audio`
--

CREATE TABLE `log_audio` (
  `id` int(11) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL,
  `quando` varchar(255) NOT NULL,
  `quem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_audio`
--

INSERT INTO `log_audio` (`id`, `audio`, `pagina`, `quando`, `quem`) VALUES
(1, '1', '0', '1685717938', 'hj9R-6172'),
(2, '1', '0', '1685717943', 'hj9R-6172'),
(3, '1', '0', '1685718815', 'hj9R-6172');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_livro`
--

CREATE TABLE `log_livro` (
  `id` int(11) NOT NULL,
  `livro` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL,
  `quando` varchar(255) NOT NULL,
  `quem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_livro`
--

INSERT INTO `log_livro` (`id`, `livro`, `pagina`, `quando`, `quem`) VALUES
(1, '1', '0', '1685717677', 'hj9R-6172'),
(2, '1', '0', '1685717683', 'hj9R-6172');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_passe`
--

CREATE TABLE `log_passe` (
  `id` int(11) NOT NULL,
  `momento` varchar(255) NOT NULL,
  `passe` text NOT NULL,
  `quem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_passe`
--

INSERT INTO `log_passe` (`id`, `momento`, `passe`, `quem`) VALUES
(1, '1682337452', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'hj9R-6172'),
(2, '1682337509', '1234567', 'hj9R-6172');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_sessao`
--

CREATE TABLE `log_sessao` (
  `id` int(11) NOT NULL,
  `acao` varchar(255) NOT NULL,
  `momento` varchar(255) NOT NULL,
  `quem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_sessao`
--

INSERT INTO `log_sessao` (`id`, `acao`, `momento`, `quem`) VALUES
(1, 'Iniciou sessão', '1681384062', '1'),
(2, 'Adicionou categoria CAETANO BORGES WAMBEMBE', '1681385208', '1'),
(3, 'Adicionou Livro tyrtytry', '1681385242', '1'),
(4, 'Adicionou Video tyrtytry', '1681385374', '1'),
(5, 'Adicionou Video tyrtytry', '1681385385', '1'),
(6, 'Adicionou Video tyrtytry', '1681385464', '1'),
(7, 'Adicionou Video tyrtytry', '1681385764', '1'),
(8, 'Adicionou usuário hj9R-6172', '1681385787', '1'),
(9, 'Adicionou Livro tyrtytry', '1681385819', '1'),
(10, 'Iniciou sessão', '1682323861', '1'),
(11, 'Iniciou sessão', '1683017232', '1'),
(12, 'Alterou o Video ', '1683035547', '1'),
(13, 'Alterou o Video ', '1683035821', '1'),
(14, 'Alterou o Video ', '1683035938', '1'),
(15, 'Iniciou sessão', '1683105717', '1'),
(16, 'Iniciou sessão', '1683189129', '1'),
(17, 'Iniciou sessão', '1683189498', 'hj9R-6172'),
(18, 'Iniciou sessão', '1683274421', 'hj9R-6172'),
(19, 'Iniciou sessão', '1683278540', 'hj9R-6172'),
(20, 'Iniciou sessão', '1683294364', 'hj9R-6172'),
(21, 'Iniciou sessão', '1683534260', 'hj9R-6172'),
(22, 'Iniciou sessão', '1683539888', 'hj9R-6172'),
(23, 'Iniciou sessão', '1683549075', 'hj9R-6172'),
(24, 'Iniciou sessão', '1683549309', 'hj9R-6172'),
(25, 'Iniciou sessão', '1683627494', '1'),
(26, 'Alterou o Audio ', '1683632765', '1'),
(27, 'Adicionou Audio Super titulo', '1683633485', '1'),
(28, 'Iniciou sessão', '1683707195', '1'),
(29, 'Iniciou sessão', '1683719489', 'hj9R-6172'),
(30, 'Iniciou sessão', '1683794720', 'hj9R-6172'),
(31, 'Iniciou sessão', '1684139574', 'hj9R-6172'),
(32, 'Iniciou sessão', '1684141362', '1'),
(33, 'Adicionou Video OUTRO', '1684147426', '1'),
(34, 'Iniciou sessão', '1684744526', 'hj9R-6172'),
(35, 'Iniciou sessão', '1685349002', 'hj9R-6172'),
(36, 'Iniciou sessão', '1685355378', 'hj9R-6172'),
(37, 'Iniciou sessão', '1685360649', '1'),
(38, 'Iniciou sessão', '1685608354', 'hj9R-6172'),
(39, 'Iniciou sessão', '1685609059', '1'),
(40, 'Iniciou sessão', '1685695272', '1'),
(41, 'Iniciou sessão', '1685705694', 'hj9R-6172'),
(42, 'Iniciou sessão', '1685717235', 'hj9R-6172'),
(43, 'Iniciou sessão', '1685717741', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_video`
--

CREATE TABLE `log_video` (
  `id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL,
  `quando` varchar(255) NOT NULL,
  `quem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_video`
--

INSERT INTO `log_video` (`id`, `video`, `pagina`, `quando`, `quem`) VALUES
(1, '1', '0', '1685717947', 'hj9R-6172'),
(2, '1', '0', '1685718604', 'hj9R-6172'),
(3, '1', '0', '1685718619', 'hj9R-6172'),
(4, '1', '0', '1685718663', 'hj9R-6172'),
(5, '1', '0', '1685718686', 'hj9R-6172'),
(6, '1', '0', '1685718715', 'hj9R-6172'),
(7, '1', '0', '1685718774', 'hj9R-6172');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `identificador` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nascimento` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`identificador`, `nome`, `nascimento`, `telefone`, `email`, `passe`) VALUES
('hj9R-6172', 'CAETANO BORGES WAMBEMBE', '2023-04-14', '925560797', 'cbcaetanoborges@gmail.com', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `quando` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `titulo`, `categoria`, `autor`, `descricao`, `quando`, `video`, `acesso`) VALUES
(1, 'Titulo', '1', 'Autor', 'Detlaghg', '1681385374', '1683035938y2mate.com - Como transmitir rádio web com os programas Zara Rádio mais RadioCaster_480p.mp4', 26),
(2, 'tyrtytry', '1', 'trytrytry', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1681385385', '1681385385Factura Organizações Amaral Ribeiro lda.pdf', 8),
(3, 'tyrtytry', '1', 'trytrytry', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1681385464', '1681385463122471_00_01_WL301_welcome.mp4', 2),
(4, 'tyrtytry', '1', 'trytrytry', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1681385764', '1681385764122471_00_01_WL301_welcome.mp4', 9),
(5, 'OUTRO', '1', 'autor', 'uygeyufg yuryuguyuyre uturey\r\n                    e rjterj tgeriutg uiergt euirgtueirg tueirt ie guiert ergt uiegtuie grutig eruiuirgtu iegtu ietuiegtuiegriugerui geuirt \r\n                    e riutgheriueuirteuirtiue gtuieguiegtuie uieg iueui eiru g iuer ieurg', '1684147425', '1684147425Build Restful CRUD API with Node.js, Express and MongoDB in 45 minutes for Beginners from Scratch.mp4', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_audio`
--
ALTER TABLE `log_audio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_livro`
--
ALTER TABLE `log_livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_passe`
--
ALTER TABLE `log_passe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_sessao`
--
ALTER TABLE `log_sessao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_video`
--
ALTER TABLE `log_video`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `identificador` (`identificador`);

--
-- Índices para tabela `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `log_audio`
--
ALTER TABLE `log_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `log_livro`
--
ALTER TABLE `log_livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `log_passe`
--
ALTER TABLE `log_passe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `log_sessao`
--
ALTER TABLE `log_sessao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `log_video`
--
ALTER TABLE `log_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
