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
			<img src="./images/characters/remilia.jpg" alt="Remilia Scarlet"/>
			<ul>
				<li><span class="charactervoice">Specie</span>: Vampiro</li>
				<li><span class="charactervoice">Età</span>: circa 500 anni</li>
				<li><span class="charactervoice">Occupazione</span>: amante delle Scarlet Devil Mansion</li>
				<li><span class="charactervoice">Luogo</span>: Scarlet Devil Mansion</li>
				<li>Remilia è la proprietaria e governate della Scarlet Devil Mansion, amante di Sakuya e Meiling, e sorella maggiore (e guardiana) di Flandre. Nonstante il suo aspetto ed il suo comportamento bambinesco la facciano	 	sembrare non spaventosa, è dotata di grande potere magico che la rendono degna della sua reputazione, Remilia è conosciuta per tutta Gensokyo come "Scarlet Devil".</li>
			</ul>
			</dd>
				
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>



