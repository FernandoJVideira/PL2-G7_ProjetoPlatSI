use stuffngo;

CREATE TABLE `empresa` (
  `idEmpresa` int PRIMARY KEY AUTO_INCREMENT,
  `descricao_social` varchar(255) NOT NULL,
  `email` varchar(50) UNIQUE NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `id_morada` int
) ENGINE InnoDB;

CREATE TABLE `loja` (
  `idLoja` int PRIMARY KEY AUTO_INCREMENT,
  `id_empresa` int,
  `descricao` varchar(255) NOT NULL,
  `email` varchar(50) UNIQUE NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `ativo` boolean DEFAULT 1,
  `id_morada` int
) ENGINE InnoDB;

CREATE TABLE `senhaDigital` (
  `idSenha` int PRIMARY KEY AUTO_INCREMENT,
  `id_seccao` int,
  `numeroAtual` int DEFAULT 0,
  `ultimoNumero` int DEFAULT 0
) ENGINE InnoDB;

CREATE TABLE `seccao` (
  `idSeccao` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL
) ENGINE InnoDB;

CREATE TABLE `morada` (
  `idMorada` int PRIMARY KEY AUTO_INCREMENT,
  `rua` varchar(255) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `cod_postal` varchar(12) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `id_user` int
) ENGINE InnoDB;

CREATE TABLE `utilizador` (
  `idUser` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nif` varchar(9) UNIQUE NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `id_loja` int,
  `id_user` int
) ENGINE InnoDB;

CREATE TABLE `carrinho` (
  `idCarrinho` int PRIMARY KEY AUTO_INCREMENT,
  `estado` boolean DEFAULT 0,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_morada` int,
  `id_loja` int,
  `id_user` int,
  `id_promocao` int
) ENGINE InnoDB;

CREATE TABLE `favorito` (
  `idFavorito` int PRIMARY KEY AUTO_INCREMENT,
  `id_produto` int,
  `id_user` int
) ENGINE InnoDB;

CREATE TABLE `linhaCarrinho` (
  `idLinha` int PRIMARY KEY AUTO_INCREMENT,
  `estado` int DEFAULT 0,
  `quantidade` int NOT NULL,
  `id_carrinho` int,
  `id_produto` int
) ENGINE InnoDB;

CREATE TABLE `produto` (
  `idProduto` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco_unit` float NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `imagem` varchar(255) NOT NULL,
  `ativo` boolean DEFAULT 1,
  `id_categoria` int
) ENGINE InnoDB;

CREATE TABLE `stock` (
  `idStock` int PRIMARY KEY AUTO_INCREMENT,
  `quant_stock` int NOT NULL,
  `quant_req` int DEFAULT 0,
  `id_produto` int,
  `id_loja` int
) ENGINE InnoDB;

CREATE TABLE `categoria` (
  `idCategoria` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ativo` boolean DEFAULT 1,
  `id_iva` int,
  `id_categoria` int
) ENGINE InnoDB;

CREATE TABLE `metodoPagamento` (
  `idMetodo` int PRIMARY KEY AUTO_INCREMENT,
  `metodoPagamento` varchar(255) NOT NULL,
  `ativo` boolean DEFAULT 1
) ENGINE InnoDB;

CREATE TABLE `iva` (
  `idIva` int PRIMARY KEY AUTO_INCREMENT,
  `iva` float UNIQUE NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` boolean DEFAULT 1
) ENGINE InnoDB;

CREATE TABLE `fatura` (
  `idFatura` int PRIMARY KEY AUTO_INCREMENT,
  `nomeUtilizador` varchar(255) NOT NULL,
  `nifUtilizador` varchar(9) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL,
  `nifEmpresa` varchar(9) NOT NULL,
  `descricaoLoja` varchar(50) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_metodo` int,
  `id_utilizador` int,
  `id_loja` int,
  `id_carrinho` int
) ENGINE InnoDB;

CREATE TABLE `linhaFatura` (
  `idLinha` int PRIMARY KEY AUTO_INCREMENT,
  `quantidade` int NOT NULL,
  `preco_unit` float NOT NULL,
  `iva` float NOT NULL,
  `id_categoria` int,
  `id_fatura` int,
  `id_produto` int
) ENGINE InnoDB;

CREATE TABLE `promocao` (
  `idPromocao` int PRIMARY KEY AUTO_INCREMENT,
  `percentagem` float NOT NULL,
  `data_limite` datetime NOT NULL
) ENGINE InnoDB;

ALTER TABLE `empresa` ADD FOREIGN KEY (`id_morada`) REFERENCES `morada` (`idMorada`);

ALTER TABLE `loja` ADD FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`idEmpresa`);

ALTER TABLE `loja` ADD FOREIGN KEY (`id_morada`) REFERENCES `morada` (`idMorada`);

CREATE TABLE `loja_metodoPagamento` (
  `loja_idLoja` int,
  `metodoPagamento_idMetodo` int,
  PRIMARY KEY (`loja_idLoja`, `metodoPagamento_idMetodo`)
) ENGINE InnoDB;

ALTER TABLE `loja_metodoPagamento` ADD FOREIGN KEY (`loja_idLoja`) REFERENCES `loja` (`idLoja`);

ALTER TABLE `loja_metodoPagamento` ADD FOREIGN KEY (`metodoPagamento_idMetodo`) REFERENCES `metodoPagamento` (`idMetodo`);


CREATE TABLE `loja_seccao` (
  `loja_idLoja` int,
  `seccao_idSeccao` int,
  PRIMARY KEY (`loja_idLoja`, `seccao_idSeccao`)
) ENGINE InnoDB;

ALTER TABLE `loja_seccao` ADD FOREIGN KEY (`loja_idLoja`) REFERENCES `loja` (`idLoja`);

ALTER TABLE `loja_seccao` ADD FOREIGN KEY (`seccao_idSeccao`) REFERENCES `seccao` (`idSeccao`);


ALTER TABLE `senhaDigital` ADD FOREIGN KEY (`id_seccao`) REFERENCES `seccao` (`idSeccao`);

ALTER TABLE `stock` ADD FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);

ALTER TABLE `stock` ADD FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

ALTER TABLE `produto` ADD FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`);

ALTER TABLE `categoria` ADD FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`);

ALTER TABLE `categoria` ADD FOREIGN KEY (`id_iva`) REFERENCES `iva` (`idIva`);

ALTER TABLE `linhaFatura` ADD FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`);

ALTER TABLE `linhaFatura` ADD FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

ALTER TABLE `linhaFatura` ADD FOREIGN KEY (`id_fatura`) REFERENCES `fatura` (`idFatura`);

ALTER TABLE `fatura` ADD FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`idCarrinho`);

ALTER TABLE `carrinho` ADD FOREIGN KEY (`id_promocao`) REFERENCES `promocao` (`idPromocao`);

ALTER TABLE `linhaCarrinho` ADD FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`idCarrinho`);

ALTER TABLE `linhaCarrinho` ADD FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

ALTER TABLE `favorito` ADD FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`);

ALTER TABLE `favorito` ADD FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

ALTER TABLE `carrinho` ADD FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

ALTER TABLE `fatura` ADD FOREIGN KEY (`id_metodo`) REFERENCES `metodoPagamento` (`idMetodo`);

ALTER TABLE `morada` ADD FOREIGN KEY (`id_user`) REFERENCES `utilizador` (`idUser`);

ALTER TABLE `utilizador` ADD FOREIGN KEY (`id_user`) REFERENCES `User` (`id`);

ALTER TABLE `utilizador` ADD FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);

ALTER TABLE `carrinho` ADD FOREIGN KEY (`id_loja`) REFERENCES `loja` (`idLoja`);