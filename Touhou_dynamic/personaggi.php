<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
$location = 'Home &gt;&gt;&gt; Personaggi';
$title = 'Personaggi - Touhou Italia';
require('head.php');
?>
	<body>
<?php
require('header.php');
require('locationbar.php'); 
?>
		<div id="contenuto">
			<h2>Personaggi</h2>
			<dl id="personaggi">
			<dt>Remilia Scarlet</dt>
			<dd>
			<img src="./images/characters/remilia.jpg" alt="Immagine di Remilia Scarlet, con abiti gotici e ali da vampiro"/>
			<ul>
				<li><span class="charactervoice">Specie</span>: Vampiro</li>
				<li><span class="charactervoice">Età</span>: Circa 500 anni</li>
				<li><span class="charactervoice">Occupazione</span>: Governante delle <span xml:lang="en">Scarlet Devil Mansion</span></li>
				<li><span class="charactervoice">Luogo</span>: <span xml:lang="en">Scarlet Devil Mansion</span></li>
				<li>Remilia è la proprietaria e governate della <span xml:lang="en">Scarlet Devil Mansion</span>, padrona di Sakuya e Meiling, e sorella maggiore (e guardiana) di <span xml:lang="en">Flandre</span>. Nonstante il suo aspetto ed il suo comportamento bambinesco la facciano sembrare non spaventosa, è dotata di grande potere magico che la rendono degna della sua reputazione, Remilia è conosciuta per tutta Gensokyo come "<span xml:lang="en">Scarlet Devil</span>".</li>
			</ul>
			</dd>
				
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>



