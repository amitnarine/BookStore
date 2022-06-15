<?php
include('database.php');
$OrderNum=$_POST['OrderNum'];
$orderdate=$_POST['orderdate'];
$orderitems=$_POST['orderitems'];
$total=$_POST['total'];


$query="UPDATE `order` SET OrderDate = '$orderdate', OrderItems = '$orderitems', Total = '$total' WHERE OrderNum = '$OrderNum'";
$db->exec($query);

include('adminPage.php');

?>