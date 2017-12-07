 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 

require_once('config.php');
require_once('getconnection.php');
//$conn = connessione al DB
$ok = false;
if(!isset($_GET['id']))
	echo '<div id="error_id" class="error">'."Non è stato indicato nessun articolo".'</div>';
else
{
	$risp = $conn->query('Select id, title, image, imgdescr, data, text from news where id='.$_GET['id']);
	$notizia = $risp->fetch_assoc();

	if(strlen($notizia['title']) < 20)
		$title = $notizia['title'].' - Touhou Italia';
	else
		$title = trim(substr($notizia['title'],0,20)).'... - Touhou Italia';
	if(strlen($notizia['title']) < 30)
		$location = 'Home &gt;&gt;&gt; News &gt;&gt;&gt; '.$notizia['title'];
	else
		$location = 'Home &gt;&gt;&gt; News &gt;&gt;&gt; '.trim(substr($notizia['title'],0,30)).'...';
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
if($notizia == false)
	echo '<div id="error_query" class="error">'."L'articolo richiesto non esiste".'</div>';
else
{
	echo '<h2>'.$notizia['title'].'</h2>';
	if(isset($notizia['image']) && strcmp($notizia['image'], "") != 0)
		echo '<div class="newsimage"><img src="images/news/'.$notizia['image'].'" alt="'.$notizia['imgdescr'].'"/></div>';
	echo '<div class="data">'.strftime('%e %B %Y',strtotime($notizia['data'])).'</div><div class="testo">'.$notizia['text'].'</div>';
	$ok = true;
}
}
?>
			</div>
			<div id="commenti">
				<div id="leavecomment">
					<form action="commentadd.php" method="post" id="leavecommentform" onsubmit="return validateForm()">
						<fieldset id="leavecommentfields">
							<div id="errorenome"></div>
							<label for="nameinput">Nome</label>: <input id="nameinput" name="name" type="text"/><br/>
							<div id="erroreemail"></div>
							<label for="emailinput"><span xml:lang="en">E-mail</span> (non sarà pubblicata)</label>: <input id="emailinput" name="email" type="text"/><br/>
							<div id="errorecommento"></div>
							<label for="commentoinput">Commento</label>: <textarea id="commentoinput" name="message" cols="48" rows="4"></textarea><br/>
							<input value="Invia" type="submit"/>
							<input value="Cancella" type="reset"/>
						</fieldset>
					</form>
				</div>
				<div id="listacommenti">
<?php
if($ok==true)
{
$commenti = $conn->query('Select nick, message from comment where news_id='.$_GET['id'].' limit 200');
echo '<dl>';
$comments = false;
while($commento = $commenti->fetch_assoc()) 
{
	$comments = true;
	echo '<dt>'.$commento['nick'].'</dt>';
	echo '<dd><div class="commenttext">'.$commento['message'].'</div></dd>';
}
if(!$comments)
	echo '<div id="nopostmessage">Nessun commento inserito</div>';
echo '</dl>';	
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
