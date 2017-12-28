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
$title = "Moderazione commenti - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Moderazione commenti</h2>
<?php

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
$comments = $dbConnection->getListComments(null, false, true);
if($comments != null)
{
	echo '<dl>';
	foreach($comments as $comment) 
	{
		echo '<dt>'.$comment['nick'].' - '.$comment['email'].'</dt>'.
			'<dd>'.
			'<div class="data">'.$comment['data'].'</div>'.
			'<div class="message"><p>'.$comment['message'].'</p></div>'.
			'<div class="ip">'.$comment['ip'].'</div>'.
			'<form class="commentaction" action="commentaction.php" method="post">'.
			'<fieldset id="commentactionsformcontent">'.
			'<label for="reasonform">Motivo del ban</label>: <input id="reasonform" type="text" maxlength="255" name="reason"/> '.
			'<button name="ban" value="'.$comment['id'].'">Banna l\'utente ed elimina il commento</button>'.
			' <button name="delete" value="'.$comment['id'].'">Elimina il commento</button>'.
			'</fieldset>'.
			'</form>'.
			'</dd>';
	}
	echo '</dl>';
}
else
	echo('<div id="nodata">Nessun commento inserito</div>');
$dbConnection->closeDBConnection();
?>
		</div>
	</body>
</html>

