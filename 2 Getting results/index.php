<?php
// print_r(PDO::getAvailableDrivers());

try{
	$handler = new PDO('mysql:host=127.0.0.1;dbname=app', 'ifah', 'password');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	// echo $e->getMessage();
	die('Sorry, we are experiencing some difficulties.');
}

$query = $handler->query('SELECT * FROM guestbook');

/*while($r = $query->fetch()){
	echo $r['message'], '<br>';
}*/

//alternative to above
$r = $query->fetch();
echo '<pre>', print_r($r), '</pre>';