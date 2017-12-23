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

$title = "Gestione amministratori - Touhou Italia";

require('head.php');
?>
	<body>
		<?php require('header.php'); ?>
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
	echo '<form class="listadmins" action="gestioneamministratoriaction.php" method="post"><fieldset class="listadminsfield">'.
		'<ul>';
	foreach($administrators as $administrator)
		echo '<li>'.$administrator['username']." - ".$administrator['email'].' <button name="btnDelete" value="'.$administrator['username'].'">Elimina</button></li>';
	echo '</ul>'.
		'</filedset></form>';
}
else
	echo '<div id="nodata">Nessun amministratore aggiuntivo presente</div>';
?>
<h3>Inserimento amministratore</h3>
<form id="addadmin" action="gestioneamministratoriaction.php" method="post">
	<fieldset id="addadminfield">
		<label for="usernameinput">Nome utente:</label> <input name="username" type="text" id="usernameinput"/><br/>
		<label for="emailinput">Email:</label> <input name="email" type="text" id="emailinput"/><br/>
		<label for="passwordinput">Password:</label> <input name="password" type="text" id="passwordinput"/><br/>
		<input type="submit" value="Aggiungi" name="submit"/> <input type="reset" value="Cancella i campi" name="reset"/>
	</fieldset>
</form>
<h3>Modifica propri dati</h3>
<form id="editaccountinfo" action="gestioneamministratoriaction.php" method="post">
	<fieldset id="editaccountinfofield">
	<label for="newemailinput">Email:</label> <input value="<?php $dbConnection->getAdminEmail($_SESSION['username']); ?>" name="newemail" type="text" id="newemailinput"/><br/>
		<label for="newpasswordinput">Nuova password:</label> <input name="newpassword" type="text" id="newpasswordinput"/><br/>
		<input type="submit" value="Modifica" name="submit"/> <input type="reset" value="Cancella i campi" name="reset"/>
	</fieldset>
</form>
<?php
$dbConnection->closeDBConnection();
?>
		</div>
	</body>
</html>

