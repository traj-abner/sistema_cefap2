-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Gera��o: Jan 16, 2013 as 05:08 PM
-- Vers�o do Servidor: 5.0.51
-- Vers�o do PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `traj_cefap`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `agendamentos`
-- 

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `aprovado_por_id` int(11) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `periodo_inicial` varchar(45) default NULL,
  `periodo_final` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade` varchar(45) default NULL,
  `valor_total` varchar(45) default NULL,
  `status_pagto` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`),
  KEY `projeto_id` (`projeto_id`),
  KEY `aprovado_por_id` (`aprovado_por_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `agendamentos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `ajudas`
-- 

CREATE TABLE `ajudas` (
  `id` int(11) NOT NULL,
  `created` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `conteudo` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `ajudas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `backups`
-- 

CREATE TABLE `backups` (
  `id` int(11) NOT NULL,
  `datetime` varchar(45) default NULL,
  `tamanho_total` varchar(45) default NULL,
  `tamanho_split` varchar(45) default NULL,
  `filenames` varchar(45) default NULL,
  `arquivos_presentes` varchar(45) default NULL,
  `path` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `backups`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `backups_emails`
-- 

CREATE TABLE `backups_emails` (
  `id` int(11) NOT NULL,
  `backup_id` int(11) default NULL,
  `datetime` varchar(45) default NULL,
  `email_to` varchar(45) default NULL,
  `anexo` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `backup_id` (`backup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `backups_emails`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `boletos`
-- 

CREATE TABLE `boletos` (
  `id` int(11) NOT NULL,
  `nosso_numero` varchar(45) default NULL,
  `chave` varchar(45) default NULL,
  `data_emissao` varchar(45) default NULL,
  `data_vencimento` varchar(45) default NULL,
  `valor_creditos` varchar(45) default NULL,
  `tava` varchar(45) default NULL,
  `valor_total` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `usuario_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `boletos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `campos`
-- 

CREATE TABLE `campos` (
  `id` int(11) NOT NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor_padrao` varchar(45) default NULL,
  `obrigatorio` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `campos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `configuracoes`
-- 

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `param` varchar(45) default NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `valor_padrao` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `configuracoes`
-- 

INSERT INTO `configuracoes` VALUES (20, 'creditos_banco', 'Cr�ditos - banco de emiss�o dos boletos', 'select', 'Santander(033)', 'Santander(033)', 'Santander(033)', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (19, 'creditos_conta_dv', 'Cr�ditos - d�gito verificador da conta corren', 'text', NULL, '25', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (18, 'creditos_conta', 'Cr�ditos - conta corrente do cedente', 'text', NULL, '1234587', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (16, 'creditos_agencia', 'Cr�ditos - ag�ncia do cedente', 'text', NULL, '0108', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (17, 'creditos_agencia_dv', 'Cr�ditos - d�gito verificador da ag�ncia do c', 'text', NULL, '9', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (15, 'creditos_taxa_boleto', 'Cr�ditos - taxa (R$) de cada boleto', 'text', NULL, 'R$ 50,00', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (13, 'creditos_prazo', 'Cr�ditos - dias para vencimentos dos boletos', 'text', NULL, '10', '5', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (14, 'creditos_projeto_fusp', 'Cr�ditos - n�mero do projeto FUSP (5 d�gitos)', 'text', NULL, '12345', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (11, 'backup_email', 'Backup - e-mail a ser enviado', 'text', NULL, 'teste@teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (12, 'backup_split_arquivos', 'Backup - dividir arquivos a cada X megabytes ', 'text', NULL, '5', '5', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (10, 'backup_qtde_manter', 'Backup - quantidade de c�pias a manter no ser', 'text', NULL, '10', '10', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (9, 'backup_frequencia', 'Backup - frequencia', 'select', 'di�rio, cada 2 dias, cada 3 dias, cada 4 dias', 'diario', 'diario', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (8, 'backup_path', 'Backup - local dos arquivos', 'text', NULL, '/backups', '/backups', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (7, 'email_SMTPAuth', 'Email - SMTP Auth', 'radio', '1,0', '1', '1', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (6, 'email_SMTPSecure', 'Email - SMTP Secure', 'text', NULL, 'teste@teste.com.br', 'ssl', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (5, 'email_port', 'Email - porta', 'text', NULL, '465', '465', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (4, 'email_fromName', 'Email - nome no cmapo �De�', 'text', NULL, 'teste@teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (2, 'email_username', 'Email - username', 'text', NULL, 'Thais', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (3, 'email_password', 'Email - senha', 'text', NULL, 'K8g$fwa53', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (1, 'email_host', 'Email - host', 'text ', NULL, 'thais.dias@trajettoria.com', 'smtp@gmail.com', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (21, 'creditos_cedente_nome', 'Cr�ditos - nome ou raz�o social do cedente', 'text', NULL, 'Nome', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (22, 'creditos_cedente_cnpj', 'Cr�ditos - CNPJ do cedente', 'text', NULL, '025.124.524/0001-25', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (23, 'creditos_cedente_endereco_linha1', 'Cr�ditos - endere�o do cedente (linha 1)', 'text', NULL, 'Rua teste, 02', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (24, 'creditos_cedente_endereco_linha2', 'Cr�ditos - endere�o do cedente (linha 2)', 'text', NULL, 'Rua teste, 03', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (25, 'creditos_texto_boleto', 'Cr�ditos - texto das �Instru��es� do boleto', 'textarea', NULL, 'teste            ', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (26, 'rss_fonte1', 'RSS - endere�o do primeiro quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (27, 'rss_fonte2', 'RSS - endere�o do segundo quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `contas`
-- 

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `saldo` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_contas_usuarios1` (`usuarios_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `contas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `coordenadores_facilities`
-- 

CREATE TABLE `coordenadores_facilities` (
  `id` int(11) NOT NULL auto_increment,
  `facility_id` int(11) default NULL,
  `usuario_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `coordenadores_facilities`
-- 

INSERT INTO `coordenadores_facilities` VALUES (1, 1, 68);
INSERT INTO `coordenadores_facilities` VALUES (2, 2, 68);
INSERT INTO `coordenadores_facilities` VALUES (3, 3, 68);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities`
-- 

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  `nome_abreviado` varchar(45) default NULL,
  `descricao` varchar(200) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `tipo_agendamento` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade_valor` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- 
-- Extraindo dados da tabela `facilities`
-- 

INSERT INTO `facilities` VALUES (4, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', 'timecreated', 'timemodified', '1', 'individualizado', 'teste', '5000', '10');
INSERT INTO `facilities` VALUES (1, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', NULL, NULL, '1', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (2, 'BIOMASS', 'Mass Spectometry and Proteome Research', 'Mass Spectometry and Proteome Research', NULL, '2013-01-16 11:59:30 -0200', '0', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (3, 'FLUIR', 'Flow Cytometry and Imaging Research', 'Flow Cytometry and Imaging Research', NULL, NULL, '0', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (12, ' Nome Completo23', 'Nome abreviado2', '12312321321asdsadqwewqe', '2013-01-03 12:47:17 -0200', NULL, '0', 'individualizado', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (11, ' Nome Completo', 'Nome abreviado', 'apohdpaoshdpaoshdpsaohsdpaohda', '2013-01-03 12:43:41 -0200', NULL, '0', 'individualizado', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (13, 'Microsc�pio Zeiss LSM 780 Multif�ton ou de �p', 'CONFOCAL', 'O microsc�pio Zeiss LSM 780-NLO utiliza laser de arg�nio e 2 laseres HeNe de excita��o (em 458, 488, 514, 543, e 633 nm). O Sistema possui 34 canais de detectores espectrais, sendo 2 PMTs e 32 sub-det', '2013-01-03 15:40:20 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (14, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:18:55 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (15, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:19:51 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (16, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:20:18 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (17, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:20:40 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (18, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:20:56 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (19, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:21:06 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (20, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:24:33 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (21, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:24:39 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (22, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:26:25 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (23, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-03 16:26:52 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (39, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', '2013-01-16 14:37:17 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (38, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:36:01 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (37, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:28:29 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (40, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:42:01 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (41, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:42:30 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (42, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:47:34 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (43, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:47:50 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (44, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:51:10 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (45, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:51:41 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (46, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:52:25 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (47, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:52:38 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (48, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:53:21 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (49, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:53:48 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (50, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:53:56 -0200', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (51, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:54:07 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (52, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:56:46 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (53, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:58:22 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (54, 'GENIAL', 'Genome Investigation and Analysis Laboratory ', 'Genome Investigation and Analysis Laboratory', '2013-01-16 14:58:43 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities_formularios`
-- 

CREATE TABLE `facilities_formularios` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `formulario_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `formulario_id` (`formulario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities_formularios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities_usuarios`
-- 

CREATE TABLE `facilities_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `capacidades` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `facilities_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `fk_facilities_usuarios_facilities1` (`facilities_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities_usuarios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `formularios`
-- 

CREATE TABLE `formularios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `formularios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `formulario_campos`
-- 

CREATE TABLE `formulario_campos` (
  `id` int(11) NOT NULL,
  `formulario_id` int(11) default NULL,
  `campo_id` int(11) default NULL,
  `secao` varchar(45) default NULL,
  `ordem` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `formulario_id` (`formulario_id`),
  KEY `campo_id` (`campo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `formulario_campos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `lancamentos`
-- 

CREATE TABLE `lancamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `chave` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `tipo` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `medoto_pagto` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `cancelamento_justificativa` varchar(45) default NULL,
  `cancelamento_autor_id` int(11) default NULL,
  `cancelamento_datetime` varchar(45) default NULL,
  `lancamento_direto` varchar(45) default NULL,
  `boleto_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `autor_id` (`autor_id`),
  KEY `cancelamento_autor_id` (`cancelamento_autor_id`),
  KEY `fk_lancamentos_boletos1` (`boleto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `lancamentos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `logs`
-- 

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `ip` varchar(45) default NULL,
  `acao` varchar(45) default NULL,
  `datetime` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `logs`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `mensagens`
-- 

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `from_id` int(11) default NULL,
  `to_id` int(11) default NULL,
  `conteudo` varchar(45) default NULL,
  `assunto` varchar(45) default NULL,
  `data_envio` varchar(45) default NULL,
  `data_ultima_leitura` varchar(45) default NULL,
  `cont_leituras` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `mensagens`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `periodos`
-- 

CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `periodo` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `periodos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `projetos`
-- 

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) default NULL,
  `responsavel` varchar(45) default NULL,
  `telefone1` varchar(45) default NULL,
  `telefone2` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `departamento` varchar(45) default NULL,
  `instituicao` varchar(45) default NULL,
  `inst_fomento` varchar(45) default NULL,
  `numero_processo` varchar(45) default NULL,
  `tipo_responsavel` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `created_by` int(11) default NULL,
  `modified` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `resumo` varchar(45) default NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_projetos_usuarios1` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `projetos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `relatorios`
-- 

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `slug` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `relatorios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `respostas`
-- 

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `formulario_id` int(11) default NULL,
  `valores` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `formulario_id` (`formulario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `respostas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `senha` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `nome` varchar(45) default NULL,
  `sobrenome` varchar(45) default NULL,
  `endereco` varchar(45) default NULL,
  `cidade` varchar(45) default NULL,
  `uf` varchar(45) default NULL,
  `instituicao` varchar(45) default NULL,
  `departamento` varchar(45) default NULL,
  `data_nascimento` varchar(45) default NULL,
  `key` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `credencial` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `telefone` varchar(45) default NULL,
  `cpf` varchar(45) default NULL,
  `tipo` varchar(45) default NULL,
  `newsletter` varchar(45) default NULL,
  `cep` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

-- 
-- Extraindo dados da tabela `usuarios`
-- 

INSERT INTO `usuarios` VALUES (28, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2012-11-29 16:17:07 -0200', '2013-01-16 14:27:30 -0200', 'Thais', 'Dias', 'Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', '5C3E9956-43B4-43EC-C432-C6FB40D21A3F', '3', NULL, '1', 'thais.dias123@trajettoria.com', '(11) 9-5391-0081', '1124218095', '381.162.908-51', '3', '0', '07052000');
INSERT INTO `usuarios` VALUES (31, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', '2012-11-29 16:27:32 -0200', '2013-01-16 11:48:14 -0200', 'superadmin', 'superadmin', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Departamento', '22/08/1989', '7C971362-EDDB-2D3D-65C4-D9C304B95996', '1', NULL, '10', 'thais.dia31s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12548962537', NULL, '1', '07052000');
INSERT INTO `usuarios` VALUES (36, 'thais6', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 11:47:37 -0200', '2012-12-05 16:50:15 -0200', 'thais6', 'teste123', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'departamentoteste2das', '22/08/1989', '2E8AC375-75A7-7179-CB48-887376B7EC4C', '1', NULL, '10', 'tha12321321is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514585269', '4', '0', '07052000');
INSERT INTO `usuarios` VALUES (37, 'thais7', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 14:59:00 -0200', '2012-12-20 10:41:14 -0200', 'Thais7', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'F30E0D90-0993-8ECF-FD38-EA68733C5DC4', '2', NULL, '1', 'thaiasdas.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '51428596352', '5', '1', '07052000');
INSERT INTO `usuarios` VALUES (38, 'Marjori', 'dfa47c34ebe821ef106dc26fefae309c', '2012-12-03 14:59:56 -0200', '2012-12-20 16:21:59 -0200', 'Marjori', 'Tamise', 'Rua pacheco jord�o, 239 - Casa 1', 'S�o Paulo', NULL, 'USP', 'Imunologia', '10/03/1994', '6A9D26B6-B9D6-FC18-BA6B-847A3766E4F6', '1', NULL, '0', 'marjori@trajettoria.com', '(11)91234-5623', '(11) 2280-0848', '408160638-26', '3', '1', '03675-020');
INSERT INTO `usuarios` VALUES (39, 'thais8', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 15:41:45 -0200', '2012-12-06 14:48:30 -0200', 'thais8', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '09/11/1994', 'A127F466-3C62-A704-9508-84DB39D2222E', '0', NULL, '1', 'thaasdadadqweis.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '256352152488', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (40, 'thais10', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-04 15:58:15 -0200', '2012-12-05 16:50:15 -0200', 'Thais10', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '2C5C7C2F-F0AC-68FD-8023-4FDCD2C1FC10', '1', NULL, '0', 'th31dasd123ais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25815932688', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (41, 'teste13', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-05 14:20:42 -0200', '2012-12-20 10:41:14 -0200', 'teste13', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'BACFC9C2-0B08-CD32-C539-362A0C8AC4CF', '2', NULL, '0', 'thaasd1231is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25698365147', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (42, 'thais14', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-06 14:46:56 -0200', '2012-12-06 14:47:19 -0200', 'thais14', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'A9FAA1C7-7795-B98B-06BB-F48F457A21CE', '1', NULL, '10', 'tasdahais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '15427845968', '5', '1', '07052000');
INSERT INTO `usuarios` VALUES (43, 'thais15', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-06 14:52:37 -0200', '2012-12-06 14:53:18 -0200', 'thais15', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'sc', 'USP', 'Imunologia', '22/08/1989', 'DEA0B40F-7C4B-0AF0-4D0F-1C0D31A48AC9', '1', NULL, '10', 'thasadqwis.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25145236585', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (44, 'thais116', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:46:37 -0200', '2012-12-20 10:41:14 -0200', 'thais16', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'pb', 'USP', 'Departamento', '22/08/1989', 'C75ADDAF-0B68-A1FF-41D3-26E985D2BF90', '2', NULL, '0', 'thais123131.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25184575899', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (45, 'thais17', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:48:03 -0200', '2012-12-20 10:40:50 -0200', 'thais16', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'pa', 'USP', 'Departamento', '22/08/1989', 'F1C2861E-BB57-F178-7733-51EC80B21190', '3', NULL, '0', 'thais.dasd123ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '85478596855', '0', '0', '07052000');
INSERT INTO `usuarios` VALUES (46, 'thais18', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:49:07 -0200', NULL, 'thais18', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', '334BD5BF-1694-D3D5-1C72-594CA906F6B5', '0', NULL, '0', 'thais.d2142141ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25418569585', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (47, 'thais181', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:50:17 -0200', NULL, 'thais181', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', 'BC0F7969-7A82-9BD1-C7BF-6F182BFF9DC2', '0', NULL, '0', 'thais.diaasdas123131@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12413212421', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (48, 'Anderson', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 12:43:51 -0200', '2012-12-20 10:41:14 -0200', 'Anderson', 'teste', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '2FBA3DAF-E84A-83A8-FFDA-E83B711E7B36', '2', NULL, '0', 'anderson.martins@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514526539', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (49, 'usuario', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 15:52:28 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '7C471F6B-A31A-C674-E7D6-FF69CBA1B134', '0', NULL, '0', 'thaasd131is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25885225895', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (50, 'usuario1', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 15:56:46 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '01F20358-DB99-5F1C-7DBE-E7A172A9C441', '0', NULL, '0', 'thais.dia1111s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25885225895123131', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (51, 'usuario11', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:01:10 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '2E43F0E8-F78C-A01F-4CD2-4E575043DC9A', '0', NULL, '0', 'thaiasdsadas.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25885225895123131123', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (52, 'usuario111', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:04:42 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '4A8F0012-C180-EAA4-0704-CD9CC3942A8B', '0', NULL, '0', 'thai123123131s.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '258852258951231311231', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (53, 'usuario1111', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:07:45 -0200', '2012-12-20 10:41:14 -0200', 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '3936F6EB-95EB-DF0F-2407-F61A93E9E089', '2', NULL, '0', 'thais123sdfs.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2588522589512313112311', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (54, 'usuario2', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:15:00 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '24075494-0791-CC34-DD49-DA6103037D57', '0', NULL, '0', 'thais.dia2321ass@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25415935785', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (55, 'usuario22', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:17:46 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'es', 'USP', 'Imunologia', '22/08/1989', '7A98756D-13C8-A6E5-7698-BD0555A2339E', '0', NULL, '0', 'thais.di1231asdas@trajettoria.com', '(11) 9-5391-0081', '1124218095', '254159357852', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (56, 'usuario222', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:19:02 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'pa', 'USP', 'Imunologia', '22/08/1989', '24083CBC-4D64-789D-B710-252337141E59', '0', NULL, '0', 'thais.di12321231as@trajettoria.com', '(11) 9-5391-0081', '1124218095', '254159357852323213', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (57, 'usuario2321313', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:40:04 -0200', '2012-12-20 10:41:14 -0200', 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '629D5B1B-7ACB-DCB9-CE7A-19640E98B2C0', '2', NULL, '0', 'thais.d1312321321ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2541593578532131', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (58, 'usuario23213132', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:48:49 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '1C05BB76-85CE-7C33-DAA7-B7ED3E9E1A1C', '0', NULL, '0', 'thais.dia123321s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25415935785321321', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (59, 'chico', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 13:20:14 -0200', '2012-12-21 15:13:10 -0200', 'chico', 'teste', 'rua de teste', 's�o paulo', 'ms', 'USP', 'Departamento', '12/12/2012', 'AC0E3931-1BA6-4842-24E2-333EA545A1E3', '1', NULL, '0', 'thais.dias@trajettoria.com', '859632514', '251452653', '25145215422', '3', '1', '08745958');
INSERT INTO `usuarios` VALUES (60, 'jose', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:23:09 -0200', NULL, 'Jos�', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'rj', 'USP', 'Imunologia', '22/08/1989', '229ADA30-3AE7-2537-8DC7-2F10B73E9F3C', '0', NULL, '0', 'thaisas@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25148569853', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (61, 'jose1', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:25:28 -0200', '2012-12-20 10:52:54 -0200', 'Jos�', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', 'BAE47886-C036-5B91-BD27-5289353E7B1F', '3', NULL, '0', 'thasd@trajettoria.com', '(11) 9-5391-0081', '1124218095', '251485698531', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (62, 'jose12', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:26:40 -0200', NULL, 'Jos�', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'es', 'USP', 'Imunologia', '22/08/1989', 'B31BCC11-575D-1BC9-07E0-8F08DF2A1FC3', '0', NULL, '0', 'thais.dia32s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514856985311', '1', '0', '07052000');
INSERT INTO `usuarios` VALUES (63, 'jose122', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:27:54 -0200', '2012-12-19 16:35:37 -0200', 'Jos�', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'pb', 'USP', 'Imunologia', '22/08/1989', '6A8481CD-958B-3CB2-D1FD-183431A7ED57', '1', NULL, '0', 'ths@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25148569853112', '1', '0', '07052000');
INSERT INTO `usuarios` VALUES (64, 'maria', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-20 10:32:04 -0200', NULL, 'Maria', 'Dias', 'Rua Catuipe, 93', 'S�o Paulo', 'se', 'USP', 'Imunologia', '22/08/1989', 'B06E338F-38B1-D1E2-DD8F-6D9C1EA55D95', '0', NULL, '0', 'thais.di2@trajettoria.com', '(11) 9-5391-0081', '1124218095', '36985214785', '5', '0', '07052200');
INSERT INTO `usuarios` VALUES (65, 'maria2', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-20 10:34:25 -0200', NULL, 'Maria2', 'Dias', 'Rua Catuipe, 93', 'S�o Paulo', 'ce', 'USP', 'Imunologia', '22/08/1989', 'E7C4A362-237B-DD43-5498-2DB7EEC71C5D', '0', NULL, '0', 'thais.dias2321@trajettoria.com', '(11) 9-5391-0081', '1124218095', '369852147851', '1', '0', '07052200');
INSERT INTO `usuarios` VALUES (66, 'maria22', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-20 10:35:25 -0200', '2012-12-20 10:37:01 -0200', 'Maria2', 'Dias', 'Rua Catuipe, 93', 'S�o Paulo', 'pr', 'USP', 'Imunologia', '22/08/1989', '4D410BBD-D366-34BC-4062-417F5E065866', '1', NULL, '0', 'thais.d12ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '3698521478512', '1', '0', '07052200');
INSERT INTO `usuarios` VALUES (67, 'maria222', '7b6a20130d66ecc497039412e1d1a0b0', '2012-12-20 10:36:45 -0200', '2012-12-20 14:36:22 -0200', 'Maria222', 'Dias', 'Rua Catuipe, 93', 'S�o Paulo', 'am', 'ABC', 'Imunologia', '22/08/1989', 'F1872C87-01CD-E724-60ED-FCB083E9362F', '1', NULL, '0', 'thais.d1232131ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '36985214785121', '1', '0', '07052200');
INSERT INTO `usuarios` VALUES (68, 'almeida', '37e5c47bbeaccd88523b94bd73aaf659', '2013-01-15 13:09:01 -0200', '2013-01-15 13:33:38 -0200', 'Abner', 'Almeida', 'Rua dos Mellos, 300', 'Jandira', 'sp', 'USJT', 'FTCE', '20/01/1992', '584EEE32-C64F-1EF7-ACB3-CD6F270BE423', '1', NULL, '10', 'almeida@apendcity.com', '11997433501', '1147072865', '40115475818', '2', '0', '06602-100');
INSERT INTO `usuarios` VALUES (69, 'almeida2', '37e5c47bbeaccd88523b94bd73aaf659', '2013-01-16 12:17:38 -0200', '2013-01-16 14:32:52 -0200', 'Abner2', 'Almeida', 'Rua dos Mellos 300', 'JANDIRA', 'sp', 'USJT', 'FTCE', '20/01/1992', '3BB7BC67-750B-41EA-426D-B33870E2EBD2', '1', NULL, '0', 'abneralmeida92@gmail.com', '11997433501', '1147072865', '12345678911', '2', '0', '06602-100');
INSERT INTO `usuarios` VALUES (70, 'almeida3', '37e5c47bbeaccd88523b94bd73aaf659', '2013-01-16 14:25:37 -0200', '2013-01-16 14:32:29 -0200', 'Abner3', 'Almeida', 'Rua dos Mellos 300', 'JANDIRA', 'sp', 'USJT', 'FTCE', '20/01/1992', '47A8B038-E073-4E65-8F3F-FA6D43597138', '1', NULL, '1', 'abneralmeida@saojudas.br', '11997433501', '1147072865', '98765432198', '2', '0', '06602-100');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios_projetos`
-- 

CREATE TABLE `usuarios_projetos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `projeto_id` (`projeto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `usuarios_projetos`
-- 

