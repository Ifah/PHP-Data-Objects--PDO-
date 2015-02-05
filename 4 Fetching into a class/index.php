<?php
// print_r(PDO::getAvailableDrivers());

try{
	$handler = new PDO('mysql:host=127.0.0.1;dbname=app', 'ifah', 'password');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	// echo $e->getMessage();
	die('Sorry, we are experiencing some difficulties.');
}

class GuestbookEntry{
	public $id, $name, $message, $posted, $entry;

	public function __construct(){
		$this->entry = "{$this->name} posted: {$this->message}";
	}
}


$query = $handler->query('SELECT * FROM guestbook');

//Set fetch mode
$query->setFetchMode(PDO::FETCH_CLASS, 'GuestbookEntry');
while($r = $query->fetch()){
	// echo '<pre>', print_r($r), '</pre>';
	echo $r->entry, '<br>';
}