<?php

$contenuto = '';
$update = false;
$lastrefresh = @fopen('cached/lastrefreshsidebar', 'r');
if(file_exists('cached/sidebar'))
	$contenuto = file_get_contents('cached/sidebar');
$seconds = 0;
if($lastrefresh == false || strcmp($contenuto, '') == 0)
	$update = true;
else
	fscanf($lastrefresh, '%u', $seconds);
$seconds = time() - $seconds;
if($seconds >= 60*10)	//10 minuti
	$update = true;
if($lastrefresh != false)
	fclose($lastrefresh);

if(!$update)
	echo($contenuto);
else
{
	require_once('getconnection.php');
	//$conn = connessione al DB

	$risp = $conn->query('Select id, title, image, imgdescr, data, hidden, CONCAT(SUBSTRING(text, 1, 300), "...") as text from news where hidden=false ORDER BY data desc LIMIT 4');
	if($risp != false)
	{
		$contenuto = '<dl id="articleside">';
		while($notizia = $risp->fetch_assoc()) 
		{
			$contenuto .= '<dt><a href="article.php?id='.$notizia['id'].'">'.$notizia['title'].'</a></dt>';
			$contenuto .= '<dd>';
			if(isset($notizia['image']) && strcmp($notizia['image'], "") != 0)
				$contenuto .= '<img class="newsimageside" src="images/news/'.$notizia['image'].'" alt="'.$notizia['imgdescr'].'"/>';
			$contenuto .= '<div class="newsdataside">'.strftime('%e %B %Y',strtotime($notizia['data'])).'</div><div class="newstextside">'.$notizia['text'].'</div></dd>';
		}
		$contenuto .= '</dl>';
	}
	else
		$contenuto = '<p id="errorarticleside">Nessun articolo disponibile</p>';
	echo($contenuto);
	//salvo sul file
	file_put_contents('cached/sidebar', $contenuto);
	//aggiorno la data
	file_put_contents('cached/lastrefreshsidebar', time());
}
?>
