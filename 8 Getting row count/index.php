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

/*
$results = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($results);
*/

if($query->rowCount()){
	// echo 'Results';
	// echo $query->rowCount();
	while($r = $query->fetch(PDO::FETCH_OBJ)){
		echo $r->message, '<br>';
	}

}else{
	echo 'No results';
}