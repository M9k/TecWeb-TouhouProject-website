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

if(isset($_GET['id']))
{
	$edit = true;
	$dbConnection = new DBAccess();
	$dbConnection->openDBConnection();
	$news = $dbConnection->getArticle($_GET['id']);
	$dbConnection->closeDBConnection();
	$title = "Inserimento news - Touhou Italia";
}
else
{
	$edit = false;
	$title = "Modifica news - Touhou Italia";
}

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
		<div id="contenuto">
			<h2>Aggiunta news</h2>
			<div id="newsadd">
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

