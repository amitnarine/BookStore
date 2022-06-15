<?php
include('database.php');

$name=$_POST['name'];
$author=$_POST['author'];
$ISBN=$_POST['ISBN'];
$price=$_POST['price'];
$image=$_POST['image'];
$ProductDescription=$_POST['ProductDescription'];
$category=$_POST['category'];

$query="INSERT INTO product 
	(Name, Author, ISBN, Price, Image, ProductDescription, Subject) VALUES 
	('$name', '$author', '$ISBN', '$price', '$image', '$ProductDescription','$category' )";

$db->exec($query);
include('ownerPage.php');

?>