<?php require_once __DIR__.DIRECTORY_SEPARATOR."dbConnection.php"; ?>
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
$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
$chapters = $dbConnection->getListChapters();
if($chapters != null)
{
	echo '<dl>';
	foreach($chapters as $chapter)
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
		echo '<dt>'.$chapter['number'].' - '.$chapter['titleeng'].'</dt>';
		echo '<dd>';
		if(isset($chapter['image']) && strcmp($chapter['image'], "") != 0)
			echo '<div class="newsimage"><img src="images/chapters/'.$chapter['image'].'" alt="'.$chapter['imagedescr'].'"/></div>';
		echo '<ul>';
		echo '		<li><span class="chaptervoice">Numero</span>: '.$chapter['number'].'</li>';
		echo '		<li><span class="chaptervoice">anno di pubblicazione</span>: '.$chapter['year'].'</li>';
		echo '		<li><span class="chaptervoice">Titolo giapponese</span>: <span xml:lang="ja">'.$chapter['title'].'</span></li>';
		echo '		<li><span class="chaptervoice">Titolo in inglese</span>: <span xml:lang="en">'.$chapter['titleeng'].'</span></li>';
		echo '		<li><span class="chaptervoice">Titolo in italiano</span>: '.$chapter['titleita'].'</li>';
		echo '</ul>';
		echo '<span class="chaptervoice">Trama</span>:<br/>';
		echo '<div class="trama">'.$chapter['plot'];
		echo '</div>';
		echo '</dd>';

	}
	echo '</dl>';
}
else
	echo '<div id="no data">Nessun capitolo presente</div>';
$dbConnection->closeDBConnection();
?>
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>
