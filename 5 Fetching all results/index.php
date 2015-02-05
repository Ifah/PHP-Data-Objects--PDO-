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

// echo '<pre>', print_r($query->fetchAll(PDO::FETCH_ASSOC)), '</pre>';

//ALTERNATIVE TO ABOVE
$results = $query->fetchAll(PDO::FETCH_ASSOC);
if(count($results)){
	echo 'There are results';
}else{
	echo 'No results';
}