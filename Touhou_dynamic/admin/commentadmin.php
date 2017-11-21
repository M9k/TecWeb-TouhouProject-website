<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	echo('<div id="wronglogin">Login invalido, sessione scaduta!</div>');
	die;
}
$title = "Moderazione commenti - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<div id="logoutbutton">
				<?php require('logout.php'); ?>
			</div>
<?php
require_once('../getconnection.php');

$risp = $conn->query('Select * from comment order by data desc');
if($risp)
{
	echo '<dl>';
	while($commento = $risp->fetch_assoc()) 
	{
		echo '<dt>'.$commento['nick'].' - '.$commento['email'].'</dt>';
		echo '<dd>';
		echo '<div class="data">'.$commento['data'].'</div>';
		echo '<div class="message"><p>'.$commento['message'].'</p></div>';
		echo '<div class="ip">'.$commento['ip'].'</div>';
		echo '<form class="commentaction" action="commentaction.php" method="post"><fieldset id="commentactionsformcontent"><label for="reasonform">Motivo del ban</label>: <input id="reasonform" type="text" maxlength="255" name="reason"/> <button name="ban" value="'.$commento['id'].'">Banna l\'utente ed elimina il commento</button> <button name="delete" value="'.$commento['id'].'">Elimina il commento</button></fieldset></form>';
		echo '</dd>';
	}
	echo '</dl>';
}
else
	echo('<div id="nocomment">Nessun commento inserito</div>');
?>

		</div>
	</body>
</html>


