<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
if (session_status() == PHP_SESSION_NONE) { session_start(); }

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	echo('<div id="wronglogin">Login invalido, sessione scaduta!</div>');
	die;
}

$title = "Gestione immagini - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Gestione immagini</h2>
			<form action="imageupload.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<p>Seleziona l'immagine da caricare (Massimo 5Mb, in formato comune):</p>
					<input type="file" name="fileupload" id="fileupload"/><br/>
					<input type="submit" value="Carica" name="submit"/>
				</fieldset>
			</form>
<?php
$immagini = scandir('../images/news/');
echo '<dl>';
foreach($immagini as $immagine)
{
	if($immagine != '..' && $immagine != '.')
	{
		echo '<dt>'.$immagine.'</dt>';
		echo '<dd><div class="imagediv"><form class="imagedivform" action="imagedelete.php" method="post"><fieldset class="imagedescription"><div class="imageview"><img alt="immagine caricata di nome'.$immagine.'" src="../images/news/'.$immagine.'"/></div><div class="linkimage">Per utilizzare questa immagine inserire: images/news/'.$immagine.'</div><button name="btnDelete" value="'.$immagine.'">Elimina</button></fieldset></form></div></dd>';
	}
}
echo '</dl>';
?>

		</div>
	</body>
</html>

