-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2021 às 22:29
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `invasaosocialnetwork`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `coment_invs`
--

CREATE TABLE `coment_invs` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `autor_coment` varchar(255) NOT NULL,
  `data_coment` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `coment_invs`
--

INSERT INTO `coment_invs` (`com_id`, `post_id`, `usuario_id`, `comentario`, `autor_coment`, `data_coment`) VALUES
(1, 1, 161, 'teste', 'teste teste', '2021-04-29 20:51:38'),
(2, 1, 161, 'Testando', 'teste teste', '2021-04-29 20:54:41'),
(3, 2, 161, 'Teste completado com sucesso.', 'teste teste', '2021-04-29 20:56:45'),
(4, 3, 161, 'Teste realizado com sucesso', 'teste teste', '2021-04-29 20:57:11'),
(5, 5, 161, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 'teste teste', '2021-04-29 20:59:55'),
(6, 1, 161, 'teste', 'Michael Santos', '2021-05-15 14:18:12'),
(7, 1, 161, 'teste', 'Michael Santos', '2021-05-15 15:57:18'),
(8, 2, 161, 'teste', 'Michael Santos', '2021-05-15 16:01:58'),
(9, 5, 161, 'reprehenderit in voluptate velit esse cill', 'Michael Santos', '2021-05-15 16:02:41'),
(10, 9, 161, 'Atualizado', 'Michael Santos', '2021-05-15 16:04:58'),
(11, 1, 161, 'lorem ipsum', 'Michael Santos', '2021-05-17 16:34:16'),
(12, 5, 161, 'é impsu valouptate velit cill estehmo', 'Michael Santos', '2021-05-17 16:55:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_amizade`
--

CREATE TABLE `pedidos_amizade` (
  `requestId` int(11) NOT NULL,
  `req_from_id` int(11) NOT NULL,
  `req_to_id` int(11) NOT NULL,
  `status_req` enum('Pedido Enviado','Aceito','Rejeitado') NOT NULL,
  `req_noti_st` enum('Sim','Nao') NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos_amizade`
--

INSERT INTO `pedidos_amizade` (`requestId`, `req_from_id`, `req_to_id`, `status_req`, `req_noti_st`, `req_date`) VALUES
(1, 161, 21, 'Pedido Enviado', 'Nao', '2021-05-13 17:20:10'),
(3, 161, 21, 'Pedido Enviado', 'Nao', '2021-05-13 23:09:31'),
(4, 161, 27, 'Pedido Enviado', 'Nao', '2021-05-13 23:29:37'),
(5, 168, 161, 'Aceito', 'Sim', '2021-05-14 17:59:30'),
(6, 169, 161, 'Aceito', 'Sim', '2021-05-14 17:59:44'),
(7, 161, 69, 'Pedido Enviado', 'Nao', '2021-05-16 01:12:36'),
(8, 161, 81, 'Pedido Enviado', 'Nao', '2021-05-16 01:12:59'),
(9, 171, 161, 'Pedido Enviado', 'Sim', '2021-05-17 18:13:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `timelinef`
--

CREATE TABLE `timelinef` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `sobrenome` varchar(15) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `timepb` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `timelinef`
--

INSERT INTO `timelinef` (`id`, `id_usuario`, `nome`, `sobrenome`, `titulo`, `descricao`, `timepb`) VALUES
(1, 161, 'Luiz', 'Teste', '', 'TESTE', '2021-03-22 21:23:40'),
(2, 167, 'Luiz', 'Teste', '', 'Testando 123 123 o que acham?', '2021-03-22 22:34:34'),
(3, 167, 'Luiz', 'Teste', '', 'é isso cara', '2021-03-22 22:38:44'),
(4, 161, 'teste', 'teste', '', 'NÃO', '2021-03-23 20:50:26'),
(5, 161, 'teste', 'teste', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', '2021-03-23 21:01:53'),
(8, 161, 'teste', 'teste', '', 'teste', '2021-04-17 22:04:12'),
(9, 161, 'teste', 'teste', '', 'Testando publicação , atualizada.', '2021-04-29 18:30:40'),
(10, 168, 'teste', 'teste', '', 'valar dohaeris valar morghulis', '2021-05-16 19:25:38'),
(11, 161, 'Michael', 'Santos', '', 'Teste Teste', '2021-05-17 09:55:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usr_invs`
--

CREATE TABLE `usr_invs` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `log_usr` tinyint(1) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `sobrenome` varchar(25) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usr_invs`
--

INSERT INTO `usr_invs` (`id`, `nome`, `sexo`, `email`, `senha`, `log_usr`, `create_date`, `sobrenome`, `data_nasc`) VALUES
(11, 'Luiz', 'Masculino', 'luiz@teste.com.br', '378e3bcd0c3621eec41110f41fbc3c0e', 0, '2021-02-19 15:42:02', 'Miguel', '0000-00-00'),
(17, 'Raph', 'Masculino', 'raphud@hotmail.com', 'ff556e50f601503a606f6c43d1574c2c', 0, '2021-02-19 16:25:07', 'Ellark', '0000-00-00'),
(18, 'Kodak', 'Masculino', 'Kodakfernkd@hotmail.com', 'ff556e50f601503a606f6c43d1574c2c', 0, '2021-02-19 16:25:34', 'Kraul', '0000-00-00'),
(19, 'Kodak', 'Masculino', 'Kodakfernkd@hotmail.com', 'ff556e50f601503a606f6c43d1574c2c', 0, '2021-02-19 16:26:04', 'Kraul', '0000-00-00'),
(20, 'testanmdo', 'Masculino', 'kodaktedas@kotmail.com', '378e3bcd0c3621eec41110f41fbc3c0e', 0, '2021-02-19 16:26:33', 'marlakd', '0000-00-00'),
(21, 'teste', 'Masculino', 'testew@hotmail.com', 'ff556e50f601503a606f6c43d1574c2c', 0, '2021-02-19 16:27:09', 'teste', '0000-00-00'),
(27, 'teste', 'Masculino', 'teste@testandojava.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-21 09:29:14', 'teste', '0000-00-00'),
(35, 'teste', 'Masculino', '93a4e6992adaaba201c34a198019661f', '', 0, '2021-02-21 10:14:14', 'teste', '0000-00-00'),
(36, 'teste', 'Masculino', '93a4e6992adaaba201c34a198019661f', '', 0, '2021-02-21 10:15:17', 'teste', '0000-00-00'),
(37, 'teste', 'Masculino', '93a4e6992adaaba201c34a198019661f', '', 0, '2021-02-21 10:17:29', 'teste', '0000-00-00'),
(38, 'teste', 'Masculino', '93a4e6992adaaba201c34a198019661f', '', 0, '2021-02-21 10:19:03', 'teste', '0000-00-00'),
(39, 'teste', 'Masculino', '93a4e6992adaaba201c34a198019661f', '', 0, '2021-02-21 10:26:50', 'teste', '0000-00-00'),
(40, 'teste', 'Masculino', '93a4e6992adaaba201c34a198019661f', '', 0, '2021-02-21 10:29:09', 'teste', '0000-00-00'),
(58, 'teste', 'Masculino', 'teste123124321@teste.com.br', 'eaccbaefc8581ae9408a6b9993d59a9d', 0, '2021-02-23 14:52:38', 'teste', '0000-00-00'),
(59, 'teste', 'Masculino', 'teste', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 14:54:13', 'teste', '0000-00-00'),
(60, 'teste', 'Masculino', 'teste', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 14:57:18', 'teste', '0000-00-00'),
(61, 'teste', 'Masculino', 'teste222@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 15:00:50', 'teste', '0000-00-00'),
(62, 'teste', 'Masculino', 'teste', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 15:01:00', 'teste', '0000-00-00'),
(64, 'teste', 'Masculino', 'teste@testando.com', 'fb7fe727a0a6dcfb65a5d21c322a6c11', 0, '2021-02-23 16:03:00', 'teste', '0000-00-00'),
(68, 'teste', 'Masculino', 'teste@tedkaljfasdkljfsa.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 16:12:08', 'sdfçjalk', '0000-00-00'),
(69, 'teste', 'Masculino', 'testeteste@mail.com', '56d36dac3a542fee1cc2af8b017ff58f', 0, '2021-02-23 16:13:41', 'teste', '0000-00-00'),
(70, 'teste', 'Masculino', 'testeteste@mail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 16:15:02', 'teste', '0000-00-00'),
(71, 'teste', 'Feminino', 'teste@testsdafdasfasdfasfe.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-02-23 16:19:19', 'teste', '0000-00-00'),
(73, 'teste', 'Masculino', 'testekaiak@testandotestando.com', 'd7341f1bdee9280a60fdb14e54c105ba', 0, '2021-02-23 16:22:44', 'teste', '0000-00-00'),
(80, 'teste', 'Masculino', 'teste@testecrianda.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-04 15:31:01', 'teste', '0000-00-00'),
(81, 'teste', 'Masculino', 'teste@testenadsoasd.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-04 16:17:02', 'teste', '0000-00-00'),
(83, 'Teste 1', 'Masculino', 'teste@teste.com', '378e3bcd0c3621eec41110f41fbc3c0e', 0, '2021-03-04 16:22:35', '2', '0000-00-00'),
(84, 'teste', 'Masculino', 'teste@teste.com', '378e3bcd0c3621eec41110f41fbc3c0e', 0, '2021-03-04 16:23:33', 'teste', '0000-00-00'),
(85, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-04 16:25:07', 'teste', '0000-00-00'),
(86, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-04 16:26:19', 'teste', '0000-00-00'),
(87, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-04 16:26:35', 'teste', '0000-00-00'),
(88, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 11:49:40', 'teste', '0000-00-00'),
(89, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 11:50:37', 'teste', '0000-00-00'),
(90, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:49:54', 'teste', '0000-00-00'),
(91, 'te4ste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:51:15', 'teste', '0000-00-00'),
(92, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:51:33', 'teste', '0000-00-00'),
(93, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:52:03', 'teste', '0000-00-00'),
(94, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:52:37', 'teste', '0000-00-00'),
(95, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:55:28', 'teste', '0000-00-00'),
(96, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:56:09', 'teste', '0000-00-00'),
(97, 'TESTE', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 12:56:25', 'TESTE', '0000-00-00'),
(98, 'teste', 'Masculino', 'gjfgjgf@uyttvjhngfjhe.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 13:02:27', 't4este', '0000-00-00'),
(99, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 13:03:11', 'teste', '0000-00-00'),
(100, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 13:03:59', 'teste', '0000-00-00'),
(101, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 13:04:35', 'te4ste', '0000-00-00'),
(102, 'teste', 'Masculino', 'teste@teste.com', '412ad220d66b936511667f59ea056962', 0, '2021-03-10 13:06:05', 'teste', '0000-00-00'),
(103, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 14:43:53', 'teste', '0000-00-00'),
(104, 'Luiz', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 14:44:27', 'Santos', '0000-00-00'),
(105, 'teste', 'Masculino', 'teste@teste.com', 'f7326a273e33959b1a87ea25f4addc46', 0, '2021-03-10 14:49:08', 'teste', '0000-00-00'),
(106, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 14:50:31', 'teste', '0000-00-00'),
(107, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 14:53:55', 'teste', '0000-00-00'),
(108, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 14:54:06', 'teste', '0000-00-00'),
(109, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 14:54:36', 'teste', '0000-00-00'),
(110, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:01:41', 'teste', '0000-00-00'),
(111, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:02:02', 'teste', '0000-00-00'),
(112, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:04:40', 'teste', '0000-00-00'),
(113, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:05:59', 'teste', '0000-00-00'),
(114, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:06:40', 'teste', '0000-00-00'),
(115, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:07:35', 'teste', '0000-00-00'),
(116, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:08:42', 'teste', '0000-00-00'),
(117, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:10:01', 'teste', '0000-00-00'),
(118, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:10:06', 'teste', '0000-00-00'),
(119, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:11:25', 'teste', '0000-00-00'),
(120, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 15:12:55', 'teste', '0000-00-00'),
(121, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 19:46:08', 'teste', '0000-00-00'),
(122, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 19:46:45', 'teste', '0000-00-00'),
(123, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 19:49:55', 'teste', '0000-00-00'),
(124, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:07:02', 'teste', '0000-00-00'),
(125, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:08:37', 'teste', '0000-00-00'),
(126, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:09:29', 'teste', '0000-00-00'),
(127, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:09:48', 'teste', '0000-00-00'),
(128, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:10:56', 'teste', '0000-00-00'),
(129, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:12:31', 'teste', '0000-00-00'),
(130, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:15:17', 'teste', '0000-00-00'),
(131, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:16:40', 'teste', '0000-00-00'),
(132, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:16:51', 'teste', '0000-00-00'),
(133, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:17:03', 'teste', '0000-00-00'),
(134, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:17:17', 'teste', '0000-00-00'),
(135, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-10 20:17:35', 'teste', '0000-00-00'),
(136, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:15:36', 'teste', '0000-00-00'),
(137, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:17:41', 'teste', '0000-00-00'),
(138, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:20:16', 'teste', '0000-00-00'),
(139, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:20:31', 'teste', '0000-00-00'),
(140, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:21:06', 'teste', '0000-00-00'),
(141, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:22:04', 'teste', '0000-00-00'),
(142, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:22:37', 'teste', '0000-00-00'),
(143, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:25:12', 'teste', '0000-00-00'),
(144, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:25:58', 'teste', '0000-00-00'),
(145, 'teste', 'Masculino', 'teste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:26:10', 'teste', '0000-00-00'),
(146, 'teste', 'Masculino', 'teste', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 19:26:34', 'teste', '0000-00-00'),
(147, 'teste', 'Masculino', 'teste@22teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 21:54:18', 'teste', '0000-00-00'),
(148, 'teste', 'Masculino', 'teste@2245teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 21:55:24', 'teste', '0000-00-00'),
(149, 'TESTE', 'Masculino', 'teste@223teste55.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 21:58:47', 'TESTE', '1995-02-27'),
(150, 'teste', 'Masculino', 'teste@3213teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 22:05:36', 'teste', '1995-02-27'),
(151, 'teste', 'Masculino', 'teste@12teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 22:06:48', 'teste', '1995-02-27'),
(152, 'teste', 'Masculino', 'testando12@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 22:11:22', 'teste', '2021-03-25'),
(153, 'teste', 'Masculino', 'testando1212@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 22:12:05', 'teste', '1995-02-27'),
(154, 'teste', 'Masculino', 'testeteste@teste.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-11 22:17:56', 'teste', '2021-03-24'),
(155, 'teste', 'Masculino', 'teste1@gmail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-12 07:44:52', 'teste', '1999-11-27'),
(156, 'teste', 'Masculino', 'teste12@gmail.com', 'teste', 0, '2021-03-12 08:07:31', 'teste', '1995-02-27'),
(157, 'teste', 'Masculino', 'm1@gmail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-12 09:10:08', 'teste', '1995-02-27'),
(158, 'teste', 'Masculino', 'teste123@gmail.com', 'f7326a273e33959b1a87ea25f4addc46', 0, '2021-03-16 10:43:39', 'teste', '2020-02-21'),
(159, 'teste', 'Masculino', 'testando12@gmail.com', '4c01ff6f8bb4bc475a85315694b2e504', 0, '2021-03-16 12:06:07', 'teste', '1999-12-22'),
(160, 'teste', 'Masculino', 'marte_villa@gmail.com', '4c01ff6f8bb4bc475a85315694b2e504', 0, '2021-03-16 13:19:51', 'teste', '2002-09-11'),
(161, 'Michael', 'Masculino', 'michaelsantos@gmail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-16 14:19:19', 'Santos', '1995-02-27'),
(162, 'teste', 'Masculino', 'michaelsantoss@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 0, '2021-03-16 14:38:13', 'teste', '1999-11-11'),
(163, 'luiz', 'Masculino', 'luizmiguel277@gmail.com', '1234', 0, '2021-03-16 14:42:24', 'luiz', '1995-02-27'),
(164, 'a', 'Masculino', 'michaelsantosss@gmail.com', 'teste', 0, '2021-03-16 15:04:33', 'b', '1995-02-27'),
(165, 'a', 'Masculino', 'michael22s@gmail.com', 'teste', 0, '2021-03-16 15:05:11', 'b', '1995-02-27'),
(166, 'Luiz', 'Masculino', 'michaelsantos12@gmail.com', 'teste', 0, '2021-03-22 20:44:10', 'Teste', '1995-02-27'),
(167, 'Luiz', 'Masculino', 'michaelsantos123@gmail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-03-22 20:45:32', 'Teste', '1995-02-27'),
(168, 'teste', 'Masculino', 'testejoaojoao@hotmail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-05-13 21:35:29', 'teste', '1995-02-27'),
(169, 'Neymar', 'Masculino', 'NeymarJR@gmail.com', '93a4e6992adaaba201c34a198019661f', 0, '2021-05-14 14:12:05', 'JR', '1995-02-27'),
(170, 'Barry', 'Masculino', 'barryallen7@gmail.com', 'd176a033aed0d3e2cd0d4edd70c7c04c', 0, '2021-05-17 15:11:18', 'Allen', '1994-01-27'),
(171, 'Barry', 'Masculino', 'barryallen77@gmail.com', 'd176a033aed0d3e2cd0d4edd70c7c04c', 0, '2021-05-17 15:12:34', 'Allen', '1994-01-27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `coment_invs`
--
ALTER TABLE `coment_invs`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Índices para tabela `pedidos_amizade`
--
ALTER TABLE `pedidos_amizade`
  ADD PRIMARY KEY (`requestId`);

--
-- Índices para tabela `timelinef`
--
ALTER TABLE `timelinef`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usr_invs`
--
ALTER TABLE `usr_invs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `coment_invs`
--
ALTER TABLE `coment_invs`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pedidos_amizade`
--
ALTER TABLE `pedidos_amizade`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `timelinef`
--
ALTER TABLE `timelinef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usr_invs`
--
ALTER TABLE `usr_invs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `coment_invs`
--
ALTER TABLE `coment_invs`
  ADD CONSTRAINT `coment_invs_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `timelinef` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
