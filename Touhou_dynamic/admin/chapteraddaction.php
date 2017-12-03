<?php
session_start();

$returnpage = $_SERVER['HTTP_REFERER'];

$error = 'Utente non loggato!';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{

	



	require('../config.php');
	require('../getconnection.php');
	$risp = false;

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

			$risp = $conn->query('INSERT INTO chapters (number, year, title, image, imagedescr, titleeng, titleita, plot) VALUES ("'
				.mysqli_real_escape_string($conn, $_POST['number']).'", "'
				.(1*mysqli_real_escape_string($conn, $_POST['year'])).'", "'
				.mysqli_real_escape_string($conn, $_POST['title']).'", "'
				.$image.'", "'
				.$imagedescr.'", "'
				.mysqli_real_escape_string($conn, $_POST['titleeng']).'", "'
				.mysqli_real_escape_string($conn, $_POST['titleita']).'", "'
				.mysqli_real_escape_string($conn, $_POST['plot']).'")');

			if(!$risp)
			{
				$error = "Errore durante il collegamento al database, contattare un amministratore";
				unlink("../images/chapters/".$image);
			}
		}
		else
			$error = $ris['text'];
	}
	else
		$error = "Errore durante l'inserimento, controllare di avere compilato tutti i campi";
	if($risp != false)
	{
		header("Location: chapteradmin.php");
		die();
	}
}
//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

