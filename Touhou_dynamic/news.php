<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
$title = "News - Touhou Italia";
$location = 'Home &gt;&gt;&gt; News';
require('head.php');
?>
	<body>
<?php
require('header.php');
require('locationbar.php'); 
?>
		<div id="contenuto">
			<h2>News</h2>
<?php
require_once('getconnection.php');
//$conn = connessione al DB
$index = 0;			// di default prendo le news più recenti
$newsnumber = 10;	// numero di news per pagina
if(isset($_GET['index']))
	if(is_numeric($_GET['index'])) //evito SQLI
		if($_GET['index']>=0)
			$index = $_GET['index']*1; //se is_numeric avesse exploit il *1 impedirebbe comunque un SQLI
$risp = $conn->query('Select id, title, image, imgdescr, data, hidden, CONCAT(SUBSTRING(text, 1, 1000), "...") as text from news where hidden=false ORDER BY data desc LIMIT '.$index*$newsnumber.','.$newsnumber);
//numero totale dei post
$number = mysqli_num_rows($conn->query('Select * from news where hidden=false'));
if($risp != false)
{
	echo '<dl>';
	while($notizia = $risp->fetch_assoc()) 
	{
		echo '<dt><a href="article.php?id='.$notizia['id'].'">'.$notizia['title'].'</a></dt>';
		echo '<dd>';
		if(isset($notizia['image']) && strcmp($notizia['image'], "") != 0)
			echo '<div class="newsimage"><img src="images/news/'.$notizia['image'].'" alt="'.$notizia['imgdescr'].'"/></div>';
		echo '<div class="data">'.strftime('%e %B %Y',strtotime($notizia['data'])).'</div><div class="testo">'.strip_tags($notizia['text']).'</div></dd>';
	}
	echo '</dl>';
}
else
	echo '<p>Nessun articolo disponibile</p>';
?>
		<div id="navbutton">
<?php	//genero o meno i tasti per le altre news
if($index+1 < $number/$newsnumber)
	echo('<a id="precnews" class="othernews" href="news.php?index="'.($index+1).'">News precedenti</a>');
if($index > 0)
	echo('<a id="nextnews" class="othernews" href="news.php?index="'.($index-1).'">News successive</a>');
?>
		</div>
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>
