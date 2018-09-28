SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `cromg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cromg`;

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cidade` varchar(145) DEFAULT NULL,
  `bairro` varchar(145) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `logradouro` varchar(145) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `principal` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `fk_enderecos_pessoas_idx` (`id_pessoa`),
  CONSTRAINT `fk_enderecos_pessoas` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `enderecos` (`id_endereco`, `id_pessoa`, `uf`, `cidade`, `bairro`, `cep`, `logradouro`, `numero`, `complemento`, `status`, `principal`, `updated_at`, `created_at`) VALUES
(1,	1,	'RN',	'ANDRADAS',	'CENTRO',	'12.345-678',	'ASSIS',	'123',	'F',	1,	1,	'2018-09-28 02:06:08',	'2018-09-27 04:20:40'),
(2,	1,	'PR',	'POÇOS',	'CENTRO',	NULL,	'ASSIS',	NULL,	NULL,	1,	0,	'2018-09-28 02:06:08',	'2018-09-27 04:37:25');

DROP TABLE IF EXISTS `filmes_assistidos`;
CREATE TABLE `filmes_assistidos` (
  `id_filme` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `titulo` varchar(145) DEFAULT NULL,
  `lancamento` int(4) DEFAULT NULL,
  `arquivo` varchar(245) DEFAULT NULL,
  `diretor` varchar(45) DEFAULT NULL,
  `nota` decimal(3,2) DEFAULT NULL,
  `sinopse` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_filme`),
  KEY `fk_filmes_assistidos_pessoas1_idx` (`id_pessoa`),
  CONSTRAINT `fk_filmes_assistidos_pessoas1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `filmes_assistidos` (`id_filme`, `id_pessoa`, `titulo`, `lancamento`, `arquivo`, `diretor`, `nota`, `sinopse`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	'ZUMBI',	1898,	'1_20180927230427.jpeg',	'TESTE',	2.30,	'teste COM SUCESSO',	1,	'2018-09-27 03:45:29',	'2018-09-28 02:04:27');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE `pessoas` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(65) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `titulacao` varchar(45) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `email` varchar(95) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pessoas` (`id_pessoa`, `nome`, `sobrenome`, `titulacao`, `cpf`, `rg`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1,	'TESTE OK',	'TESTE',	'CLIENTE',	'1234567',	'12345678',	'TESTE@TESTE.COM',	1,	'2018-09-27 02:37:05',	'2018-09-27 02:54:43');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Ederson',	'edersonk9@gmail.com',	NULL,	'$2y$10$JpZkCRnHS5HrG5vlcQIOhuqIGlc2xAO6X/uIiliprG70xoEu6Xx1m',	NULL,	'2018-09-25 18:17:36',	'2018-09-25 18:17:36');

-- 2018-09-28 00:32:08
