<div id="subheader">
<div id="header">
	<div id="titolo">
		<h1>Touhou Project</h1>
		<div id="titoletto">Sito di informazione italiano</div>
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
				'nome'=>'<span xml:lang="en">Home</span>',
				'link'=>'index.php'
			),
			array(
				'nome'=>'<span xml:lang="en">News</span>',
				'link'=>'news.php'
			),
			array(
				'nome'=>'<span xml:lang="en">Gameplay</span>',
				'link'=>'gameplay.php'
			),
			array(
				'nome'=>'Sviluppo',
				'link'=>'sviluppo.php'
			),
			array(
				'nome'=>'Popolarità',
				'link'=>'popolarita.php'
			),
			array(
				'nome'=>'Personaggi',
				'link'=>'personaggi.php'
			),
			array(
				'nome'=>'Capitoli',
				'link'=>'capitoli.php'
			)
		);
$percorso = explode('/', $_SERVER['SCRIPT_NAME']);
$pagina = end($percorso);
echo '<li id="menuvoice">Menu</li>';
foreach ($links as $link)
	if($link['link'] == $pagina)
		echo '<li class="disable">'.$link['nome'].'</li> ';
	else
		echo '<li><a href="'.$link['link'].'">'.$link['nome'].'</a></li> ';
					?>
		</ul> 
	</div>
</div>
</div>
