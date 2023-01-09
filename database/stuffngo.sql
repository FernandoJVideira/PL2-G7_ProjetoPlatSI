SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stuffngo`
--

CREATE DATABASE IF NOT EXISTS stuffngo;

use stuffngo;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1673223418),
('Cliente', '6', 1673226252),
('Cliente', '7', 1673226340),
('Funcionario', '4', 1673225907),
('Funcionario', '5', 1673226187),
('Gestor', '2', 1673225743),
('Gestor', '3', 1673225805);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('backend', 2, 'Aceder ao backend', NULL, NULL, 1673246550, 1673246550),
('Cliente', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('createAdmin', 2, 'Criar um Admin', NULL, NULL, 1673246550, 1673246550),
('createCategoria', 2, 'Criar uma categoria', NULL, NULL, 1673246550, 1673246550),
('createCliente', 2, 'Criar um cliente', NULL, NULL, 1673246550, 1673246550),
('createEncomenda', 2, 'Criar uma encomenda', NULL, NULL, 1673246550, 1673246550),
('createFuncionario', 2, 'Criar um funcionário', NULL, NULL, 1673246550, 1673246550),
('createGestor', 2, 'Criar um Gestor', NULL, NULL, 1673246550, 1673246550),
('createIva', 2, 'Criar uma taxa IVA', NULL, NULL, 1673246550, 1673246550),
('createLoja', 2, 'Criar uma Loja', NULL, NULL, 1673246550, 1673246550),
('createMetodoPagamento', 2, 'Criar um tipo de pagamento', NULL, NULL, 1673246550, 1673246550),
('createMorada', 2, 'Criar uma morada', NULL, NULL, 1673246550, 1673246550),
('createProduto', 2, 'Criar um produto', NULL, NULL, 1673246550, 1673246550),
('createPromocao', 2, 'Criar uma promocao', NULL, NULL, 1673246550, 1673246550),
('createReview', 2, 'Criar uma review', NULL, NULL, 1673246550, 1673246550),
('createSeccao', 2, 'Criar uma seccao', NULL, NULL, 1673246550, 1673246550),
('deleteAdmin', 2, 'Desativar um administrador', NULL, NULL, 1673246550, 1673246550),
('deleteCategoria', 2, 'Desativar uma categoria', NULL, NULL, 1673246550, 1673246550),
('deleteCliente', 2, 'Desativar um cliente', NULL, NULL, 1673246550, 1673246550),
('deleteFuncionario', 2, 'Desativar um funcionário', NULL, NULL, 1673246550, 1673246550),
('deleteGestor', 2, 'Desativar um gestor', NULL, NULL, 1673246550, 1673246550),
('deleteIva', 2, 'Desativar uma taxa IVA', NULL, NULL, 1673246550, 1673246550),
('deleteLoja', 2, 'Remover uma loja', NULL, NULL, 1673246550, 1673246550),
('deleteMetodoPagamento', 2, 'Remover um metodo de pagamento', NULL, NULL, 1673246550, 1673246550),
('deleteMorada', 2, 'Remover uma morada', NULL, NULL, 1673246550, 1673246550),
('deleteProduto', 2, 'Desativar um produto', NULL, NULL, 1673246550, 1673246550),
('deletePromocao', 2, 'Remover uma promocao', NULL, NULL, 1673246550, 1673246550),
('deleteSeccao', 2, 'Remover uma seccao', NULL, NULL, 1673246550, 1673246550),
('favoritos', 2, 'Adicionar/Remover um produto aos favoritos', NULL, NULL, 1673246550, 1673246550),
('Funcionario', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('gestaoLoja', 2, 'Gerir Loja', NULL, NULL, 1673246550, 1673246550),
('Gestor', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('updateAdmin', 2, 'Atualizar os dados de um administrador', NULL, NULL, 1673246550, 1673246550),
('updateCategoria', 2, 'Atualizar uma categoria', NULL, NULL, 1673246550, 1673246550),
('updateCliente', 2, 'Atualizar os dados de um cliente', NULL, NULL, 1673246550, 1673246550),
('updateDadosEmpresa', 2, 'Atualizar os dados de uma empresa', NULL, NULL, 1673246550, 1673246550),
('updateEmpresa', 2, 'Atualizar os dados de uma empresa', NULL, NULL, 1673246550, 1673246550),
('updateFuncionario', 2, 'Atualizar os dados de um funcionário', NULL, NULL, 1673246550, 1673246550),
('updateGestor', 2, 'Atualizar os dados de um gestor', NULL, NULL, 1673246550, 1673246550),
('updateIva', 2, 'Atualizar uma taxa IVA', NULL, NULL, 1673246550, 1673246550),
('updateLoja', 2, 'Atualizar os dados de uma loja', NULL, NULL, 1673246550, 1673246550),
('updateMetodoPagamento', 2, 'Atualizar um metodo de pagamento', NULL, NULL, 1673246550, 1673246550),
('updateMorada', 2, 'Atualizar os dados de uma morada', NULL, NULL, 1673246550, 1673246550),
('updateMoradaEncomenda', 2, 'Atualizar a morada de uma encomenda', NULL, NULL, 1673246550, 1673246550),
('updateOwn', 2, 'Atualizar os dados do próprio utilizador', NULL, NULL, 1673246550, 1673246550),
('updateProduto', 2, 'Atualizar um produto', NULL, NULL, 1673246550, 1673246550),
('updatePromocao', 2, 'Atualizar os dados de uma promocao', NULL, NULL, 1673246550, 1673246550),
('updateSeccao', 2, 'Atualizar os dados de uma seccao', NULL, NULL, 1673246550, 1673246550),
('updateStatusEncomenda', 2, 'Atualizar o status de uma encomenda', NULL, NULL, 1673246550, 1673246550),
('updateStock', 2, 'Atualizar o stock de um produto', NULL, NULL, 1673246550, 1673246550),
('viewAdmin', 2, 'Ver a listagem de todos administradores', NULL, NULL, 1673246550, 1673246550),
('viewCategorias', 2, 'Ver a listagem de todas as categorias', NULL, NULL, 1673246550, 1673246550),
('viewCliente', 2, 'Ver os dados de um cliente', NULL, NULL, 1673246550, 1673246550),
('viewEmpresa', 2, 'Ver os dados da empresa', NULL, NULL, 1673246550, 1673246550),
('viewEstatisticas', 2, 'Ver as estatisticas da loja', NULL, NULL, 1673246550, 1673246550),
('viewFuncionario', 2, 'Ver a listagem de todos funcionários', NULL, NULL, 1673246550, 1673246550),
('viewGestor', 2, 'Ver a listagem de todos gestores', NULL, NULL, 1673246550, 1673246550),
('viewHistoricoDeEncomendas', 2, 'Ver o historico de encomendas', NULL, NULL, 1673246550, 1673246550),
('viewIva', 2, 'Ver a listagem de todas as taxas IVA', NULL, NULL, 1673246550, 1673246550),
('viewLoja', 2, 'Ver os dados da loja', NULL, NULL, 1673246550, 1673246550),
('viewMetodoPagamento', 2, 'Ver a listagem de todos os metodos de pagamento', NULL, NULL, 1673246550, 1673246550),
('viewOwn', 2, 'Ver os dados do proprio utilizador', NULL, NULL, 1673246550, 1673246550),
('viewProduto', 2, 'Ver produtos', NULL, NULL, 1673246550, 1673246550),
('viewPromocao', 2, 'Ver a listagem de todas as promocoes', NULL, NULL, 1673246550, 1673246550),
('viewSeccao', 2, 'Ver as seccoes das lojas', NULL, NULL, 1673246550, 1673246550);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'backend'),
('Admin', 'createAdmin'),
('Admin', 'createCategoria'),
('Admin', 'createCliente'),
('Admin', 'createFuncionario'),
('Admin', 'createGestor'),
('Admin', 'createIva'),
('Admin', 'createLoja'),
('Admin', 'createMetodoPagamento'),
('Admin', 'createMorada'),
('Admin', 'createProduto'),
('Admin', 'createPromocao'),
('Admin', 'createSeccao'),
('Admin', 'deleteAdmin'),
('Admin', 'deleteCategoria'),
('Admin', 'deleteCliente'),
('Admin', 'deleteFuncionario'),
('Admin', 'deleteGestor'),
('Admin', 'deleteIva'),
('Admin', 'deleteLoja'),
('Admin', 'deleteMetodoPagamento'),
('Admin', 'deleteMorada'),
('Admin', 'deleteProduto'),
('Admin', 'deletePromocao'),
('Admin', 'deleteSeccao'),
('Admin', 'gestaoLoja'),
('Admin', 'updateAdmin'),
('Admin', 'updateCategoria'),
('Admin', 'updateCliente'),
('Admin', 'updateDadosEmpresa'),
('Admin', 'updateEmpresa'),
('Admin', 'updateFuncionario'),
('Admin', 'updateGestor'),
('Admin', 'updateIva'),
('Admin', 'updateLoja'),
('Admin', 'updateMetodoPagamento'),
('Admin', 'updateMorada'),
('Admin', 'updateOwn'),
('Admin', 'updateProduto'),
('Admin', 'updatePromocao'),
('Admin', 'updateSeccao'),
('Admin', 'updateStatusEncomenda'),
('Admin', 'viewAdmin'),
('Admin', 'viewCategorias'),
('Admin', 'viewCliente'),
('Admin', 'viewEmpresa'),
('Admin', 'viewEstatisticas'),
('Admin', 'viewFuncionario'),
('Admin', 'viewGestor'),
('Admin', 'viewHistoricoDeEncomendas'),
('Admin', 'viewIva'),
('Admin', 'viewLoja'),
('Admin', 'viewMetodoPagamento'),
('Admin', 'viewOwn'),
('Admin', 'viewProduto'),
('Admin', 'viewPromocao'),
('Admin', 'viewSeccao'),
('Cliente', 'createEncomenda'),
('Cliente', 'createReview'),
('Cliente', 'deleteMorada'),
('Cliente', 'favoritos'),
('Cliente', 'updateOwn'),
('Cliente', 'viewHistoricoDeEncomendas'),
('Cliente', 'viewOwn'),
('Funcionario', 'backend'),
('Funcionario', 'createCliente'),
('Funcionario', 'deleteCliente'),
('Funcionario', 'deleteMorada'),
('Funcionario', 'updateCliente'),
('Funcionario', 'updateOwn'),
('Funcionario', 'updateStatusEncomenda'),
('Funcionario', 'updateStock'),
('Funcionario', 'viewCliente'),
('Funcionario', 'viewHistoricoDeEncomendas'),
('Funcionario', 'viewOwn'),
('Gestor', 'backend'),
('Gestor', 'createCategoria'),
('Gestor', 'createCliente'),
('Gestor', 'createFuncionario'),
('Gestor', 'createIva'),
('Gestor', 'createMetodoPagamento'),
('Gestor', 'createMorada'),
('Gestor', 'createProduto'),
('Gestor', 'createPromocao'),
('Gestor', 'createSeccao'),
('Gestor', 'deleteCategoria'),
('Gestor', 'deleteCliente'),
('Gestor', 'deleteFuncionario'),
('Gestor', 'deleteIva'),
('Gestor', 'deleteMetodoPagamento'),
('Gestor', 'deleteMorada'),
('Gestor', 'deleteProduto'),
('Gestor', 'deletePromocao'),
('Gestor', 'deleteSeccao'),
('Gestor', 'gestaoLoja'),
('Gestor', 'updateCategoria'),
('Gestor', 'updateCliente'),
('Gestor', 'updateFuncionario'),
('Gestor', 'updateIva'),
('Gestor', 'updateLoja'),
('Gestor', 'updateMetodoPagamento'),
('Gestor', 'updateMorada'),
('Gestor', 'updateOwn'),
('Gestor', 'updateProduto'),
('Gestor', 'updatePromocao'),
('Gestor', 'updateSeccao'),
('Gestor', 'updateStatusEncomenda'),
('Gestor', 'viewCategorias'),
('Gestor', 'viewCliente'),
('Gestor', 'viewEstatisticas'),
('Gestor', 'viewFuncionario'),
('Gestor', 'viewHistoricoDeEncomendas'),
('Gestor', 'viewIva'),
('Gestor', 'viewLoja'),
('Gestor', 'viewMetodoPagamento'),
('Gestor', 'viewOwn'),
('Gestor', 'viewProduto'),
('Gestor', 'viewPromocao'),
('Gestor', 'viewSeccao');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(11) NOT NULL,
  `estado` enum('aberto','emProcessamento','fechado') DEFAULT 'aberto',
  `data_criacao` datetime DEFAULT current_timestamp(),
  `id_morada` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_promocao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

INSERT INTO `carrinho` (`idCarrinho`, `estado`, `data_criacao`, `id_morada`, `id_loja`, `id_user`, `id_promocao`) VALUES
(1, 'fechado', '2023-01-09 02:27:16', 9, 1, 6, NULL),
(2, 'emProcessamento', '2023-01-09 02:27:50', 9, 1, 6, NULL),
(3, 'emProcessamento', '2023-01-09 02:33:06', 10, 1, 7, NULL),
(4, 'emProcessamento', '2023-01-09 02:34:19', 10, 2, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `id_iva` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nome`, `ativo`, `id_iva`, `id_categoria`) VALUES
(1, 'Carne', 1, 2, NULL),
(2, 'Carne de peru', 1, 2, 1),
(3, 'Carne de vaca', 1, 2, 1),
(4, 'Limpeza e cozinha', 1, 1, NULL),
(5, 'Bebé', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `descricao_social` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `id_morada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `descricao_social`, `email`, `telefone`, `nif`, `id_morada`) VALUES
(1, 'Stuff N\' Go', 'stuffngo.main@stuffngo.com', '925923001', '254342345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fatura`
--

CREATE TABLE `fatura` (
  `idFatura` int(11) NOT NULL,
  `nomeUtilizador` varchar(255) NOT NULL,
  `nifUtilizador` varchar(9) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL,
  `nifEmpresa` varchar(9) NOT NULL,
  `descricaoLoja` varchar(50) NOT NULL,
  `dataCriacao` datetime DEFAULT current_timestamp(),
  `id_metodo` int(11) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_carrinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fatura`
--

INSERT INTO `fatura` (`idFatura`, `nomeUtilizador`, `nifUtilizador`, `nomeEmpresa`, `nifEmpresa`, `descricaoLoja`, `dataCriacao`, `id_metodo`, `id_utilizador`, `id_loja`, `id_carrinho`) VALUES
(1, 'Tiago', '987658787', 'Stuff N\' Go', '254342345', 'Loja 1', '2023-01-09 01:28:09', 1, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorito`
--

CREATE TABLE `favorito` (
  `idFavorito` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorito`
--

INSERT INTO `favorito` (`idFavorito`, `id_produto`, `id_user`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `iva`
--

CREATE TABLE `iva` (
  `idIva` int(11) NOT NULL,
  `iva` float NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iva`
--

INSERT INTO `iva` (`idIva`, `iva`, `descricao`, `ativo`) VALUES
(1, 23, 'Taxa normal', 1),
(2, 13, 'Taxa intermédia', 1),
(3, 6, 'Taxa reduzida', 1);

-- --------------------------------------------------------

--
-- Table structure for table `linhaCarrinho`
--

CREATE TABLE `linhaCarrinho` (
  `idLinha` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `quantidade` int(11) NOT NULL,
  `id_carrinho` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linhaCarrinho`
--

INSERT INTO `linhaCarrinho` (`idLinha`, `estado`, `quantidade`, `id_carrinho`, `id_produto`) VALUES
(1, 1, 3, 1, 5),
(2, 1, 1, 1, 9),
(3, 1, 2, 2, 4),
(4, 1, 2, 2, 3),
(5, 1, 2, 3, 1),
(6, 1, 2, 3, 5),
(7, 0, 2, 4, 5),
(8, 0, 1, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `linhaFatura`
--

CREATE TABLE `linhaFatura` (
  `idLinha` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unit` float NOT NULL,
  `iva` float NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_fatura` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linhaFatura`
--

INSERT INTO `linhaFatura` (`idLinha`, `quantidade`, `preco_unit`, `iva`, `id_categoria`, `id_fatura`, `id_produto`) VALUES
(1, 3, 3.49, 13, 2, 1, 5),
(2, 1, 33.99, 6, 5, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `loja`
--

CREATE TABLE `loja` (
  `idLoja` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `id_morada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja`
--

INSERT INTO `loja` (`idLoja`, `id_empresa`, `descricao`, `email`, `telefone`, `ativo`, `id_morada`) VALUES
(1, 1, 'Loja 1', 'loja1@stuffngo.pt', '239111111', 1, 3),
(2, 1, 'Loja 2', 'loja2@stuffngo.pt', '239222222', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `loja_metodoPagamento`
--

CREATE TABLE `loja_metodoPagamento` (
  `loja_idLoja` int(11) NOT NULL,
  `metodoPagamento_idMetodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja_metodoPagamento`
--

INSERT INTO `loja_metodoPagamento` (`loja_idLoja`, `metodoPagamento_idMetodo`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loja_seccao`
--

CREATE TABLE `loja_seccao` (
  `loja_idLoja` int(11) NOT NULL,
  `seccao_idSeccao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja_seccao`
--

INSERT INTO `loja_seccao` (`loja_idLoja`, `seccao_idSeccao`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `metodoPagamento`
--

CREATE TABLE `metodoPagamento` (
  `idMetodo` int(11) NOT NULL,
  `metodoPagamento` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metodoPagamento`
--

INSERT INTO `metodoPagamento` (`idMetodo`, `metodoPagamento`, `ativo`) VALUES
(1, 'MbWay', 1),
(2, 'Numerário', 1),
(4, 'PayPal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
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
-- Table structure for table `morada`
--

CREATE TABLE `morada` (
  `idMorada` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `cod_postal` varchar(12) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `morada`
--

INSERT INTO `morada` (`idMorada`, `rua`, `cidade`, `cod_postal`, `pais`, `id_user`) VALUES
(1, 'Rua do Padrão', 'Porto', '1234-567', 'Portugal', NULL),
(2, 'Rua do Admin', 'Leiria', '2400', 'Portugal', 1),
(3, 'rua da loja 1', 'Leiria', '2400-022', 'Portugal', NULL),
(4, 'Rua da loja 2', 'coimbra', '3000', 'Portugal', NULL),
(5, 'Rua do Jorge', 'Porto', '4000-123', 'Portugal', 2),
(6, 'Rua do Fernando', 'Santarem', '1500-235', 'Portugal', 3),
(7, 'Rua  do Diogo', 'Coimbra', '4000-123', 'Portugal', 4),
(8, 'Rua do João', 'Anadia', '3000-587', 'Portugal', 5),
(9, 'Rua do Tiago', 'Santarem', '2005-698', 'Portugal', 6),
(10, 'Rua do Carreiro', 'Marinha Grande', '2544-457', 'Portugal', 7);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco_unit` float NOT NULL,
  `dataCriacao` datetime DEFAULT current_timestamp(),
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `preco_unit`, `dataCriacao`, `imagem`, `ativo`, `id_categoria`) VALUES
(1, 'Espetadas de vaca', 'Espetadas de Porco Preto com Pimentos Ultracongeladas ', 12.99, '2023-01-09 00:34:35', 'U_5grXfMF0u2AEzKPCeb4bQX29vM_vH2.jpg', 1, 3),
(2, 'Espetadas de peru', 'No Continente encontra todos os dias a carne mais fresca.', 6.69, '2023-01-09 00:35:37', '_81BrhCof6Os32wt9MiEn4YA8HZ7NCwc.jpg', 1, 2),
(3, 'Carne Picada', 'Preparado de Carne Picada de Bovino', 4.79, '2023-01-09 00:37:23', 'h7SeJuFe87Lyrd4rO52At5vYAsiisIQQ.jpg', 1, 3),
(4, 'Almôndegas', 'Almôndegas de Bovino', 4.59, '2023-01-09 00:38:21', 'bBPvW_LPU_kdGB7Jni5OM5a9V-QR2H8U.jpg', 1, 3),
(5, 'Perninha de Peru', 'Fonte de proteína e pobre em gordura (se removida a pele) ', 3.49, '2023-01-09 00:39:52', '7uBCCrEWxVT0ATIGouq-S_L_spsyO0UO.jpg', 1, 2),
(6, 'Bife de Peru', 'Os nossos profissionais, com formação especializada, selecionam a carne mais fresca para si.', 7.99, '2023-01-09 00:40:41', 'l3MAEHIaxbgyJOhEjyfoQc28Vbd5pWy6.jpg', 1, 2),
(7, 'Detergente Máquina', 'A opção em líquido para uma lavagem mais completa!', 17.24, '2023-01-09 00:42:44', 'd1mCdABuO8KPF8X4_XXd4Q_KrQPa2Ov-.jpg', 1, 4),
(8, 'Mopa Microfibra', 'Mopa com spray pode ser usada húmida, molhada ou a seco. Ideal para todo o tipo de pavimentos duros. Pode ser utilizado com ou sem detergente.', 34.99, '2023-01-09 00:43:48', 'ydGXiEfnAO-FFQ3DyIc1avpj0NZJI0Px.jpg', 1, 4),
(9, 'Almofada Dormi Locos', 'Agora pode dormir e descansar a qualquer hora e em qualquer lugar com os Dormi Locos Almofadas!', 33.99, '2023-01-09 00:47:06', 'muQEhNUAuNUbTmUTNvyi7hljOIQxRC46.jpg', 1, 5),
(10, 'Box Fraldas', 'Suave como o algodão, para um contacto delicado com a pele do seu bebé!', 22.99, '2023-01-09 00:49:08', 'PqTLE5MlzRSl4ZWcC-gl6bh8qC57fC53.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `promocao`
--

CREATE TABLE `promocao` (
  `idPromocao` int(11) NOT NULL,
  `nome_promo` varchar(50) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `percentagem` float NOT NULL,
  `data_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promocao`
--

INSERT INTO `promocao` (`idPromocao`, `nome_promo`, `codigo`, `percentagem`, `data_limite`) VALUES
(1, 'Dia dos Reis', 'L6W07', 10, '2023-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `seccao`
--

CREATE TABLE `seccao` (
  `idSeccao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seccao`
--

INSERT INTO `seccao` (`idSeccao`, `nome`) VALUES
(1, 'Peixaria'),
(2, 'Charcutaria'),
(3, 'Padaria'),
(4, 'Talho');

-- --------------------------------------------------------

--
-- Table structure for table `senhaDigital`
--

CREATE TABLE `senhaDigital` (
  `idSenha` int(11) NOT NULL,
  `id_seccao` int(11) DEFAULT NULL,
  `numeroAtual` int(11) DEFAULT 0,
  `ultimoNumero` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idStock` int(11) NOT NULL,
  `quant_stock` int(11) DEFAULT 0,
  `quant_req` int(11) DEFAULT 0,
  `id_produto` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idStock`, `quant_stock`, `quant_req`, `id_produto`, `id_loja`) VALUES
(1, 20, 0, 1, 1),
(2, 20, 0, 2, 1),
(3, 20, 0, 3, 1),
(4, 20, 0, 4, 1),
(5, 20, 0, 5, 1),
(6, 20, 0, 6, 1),
(7, 20, 0, 7, 1),
(8, 20, 0, 8, 1),
(9, 20, 0, 9, 1),
(10, 20, 0, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'w9MY9udTVVlUX_xyIjoHfG7JDt2q0ji7', '$2y$13$HBJ/eHBIsWNil6LezzRM7OXIkDsoa3DBk.Xu/qrVxjbvJrzVTd8Je', NULL, 'admin@teste.pt', 10, 1668448318, 1668448318, 'QaduEvJd2UT-2p1lIhW1MaZcGMFABw79_1668448318'),
(2, 'gestor1', 'a4P76Nh1yD1U77RPP_73aK7JC0pHTMXa', '$2y$13$Muhlk1K53s4XMoPaPCMU4.fJchfDEVhroB4MSJ2YlnB9K0xMLzLjm', NULL, 'gestor1@stuffngo.pt', 10, 1673225743, 1673225743, 'qD0zST66O7UhrV5xT6fhpFyxd_1CRGFw_1673225743'),
(3, 'gestor2', '7Zd8of8OSALuZj4O07ZCwyI8WJUH1rxw', '$2y$13$eK.o9088vjf6D78HmPpT8OU3rdXA98Szk93/XUzpfbWbDSaBrZlJ6', NULL, 'gestor2@stuffngo.pt', 10, 1673225805, 1673225805, 'yA0879ADYx4GUoLWBmzbc9I-egQanejJ_1673225805'),
(4, 'funcionario1', '2pkUitw3lF8CHUl5ZsE03qOLHdqLv7bx', '$2y$13$UY18PL2gy98nsPW8dcWsruPZT9A94V.17fdoMVNhbBYSrhHKGpRJ6', NULL, 'funcionario1@stuffngo.pt', 10, 1673225907, 1673225907, 'TRTTprWTFD4sKP8MDw4zk4JU1MSzDj4D_1673225907'),
(5, 'funcionario2', 'G0sopL967MIzZNlECeQ_ENo6O2PVJfv9', '$2y$13$MYTSNFjXkX9.S044WLbIUOHiF5Uq7Kfg8ZHMdgWYX26nTIGxpmLL2', NULL, 'funcionario2@stuffngo.pt', 10, 1673226187, 1673226187, 'XzJc7ttZ6Li_3D7SxmV-6kZxTAJYV68g_1673226187'),
(6, 'cliente1', 'EjcxGqpBhnEcyV4TPiSUjIQmTcPVLsHo', '$2y$13$sT8dcaDM5NdXvDOMhyoZjej2xlqDmGqbIPa3Jo8jYJlaYzoGBqgEW', NULL, 'cliente1@stuffngo.pt', 10, 1673226252, 1673227146, 'fGC4QdcMMxb4PpNhS6oiUfO7UVkRqFvw_1673226252'),
(7, 'cliente2', 'Rur0rt9RrKAGcmS0KoNx8SAFE9mp_xX3', '$2y$13$oCSD0Qc1ADa9z7EJYJCmOe8ePdhBsrZ9v0Zsr1JEJQLqZY49Hfouu', NULL, 'cliente2@stuffngo.pt', 10, 1673226340, 1673226340, 'mYU-0gmI7s9Y_OAUyUzcfYVMuJSKTjaE_1673226340');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizador`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`),
  ADD KEY `id_promocao` (`id_promocao`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_loja` (`id_loja`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_iva` (`id_iva`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_morada` (`id_morada`);

--
-- Indexes for table `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`idFatura`),
  ADD KEY `id_carrinho` (`id_carrinho`),
  ADD KEY `id_metodo` (`id_metodo`);

--
-- Indexes for table `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`idIva`),
  ADD UNIQUE KEY `iva` (`iva`);

--
-- Indexes for table `linhaCarrinho`
--
ALTER TABLE `linhaCarrinho`
  ADD PRIMARY KEY (`idLinha`),
  ADD KEY `id_carrinho` (`id_carrinho`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `linhaFatura`
--
ALTER TABLE `linhaFatura`
  ADD PRIMARY KEY (`idLinha`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_fatura` (`id_fatura`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`idLoja`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_morada` (`id_morada`);

--
-- Indexes for table `loja_metodoPagamento`
--
ALTER TABLE `loja_metodoPagamento`
  ADD PRIMARY KEY (`loja_idLoja`,`metodoPagamento_idMetodo`),
  ADD KEY `metodoPagamento_idMetodo` (`metodoPagamento_idMetodo`);

--
-- Indexes for table `loja_seccao`
--
ALTER TABLE `loja_seccao`
  ADD PRIMARY KEY (`loja_idLoja`,`seccao_idSeccao`),
  ADD KEY `seccao_idSeccao` (`seccao_idSeccao`);

--
-- Indexes for table `metodoPagamento`
--
ALTER TABLE `metodoPagamento`
  ADD PRIMARY KEY (`idMetodo`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `morada`
--
ALTER TABLE `morada`
  ADD PRIMARY KEY (`idMorada`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`idPromocao`),
  ADD UNIQUE KEY `nome_promo` (`nome_promo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `seccao`
--
ALTER TABLE `seccao`
  ADD PRIMARY KEY (`idSeccao`);

--
-- Indexes for table `senhaDigital`
--
ALTER TABLE `senhaDigital`
  ADD PRIMARY KEY (`idSenha`),
  ADD KEY `id_seccao` (`id_seccao`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`),
  ADD KEY `id_loja` (`id_loja`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD KEY `id_loja` (`id_loja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idCarrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fatura`
--
ALTER TABLE `fatura`
  MODIFY `idFatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iva`
--
ALTER TABLE `iva`
  MODIFY `idIva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `linhaCarrinho`
--
ALTER TABLE `linhaCarrinho`
  MODIFY `idLinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `linhaFatura`
--
ALTER TABLE `linhaFatura`
  MODIFY `idLinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `idLoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metodoPagamento`
--
ALTER TABLE `metodoPagamento`
  MODIFY `idMetodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `morada`
--
ALTER TABLE `morada`
  MODIFY `idMorada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `idPromocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seccao`
--
ALTER TABLE `seccao`
  MODIFY `idSeccao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `senhaDigital`
--
ALTER TABLE `senhaDigital`
  MODIFY `idSenha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_promocao`) REFERENCES `promocao` (`idPromocao`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`),
  ADD CONSTRAINT `carrinho_ibfk_3` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);

--
-- Constraints for table `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`id_iva`) REFERENCES `iva` (`idIva`);

--
-- Constraints for table `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_morada`) REFERENCES `morada` (`idMorada`);

--
-- Constraints for table `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`idCarrinho`),
  ADD CONSTRAINT `fatura_ibfk_2` FOREIGN KEY (`id_metodo`) REFERENCES `metodoPagamento` (`idMetodo`);

--
-- Constraints for table `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

--
-- Constraints for table `linhaCarrinho`
--
ALTER TABLE `linhaCarrinho`
  ADD CONSTRAINT `linhaCarrinho_ibfk_1` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`idCarrinho`),
  ADD CONSTRAINT `linhaCarrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

--
-- Constraints for table `linhaFatura`
--
ALTER TABLE `linhaFatura`
  ADD CONSTRAINT `linhaFatura_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `linhaFatura_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `linhaFatura_ibfk_3` FOREIGN KEY (`id_fatura`) REFERENCES `fatura` (`idFatura`);

--
-- Constraints for table `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `loja_ibfk_2` FOREIGN KEY (`id_morada`) REFERENCES `morada` (`idMorada`);

--
-- Constraints for table `loja_metodoPagamento`
--
ALTER TABLE `loja_metodoPagamento`
  ADD CONSTRAINT `loja_metodoPagamento_ibfk_1` FOREIGN KEY (`loja_idLoja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `loja_metodoPagamento_ibfk_2` FOREIGN KEY (`metodoPagamento_idMetodo`) REFERENCES `metodoPagamento` (`idMetodo`);

--
-- Constraints for table `loja_seccao`
--
ALTER TABLE `loja_seccao`
  ADD CONSTRAINT `loja_seccao_ibfk_1` FOREIGN KEY (`loja_idLoja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `loja_seccao_ibfk_2` FOREIGN KEY (`seccao_idSeccao`) REFERENCES `seccao` (`idSeccao`);

--
-- Constraints for table `morada`
--
ALTER TABLE `morada`
  ADD CONSTRAINT `morada_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Constraints for table `senhaDigital`
--
ALTER TABLE `senhaDigital`
  ADD CONSTRAINT `senhaDigital_ibfk_1` FOREIGN KEY (`id_seccao`) REFERENCES `seccao` (`idSeccao`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

--
-- Constraints for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE DATABASE IF NOT EXISTS stuffngo_test;

use stuffngo_test;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1673223418),
('Cliente', '6', 1673226252),
('Cliente', '7', 1673226340),
('Funcionario', '4', 1673225907),
('Funcionario', '5', 1673226187),
('Gestor', '2', 1673225743),
('Gestor', '3', 1673225805);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('backend', 2, 'Aceder ao backend', NULL, NULL, 1673246550, 1673246550),
('Cliente', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('createAdmin', 2, 'Criar um Admin', NULL, NULL, 1673246550, 1673246550),
('createCategoria', 2, 'Criar uma categoria', NULL, NULL, 1673246550, 1673246550),
('createCliente', 2, 'Criar um cliente', NULL, NULL, 1673246550, 1673246550),
('createEncomenda', 2, 'Criar uma encomenda', NULL, NULL, 1673246550, 1673246550),
('createFuncionario', 2, 'Criar um funcionário', NULL, NULL, 1673246550, 1673246550),
('createGestor', 2, 'Criar um Gestor', NULL, NULL, 1673246550, 1673246550),
('createIva', 2, 'Criar uma taxa IVA', NULL, NULL, 1673246550, 1673246550),
('createLoja', 2, 'Criar uma Loja', NULL, NULL, 1673246550, 1673246550),
('createMetodoPagamento', 2, 'Criar um tipo de pagamento', NULL, NULL, 1673246550, 1673246550),
('createMorada', 2, 'Criar uma morada', NULL, NULL, 1673246550, 1673246550),
('createProduto', 2, 'Criar um produto', NULL, NULL, 1673246550, 1673246550),
('createPromocao', 2, 'Criar uma promocao', NULL, NULL, 1673246550, 1673246550),
('createReview', 2, 'Criar uma review', NULL, NULL, 1673246550, 1673246550),
('createSeccao', 2, 'Criar uma seccao', NULL, NULL, 1673246550, 1673246550),
('deleteAdmin', 2, 'Desativar um administrador', NULL, NULL, 1673246550, 1673246550),
('deleteCategoria', 2, 'Desativar uma categoria', NULL, NULL, 1673246550, 1673246550),
('deleteCliente', 2, 'Desativar um cliente', NULL, NULL, 1673246550, 1673246550),
('deleteFuncionario', 2, 'Desativar um funcionário', NULL, NULL, 1673246550, 1673246550),
('deleteGestor', 2, 'Desativar um gestor', NULL, NULL, 1673246550, 1673246550),
('deleteIva', 2, 'Desativar uma taxa IVA', NULL, NULL, 1673246550, 1673246550),
('deleteLoja', 2, 'Remover uma loja', NULL, NULL, 1673246550, 1673246550),
('deleteMetodoPagamento', 2, 'Remover um metodo de pagamento', NULL, NULL, 1673246550, 1673246550),
('deleteMorada', 2, 'Remover uma morada', NULL, NULL, 1673246550, 1673246550),
('deleteProduto', 2, 'Desativar um produto', NULL, NULL, 1673246550, 1673246550),
('deletePromocao', 2, 'Remover uma promocao', NULL, NULL, 1673246550, 1673246550),
('deleteSeccao', 2, 'Remover uma seccao', NULL, NULL, 1673246550, 1673246550),
('favoritos', 2, 'Adicionar/Remover um produto aos favoritos', NULL, NULL, 1673246550, 1673246550),
('Funcionario', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('gestaoLoja', 2, 'Gerir Loja', NULL, NULL, 1673246550, 1673246550),
('Gestor', 1, NULL, NULL, NULL, 1673246550, 1673246550),
('updateAdmin', 2, 'Atualizar os dados de um administrador', NULL, NULL, 1673246550, 1673246550),
('updateCategoria', 2, 'Atualizar uma categoria', NULL, NULL, 1673246550, 1673246550),
('updateCliente', 2, 'Atualizar os dados de um cliente', NULL, NULL, 1673246550, 1673246550),
('updateDadosEmpresa', 2, 'Atualizar os dados de uma empresa', NULL, NULL, 1673246550, 1673246550),
('updateEmpresa', 2, 'Atualizar os dados de uma empresa', NULL, NULL, 1673246550, 1673246550),
('updateFuncionario', 2, 'Atualizar os dados de um funcionário', NULL, NULL, 1673246550, 1673246550),
('updateGestor', 2, 'Atualizar os dados de um gestor', NULL, NULL, 1673246550, 1673246550),
('updateIva', 2, 'Atualizar uma taxa IVA', NULL, NULL, 1673246550, 1673246550),
('updateLoja', 2, 'Atualizar os dados de uma loja', NULL, NULL, 1673246550, 1673246550),
('updateMetodoPagamento', 2, 'Atualizar um metodo de pagamento', NULL, NULL, 1673246550, 1673246550),
('updateMorada', 2, 'Atualizar os dados de uma morada', NULL, NULL, 1673246550, 1673246550),
('updateMoradaEncomenda', 2, 'Atualizar a morada de uma encomenda', NULL, NULL, 1673246550, 1673246550),
('updateOwn', 2, 'Atualizar os dados do próprio utilizador', NULL, NULL, 1673246550, 1673246550),
('updateProduto', 2, 'Atualizar um produto', NULL, NULL, 1673246550, 1673246550),
('updatePromocao', 2, 'Atualizar os dados de uma promocao', NULL, NULL, 1673246550, 1673246550),
('updateSeccao', 2, 'Atualizar os dados de uma seccao', NULL, NULL, 1673246550, 1673246550),
('updateStatusEncomenda', 2, 'Atualizar o status de uma encomenda', NULL, NULL, 1673246550, 1673246550),
('updateStock', 2, 'Atualizar o stock de um produto', NULL, NULL, 1673246550, 1673246550),
('viewAdmin', 2, 'Ver a listagem de todos administradores', NULL, NULL, 1673246550, 1673246550),
('viewCategorias', 2, 'Ver a listagem de todas as categorias', NULL, NULL, 1673246550, 1673246550),
('viewCliente', 2, 'Ver os dados de um cliente', NULL, NULL, 1673246550, 1673246550),
('viewEmpresa', 2, 'Ver os dados da empresa', NULL, NULL, 1673246550, 1673246550),
('viewEstatisticas', 2, 'Ver as estatisticas da loja', NULL, NULL, 1673246550, 1673246550),
('viewFuncionario', 2, 'Ver a listagem de todos funcionários', NULL, NULL, 1673246550, 1673246550),
('viewGestor', 2, 'Ver a listagem de todos gestores', NULL, NULL, 1673246550, 1673246550),
('viewHistoricoDeEncomendas', 2, 'Ver o historico de encomendas', NULL, NULL, 1673246550, 1673246550),
('viewIva', 2, 'Ver a listagem de todas as taxas IVA', NULL, NULL, 1673246550, 1673246550),
('viewLoja', 2, 'Ver os dados da loja', NULL, NULL, 1673246550, 1673246550),
('viewMetodoPagamento', 2, 'Ver a listagem de todos os metodos de pagamento', NULL, NULL, 1673246550, 1673246550),
('viewOwn', 2, 'Ver os dados do proprio utilizador', NULL, NULL, 1673246550, 1673246550),
('viewProduto', 2, 'Ver produtos', NULL, NULL, 1673246550, 1673246550),
('viewPromocao', 2, 'Ver a listagem de todas as promocoes', NULL, NULL, 1673246550, 1673246550),
('viewSeccao', 2, 'Ver as seccoes das lojas', NULL, NULL, 1673246550, 1673246550);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'backend'),
('Admin', 'createAdmin'),
('Admin', 'createCategoria'),
('Admin', 'createCliente'),
('Admin', 'createFuncionario'),
('Admin', 'createGestor'),
('Admin', 'createIva'),
('Admin', 'createLoja'),
('Admin', 'createMetodoPagamento'),
('Admin', 'createMorada'),
('Admin', 'createProduto'),
('Admin', 'createPromocao'),
('Admin', 'createSeccao'),
('Admin', 'deleteAdmin'),
('Admin', 'deleteCategoria'),
('Admin', 'deleteCliente'),
('Admin', 'deleteFuncionario'),
('Admin', 'deleteGestor'),
('Admin', 'deleteIva'),
('Admin', 'deleteLoja'),
('Admin', 'deleteMetodoPagamento'),
('Admin', 'deleteMorada'),
('Admin', 'deleteProduto'),
('Admin', 'deletePromocao'),
('Admin', 'deleteSeccao'),
('Admin', 'gestaoLoja'),
('Admin', 'updateAdmin'),
('Admin', 'updateCategoria'),
('Admin', 'updateCliente'),
('Admin', 'updateDadosEmpresa'),
('Admin', 'updateEmpresa'),
('Admin', 'updateFuncionario'),
('Admin', 'updateGestor'),
('Admin', 'updateIva'),
('Admin', 'updateLoja'),
('Admin', 'updateMetodoPagamento'),
('Admin', 'updateMorada'),
('Admin', 'updateOwn'),
('Admin', 'updateProduto'),
('Admin', 'updatePromocao'),
('Admin', 'updateSeccao'),
('Admin', 'updateStatusEncomenda'),
('Admin', 'viewAdmin'),
('Admin', 'viewCategorias'),
('Admin', 'viewCliente'),
('Admin', 'viewEmpresa'),
('Admin', 'viewEstatisticas'),
('Admin', 'viewFuncionario'),
('Admin', 'viewGestor'),
('Admin', 'viewHistoricoDeEncomendas'),
('Admin', 'viewIva'),
('Admin', 'viewLoja'),
('Admin', 'viewMetodoPagamento'),
('Admin', 'viewOwn'),
('Admin', 'viewProduto'),
('Admin', 'viewPromocao'),
('Admin', 'viewSeccao'),
('Cliente', 'createEncomenda'),
('Cliente', 'createReview'),
('Cliente', 'deleteMorada'),
('Cliente', 'favoritos'),
('Cliente', 'updateOwn'),
('Cliente', 'viewHistoricoDeEncomendas'),
('Cliente', 'viewOwn'),
('Funcionario', 'backend'),
('Funcionario', 'createCliente'),
('Funcionario', 'deleteCliente'),
('Funcionario', 'deleteMorada'),
('Funcionario', 'updateCliente'),
('Funcionario', 'updateOwn'),
('Funcionario', 'updateStatusEncomenda'),
('Funcionario', 'updateStock'),
('Funcionario', 'viewCliente'),
('Funcionario', 'viewHistoricoDeEncomendas'),
('Funcionario', 'viewOwn'),
('Gestor', 'backend'),
('Gestor', 'createCategoria'),
('Gestor', 'createCliente'),
('Gestor', 'createFuncionario'),
('Gestor', 'createIva'),
('Gestor', 'createMetodoPagamento'),
('Gestor', 'createMorada'),
('Gestor', 'createProduto'),
('Gestor', 'createPromocao'),
('Gestor', 'createSeccao'),
('Gestor', 'deleteCategoria'),
('Gestor', 'deleteCliente'),
('Gestor', 'deleteFuncionario'),
('Gestor', 'deleteIva'),
('Gestor', 'deleteMetodoPagamento'),
('Gestor', 'deleteMorada'),
('Gestor', 'deleteProduto'),
('Gestor', 'deletePromocao'),
('Gestor', 'deleteSeccao'),
('Gestor', 'gestaoLoja'),
('Gestor', 'updateCategoria'),
('Gestor', 'updateCliente'),
('Gestor', 'updateFuncionario'),
('Gestor', 'updateIva'),
('Gestor', 'updateLoja'),
('Gestor', 'updateMetodoPagamento'),
('Gestor', 'updateMorada'),
('Gestor', 'updateOwn'),
('Gestor', 'updateProduto'),
('Gestor', 'updatePromocao'),
('Gestor', 'updateSeccao'),
('Gestor', 'updateStatusEncomenda'),
('Gestor', 'viewCategorias'),
('Gestor', 'viewCliente'),
('Gestor', 'viewEstatisticas'),
('Gestor', 'viewFuncionario'),
('Gestor', 'viewHistoricoDeEncomendas'),
('Gestor', 'viewIva'),
('Gestor', 'viewLoja'),
('Gestor', 'viewMetodoPagamento'),
('Gestor', 'viewOwn'),
('Gestor', 'viewProduto'),
('Gestor', 'viewPromocao'),
('Gestor', 'viewSeccao');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(11) NOT NULL,
  `estado` enum('aberto','emProcessamento','fechado') DEFAULT 'aberto',
  `data_criacao` datetime DEFAULT current_timestamp(),
  `id_morada` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_promocao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

INSERT INTO `carrinho` (`idCarrinho`, `estado`, `data_criacao`, `id_morada`, `id_loja`, `id_user`, `id_promocao`) VALUES
(1, 'fechado', '2023-01-09 02:27:16', 9, 1, 6, NULL),
(2, 'emProcessamento', '2023-01-09 02:27:50', 9, 1, 6, NULL),
(3, 'emProcessamento', '2023-01-09 02:33:06', 10, 1, 7, NULL),
(4, 'emProcessamento', '2023-01-09 02:34:19', 10, 2, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `id_iva` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nome`, `ativo`, `id_iva`, `id_categoria`) VALUES
(1, 'Carne', 1, 2, NULL),
(2, 'Carne de peru', 1, 2, 1),
(3, 'Carne de vaca', 1, 2, 1),
(4, 'Limpeza e cozinha', 1, 1, NULL),
(5, 'Bebé', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `descricao_social` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `id_morada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `descricao_social`, `email`, `telefone`, `nif`, `id_morada`) VALUES
(1, 'Stuff N\' Go', 'stuffngo.main@stuffngo.com', '925923001', '254342345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fatura`
--

CREATE TABLE `fatura` (
  `idFatura` int(11) NOT NULL,
  `nomeUtilizador` varchar(255) NOT NULL,
  `nifUtilizador` varchar(9) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL,
  `nifEmpresa` varchar(9) NOT NULL,
  `descricaoLoja` varchar(50) NOT NULL,
  `dataCriacao` datetime DEFAULT current_timestamp(),
  `id_metodo` int(11) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_carrinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fatura`
--

INSERT INTO `fatura` (`idFatura`, `nomeUtilizador`, `nifUtilizador`, `nomeEmpresa`, `nifEmpresa`, `descricaoLoja`, `dataCriacao`, `id_metodo`, `id_utilizador`, `id_loja`, `id_carrinho`) VALUES
(1, 'Tiago', '987658787', 'Stuff N\' Go', '254342345', 'Loja 1', '2023-01-09 01:28:09', 1, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorito`
--

CREATE TABLE `favorito` (
  `idFavorito` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorito`
--

INSERT INTO `favorito` (`idFavorito`, `id_produto`, `id_user`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `iva`
--

CREATE TABLE `iva` (
  `idIva` int(11) NOT NULL,
  `iva` float NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iva`
--

INSERT INTO `iva` (`idIva`, `iva`, `descricao`, `ativo`) VALUES
(1, 23, 'Taxa normal', 1),
(2, 13, 'Taxa intermédia', 1),
(3, 6, 'Taxa reduzida', 1);

-- --------------------------------------------------------

--
-- Table structure for table `linhaCarrinho`
--

CREATE TABLE `linhaCarrinho` (
  `idLinha` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `quantidade` int(11) NOT NULL,
  `id_carrinho` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linhaCarrinho`
--

INSERT INTO `linhaCarrinho` (`idLinha`, `estado`, `quantidade`, `id_carrinho`, `id_produto`) VALUES
(1, 1, 3, 1, 5),
(2, 1, 1, 1, 9),
(3, 1, 2, 2, 4),
(4, 1, 2, 2, 3),
(5, 1, 2, 3, 1),
(6, 1, 2, 3, 5),
(7, 0, 2, 4, 5),
(8, 0, 1, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `linhaFatura`
--

CREATE TABLE `linhaFatura` (
  `idLinha` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unit` float NOT NULL,
  `iva` float NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_fatura` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linhaFatura`
--

INSERT INTO `linhaFatura` (`idLinha`, `quantidade`, `preco_unit`, `iva`, `id_categoria`, `id_fatura`, `id_produto`) VALUES
(1, 3, 3.49, 13, 2, 1, 5),
(2, 1, 33.99, 6, 5, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `loja`
--

CREATE TABLE `loja` (
  `idLoja` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `id_morada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja`
--

INSERT INTO `loja` (`idLoja`, `id_empresa`, `descricao`, `email`, `telefone`, `ativo`, `id_morada`) VALUES
(1, 1, 'Loja 1', 'loja1@stuffngo.pt', '239111111', 1, 3),
(2, 1, 'Loja 2', 'loja2@stuffngo.pt', '239222222', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `loja_metodoPagamento`
--

CREATE TABLE `loja_metodoPagamento` (
  `loja_idLoja` int(11) NOT NULL,
  `metodoPagamento_idMetodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja_metodoPagamento`
--

INSERT INTO `loja_metodoPagamento` (`loja_idLoja`, `metodoPagamento_idMetodo`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loja_seccao`
--

CREATE TABLE `loja_seccao` (
  `loja_idLoja` int(11) NOT NULL,
  `seccao_idSeccao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja_seccao`
--

INSERT INTO `loja_seccao` (`loja_idLoja`, `seccao_idSeccao`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `metodoPagamento`
--

CREATE TABLE `metodoPagamento` (
  `idMetodo` int(11) NOT NULL,
  `metodoPagamento` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metodoPagamento`
--

INSERT INTO `metodoPagamento` (`idMetodo`, `metodoPagamento`, `ativo`) VALUES
(1, 'MbWay', 1),
(2, 'Numerário', 1),
(4, 'PayPal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
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
-- Table structure for table `morada`
--

CREATE TABLE `morada` (
  `idMorada` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `cod_postal` varchar(12) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `morada`
--

INSERT INTO `morada` (`idMorada`, `rua`, `cidade`, `cod_postal`, `pais`, `id_user`) VALUES
(1, 'Rua do Padrão', 'Porto', '1234-567', 'Portugal', NULL),
(2, 'Rua do Admin', 'Leiria', '2400', 'Portugal', 1),
(3, 'rua da loja 1', 'Leiria', '2400-022', 'Portugal', NULL),
(4, 'Rua da loja 2', 'coimbra', '3000', 'Portugal', NULL),
(5, 'Rua do Jorge', 'Porto', '4000-123', 'Portugal', 2),
(6, 'Rua do Fernando', 'Santarem', '1500-235', 'Portugal', 3),
(7, 'Rua  do Diogo', 'Coimbra', '4000-123', 'Portugal', 4),
(8, 'Rua do João', 'Anadia', '3000-587', 'Portugal', 5),
(9, 'Rua do Tiago', 'Santarem', '2005-698', 'Portugal', 6),
(10, 'Rua do Carreiro', 'Marinha Grande', '2544-457', 'Portugal', 7);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco_unit` float NOT NULL,
  `dataCriacao` datetime DEFAULT current_timestamp(),
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `preco_unit`, `dataCriacao`, `imagem`, `ativo`, `id_categoria`) VALUES
(1, 'Espetadas de vaca', 'Espetadas de Porco Preto com Pimentos Ultracongeladas ', 12.99, '2023-01-09 00:34:35', 'U_5grXfMF0u2AEzKPCeb4bQX29vM_vH2.jpg', 1, 3),
(2, 'Espetadas de peru', 'No Continente encontra todos os dias a carne mais fresca.', 6.69, '2023-01-09 00:35:37', '_81BrhCof6Os32wt9MiEn4YA8HZ7NCwc.jpg', 1, 2),
(3, 'Carne Picada', 'Preparado de Carne Picada de Bovino', 4.79, '2023-01-09 00:37:23', 'h7SeJuFe87Lyrd4rO52At5vYAsiisIQQ.jpg', 1, 3),
(4, 'Almôndegas', 'Almôndegas de Bovino', 4.59, '2023-01-09 00:38:21', 'bBPvW_LPU_kdGB7Jni5OM5a9V-QR2H8U.jpg', 1, 3),
(5, 'Perninha de Peru', 'Fonte de proteína e pobre em gordura (se removida a pele) ', 3.49, '2023-01-09 00:39:52', '7uBCCrEWxVT0ATIGouq-S_L_spsyO0UO.jpg', 1, 2),
(6, 'Bife de Peru', 'Os nossos profissionais, com formação especializada, selecionam a carne mais fresca para si.', 7.99, '2023-01-09 00:40:41', 'l3MAEHIaxbgyJOhEjyfoQc28Vbd5pWy6.jpg', 1, 2),
(7, 'Detergente Máquina', 'A opção em líquido para uma lavagem mais completa!', 17.24, '2023-01-09 00:42:44', 'd1mCdABuO8KPF8X4_XXd4Q_KrQPa2Ov-.jpg', 1, 4),
(8, 'Mopa Microfibra', 'Mopa com spray pode ser usada húmida, molhada ou a seco. Ideal para todo o tipo de pavimentos duros. Pode ser utilizado com ou sem detergente.', 34.99, '2023-01-09 00:43:48', 'ydGXiEfnAO-FFQ3DyIc1avpj0NZJI0Px.jpg', 1, 4),
(9, 'Almofada Dormi Locos', 'Agora pode dormir e descansar a qualquer hora e em qualquer lugar com os Dormi Locos Almofadas!', 33.99, '2023-01-09 00:47:06', 'muQEhNUAuNUbTmUTNvyi7hljOIQxRC46.jpg', 1, 5),
(10, 'Box Fraldas', 'Suave como o algodão, para um contacto delicado com a pele do seu bebé!', 22.99, '2023-01-09 00:49:08', 'PqTLE5MlzRSl4ZWcC-gl6bh8qC57fC53.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `promocao`
--

CREATE TABLE `promocao` (
  `idPromocao` int(11) NOT NULL,
  `nome_promo` varchar(50) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `percentagem` float NOT NULL,
  `data_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promocao`
--

INSERT INTO `promocao` (`idPromocao`, `nome_promo`, `codigo`, `percentagem`, `data_limite`) VALUES
(1, 'Dia dos Reis', 'L6W07', 10, '2023-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `seccao`
--

CREATE TABLE `seccao` (
  `idSeccao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seccao`
--

INSERT INTO `seccao` (`idSeccao`, `nome`) VALUES
(1, 'Peixaria'),
(2, 'Charcutaria'),
(3, 'Padaria'),
(4, 'Talho');

-- --------------------------------------------------------

--
-- Table structure for table `senhaDigital`
--

CREATE TABLE `senhaDigital` (
  `idSenha` int(11) NOT NULL,
  `id_seccao` int(11) DEFAULT NULL,
  `numeroAtual` int(11) DEFAULT 0,
  `ultimoNumero` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idStock` int(11) NOT NULL,
  `quant_stock` int(11) DEFAULT 0,
  `quant_req` int(11) DEFAULT 0,
  `id_produto` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idStock`, `quant_stock`, `quant_req`, `id_produto`, `id_loja`) VALUES
(1, 20, 0, 1, 1),
(2, 20, 0, 2, 1),
(3, 20, 0, 3, 1),
(4, 20, 0, 4, 1),
(5, 20, 0, 5, 1),
(6, 20, 0, 6, 1),
(7, 20, 0, 7, 1),
(8, 20, 0, 8, 1),
(9, 20, 0, 9, 1),
(10, 20, 0, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'w9MY9udTVVlUX_xyIjoHfG7JDt2q0ji7', '$2y$13$HBJ/eHBIsWNil6LezzRM7OXIkDsoa3DBk.Xu/qrVxjbvJrzVTd8Je', NULL, 'admin@teste.pt', 10, 1668448318, 1668448318, 'QaduEvJd2UT-2p1lIhW1MaZcGMFABw79_1668448318'),
(2, 'gestor1', 'a4P76Nh1yD1U77RPP_73aK7JC0pHTMXa', '$2y$13$Muhlk1K53s4XMoPaPCMU4.fJchfDEVhroB4MSJ2YlnB9K0xMLzLjm', NULL, 'gestor1@stuffngo.pt', 10, 1673225743, 1673225743, 'qD0zST66O7UhrV5xT6fhpFyxd_1CRGFw_1673225743'),
(3, 'gestor2', '7Zd8of8OSALuZj4O07ZCwyI8WJUH1rxw', '$2y$13$eK.o9088vjf6D78HmPpT8OU3rdXA98Szk93/XUzpfbWbDSaBrZlJ6', NULL, 'gestor2@stuffngo.pt', 10, 1673225805, 1673225805, 'yA0879ADYx4GUoLWBmzbc9I-egQanejJ_1673225805'),
(4, 'funcionario1', '2pkUitw3lF8CHUl5ZsE03qOLHdqLv7bx', '$2y$13$UY18PL2gy98nsPW8dcWsruPZT9A94V.17fdoMVNhbBYSrhHKGpRJ6', NULL, 'funcionario1@stuffngo.pt', 10, 1673225907, 1673225907, 'TRTTprWTFD4sKP8MDw4zk4JU1MSzDj4D_1673225907'),
(5, 'funcionario2', 'G0sopL967MIzZNlECeQ_ENo6O2PVJfv9', '$2y$13$MYTSNFjXkX9.S044WLbIUOHiF5Uq7Kfg8ZHMdgWYX26nTIGxpmLL2', NULL, 'funcionario2@stuffngo.pt', 10, 1673226187, 1673226187, 'XzJc7ttZ6Li_3D7SxmV-6kZxTAJYV68g_1673226187'),
(6, 'cliente1', 'EjcxGqpBhnEcyV4TPiSUjIQmTcPVLsHo', '$2y$13$sT8dcaDM5NdXvDOMhyoZjej2xlqDmGqbIPa3Jo8jYJlaYzoGBqgEW', NULL, 'cliente1@stuffngo.pt', 10, 1673226252, 1673227146, 'fGC4QdcMMxb4PpNhS6oiUfO7UVkRqFvw_1673226252'),
(7, 'cliente2', 'Rur0rt9RrKAGcmS0KoNx8SAFE9mp_xX3', '$2y$13$oCSD0Qc1ADa9z7EJYJCmOe8ePdhBsrZ9v0Zsr1JEJQLqZY49Hfouu', NULL, 'cliente2@stuffngo.pt', 10, 1673226340, 1673226340, 'mYU-0gmI7s9Y_OAUyUzcfYVMuJSKTjaE_1673226340');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizador`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`),
  ADD KEY `id_promocao` (`id_promocao`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_loja` (`id_loja`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_iva` (`id_iva`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_morada` (`id_morada`);

--
-- Indexes for table `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`idFatura`),
  ADD KEY `id_carrinho` (`id_carrinho`),
  ADD KEY `id_metodo` (`id_metodo`);

--
-- Indexes for table `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`idIva`),
  ADD UNIQUE KEY `iva` (`iva`);

--
-- Indexes for table `linhaCarrinho`
--
ALTER TABLE `linhaCarrinho`
  ADD PRIMARY KEY (`idLinha`),
  ADD KEY `id_carrinho` (`id_carrinho`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `linhaFatura`
--
ALTER TABLE `linhaFatura`
  ADD PRIMARY KEY (`idLinha`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_fatura` (`id_fatura`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`idLoja`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_morada` (`id_morada`);

--
-- Indexes for table `loja_metodoPagamento`
--
ALTER TABLE `loja_metodoPagamento`
  ADD PRIMARY KEY (`loja_idLoja`,`metodoPagamento_idMetodo`),
  ADD KEY `metodoPagamento_idMetodo` (`metodoPagamento_idMetodo`);

--
-- Indexes for table `loja_seccao`
--
ALTER TABLE `loja_seccao`
  ADD PRIMARY KEY (`loja_idLoja`,`seccao_idSeccao`),
  ADD KEY `seccao_idSeccao` (`seccao_idSeccao`);

--
-- Indexes for table `metodoPagamento`
--
ALTER TABLE `metodoPagamento`
  ADD PRIMARY KEY (`idMetodo`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `morada`
--
ALTER TABLE `morada`
  ADD PRIMARY KEY (`idMorada`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`idPromocao`),
  ADD UNIQUE KEY `nome_promo` (`nome_promo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `seccao`
--
ALTER TABLE `seccao`
  ADD PRIMARY KEY (`idSeccao`);

--
-- Indexes for table `senhaDigital`
--
ALTER TABLE `senhaDigital`
  ADD PRIMARY KEY (`idSenha`),
  ADD KEY `id_seccao` (`id_seccao`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`),
  ADD KEY `id_loja` (`id_loja`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD KEY `id_loja` (`id_loja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idCarrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fatura`
--
ALTER TABLE `fatura`
  MODIFY `idFatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iva`
--
ALTER TABLE `iva`
  MODIFY `idIva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `linhaCarrinho`
--
ALTER TABLE `linhaCarrinho`
  MODIFY `idLinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `linhaFatura`
--
ALTER TABLE `linhaFatura`
  MODIFY `idLinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `idLoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metodoPagamento`
--
ALTER TABLE `metodoPagamento`
  MODIFY `idMetodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `morada`
--
ALTER TABLE `morada`
  MODIFY `idMorada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `idPromocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seccao`
--
ALTER TABLE `seccao`
  MODIFY `idSeccao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `senhaDigital`
--
ALTER TABLE `senhaDigital`
  MODIFY `idSenha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_promocao`) REFERENCES `promocao` (`idPromocao`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`),
  ADD CONSTRAINT `carrinho_ibfk_3` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);

--
-- Constraints for table `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`id_iva`) REFERENCES `iva` (`idIva`);

--
-- Constraints for table `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_morada`) REFERENCES `morada` (`idMorada`);

--
-- Constraints for table `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`idCarrinho`),
  ADD CONSTRAINT `fatura_ibfk_2` FOREIGN KEY (`id_metodo`) REFERENCES `metodoPagamento` (`idMetodo`);

--
-- Constraints for table `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

--
-- Constraints for table `linhaCarrinho`
--
ALTER TABLE `linhaCarrinho`
  ADD CONSTRAINT `linhaCarrinho_ibfk_1` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`idCarrinho`),
  ADD CONSTRAINT `linhaCarrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

--
-- Constraints for table `linhaFatura`
--
ALTER TABLE `linhaFatura`
  ADD CONSTRAINT `linhaFatura_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `linhaFatura_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `linhaFatura_ibfk_3` FOREIGN KEY (`id_fatura`) REFERENCES `fatura` (`idFatura`);

--
-- Constraints for table `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `loja_ibfk_2` FOREIGN KEY (`id_morada`) REFERENCES `morada` (`idMorada`);

--
-- Constraints for table `loja_metodoPagamento`
--
ALTER TABLE `loja_metodoPagamento`
  ADD CONSTRAINT `loja_metodoPagamento_ibfk_1` FOREIGN KEY (`loja_idLoja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `loja_metodoPagamento_ibfk_2` FOREIGN KEY (`metodoPagamento_idMetodo`) REFERENCES `metodoPagamento` (`idMetodo`);

--
-- Constraints for table `loja_seccao`
--
ALTER TABLE `loja_seccao`
  ADD CONSTRAINT `loja_seccao_ibfk_1` FOREIGN KEY (`loja_idLoja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `loja_seccao_ibfk_2` FOREIGN KEY (`seccao_idSeccao`) REFERENCES `seccao` (`idSeccao`);

--
-- Constraints for table `morada`
--
ALTER TABLE `morada`
  ADD CONSTRAINT `morada_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Constraints for table `senhaDigital`
--
ALTER TABLE `senhaDigital`
  ADD CONSTRAINT `senhaDigital_ibfk_1` FOREIGN KEY (`id_seccao`) REFERENCES `seccao` (`idSeccao`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

--
-- Constraints for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

