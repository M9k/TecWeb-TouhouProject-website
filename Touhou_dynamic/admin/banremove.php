<?php
session_start();

$returnpage = $_SERVER['HTTP_REFERER'];
$error = '';

if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	if(!isset($_POST['banremove']))
		$error = 'Non è stato indicato l\'ip';
	else
	{
		require_once('../getconnection.php');
		//elimino il ban
		$risp = $conn->query('DELETE FROM ban where ip='.$_POST['banremove']);

		if($risp != 1)
			$error ='Errore durante la richiesta al database';
	}
}
else
	$error = 'Utente non loggato!';

if(strcmp('', $error) == 0)
{
	header("Location: ".$returnpage);
	die();
}

//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

