<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	echo('<div id="wronglogin">Login invalido, sessione scaduta!</div>');
	die;
}

$title = "Gestione capitoli - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<div id="logoutbutton">
				<?php require('logout.php'); ?>
			</div>
		<div id="chapteradd">
			<a href="chapteradd.php">Aggiungi capitolo</a>
		</div>
<?php
require_once('../config.php');
require_once('../getconnection.php');

$risp = $conn->query('Select * from chapters order by year asc');
if($risp)
{
	echo '<form class="optionsnewsform" action="chapterdelete.php" method="post"><fieldset id="chapterlist">';
	echo '<ul>';
	while($capitolo = $risp->fetch_assoc()) 
	{
		echo '<li>'.$capitolo['number']." ".$capitolo['titleeng']." - ".$capitolo['year'].' <button name="btnDelete" value="'.$capitolo['id'].'">Elimina</button></li>';
	}
	echo '</ul>';
	echo '</filedset></form>';
}
else
	echo('<div id="nodata">Nessuna capitolo inserito</div>');
?>
		</div>
	</body>
</html>


