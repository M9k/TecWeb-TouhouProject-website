<?php
session_start();

$returnpage = $_SERVER['HTTP_REFERER'];
$error = '';

if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
	require_once('../getconnection.php');
	$risp = false;
	$idpost = -1;
	if(isset($_POST['delete']) && is_numeric($_POST['delete']))
		$idpost = $_POST['delete']*1;
	if(isset($_POST['ban']) && is_numeric($_POST['ban']))
		$idpost = $_POST['ban']*1;
	if($idpost == -1)
		$error = 'post invalido';
	else
	{
		//banno
		$motivo = 'non specificato';
		if(isset($_POST['reason']))
			$motivo = mysqli_real_escape_string($conn, $_POST['reason']);
		if(isset($_POST['ban']))
		{
			$checkip = $conn->query('SELECT ip FROM comment where id = '.$idpost);
			if(isset($checkip) && strcmp($checkip->fetch_assoc()['ip'],'unknow') != 0)
				$risp = $conn->query('INSERT INTO ban (ip, motivo) SELECT ip, \''.$motivo.'\' FROM comment where id = '.$idpost);
		}

		//elimino il commento
		if(isset($_POST['delete']) || isset($_POST['ban']))
			$risp = $conn->query('DELETE FROM comment where id='.$idpost);

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

