<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php 
session_start();

$wronglogin = false;
$wrongloginmessage = '<div id="wronglogin">Dati errati!</div>';

if(isset($_POST['email']) && isset($_POST['password']))
	if(strcmp($_POST['email'],'admin') == 0 && strcmp($_POST['password'],'admin') == 0 )
		$_SESSION['login'] = true;
	else
		$wronglogin = true;
if(isset($_GET['logout']) && $_GET['logout'] == "true")
		$_SESSION['login'] = false;

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
				echo ('<div id="logoutbutton">');
				require('logout.php');
				echo ('</div>');
				echo ('<div id="motd">Benvenuto nella pagina di amministrazione!</div>');
				echo('PANNELLO ADMIN');
			}
			else
				require('login.php'); ?>
		</div>
	</body>
</html>


