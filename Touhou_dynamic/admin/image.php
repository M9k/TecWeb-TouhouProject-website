<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

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
			<div id="logoutbutton">
				<?php require('logout.php'); ?>
			</div>
			<form action="imageupload.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<p>seleziona l'immagine da caricare: INDICARE SPECIFICHE</p>
					<input type="file" name="fileupload" id="fileupload"/><br/>
					<input type="submit" value="Carica" name="submit"/>
				</fieldset>
			</form>
<?php
$immagini = scandir('../images/news/');
foreach($immagini as $immagine)
{
	if($immagine != '..' && $immagine != '.')
		echo '<div class="imagediv"><form class="imagedivform" action="imagedelete.php" method="post"><fieldset class="imagedescription"><div class="imageview"><img alt="immagine caricata di nome'.$immagine.'" src="../images/news/'.$immagine.'"/></div><div class="imagename">'.$immagine.'</div><div class="linkimage">TODO: - copyOnClick images/news/'.$immagine.'</div><button name="btnDelete" value="'.$immagine.'">Elimina</button></fieldset></form></div>';
}
?>

		</div>
	</body>
</html>

