<?php require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
if (session_status() == PHP_SESSION_NONE) { session_start(); }

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	$_SESSION['error'] = "Login invalido, sessione scaduta!";
	header("Location: error.php");
	die();
}

$title = "Gestione news - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Gestione news</h2>
			<div id="newsadd">
				<a href="newsadd.php">Aggiungi news</a>
			</div>
			<div id="newssiderefresh">
				<a href="cleancache.php">Cancella le cache delle news per la sidebar</a>
			</div>
<?php
	$dbConnection = new DBAccess();
	$dbConnection->openDBConnection();
	$news = $dbConnection->getListNews(true, 10000);
	if($news != null)
	{
		echo '<dl>';
		foreach($news as $notizia) 
		{
			echo '<a href="../article?id='.$notizia['id'].'"><dt>'.$notizia['title'].'</dt></a>'.
				'<dd>'.
				'<div class="optionsnewsdiv"><form class="optionsnewsform" action="newsaction.php" method="post"><div id="optionsnewsformcontent"><button name="btnEdit" value="'.$notizia['id'].'">Modifica</button> <button name="btnDelete" value="'.$notizia['id'].'">Elimina</button>';
			if($notizia['hidden'])
				echo ' <button name="btnShow" value="'.$notizia['id'].'">Pubblica</button>';
			else
				echo ' <button name="btnHide" value="'.$notizia['id'].'">Imposta come bozza</button>';
			echo '</news></form></div>';
			if(isset($notizia['image']) && strcmp($notizia['image'], "") != 0)
				echo '<div class="newsimage"><img src="../images/news/'.$notizia['image'].'" alt="'.$notizia['imgdescr'].'"/></div>';
			echo '<div class="data">'.strftime('%e %B %Y',strtotime($notizia['data'])).'</div><div class="testo">'.$notizia['text'].'</div></dd>';
		}
		echo '</dl>';
	}
	else
		echo('<div id="nodata">Nessuna news inserita</div>');
	$dbConnection->closeDBConnection();
?>
		</div>
	</body>
</html>

