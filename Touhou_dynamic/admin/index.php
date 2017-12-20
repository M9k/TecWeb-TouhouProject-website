<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php"; 

if (session_status() == PHP_SESSION_NONE) { session_start(); }

$wronglogin = false;
$wrongloginmessage = '<div id="wronglogin">Dati errati!</div>';

$dbConnection = new DBAccess();
$dbConnection->openDBConnection();

if(isset($_POST['email']) && isset($_POST['password']))
if($dbConnection->adminLogIn( $_POST['email'], $_POST['password'])) //linea dove avviene il controllo accesso
	$_SESSION['login'] = true;
else
$wronglogin = true;
if(isset($_GET['logout']) && $_GET['logout'] == "true")
{
	$_SESSION['login'] = false;
	header("Location: ../index.php");
	die();
}
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
$title = "Pannello di amministrazione";

else
$title = "Login";
require('head.php');
?>
<body>
	<?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) require('header.php'); ?>
	<div id="contenuto">
		<?php
		if($wronglogin)
		echo($wrongloginmessage);
		if(isset($_SESSION['login']) && $_SESSION['login'] == true)
		{
			?>
			<h2>Benvenuto nell’area di amministrazione</h2>
			<p>In quest’ area potrai gestire, aggiornare e monitorare alcune parti del sito.</p>

			<h2><span lang="en">News</span> e Aggiungi <span lang="en">News</span></h2>
			<p>In queste due pagine si ha la possibilità di:</p>
			<ul>
				<li>aggiungere <span lang="en">news</span></li>
				<li>cancellare la <span lang="en">cache</span> delle <span lang="en">news</span> per la <span lang="en">sidebar</span></li>
				<li>cancellare la <span lang="en">news</span></li>
				<li>modificare la <span lang="en">news</span></li>
				<li>impostare la <span lang="en">news</span> come bozza</li>
			</ul>

			<h2>Immagini</h2>
			<p>In questa sezione è possibile fare l’<span lang="en">upload</span> di nuove immagini o rimuoverle dal sito.</p>

			<h2>Commenti e Lista Ban</h2>
			<p>Nella sezione commenti è presente una lista di tutti i commenti presenti nel sito. E’ possibile bannare un utente, specificandone il motivo (se desiderato) e conseguentemente eliminare il commento oppure eliminare solo il commento.</p>
			<p>Nella pagina Lista Ban invece troviamo un elenco di tutti i Ban e la possibilità di eliminarli</p>

			<h2>Capitoli</h2>
			<p>La pagina dei capitoli elenca tutti i capitoli presenti, permette di aggiungerne di nuovi o di eliminare singolarmente un capitolo.</p>

			<p>Infine puoi ritornare al sito rimanendo loggato all’Area amministrativa o fare <span lang="en">Logout</span>.</p>
			<?php
		}
		else
		require('login.php'); ?>
	</div>
</body>
</html>
