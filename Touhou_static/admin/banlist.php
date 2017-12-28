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
$title = "Gestione ban - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Lista dei ban</h2>
<?php

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
$banList = $dbConnection->getListBan();
if($banList == null)
	echo('<div id="nocomment">Nessun ban applicato</div>');
else
{
	echo '<dl>';
	foreach($banList as $ban) 
	{
		echo '<dt>'.$ban['ip'].' - '.strftime('%e %B %Y',strtotime($ban['date'])).'</dt>';
		echo '<dd>';
		if(strcmp($ban['motivo'], '') != 0)
			echo '<div class="data">Motivazione: '.$ban['motivo'].'</div>';
		echo '<form class="commentaction" action="banremove.php" method="post"><fieldset id="banform"><button name="banremove" value="'.$ban['id'].'">Rimuovi il ban</button></fieldset></form>';
		echo '</dd>';
	}
	echo '</dl>';
}
$dbConnection->closeDBConnection();
?>
		</div>
	</body>
</html>
