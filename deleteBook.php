<?php
include('database.php');
$idbook=$_POST['product_id'];

$query="DELETE FROM product WHERE ProductID = '$idbook'";
$db->exec($query);
include('adminPage.php');

?>