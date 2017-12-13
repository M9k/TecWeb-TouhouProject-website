<?php require_once __DIR__.DIRECTORY_SEPARATOR."dbConnection.php"; ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
if(!isset($_GET['id']) || !is_numeric($_GET['id']))
	echo '<div id="error_id" class="error">'."Non è stato indicato nessun articolo".'</div>';
else
{
	$notizia = $dbConnection->getArticle($_GET['id']);

	if(strlen($notizia['title']) < 20)
		$title = $notizia['title'].' - Touhou Italia';
	else
		$title = trim(substr($notizia['title'],0,20)).'... - Touhou Italia';
	if(strlen($notizia['title']) < 30)
		$location = 'Home &gt;&gt;&gt; News &gt;&gt;&gt; '.$notizia['title'];
	else
		$location = 'Home &gt;&gt;&gt; News &gt;&gt;&gt; '.trim(substr($notizia['title'],0,30)).'...';
}
require('head.php');
?>

	<body>
<?php
require('header.php');
require('locationbar.php'); 
?>
		<div id="contenuto">
		<div id="news">
<?php
if($notizia == null)
	echo '<div id="error_query" class="error">'."L'articolo richiesto non esiste".'</div>';
else
{
	echo '<h2>'.$notizia['title'].'</h2>';
	if(isset($notizia['image']) && strcmp($notizia['image'], "") != 0)
		echo '<div class="newsimage"><img src="images/news/'.$notizia['image'].'" alt="'.$notizia['imgdescr'].'"/></div>';
	echo '<div class="data">'.strftime('%e %B %Y',strtotime($notizia['data'])).'</div><div class="testo">'.$notizia['text'].'</div>';
	$ok = true;
}
?>
			</div>
			<div id="commenti">
				<div id="leavecomment">
					<h3>Lascia un commento</h3>
					<form action="commentadd.php" method="post" id="leavecommentform" onsubmit="return validateForm()">
						<fieldset id="leavecommentfields">
							<div id="errorenome"></div>
							<label for="nameinput">Nome</label>: <input id="nameinput" name="name" type="text" onchange="validateString('nome',document.getElementById('nameinput').value)"/><br/>
							<div id="erroreemail"></div>
							<label for="emailinput"><span xml:lang="en">E-mail</span> (non sarà pubblicata)</label>: <input id="emailinput" name="email" type="text" onchange="validateEmail()" /><br/>
							<div id="errorecommento"></div>
							<label for="commentoinput">Commento</label>: <textarea id="commentoinput" name="message" onchange="validateString('commento',document.getElementById('commentoinput').value)" cols="48" rows="4"></textarea><br/>
							<div id="erroreinvio"></div>
							<input value="Invia" type="submit"/>
							<input value="Cancella" type="reset"/>
						</fieldset>
					</form>
				</div>
				<div id="listacommenti">
					<h3>Commenti lasciati dagli utenti</h3>
<?php
if(isset($notizia))
{
	$comments = $dbConnection->getListComments($_GET['id'], 200);
	if($comments != null)
	{
		echo '<dl>';
		foreach($comments as $comment) 
		{
			echo '<dt>'.$comment['nick'].'</dt>';
			echo '<dd><div class="commenttext">'.$comment['message'].'</div></dd>';
		}
		echo '</dl>';	
	}
	else
		echo '<div id="nopostmessage">Nessun commento inserito</div>';
	$dbConnection->closeDBConnection();
}
?>
				</div>
			</div>
		</div>
<?php 
require('sidebar.php');
require('footer.php');
?>
	</body>
</html>
