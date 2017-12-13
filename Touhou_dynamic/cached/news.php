<?php require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."dbConnection.php";

$contenuto = '';
$update = false;
$path_lastRefreshSidebar = 'cached'.DIRECTORY_SEPARATOR.'sidebar';
$path_sidebar = 'cached'.DIRECTORY_SEPARATOR.'sidebar';
$lastrefresh = @fopen($path_lastRefreshSidebar, 'r');
if(file_exists($path_sidebar))
	$contenuto = file_get_contents($path_sidebar);
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
	$dbConnection = new DBAccess();
	$dbConnection->openDBConnection();
	$news = $dbConnection->getListNews(false, 300, 3);
	if($news != null)
	{
		$contenuto = '<dl id="articleside">';

		foreach($news as $notizia)
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

	$dbConnection->closeDBConnection();
	
	//stampo a video
	echo($contenuto);

	//salvo sul file - uso " per le path con gli spazi
	file_put_contents($path_sidebar, $contenuto);
	//aggiorno la data
	file_put_contents($path_lastRefreshSidebar, time());
}
?>
