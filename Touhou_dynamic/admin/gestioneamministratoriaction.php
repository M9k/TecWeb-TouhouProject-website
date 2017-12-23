<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$returnpage = $_SERVER['HTTP_REFERER'];

$error = 'Utente non loggato!';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	$risp = false;


/*
insertAdmin($user, $email, $password) 
removeAdmin($username) 
changeAdminData($user, $newEmail, $newPassword)
getAdminEmail($user)
getListAdminsData($excludeUser)
 */


	if(isset($_POST['number']) && isset($_POST['year']) && isset($_POST['title']) && isset($_POST['titleeng']) && isset($_POST['titleita']) && isset($_POST['plot']))
	{		//INSERT
		$image = false;
		$ris = false;
		if(isset($_FILES["fileupload"])) //se c'è una immagine provo a caricarla e a impostarla
		{
			require('imageuploadfunction.php');
			$ris = imageupload("../images/chapters/", $_FILES["fileupload"]);
			if($ris['result'])
				$image = $ris['text'];
		}
		if($image != false)
		{
			if(isset($_POST['imagedescr']))
				$imagedescr  = mysqli_real_escape_string($conn, $_POST['imagedescr']);
			else
				$imagedescr = "";
			
			$dbConnection = new DBAccess();
			$dbConnection->openDBConnection();
			$risp = $dbConnection->insertChapter($_POST['number'], $_POST['year'], $_POST['title'], $image, $imagedescr, $_POST['titleeng'], $_POST['titleita'], $_POST['plot']);
			if(!$risp)
			{
				$error = "Errore durante il collegamento al database, contattare un amministratore";
				unlink("../images/chapters/".$image);
			}
			$dbConnection->closeDBConnection();
		}
		else
			$error = $ris['text'];
	}
	else
		$error = "Errore durante l'inserimento, controllare di avere compilato tutti i campi";
	if($risp != false)
	{
		header("Location: chapters.php");
		die();
	}
}
//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

