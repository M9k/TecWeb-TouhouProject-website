<?php

session_start();
$returnpage = $_SERVER['HTTP_REFERER'];

unlink("../cached/lastrefreshsidebar");
unlink("../cached/sidebar");

header("Location: ".$returnpage);
die();
?>
