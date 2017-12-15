<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$returnpage = $_SERVER['HTTP_REFERER'];

$error = 'Utente non loggato!';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	require('../config.php');
	require('../getconnection.php');
	$risp = false;

	if(isset($_POST['btnDelete']))
	{
		unlink("../images/chapters/".($conn->query("SELECT * FROM chapters where ID = ". $_POST['btnDelete']))->fetch_assoc()['image']);
		
		$dbConnection = new DBAccess();
		$dbConnection->openDBConnection();
		$risp = $dbConnection->removeChapter($_POST['btnDelete']);
		if(!$risp)
			$error ='Errore nella eliminazione del capitolo, contattare una amministratore!';

		$dbConnection->closeDBConnection();
		header("Location: ".$returnpage);
		die();
	}
	else
		$error ='Nessuna richiesta effettuata';
}

//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>


