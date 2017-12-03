<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	echo('<div id="wronglogin">Login invalido, sessione scaduta!</div>');
	die;
}

$title = "Aggiunta capitolo - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Aggiunta capitolo</h2>
			<div id="newsadd">
<?php
require_once('../getconnection.php');
?>
				<form id="addchapterform" action="chapteraddaction.php" method="post" enctype="multipart/form-data">
					<fieldset id="addchapterdiv">
						<label for="titleform">Titolo giapponese</label>: <input name="title" type="text" id="title"/><br/>
						<label for="titleeng">Titolo inglese</label>: <input name="titleeng" type="text" id="titleeng"/><br/>
						<label for="titleita">Titolo italiano</label>: <input name="titleita" type="text" id="titleita"/><br/>
						<label for="fileupload">Immagine della copertina</label>: <br/>
						<input type="file" name="fileupload" id="fileupload"/><br/>
						<label for="imagedescr">Descrizione breve dell'immagine</label>: <input name="imagedescr" type="text" id="imagedescr"/><br/>
						<label for="number">Numero</label>: <input type="text" name="number" id="number"/><br/>
						<label for="year">Anno</label>: <input name="year" type="number" id="year" min="1970" max="3000" id="imgdescrform"/><br/>
						<label for="plot">Trama</label>: <br/><textarea name="plot" id="plot" cols="100" rows="10"></textarea><br/>	
						<input type="submit" value="Aggiungi" name="submit"/>
					</fieldset>
				</form>
			</div>
		</div>
	</body>
</html>


