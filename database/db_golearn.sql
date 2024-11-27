-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2024 às 09:28
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
-- Banco de dados: `db_golearn`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome_arquivo` varchar(255) DEFAULT NULL,
  `caminho_arquivo` varchar(255) DEFAULT NULL,
  `tipo_arquivo` varchar(50) NOT NULL,
  `tamanho_arquivo` bigint(20) DEFAULT NULL,
  `enviado_por` int(11) DEFAULT NULL,
  `data_envio` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome_arquivo`, `caminho_arquivo`, `tipo_arquivo`, `tamanho_arquivo`, `enviado_por`, `data_envio`) VALUES
(1, '7. Grafos.pdf', 'uploads/6740cc38ab451_7. Grafos.pdf', 'application/pdf', 2840724, 2, '2024-11-22 18:23:52'),
(2, '7. Grafos.pdf', 'uploads/6740cc3972287_7. Grafos.pdf', 'application/pdf', 2840724, 2, '2024-11-22 18:23:53'),
(3, '7. Grafos.pdf', 'uploads/6740cc71ace1b_7. Grafos.pdf', 'application/pdf', 2840724, 2, '2024-11-22 18:24:49'),
(4, '7. Grafos.pdf', 'uploads/6740e7676026e_7. Grafos.pdf', 'application/pdf', 2840724, 2, '2024-11-22 20:19:51'),
(5, '7. Grafos.pdf', 'uploads/6743e3c08f95e_7. Grafos.pdf', 'application/pdf', 2840724, 2, '2024-11-25 02:41:04'),
(6, '7. Grafos.pdf', 'uploads/6743e70ec2822_7. Grafos.pdf', 'application/pdf', 2840724, 2, '2024-11-25 02:55:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `playlists`
--

INSERT INTO `playlists` (`id`, `titulo`, `descricao`, `id_usuario`, `criado_em`) VALUES
(1, 'dsdasd', 'saddad', 2, '2024-11-21 20:54:11'),
(2, 'oi', 'oi', 2, '2024-11-22 02:12:32'),
(3, 'adasdasd', 'dsad', 2, '2024-11-23 14:59:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `playlist_videos`
--

CREATE TABLE `playlist_videos` (
  `id` int(11) NOT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  `adicionado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nivel_acesso` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha`, `nivel_acesso`) VALUES
(1, 'Junio de Matos Oliveira', 'junio.ol237@gmail.com', '14981048953', '$2y$10$/IszCxiDMitTB9iZbTYYoO5bS0bXyG3jEhtgfoa4vCwFmrpKwiVea', 1),
(2, 'Junio de Matos Oliveira', 'juniom008@gmail.com', '14981048953', '$2y$10$bQUBYOisbYONKtlWsoAc4.G/w3N4lb6DGTJ8jKWL2Eur.rsGz93Dq', 2),
(3, 'Junio de Matos Oliveira', 'junio237@hotmail.com', '14981048953', '$2y$10$4qcmd3XsApoPejnaSwSZu.0X8T.S78qA6USks8d49mh5Ry04oh/7S', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `videoaulas`
--

CREATE TABLE `videoaulas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `videoaulas`
--

INSERT INTO `videoaulas` (`id`, `titulo`, `caminho`, `id_usuario`, `criado_em`) VALUES
(1, 'asdasadasd', '../uploads/673f96a8d7193_videoplayback.mp4', 2, '2024-11-21 20:23:04'),
(2, 'oi', '../uploads/6741ecb3ce20e_Aprenda HTML em apenas 5 MINUTOS (2023) (1).mp4', 2, '2024-11-23 14:54:43');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enviado_por` (`enviado_por`);

--
-- Índices de tabela `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `playlist_videos`
--
ALTER TABLE `playlist_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_playlist` (`id_playlist`),
  ADD KEY `id_video` (`id_video`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `videoaulas`
--
ALTER TABLE `videoaulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `playlist_videos`
--
ALTER TABLE `playlist_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `videoaulas`
--
ALTER TABLE `videoaulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`enviado_por`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `playlist_videos`
--
ALTER TABLE `playlist_videos`
  ADD CONSTRAINT `playlist_videos_ibfk_1` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_videos_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `videoaulas` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `videoaulas`
--
ALTER TABLE `videoaulas`
  ADD CONSTRAINT `videoaulas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
