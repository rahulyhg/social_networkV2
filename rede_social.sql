-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2019 às 01:44
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rede_social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE `amigos` (
  `id` int(11) NOT NULL,
  `id_solicitante` int(11) NOT NULL,
  `id_solicitado` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `data_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `data_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `post`, `img`, `data_post`, `id_user`) VALUES
(14, 'dsadsada', 'dsdsad', '2019-05-29 22:14:07', 5),
(15, 'essa bola Ã© uma merda', 'https://abrilexame.files.wordpress.com/2016/09/size_960_16_9_jabulaniredonda-jpg.jpg', '2019-05-29 22:31:00', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `aniversario` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8_unicode_ci DEFAULT '-----',
  `jogador` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `email`, `senha`, `nome`, `sobrenome`, `foto`, `aniversario`, `sexo`, `estado`, `cidade`, `time`, `jogador`) VALUES
(5, 'arielnnogueira@hotmail', 'e10adc3949ba59abbe56e057f20f883e', 'Ariel', 'Nogueira', 'https://static.giantbomb.com/uploads/scale_small/2/27436/2722697-gon_freecss_2617.jpg', '1998-04-22', 'Masculino', 'Bahia', '', 'E.C Bahia', 'Ronaldinho Gaucho'),
(6, 'bolado@hotmail.com', 'c5fe25896e49ddfe996db7508cf00534', 'isaac', 'andrade', 'https://vignette.wikia.nocookie.net/bleach/images/1/1c/Bleach-kon-triste.jpg/revision/latest?cb=20120529234348&path-prefix=pt', '2006-05-09', 'Masculino', 'Bahia', '', 'ibis', 'jorjao'),
(7, 'arielnnogueira@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ariel', 'rocha', 'https://www.anime-planet.com/images/characters/gon-freecss-2617.jpg?t=1365964476', '1998-04-22', 'Masculino', 'Bahia', '', 'Bahia', 'Zico'),
(8, 'teste@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teste', 'Teste', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/20180602_FIFA_Friendly_Match_Austria_vs._Germany_Manuel_Neuer_850_0723.jpg/260px-20180602_FIFA_Friendly_Match_Austria_vs._Germany_Manuel_Neuer_850_0723.jpg', '1998-04-22', 'Masculino', 'Bahia', 'Salvaodr', 'Ibes', 'Neuer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `cod_post` (`id_post`),
  ADD KEY `cod_user` (`id_user`);

--
-- Indexes for table `curtida`
--
ALTER TABLE `curtida`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_user` (`id_user`,`id_post`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curtida`
--
ALTER TABLE `curtida`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `postagem` (`id_post`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Limitadores para a tabela `curtida`
--
ALTER TABLE `curtida`
  ADD CONSTRAINT `curtida_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `postagem` (`id_post`),
  ADD CONSTRAINT `curtida_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
