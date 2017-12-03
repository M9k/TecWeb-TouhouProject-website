<?php
session_start();

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

		$risp = $conn->query('DELETE FROM chapters WHERE id='.mysqli_real_escape_string($conn, $_POST['btnDelete']));
		if($risp != 1)
			$error ='Errore nel database: '.$conn->error;

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


