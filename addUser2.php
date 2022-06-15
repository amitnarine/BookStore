<?php
include('database.php');

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$birthdate=$_POST['birthdate'];
$address=$_POST['address'];
$type=$_POST['type'];
$query="INSERT INTO user
	(Username, Email, Birthdate, Address, Password, type) VALUES 
	('$username', '$email', '$birthdate', '$address', '$password', '$type'  )";

$db->exec($query);
include('adminPage.php');

?>