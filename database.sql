-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 04:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'per ipv4, ipv6 e ipv6 compatibili ipv4',
  `motivo` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`id`, `ip`, `motivo`, `date`) VALUES
(2, '53453', 'nope', '2017-11-07 17:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `image` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `imagedescr` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `titleeng` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `titleita` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `protagonists` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `plot` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`number`, `year`, `title`, `image`, `imagedescr`, `titleeng`, `titleita`, `protagonists`, `plot`, `id`) VALUES
('1', 1996, '東方靈異伝　～ The Highly Responsive to Prayers', '1.jpg', 'Copertina del gioco rappresentante Reimu', 'Highly Responsive to Prayers', 'Altamente sensibile alle preghiere', 'sd', 'Il tempio Hakurei è stato distrutto da forze misteriose, quini Reimu decide di attraversare un portale dimensionale per trovare il copevole e fargliela pagare.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `nick` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `news_id`, `nick`, `email`, `message`, `data`, `ip`) VALUES
(1, 3, 'asdasd', 'asdasdasd@asd.it', 'asdasdasd', '2017-11-16 20:56:03', 'unknow'),
(2, 3, 'asdasd', 'asdasdasd@asd.it', 'asdasd', '2017-11-16 20:56:13', 'unknow'),
(3, 5, 'asd', 'asd@gmail.com', '<strong> TEST</strong>', '2017-11-19 16:41:44', 'unknow'),
(4, 5, 'asd', 'asdasda@asd.it', 'asdasdasd', '2017-11-19 16:46:23', 'unknow'),
(5, 5, 'sdfd@sdf.it', 'sdfd@sdf.it', 'sdfsdfsdf\r\n', '2017-11-19 16:48:07', 'unknow');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgdescr` tinytext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `hidden`, `data`, `text`, `image`, `imgdescr`) VALUES
(2, 'Test 2', 0, '2017-10-31 16:15:50', 'Wikipedia (pronuncia: asd vedi sotto) è un\'enciclopedia online a contenuto libero, collaborativa, multilingue e gratuita, nata nel 2001, sostenuta e ospitata dalla Wikimedia Foundation, un\'organizzazione non a scopo di lucro statunitense.\r\n\r\nLanciata da Jimmy Wales e Larry Sanger il 15 gennaio 2001, inizialmente nell\'edizione in lingua inglese, nei mesi successivi ha aggiunto edizioni in numerose altre lingue. Sanger ne suggerì il nome,[1] una parola macedonia nata dall\'unione della radice wiki al suffisso pedia (da enciclopedia).\r\n\r\nEtimologicamente, Wikipedia significa \"cultura veloce\", dal termine hawaiano wiki (veloce), con l\'aggiunta del suffisso -pedia (dal greco antico ???????, paideia, formazione). Con più di 45 milioni di voci in oltre 280 lingue[2], è l\'enciclopedia più grande mai scritta[3], tra i dieci siti web più visitati al mondo[4] e costituisce la maggiore e più consultata opera di riferimento generalista su Internet.[5][6][7]\r\n\r\nIndice ', '', NULL),
(3, 'Test 3', 0, '2017-10-31 16:15:50', 'Pronuncia di Wikipedia\r\nIn italiano\r\n\r\nIl termine Wikipedia è formato dal prefisso wiki- (dall\'hawaiano wiki, veloce), e dal suffisso -pedia (dal greco antico paideia, formazione). Conformemente allo spirito costituzionalmente internazionalistico e linguisticamente democratico del progetto, non prevede una pronuncia ufficiale nelle varie lingue, lasciando libertà alle comunità dei parlanti di utilizzare le proprie regole linguistiche.\r\n\r\nConsiderando la pronuncia consolidata in lingua italiana del suffisso -pedìa (-pedìa /pe?dia/, come in enciclopedia)[20] e la pronuncia consolidata della lettera w (come in wafer o wc),[20][21] la pronuncia linguisticamente più appropriata è vikipedìa (IPA /vikipe?dia/). Secondo l\'Accademia della Crusca, infatti, la pronuncia di w- è vu[20][21][22] (e quindi vìki /?viki/), e quella di -pedia è -pedìa.[20]\r\n\r\nLe pronunce anglicizzanti (o inglesi italianizzate), meno integrate nel sistema linguistico dell\'italiano, sono tuttavia diffuse, benché poco conformi allo spirito costituzionalmente internazionalistico e linguisticamente democratico del progetto. Le rare varianti con /wai-/ o /vai-/, che presentano storpiature della stessa lingua inglese, sarebbero preferibilmente da evitare. Il Dizionario di pronuncia italiana di Luciano Canepari, uniformandosi alla pronuncia inglese, riporta /wiki?p?dja/ (uichipèdia) come forma primaria, /wiki?pidja/ (uichipìdia) come accettabile e /wikipe?dia/ (uichipedìa) come pronuncia intenzionale «per fare sfoggio»[23].\r\nIn inglese\r\n\r\nIn inglese si dice comunemente [?w?ki?pi?di?] o [?wi?ki?pi?di?], ma non esiste una pronuncia ufficiale.\r\nRedazione\r\nRealizzazione in 3D del logo di Wikipedia in uno sfondo contestuale\r\n\r\nWikipedia non è regolata da alcun comitato di redazione centrale: le sue voci sono scritte spontaneamente da centinaia di migliaia di volontari non remunerati né iscritti ad associazioni, che si organizzano autonomamente stabilendo da soli le regole interne e lo svolgimento degli argomenti nelle voci. Wikipedia, infatti, è costruita sulla convinzione che la collaborazione tra gli utenti possa nel tempo migliorare le voci, più o meno nello stesso spirito con cui viene sviluppato il software libero. Nel caso del software, se è libero, chiunque può prelevarne i sorgenti, modificarli e ridistribuirli, eppure solitamente i programmatori si limitano a proporre alcune modifiche agli autori, i quali le adottano oppure no a loro insindacabile giudizio.\r\n\r\nWikipedia mantiene un approccio ottimistico sulla bontà delle modifiche proposte: tutti coloro che visitano il sito di Wikipedia hanno la possibilità di creare o modificare una voce e vedere pubblicate all\'istante le loro modifiche. Gli autori delle voci, che non devono avere necessariamente alcuna competenza o qualifica formale sugli argomenti trattati ma devono basare le proprie pubblicazioni su fonti autorevoli, sono però avvertiti che i loro contributi possono essere cancellati, o a loro volta modificati e redistribuiti da chiunque, nei termini della licenza e delle linee guida interne a Wikipedia. Le voci sono controllate dalla comunità, con il supporto di un gruppo di amministratori che svolgono alcune azioni tecniche. Le decisioni da prendere sul contenuto e sulle politiche editoriali di Wikipedia sono ottenute di norma per consenso[24] e in alcuni casi per votazione, sebbene per alcuni anni Jimmy Wales si fosse riservato decisioni in alcuni casi nell\'edizione in inglese.\r\n\r\nData la natura aperta di Wikipedia, spesso si verificano delle discussioni prolungate quando i partecipanti alla stesura di una voce non raggiungono un accordo, o più raramente delle guerre di modifiche o di edizione (dall\'inglese edit war).[25] Alcuni membri delle comunità hanno descritto il processo di redazione in Wikipedia come un lavoro collaborativo, o un processo evolutivo di darwinismo sociale,[26] ma non tutti la ritengono una descrizione precisa del fenomeno. Le voci sono sempre aperte alle modifiche (tranne quando vengono protette a tempo determinato a causa di vandalis', 'test.jpg', NULL),
(4, 'test 4 - titolo dasdfsdfdsf', 0, '2017-11-03 22:19:59', 'asdfasdfasdfxcvcvxcvfsd fsd fsd fsd fsd fs', '', NULL),
(5, 'nuova news', 0, '2017-11-06 17:14:57', 'Prima news inserita dal sito', 'test.jpg', NULL),
(12, 'dfsgsdfgdg', 1, '2017-11-06 18:23:28', 'dfdfsg', '', 'prova123'),
(17, 'asdasd', 1, '2017-11-06 18:39:15', 'asd', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
