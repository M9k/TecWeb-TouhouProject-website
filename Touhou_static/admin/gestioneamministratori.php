<?php require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
header('Content-type: application/xhtml+xml');
if (session_status() == PHP_SESSION_NONE) { session_start(); }

if(!isset($_SESSION['login']) || !$_SESSION['login'] == true)
{
	$_SESSION['error'] = "Login invalido, sessione scaduta!";
	header("Location: error.php");
	die();
}
?>
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8"/>
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
	<title>Gestione amministratori - Touhou Italia</title>
</head>
<body>
	<div id="subheader">
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
					<li><a href="news.php" xml:lang="en">News</a></li>
					<li><a href="image.php">Immagini</a></li>
					<li><a href="comments.php">Commenti</a></li>
					<li><a href="banlist.php">Lista ban</a></li>
					<li><a href="chapters.php">Capitoli</a></li>
					<li class="disable">Amministratori</li>
					<li><a href="../">Torna al sito</a></li>
					<li><a href="index.php?logout=true" xml:lang="en">Logout</a></li>
				</ul> 
			</div>
		</div>
	</div>
	<div id="locationbar">
		<span xml:lang="en">Home</span> di amministrazione &gt;&gt;&gt; Amministratori
	</div>
	<div id="contenuto">
		<h2>Gestione amministratori</h2>
<?php

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();
?>
		<h3>Eliminazione amministratori</h3>
<?php
$administrators = $dbConnection->getListAdminsData($_SESSION['username']);
if($administrators != null)
{
	echo '<form class="listadmins" action="gestioneamministratoriaction.php" method="post"><fieldset id="listadminsfield"><legend>Lista degli amministratori presenti:</legend>'.
		'<ul>';
	foreach($administrators as $administrator)
		echo '<li>'.$administrator['username'].' - '.$administrator['email'].' <button name="btnDelete" value="'.$administrator['username'].'">Elimina '.$administrator['username'].'</button></li>';
	echo '</ul>'.
		'</fieldset></form>';
}
else
	echo '<div id="nodata">Nessun amministratore aggiuntivo presente</div>';
?>
		<h3>Inserimento amministratore</h3>
		<form id="addadmin" action="gestioneamministratoriaction.php" method="post">
			<fieldset id="addadminfield">
				<legend>Dati nuovo amministratore:</legend>
				<label for="usernameinput">Nome utente:</label> <input name="username" type="text" id="usernameinput"/><br/>
				<label for="emailinput">Email:</label> <input name="email" type="text" id="emailinput"/><br/>
				<label for="passwordinput">Password:</label> <input name="password" type="text" id="passwordinput"/><br/>
				<input type="submit" value="Aggiungi" name="submit"/> <input type="reset" value="Cancella i campi" name="reset"/>
			</fieldset>
		</form>
		<h3>Modifica propri dati</h3>
		<form id="editaccountinfo" action="gestioneamministratoriaction.php" method="post">
			<fieldset id="editaccountinfofield">
			<legend>Dati del proprio account:</legend>
			<label for="newemailinput">Email:</label>
				<input value="<?php echo $dbConnection->getAdminEmail($_SESSION['username']); ?>" name="newemail" type="text" id="newemailinput"/><br/>
				<label for="newpasswordinput">Nuova password:</label>
				<input name="newpassword" type="text" id="newpasswordinput"/><br/>
				<input type="submit" value="Modifica" name="submit"/>
				<input type="reset" value="Cancella i campi" name="reset"/>
			</fieldset>
		</form>
<?php
$dbConnection->closeDBConnection();
?>
	</div>
</body>
</html>

