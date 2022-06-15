<?php
include('database.php');


$orderdate=$_POST['orderdate'];
$orderitems=$_POST['orderitems'];
$total=$_POST['total'];
$query="INSERT INTO `order`
	(OrderDate, OrderItems, Total) VALUES 
	('$orderdate', '$orderitems', '$total')";

$db->exec($query);
include('adminPage.php');

?>