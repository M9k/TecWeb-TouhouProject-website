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

$title = "Gestione capitoli - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Gestione capitoli</h2>
		<div id="chapteradd">
			<a href="chapteradd.php">Aggiungi capitolo</a>
		</div>
<?php

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
$chapters = $dbConnection->getListChapters();
if($chapters != null)
{
	echo '<form class="optionsnewsform" action="chapterdelete.php" method="post"><fieldset id="chapterlist">'.
		'<ul>';
	foreach($chapters as $capter)
		echo '<li>'.$capter['number']." ".$capter['titleeng']." - ".
			$capter['year'].' <button name="btnDelete" value="'.$capter['id'].'">Elimina</button></li>';
	echo '</ul>'.
		'</filedset></form>';
}
else
	echo '<div id="nodata">Nessuna capitolo inserito</div>' ;
$dbConnection->closeDBConnection();
?>
		</div>
	</body>
</html>

