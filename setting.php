<?php
require('database.php');
session_start();


if(!isset($_SESSION['Username'])){
    header('Location: 1Login.php');
} else {
    include("header.php");
} // if-else

?>


<!DOCTYPE html>
<hmtl>
	<head>
		<title>Settings</title>
		<link rel="stylesheet" href="search.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="main.css">
	</head>
    <body>
		<div align="center">
			<br><br><h2>Settings</h2>
			<br><br>
			<form action="setting.php" method="POST">
				<input type="checkbox" id="checkPromo1" onclick="selectOnlyThis(this.id)" name="Subscribed" <?php if(isset($_POST['Subscribed'])) echo "checked='checked'";?>value="Yes">
				<label for="checkPromo1">Yes</label>
				<input type="checkbox" id="checkPromo2" onclick="selectOnlyThis(this.id)" name="NotSubscribed" value="No">
				<label for="checkPromo2">No</label><br>				
				<label for="">Would you like to subscribe for promotions and the latest news offered.</label><br>
				<button type ="submit" name="saveCheckBox" class="checkout-button">Confirm</button><br><br>
				
				<script type="text/javascript">
					function selectOnlyThis(id) {
						for (var i = 1;i <= 2; i++)
						{
							document.getElementById("checkPromo" + i).checked = false;
						}
						document.getElementById(id).checked = true;
					}
            	</script>
			
			</form>


			<form action="deleteProfile.php" method="POST">
				<b><hr></b><h3>If you delete your profile, you will be redirected to the home page</h3>
				<button type ="submit" class="deleteProfile-button">DELETE PROFILE</button><br><br>
				<hr><br><br>
			</form>	
		</div>

    </body>
        
</html>
<?php

$con = mysqli_connect("localhost","root","","bookstore1.0");

$currentUser = $_SESSION['Username'];
$sql = "SELECT * FROM user WHERE Username ='$currentUser'";
$gotResuslts = mysqli_query($con, $sql);

if($gotResuslts){
    if(mysqli_num_rows($gotResuslts)>0){
        while($row = mysqli_fetch_array($gotResuslts)){
            $UserID = $row['UserID'];
        } // while
    } // if
} // if

if(isset($_POST['Subscribed'])) {
    $query6 = "UPDATE user SET Subscribed = 'Yes' WHERE UserID = '$UserID'";
    echo($query6);
    $results = mysqli_query($con, $query6);?>
    <script type="text/javascript">
		alert("You have successfully subscribed");
        window.location = "setting.php";
    </script><?php
} else if (isset($_POST['NotSubscribed'])) {
    $query7 = "UPDATE user SET Subscribed = 'No' WHERE UserID = '$UserID'";
    echo($query7);
    $results = mysqli_query($con, $query7);?>
    <script type="text/javascript">
	    alert("Response was recorded");
        window.location = "setting.php";
    </script>
    <?php 
}// if
?>