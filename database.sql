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
  `plot` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`number`, `year`, `title`, `image`, `imagedescr`, `titleeng`, `titleita`, `plot`, `id`) VALUES
('1', 1996, '東方靈異伝　～ The Highly Responsive to Prayers', '1.jpg', 'Copertina del gioco rappresentante Reimu', 'Highly Responsive to Prayers', 'Altamente sensibile alle preghiere', 'Il tempio Hakurei è stato distrutto da forze misteriose, quindi Reimu decide di attraversare un portale\n  dimensionale per trovare il copevole e fargliela pagare.', 1),
('2', 1997, '東方封魔録　～ The Story of Eastern Wonderland', '2.jpg', 'todo', 'Story of Eastern Wonderland', 'Storia del Paese Orientale delle Meraviglie', 'Determinata a trovare chi ha mandato questi mostri al suo santuario, Reimu inizia un nuovo viaggio,\n  questa volta accompagnata da Genjii, la sua tartaruga volante. Incontra prima la sospetta ingegnere Rika, che affermava di aver creato i mostri al Santuario Hakurei.\n  Arriva Rika che pilota il suo carro armato ma viene facilmente sconfitta, nonostante il suo tentativo di portare la protagonista in trappola. Cala la notte, e Reimu e\n  Genjii entrano nella Forest of Magic. La samurai Meira attacca Reimu sperando di sconfiggerla e rubarle i poteri ereditati. Reimu esita a combatterla, ma non presta\n  particolare attenzione alle teorie di Meira. Ad ogni modo, una volta sconfitta, Meira scappa nella notte e di lei non si saprà più nulla.\n  Continuando a vagare, la nostra eroina incontra la maga Marisa Kirisame, determinata a fermare Reimu prima che possa arrivare alla sua padrona, Mima.\n  Una volta sconfitta, Marisa mette in guardia Reimu del potere di Mima, abbastanza sicura che Reimu non possa vincere. Anche Genjii dubita di Reimu,\n  commentando che avrebbe dovuto allenarsi di più, per poi tornare ad esorcizzarla successivamente. Reimu dissente e, testarda, decide di affrontare Mima.\n  Mima ammette di essere la responsabile dell\'invasione al Santuario Hakurei. Mima viene finalmente sconfitta, ma scompare prima che Reimu possa esorcizzarla.\n  Rika attacca Reimu ancora una volta, questa volta con la trappola evitata… il suo carro armato Evil Eye Sigma. Usando tutta la potenza delle sue sfere Yin-Yang,\n  Reimu sconfigge definitivamente Rika e si dirige a casa scoprendo che i mostri al suo santuario sono scomparsi.', 2),
('3', 1997, '東方夢時空　～ Phantasmagoria of Dim. Dream', '3.jpg', 'todo', 'Phantasmagoria of Dim. Dream', 'Dimensioni Orientali del Sogno', 'Mentre si sta godendo una tranquilla passeggiata mattutina, la miko Reimu Hakurei si imbatte in alcune curiose rovine poco lontane\n  dall\'entrata del Santuario Hakurei. Scorgendo Mima e Marisa Kirisame tra la folla riunita, Reimu chiede il motivo dell\'improvvisa comparsa delle rovine e le viene dato\n  un volantino che indica che l\'Inaugurazione sta per essere celebrata e chiunque ne farà parte sarà ricompensato. Tuttavia il gruppo, impossibilitato a localizzare un\'entrata\n  tra le rovine, trova un avviso inviato nelle vicinanze che avverte che le rovine possono supportare un solo visitatore. Pertanto, coloro che desiderano entrare tra le rovine\n  decidono di organizzare una competizione improvvisata: la persona che sconfiggerà tutti gli altri avversari avrà diritto di entrare nelle rovine per prima e di ricevere la\n  misteriosa ricompensa.\n  La vincitrice, dopo aver avuto la meglio in tutti e sette gli scontri della competizione, fa il suo ingresso trionfale nelle rovine per confrontarsi con Chiyuri Kitashirakawa,\n  che minaccia la vincitrice con una strana arma e la costringe a seguirla in fondo alle rovine. Yumemi Okazaki appare e rimprovera Chiyuri per il suo trattamento sgarbato\n  nei confronti della visitatrice, per poi spiegare che le rovine, in realtà, sono probabilmente una navicella spaziale. Yumemi è venuta al mondo per studiare gli incredibili\n  poteri magici dei suoi abitanti, e dopo aver negato qualsiasi conoscenza riguardo la ricompensa promessa, ordina a Chiyuri di combattere con la vincitrice in modo che lei\n  possa osservare i poteri dell\'ospite e registrarne i dati.\n  In seguito, Yumemi s\'infuria perchè Chiyuri è stata sconfitta prima che fosse in grado di raccogliere abbastanza dati e fa un patto con la protagonista:\n  la vincitrice dovrà essere in grado di sconfiggere anche lei, e in tal caso Yumemi esaudirà un unico desiderio; ma se sarà Yumemi a vincere, la visitatrice\n  deve ritornare con lei nel suo mondo per ulteriori studi. Una volta battuta, Yumemi mantiene la sua promessa e la vincitrice viene ricompensata anche per il suo impegno.', 3),
('4', 1998, '東方幻想郷　～ Lotus Land Story', '4.jpg', 'todo', 'Lotus Land Story', 'Lotus Land Story', 'Seguendo gli eventi dei precedenti giochi, Youkai inizierà presto a sciamare nel Santuario Hakurei, spingendo Reimu Hakurei e Marisa Kirisame a dirigersi separatamente verso un lago in montagna, che sembra essere la fonte di una tremenda ondata di energia. I due raggiungono l\'ingresso sotto il lago, che li teletrasporta in uno strano mondo di fantasia, in cui esiste la villa Mugenkan, dove si suppone che la mente sia.', 4),
('5', 1998, '東方怪綺談　～ Mystic Square', '5.jpg', 'todo', 'Mystic Square', 'Fantastiche Storie Romantiche d\'Oriente', 'Per nessun apparente motivo, enormi quantita\' di demoni e youkai cominciano a viaggiare dal Makai, il mondo dei demoni, verso Gensokyo,\n  invadendola e costringendo Reimu Hakurei agli straordinari come sterminatrice di youkai. Frustrata, Reimu trova la sorgente dell\'invasione nella Caverna nella Quale\n  si Dice che si Trovi la Porta del Makai, là sui monti dietro il Tempio Hakurei. Reimu decide che è suo dovere da miko eradicare la causa del problema.\n  A sua insaputa, Marisa Kirisame viene a sapere del suo piano e decide di seguirla, con la speranza di scoprire nel Makai poteri particolari da rubare.\n  Altrove, Mima, lo spirito malvagio del Tempio Hakurei, e Yuuka Kazami, la youkai, decidono anch\'esse di intraprendere il viaggio verso il Makai, anche se per motivi propri.\n  All\'interno della caverna, l\'eroina incontra la guardiana del portale per il Makai, Sara, e la sconfigge con facilità, per poi cominciare un viaggio ad\n  alta velocità attraverso il confine fra i mondi. Qui l\'eroina si imbatte in una demonessa che viaggia in direzione opposta, Louise, e l\'abbatte. In seguito,\n  l\'eroina arriva nel Makai, sopra una enorme e oscura città; lì affronta Alice Margatroid, che l\'attacca con l\'aiuto delle sue bambole viventi. Dopo averla sconfitta,\n  l\'eroina vola via dalla città verso una tetra fortezza che si erge in lontananza. Lungo la strada le streghe Yuki e Mai provano a fermarla, ma senza troppo successo.\n  Entrando nella fortezza Pandæmonium, l\'eroina plana sopra fantastici motivi di cristallo mentre si fa strada attraverso legioni di nemici. Arrivata in cima,\n  ella incontra una strana persona di nome Shinki che la informa gentilmente che l\'invasione demonica è dovuta interamente all\'errore di un\'agenzia di viaggi\n  che organizza tour di Gensokyo, situata al di fuori della sua giurisdizione. Prima che la protagonista possa domandarle il motivo di tutto questo, Yumeko le\n  interrompe, insistendo categoricamente che Shinki si ritiri per poter far fuori l\'ospite indesiderata. Dopo aver sconfitto la cameriera, la protagonista\n  ritrova Shinki, che adesso spiega che è lei, in realtà, la dea e creatrice del Makai. Ella promette di risolvere il problema dei turisti,\n  ma soltanto dopo aver punito severamente l\'eroina per aver sconvolto il suo regno. La battaglia finale è straordinariamente violenta, e il\n  tremendo potere di Shinki dà alle fiamme gran parte del Makai.\n  Più avanti, in data ignota, l\'eroina incontra nuovamente Alice Margatroid, questa volta in uno strano Paese delle Meraviglie. Ora Alice\n  possiede un voluminoso grimorio che le dà grandi poteri magici, e chiede la rivincita all\'eroina. Dopo una lunga battaglia e la sua seconda\n  sconfitta, Alice si lamenta della sua incapacità di battere l\'eroina, per poi fuggire col libro.', 5),
('6', 2002, '東方紅魔郷　～ the Embodiment of Scarlet Devil ', '6.jpg', 'todo', 'The Embodiment of Scarlet Devil ', 'L\'Incarnazione del Diavolo Scarlatto', 'Durante una tranquilla estate a Gensokyo, una innaturale nebbia scarlatta appare all\'improvviso e copre gran parte della terra; è così forte da bloccare i raggi solari, portando buio e gelo nelle zone coperte. Reimu Hakurei, una miko residente al tempio Hakurei, pensa sia suo dovere trovare la causa di questa curiosa coincidenza. La maga Marisa Kirisame, invece, spera che la persona dietro tutto questo abbia degli oggetti interessanti da \"prendere in prestito\". A seconda del personaggio scelto, solo una delle due decide di portare avanti la propria missione.\r\n\r\nL\'eroina inizia un viaggio che la porterà verso l\'isola su un lago dove, pare, la nebbia abbia origine. Prima ancora che possa raggiungerla, è intercettata da Rumia, che gironzolava lungo le sponde dello stesso, e poi da Cirno, che ha preso questo lago come sua dimora. In ogni caso, ne Rumia ne Cirno sono direttamente collegabili alla nebbia. Raggiunta l\'isola, si è attaccati da un gran numero di guardie. L\'offensiva è guidata da Hong Meiling, la quale soccombe al potere dell\'eroina scelta. L\'eroina, subito dopo la battaglia, entra nella Scarlet Devil Mansion (Magione del Diavolo Scarlatto), sicura che la responsabile di questa nebbia sia lì dentro. Dapprima attraversa una libreria ombrosa, dove Patchouli Knowledge prova a fermarla. Subito dopo è il turno dei corridoi principali; anche qui qualcuno tenterà di fermare l\'eroina, e questi risponde al nome della capocameriera Sakuya Izayoi. Dopo questo lungo viaggio, eccoci faccia a faccia con il Diavolo Scarlatto in carne ed ossa, Remilia Scarlet, che attende l\'arrivo sulla balconata della Scarlet Devil Mansion. Remilia rivela così che la nebbia scarlatta è stata creata affinché ella potesse uscire comodamente dalla magione anche in pieno giorno. Sconfitta, la normalità torna a Gensokyo...\r\n\r\n... Finché alcuni giorni dopo un viaggio di ritorno alla magione, durante l\'assenza della padrona di casa, fa\' scoprire come questa sia in preda al caos. Dopo una durissima battaglia con nemici ancora più forti ed una ritrovata(e più potente) Patchouli, il mistero è risolto dalla sorella minore di Remilia, Flandre Scarlet. Quest\'ultima svela la sua storia: è stata segregata all\'interno della casa per ben 495 anni, e non ha mai visto un umano prima d\'ora. Flandre, eccitata dall\'idea di trovarsi un umano di fronte a lei, chiederà di partecipare ad un gioco - a base di danmaku - ed una volta sconfitta la nostra eroina potrà godersi il meritato riposo.', 6),
('7', 2003, '東方妖々夢　～ Perfect Cherry Blossom', '7.jpg', 'todo', 'Perfect Cherry Blossom', 'Una Perfetta Fioritura di Ciliegio', 'Siamo nel cuore di un inverno senza fine a Gensokyo. La primavera pare ancora addormentata nonostante sia già Maggio, e riposa sotto la coltre di neve lasciata dalle grandi tempeste invernali. Reimu Hakurei, la sacerdotessa del santuario Hakurei, trovando questa situazione inaccettabile, decide di partire alla volta della causa di questo mistero. Marisa Kirisame, la maga di nero vestita, vede un petalo di ciliego scivolar dentro la sua casa riscaldata, chiedendosi così se la primavera sia arrivata prima altrove. Sakuya Izayoi, la capocameriera della Scarlet Devil Mansion, è visibilmente preoccupata per le scorte invernali della magione, ormai al termine. Anche qui, come nell\'episodio precedente, solo una delle tre deciderà di continuare ad investigare.\r\n\r\nInizia così questo viaggio nell\'inverno per la foresta coperta di neve, in cerca di indizi. Dopo una veloce battaglia con la fata Cirno e Letty Whiterock, spirito dell\'Inverno, arrivano nel villaggio di Mayohiga, dove attende una frenetica nekomata di nome Chen. Tutto sembra portare al niente di fatto, quand\'ecco che dopo la sconfitta di Alice Margatroid e delle sue potentissime bambole, l\'eroina scelta nota nel cielo una sorprendente invasione di petali di ciliegio, ora trasportati dal vento d\'inverno. Si tratta di una pista caldissima, che porta nell\'alto dei cieli di Gensokyo, dove si verrà accolti da Lily White, fino ad arrivare ad una barriera magica. Qui suonano le sorelle musiciste poltergeist Prismriver. La loro sconfitta porterà all\'accesso del Netherworld (Aldilà).\r\n\r\nDopo una lunga sequela di fantasmi, la giardiniera mezzofantasma Youmu Konpaku sfiderà gli intrusi: è lei ad aver rubato l\'essenza della primavera in tutta Gensokyo affinché il Saigyou Ayakashi, l\'albero di ciliegio youkai, potesse avere la più perfetta delle fioriture nel Giardino dell\'Hakugyokurou, come da volontà della sua padrona. Non c\'è più tempo da perdere, dunque: sconfitta Youmu, è il turno di Yuyuko Saigyouji, la principessa fantasma dell\'Hakugyokurou. Yuyuko rivela così che il suo desiderio è quello di far rivivere l\'albero youkai, affinché una certa anima sigillata al suo interno ancor prima della sua esistenza potesse tornare a vivere. Affinché il sigillo decada, è necessaria una fioritura completa. Nasce così una furiosa battaglia, dove l\'ultima essenza di primavera contenuta nella protagonista, necessaria per la Perfetta Fioritura del Ciliegio (di qui il titolo del gioco, Perfect Cherry Blossom), e la primavera di Gensokyo stessa, sono la posta in gioco. Alla sconfitta di Yuyuko, il Saigyou Ayakashi sta per spegnersi, ma il sigillo è ormai indebolito, e l\'anima intrappolata è così libera... rivelandosi essere quella di Yuyuko stessa! Dopo una strenua resistenza, la primavera torna a Gensokyo.\r\n\r\nPochi giorni dopo, Yuyuko chiede un favore. La barriera magica tra il Netherworld e Gensokyo è stata indebolita da Yukari Yakumo, amica di Yuyuko, per rendere più facile il furto della primavera. Yuyuko chiede di trovarla, lei che nel frattempo sta preparando l\'evento di rifioritura a Gensokyo, e ricordarle di riparare la barriera. Chen fa il suo ingresso nella storia, visibilmente rivitalizzata e ancora più potente di prima. Verrà sconfitta, ma ciò attirerà l\'attenzione e la furia di Ran Yakumo. Si scopre così che Chen era lo shikigami di Ran, ma anche Ran è uno shikigami come Chen e non lascerebbe mai che un intruso disturbi la sua padroncina. Si deduce che, sconfiggendo Ran, si otterrà l\'attenzione dell\'amica di Yuyuko; una volta fatto ciò, però, lei non appare perché, come spiega Ran, la protagonista dovrà tornare di notte, visto che Yukari dorme poco in quelle ore del giorno. Quella notte, dopo aver nuovamente sconfitto Ran, Yukari emerge dal buio per incontrare l\'intrusa. Lei è piuttosto sorpresa dalle sue abilità e decide di continuare da dove Ran ha finito. Dopo una sonora sconfitta, finalmente Yukari serve alla richiesta di Yuyuko.', 7),
('8', 2004, '東方永夜抄　～ Imperishable Night', '8.jpg', 'todo', 'Imperishable Night', 'Notte Imperitura', 'Alla vigilia dello Tsukimi, o Festival della Luna del Raccolto, a Gensokyo gli youkai avvertono qualcosa di strano nella luna: essa è stata sostituita con una fasulla. Diventa d\'uopo fermare il tempo e trovare la vera luna per assicurarsi la luna piena nella notte del Festival.\r\n\r\nUn team umano e youkai parte ed attraversa la foresta per investigare. Lungo la strada, incontrano una lucciola di nome Wriggle Nightbug e Mystia Lorelei, un passero notturno, i quali si lasciano immediatamente sconfiggere. Subito dopo incontrano la mezzobestia Keine. Ella ha il compito di proteggere il Villaggio Umano dagli youkai e confonde il team come nemico, attaccandolo. Alla sua sconfitta, Keine indica che la persona dietro il rimpiazzo della luna è nella Foresta di Bambù. Qui, incontreranno un personaggio (sia essa Reimu o Marisa) che chiederà al team il motivo dell\'arresto del tempo, causando così una notte imperitura (di qui il nome del gioco).\r\n\r\nFinalmente viene raggiunta la magione dell\'autore del crimine, ma una volta dentro, scoprono che questa è protetta da una coppia di conigli (Tewi e Reisen). I conigli vengono sconfitti, ma non senza disorientare i protagonisti. Nel pieno della confusione, essi dovranno scegliere quale strada al bivio - una porterà alla vera luna, l\'altra a quella falsa. Scegliendo il percorso giusto, incontreranno finalmente la responsabile di questa congiura, ovvero Kaguya. Lei è una principessa lunare in esilio che ha preso possesso della luna per risanare il collegamento tra questa e la Terra. Il team ripristina la luna originale e Kaguya affronta i protagonisti, sottoponendoli alle \"Cinque Richieste Impossibili\" (Five Impossibile Requests).\r\n\r\nCompletate le Cinque Richeste, al team viene data un\'ulteriore consegna da parte di Kaguya: uccidere la sua rivale, Mokou. Ma prima, ora che la luna piena è di nuovo al suo posto, dovranno sconfiggere tutti i nemici, ora più potenti, e fronteggiare una Keine nella forma di hakutaku. Ovviamente i protagonisti hanno la meglio, confermando quanto il giocatore sia ormai \"drogato di Touhou\". ', 8),
('9', 2005, '東方花映塚　～ Phantasmagoria of Flower View', '9.jpg', 'todo', 'Phantasmagoria of Flower View', 'Phantasmagoria of Flower View', 'Questo gioco si svolge nella mistica terra di Gensokyo. La primavera è arrivata, ma qualcosa non va. I fiori stanno fiorendo e le fate stanno diventando attive come al solito, ma la quantità di fiori e fate è innaturale; anche i fiori non primaverili stanno fiorendo. Giocando come uno dei 16 personaggi, devi affrontare la tua strada attraverso 9 tappe per raggiungere Muenzuka e scoprire la verità dietro la molla anormale.', 9),
('10', 2007, '東方風神録　～ Mountain of Faith', '10.jpg', 'todo', 'Mountain of Faith', 'Montagna di fede', 'È autunno a Gensokyo. Uno sconosciuto arriva al Santuario Hakurei e dice che il santuario dovrebbe chiudersi definitivamente. Reimu Hakurei non lascerà che succeda così lei o Marisa Kirisame vanno a indagare sulla situazione.\r\n\r\nL\'eroina va alla montagna Youkai dove incontra tre dei e infine Nitori Kawashiro, che afferma che il kappa è turbato da un nuovo dio sulla montagna. Mentre avanza ulteriormente, l\'eroina incontra Aya Shameimaru, a cui è stato detto di investigare sull\'intruso. Aya viene sconfitta e l\'eroina si trasferisce nel Santuario di Moriya. Sanae Kochiya dice che il nuovo dio, in seguito mostrato come Kanako Yasaka, sta cercando di raccogliere la fede. Dopo che Sanae è stata sconfitta, appare Kanako e spiega le sue motivazioni. Alla fine fa pace con il kappa e il tengu, che, in cambio, accettano Kanako come il nuovo dio della montagna, fornendole fede.\r\n\r\nNella fase Extra, le eroine incontrano l\'altro dio del Santuario Moriya, Suwako Moriya, che è il vero dio del santuario. Suwako richiede che giochino con lei in una battaglia danmaku, proprio come hanno giocato con Sanae e Kanako.', 10),
('11', 2008, '東方地霊殿　～ Subterranean Animism', '11.jpg', 'todo', 'Subterranean Animism', 'Animismo sotterraneo', 'Suddenly a geyser erupted out of nowhere, which Reimu Hakurei and Marisa Kirisame took advantage of, even though a higher amount of earth spirits showed up. But others got worried, and wanted them to go down into the Underworld, with a device Yukari Yakumo made so they could talk even underground.\r\n\r\nAfter passing the tsuchigumo Yamame Kurodani and the jealous bridge princess Parsee Mizuhashi, the heroine reaches the Former Capital, a place where now the oni live. Yuugi Hoshiguma challenges the heroine on a friendly battle, and then says the heroine should go to the Palace of the Earth Spirits. Here, the heroine met Satori Komeiji, the owner of both Rin Kaenbyou (Orin) and Utsuho Reiuji (Okuu). Rin wanted the heroine to come down and help her stop her friend as Utsuho became too powerful, and Utsuho eventually was stopped by the heroine.\r\n\r\nAfterwards, the heroine visits the Moriya Shrine to talk with Kanako Yasaka and Suwako Moriya. The goddesses were not there, but she does meet Satori\'s sister, Koishi Komeiji, who wanted to go to the Moriya Shrine to ask the gods to empower her pets. In the end, they have a duel because Koishi wanted to see if the person who defeated her sister was really that strong. ', 11),
('12', 2009, '(東方星蓮船　～ Undefined Fantastic Object', '12.jpg', 'todo', 'Undefined Fantastic Object', 'Oggetto fantastico non definito', 'La storia di Undefined Fantastic Object parla di uno strano oggetto volante che appare nei cieli di Gensokyo durante l\'inizio della primavera. Il personaggio del giocatore, per qualsiasi ragione indichi la descrizione del tipo di colpo, si lancia nel cielo per svelare i suoi misteri, saccheggiare il suo tesoro e generalmente sbarazzarsi dello youkai.\r\n\r\nDopo aver raggiunto il boss della fase 4, Minamitsu Murasa, la storia inizia a sbrogliare. L\'obiettivo della maggior parte dei nemici nel gioco è liberare un umano chiamato Byakuren Hijiri da un sonno sigillato di centinaia di anni. È interessante notare che ogni personaggio oltre a Kogasa Tatara ha un ruolo importante nella trama. Ognuno con le proprie ragioni, i nemici tentano di raccogliere questi UFO - in realtà frammenti del \"caveau galleggiante\", Tobikura - il giocatore è stato collezionato, ma il giocatore alla fine apre e affronta Byakuren stessa per curiosità.\r\n\r\nDopo gli eventi della storia principale, è noto che Byakuren ed i suoi seguaci erigono un tempio buddista a Gensokyo. Tuttavia, al fine di capire quali fossero gli oggetti UFO, il giocatore in seguito incontra Nue Houjuu, che rivela di essere stata lei ad aiutare e ostacolare sia il giocatore che le fazioni nemiche durante la storia principale. La ragione per cui i frammenti di Tobikura erano stati dispersi era perché lei aveva piazzato Semi di Forma Sconosciuta in loro, e la ragione per cui sembravano essere UFO era essenzialmente perché nient\'altro avrebbe dovuto fluttuare nel cielo in quel modo.', 12),
('13', 2011, '東方神霊廟　～ Ten Desires', '13.jpg', 'todo', 'Ten Desires', 'Dieci desideri', 'The Story of Ten desires ha luogo dopo gli eventi di Undefined Fantastic Object. Gli spiriti divini compaiono a Gensokyo e le nostre eroine vengono inviate a indagare. Pensavano che il vero colpevole fosse Yuyuko Saigyouji, ma Yuyuko dice che non sa molto degli eventi e suggerisce all\'eroina di andare al tempio di Myouren. Dopo aver combattuto attraverso varie fasi verso il Grande Mausoleo della Sorgente dei Sogni, scoprono che gli spiriti divini sono volati qui per assistere alla resurrezione di un Santo, Toyosatomimi no Miko.', 13),
('14', 2013, '東方輝針城　～ Double Dealing Character', '14.jpg', 'todo', 'Double Dealing Character', 'Double Dealing Character', 'Gli youkai si stanno ribellando e gli tsukumogami stanno arrivando; nessuno sa cosa sta succedendo, le nuvole si stanno accumulando e un forte vento trasporta i suoni di un enorme edificio. Gensokyo è pieno dei suoni della dissonanza. Le singole armi dei tre protagonisti iniziano a comportarsi in modo strano. È loro compito prendere le loro armi in mano e combattere gli youkai, o gettare le loro armi da parte.', 14),
('15', 2015, '東方紺珠伝　～ Legacy of Lunatic Kingdom', '15.jpg', 'todo', 'Legacy of Lunatic Kingdom', 'Legacy of Lunatic Kingdom', 'Someone is causing havoc in the Lunar Capital, and evidently, Lunarians have come to purify Gensokyo to make it suitable for them to live there (as they have a thing against what they consider \"impurity\"). With the help of the Ultramarine Orb Elixir (or not), the girls must now set out to stop this invasion and find the perpetrator behind this incident. ', 15),
('16', 2017, '東方天空璋　～ Hidden Star in Four Seasons', '16.jpg', 'todo', 'Hidden Star in Four Seasons', 'Stella nascosta in quattro stagioni', 'Nonostante sia in piena estate, le stagioni in varie località sono completamente fuori pericolo. Il Santuario Hakurei è ricoperto di petali di ciliegio, la montagna Youkai si crogiola nel mezzo dell\'autunno, e la Foresta della Magia è ricoperta di neve ... e grazie ad una strana forza, le fate di Gensokyo stanno dilagando con forza insondabile. Nel bel mezzo di questo incidente innegabile, le ragazze hanno deciso di indagare e trovare dietro di sé il perpetratore.', 16);

--

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
