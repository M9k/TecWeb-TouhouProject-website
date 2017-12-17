<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$wronglogin = false;
$wrongloginmessage = '<div id="wronglogin">Dati errati!</div>';

if(isset($_POST['email']) && isset($_POST['password']))
if(strcmp($_POST['email'],'admin') == 0 && strcmp($_POST['password'],'admin') == 0 )
$_SESSION['login'] = true;
else
$wronglogin = true;
if(isset($_GET['logout']) && $_GET['logout'] == "true")
{
	$_SESSION['login'] = false;
	header("Location: ..");
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
			<h2>Benvenuto nell’area di amministrazione di Touhou Project</h2>
			<p>In quest’ area potrai gestire, aggiornare e monitorare alcune parti del sito.</p>

			<h2>News e Aggiungi News</h2>
			<p>In queste due pagine si ha la possibilità di:</p>
			<ul>
				<li>aggiungere news</li>
				<li>cancellare la cache delle news per la sidebar</li>
				<li>cancellare la news</li>
				<li>modificare la news</li>
				<li>impostare la news come bozza</li>
			</ul>

			<h2>Immagini</h2>
			<p>In questa sezione è possibile fare l’upload di nuove immagini o rimuoverle dal sito.</p>

			<h2>Commenti e Lista Ban</h2>
			<p>Nella sezione commenti è presente una lista di tutti i commenti presenti nel sito. E’ possibile bannare un utente, specificandone il motivo (se desiderato) e conseguentemente eliminare il commento oppure eliminare solo il commento.</p>
			<p>Nella pagina Lista Ban invece troviamo un elenco di tutti i Ban e la possibilità di eliminarli</p>

			<h2>Capitoli</h2>
			<p>La pagina dei capitoli elenca tutti i capitoli presenti, permette di aggiungerne di nuovi o di eliminare singolarmente un capitolo.</p>

			<p>Infine puoi ritornare al sito rimanendo loggato all’Area amministrativa o fare Logout.</p>
			<?php
		}
		else
		require('login.php'); ?>
	</div>
</body>
</html>
