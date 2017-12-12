 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
<div id="contenitore">
		<div id="contenuto">
			<h2>Capitoli</h2>
<?php
require_once('getconnection.php');
//$conn = connessione al DB
//
$risp = $conn->query('Select * from chapters order by year asc');
if($risp != false)
{
	echo '<dl>';
	while($capitolo = $risp->fetch_assoc()) 
	{
		//id CHIAVE PRIMARIA
		//number (testo)
		//year
		//title
		//image (nome)
		//imagedescr
		//titleeng
		//titleita
		//protagonists
		//plot
		echo '<dt>'.$capitolo['number'].' - '.$capitolo['titleeng'].'</dt>';
		echo '<dd>';
		if(isset($capitolo['image']) && strcmp($capitolo['image'], "") != 0)
			echo '<div class="newsimage"><img src="images/chapters/'.$capitolo['image'].'" alt="'.$capitolo['imagedescr'].'"/></div>';
		echo '<ul>';
		echo '		<li><span class="chaptervoice">Numero</span>: '.$capitolo['number'].'</li>';
		echo '		<li><span class="chaptervoice">anno di pubblicazione</span>: '.$capitolo['year'].'</li>';
		echo '		<li><span class="chaptervoice">Titolo giapponese</span>: <span xml:lang="ja">'.$capitolo['title'].'</span></li>';
		echo '		<li><span class="chaptervoice">Titolo in inglese</span>: <span xml:lang="en">'.$capitolo['titleeng'].'</span></li>';
		echo '		<li><span class="chaptervoice">Titolo in italiano</span>: '.$capitolo['titleita'].'</li>';
		echo '</ul>';
		echo '<span class="chaptervoice">Trama</span>:<br/>';
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
require('closeconnection.php');
?>
	</body>
</html>
