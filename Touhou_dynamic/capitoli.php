<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
$title = "Capitoli - Touhou Italia";
$location = 'Home &gt;&gt;&gt; Capitoli';
require('head.php');
?>
	<body>
<?php
require('header.php');
require('locationbar.php'); 
?>
		<div id="contenuto">
			<h2>Capitoli</h2>
<?php
require_once('getconnection.php');
//$conn = connessione al DB
//
$risp = $conn->query('Select * from capitoli order by year asc');
if($risp != false)
{
	echo '<dl>';
	while($capitolo = $risp->fetch_assoc()) 
	{
		//ID CHIAVE PRIMARIA
		//number (testo)
		//anno
		//title
		//image (nome)
		//imagedescr
		//titleeng
		//titleita
		//protagonists
		//plot
		echo '<dt>'.$capitolo['title'].'</a></dt>';
		echo '<dd>';
		if(isset($capitolo['image']) && strcmp($capitolo['image'], "") != 0)
			echo '<div class="newsimage"><img src="images\capitolo\\'.$capitolo['image'].'" alt="'.$capitolo['imgdescr'].'"/></div>';
		echo '<ul>';
		echo '		<li><span class="chaptervoice">Numero</span>: '.$capitolo['number'].'</li>';
		echo '		<li><span class="chaptervoice">anno di pubblicazione</span>: '.$capitolo['year'].'</li>';
		echo '		<li><span class="chaptervoice">Titolo in inglese</span>: '.$capitolo['titleeng'].'</li>';
		echo '		<li><span class="chaptervoice">Titolo in italiano</span>: '.$capitolo['titleita'].'</li>';
		echo '		<li><span class="chaptervoice">Protagoniste</span>: '.$capitolo['protagonists'].'</li>';
		echo '</ul>';
		echo '<div class="trama">'.$capitolo['plot'];
		echo '</div>';
		echo '</dd>';
	}
	echo '</dl>';
}
else
	echo '<p>Nessun capitolo inserito!</p>';
?>
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>
