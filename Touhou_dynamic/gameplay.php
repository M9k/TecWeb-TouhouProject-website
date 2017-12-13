<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
$location = 'Home &gt;&gt;&gt; Gameplay';
$title = 'Gameplay - Touhou Italia';
require('head.php');
?>
	<body>
<?php
require('header.php');
require('locationbar.php'); 
?>
<div id="contenitore">
		<div id="contenuto">
			<h2>Gameplay</h2>

			<!-- TODO: immagini -->
			<p>Il <span xml:lang="en">gameplay</span> di Touhou rientra nella categoria dei "<strong xml:lang="en">Shoot'em up</strong>" a scorrimento verticale, più precisamente nella sottocategoria "<strong xml:lang="en">Bullet Hell</strong>".<br/>
			<img class="even" src="images/spaceinvaders.jpg" alt=""/>
			I giochi <em xml:lang="en">Shoot'em up</em> sono caratterizzati da una navicella controllata dal giocatore che deve sparare ai nemici ed avanzare nel livello, fino al raggiungimento di un boss finale, solitamente con una quantità di vita ed una dimensione superiore ai nemici normali.<br/>
			Molti titoli consento anche il raccoglimento di <span xml:lang="en">bonus</span>, lasciati cadere dai nemici sconfitti, che permettono di incrementare la potenza delle proprie armi oppure l'aumento del punteggio.<br/>
			Pietre miliari di questo genere sono <span xml:lang="en">Space Invaders</span> e <span xml:lang="en">Space Impact</span>, rispettivamente a schermata fissa ed a scorrimento orizzontale.<br/>
			</p>
			<p>
			<img class="odd" src="images/Ikaruga.jpg" alt=""/>Verso gli anni 90, soprattutto in Giappone e in Asia, si sviluppò un nuovo sottogenere, definito "<strong xml:lang="en">Bullet Hell</strong>" o "<strong xml:lang="en">Danmaku</strong>" (<ruby><rb><span xml:lang="ja">弾幕</span></rb><rp>(</rp><rt><span xml:lang="ja">だんま</span>く</rt><rp></ruby>, "sbarramento"), che si basano su un elevato numero di proiettili a schermo di dimensione solitamente ridotta da evitare con precisione millimetrica.<br/>
			Una particolarità di questo sottogenere è l'<strong xml:lang="en">hitbox</strong> della navicella, cioè la porzione della navicella che non si deve lasciar colpire dai proiettili, molto ridotta rispetto gli altri giochi e spesso invisibile, che non coincide con le dimensioni della navicella che viene controllata, in modo tale da consentire ai giocatori più abili di far passare indenne la navicella tra due proiettili nemici molto ravvicinati tra loro.
			</p>
			<p>Touhou, oltre a queste caratteristiche, ne ha introdotte altre, alcune riprese da altri titoli mentre altre originali:
			<h3>Protagoniste</h3>
			<p><img class="even" src="images/protagoniste.jpg" alt=""/>Al posto delle classiche navicelle spaziali od aerei si andranno a controllare delle ragazze, le principali sono <em xml:lang="en">Marisa Kirisame</em> e <em xml:lang="en">Reimu Hakurei</em>, sacerdotesse di un tempio shintoista.<br/>
			Anche i nemici affrontati non sono aerei o alieni, ma bensì vampiri, fate, demoni ed altre creature del folklore giapponese.</p>
			<h3>Trama</h3>
			<p>I <span xml:lang="en">Shoot'em up</span> sono rinomati per non avere nessuna trama, ci si ritrova a comandare una navicella spaziale e si prosegue sparando a tutto quello che sembra minaccioso e cattivo, ignorando totalmente le motivazioni delle proprie azioni.<br/>
			<img src="images/Gensokyo.jpg" alt=""/>
			Touhou invece presenta delle storie, ambientate nella terra di "<em xml:lang="en">Gensokyo</em>" (<ruby><rb><span xml:lang="ja">幻想郷</span></rb><rp>(</rp><rt><span xml:lang="ja">げんそきょ</span></rt><rp></ruby>, letteralmente "Terra dell'illusione"), regione inizialmente appartenente al Giappone, ma successivamente sigillata in quanto gli spiriti presenti stavano iniziando a minacciare le aree vicine.<br/>
			Le protagoniste si ritroveranno in svariate occasioni a dover difendere il sigillo che impedisce di fuggire dalla regione oppure di preservare gli equilibri interni, impedendo a qualche spirito di prevalere sugli altri oppure di distruggere la regione.</p>
			<h3 xml:lang="en">Spellcard</h3>
			<p>
			<img class="even" src="images/spellcard.jpg" alt=""/>Vengono definite <span xml:lang="en">spellcard</span> i <em><span xml:lang="en">pattern</span> d'attacco</em> dei boss dei vari livelli, che a differenza di altri giochi vengono indicati al giocatore, in modo che possa prepararsi adeguatamente.<br/>
			Ogni boss ha più spellcard, solitamente possono andare dalle 5 per i boss dei primi livelli fino ad arrivare a 15 per i boss dei livelli extra, intercambiate in momenti precisi e chiari al giocatore, cioè allo scadere di un <span xml:lang="en">timer</span> o dopo la perdita di una determinata percentuale di vita da parte di un boss.</p>
			<h3>Bombe</h3>
			<p>Le bombe sono un aiuto fornito al giocatore, in base alla difficoltà selezionata possono variare di numero e possono essere acquisite durante il gioco compiendo determinati obbiettivi.<br/>
			Possono essere utilizzate in qualsiasi momento dal giocatore per pulire l'area di gioco dai nemici e dai proiettili avversari.<br/>
			Sono molto utili per liberarsi da situazioni senza via d'uscita, in quanto se non si presta attenzione ai <span xml:lang="en">pattern</span> d'attacco dei nemici ci si può ritrovare circondati dai proiettili.</p>
			<h3 xml:lang="en">Graze</h3>
			<p><img class="odd" src="images/nuclearfusion.jpg" alt=""/>
			I "<span xml:lang="en">graze</span>", cioè gli sfioramenti, rappresentano l'azione di lasciare passare dei proiettili sul corpo della protagonista senza far colpire l'<span xml:lang="en">hitbox</span>, questa pratica risulta necessaria nelle difficoltà più avanzate in quanto il gran numero di proiettili rende impossibile schivarli con ampio margine.<br/>
			Questa azione fa aumentare il punteggio del giocatore, in questo modo anche alle difficoltà più facili si spinge il giocatore a correre dei rischi extra a beneficio del punteggio finale.</p>
			<h3 xml:lang="en">Point of collection</h3>
			<p>Introdotto dal sesto capitolo del <span xml:lang="en">brand</span>, indica la raccolta automatica di tutti i bonus presenti su schermo nel caso si porti la protagonista nella parte superiore dello schermo, questo ovviamente comporta un elevato rischio, in quanto ci si avvicina all'area nella quale appaiono i nemici.</p>
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>

