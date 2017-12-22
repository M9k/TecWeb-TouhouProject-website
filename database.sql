-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 06:10 PM
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
CREATE DATABASE IF NOT EXISTS `newstest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `newstest`;

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
  `plot` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--


INSERT INTO `chapters` (`number`, `year`, `title`, `image`, `imagedescr`, `titleeng`, `titleita`, `plot`, `id`) VALUES
('1', 1996, '東方靈異伝　～ The Highly Responsive to Prayers', '1.jpg', '', 'Highly Responsive to Prayers', 'Altamente sensibile alle preghiere', 'Il tempio Hakurei è stato distrutto da forze misteriose, quindi Reimu decide di attraversare un portale\n  dimensionale per trovare il copevole e fargliela pagare.', 1),
('2', 1997, '東方封魔録　～ The Story of Eastern Wonderland', '2.jpg', '', 'Story of Eastern Wonderland', 'Storia del Paese Orientale delle Meraviglie', 'Determinata a trovare chi ha mandato dei mostri al suo santuario, Reimu inizia un nuovo viaggio,\r\n  questa volta accompagnata da Genjii, la sua tartaruga volante. Incontra prima Rika, che affermava di aver creato i mostri al Santuario Hakurei. Dopo numerose avventure Reimu sconfigge definitivamente Rika e si dirige a casa scoprendo che i mostri al suo santuario sono scomparsi.', 2),
('3', 1997, '東方夢時空　～ Phantasmagoria of Dim. Dream', '3.jpg', '', 'Phantasmagoria of Dim. Dream', 'Dimensioni Orientali del Sogno', 'Mentre si godono una tranquilla passeggiata mattutina, la fanciulla del luogo, Reimu Hakurei, si imbatte in alcune curiose rovine a poca distanza dalla porta del Santuario Hakurei. Poiché solo una persona è ammessa nelle rovine e sarà ben ricompensata per farlo, sette personaggi si impegneranno in una grande battaglia.', 3),
('4', 1998, '東方幻想郷　～ Lotus Land Story', '4.jpg', '', 'Lotus Land Story', 'Storia di terra di loto', 'Seguendo gli eventi dei precedenti giochi, Youkai inizierà presto a sciamare nel Santuario Hakurei, spingendo Reimu Hakurei e Marisa Kirisame a dirigersi separatamente verso un lago in montagna, che sembra essere la fonte di una tremenda ondata di energia. I due raggiungono l\'ingresso sotto il lago, che li teletrasporta in uno strano mondo di fantasia, in cui esiste la villa Mugenkan, dove si suppone che la mente sia.', 4),
('5', 1998, '東方怪綺談　～ Mystic Square', '5.jpg', '', 'Mystic Square', 'Fantastiche Storie Romantiche d\'Oriente', 'Dopo gli eventi di Storia della terra del loto, un\'enorme quantità di esseri demoniaci si riversano da una grotta, ancora una volta sepolti tra le montagne. Cercando la fonte di questa invasione, Reimu Hakurei e gli altri personaggi giocabili, Marisa Kirisame, Mima e Yuuka Kazami devono viaggiare fino a Makai e dirigersi verso la fortezza Pandemonium per affrontare quello che sta dietro al problema, Shinki.', 5),
('6', 2002, '東方紅魔郷　～ the Embodiment of Scarlet Devil ', '6.jpg', '', 'The Embodiment of Scarlet Devil ', 'L\'Incarnazione del Diavolo Scarlatto', 'Durante un\'estate pacifica a Gensokyo, una nebbia innaturale e scarlatta appare senza preavviso e copre gran parte della terra. È abbastanza forte da bloccare il sole, facendo diventare le zone colpite oscure e fredde. Reimu Hakurei, una fanciulla del santuario che lavorava nel Santuario Hakurei, e Marisa Kirisame, un mago, si misero alla ricerca della fonte della nebbia. La loro ricerca li condurrà alla <span lang="en">Scarlet Devil Mansion</span> e ai suoi eccentrici proprietari.', 6),
('7', 2003, '東方妖々夢　～ Perfect Cherry Blossom', '7.jpg', '', 'Perfect Cherry Blossom', 'Una Perfetta Fioritura di Ciliegio', 'L\'inverno trascina la sua data di scadenza a Gensokyo, spingendo infine i tre personaggi principali - Reimu Hakurei, Marisa Kirisame e Sakuya Izayoi - a indagare sulla causa. I loro viaggi li portano negli inferi, dove scoprono che certe persone stanno tentando di raccogliere l\'essenza della primavera per se stessi, per una causa sconosciuta.', 7),
('8', 2004, '東方永夜抄　～ Imperishable Night', '8.jpg', '', 'Imperishable Night', 'Notte Imperitura', 'È la vigilia del Festival del raccolto Lunare a Gensokyo quando Youkai capisce che c\'è qualcosa di sbagliato nella luna. Sembra che la luna sia stata sostituita da una luna finta. I personaggi principali fermano il tempo e si mettono alla ricerca del colpevole per cercare di garantire la luna piena per il festival. Il loro viaggio li conduce nella Foresta di bambù dei Lost, abitata da esseri provenienti dalla Luna stessa.', 8),
('9', 2005, '東方花映塚　～ Phantasmagoria of Flower View', '9.jpg', '', 'Phantasmagoria of Flower View', 'Fantasmagoria di Flower View', 'Questo gioco si svolge nella mistica terra di Gensokyo. La primavera è arrivata, ma qualcosa non va. I fiori stanno fiorendo e le fate stanno diventando attive come al solito, ma la quantità di fiori e fate è innaturale; anche i fiori non primaverili stanno fiorendo.', 9),
('10', 2007, '東方風神録　～ Mountain of Faith', '10.jpg', '', 'Mountain of Faith', 'Montagna di fede', 'È autunno a Gensokyo. Uno sconosciuto arriva al Santuario Hakurei e dice che il santuario dovrebbe chiudersi definitivamente. Reimu Hakurei non lascerà che succeda così lei e Marisa Kirisame vanno a indagare sulla situazione.', 10),
('11', 2008, '東方地霊殿　～ Subterranean Animism', '11.jpg', '', 'Subterranean Animism', 'Animismo sotterraneo', 'Dopo aver passato lo tsuchigumo Yamame Kurodani, l\'eroina raggiunge l\'ex capitale, un luogo dove ora vivono gli oni. Yuugi Hoshiguma sfida l\'eroina in una battaglia amichevole, e poi dice che l\'eroina dovrebbe andare al Palazzo degli Spiriti della Terra. Qui, l\'eroina incontrò Satori Komeiji, il proprietario di Rin Kaenbyou (Orin) e Utsuho Reiuji (Okuu). Rin voleva che l\'eroina scendesse e la aiutasse a fermare la sua amica mentre Utsuho diventava troppo potente, e Utsuho alla fine fu fermato dall\'eroina.', 11),
('12', 2009, '(東方星蓮船　～ Undefined Fantastic Object', '12.jpg', '', 'Undefined Fantastic Object', 'Oggetto fantastico non definito', 'La storia di Oggetto fantastico non definito parla di uno strano oggetto volante che appare nei cieli di Gensokyo durante l\'inizio della primavera. Il personaggio del gioco si lancia nel cielo per svelare i suoi misteri, saccheggiare il suo tesoro e generalmente sbarazzarsi dello youkai.', 12),
('13', 2011, '東方神霊廟　～ Ten Desires', '13.jpg', '', 'Ten Desires', 'Dieci desideri', 'Gli spiriti divini compaiono a Gensokyo e le nostre eroine vengono inviate a indagare. Pensavano che il vero colpevole fosse Yuyuko Saigyouji, ma Yuyuko dice che non sa molto degli eventi e suggerisce all\'eroina di andare al tempio di Myouren. Dopo aver combattuto attraverso varie fasi verso il Grande Mausoleo della Sorgente dei Sogni, scoprono che gli spiriti divini sono volati qui per assistere alla resurrezione di un Santo, Toyosatomimi no Miko.', 13),
('14', 2013, '東方輝針城　～ Double Dealing Character', '14.jpg', '', 'Double Dealing Character', 'Personaggio a doppio gioco', 'Gli youkai si stanno ribellando e gli tsukumogami stanno arrivando; nessuno sa cosa sta succedendo, le nuvole si stanno accumulando e un forte vento trasporta i suoni di un enorme edificio. Gensokyo è pieno dei suoni della dissonanza. Le singole armi dei tre protagonisti iniziano a comportarsi in modo strano. È loro compito prendere le loro armi in mano e combattere gli youkai, o gettare le loro armi da parte.', 14),
('15', 2015, '東方紺珠伝　～ Legacy of Lunatic Kingdom', '15.jpg', '', 'Legacy of Lunatic Kingdom', 'Eredità del regno lunare', 'Qualcuno sta causando il caos nella capitale lunare, ed evidentemente i Lunariani sono venuti per purificare Gensokyo per renderlo adatto a vivere lì. Le ragazze devono partire per fermare questa invasione e trovare il perpetratore dietro questo incidente.', 15),
('16', 2017, '東方天空璋　～ Hidden Star in Four Seasons', '16.jpg', '', 'Hidden Star in Four Seasons', 'Stella nascosta in quattro stagioni', 'Nonostante sia piena estate, le stagioni in varie località sono completamente fuori pericolo. Il Santuario Hakurei è ricoperto di petali di ciliegio, la montagna Youkai si crogiola nel mezzo dell\'autunno, e la Foresta della Magia è ricoperta di neve ... e grazie ad una strana forza, le fate di Gensokyo stanno dilagando con forza insondabile. Nel bel mezzo di questo incidente innegabile, le ragazze hanno deciso di indagare e trovare dietro di sé il perpetratore.', 16);

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
(8, 18, 'Samuele', 'samu@samu.com', 'Sarebbe bello capire il giapponese...', '2017-12-10 18:05:00', 'unknow'),
(9, 18, 'Matteo', 'mtodescato@tiscali.it', 'Sar&agrave; difficile finirlo anche ad easy &gt;_&lt;', '2017-12-10 18:07:57', 'unknow'),
(10, 18, 'Mirco', 'mcailotto96@gmail.com', 'Mio al day one!!!', '2017-12-10 18:09:38', 'unknow');

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
(18, 'Pubblicato il nuovo Touhou su Steam!', 0, '2017-12-10 18:02:31', 'È appena uscito il nuovo capitolo di Touhou, il 16, su <span xml:lang=\"en\">Steam</span>, piattaforma digitale di distribuzione di videogiochi famosa in tutto il mondo.<br/>\r\nIl gioco, denominato <span xml:lang=\"en\">Hidden Star in Four Seasons</span>, purtroppo è disponibile unicamente in lingua inglese, ma non escluderemo una modifica del gioco che lo renderà disponibile anche in inglese realizzata da qualche fan.<br/>\r\nPurtroppo escludiamo una traduzione in italiano, in quanto tutti i precedenti titoli non sono mai stati localizzati.', 'touhou_steam.jpg', 'Immagine raffigurante la pagina di Steam che vende Touhou');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(50) NOT NULL PRIMARY KEY,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

INSERT INTO `admins` (`username`, `email`, `password`) VALUES
('admin','admin@gmail.com','$2y$10$F0B3IE4vRA0kXt74LkCcBO4qOOKnjSbQXxWT8LNMdswo6N7W8OGWi');


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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
