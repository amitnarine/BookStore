<?php
include('database.php');
$ordernum=$_POST['ordernum'];

$query="DELETE FROM `order` WHERE OrderNum = '$ordernum'";
$db->exec($query);
include('adminPage.php');

?>