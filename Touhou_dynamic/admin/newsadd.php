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
<?php
require_once('../getconnection.php');
if(isset($_GET['id']))
{
	$edit = true;
	$news = $conn->query('Select id, title, image, data, imgdescr, hidden, text from news where id ='.$_GET['id'])->fetch_assoc();
}
else
	$edit = false;
?>
				<form id="addnewsform" action="newsaction.php" method="post" enctype="multipart/form-data">
					<fieldset id="addnewsdiv">
<?php if($edit)
echo('<input name="id" style="position: absolute; visibility: hidden;" id="idform" type="text" value="'.$news['id'].'"/>'); ?>
						<label for="titleform">Titolo</label>: <input name="title" id="titleform" type="text" value="<?php if($edit) echo($news['title'])?>"/><br/>
						<label for="imageform">Titolo immagine di copertina</label>: <input name="image" id="imageform" type="text" value="<?php if($edit) echo($news['image'])?>"/><br/>
						Oppure<br/>
						<label for="fileupload">Carica nuova immagine, ignorando il box di input precedente</label>: <br/>
						<input type="file" name="fileupload" id="fileupload"/><br/>
						<label for="imgdescrform">Descrizione breve dell'immagine</label>: <input name="imgdescr" type="text" id="imgdescrform" value="<?php if($edit) echo ($news['imgdescr'])?>"/><br/>
						Nota: utilizzare <a href="image.php">gestione immagini</a> per caricare nuove immagini<br/>
						<label for="hiddenform">Bozza</label>: <input name="hidden" id="hiddenform" type="checkbox" <?php if($edit) if($news['hidden'] == true) echo('checked="checked"');?>/><br/>
						<label for="textform">Testo</label>: <br/><textarea name="text" id="textform" cols="100" rows="10"><?php if($edit) echo($news['text'])?></textarea><br/>	
						<input type="submit" value="Salva" name="submit"/>
					</fieldset>
				</form>
			</div>
		</div>
	</body>
</html>

