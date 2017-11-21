<?php
//singleton
require_once('config.php');
if(!isset($conn))
{
	$conn = new mysqli($server, $user, $passwd, $database);
	if ($conn->connect_error)
		header('Location: errordb.xhtml');
	else
		$conn->query('SET NAMES utf8');
}
?>
