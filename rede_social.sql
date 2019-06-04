-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jun-2019 às 17:05
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
  `id_de` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
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

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_post`, `id_user`, `comentario`, `data_comentario`) VALUES
(1, 11, 9, 'teste', '2019-06-04 14:34:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `valor_curtida` int(11) NOT NULL
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
(7, 'KKK', '', '2019-06-01 23:55:28', 8),
(9, 'Meu ovo', '', '2019-06-02 02:11:05', 7),
(11, 'asasasas', 'https://conteudo.imguol.com.br/c/esporte/83/2019/03/22/diego-souza-tem-inicio-de-trajetoria-no-botafogo-com-gol-e-assistencia-1553224821181_v2_900x506.jpg', '2019-06-04 14:34:25', 9);

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
(8, 'boladation@hotmail.com', 'ac259718edbad69a59659193fbdc3956', 'BoladÃ£o', 'da Torre', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Chuck_Norris_May_2015.jpg/200px-Chuck_Norris_May_2015.jpg', '2003-05-25', 'Masculino', 'Bahia', 'Salvador Brotas', 'Buara', 'Isaias'),
(9, 'mdahoralive@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Marcelo', 'da Hora', 'https://johnbfr.files.wordpress.com/2011/06/carol-marques-furia-jovem-do-botafogo-fjb-2011-rj-1.png', '1996-03-19', 'Masculino', 'Bahia', 'Salvador', 'Botafogo', 'Cristiano Ronaldo');

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `id_user_2` (`id_user`),
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
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `curtida`
--
ALTER TABLE `curtida`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
