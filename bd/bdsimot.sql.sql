-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: bdsimot
-- ------------------------------------------------------
-- Server version	5.6.22-log

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
-- Table structure for table `abastecimento_agua`
--

DROP TABLE IF EXISTS `abastecimento_agua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abastecimento_agua` (
  `fkid_municipios` int(11) NOT NULL,
  `agua_nao_canalizada` tinyint(1) NOT NULL,
  `domicilios_atendidos_agua_nao_canalizada` int(11) DEFAULT NULL,
  `empresa_responsavel_agua_nao_canalizada` varchar(200) DEFAULT NULL,
  `canalizada_poco` tinyint(1) NOT NULL,
  `domicilios_atendidos_canalizada_poco` int(11) DEFAULT NULL,
  `empresa_responsavel_canalizada_poco` varchar(200) DEFAULT NULL,
  `canalizada_nascente` tinyint(1) NOT NULL,
  `domicilios_atendidos_canalizada_nascente` int(11) DEFAULT NULL,
  `empresa_responsavel_canalizada_nascente` varchar(200) DEFAULT NULL,
  `canalizada_de_curso` tinyint(1) NOT NULL,
  `domicilios_atendidos_canalizada_curso` int(11) DEFAULT NULL,
  `empresa_responsavel_canalizada_curso` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Abastecimento_agua_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abastecimento_agua`
--

LOCK TABLES `abastecimento_agua` WRITE;
/*!40000 ALTER TABLE `abastecimento_agua` DISABLE KEYS */;
/*!40000 ALTER TABLE `abastecimento_agua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracteristicas_municipios`
--

DROP TABLE IF EXISTS `caracteristicas_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracteristicas_municipios` (
  `fkid_municipios` int(11) NOT NULL,
  `area_total_km` int(11) NOT NULL,
  `area_urbana_km` int(11) NOT NULL,
  `area_rural_km` int(11) NOT NULL,
  `ano_base_area` int(11) NOT NULL,
  `populacao_total` int(11) NOT NULL,
  `populacao_urbana` int(11) NOT NULL,
  `populacao_rural` int(11) NOT NULL,
  `ano_base_populacao` int(11) NOT NULL,
  `altitude_media` int(11) NOT NULL,
  `media_temperatura` int(11) NOT NULL,
  `minima_temperatura` int(11) NOT NULL,
  `maxima_temperatura` int(11) NOT NULL,
  `meses_mais_frios` varchar(100) NOT NULL,
  `meses_mais_quentes` varchar(100) NOT NULL,
  `meses_mais_chuvosos` varchar(100) NOT NULL,
  `meses_menos_chuvosos` varchar(100) NOT NULL,
  `principais_atv_economicas` text NOT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Caracteristicas_Municipios_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristicas_municipios`
--

LOCK TABLES `caracteristicas_municipios` WRITE;
/*!40000 ALTER TABLE `caracteristicas_municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `caracteristicas_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_telefone`
--

DROP TABLE IF EXISTS `categoria_telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_telefone` (
  `id_categoria_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria_telefone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_telefone`
--

LOCK TABLES `categoria_telefone` WRITE;
/*!40000 ALTER TABLE `categoria_telefone` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id_departamentos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_departamento` varchar(200) NOT NULL,
  `fkid_secretaria` int(11) NOT NULL,
  PRIMARY KEY (`id_departamentos`),
  KEY `fk_departamentos_Secretarias1_idx` (`fkid_secretaria`),
  CONSTRAINT `fk_departamentos_Secretarias1` FOREIGN KEY (`fkid_secretaria`) REFERENCES `secretarias` (`id_secretaria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposicao_tratamento`
--

DROP TABLE IF EXISTS `deposicao_tratamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposicao_tratamento` (
  `fkid_municipios` int(11) NOT NULL,
  `aterro` tinyint(1) NOT NULL,
  `total_atendido_aterro` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_aterro` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_aterro` int(11) DEFAULT NULL,
  `entidade_responsavel_aterro` varchar(50) DEFAULT NULL,
  `compostagem` tinyint(1) NOT NULL,
  `total_atendido_compostagem` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_compostagem` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_compostagem` int(11) DEFAULT NULL,
  `entidade_responsavel_compostagem` varchar(50) DEFAULT NULL,
  `lixao` tinyint(1) NOT NULL,
  `total_atendido_lixao` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_lixao` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_lixao` int(11) DEFAULT NULL,
  `entidade_responsavel_lixao` varchar(50) DEFAULT NULL,
  `outros` varchar(40) DEFAULT NULL,
  `total_atendido_outros` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_outros` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_outros` int(11) DEFAULT NULL,
  `entidade_responsavel_outros` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Deposicao_Tratamento_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposicao_tratamento`
--

LOCK TABLES `deposicao_tratamento` WRITE;
/*!40000 ALTER TABLE `deposicao_tratamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposicao_tratamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feriados`
--

DROP TABLE IF EXISTS `feriados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriados` (
  `id_feriados` int(11) NOT NULL AUTO_INCREMENT,
  `nome_feriado` varchar(50) NOT NULL,
  `data_feriado` date NOT NULL,
  `fkid_municipios` int(11) NOT NULL,
  PRIMARY KEY (`id_feriados`),
  KEY `fk_Feriados_Infobas_Municipios1_idx` (`fkid_municipios`),
  CONSTRAINT `fk_Feriados_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feriados`
--

LOCK TABLES `feriados` WRITE;
/*!40000 ALTER TABLE `feriados` DISABLE KEYS */;
/*!40000 ALTER TABLE `feriados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_municipio`
--

DROP TABLE IF EXISTS `historico_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_municipio` (
  `fkid_municipios` int(11) NOT NULL,
  `origem_nome` text NOT NULL,
  `data_fundacao` date NOT NULL,
  `data_emancipacao` date NOT NULL,
  `fundadores` varchar(300) NOT NULL,
  `outros_fatos` text NOT NULL,
  PRIMARY KEY (`fkid_municipios`),
  KEY `fk_Historico_Municipio_Infobas_Municipios1_idx` (`fkid_municipios`),
  CONSTRAINT `fk_Historico_Municipio_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_municipio`
--

LOCK TABLES `historico_municipio` WRITE;
/*!40000 ALTER TABLE `historico_municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infobas_municipios`
--

DROP TABLE IF EXISTS `infobas_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infobas_municipios` (
  `id_municipios` int(11) NOT NULL AUTO_INCREMENT,
  `nome_municipio` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `regiao_turistica` varchar(100) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `site` varchar(200) DEFAULT NULL,
  `cnpj` varchar(20) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `distancia_capital_km` int(11) DEFAULT NULL,
  `qtd_Funcionarios` int(11) NOT NULL,
  `qtd_funcionarios_deficiencia` int(11) NOT NULL,
  `nome_prefeito` varchar(100) NOT NULL,
  `aniversario_municipal` date NOT NULL,
  `santo_padroeiro` varchar(50) NOT NULL,
  PRIMARY KEY (`id_municipios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infobas_municipios`
--

LOCK TABLES `infobas_municipios` WRITE;
/*!40000 ALTER TABLE `infobas_municipios` DISABLE KEYS */;
INSERT INTO `infobas_municipios` VALUES (1,'Goianinha','RN','Não sei','Rua Fulano de Tal',322,'Prédio','Matadouro',NULL,'prefeitura.goianinha@gmail.com','','9842384',89990000,86828877,50,800,80,'Lucia','2021-11-12','Nossa senhora dos prazeres'),(2,'Vila Flor','RN','Não sei','Rua Fulano de Tal',1000,'Casa','Cicrano',NULL,'vila.flor@prefeitura.com','','340940000',734838888,230934803,90,799,73,'Ana','1999-09-09','Irineu');
/*!40000 ALTER TABLE `infobas_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instancias_governanca`
--

DROP TABLE IF EXISTS `instancias_governanca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancias_governanca` (
  `municipal` text NOT NULL,
  `estadual` text NOT NULL,
  `regional` text NOT NULL,
  `nacional` text NOT NULL,
  `internacional` text NOT NULL,
  `fkid_municipios` int(11) NOT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Instancias_Governanca_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancias_governanca`
--

LOCK TABLES `instancias_governanca` WRITE;
/*!40000 ALTER TABLE `instancias_governanca` DISABLE KEYS */;
/*!40000 ALTER TABLE `instancias_governanca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legislacao_municipal`
--

DROP TABLE IF EXISTS `legislacao_municipal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legislacao_municipal` (
  `fkid_municipios` int(11) NOT NULL,
  `lei_organica` varchar(45) NOT NULL,
  `ocupacao_solo` varchar(45) NOT NULL,
  `PDT` varchar(45) NOT NULL,
  `protecao_ambiental` varchar(45) NOT NULL,
  `apoio_cultura` varchar(45) NOT NULL,
  `incentivos_fiscais_turismo` varchar(45) NOT NULL,
  `plano_diretor` varchar(45) NOT NULL,
  `FMT` varchar(45) NOT NULL,
  `outras` text,
  PRIMARY KEY (`fkid_municipios`),
  KEY `fk_Legislacao_Municipal_Infobas_Municipios1_idx` (`fkid_municipios`),
  CONSTRAINT `fk_Legislacao_Municipal_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legislacao_municipal`
--

LOCK TABLES `legislacao_municipal` WRITE;
/*!40000 ALTER TABLE `legislacao_municipal` DISABLE KEYS */;
/*!40000 ALTER TABLE `legislacao_municipal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios_brasil`
--

DROP TABLE IF EXISTS `municipios_brasil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios_brasil` (
  `id_municipios_brasil` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  PRIMARY KEY (`id_municipios_brasil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios_brasil`
--

LOCK TABLES `municipios_brasil` WRITE;
/*!40000 ALTER TABLE `municipios_brasil` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipios_brasil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios_limitrofes`
--

DROP TABLE IF EXISTS `municipios_limitrofes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios_limitrofes` (
  `fkid_municipios` int(11) NOT NULL,
  `fkid_municipios_brasil` int(11) NOT NULL,
  PRIMARY KEY (`fkid_municipios`,`fkid_municipios_brasil`),
  KEY `fk_Municipios_Limitrofes_Municipios_Brasil1_idx` (`fkid_municipios_brasil`),
  CONSTRAINT `fk_Municipios_Limitrofes_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Municipios_Limitrofes_Municipios_Brasil1` FOREIGN KEY (`fkid_municipios_brasil`) REFERENCES `municipios_brasil` (`id_municipios_brasil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios_limitrofes`
--

LOCK TABLES `municipios_limitrofes` WRITE;
/*!40000 ALTER TABLE `municipios_limitrofes` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipios_limitrofes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgao_oficial_tur`
--

DROP TABLE IF EXISTS `orgao_oficial_tur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgao_oficial_tur` (
  `fkid_municipios` int(11) NOT NULL,
  `nome_orgao_oficial_tur` varchar(100) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `distrito` varchar(200) DEFAULT NULL,
  `cep` varchar(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `site` varchar(45) DEFAULT NULL,
  `qtd_funcionarios` int(11) NOT NULL,
  `qtd_funcionarios_superior_turismo` int(11) NOT NULL,
  PRIMARY KEY (`fkid_municipios`),
  KEY `fk_Orgao_Oficial_Tur_Infobas_Municipios1_idx` (`fkid_municipios`),
  CONSTRAINT `fk_Orgao_Oficial_Tur_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgao_oficial_tur`
--

LOCK TABLES `orgao_oficial_tur` WRITE;
/*!40000 ALTER TABLE `orgao_oficial_tur` DISABLE KEYS */;
/*!40000 ALTER TABLE `orgao_oficial_tur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reciclagem`
--

DROP TABLE IF EXISTS `reciclagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reciclagem` (
  `fkid_municipios` int(11) NOT NULL,
  `reciclagem_aco` tinyint(1) NOT NULL,
  `total_reciclagem_aco` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_aco` varchar(50) DEFAULT NULL,
  `reciclagem_aluminio` tinyint(1) NOT NULL,
  `total_reciclagem_aluminio` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_aluminio` varchar(50) DEFAULT NULL,
  `reciclagem_ferro` tinyint(1) NOT NULL,
  `total_reciclagem_ferro` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_ferro` varchar(50) DEFAULT NULL,
  `reciclagem_outro_metal` tinyint(1) NOT NULL,
  `total_reciclagem_outro_metal` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_outro_metal` varchar(50) DEFAULT NULL,
  `reciclagem_baterias_pilhas` tinyint(1) NOT NULL,
  `total_reciclagem_baterias_pilhas` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_baterias_pilhas` varchar(45) DEFAULT NULL,
  `reciclagem_borracha` tinyint(1) NOT NULL,
  `total_reciclagem_borracha` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_borracha` varchar(50) DEFAULT NULL,
  `reciclagem_eletronicos` tinyint(1) NOT NULL,
  `total_reciclagem_eletronicos` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_eletronicos` varchar(50) DEFAULT NULL,
  `reciclagem_embalagens` tinyint(1) NOT NULL,
  `total_reciclagem_embalagens` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_embalagens` varchar(50) DEFAULT NULL,
  `reciclagem_entulho` tinyint(1) NOT NULL,
  `total_reciclagem_entulho` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_entulho` varchar(50) DEFAULT NULL,
  `reciclagem_madeira` tinyint(1) NOT NULL,
  `total_reciclagem_madeira` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_madeira` varchar(50) DEFAULT NULL,
  `reciclagem_papel` tinyint(1) NOT NULL,
  `total_reciclagem_papel` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_papel` varchar(50) DEFAULT NULL,
  `reciclagem_plastico` tinyint(1) NOT NULL,
  `total_reciclagem_plastico` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_plastico` varchar(50) DEFAULT NULL,
  `reciclagem_vidro` tinyint(1) NOT NULL,
  `total_reciclagem_vidro` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_vidro` varchar(50) DEFAULT NULL,
  `reciclagem_oleo` tinyint(1) NOT NULL,
  `total_reciclagem_oleo` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_oleo` varchar(50) DEFAULT NULL,
  `reciclagem_outros` varchar(40) DEFAULT NULL,
  `total_reciclagem_outros` int(11) DEFAULT NULL,
  `entidade_responsavel_reciclagem_outros` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Reciclagem_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reciclagem`
--

LOCK TABLES `reciclagem` WRITE;
/*!40000 ALTER TABLE `reciclagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `reciclagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redes_sociais_municipios`
--

DROP TABLE IF EXISTS `redes_sociais_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redes_sociais_municipios` (
  `fkid_municipios` int(11) NOT NULL,
  `fkid_redes_sociais` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`fkid_municipios`,`fkid_redes_sociais`),
  KEY `fk_Redes_Sociais_Municipios_Infobas_Municipios1_idx` (`fkid_municipios`),
  KEY `fk_Redes_Sociais_Municipios_RedesSociais1_idx` (`fkid_redes_sociais`),
  CONSTRAINT `fk_Redes_Sociais_Municipios_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Redes_Sociais_Municipios_RedesSociais1` FOREIGN KEY (`fkid_redes_sociais`) REFERENCES `redessociais` (`id_redes_sociais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redes_sociais_municipios`
--

LOCK TABLES `redes_sociais_municipios` WRITE;
/*!40000 ALTER TABLE `redes_sociais_municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `redes_sociais_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redessociais`
--

DROP TABLE IF EXISTS `redessociais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redessociais` (
  `id_redes_sociais` int(11) NOT NULL AUTO_INCREMENT,
  `nome_rede` varchar(100) NOT NULL,
  `logo_rede` blob,
  PRIMARY KEY (`id_redes_sociais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redessociais`
--

LOCK TABLES `redessociais` WRITE;
/*!40000 ALTER TABLE `redessociais` DISABLE KEYS */;
/*!40000 ALTER TABLE `redessociais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secretarias`
--

DROP TABLE IF EXISTS `secretarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secretarias` (
  `id_secretaria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_secretaria` varchar(200) NOT NULL,
  `fkid_municipios` int(11) NOT NULL,
  PRIMARY KEY (`id_secretaria`),
  KEY `fk_Secretarias_Infobas_Municipios1_idx` (`fkid_municipios`),
  CONSTRAINT `fk_Secretarias_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secretarias`
--

LOCK TABLES `secretarias` WRITE;
/*!40000 ALTER TABLE `secretarias` DISABLE KEYS */;
/*!40000 ALTER TABLE `secretarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_comunicacao`
--

DROP TABLE IF EXISTS `servicos_comunicacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos_comunicacao` (
  `internet_radio` tinyint(1) NOT NULL,
  `internet_cabo` tinyint(1) NOT NULL,
  `internet_banda_larga` tinyint(1) NOT NULL,
  `internet_discada` tinyint(1) NOT NULL,
  `internet_wireless` tinyint(1) NOT NULL,
  `internet_3g` tinyint(1) NOT NULL,
  `telefonia_movel` tinyint(1) NOT NULL,
  `area_todo_municipio_tmovel` tinyint(1) NOT NULL,
  `area_parte_municipio_tmovel` tinyint(1) NOT NULL,
  `telefonia_fixa` tinyint(1) NOT NULL,
  `area_todo_municipio_tfixa` tinyint(1) NOT NULL,
  `area_parte_municipio_tfixa` tinyint(1) NOT NULL,
  `fkid_municipios` int(11) NOT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Servicos_Comunicacao_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_comunicacao`
--

LOCK TABLES `servicos_comunicacao` WRITE;
/*!40000 ALTER TABLE `servicos_comunicacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos_comunicacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_energia`
--

DROP TABLE IF EXISTS `servicos_energia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos_energia` (
  `fkid_municipios` int(11) NOT NULL,
  `energia_eletrica` enum('1','2','3') NOT NULL,
  `capacidade_kva` int(11) NOT NULL,
  `gerador_emergencia` tinyint(1) NOT NULL,
  `capacidade_kva_gerador` int(11) DEFAULT NULL,
  `abastecimento_energia_urbana` tinyint(1) NOT NULL,
  `total_abastecido_energia_urbana` int(11) DEFAULT NULL,
  `entidade_responsavel_energia_urbana` varchar(50) DEFAULT NULL,
  `abastecimento_energia_rural` tinyint(1) NOT NULL,
  `total_abastecido_energia_rural` int(11) DEFAULT NULL,
  `entidade_responsavel_energia_rural` varchar(50) DEFAULT NULL,
  `abastecimento_proprio_energia` tinyint(1) NOT NULL,
  `total_abastecimento_energia_propria` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_energia_propria` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_energia_propria` int(11) DEFAULT NULL,
  `entidade_responsavel_energia_propria` varchar(50) DEFAULT NULL,
  `outros_tipos_abastecimento` varchar(100) DEFAULT NULL,
  `total_abastecido_outros_tipos` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_outros_tipos` int(11) DEFAULT NULL,
  `entidade_responsavel_outros_tipos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Servicos_Energia_Infobas_Municipios2` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_energia`
--

LOCK TABLES `servicos_energia` WRITE;
/*!40000 ALTER TABLE `servicos_energia` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos_energia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_esgoto_coleta_deposicao`
--

DROP TABLE IF EXISTS `servicos_esgoto_coleta_deposicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos_esgoto_coleta_deposicao` (
  `fkid_municipios` int(11) NOT NULL,
  `rede_esgoto` tinyint(1) NOT NULL,
  `Servicos_Esgoto_Coleta_Deposicaocol` varchar(45) DEFAULT NULL,
  `Servicos_Esgoto_Coleta_Deposicaocol1` varchar(45) DEFAULT NULL,
  `total_atendido_rede_esgoto` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_rede_esgoto` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_rede_esgoto` int(11) DEFAULT NULL,
  `entidade_responsavel_rede_esgoto` varchar(45) DEFAULT NULL,
  `fossa_septica` tinyint(1) NOT NULL,
  `total_atendido_fossa_septica` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_fossa_septica` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_fossa_septica` int(11) DEFAULT NULL,
  `entidade_responsavel_fossa_septica` varchar(45) DEFAULT NULL,
  `fossa_rudimentar` tinyint(1) NOT NULL,
  `total_atendido_fossa_rudimentar` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_fossa_rudimentar` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_fossa_rudimentar` int(11) DEFAULT NULL,
  `entidade_responsavel_fossa_rudimentar` varchar(45) DEFAULT NULL,
  `vala` tinyint(1) NOT NULL,
  `total_atendido_vala` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_vala` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_vala` int(11) DEFAULT NULL,
  `entidade_responsavel_vala` varchar(45) NOT NULL,
  `estacao_tratamento` tinyint(1) DEFAULT NULL,
  `total_atendido_estacao_tratamento` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_estacao` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_estacao` int(11) DEFAULT NULL,
  `entidade_responsavel_estacao_tratamento` varchar(45) DEFAULT NULL,
  `esgoto_tratado` tinyint(1) NOT NULL,
  `total_atendido_esgoto_tratado` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_esgoto_tratado` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_esgoto_tratado` int(11) DEFAULT NULL,
  `entidade_responsavel_esgoto_tratado` varchar(45) DEFAULT NULL,
  `outros` varchar(50) DEFAULT NULL,
  `total_atendido_outros` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_outros` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_outros` int(11) DEFAULT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Servicos_Esgoto_Coleta_Deposicao_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_esgoto_coleta_deposicao`
--

LOCK TABLES `servicos_esgoto_coleta_deposicao` WRITE;
/*!40000 ALTER TABLE `servicos_esgoto_coleta_deposicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos_esgoto_coleta_deposicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_lixo`
--

DROP TABLE IF EXISTS `servicos_lixo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos_lixo` (
  `fkid_municipios` int(11) NOT NULL,
  `coleta_seletiva` tinyint(1) NOT NULL,
  `total_atendido_coleta_seletiva` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_coleta_seletiva` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_coleta_seletiva` int(11) DEFAULT NULL,
  `entidade_responsavel_coleta_seletiva` varchar(50) DEFAULT NULL,
  `coleta_nao_seletiva` tinyint(1) NOT NULL,
  `total_atendido_coleta_nao_seletival` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_coleta_nao_seletiva` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_coleta_nao_seletiva` int(11) DEFAULT NULL,
  `entidade_responsavel_coleta_nao_seletiva` varchar(50) DEFAULT NULL,
  `sem_coleta` tinyint(1) NOT NULL,
  `total_atendido_sem_coleta` int(11) DEFAULT NULL,
  `domicilios_urbanos_atendidos_sem_coleta` int(11) DEFAULT NULL,
  `domicilios_rurais_atendidos_sem_coleta` int(11) DEFAULT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Servicos_Lixo_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_lixo`
--

LOCK TABLES `servicos_lixo` WRITE;
/*!40000 ALTER TABLE `servicos_lixo` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos_lixo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_turisticos`
--

DROP TABLE IF EXISTS `servicos_turisticos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos_turisticos` (
  `fkid_municipios` int(11) NOT NULL,
  `divulgacao_impressa` tinyint(1) NOT NULL,
  `revista_divulgacao_impressa` varchar(50) DEFAULT NULL,
  `folder_divulgacao_impressa` varchar(50) DEFAULT NULL,
  `jornal_divulgacao_impressa` varchar(50) DEFAULT NULL,
  `outros_divulgacao_impressa` text,
  `divulgacao_televisiva` tinyint(1) NOT NULL,
  `atendimentoLinguaEstrangeira` tinyint(1) NOT NULL,
  `lingua_estrangeira` varchar(200) DEFAULT NULL,
  `informativos_impressos` tinyint(1) NOT NULL,
  `lingua_informativos_impressos` varchar(200) DEFAULT NULL,
  `visitantes_ano` int(11) NOT NULL,
  `qtd_visitantes_alta_temporada` int(11) NOT NULL,
  `janeiro_mes_alta_temporada` tinyint(1) NOT NULL,
  `fevereiro_mes_alta_temporada` tinyint(1) NOT NULL,
  `marco_mes_alta_temporada` tinyint(1) NOT NULL,
  `abril_mes_alta_temporada` tinyint(1) NOT NULL,
  `maio_mes_alta_temporada` tinyint(1) NOT NULL,
  `junho_mes_alta_temporada` tinyint(1) NOT NULL,
  `julho_mes_alta_temporada` tinyint(1) NOT NULL,
  `agosto_mes_alta_temporada` tinyint(1) NOT NULL,
  `setembro_mes_alta_temporada` tinyint(1) NOT NULL,
  `outubro_mes_alta_temporada` tinyint(1) NOT NULL,
  `novembro_mes_alta_temporada` tinyint(1) NOT NULL,
  `dezembro_mes_alta_temporada` tinyint(1) NOT NULL,
  `origem_turistas` enum('1','2','3','4') NOT NULL,
  `origem_turistas_nacionais` varchar(300) NOT NULL,
  `origemTuristasInternacionais` varchar(300) NOT NULL,
  `ano_base` int(11) NOT NULL,
  `atrativos_mais_visitados` text NOT NULL,
  `aventura_segmento_especializado` tinyint(1) NOT NULL,
  `ecoturismo_segmento_especializado` tinyint(1) NOT NULL,
  `sol_praia_segmento_especializado` tinyint(1) NOT NULL,
  `rural_segmento_especializado` tinyint(1) NOT NULL,
  `estudos_segmento_especializado` tinyint(1) NOT NULL,
  `negocios_eventos_segmento_especializado` tinyint(1) NOT NULL,
  `cultural_segmento_especializado` tinyint(1) NOT NULL,
  `nautico_segmento_especializado` tinyint(1) NOT NULL,
  `esporte_segmento_especializado` tinyint(1) NOT NULL,
  `saude_segmento_especializado` tinyint(1) NOT NULL,
  `pesca_segmento_especializado` tinyint(1) NOT NULL,
  `sem_segmento_especializado` tinyint(1) NOT NULL,
  PRIMARY KEY (`fkid_municipios`),
  CONSTRAINT `fk_Servicos_Turisticos_Infobas_Municipios1` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_turisticos`
--

LOCK TABLES `servicos_turisticos` WRITE;
/*!40000 ALTER TABLE `servicos_turisticos` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos_turisticos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefones_municipios`
--

DROP TABLE IF EXISTS `telefones_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefones_municipios` (
  `fkid_municipios` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `ramal` varchar(10) DEFAULT NULL,
  `fkidCategoria_Telefone` int(11) NOT NULL,
  PRIMARY KEY (`fkid_municipios`,`ordem`),
  KEY `fk_Telefones_Municipios_Categoria_Telefone1_idx` (`fkidCategoria_Telefone`),
  CONSTRAINT `fk_Telefones_Municipios_Categoria_Telefone1` FOREIGN KEY (`fkidCategoria_Telefone`) REFERENCES `categoria_telefone` (`id_categoria_telefone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Telefones_Municipios_Infobas_Municipios` FOREIGN KEY (`fkid_municipios`) REFERENCES `infobas_municipios` (`id_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefones_municipios`
--

LOCK TABLES `telefones_municipios` WRITE;
/*!40000 ALTER TABLE `telefones_municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefones_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefones_orgao_tur`
--

DROP TABLE IF EXISTS `telefones_orgao_tur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefones_orgao_tur` (
  `ordem` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `ramal` varchar(10) DEFAULT NULL,
  `fkid_municipios` int(11) NOT NULL,
  `fkid_categoria_telefone` int(11) NOT NULL,
  PRIMARY KEY (`ordem`,`fkid_municipios`),
  KEY `fk_Telefones_Orgao_Tur_Orgao_Oficial_Tur1_idx` (`fkid_municipios`),
  KEY `fk_Telefones_Orgao_Tur_Categoria_Telefone1_idx` (`fkid_categoria_telefone`),
  CONSTRAINT `fk_Telefones_Orgao_Tur_Categoria_Telefone1` FOREIGN KEY (`fkid_categoria_telefone`) REFERENCES `categoria_telefone` (`id_categoria_telefone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Telefones_Orgao_Tur_Orgao_Oficial_Tur1` FOREIGN KEY (`fkid_municipios`) REFERENCES `orgao_oficial_tur` (`fkid_municipios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefones_orgao_tur`
--

LOCK TABLES `telefones_orgao_tur` WRITE;
/*!40000 ALTER TABLE `telefones_orgao_tur` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefones_orgao_tur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-12 14:33:00
