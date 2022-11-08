use stuffngo;

CREATE TABLE `empresa` (
  `idEmpresa` int PRIMARY KEY,
  `descricao_social` varchar(255),
  `email` varchar(255),
  `telefone` varchar(255),
  `nif` varchar(255),
  `id_morada` int
) ENGINE InnoDB;

CREATE TABLE `loja` (
  `idLoja` int PRIMARY KEY,
  `id_empresa` int,
  `descricao` varchar(255),
  `email` varchar(255),
  `telefone` varchar(255),
  `ativo` boolean,
  `id_morada` int
) ENGINE InnoDB;

CREATE TABLE `senhaDigital` (
  `idSenha` int PRIMARY KEY,
  `id_seccao` int,
  `numeroAtual` int,
  `ultimoNumero` int
) ENGINE InnoDB;

CREATE TABLE `seccao` (
  `idSeccao` int PRIMARY KEY,
  `nome` varchar(255)
) ENGINE InnoDB;

CREATE TABLE `morada` (
  `idMorada` int PRIMARY KEY,
  `rua` varchar(255),
  `cidade` varchar(255),
  `cod_postal` varchar(255),
  `pais` varchar(255),
  `id_user` int
) ENGINE InnoDB;

CREATE TABLE `utilizador` (
  `idUser` int PRIMARY KEY,
  `nome` varchar(255),
  `nif` varchar(255),
  `telemovel` varchar(255),
  `id_loja` int,
  `id_user` int
) ENGINE InnoDB;

CREATE TABLE `carrinho` (
  `idCarrinho` int PRIMARY KEY,
  `estado` boolean,
  `data_criacao` datetime,
  `id_morada` int,
  `id_loja` int,
  `id_user` int,
  `id_promocao` int
) ENGINE InnoDB;

CREATE TABLE `favorito` (
  `idFavorito` int PRIMARY KEY,
  `id_produto` int,
  `id_user` int
) ENGINE InnoDB;

CREATE TABLE `linhaCarrinho` (
  `idLinha` int PRIMARY KEY,
  `estado` int,
  `id_carrinho` int,
  `id_produto` int,
  `quantidade` int
) ENGINE InnoDB;

CREATE TABLE `produto` (
  `idProduto` int PRIMARY KEY,
  `nome` varchar(255),
  `descricao` text,
  `preco_unit` float,
  `dataCriacao` datetime,
  `imagem` varchar(255),
  `ativo` boolean,
  `id_categoria` int
) ENGINE InnoDB;

CREATE TABLE `stock` (
  `idStock` int PRIMARY KEY,
  `id_produto` int,
  `id_loja` int,
  `quant_stock` int,
  `quant_req` int
) ENGINE InnoDB;

CREATE TABLE `categoria` (
  `idCategoria` int PRIMARY KEY,
  `nome` varchar(255),
  `ativo` boolean,
  `id_iva` int,
  `id_categoria` int
) ENGINE InnoDB;

CREATE TABLE `metodoPagamento` (
  `idMetodo` int PRIMARY KEY,
  `metodoPagamento` varchar(255),
  `ativo` boolean
) ENGINE InnoDB;

CREATE TABLE `iva` (
  `idIva` int PRIMARY KEY,
  `iva` float,
  `descricao` varchar(255),
  `ativo` boolean
) ENGINE InnoDB;

CREATE TABLE `fatura` (
  `idFatura` int PRIMARY KEY,
  `nomeUtilizador` varchar(255),
  `nifUtilizador` varchar(255),
  `nomeEmpresa` varchar(255),
  `nifEmpresa` varchar(255),
  `descricaoLoja` varchar(255),
  `desconto` float,
  `dataCriacao` datetime,
  `id_metodo` int,
  `id_utilizador` int,
  `id_loja` int,
  `id_carrinho` int
) ENGINE InnoDB;

CREATE TABLE `linhaFatura` (
  `idLinha` int PRIMARY KEY,
  `quantidade` int,
  `preco_unit` float,
  `id_categoria` int,
  `iva` float,
  `id_fatura` int,
  `id_produto` int
) ENGINE InnoDB;

CREATE TABLE `promocao` (
  `idPromocao` int PRIMARY KEY,
  `percentagem` float,
  `data_limite` datetime
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