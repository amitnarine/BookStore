<?php
require_once('database.php');
include("header.php");

session_start();

$currentUser = $_SESSION['Username'];
$con = mysqli_connect("localhost","root","","bookstore1.0");
$sql = "SELECT * FROM user WHERE Username ='$currentUser'";
$gotResuslts = mysqli_query($con, $sql);

	if($gotResuslts){
		if(mysqli_num_rows($gotResuslts)>0){
			while($row = mysqli_fetch_array($gotResuslts)){
                $UserID = $row['UserID'];
            } // while
        } // if
    } // if
        
    $query = "DELETE FROM user WHERE UserID = '$UserID'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();

setcookie('mycookie', '', time()-3600);
session_unset();
session_destroy();
header("location: 0HOME.php")
?>
