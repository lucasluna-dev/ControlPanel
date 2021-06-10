-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2021 às 16:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_bufe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bufe_admin.usuarios`
--

CREATE TABLE `bufe_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bufe_admin.usuarios`
--

INSERT INTO `bufe_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', '', 'Anonimo', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` int(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, 0, '2021-02-11'),
(2, 0, '2021-02-11'),
(3, 0, '2021-02-11'),
(4, 0, '2021-02-19'),
(5, 0, '2021-02-24'),
(6, 0, '2021-03-04'),
(7, 0, '2021-03-11'),
(8, 0, '2021-03-19'),
(9, 0, '2021-03-19'),
(10, 0, '2021-03-26'),
(11, 0, '2021-04-05'),
(12, 0, '2021-04-12'),
(13, 0, '2021-04-19'),
(14, 0, '2021-04-21'),
(15, 0, '2021-04-27'),
(16, 0, '2021-05-04'),
(17, 0, '2021-05-06'),
(18, 0, '2021-05-13'),
(19, 0, '2021-05-18'),
(20, 0, '2021-06-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bufe.config`
--

CREATE TABLE `tb_bufe.config` (
  `titulo_site` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `titulo_missao` varchar(255) NOT NULL,
  `texto_missao` text NOT NULL,
  `img_missao` varchar(255) NOT NULL,
  `degustacao` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `titulo_footer` varchar(255) NOT NULL,
  `texto_footer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_bufe.config`
--

INSERT INTO `tb_bufe.config` (`titulo_site`, `telefone`, `titulo_missao`, `texto_missao`, `img_missao`, `degustacao`, `email`, `cidade`, `titulo_footer`, `texto_footer`) VALUES
('Lucas de Luna', '2196771-2007', 'Você Sonha & nós realizamos!', '<p>Somos uma empresa especializada em Buffet e decora&ccedil;&atilde;o de festas &amp; eventos, que ha 15 anos foi criada para transformar seus sonhos em realidade. Nossa equipe &eacute; formada por especialistas em decora&ccedil;&atilde;o de festas, profissionais para preparo dos itens do buffet, uma excelente equipe de gar&ccedil;ons e monitores, que est&atilde;o sempre preocupados em trazer para os nossos clientes, em primeira m&atilde;o o melhor que o mercado tem para oferecer. Organizamos todos os tipos de confraterniza&ccedil;&atilde;o, das menores at&eacute; as mais elaboradas, com a mesma aten&ccedil;&atilde;o, capricho e dedica&ccedil;&atilde;o. Oferecemos Buffet Completo, Rod&iacute;zio de Pizza, Trenzinho de Lanches, Kit Personalizados, Decora&ccedil;&atilde;o Personalizada, Aluguel de Brinquedos, Cupcakes, Doces Tradicionais e Personalizados, Equipe para Festas e muito mais prezamos pela qualidade, bom gosto e pontualidade. Ent&atilde;o se voc&ecirc; gosta do que h&aacute; de melhor, entre em contato conosco, ser&aacute; um privil&eacute;gio atender voc&ecirc;.</p>', '60899cb24ba6c.jpg', '<h2 style=\"text-align: center;\"><span style=\"background-color: #843fa1; color: #ffffff; font-size: 24pt;\"><strong><span style=\"text-align: start;\">Fa&ccedil;a uma Degusta&ccedil;&atilde;o!</span></strong></span></h2>\r\n<p>Disponibilizamos alguns de nossos produtos para sua degusta&ccedil;&atilde;o, fa&ccedil;a sua escolha personalizada para surprender seus convidados em sua festa ou evento. Ligue agora mesmo para (21)9999-999 e agende sua degusta&ccedil;&atilde;o sem compromisso!</p>', '021festas.eventos@gmail.com', 'Rio de Janeiro', 'Siga a 021 Festas e Eventos nas redes socias', '<p>Lorem Ipsum &eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI.</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bufe.galeria`
--

CREATE TABLE `tb_bufe.galeria` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_bufe.galeria`
--

INSERT INTO `tb_bufe.galeria` (`id`, `descricao`, `img`, `order_id`) VALUES
(3, '<p>imagem de verifica&ccedil;&atilde;o</p>', '60886c7b3767f.jpeg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bufe.servicos`
--

CREATE TABLE `tb_bufe.servicos` (
  `id` int(11) NOT NULL,
  `titulo_servicos` varchar(255) NOT NULL,
  `subtitulo_servicos` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_bufe.servicos`
--

INSERT INTO `tb_bufe.servicos` (`id`, `titulo_servicos`, `subtitulo_servicos`, `img`, `conteudo`, `order_id`) VALUES
(53, 'Bolo de chocolate', 'Bolos de chocolates para sua familia!!', '607f3510d845d.jpg', '<div class=\"col-instructions\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: inherit; font-family: \'Myriad Pro\', sans-serif; font-size: 18px; vertical-align: baseline; flex: 1 1 auto; color: #424f57; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">&nbsp;</div>\r\n<div class=\"col-ingredients\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px 0.9375rem 1.875rem 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: inherit; font-family: \'Myriad Pro\', sans-serif; font-size: 18px; vertical-align: baseline; width: 330px; min-width: 330px; flex: 0 0 330px; color: #424f57; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">\r\n<h3 class=\"title\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 900; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 1.5rem; vertical-align: baseline;\">Ingredientes</h3>\r\n<form id=\"add-to-supermarket-list\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline;\" action=\"https://www.receitasnestle.com.br/cult_user_supermarket_list/add\" method=\"post\">\r\n<div class=\"view-content\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline;\">\r\n<div class=\"ingredients-box\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline;\">\r\n<h4 style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline;\">Massa</h4>\r\n<ul style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline; list-style: none;\">\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">5 ovos</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">1 x&iacute;cara (ch&aacute;) de a&ccedil;&uacute;car</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">1 x&iacute;cara (ch&aacute;) de Leite L&iacute;quido NINHO&reg; Forti+ Integral</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">2 x&iacute;caras (ch&aacute;) de farinha de trigo</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">meia x&iacute;cara (ch&aacute;) de Chocolate em P&oacute; NESTL&Eacute;&reg; DOIS FRADES&reg;</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">1 colher (sopa) de fermento em p&oacute;</li>\r\n</ul>\r\n</div>\r\n<div class=\"ingredients-box\" style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline;\">\r\n<h4 style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline;\">Recheio e Cobertura</h4>\r\n<ul style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 18px; vertical-align: baseline; list-style: none;\">\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">2 Leite MO&Ccedil;A&reg; (lata ou caixinha) 395g</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">2 colheres (sopa) de manteiga</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">meia x&iacute;cara (ch&aacute;) de Chocolate em P&oacute; NESTL&Eacute;&reg; DOIS FRADES&reg;</li>\r\n<li style=\"text-decoration: none; -webkit-tap-highlight-color: transparent; -webkit-print-color-adjust: exact; box-sizing: border-box; outline: none !important; margin: 0px; padding: 0px 0px 0.5rem 1.25rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.4; font-family: \'Myriad Pro\', sans-serif; font-size: 1.125rem; vertical-align: baseline; position: relative;\">meia x&iacute;cara (ch&aacute;) de chocolate granulado</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</form></div>', 53),
(66, 'Ceia de Natal', 'Ceia de natal para sua famailia !!', '60906a2b09f43.jpeg', '', 66),
(70, 'Cesta de café da manhã', '', '609493843afd9.jpg', '<p>1 Cesta Lindamente Decorada com Papel Celofane e La&ccedil;os</p>\r\n<p>100g Salm&atilde;o Marinado</p>\r\n<p>1 Salada de Frutas</p>\r\n<p>1 Pote de Geleia</p>\r\n<p>3 Chipas de Queijo &ndash; receita original The Bakers</p>\r\n<p>1 Manteiga La Motte OU Manteiga President OU substitu&iacute;da por uma embalagem de 128g (8 unidades) do queijo A VACA QUE RI (conforme disponibilidade em estoque)</p>\r\n<p>1 P&atilde;o Artesanal The Bakers</p>\r\n<p>2 Croissant Tradicional The Bakers</p>\r\n<p>100g Presunto de Parma</p>\r\n<p>200g Queijo Emmental</p>\r\n<p>1 Suco de Uva Casa da Madeira&nbsp; 250ml</p>\r\n<p>1 Suco Del Vale</p>\r\n<p>1 Biscoito Casadinho</p>\r\n<p>&nbsp;</p>', 70);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bufe.slides`
--

CREATE TABLE `tb_bufe.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_bufe.slides`
--

INSERT INTO `tb_bufe.slides` (`id`, `nome`, `slide`, `order_id`) VALUES
(4, 'slide01', '607eeb2286f04.jpg', 4),
(5, 'slide02', '607eeb4f74a00.jpg', 5),
(9, 'paisagem', '6089647119964.jpg', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes_depoimentos`
--

CREATE TABLE `tb_clientes_depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_clientes_depoimentos`
--

INSERT INTO `tb_clientes_depoimentos` (`id`, `nome`, `depoimento`, `order_id`) VALUES
(59, 'Lucas L. Silva', 'gostei muito de hoje!!', 59),
(60, 'Duda luna', 'Estava tudo perfeito!!', 60),
(61, 'Gabriel ', 'O blobo de chocolatee esta uma delicia!!', 61),
(62, '@Regina', 'Tudo Perfeito!!', 62);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bufe_admin.usuarios`
--
ALTER TABLE `bufe_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_bufe.galeria`
--
ALTER TABLE `tb_bufe.galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_bufe.servicos`
--
ALTER TABLE `tb_bufe.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_bufe.slides`
--
ALTER TABLE `tb_bufe.slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_clientes_depoimentos`
--
ALTER TABLE `tb_clientes_depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bufe_admin.usuarios`
--
ALTER TABLE `bufe_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_bufe.galeria`
--
ALTER TABLE `tb_bufe.galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_bufe.servicos`
--
ALTER TABLE `tb_bufe.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `tb_bufe.slides`
--
ALTER TABLE `tb_bufe.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_clientes_depoimentos`
--
ALTER TABLE `tb_clientes_depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
