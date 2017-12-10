<?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }
$returnpage = $_SERVER['HTTP_REFERER'];
$error = '';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	$ok = true;
	$folder = "../images/news/";

	// controllo il nome non sia già usato
	if (!file_exists($folder.$_POST["btnDelete"]))
		$error = 'Il file non esiste';
	// controllo non ci siano .. o /
	if (strrpos($_POST["btnDelete"], '..') != false || strrpos($_POST["btnDelete"], '/') != false)
		$error = 'Il nome contiene caratteri non accettati per motivi di sicurezza, come .. o /';
	if (strcmp("", $error) == 0)
		if (unlink($folder.$_POST["btnDelete"]))
		{
			header("Location: ".$returnpage);
			die();
		}
		else
			$error = 'Errore di cancellazione';
}
else
	$error = "non hai i permessi per compiere questa azione";

//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

