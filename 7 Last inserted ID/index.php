<?php
// print_r(PDO::getAvailableDrivers());

try{
	$handler = new PDO('mysql:host=127.0.0.1;dbname=app', 'ifah', 'password');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	// echo $e->getMessage();
	die('Sorry, we are experiencing some difficulties.');
}


$name = 'Smith';
$message = 'Test Smith';

$sql = "INSERT INTO guestbook (name, message, posted) VALUES (?, ?, NOW())";
$query = $handler->prepare($sql);

$query->execute(array($name, $message));

echo $handler->lastInsertId();