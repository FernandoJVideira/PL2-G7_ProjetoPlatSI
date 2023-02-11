-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Fev-2023 às 16:30
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stuffngo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1675078606),
('Cliente', '6', 1675078606),
('Cliente', '7', 1675078606),
('Funcionario', '4', 1675078606),
('Funcionario', '5', 1675078606),
('Gestor', '2', 1675078606),
('Gestor', '3', 1675078606);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, NULL, NULL, NULL, 1675078606, 1675078606),
('backend', 2, 'Aceder ao backend', NULL, NULL, 1675078605, 1675078605),
('Cliente', 1, NULL, NULL, NULL, 1675078606, 1675078606),
('createAdmin', 2, 'Criar um Admin', NULL, NULL, 1675078605, 1675078605),
('createCategoria', 2, 'Criar uma categoria', NULL, NULL, 1675078605, 1675078605),
('createCliente', 2, 'Criar um cliente', NULL, NULL, 1675078605, 1675078605),
('createEncomenda', 2, 'Criar uma encomenda', NULL, NULL, 1675078605, 1675078605),
('createFuncionario', 2, 'Criar um funcionário', NULL, NULL, 1675078605, 1675078605),
('createGestor', 2, 'Criar um Gestor', NULL, NULL, 1675078605, 1675078605),
('createIva', 2, 'Criar uma taxa IVA', NULL, NULL, 1675078605, 1675078605),
('createLoja', 2, 'Criar uma Loja', NULL, NULL, 1675078605, 1675078605),
('createMetodoPagamento', 2, 'Criar um tipo de pagamento', NULL, NULL, 1675078605, 1675078605),
('createMorada', 2, 'Criar uma morada', NULL, NULL, 1675078605, 1675078605),
('createProduto', 2, 'Criar um produto', NULL, NULL, 1675078605, 1675078605),
('createPromocao', 2, 'Criar uma promocao', NULL, NULL, 1675078605, 1675078605),
('createReview', 2, 'Criar uma review', NULL, NULL, 1675078605, 1675078605),
('createSeccao', 2, 'Criar uma seccao', NULL, NULL, 1675078605, 1675078605),
('deleteAdmin', 2, 'Desativar um administrador', NULL, NULL, 1675078605, 1675078605),
('deleteCategoria', 2, 'Desativar uma categoria', NULL, NULL, 1675078605, 1675078605),
('deleteCliente', 2, 'Desativar um cliente', NULL, NULL, 1675078605, 1675078605),
('deleteFuncionario', 2, 'Desativar um funcionário', NULL, NULL, 1675078605, 1675078605),
('deleteGestor', 2, 'Desativar um gestor', NULL, NULL, 1675078605, 1675078605),
('deleteIva', 2, 'Desativar uma taxa IVA', NULL, NULL, 1675078605, 1675078605),
('deleteLoja', 2, 'Remover uma loja', NULL, NULL, 1675078605, 1675078605),
('deleteMetodoPagamento', 2, 'Remover um metodo de pagamento', NULL, NULL, 1675078605, 1675078605),
('deleteMorada', 2, 'Remover uma morada', NULL, NULL, 1675078605, 1675078605),
('deleteProduto', 2, 'Desativar um produto', NULL, NULL, 1675078605, 1675078605),
('deletePromocao', 2, 'Remover uma promocao', NULL, NULL, 1675078605, 1675078605),
('deleteSeccao', 2, 'Remover uma seccao', NULL, NULL, 1675078605, 1675078605),
('favoritos', 2, 'Adicionar/Remover um produto aos favoritos', NULL, NULL, 1675078605, 1675078605),
('Funcionario', 1, NULL, NULL, NULL, 1675078606, 1675078606),
('gestaoLoja', 2, 'Gerir Loja', NULL, NULL, 1675078605, 1675078605),
('Gestor', 1, NULL, NULL, NULL, 1675078606, 1675078606),
('tarefas', 2, 'ações tarefas', NULL, NULL, 1675078605, 1675078605),
('updateAdmin', 2, 'Atualizar os dados de um administrador', NULL, NULL, 1675078605, 1675078605),
('updateCategoria', 2, 'Atualizar uma categoria', NULL, NULL, 1675078605, 1675078605),
('updateCliente', 2, 'Atualizar os dados de um cliente', NULL, NULL, 1675078605, 1675078605),
('updateDadosEmpresa', 2, 'Atualizar os dados de uma empresa', NULL, NULL, 1675078605, 1675078605),
('updateEmpresa', 2, 'Atualizar os dados de uma empresa', NULL, NULL, 1675078605, 1675078605),
('updateFuncionario', 2, 'Atualizar os dados de um funcionário', NULL, NULL, 1675078605, 1675078605),
('updateGestor', 2, 'Atualizar os dados de um gestor', NULL, NULL, 1675078605, 1675078605),
('updateIva', 2, 'Atualizar uma taxa IVA', NULL, NULL, 1675078605, 1675078605),
('updateLoja', 2, 'Atualizar os dados de uma loja', NULL, NULL, 1675078605, 1675078605),
('updateMetodoPagamento', 2, 'Atualizar um metodo de pagamento', NULL, NULL, 1675078605, 1675078605),
('updateMorada', 2, 'Atualizar os dados de uma morada', NULL, NULL, 1675078605, 1675078605),
('updateMoradaEncomenda', 2, 'Atualizar a morada de uma encomenda', NULL, NULL, 1675078605, 1675078605),
('updateOwn', 2, 'Atualizar os dados do próprio utilizador', NULL, NULL, 1675078605, 1675078605),
('updateProduto', 2, 'Atualizar um produto', NULL, NULL, 1675078605, 1675078605),
('updatePromocao', 2, 'Atualizar os dados de uma promocao', NULL, NULL, 1675078605, 1675078605),
('updateSeccao', 2, 'Atualizar os dados de uma seccao', NULL, NULL, 1675078605, 1675078605),
('updateStatusEncomenda', 2, 'Atualizar o status de uma encomenda', NULL, NULL, 1675078605, 1675078605),
('updateStock', 2, 'Atualizar o stock de um produto', NULL, NULL, 1675078605, 1675078605),
('viewAdmin', 2, 'Ver a listagem de todos administradores', NULL, NULL, 1675078605, 1675078605),
('viewCategorias', 2, 'Ver a listagem de todas as categorias', NULL, NULL, 1675078605, 1675078605),
('viewCliente', 2, 'Ver os dados de um cliente', NULL, NULL, 1675078605, 1675078605),
('viewEmpresa', 2, 'Ver os dados da empresa', NULL, NULL, 1675078605, 1675078605),
('viewEstatisticas', 2, 'Ver as estatisticas da loja', NULL, NULL, 1675078605, 1675078605),
('viewFuncionario', 2, 'Ver a listagem de todos funcionários', NULL, NULL, 1675078605, 1675078605),
('viewGestor', 2, 'Ver a listagem de todos gestores', NULL, NULL, 1675078605, 1675078605),
('viewHistoricoDeEncomendas', 2, 'Ver o historico de encomendas', NULL, NULL, 1675078605, 1675078605),
('viewIva', 2, 'Ver a listagem de todas as taxas IVA', NULL, NULL, 1675078605, 1675078605),
('viewLoja', 2, 'Ver os dados da loja', NULL, NULL, 1675078605, 1675078605),
('viewMetodoPagamento', 2, 'Ver a listagem de todos os metodos de pagamento', NULL, NULL, 1675078605, 1675078605),
('viewOwn', 2, 'Ver os dados do proprio utilizador', NULL, NULL, 1675078605, 1675078605),
('viewProduto', 2, 'Ver produtos', NULL, NULL, 1675078605, 1675078605),
('viewPromocao', 2, 'Ver a listagem de todas as promocoes', NULL, NULL, 1675078605, 1675078605),
('viewSeccao', 2, 'Ver as seccoes das lojas', NULL, NULL, 1675078605, 1675078605);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'backend'),
('Funcionario', 'backend'),
('Gestor', 'backend'),
('Admin', 'createAdmin'),
('Admin', 'createCategoria'),
('Gestor', 'createCategoria'),
('Admin', 'createCliente'),
('Funcionario', 'createCliente'),
('Gestor', 'createCliente'),
('Cliente', 'createEncomenda'),
('Admin', 'createFuncionario'),
('Gestor', 'createFuncionario'),
('Admin', 'createGestor'),
('Admin', 'createIva'),
('Gestor', 'createIva'),
('Admin', 'createLoja'),
('Admin', 'createMetodoPagamento'),
('Gestor', 'createMetodoPagamento'),
('Admin', 'createMorada'),
('Gestor', 'createMorada'),
('Admin', 'createProduto'),
('Gestor', 'createProduto'),
('Admin', 'createPromocao'),
('Gestor', 'createPromocao'),
('Cliente', 'createReview'),
('Admin', 'createSeccao'),
('Gestor', 'createSeccao'),
('Admin', 'deleteAdmin'),
('Admin', 'deleteCategoria'),
('Gestor', 'deleteCategoria'),
('Admin', 'deleteCliente'),
('Funcionario', 'deleteCliente'),
('Gestor', 'deleteCliente'),
('Admin', 'deleteFuncionario'),
('Gestor', 'deleteFuncionario'),
('Admin', 'deleteGestor'),
('Admin', 'deleteIva'),
('Gestor', 'deleteIva'),
('Admin', 'deleteLoja'),
('Admin', 'deleteMetodoPagamento'),
('Gestor', 'deleteMetodoPagamento'),
('Admin', 'deleteMorada'),
('Cliente', 'deleteMorada'),
('Funcionario', 'deleteMorada'),
('Gestor', 'deleteMorada'),
('Admin', 'deleteProduto'),
('Gestor', 'deleteProduto'),
('Admin', 'deletePromocao'),
('Gestor', 'deletePromocao'),
('Admin', 'deleteSeccao'),
('Gestor', 'deleteSeccao'),
('Admin', 'favoritos'),
('Cliente', 'favoritos'),
('Funcionario', 'favoritos'),
('Gestor', 'favoritos'),
('Admin', 'gestaoLoja'),
('Gestor', 'gestaoLoja'),
('Admin', 'tarefas'),
('Cliente', 'tarefas'),
('Funcionario', 'tarefas'),
('Gestor', 'tarefas'),
('Admin', 'updateAdmin'),
('Admin', 'updateCategoria'),
('Gestor', 'updateCategoria'),
('Admin', 'updateCliente'),
('Funcionario', 'updateCliente'),
('Gestor', 'updateCliente'),
('Admin', 'updateDadosEmpresa'),
('Admin', 'updateEmpresa'),
('Admin', 'updateFuncionario'),
('Gestor', 'updateFuncionario'),
('Admin', 'updateGestor'),
('Admin', 'updateIva'),
('Gestor', 'updateIva'),
('Admin', 'updateLoja'),
('Gestor', 'updateLoja'),
('Admin', 'updateMetodoPagamento'),
('Gestor', 'updateMetodoPagamento'),
('Admin', 'updateMorada'),
('Gestor', 'updateMorada'),
('Admin', 'updateOwn'),
('Cliente', 'updateOwn'),
('Funcionario', 'updateOwn'),
('Gestor', 'updateOwn'),
('Admin', 'updateProduto'),
('Gestor', 'updateProduto'),
('Admin', 'updatePromocao'),
('Gestor', 'updatePromocao'),
('Admin', 'updateSeccao'),
('Gestor', 'updateSeccao'),
('Admin', 'updateStatusEncomenda'),
('Funcionario', 'updateStatusEncomenda'),
('Gestor', 'updateStatusEncomenda'),
('Funcionario', 'updateStock'),
('Admin', 'viewAdmin'),
('Admin', 'viewCategorias'),
('Gestor', 'viewCategorias'),
('Admin', 'viewCliente'),
('Funcionario', 'viewCliente'),
('Gestor', 'viewCliente'),
('Admin', 'viewEmpresa'),
('Admin', 'viewEstatisticas'),
('Gestor', 'viewEstatisticas'),
('Admin', 'viewFuncionario'),
('Gestor', 'viewFuncionario'),
('Admin', 'viewGestor'),
('Admin', 'viewHistoricoDeEncomendas'),
('Cliente', 'viewHistoricoDeEncomendas'),
('Funcionario', 'viewHistoricoDeEncomendas'),
('Gestor', 'viewHistoricoDeEncomendas'),
('Admin', 'viewIva'),
('Gestor', 'viewIva'),
('Admin', 'viewLoja'),
('Gestor', 'viewLoja'),
('Admin', 'viewMetodoPagamento'),
('Gestor', 'viewMetodoPagamento'),
('Admin', 'viewOwn'),
('Cliente', 'viewOwn'),
('Funcionario', 'viewOwn'),
('Gestor', 'viewOwn'),
('Admin', 'viewProduto'),
('Gestor', 'viewProduto'),
('Admin', 'viewPromocao'),
('Gestor', 'viewPromocao'),
('Admin', 'viewSeccao'),
('Gestor', 'viewSeccao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `isbn` varchar(80) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `book`
--

INSERT INTO `book` (`id`, `name`, `isbn`, `genre_id`) VALUES
(1, 'teste A', 'teste A', 1),
(2, 'teste B', 'teste B', 1),
(3, 'teste C', 'teste C', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `idCarrinho` int(11) NOT NULL AUTO_INCREMENT,
  `estado` enum('aberto','emProcessamento','fechado') DEFAULT 'aberto',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_morada` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_promocao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCarrinho`),
  KEY `id_promocao` (`id_promocao`),
  KEY `id_user` (`id_user`),
  KEY `id_loja` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`idCarrinho`, `estado`, `data_criacao`, `id_morada`, `id_loja`, `id_user`, `id_promocao`) VALUES
(1, 'fechado', '2023-01-09 02:27:16', 9, 1, 6, NULL),
(2, 'emProcessamento', '2023-01-09 02:27:50', 9, 1, 6, NULL),
(3, 'emProcessamento', '2023-01-09 02:33:06', 10, 1, 7, NULL),
(4, 'emProcessamento', '2023-01-09 02:34:19', 10, 2, 7, NULL),
(5, 'emProcessamento', '2023-01-23 16:44:45', 2, 1, 1, NULL),
(6, 'emProcessamento', '2023-01-23 16:44:50', 2, 1, 1, NULL),
(7, 'emProcessamento', '2023-01-23 16:44:53', 2, 1, 1, NULL),
(8, 'emProcessamento', '2023-01-23 16:49:06', 1, 1, 6, NULL),
(9, 'emProcessamento', '2023-01-23 18:21:16', 2, 1, 1, NULL),
(10, 'emProcessamento', '2023-01-23 18:36:26', 2, 1, 1, NULL),
(11, 'fechado', '2023-01-23 22:49:13', 1, 2, 1, NULL),
(12, 'emProcessamento', '2023-01-23 22:50:10', 1, 2, 1, NULL),
(13, 'emProcessamento', '2023-01-23 22:52:03', 1, 2, 1, NULL),
(14, 'emProcessamento', '2023-01-23 22:52:10', 1, 1, 1, NULL),
(15, 'emProcessamento', '2023-01-23 23:14:13', 2, 2, 1, NULL),
(16, 'emProcessamento', '2023-01-23 23:20:03', 11, 2, 1, NULL),
(17, 'emProcessamento', '2023-01-26 14:32:45', 11, 1, 1, NULL),
(18, 'aberto', '2023-01-30 19:36:19', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `id_iva` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_iva` (`id_iva`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nome`, `ativo`, `id_iva`, `id_categoria`) VALUES
(1, 'Carne', 1, 2, NULL),
(2, 'Carne de peru', 1, 2, 1),
(3, 'Carne de vaca', 1, 2, 1),
(4, 'Limpeza e cozinha', 1, 1, NULL),
(5, 'Bebé', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chapter`
--

INSERT INTO `chapter` (`id`, `name`, `book_id`) VALUES
(1, 'teste', 1),
(2, 'teste2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_social` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `id_morada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`),
  UNIQUE KEY `email` (`email`),
  KEY `id_morada` (`id_morada`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `descricao_social`, `email`, `telefone`, `nif`, `id_morada`) VALUES
(1, 'Stuff N\' Go', 'stuffngo.main@stuffngo.com', '925923001', '254342345', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

DROP TABLE IF EXISTS `fatura`;
CREATE TABLE IF NOT EXISTS `fatura` (
  `idFatura` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUtilizador` varchar(255) NOT NULL,
  `nifUtilizador` varchar(9) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL,
  `nifEmpresa` varchar(9) NOT NULL,
  `descricaoLoja` varchar(50) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_metodo` int(11) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_carrinho` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFatura`),
  KEY `id_carrinho` (`id_carrinho`),
  KEY `id_metodo` (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`idFatura`, `nomeUtilizador`, `nifUtilizador`, `nomeEmpresa`, `nifEmpresa`, `descricaoLoja`, `dataCriacao`, `id_metodo`, `id_utilizador`, `id_loja`, `id_carrinho`) VALUES
(1, 'Tiago', '987658787', 'Stuff N\' Go', '254342345', 'Loja 1', '2023-01-09 01:28:09', 1, 6, 1, 1),
(2, 'Joana', '987654321', 'Stuff N\' Go', '254342345', 'Loja 2', '2023-01-28 12:35:50', 1, 1, 2, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE IF NOT EXISTS `favorito` (
  `idFavorito` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFavorito`),
  KEY `id_produto` (`id_produto`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `favorito`
--

INSERT INTO `favorito` (`idFavorito`, `id_produto`, `id_user`) VALUES
(1, 4, 1),
(2, 8, 6),
(3, 1, 1),
(4, 2, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

DROP TABLE IF EXISTS `iva`;
CREATE TABLE IF NOT EXISTS `iva` (
  `idIva` int(11) NOT NULL AUTO_INCREMENT,
  `iva` float NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idIva`),
  UNIQUE KEY `iva` (`iva`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `iva`
--

INSERT INTO `iva` (`idIva`, `iva`, `descricao`, `ativo`) VALUES
(1, 23, 'Taxa normal', 1),
(2, 13, 'Taxa intermédia', 1),
(3, 6, 'Taxa reduzida', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhacarrinho`
--

DROP TABLE IF EXISTS `linhacarrinho`;
CREATE TABLE IF NOT EXISTS `linhacarrinho` (
  `idLinha` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) DEFAULT '0',
  `quantidade` int(11) NOT NULL,
  `id_carrinho` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLinha`),
  KEY `id_carrinho` (`id_carrinho`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `linhacarrinho`
--

INSERT INTO `linhacarrinho` (`idLinha`, `estado`, `quantidade`, `id_carrinho`, `id_produto`) VALUES
(1, 1, 3, 1, 5),
(2, 1, 1, 1, 9),
(3, 1, 2, 2, 4),
(4, 1, 2, 2, 3),
(5, 1, 2, 3, 1),
(6, 1, 2, 3, 5),
(7, 0, 2, 4, 5),
(8, 0, 1, 4, 8),
(9, 1, 1, 5, 8),
(10, 1, 1, 6, 10),
(11, 1, 1, 7, 8),
(12, 1, 1, 8, 2),
(13, 1, 2, 9, 3),
(14, 1, 2, 10, 1),
(15, 1, 1, 10, 2),
(16, 1, 1, 11, 1),
(17, 1, 2, 11, 2),
(19, 1, 3, 11, 3),
(20, 1, 1, 11, 4),
(21, 0, 3, 12, 1),
(22, 0, 2, 12, 2),
(23, 0, 7, 13, 2),
(24, 1, 1, 14, 2),
(25, 0, 1, 15, 1),
(26, 0, 1, 15, 3),
(27, 0, 1, 16, 5),
(28, 1, 1, 17, 1),
(29, 0, 1, 18, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafatura`
--

DROP TABLE IF EXISTS `linhafatura`;
CREATE TABLE IF NOT EXISTS `linhafatura` (
  `idLinha` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `preco_unit` float NOT NULL,
  `iva` float NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_fatura` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLinha`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_produto` (`id_produto`),
  KEY `id_fatura` (`id_fatura`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `linhafatura`
--

INSERT INTO `linhafatura` (`idLinha`, `quantidade`, `preco_unit`, `iva`, `id_categoria`, `id_fatura`, `id_produto`) VALUES
(1, 3, 3.49, 13, 2, 1, 5),
(2, 1, 33.99, 6, 5, 1, 9),
(3, 1, 12.99, 13, 3, 2, 1),
(4, 2, 6.69, 13, 2, 2, 2),
(5, 3, 4.79, 13, 3, 2, 3),
(6, 1, 4.59, 13, 3, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

DROP TABLE IF EXISTS `loja`;
CREATE TABLE IF NOT EXISTS `loja` (
  `idLoja` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `id_morada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLoja`),
  UNIQUE KEY `email` (`email`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_morada` (`id_morada`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`idLoja`, `id_empresa`, `descricao`, `email`, `telefone`, `ativo`, `id_morada`) VALUES
(1, 1, 'Loja 1', 'loja1@stuffngo.pt', '239111111', 1, 3),
(2, 1, 'Loja 2', 'loja2@stuffngo.pt', '239222222', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_metodopagamento`
--

DROP TABLE IF EXISTS `loja_metodopagamento`;
CREATE TABLE IF NOT EXISTS `loja_metodopagamento` (
  `loja_idLoja` int(11) NOT NULL,
  `metodoPagamento_idMetodo` int(11) NOT NULL,
  PRIMARY KEY (`loja_idLoja`,`metodoPagamento_idMetodo`),
  KEY `metodoPagamento_idMetodo` (`metodoPagamento_idMetodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loja_metodopagamento`
--

INSERT INTO `loja_metodopagamento` (`loja_idLoja`, `metodoPagamento_idMetodo`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_seccao`
--

DROP TABLE IF EXISTS `loja_seccao`;
CREATE TABLE IF NOT EXISTS `loja_seccao` (
  `idLojaSeccao` int(11) NOT NULL AUTO_INCREMENT,
  `loja_idLoja` int(11) NOT NULL,
  `seccao_idSeccao` int(11) NOT NULL,
  `numeroAtual` int(11) DEFAULT '0',
  `ultimoNumero` int(11) DEFAULT '0',
  PRIMARY KEY (`idLojaSeccao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loja_seccao`
--

INSERT INTO `loja_seccao` (`idLojaSeccao`, `loja_idLoja`, `seccao_idSeccao`, `numeroAtual`, `ultimoNumero`) VALUES
(1, 1, 1, 0, 14),
(2, 1, 2, 0, 2),
(3, 2, 3, 0, 0),
(4, 2, 4, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `metodopagamento`
--

DROP TABLE IF EXISTS `metodopagamento`;
CREATE TABLE IF NOT EXISTS `metodopagamento` (
  `idMetodo` int(11) NOT NULL AUTO_INCREMENT,
  `metodoPagamento` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idMetodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `metodopagamento`
--

INSERT INTO `metodopagamento` (`idMetodo`, `metodoPagamento`, `ativo`) VALUES
(1, 'MbWay', 1),
(2, 'Numerário', 1),
(4, 'PayPal', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1673223369),
('m130524_201442_init', 1673223378),
('m140506_102106_rbac_init', 1673223378),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1673223378),
('m180523_151638_rbac_updates_indexes_without_prefix', 1673223378),
('m190124_110200_add_verification_token_column_to_user_table', 1673223378),
('m200409_110543_rbac_update_mssql_trigger', 1673223378);

-- --------------------------------------------------------

--
-- Estrutura da tabela `morada`
--

DROP TABLE IF EXISTS `morada`;
CREATE TABLE IF NOT EXISTS `morada` (
  `idMorada` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(255) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `cod_postal` varchar(12) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMorada`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `morada`
--

INSERT INTO `morada` (`idMorada`, `rua`, `cidade`, `cod_postal`, `pais`, `estado`, `id_user`) VALUES
(1, 'Rua do Padrão', 'Porto', '1234-567', 'Portugal', 1, NULL),
(2, 'Rua do Admin', 'Leiria', '2400-444', 'Portugal', 1, 1),
(3, 'rua da loja 1', 'Leiria', '2400-022', 'Portugal', 1, NULL),
(4, 'Rua da loja 2', 'coimbra', '3000', 'Portugal', 1, NULL),
(5, 'Rua do Jorge', 'Porto', '4000-123', 'Portugal', 1, 2),
(6, 'Rua do Fernando', 'Santarem', '1500-235', 'Portugal', 1, 3),
(7, 'Rua  do Diogo', 'Coimbra', '4000-123', 'Portugal', 1, 4),
(8, 'Rua do João', 'Anadia', '3000-587', 'Portugal', 1, 5),
(9, 'Rua do Tiago', 'Santarem', '2005-698', 'Portugal', 1, 6),
(10, 'Rua do Carreiro', 'Marinha Grande', '2544-457', 'Portugal', 1, 7),
(11, 'Dos Biscoitos', 'lEIRIA', '4444-444', 'PORTUGAL', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco_unit` float NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `id_categoria` int(11) DEFAULT NULL,
  `referencia` varchar(80) NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `preco_unit`, `dataCriacao`, `imagem`, `ativo`, `id_categoria`, `referencia`) VALUES
(1, 'Espetadas de vaca', 'Espetadas de Porco Preto com Pimentos Ultracongeladas ', 12.99, '2023-01-09 00:34:35', 'U_5grXfMF0u2AEzKPCeb4bQX29vM_vH2.jpg', 1, 3, ''),
(2, 'Espetadas de peru', 'No Continente encontra todos os dias a carne mais fresca.', 6.69, '2023-01-09 00:35:37', '_81BrhCof6Os32wt9MiEn4YA8HZ7NCwc.jpg', 1, 2, ''),
(3, 'Carne Picada', 'Preparado de Carne Picada de Bovino', 4.79, '2023-01-09 00:37:23', 'h7SeJuFe87Lyrd4rO52At5vYAsiisIQQ.jpg', 1, 3, ''),
(4, 'Almôndegas', 'Almôndegas de Bovino', 4.59, '2023-01-09 00:38:21', 'bBPvW_LPU_kdGB7Jni5OM5a9V-QR2H8U.jpg', 1, 3, ''),
(5, 'Perninha de Peru', 'Fonte de proteína e pobre em gordura (se removida a pele) ', 3.49, '2023-01-09 00:39:52', '7uBCCrEWxVT0ATIGouq-S_L_spsyO0UO.jpg', 1, 2, ''),
(6, 'Bife de Peru', 'Os nossos profissionais, com formação especializada, selecionam a carne mais fresca para si.', 7.99, '2023-01-09 00:40:41', 'l3MAEHIaxbgyJOhEjyfoQc28Vbd5pWy6.jpg', 1, 2, ''),
(7, 'Detergente Máquina', 'A opção em líquido para uma lavagem mais completa!', 17.24, '2023-01-09 00:42:44', 'd1mCdABuO8KPF8X4_XXd4Q_KrQPa2Ov-.jpg', 1, 4, ''),
(8, 'Mopa Microfibra', 'Mopa com spray pode ser usada húmida, molhada ou a seco. Ideal para todo o tipo de pavimentos duros. Pode ser utilizado com ou sem detergente.', 34.99, '2023-01-09 00:43:48', 'ydGXiEfnAO-FFQ3DyIc1avpj0NZJI0Px.jpg', 1, 4, ''),
(9, 'Almofada Dormi Locos', 'Agora pode dormir e descansar a qualquer hora e em qualquer lugar com os Dormi Locos Almofadas!', 33.99, '2023-01-09 00:47:06', 'muQEhNUAuNUbTmUTNvyi7hljOIQxRC46.jpg', 1, 5, ''),
(10, 'Box Fraldas', 'Suave como o algodão, para um contacto delicado com a pele do seu bebé!', 22.99, '2023-01-09 00:49:08', 'PqTLE5MlzRSl4ZWcC-gl6bh8qC57fC53.jpg', 1, 5, ''),
(11, 'Azeite', 'Um delicioso azeite obtido através da combinação de azeite virgem e azeite submetido a um processo de refinação.', 3.69, '2023-01-21 14:10:46', 'QheW4FDrSeJ_S1Zu3eikYs_bgCMfNVWR.png', 1, 4, ''),
(12, 'Teste', 'Teste Referencia', 1, '2023-02-09 14:18:11', 'XsjP1e1zlDDN0A20gWOe0J0De3nPTsg_.png', 1, 5, '12a-dq2-343');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

DROP TABLE IF EXISTS `promocao`;
CREATE TABLE IF NOT EXISTS `promocao` (
  `idPromocao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_promo` varchar(50) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `percentagem` float NOT NULL,
  `data_limite` date NOT NULL,
  PRIMARY KEY (`idPromocao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`idPromocao`, `nome_promo`, `codigo`, `percentagem`, `data_limite`) VALUES
(1, 'Dia dos Reis', 'L6W07', 10, '2023-01-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seccao`
--

DROP TABLE IF EXISTS `seccao`;
CREATE TABLE IF NOT EXISTS `seccao` (
  `idSeccao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`idSeccao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `seccao`
--

INSERT INTO `seccao` (`idSeccao`, `nome`) VALUES
(1, 'Peixaria'),
(2, 'Charcutaria'),
(3, 'Padaria'),
(4, 'Talho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `senhadigital`
--

DROP TABLE IF EXISTS `senhadigital`;
CREATE TABLE IF NOT EXISTS `senhadigital` (
  `idSenha` int(11) NOT NULL,
  `id_seccao` int(11) DEFAULT NULL,
  `numeroAtual` int(11) DEFAULT '0',
  `ultimoNumero` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `senhadigital`
--

INSERT INTO `senhadigital` (`idSenha`, `id_seccao`, `numeroAtual`, `ultimoNumero`) VALUES
(1, 1, 0, 0),
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `idStock` int(11) NOT NULL AUTO_INCREMENT,
  `quant_stock` int(11) DEFAULT '0',
  `quant_req` int(11) DEFAULT '0',
  `id_produto` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  PRIMARY KEY (`idStock`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`idStock`, `quant_stock`, `quant_req`, `id_produto`, `id_loja`) VALUES
(1, 17, 0, 1, 1),
(2, 17, 0, 2, 1),
(3, 18, 0, 3, 1),
(4, 20, 0, 4, 1),
(5, 20, 0, 5, 1),
(6, 20, 0, 6, 1),
(7, 20, 0, 7, 1),
(8, 18, 0, 8, 1),
(9, 20, 0, 9, 1),
(10, 19, 0, 10, 1),
(11, 0, 3075, 5, NULL),
(12, 0, 11, 8, NULL),
(13, 20, 0, 2, 2),
(14, 9, 0, 1, 2),
(15, 7, 0, 3, 2),
(16, 9, 0, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(80) NOT NULL,
  `feito` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `Descricao`, `feito`, `user_id`) VALUES
(4, 'a', 1, 1),
(5, 'teste3', 1, 1),
(6, 'dhadhjhasdasd', 0, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'w9MY9udTVVlUX_xyIjoHfG7JDt2q0ji7', '$2y$13$HBJ/eHBIsWNil6LezzRM7OXIkDsoa3DBk.Xu/qrVxjbvJrzVTd8Je', '4qK3DAge5GsJE_NwsVL_54soXkhpZJ_n_1675950086', 'admin@teste.pt', 10, 1668448318, 1675950086, 'QaduEvJd2UT-2p1lIhW1MaZcGMFABw79_1668448318'),
(2, 'gestor1', 'a4P76Nh1yD1U77RPP_73aK7JC0pHTMXa', '$2y$13$Muhlk1K53s4XMoPaPCMU4.fJchfDEVhroB4MSJ2YlnB9K0xMLzLjm', NULL, 'gestor1@stuffngo.pt', 10, 1673225743, 1673225743, 'qD0zST66O7UhrV5xT6fhpFyxd_1CRGFw_1673225743'),
(3, 'gestor2', '7Zd8of8OSALuZj4O07ZCwyI8WJUH1rxw', '$2y$13$eK.o9088vjf6D78HmPpT8OU3rdXA98Szk93/XUzpfbWbDSaBrZlJ6', NULL, 'gestor2@stuffngo.pt', 10, 1673225805, 1673225805, 'yA0879ADYx4GUoLWBmzbc9I-egQanejJ_1673225805'),
(4, 'funcionario1', '2pkUitw3lF8CHUl5ZsE03qOLHdqLv7bx', '$2y$13$UY18PL2gy98nsPW8dcWsruPZT9A94V.17fdoMVNhbBYSrhHKGpRJ6', NULL, 'funcionario1@stuffngo.pt', 10, 1673225907, 1673225907, 'TRTTprWTFD4sKP8MDw4zk4JU1MSzDj4D_1673225907'),
(5, 'funcionario2', 'G0sopL967MIzZNlECeQ_ENo6O2PVJfv9', '$2y$13$MYTSNFjXkX9.S044WLbIUOHiF5Uq7Kfg8ZHMdgWYX26nTIGxpmLL2', NULL, 'funcionario2@stuffngo.pt', 10, 1673226187, 1673226187, 'XzJc7ttZ6Li_3D7SxmV-6kZxTAJYV68g_1673226187'),
(6, 'cliente1', 'EjcxGqpBhnEcyV4TPiSUjIQmTcPVLsHo', '$2y$13$sT8dcaDM5NdXvDOMhyoZjej2xlqDmGqbIPa3Jo8jYJlaYzoGBqgEW', NULL, 'cliente1@stuffngo.pt', 10, 1673226252, 1673227146, 'fGC4QdcMMxb4PpNhS6oiUfO7UVkRqFvw_1673226252'),
(7, 'cliente2', 'Rur0rt9RrKAGcmS0KoNx8SAFE9mp_xX3', '$2y$13$oCSD0Qc1ADa9z7EJYJCmOe8ePdhBsrZ9v0Zsr1JEJQLqZY49Hfouu', NULL, 'cliente2@stuffngo.pt', 10, 1673226340, 1673226340, 'mYU-0gmI7s9Y_OAUyUzcfYVMuJSKTjaE_1673226340');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idUser`, `nome`, `nif`, `telemovel`, `id_loja`, `id_user`) VALUES
(1, 'Joana', '987654321', '987654321', NULL, 1),
(2, 'Jorge', '121212121', '111111111', 1, 2),
(3, 'Fernando', '123321123', '222222222', 2, 3),
(4, 'Diogo', '321321321', '333333333', 1, 4),
(5, 'João', '555444888', '444444444', 2, 5),
(6, 'Tiago', '987658787', '915788748', NULL, 6),
(7, 'Rodrigo', '999888777', '912547885', NULL, 7);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Limitadores para a tabela `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Limitadores para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilizador` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
