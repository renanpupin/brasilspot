-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 179.188.16.79    Database: brasilspot2
-- ------------------------------------------------------
-- Server version	5.6.21-69.0-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `assinaturas`
--

LOCK TABLES `assinaturas` WRITE;
/*!40000 ALTER TABLE `assinaturas` DISABLE KEYS */;
INSERT INTO `assinaturas` VALUES (2,'2015-12-25 00:00:00',1,'0000-00-00 00:00:00','2015-11-29 21:11:51'),(3,'2015-01-01 00:00:00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'2015-02-01 00:00:00',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'2015-12-20 00:00:00',2,'2015-11-29 21:40:07','2015-11-29 21:40:07'),(11,'2015-12-28 00:00:00',1,'2015-11-29 22:45:39','2015-11-29 22:45:39');
/*!40000 ALTER TABLE `assinaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assinaturasComerciantes`
--

LOCK TABLES `assinaturasComerciantes` WRITE;
/*!40000 ALTER TABLE `assinaturasComerciantes` DISABLE KEYS */;
INSERT INTO `assinaturasComerciantes` VALUES (2,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,5,10,'2015-11-29 21:40:07','2015-11-29 21:40:07'),(11,6,11,'2015-11-29 22:45:39','2015-11-29 22:45:39');
/*!40000 ALTER TABLE `assinaturasComerciantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assinaturasFiliais`
--

LOCK TABLES `assinaturasFiliais` WRITE;
/*!40000 ALTER TABLE `assinaturasFiliais` DISABLE KEYS */;
INSERT INTO `assinaturasFiliais` VALUES (4,2,10,'2015-12-01 06:09:25','2015-12-01 06:09:25');
/*!40000 ALTER TABLE `assinaturasFiliais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cartoes`
--

LOCK TABLES `cartoes` WRITE;
/*!40000 ALTER TABLE `cartoes` DISABLE KEYS */;
INSERT INTO `cartoes` VALUES (1,'Visa','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Master','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Amex','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cartoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cartoesAceitos`
--

LOCK TABLES `cartoesAceitos` WRITE;
/*!40000 ALTER TABLE `cartoesAceitos` DISABLE KEYS */;
INSERT INTO `cartoesAceitos` VALUES (12,1,'2015-11-29 18:05:12','2015-11-29 18:05:12'),(12,2,'2015-11-29 18:05:12','2015-11-29 18:05:12'),(14,1,'2015-11-29 20:16:24','2015-11-29 20:16:24'),(14,2,'2015-11-29 20:16:24','2015-11-29 20:16:24'),(15,1,'2015-11-29 20:25:55','2015-11-29 20:25:55'),(15,3,'2015-11-29 20:25:55','2015-11-29 20:25:55');
/*!40000 ALTER TABLE `cartoesAceitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Comercio',NULL,'2015-11-22 00:10:13','2015-11-22 00:10:13','comercio'),(2,'Restaurante',1,'2015-11-26 23:21:25','2015-11-26 23:21:25','restaurante'),(3,'Alimentos e bebidas',NULL,'2015-11-30 22:01:46','2015-11-30 22:01:46',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categoriasEmpresas`
--

LOCK TABLES `categoriasEmpresas` WRITE;
/*!40000 ALTER TABLE `categoriasEmpresas` DISABLE KEYS */;
INSERT INTO `categoriasEmpresas` VALUES (12,2,'2015-11-29 18:05:12','2015-11-29 18:05:12'),(14,2,'2015-11-29 20:16:24','2015-11-29 20:16:24'),(15,2,'2015-11-29 20:25:55','2015-11-29 20:25:55');
/*!40000 ALTER TABLE `categoriasEmpresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comerciantes`
--

LOCK TABLES `comerciantes` WRITE;
/*!40000 ALTER TABLE `comerciantes` DISABLE KEYS */;
INSERT INTO `comerciantes` VALUES (1,1,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,8,'2015-11-29 19:48:02','2015-11-29 19:48:02'),(5,1,9,'2015-11-29 21:12:43','2015-11-29 21:12:43'),(6,1,10,'2015-11-29 22:44:45','2015-11-29 22:44:45'),(7,1,11,'2015-11-29 23:25:21','2015-11-29 23:25:21');
/*!40000 ALTER TABLE `comerciantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (12,'Cormeciante 1','Lanches do Tio Sam','40342399802','lanchesTioSam@lanches.com','Lanches do Tio Sam','Melhor lanche vc come aqui','Lanchonete','Das 08:00 as 18:00',0,'','','',1,5,1,1,'2015-11-29 00:00:00','2015-11-29 18:05:11','2015-11-29 18:05:11'),(14,'José da Silva','José SA','12312312','jose@email.com','Pizzaria do José','A melhor pizza','pizza pizza pizza','24hrs',0,'','','',1,8,2,3,'2015-11-29 00:00:00','2015-11-29 20:16:24','2015-11-29 20:16:24'),(15,'João Gomes','Joao Gomes Corp','1312313123','joao@email.com','Pizzaria do João','A melhor pizza','asdasd','24 horas',0,'','','',1,6,2,1,'2015-11-29 00:00:00','2015-11-29 20:25:55','2015-11-29 20:25:55');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empresasPendentes`
--

LOCK TABLES `empresasPendentes` WRITE;
/*!40000 ALTER TABLE `empresasPendentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresasPendentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (1,'Avenida Paulista, 131','Centro','São Paulo Capital','São Paulo','15555-555','-51.212','-22.215','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'José Peres de Haro','Jardim Cinquentenario','Presidente Prudente','SP','19273-000','555','556','2015-11-30 00:18:59','2015-11-30 00:18:59'),(8,'José Peres de Haro','Jardim Cinquentenario','Presidente Prudente','-1','19273-000','555','556','2015-11-30 00:43:28','2015-11-30 00:43:28'),(9,'José Peres de Haro','Jardim Cinquentenario','Presidente Prudente','AP','19273-000','555','556','2015-11-30 00:48:02','2015-11-30 00:48:02'),(10,'José Peres de Haro','Jardim Cinquentenario','Presidente Prudente','SP','19273-000','12233','22223','2015-12-01 01:34:10','2015-12-01 01:34:10'),(12,'sdas','asdas','asdasd','AM','12323131','-55','-21','2015-12-01 03:43:52','2015-12-01 03:43:52'),(13,'José Peres de Haro','Jardim Cinquentenario','Presidente Prudente','SP','19273-000','12233','22223','2015-12-01 05:40:44','2015-12-01 05:40:44'),(17,'José Peres de Haro','Jardim Cinquentenario','Presidente Prudente','SP','19273-000','12233','222231111111','2015-12-01 06:09:21','2015-12-01 06:30:07');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `errosReportados`
--

LOCK TABLES `errosReportados` WRITE;
/*!40000 ALTER TABLE `errosReportados` DISABLE KEYS */;
INSERT INTO `errosReportados` VALUES (2,'Sei laa',3,0,'2015-11-29 22:56:55','2015-11-29 22:56:55'),(3,'Sssssssssssssssssssssssssssssss',3,0,'2015-11-29 23:04:05','2015-11-29 23:04:05');
/*!40000 ALTER TABLE `errosReportados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `filiais`
--

LOCK TABLES `filiais` WRITE;
/*!40000 ALTER TABLE `filiais` DISABLE KEYS */;
INSERT INTO `filiais` VALUES (10,12,17,16,15,0,'2015-12-01 06:09:23','2015-12-01 06:30:48');
/*!40000 ALTER TABLE `filiais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (1,'imagem_principal-1.jpg','2015-11-29 19:45:59','2015-11-29 19:45:59'),(2,'imagem_principal-14.jpg','2015-11-29 20:16:26','2015-11-29 20:16:26'),(3,'imagem_galeria-14.jpg','2015-11-29 20:16:27','2015-11-29 20:16:27'),(4,'imagem_galeria-14.jpg','2015-11-29 20:16:27','2015-11-29 20:16:27'),(5,'imagem_principal-15.png','2015-11-29 20:25:57','2015-11-29 20:25:57'),(6,'imagem_galeria_15_0.JPG','2015-11-29 20:25:57','2015-11-29 20:25:57');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fotosEmpresas`
--

LOCK TABLES `fotosEmpresas` WRITE;
/*!40000 ALTER TABLE `fotosEmpresas` DISABLE KEYS */;
INSERT INTO `fotosEmpresas` VALUES (14,2,1,'2015-11-29 20:16:27','2015-11-29 20:16:27'),(14,3,0,'2015-11-29 20:16:27','2015-11-29 20:16:27'),(14,4,0,'2015-11-29 20:16:27','2015-11-29 20:16:27'),(15,5,1,'2015-11-29 20:25:57','2015-11-29 20:25:57'),(15,6,0,'2015-11-29 20:25:58','2015-11-29 20:25:58');
/*!40000 ALTER TABLE `fotosEmpresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `materiaisPropagandas`
--

LOCK TABLES `materiaisPropagandas` WRITE;
/*!40000 ALTER TABLE `materiaisPropagandas` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiaisPropagandas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
INSERT INTO `metas` VALUES (1,15,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,30,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,0,'2015-11-28 15:18:08','2015-11-28 15:18:08'),(5,1,'2015-11-28 15:22:30','2015-11-28 15:27:17'),(6,0,'2015-11-28 15:22:51','2015-11-28 15:22:51'),(7,0,'2015-11-28 15:23:35','2015-11-28 15:23:35');
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_03_000000_PerfilUsuario',1),('2014_10_03_000000_Plano',1),('2014_10_03_000000_PlanoUsuario',1),('2014_10_03_000000_TipoCartao',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_10_01_000001_TipoEmpresa',1),('2015_10_03_000002_TipoVendedor',1),('2015_10_03_000005_Telefone',1),('2015_10_03_000006_Tag',1),('2015_10_03_000007_Cartao',1),('2015_10_03_000008_Categoria',1),('2015_10_03_000009_Foto',1),('2015_10_03_000010_Meta',1),('2015_10_03_000011_Vendedor',1),('2015_10_03_000012_Endereco',1),('2015_10_03_000013_Servico',1),('2015_10_03_000014_Empresa',1),('2015_10_03_000015_CategoriaEmpresa',1),('2015_10_03_000016_CartaoAceito',1),('2015_10_03_000017_EmpresaPendente',1),('2015_10_03_000018_FotoEmpresa',1),('2015_10_03_000019_ServicoEmpresa',1),('2015_10_03_000020_TagEmpresa',1),('2015_10_03_000021_TelefoneEmpresa',1),('2015_10_12_000022_MaterialPropaganda',1),('2015_10_12_000023_ErroReportado',1),('2015_10_23_103846_UsuarioPerfil',1),('2015_10_23_110400_WhatsApp',1),('2015_10_23_110401_Filial',1),('2015_10_27_190610_Reclamacoes',1),('2015_11_01_180928_Comerciante',1),('2015_11_02_150642_servicos',1),('2015_11_09_090104_Assinaturas',1),('2015_11_10_021826_AssinaturasComerciantes',1),('2015_11_10_021826_AssinaturasFiliais',1),('2015_11_21_172522_Mensagem',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('luanabernardino2009@outlook.com','73d96fa7563fba350e0cf255ab4812cc26fc4ebd19366ea9f401b3ca24e0f35b','2015-11-22 23:52:23');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perfisUsuarios`
--

LOCK TABLES `perfisUsuarios` WRITE;
/*!40000 ALTER TABLE `perfisUsuarios` DISABLE KEYS */;
INSERT INTO `perfisUsuarios` VALUES (1,'Administrador','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Vendedor','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Comerciante','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `perfisUsuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `planos`
--

LOCK TABLES `planos` WRITE;
/*!40000 ALTER TABLE `planos` DISABLE KEYS */;
INSERT INTO `planos` VALUES (1,'Básico',19.90,'plano básico','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Pro',39.90,'plano pro','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `planos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `planosUsuarios`
--

LOCK TABLES `planosUsuarios` WRITE;
/*!40000 ALTER TABLE `planosUsuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `planosUsuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reclamacoes`
--

LOCK TABLES `reclamacoes` WRITE;
/*!40000 ALTER TABLE `reclamacoes` DISABLE KEYS */;
INSERT INTO `reclamacoes` VALUES (2,2,'Ta tenso',1,'2015-11-28 15:28:02','2015-11-28 16:43:10'),(5,4,'asdas',1,'2015-11-29 15:41:03','2015-11-29 15:42:12');
/*!40000 ALTER TABLE `reclamacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (1,'Aberto 24 horas','0000-00-00 00:00:00','0000-00-00 00:00:00','aberto-24-horas'),(2,'Acesso para deficientes físicos','0000-00-00 00:00:00','0000-00-00 00:00:00','acesso-para-deficientes-fisicos'),(3,'Ar condicionado','0000-00-00 00:00:00','0000-00-00 00:00:00','ar-condicionado'),(4,'Buffet','0000-00-00 00:00:00','0000-00-00 00:00:00','buffet'),(5,'Delivery','0000-00-00 00:00:00','0000-00-00 00:00:00','delivery'),(6,'Música ao vivo','0000-00-00 00:00:00','0000-00-00 00:00:00','musica-ao-vivo'),(7,'Wifi','0000-00-00 00:00:00','0000-00-00 00:00:00','wifi'),(8,'Karaokê','0000-00-00 00:00:00','0000-00-00 00:00:00','karaoke'),(9,'Estacionamento','0000-00-00 00:00:00','0000-00-00 00:00:00','estacionamento');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicosEmpresas`
--

LOCK TABLES `servicosEmpresas` WRITE;
/*!40000 ALTER TABLE `servicosEmpresas` DISABLE KEYS */;
INSERT INTO `servicosEmpresas` VALUES (15,1,'2015-11-29 21:05:55','2015-11-29 21:05:55'),(15,3,'2015-11-29 21:05:56','2015-11-29 21:05:56'),(15,4,'2015-11-29 21:05:56','2015-11-29 21:05:56'),(15,5,'2015-11-29 21:05:56','2015-11-29 21:05:56'),(15,6,'2015-11-29 21:05:56','2015-11-29 21:05:56'),(15,7,'2015-11-29 21:05:56','2015-11-29 21:05:56');
/*!40000 ALTER TABLE `servicosEmpresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Pizzaria do José','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'Pizza Gostosa','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'Pizzaria Avenida Paulista','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,'lanche','2015-11-29 18:05:13','2015-11-29 18:05:13',NULL),(5,'delicia','2015-11-29 18:05:13','2015-11-29 18:05:13',NULL),(6,'sam','2015-11-29 18:05:13','2015-11-29 18:05:13',NULL),(7,'pizzaria são paulo','2015-11-29 20:16:26','2015-11-29 20:16:26',NULL),(8,' melhor pizza','2015-11-29 20:16:26','2015-11-29 20:16:26',NULL),(9,' pizza gostosa','2015-11-29 20:16:26','2015-11-29 20:16:26',NULL),(10,'pizzaria são paulo','2015-11-29 20:25:56','2015-11-29 20:25:56',NULL),(11,' melhor pizza','2015-11-29 20:25:57','2015-11-29 20:25:57',NULL),(12,' pizza gostosa','2015-11-29 20:25:57','2015-11-29 20:25:57',NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tagsEmpresas`
--

LOCK TABLES `tagsEmpresas` WRITE;
/*!40000 ALTER TABLE `tagsEmpresas` DISABLE KEYS */;
INSERT INTO `tagsEmpresas` VALUES (12,4,'2015-11-29 18:05:13','2015-11-29 18:05:13'),(12,5,'2015-11-29 18:05:13','2015-11-29 18:05:13'),(12,6,'2015-11-29 18:05:14','2015-11-29 18:05:14'),(14,7,'2015-11-29 20:16:26','2015-11-29 20:16:26'),(14,8,'2015-11-29 20:16:26','2015-11-29 20:16:26'),(14,9,'2015-11-29 20:16:26','2015-11-29 20:16:26'),(15,10,'2015-11-29 20:25:57','2015-11-29 20:25:57'),(15,11,'2015-11-29 20:25:57','2015-11-29 20:25:57'),(15,12,'2015-11-29 20:25:57','2015-11-29 20:25:57');
/*!40000 ALTER TABLE `tagsEmpresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `telefones`
--

LOCK TABLES `telefones` WRITE;
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` VALUES (6,'18981670848','2015-11-30 00:18:59','2015-11-30 00:18:59'),(7,'18981670848','2015-11-30 00:43:28','2015-11-30 00:43:28'),(8,'18981670848','2015-11-30 00:48:03','2015-11-30 00:48:03'),(9,'18981670848','2015-12-01 01:34:11','2015-12-01 01:34:11'),(11,'123132','2015-12-01 03:43:53','2015-12-01 03:43:53'),(12,'18981670848','2015-12-01 05:40:45','2015-12-01 05:40:45'),(16,'18981670848','2015-12-01 06:09:22','2015-12-01 06:09:22');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `telefonesEmpresas`
--

LOCK TABLES `telefonesEmpresas` WRITE;
/*!40000 ALTER TABLE `telefonesEmpresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefonesEmpresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tiposCartoes`
--

LOCK TABLES `tiposCartoes` WRITE;
/*!40000 ALTER TABLE `tiposCartoes` DISABLE KEYS */;
INSERT INTO `tiposCartoes` VALUES (1,' Crédito'),(2,'Débito'),(3,'Crédito ou Débito');
/*!40000 ALTER TABLE `tiposCartoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tiposEmpresas`
--

LOCK TABLES `tiposEmpresas` WRITE;
/*!40000 ALTER TABLE `tiposEmpresas` DISABLE KEYS */;
INSERT INTO `tiposEmpresas` VALUES (1,'Comércio','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Serviço','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Atrações','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Profissionais','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tiposEmpresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tiposVendedores`
--

LOCK TABLES `tiposVendedores` WRITE;
/*!40000 ALTER TABLE `tiposVendedores` DISABLE KEYS */;
INSERT INTO `tiposVendedores` VALUES (1,'alfa','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'beta','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tiposVendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Renan','renan@brasilspot.com','$2y$10$/aINiBiDokYzxOLalL9gOuNa4sL/UExU2mjv.LH2r3WzgRZcq31A6',1,'EgCaef9U1xT790z6C7ahXKcCji4JG3Yvg9jawaGc6tUl8IiKBYza85zx4q6C','0000-00-00 00:00:00','2015-11-30 04:39:05'),(2,'Alisson Administrador','alisson@brasilspot.com','$2y$10$7VX7TPqeJodEcbn.K/NxUul1XaDcqae7iMAQey5pi2K4ceLDSqmxm',1,'kpwoCp1zJ3vjPFkdOSQOZJLN2p3tqvHMiO8GQ8kITWluRejZ5hk3OfPHu19k','0000-00-00 00:00:00','2015-11-29 16:20:41'),(3,'Vendedor Alfa','alfa@brasilspot.com','$2y$10$iyz4xDo4pr9wqdzqWPS7semcWjkIEBtqPboc01lRSRfcQnrQPFSH.',2,'S8U75cQbzZ2oJwOQ77uagYNv2karoLpzNpSLZUzkrpGbYQEKfWlin1vRlnNR','0000-00-00 00:00:00','2015-11-30 01:35:21'),(4,'Vendedor Beta','beta@brasilspot.com','$2y$10$buds/5eRKK7N1mLtd6OIP.6cOfgMZp96VXvwW/RfKZBRMIjeGMdvq',2,'1eBIvcnI78GnALO2Jx6AOEcLqXJGtxwBwR3FfvFtlZ3krwicBNf4qCr8W3tA','0000-00-00 00:00:00','2015-11-29 20:26:47'),(5,'Comerciante 1','comerciante1@brasilspot.com','$2y$10$pE57bk4.L.pjwOxvZYsXUuo0ZsI6C60VEyMSQIrbZ4Pi/SFnsTVdC',3,'8jl3s4mRP6E1MBdzkUucrM11sMFsf45fkJboHxOjLbcnlnYR4fT6ZfCEGqG8','0000-00-00 00:00:00','2015-11-29 15:39:54'),(6,'Comerciante 2','comerciante2@brasilspot.com','$2y$10$QYQO6D07cSlI1C9QmSk3nO/15cY8lMW7eCSJcdUws3m4cdztbHmVy',3,'ibUjDej3aja7SaAsYphFIYyzIkGJythBFqs5gzZzHx7UKJ7z9QybH02WtSxT','0000-00-00 00:00:00','2015-12-01 03:38:48'),(8,'Cormeciante 3','tiago@brasilspot.com','$2y$10$HrCwZXSjCavbrs2b9XxX9eBl8PaB8LHYOlI.ZcA/4Am2xxUYwLNJe',3,NULL,'2015-11-29 19:48:02','2015-11-29 19:48:02'),(9,'Comerciante 4','comerciante4@brasilspot.com','$2y$10$XCGU4OyUy5FaJBWDcRxfwOAoFp9tursy46TQegmMQ9H90IO2P33Su',3,NULL,'2015-11-29 21:12:43','2015-11-29 21:12:43'),(10,'Alisson2','alissonerdx@outlook.com','$2y$10$XJqeLqhK3fWP7HbaXoRreOMhvkpBegLEd2VIQTh2qJaxljKHWOOl2',3,NULL,'2015-11-29 22:44:45','2015-11-29 22:44:45'),(11,'Tiagoz','tiago2000@brasilspot.com','$2y$10$SfC10TNLQ1S0Q3jmwpcqBe9k9ebHUFC0s9y.JxZTSIHi007ZTbScG',3,NULL,'2015-11-29 23:25:21','2015-11-29 23:25:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuariosPerfis`
--

LOCK TABLES `usuariosPerfis` WRITE;
/*!40000 ALTER TABLE `usuariosPerfis` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariosPerfis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,3,1,1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,4,2,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `whatsApp`
--

LOCK TABLES `whatsApp` WRITE;
/*!40000 ALTER TABLE `whatsApp` DISABLE KEYS */;
INSERT INTO `whatsApp` VALUES (6,'18981670848','2015-11-30 00:18:59','2015-11-30 00:18:59'),(7,'18981670848','2015-11-30 00:43:28','2015-11-30 00:43:28'),(8,'18981670848','2015-11-30 00:48:03','2015-11-30 00:48:03'),(9,'18981670848','2015-12-01 01:34:11','2015-12-01 01:34:11'),(10,'412422','2015-12-01 03:43:53','2015-12-01 03:43:53'),(11,'18981670848','2015-12-01 05:40:45','2015-12-01 05:40:45'),(15,'18981670848','2015-12-01 06:09:22','2015-12-01 06:09:22');
/*!40000 ALTER TABLE `whatsApp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-01 16:00:40
