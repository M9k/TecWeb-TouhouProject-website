<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$returnpage = $_SERVER['HTTP_REFERER'];

$error = 'Utente non loggato!';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	require('../config.php');
	require('../getconnection.php');
	$risp = false;
	if(isset($_POST['title']) && isset($_POST['text']))
	{
		//EDIT o MODIFICA da effettuare
		$returnpage = explode("/",$returnpage);
		array_pop($returnpage);
		$returnpage = implode("/", $returnpage)."/newsadmin.php";

		if(isset($_POST['hidden']) && $_POST['hidden'] == true)	//evito SQLI
			$hidden = 1;
		else
			$hidden = 0;
		
		$image = mysqli_real_escape_string($conn, $_POST['image']);
		if(isset($_FILES["fileupload"])) //se c'è una immagine provo a caricarla e a impostarla
		{
			require('imageuploadfunction.php');
			$ris = imageupload("../images/news/", $_FILES["fileupload"]);
			if($ris['result'])
				$image = $ris['text'];
		}

		if(isset($_POST['id']))	//UPDATE
			$risp = $conn->query('UPDATE news set title="'.mysqli_real_escape_string($conn, $_POST['title']).'", image="'.$image.'", hidden="'.$hidden.'", imgdescr ="'.mysqli_real_escape_string($conn, $_POST['imgdescr']).'", text="'.mysqli_real_escape_string($conn, $_POST['text']).'" WHERE id='.mysqli_real_escape_string($conn, $_POST['id']));			
		else					//INSERT
			$risp = $conn->query('INSERT INTO news (title, image, hidden, text, imgdescr) VALUES ("'.mysqli_real_escape_string($conn, $_POST['title']).'", "'.$image.'", '.$hidden.', "'.mysqli_real_escape_string($conn, $_POST['text']).'", "'.mysqli_real_escape_string($conn, $_POST['imgdescr']).'")');	
	}
	if(isset($_POST['btnEdit']))
	{
		$returnpage = 'news.php';
		$risp = 1;
	}
	if(isset($_POST['btnDelete']))
		$risp = $conn->query('DELETE FROM news WHERE id='.mysqli_real_escape_string($conn, $_POST['btnDelete']));
	if(isset($_POST['btnShow']))
		$risp = $conn->query('UPDATE news SET hidden=0 WHERE id='.mysqli_real_escape_string($conn, $_POST['btnShow']));
	if(isset($_POST['btnHide']))
		$risp = $conn->query('UPDATE news SET hidden=1 WHERE id='.mysqli_real_escape_string($conn, $_POST['btnHide']));
	if($risp != 1)
		$error ='Errore nel database: '.$conn->error;
	else
	{
		header("Location: ".$returnpage);
		die();
	}
}

//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

