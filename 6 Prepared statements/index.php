<?php
// print_r(PDO::getAvailableDrivers());

try{
	$handler = new PDO('mysql:host=127.0.0.1;dbname=app', 'ifah', 'password');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	// echo $e->getMessage();
	die('Sorry, we are experiencing some difficulties.');
}



/*
$sql = "INSERT INTO guestbook (name, message, posted) VALUES ('TEst', 'test message', NOW())";
$handler->query($sql);
*/



//alternative to above
/*$name = 'Dale';
$message = 'Test Dale';

$sql = "INSERT INTO guestbook (name, message, posted) VALUES (:name, :message, NOW())";
$query = $handler->prepare($sql);

$query->execute(array(
	':name' => $name,
	':message' => $message
));
*/



//alternative to above
$name = 'Ash';
$message = 'Test Ash';

$sql = "INSERT INTO guestbook (name, message, posted) VALUES (?, ?, NOW())";
$query = $handler->prepare($sql);

$query->execute(array($name, $message));