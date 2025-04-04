-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 04/04/2025 às 17:22
-- Versão do servidor: 5.7.44
-- Versão do PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `images` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `slug`, `author`, `images`, `created_at`, `updated_at`) VALUES
(1, 'My First Post', 'A brief description of the publish...', 'This is the full content of the post.', 'my-first-post', 'natanrdev', '{\"name\": [\"\"], \"size\": [0], \"type\": [\"\"], \"error\": [4], \"tmp_name\": [\"\"], \"full_path\": [\"\"]}', '2025-02-12 18:29:49', '2025-03-11 19:57:46'),
(2, 'World of Programming', 'Lorem ipsum', 'content goes here...', 'world-of-programming', 'joaosilvia123', '{\"name\": [\"\"], \"size\": [0], \"type\": [\"\"], \"error\": [4], \"tmp_name\": [\"\"], \"full_path\": [\"\"]}', '2025-02-20 18:29:49', '2025-03-11 20:16:59'),
(3, 'Title article', 'description test', 'content lorem pisum', 'title-article', 'lucas', '{\"name\": [\"\"], \"size\": [0], \"type\": [\"\"], \"error\": [4], \"tmp_name\": [\"\"], \"full_path\": [\"\"]}', '2025-02-21 18:29:49', '2025-03-11 20:22:54'),
(8, 'daily routine', 'a dev daily routine', 'lorem ipsum daily dev routine...', 'daily-routine', 'natanrdev', '{\"name\": [\"\"], \"size\": [0], \"type\": [\"\"], \"error\": [4], \"tmp_name\": [\"\"], \"full_path\": [\"\"]}', '2025-03-07 17:27:04', '2025-03-11 20:21:20'),
(9, 'hello test post', 'teste hello world', 'lorem world', 'hello-test', 'marceloturbo', '{\"name\": [\"\"], \"size\": [0], \"type\": [\"\"], \"error\": [4], \"tmp_name\": [\"\"], \"full_path\": [\"\"]}', '2025-03-25 20:34:17', '2025-03-25 20:34:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg',
  `birthday` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` enum('admin','editor','author') NOT NULL DEFAULT 'author'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `avatar`, `birthday`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Natan Ribeiro', 'natanrdev', 'natan@email.com', '55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251', 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg', '1997-12-22', '2025-02-12 18:28:57', '2025-03-28 20:53:59', 'admin'),
(2, 'Joï¿½o Silvia 9', 'joaosilvia123', 'joaosilvia@email.com', '55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251', 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg', '2000-12-22', '2025-02-12 23:28:57', '2025-03-31 17:43:43', 'author'),
(3, 'Lucas 2', 'lucas', 'lucas2@gmail.com', '55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251', 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg', '2000-07-05', '2025-02-21 23:28:57', '2025-03-24 17:19:39', 'editor'),
(4, 'Ricardo Lopez', 'ricardo', 'ricardo123@gmail.com', '55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251', 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg', '1995-05-12', '2025-03-06 17:47:18', '2025-03-10 14:39:52', 'admin'),
(5, 'Marcelo Silveira', 'marceloturbo', 'marceloturbo@mail.com', '55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251', 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg', '1987-01-11', '2025-03-25 20:33:37', '2025-03-25 20:33:37', 'editor');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author` (`author`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
