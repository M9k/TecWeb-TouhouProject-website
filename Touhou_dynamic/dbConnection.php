<?php

class DBAccess {

	const HOST_DB = 'localhost';
	const USER = 'root';
	const PASSWD = '';
	const DATABASE = 'newstest';

	public $connection;
	public function openDBConnection() {
		$this->connection = mysqli_connect(static::HOST_DB, static::USER, static::PASSWD, static::DATABASE);
		if(!$this->connection)
			showError();
		else
			mysqli_query($this->connection, 'SET NAMES utf8');	
	}
	private function showError()
	{
		header('Location: errordb.xhtml');
		die();
	}

	public function getListChapters() {
		$query = 'Select * from chapters order by year';
		$result = mysqli_query($this->connection, $query) or showError();
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public function getListNews($withHidden = false, $charLimit = false, $entryLimit = false, $fromEntry = false ) {
		$query = 'Select id, title, image, imgdescr, data, hidden, ';
	   	if($charLimit != false)
			$query.= ' CONCAT(SUBSTRING(text, 1, 300), "...") as text ';
		else
			$query.= ' text ';
		$query.= ' from news ';
	   	if(!$withHidden)
			$query.= 'where hidden = false ';
		$query.= ' ORDER BY data desc ';
		if($entryLimit != false && $fromEntry == false) //prendo i primi TOT		
			$query.= ' LIMIT '.$entryLimit;
		if($entryLimit != false && $fromEntry != false) //prendo da TOT per TOT		
			$query.= ' LIMIT '.$fromEntry.', '.$entryLimit;
		$result = mysqli_query($this->connection, $query) or showError();
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
	
	public function getListComments($idNews, $limit=false) {
		$query = 'Select nick, message from comment where news_id='.$idNews;
		if($limit != false)
			$query.= ' limit '.$limit;
		$result = mysqli_query($this->connection, $query) or showError();
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public function getNumberNews($withHidden = false) {
		$query = 'Select * from news ';
	   	if(!$withHidden)
			$query.= 'where hidden = false';
		$result = mysqli_query($this->connection, $query) or showError();
		return mysqli_num_rows($result);
	}
	public function getArticle($id) {
		$query = 'Select id, title, image, imgdescr, data, text from news where id='.$id;
		$result = mysqli_query($this->connection, $query) or showError();
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}

	public function closeDBConnection() {
		mysqli_close($this->connection);
	}
}

?>
