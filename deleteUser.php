<?php
include('database.php');
$iduser=$_POST['user_id'];

$query="DELETE FROM user WHERE UserID = '$iduser'";
$db->exec($query);
include('adminPage.php');

?>