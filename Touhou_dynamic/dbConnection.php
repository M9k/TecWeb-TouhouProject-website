<?php
setlocale(LC_TIME, "it_IT");

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

	private function removeSQLI($string) {
		return mysqli_real_escape_string($this->connection, $string);
	}

	private function showError()
	{
		header('Location: errordb.xhtml');
		die();
	}

	private function runQueryAndGetAll($query)
	{
		$result = mysqli_query($this->connection, $query) or $this->showError();
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
	private function runQueryAndGetAssoc($query)
	{
		return mysqli_fetch_assoc(mysqli_query($this->connection, $query));
	}

	public function adminLogIn($username, $password) {
		$query = 'SELECT password FROM admins WHERE '.
			'username = "'.$this->removeSQLI($username).'"';
		$result = mysqli_query($this->connection, $query) or $this->showError();
		$dataDB = mysqli_fetch_row($result);
		return password_verify($password, $dataDB[0]);
	}
       	 
	public function getListChapters() {
		return $this->runQueryAndGetAll('Select * from chapters order by year');
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
			$query.= ' LIMIT '.$this->removeSQLI($entryLimit);
		if($entryLimit != false && $fromEntry != false) //prendo da TOT per TOT		
			$query.= ' LIMIT '.$this->removeSQLI($fromEntry).', '.$this->removeSQLI($entryLimit);
		return $this->runQueryAndGetAll($query);
	}

	public function getListAdminsData($excludeUser)
	{

	}

	public function getAdminEmail($user)
	{

	}

	public function changeAdminData($user, $newEmail, $newPassword)
	{

	}

	public function getListComments($idNews, $limit=false, $reverseOrder=false) {
		$query = 'Select * from comment';
		if($idNews != null)
			$query .= ' where news_id = '.$this->removeSQLI($idNews);
		if($limit != false)
			$query.= ' order by data asc';
		else
			$query.= ' order by data desc';
		if($limit != false)
			$query.= ' limit '.$limit;
		return $this->runQueryAndGetAll($query);
	}

	public function getListBan() {
		return $this->runQueryAndGetAll('Select * from ban order by date desc');
	}

	public function getNumberNews($withHidden = false) {
		$query = 'Select * from news ';
	   	if(!$withHidden)
			$query.= 'where hidden = false';
		$result = mysqli_query($this->connection, $query) or $this->showError();
		return mysqli_num_rows($result);
	}
	
	public function getIpFromComment($idpost) {
		$query = 'SELECT ip FROM comment where id = '.
			$this->removeSQLI($idpost);
		$result = $this->runQueryAndGetAssoc($query) or $this->showError();
		return $result['ip'];
	}


	public function getArticle($id) {
		return $this->runQueryAndGetAssoc('Select * from news where id='.$this->removeSQLI($id));
	}
	
	public function removeBan($id) {
		$query = 'delete from ban where id='.$this->removeSQLI($id);
		return mysqli_query($this->connection, $query) or $this->showError();
	}
	public function removeChapter($id) {
		$query = 'delete from chapters where id='.$this->removeSQLI($id);
		return mysqli_query($this->connection, $query) == 1;
	}
	public function removeNews($id) {
		$query = 'delete from news where id='.$this->removeSQLI($id);
		return mysqli_query($this->connection, $query) == 1;
	}
	public function removeComment($id) {
		$query = 'delete from comment where id='.$this->removeSQLI($id);
		return mysqli_query($this->connection, $query) == 1;
	}
	public function removeAdmin($username) {
	//	$query = 'delete from comment where id='.$this->removeSQLI($id);
	//	return mysqli_query($this->connection, $query) == 1;
	}

	public function insertComment($name, $email, $message, $id, $ip) {
		$query = 'INSERT INTO comment (nick, email, message, news_id, ip) VALUES (\''.
			htmlentities($this->removeSQLI($name)).'\',\''.
			htmlentities($this->removeSQLI($email)).'\',\''.
			htmlentities($this->removeSQLI($message)).'\','.
			$this->removeSQLI($id).', "'.
			$this->removeSQLI($ip).'")';
		return mysqli_query($this->connection, $query) == 1;
	}

	public function insertChapter($number, $year, $title, $image, $imagedescr, $titleeng, $titleita, $plot) {
		$query = 'INSERT INTO chapters (number, year, title, image, imagedescr, titleeng, titleita, plot) VALUES ("'.
			$this->removeSQLI($number).'", "'.
			$this->removeSQLI($year).'", "'.
			$this->removeSQLI($title).'", "'.
			$image.'", "'.
			$imagedescr.'", "'.
			$this->removeSQLI($titleeng).'", "'.
			$this->removeSQLI($titleita).'", "'.
			$this->removeSQLI($plot).'")';
		return mysqli_query($this->connection, $query);
	}

	public function insertNews($title, $image, $hidden, $text, $imgdescr) {
		$query = 'INSERT INTO news (title, image, hidden, text, imgdescr) VALUES ("'.
			$this->removeSQLI($title).'", "'.
			$image.'", '.
			$hidden.', "'.
			$this->removeSQLI($text).'", "'.
			$this->removeSQLI($imgdescr).'")';
		return mysqli_query($this->connection, $query) == 1;
	}
	public function insertAdmin($user, $email, $password) {
	/*	$query = 'INSERT INTO news (title, image, hidden, text, imgdescr) VALUES ("'.
			$this->removeSQLI($title).'", "'.
			$image.'", '.
			$hidden.', "'.
			$this->removeSQLI($text).'", "'.
			$this->removeSQLI($imgdescr).'")';
	return mysqli_query($this->connection, $query) == 1;*/
	}

	public function insertBan($ip, $reason) {
		$query = 'INSERT INTO ban (ip, motivo) VALUES (\''.
			$this->removeSQLI($ip).'\', \''.
			$this->removeSQLI($reason).'\')';
		return mysqli_query($this->connection, $query) == 1;
	}

	public function updateNewsVisibility($id, $hidden) {
		if($hidden == true)
			$hiddenbinary = 1;
		else
			$hiddenbinary = 0;
		$query = 'UPDATE news SET hidden='.
			$hiddenbinary.' WHERE id='.
			$this->removeSQLI($id);
		return mysqli_query($this->connection, $query) == 1;
	}

	public function updateNews($title, $image, $hidden, $text, $imgdescr, $id) {
		$query = 'UPDATE news set title="'.
			$title.'", image="'.
			$image.'", hidden="'.
			$hidden.'", imgdescr ="'.
			$this->removeSQLI($imgdescr).'", text="'.
			$this->removeSQLI($text).'" WHERE id='.
			$this->removeSQLI($id);
		return mysqli_query($this->connection, $query) == 1;
	}

	public function checkBannedIp($ip) {
		return (mysqli_query($this->connection, 'SELECT * FROM ban WHERE ip = '.$this->removeSQLI($ip)) >= 1);
	}

	public function closeDBConnection() {
		mysqli_close($this->connection);
	}
}

?>
