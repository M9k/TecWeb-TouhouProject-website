<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$error = null;
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


		$dbConnection = new DBAccess();
		$dbConnection->openDBConnection();

		if(isset($_POST['submit']) && $_POST['submit'] == "Aggiungi")
		{
			//AGGIUNTA
			if(isset($_POST['username']) && strcmp($_POST['username'],"") != 0 && isset($_POST['email']) && strcmp($_POST['email'],"") != 0 && isset($_POST['password']) && strcmp($_POST['password'],"") != 0)
			{
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		 			$error = 'L\'<span xml:lang="en">e-mail</span> non è nel formato corretto, si prega di ricontrollarla.';
				else
				{
					if(! $dbConnection->insertAdmin($_POST['username'], $_POST['email'], $_POST['password']))
					{
						$error = "Errore durante l'inserimento dell'utente, controllare che l'username sia univoco";
					}
					else
					$error = "Alcuni campi indicati sono stati lasciati vuoti!";
				}
			}
		}
		else if(isset($_POST['submit']) && $_POST['submit'] == "Modifica")
		{
			if(isset($_POST['newemail']) && strcmp($_POST['newemail'],"") != 0 && isset($_POST['newpassword']))
			{
				if(!filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL))
		 			$error = 'L\'<span xml:lang="en">e-mail</span> non è nel formato corretto, si prega di ricontrollarla.';
				else
				{
					//MODIFICA
					if(! $dbConnection->changeAdminData($_SESSION['username'], $_POST['newemail'], $_POST['newpassword']))
					{
						$error = "Errore durante la modifica dei dati, per favore contattare un amministratore!";
					}
					else
						$error = "Alcuni campi indicati sono stati lasciati vuoti!";
				}
			}
		}
		else
		{
			//ELIMINAZIONE
			//TODO

		}

		$dbConnection->closeDBConnection();
	}
	else
		$error = "Utente non loggato o sessione scaduta, per favore riesegui il login!";
if($error == null)
{
	header("Location: gestioneamministratori.php");
	die();
}

//trasferisco alla pagina di errore
$_SESSION['error'] = $error;
header("Location: error.php");
die();
?>

