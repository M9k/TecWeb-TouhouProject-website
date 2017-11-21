<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	echo('<div id="wronglogin">Login invalido, sessione scaduta!</div>');
	die;
}

$title = "Gestione news - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<div id="logoutbutton">
				<?php require('logout.php'); ?>
			</div>
		<div id="newsadd">
			<a href="newsadd.php">Aggiungi news</a>
		</div>
<?php
require_once('../config.php');
require_once('../getconnection.php');

$risp = $conn->query('Select id, title, image, imgdescr, data, hidden, CONCAT(SUBSTRING(text, 1, 10000), "...") as text from news order by data desc');
if($risp)
{
	echo '<dl>';
	while($notizia = $risp->fetch_assoc()) 
	{
		echo '<a href="../article?id='.$notizia['id'].'"><dt>'.$notizia['title'].'</dt></a>';
		echo '<dd>';
		echo '<div class="optionsnewsdiv"><form class="optionsnewsform" action="newsaction.php" method="post"><div id="optionsnewsformcontent"><button name="btnEdit" value="'.$notizia['id'].'">Modifica</button> <button name="btnDelete" value="'.$notizia['id'].'">Elimina</button>';
		if($notizia['hidden'])
			echo ' <button name="btnShow" value="'.$notizia['id'].'">Pubblica</button>';
		else
			echo ' <button name="btnHide" value="'.$notizia['id'].'">Imposta come bozza</button>';
		echo '</news></form></div>';
		if(isset($notizia['image']) && strcmp($notizia['image'], "") != 0)
			echo '<div class="newsimage"><img src="..\images\news\\'.$notizia['image'].'" alt="'.$notizia['imgdescr'].'"/></div>';
		echo '<div class="data">'.strftime('%e %B %Y',strtotime($notizia['data'])).'</div><div class="testo">'.$notizia['text'].'</div></dd>';
	}
	echo '</dl>';
}
else
	echo('<div id="nonews">Nessuna news inserita</div>');
?>
		</div>
	</body>
</html>


