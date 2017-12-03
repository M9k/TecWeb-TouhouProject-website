<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	echo('<div id="wronglogin">Login invalido, sessione scaduta!</div>');
	die;
}
$title = "Gestione ban - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Lista dei ban</h2>
<?php
require_once('../getconnection.php');

$risp = $conn->query('Select * from ban order by date desc');
if($risp)
{
	echo '<dl>';
	while($ban = $risp->fetch_assoc()) 
	{
		echo '<dt>'.$ban['ip'].' - '.strftime('%e %B %Y',strtotime($ban['date'])).'</dt>';
		echo '<dd>';
		if(strcmp($ban['motivo'], '') != 0)
			echo '<div class="data">Motivazione: '.$ban['motivo'].'</div>';
		echo '<form class="commentaction" action="banremove.php" method="post"><fieldset id="banform"><button name="banremove" value="'.$ban['ip'].'">Rimuovi il ban</button></fieldset></form>';
		echo '</dd>';
	}
	echo '</dl>';
}
else
	echo('<div id="nocomment">Nessun ban applicato</div>');
?>

		</div>
	</body>
</html>


