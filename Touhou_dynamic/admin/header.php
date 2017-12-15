<div id="subheader">
<div id="header">
	<div id="titolo">
		<h1>Touhou Project</h1>
		<div id="titoletto">Pannello di amministrazione</div>
	</div>
	<div id="skipmenu">
		<a href="#contenuto">Vai al contenuto</a>
	</div>
	<div id="menudiv">
		<ul id="menu">
		<?php
$links = array(
	// 	ATTENZIONE A NON ESAGERARE CON IL NUMERO DI PAGINE O SI ROVINA LO STILE
	// 	semmai sottomenù a tendina
			array(
				'nome'=>'Home',
				'link'=>'index.php'
			),
			array(
				'nome'=>'News',
				'link'=>'newsadmin.php'
			),
			array(
				'nome'=>'Aggiungi news',
				'link'=>'newsadd.php'
			),
			array(
				'nome'=>'Immagini',
				'link'=>'image.php'
			),
			array(
				'nome'=>'Commenti',
				'link'=>'commentadmin.php'
			),
			array(
				'nome'=>'Lista ban',
				'link'=>'banlist.php'
			),
			array(
				'nome'=>'Capitoli',
				'link'=>'chapters.php'
			),
			array(
				'nome'=>'Torna al sito',
				'link'=>'../'
			),
			array(
				'nome'=>'Logout',
				'link'=>'index.php?logout=true'
			)
			
		);
$percorso = explode('/', $_SERVER['SCRIPT_NAME']);
$pagina = end($percorso);
echo '<li id="menuvoice">Menu</li>';
foreach ($links as $link)
	if($link['link'] == $pagina)
		echo '<li class="disable">'.$link['nome'].'</li>';
	else
		echo '<li><a href="'.$link['link'].'">'.$link['nome'].'</a></li>';
					?>
		</ul> 
	</div>
</div>
</div>
