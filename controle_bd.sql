-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Jan-2024 às 12:26
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--
CREATE DATABASE IF NOT EXISTS `cadastro` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cadastro`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descriçao` text,
  `carga` int UNSIGNED DEFAULT NULL,
  `totaulas` int DEFAULT NULL,
  `ano` year DEFAULT '2022',
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`, `descriçao`, `carga`, `totaulas`, `ano`) VALUES
(1, 'HTML 5', 'Curso de HTML', 40, 37, 2014),
(2, 'Algoritmo', 'lógica de programação', 20, 15, 2014),
(3, 'Photoshop', 'DICAS de foto photoshop', 10, 8, 2014),
(4, 'PHP', 'curso de PHP para iniciantes', 40, 40, 2015),
(5, 'Java', 'Introdução alinguaguem JAVA', 40, 29, 2015),
(6, 'MYSQL', 'banco de dados MYSQL', 30, 15, 2016),
(7, 'Word', ' curso completo de word ', 40, 30, 2016);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gafanhotos`
--

DROP TABLE IF EXISTS `gafanhotos`;
CREATE TABLE IF NOT EXISTS `gafanhotos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `prof` varchar(20) NOT NULL DEFAULT '',
  `nascimento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `nacinalidade` varchar(20) DEFAULT 'Angola',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `gafanhotos`
--

INSERT INTO `gafanhotos` (`id`, `nome`, `prof`, `nascimento`, `sexo`, `peso`, `altura`, `nacinalidade`) VALUES
(1, 'ANA', '', '0000-00-00', 'F', '50.50', '1.30', 'BRASIL'),
(2, 'CLAUDIO', '', '0000-00-00', 'M', '50.50', '1.79', 'angola'),
(3, 'pedro', '', '0000-00-00', 'M', '71.50', '1.70', 'portugal'),
(4, 'janaina', '', '0000-00-00', 'F', '70.50', '1.30', 'argentina');
--
-- Banco de dados: `controle`
--
CREATE DATABASE IF NOT EXISTS `controle` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `controle`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_adm`
--

DROP TABLE IF EXISTS `tb_adm`;
CREATE TABLE IF NOT EXISTS `tb_adm` (
  `id_adm` int NOT NULL AUTO_INCREMENT,
  `nome_adm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `morada_adm` varchar(350) NOT NULL,
  `foto-adm` varchar(400) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

DROP TABLE IF EXISTS `tb_aluno`;
CREATE TABLE IF NOT EXISTS `tb_aluno` (
  `id_aluno` int NOT NULL AUTO_INCREMENT,
  `nome_aluno` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `num_Bi` varchar(50) NOT NULL,
  `morada_aluno` varchar(400) NOT NULL,
  `email_aluno` varchar(100) NOT NULL,
  `telefone_aluno` varchar(100) DEFAULT NULL,
  `id_turma` int DEFAULT NULL,
  `classe` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `sexo` enum('Masculino','Feminino','outros') NOT NULL,
  `ponto` int DEFAULT NULL,
  `presenca` int DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_aluno`, `nome_aluno`, `curso`, `num_Bi`, `morada_aluno`, `email_aluno`, `telefone_aluno`, `id_turma`, `classe`, `foto_perfil`, `sexo`, `ponto`, `presenca`) VALUES
(4, 'joana miguel', 'ola', '3453457645476', 'UDDS', 'gdd@mail', '9786766', NULL, '10', 'IMG_20220505_111640.jpg', 'Feminino', NULL, NULL),
(5, 'Live Style', 'Node', '12346', 'Samba', 'live@mail', '55555', NULL, '10', 'FB_IMG_16570956810864836.jpg', 'Feminino', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aula`
--

DROP TABLE IF EXISTS `tb_aula`;
CREATE TABLE IF NOT EXISTS `tb_aula` (
  `id_aula` int NOT NULL AUTO_INCREMENT,
  `tema_aula` varchar(255) NOT NULL,
  `subtema_aula` varchar(255) DEFAULT NULL,
  `motivacao` text,
  `materia` text NOT NULL,
  `id_turma` int NOT NULL,
  `objetivo_geral` text,
  `objetivo_especifico` text,
  `data_aula` date NOT NULL,
  `turno` enum('Manhã','Tarde','Noite') NOT NULL,
  PRIMARY KEY (`id_aula`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_classe`
--

DROP TABLE IF EXISTS `tb_classe`;
CREATE TABLE IF NOT EXISTS `tb_classe` (
  `id_classe` int NOT NULL AUTO_INCREMENT,
  `id_curso` int DEFAULT NULL,
  `id_displina` int DEFAULT NULL,
  `classe` int NOT NULL,
  PRIMARY KEY (`id_classe`),
  KEY `frk_classe` (`id_curso`),
  KEY `id_displina` (`id_displina`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_classe`
--

INSERT INTO `tb_classe` (`id_classe`, `id_curso`, `id_displina`, `classe`) VALUES
(1, 1, 3, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curso`
--

DROP TABLE IF EXISTS `tb_curso`;
CREATE TABLE IF NOT EXISTS `tb_curso` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(255) NOT NULL,
  `Classe_Curso` int DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_curso`
--

INSERT INTO `tb_curso` (`id_curso`, `nome_curso`, `Classe_Curso`) VALUES
(1, 'Fisicas e Biologica', 10),
(2, 'Econocas e Juridicas', 11),
(3, 'Clinica Geral', 10),
(4, 'Eletronica', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

DROP TABLE IF EXISTS `tb_disciplina`;
CREATE TABLE IF NOT EXISTS `tb_disciplina` (
  `id_disciplina` int NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classe_disciplina` int DEFAULT NULL,
  `carga_horaria` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `trimestre` int DEFAULT NULL,
  `id_curso` int DEFAULT NULL,
  PRIMARY KEY (`id_disciplina`),
  KEY `frk_disciplina` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_disciplina`
--

INSERT INTO `tb_disciplina` (`id_disciplina`, `nome_disciplina`, `classe_disciplina`, `carga_horaria`, `trimestre`, `id_curso`) VALUES
(3, 'matematicA', 12, '45', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

DROP TABLE IF EXISTS `tb_professor`;
CREATE TABLE IF NOT EXISTS `tb_professor` (
  `id_professor` int NOT NULL AUTO_INCREMENT,
  `nome_prof` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `foto_prof` varchar(255) DEFAULT NULL,
  `num_BI` varchar(50) NOT NULL,
  `nivel_academico` varchar(400) NOT NULL,
  `morada` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sexo` enum('Masculino','Feminino','Outros','') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pendente` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_professor`),
  UNIQUE KEY `email` (`email`,`telefone`,`num_BI`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`id_professor`, `nome_prof`, `email`, `telefone`, `senha`, `foto_prof`, `num_BI`, `nivel_academico`, `morada`, `sexo`, `pendente`) VALUES
(2, 'miguel suares', 'qscvhgk@xn--jbkjskllj-w3ac', '9213456778', '12345', '', '', '', 'viana', '', NULL),
(3, 'orlando roqueiro', 'scvhgk@xn--jbkjskllj-w3ac3', '92134567786', '54321', '', '', '', 'maianga', '', NULL),
(4, 'Laura lourennço', 'scvhgk@xn--jbkjskllj-w3ac9a', '92134567788', '123478', '', '', '', 'viana', 'Feminino', NULL),
(5, 'Ada Lovelace', 'adalovelace@gmail.com', '92134567780', '0000', 'IMG_20220505_111640.jpg', '127496340908dsh766555', '', 'maianga', 'Feminino', NULL),
(6, 'ultimo', 'scvhgk@xn--jbkjskllj-w3ac', '834747', '0000', 'IMG_20220721_080600.jpg', 'yuw8474', '', '5353Lua', 'Outros', NULL),
(7, 'eduardo mercedes', 'eduardo@gmail.com', '+244958194878', '0000', '', 'yuw8474', '', 'mainga', 'Masculino', NULL),
(8, 'armando david', 'armandodavid@gmail.com', '+244959495278', '123478', '', '127496340908dsh766555', 'mestrado', 'kilamba kiaxi', 'Masculino', NULL),
(9, 'Rafael Soares rodrigues ', 'Rafaelrodrigues@gmail.com', '+244951987878', '54321', '', 'yuw8474', 'lincenciado', 'kilamba kiaxi', 'Masculino', NULL),
(10, 'lumengo Catarina', 'lumengocatarina@gmail.com', '+244951132878', '0000', '', 'yuw8474', 'mestrado', 'viana/grafanil', 'Feminino', NULL),
(11, ' António makimuena', 'antoniomakimuena@gmail.com', '+2449511328781', '12345', '20210202_142534.jpg', '', '', 'kilamba kiaxi', 'Masculino', NULL),
(12, 'Paulo Py', 'paulo@mail.com', '9752827332', 'p1234', 'Imagem1.png', 'yuw8474', 'lincenciado', 'kilamba kiaxi', 'Masculino', NULL),
(13, 'Sony Son', 'sony@mail.com', '76392111', 'sony123', 'Imagem1.png', '03899202hd23', 'lincenciado', 'angola', 'Masculino', NULL),
(14, 'Oliveira Rodrigues', 'oliveirarodrigues@gmail.com', '+244921139478', 'sony123', 'IMG-20220325-WA0128.jpg', '12749634090766555', 'Doutorado', 'kilamba kiaxi', 'Masculino', 0),
(15, 'Silva', 'silva@mail.com', '0890083', 's1234', '', 'bdi7771', 'Doutorado', 'luada', 'Masculino', 1),
(16, 'Deco', 'de@mail.com', '02449511328789', 'd123', '', '4255deco22', 'lincenciado', 'kilamba kiaxi', 'Masculino', 1),
(17, 'Isaura Orlando', 'isauraorlando@gmail.com', '+244967132878', 'isaura0000', '123.png', '', 'lincenciada', 'zango', 'Feminino', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma`
--

DROP TABLE IF EXISTS `tb_turma`;
CREATE TABLE IF NOT EXISTS `tb_turma` (
  `id_turma` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `sala` varchar(255) NOT NULL,
  `classe` int DEFAULT NULL,
  `ano_letivo` varchar(30) NOT NULL,
  `id_curso` int DEFAULT NULL,
  `turno` enum('Manhã','tarde','noite') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`id_turma`, `titulo`, `sala`, `classe`, `ano_letivo`, `id_curso`, `turno`) VALUES
(14, 'Turma A', '3', 11, '2022/2023', 3, 'tarde');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `frk_aluno` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`id_turma`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `tb_aula`
--
ALTER TABLE `tb_aula`
  ADD CONSTRAINT `frk_aula` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`id_turma`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD CONSTRAINT `frk_disciplina` FOREIGN KEY (`id_curso`) REFERENCES `tb_curso` (`id_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  ADD CONSTRAINT `frk_turma` FOREIGN KEY (`id_curso`) REFERENCES `tb_curso` (`id_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
-- Banco de dados: `weka_commerce`
--
CREATE DATABASE IF NOT EXISTS `weka_commerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `weka_commerce`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_adm`
--

DROP TABLE IF EXISTS `tb_adm`;
CREATE TABLE IF NOT EXISTS `tb_adm` (
  `id_adm` int NOT NULL AUTO_INCREMENT,
  `localiza` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

DROP TABLE IF EXISTS `tb_comentario`;
CREATE TABLE IF NOT EXISTS `tb_comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(400) DEFAULT NULL,
  `permitircoment` tinyint(1) DEFAULT NULL,
  `id_adm` int DEFAULT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

DROP TABLE IF EXISTS `tb_fornecedor`;
CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(30) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `id_indereço` int DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id_lohin` int NOT NULL AUTO_INCREMENT,
  `id_pessooa` int DEFAULT NULL,
  PRIMARY KEY (`id_lohin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoa`
--

DROP TABLE IF EXISTS `tb_pessoa`;
CREATE TABLE IF NOT EXISTS `tb_pessoa` (
  `id_pessoa` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(30) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `imagem_produto` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `marca` varchar(60) DEFAULT NULL,
  `valor_compra` float DEFAULT NULL,
  `valor_venda` decimal(6,2) DEFAULT NULL,
  `cor` varchar(15) DEFAULT NULL,
  `tamanho` varchar(30) DEFAULT NULL,
  `id_fornecedor` int DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_venda`
--

DROP TABLE IF EXISTS `tb_venda`;
CREATE TABLE IF NOT EXISTS `tb_venda` (
  `id_venda` int NOT NULL,
  `preço` decimal(3,2) NOT NULL,
  `tipo_pagamento` varchar(20) DEFAULT NULL,
  `num_cartão` varchar(30) DEFAULT NULL,
  `agencia_bancaria` varchar(35) DEFAULT NULL,
  `data_venda` datetime DEFAULT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `id_pessooa` int DEFAULT NULL,
  `id_indereco_entrega` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
