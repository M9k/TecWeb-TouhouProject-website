<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<?php
session_start();

$wronglogin = false;
$wrongloginmessage = '<div id="wronglogin">Dati errati!</div>';

if (isset($_POST['email']) && isset($_POST['password']))
    if (strcmp($_POST['email'], 'admin') == 0 && strcmp($_POST['password'], 'admin') == 0)
        $_SESSION['login'] = true;
    else
        $wronglogin = true;
if (isset($_GET['logout']) && $_GET['logout'] == "true")
    $_SESSION['login'] = false;

if (isset($_SESSION['login']) && $_SESSION['login'] == true)
    $title = "Pannello di amministrazione";

else
    $title = "Login";
require('head.php');
?>
<body>
<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) require('header.php'); ?>
<div id="contenutoLogin">
    <?php
    if ($wronglogin)
        echo($wrongloginmessage);
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        ?>
    <div id="contenuto">
        <div id="wrapper">
        <h2>Benvenuto nell' area di amministrazione</h2>
        <p>Da questa parte del sito potrai gestire le notizie, le immagini caricate, i commenti ed i capitoli.</p>
    </div>
</div>
        <?php
    } else
        require('login.php'); ?>
</div>
</body>
</html>


