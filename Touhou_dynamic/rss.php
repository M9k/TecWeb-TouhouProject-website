<?php 
	$website = "localhost/tecweb/Touhou2";
	 header("Content-Type: application/rss+xml; charset=UTF-8");
?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
    <channel>
        <title>Touhou Italia RSS</title>
        <description>Touhou Italia RSS - news</description>
		<link>http://<?php echo($website); ?></link>
		<language>it</language>
		<atom:link href="<?php echo($website.'/rss');?>" rel="self" type="application/rss+xml"/>
<?php
	require('getconnection.php');
	$risp = $conn->query('Select id, title, image, data, CONCAT(SUBSTRING(text, 1, 500), "...") as descr from news where hidden=false ORDER BY data desc LIMIT 50');
	while($notizia = $risp->fetch_assoc()) 
	{
		echo '<item>';
		echo '	<title>'.$notizia['title'].'</title>';
		echo '	<link>http://'.$website.'/article?id='.$notizia['id'].'</link>';
		echo '	<description>'.$notizia['descr'].'</description>';
		echo '	<pubDate>'.date("D, d M Y H:i:s O", strtotime($notizia['data'])).'</pubDate>';
		echo '</item>';
	}
	?>
    </channel>
</rss>

