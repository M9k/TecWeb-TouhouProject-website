<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$returnpage = $_SERVER['HTTP_REFERER'];

$error = 'Utente non loggato!';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	$dbConnection = new DBAccess();
	$dbConnection->openDBConnection();
	$risp = false;

	//Inserimento o modfica da effettuare
	if(isset($_POST['title']) && isset($_POST['text']))
	{
		$returnpage = "news.php";

		if(isset($_POST['hidden']) && $_POST['hidden'] == true)
			$hidden = 1;
		else
			$hidden = 0;
		
		$image = $_POST['image'];
		if(isset($_FILES["fileupload"])) //se c'è una immagine provo a caricarla e a impostarla
		{
			require('imageuploadfunction.php');
			$ris = imageupload("../images/news/", $_FILES["fileupload"]);
			if($ris['result'])
				$image = $ris['text'];
		}

		//Modifica
		if(isset($_POST['id']))
			$risp = $dbConnection->updateNews($_POST['title'], $image, $hidden,  $_POST['text'], $_POST['imgdescr'], $_POST['id']);
		//Inserimento		
		else
			$risp = $dbConnection->insertNews($_POST['title'], $image, $hidden,  $_POST['text'], $_POST['imgdescr']);
	}
	//Vai alla pagina di edit
	if(isset($_POST['btnEdit']))
	{
		$returnpage = 'newsadd.php?id='.$_POST['btnEdit'];
		$risp = 1;
	}
	//Elimina
	if(isset($_POST['btnDelete']))
		$risp = $dbConnection->removeNews($_POST['btnDelete']);
	//Rendi visibile
	if(isset($_POST['btnShow']))
		$risp = $dbConnection->updateNewsVisibility($_POST['btnShow'], false);
	//Sposta in bozze
	if(isset($_POST['btnHide']))
		$risp = $dbConnection->updateNewsVisibility($_POST['btnHide'], true);

	
	$dbConnection->closeDBConnection();

	//Se è avvenuto un errore
	if($risp != true)
		$error ='Errore durante lo svolgimento dell\'operatione!';
	//Altrimenti ridireziono verso la prossima pagina
	else
	{
		header("Location: ".$returnpage);
		die();
	}
}

//Trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

