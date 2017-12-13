<?php require_once __DIR__.DIRECTORY_SEPARATOR."dbConnection.php"; ?>
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
		<div id="contenitore">
			<div id="contenuto">
				<h2>News</h2>
<?php
	$dbConnection = new DBAccess();
	$dbConnection->openDBConnection();
	$index = 0;			// di default prendo le news più recenti
	$newsnumber = 10;	// numero di news per pagina
	if(isset($_GET['index']))
		if(is_numeric($_GET['index'])) //evito SQLI
			if($_GET['index']>=0)
				$index = $_GET['index']*1;
	$news = $dbConnection->getListNews(false, 1000, $newsnumber, $index*$newsnumber);

	//numero totale dei post
	$number = $dbConnection->getNumberNews(false);
	if($news != null)
	{
		echo '<dl>';
		foreach($news as $notizia) 
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
