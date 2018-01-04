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
}?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
	<meta name="description" content="Fan club italiano di Touhou"/>
	<meta name="keywords" content="Touhou, Tou Hou, fan club, fanclub, italia, italiano, bullethell, bullet hell"/>
	<meta name="language" content="ïtalian it"/>
	<meta name="Author" content="Cailotto Mirco"/>

	<link rel="icon" type="image/png" href="../images/favicon.png"/>
	<link type="text/css" rel="stylesheet" href="../style/style.css" media="handheld, screen"/>
	<link type="text/css" rel="stylesheet" href="../style/admin.css" media="handheld, screen"/>
	<link type="text/css" rel="stylesheet" href="../style/tablet.css" media="handheld, screen and (max-width: 1024px), only screen and (max-device-width:1024px)"/>
	<link type="text/css" rel="stylesheet" href="../style/mobile.css" media="handheld, screen and (max-width: 680px), only screen and (max-device-width:680px)"/>
	<link type="text/css" rel="stylesheet" href="../style/print.css" media="print"/>

	<script type="text/javascript" src="../script/script.js"></script>
	<title>Gestione capitoli - Touhou Italia</title>
</head>
<body>	<div id="subheader">
		<div id="header">
			<div id="titolo">
				<h1>Touhou Project</h1>
				<div id="titoletto">Pannello di amministrazione</div>
			</div>
			<div id="skipmenu">
				<a href="#contenuto">Vai al contenuto</a>
			</div>
			<div id="menudiv">
				<ul id="menu">
					<li id="menuvoice">Menu</li>
					<li><a href="index.php">Home</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="image.php">Immagini</a></li>
					<li><a href="comments.php">Commenti</a></li>
					<li><a href="banlist.php">Lista ban</a></li>
					<li class="disable">Capitoli</li>
					<li><a href="gestioneamministratori.php">Amministratori</a></li>
					<li><a href="../">Torna al sito</a></li>
					<li><a href="index.php?logout=true">Logout</a></li>
				</ul> 
			</div>
		</div>
	</div>
	<div id="contenuto">
		<h2>Gestione capitoli</h2>
		<div id="chapteradd">
			<a href="chapteradd.php">Aggiungi capitolo</a>
		</div>
<?php

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
$chapters = $dbConnection->getListChapters();
if($chapters != null)
{
	echo '<form class="optionsnewsform" action="chapterdelete.php" method="post"><fieldset id="chapterlist"><legend>Lista dei capitoli presenti:</legend>'.
		'<ul>';
	foreach($chapters as $capter)
		echo '<li>'.$capter['number']." ".$capter['titleeng']." - ".
			$capter['year'].' <button name="btnDelete" value="'.$capter['id'].'">Elimina</button></li>';
	echo '</ul>'.
		'</fieldset></form>';
}
else
	echo '<div id="nodata">Nessuna capitolo inserito</div>' ;
$dbConnection->closeDBConnection();
?>
	</div>
</body>
</html>

