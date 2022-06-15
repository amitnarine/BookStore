<?php
    require('database.php');
    session_start();

    print_r($_POST);

    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $check=$_POST['check'];
    $error = "Username/Password Incorrect";
    
    $test =" SELECT UserID FROM user WHERE username = '$Username' ";
	$pa=$db->query($test);
    
    $query="SELECT * FROM user WHERE Username='$Username' AND Password='$Password'";

    $data=$db->query($query);

    /*
   if($data->rowCount()>0) {
        // set sesstion
        $_SESSION['Username'] = $_POST['Username'];
        if($check=='1') {
            // sets cookie that remembers usename and password and insta-logsin
            setcookie('mycookie', TRUE, time()+3600);
        }
        if($_POST['Username'] == 'admin'){
            header('Location: adminPage.php');
        }
        else if($_POST['Username'] == 'owner'){
            header('Location: ownerPage.php');
        }
        else {
            header('Location: 3SearchandSearchResults.php');
        }
        
        
    } 
    
    */

    $_SESSION['Username'] = $_POST['Username'];
    

    if($data->rowCount()>0) {


    foreach($data as $attr){
		if($attr['type'] == 'vendor'){
			foreach($pa as $pt){
				$_SESSION["id"] = $pt['UserID'];
			}	

            header('Location: ownerPage.php');
			
            
            
		}
		else if($attr['type'] == 'user'){
			foreach($pa as $pt){
				$_SESSION["id"] = $pt['UserID'];

			}
            header('Location: search.php');
			
             
		}
		else if($attr['type'] == 'admin'){

		
             

            header('Location: adminPage.php');
		}


		else{	
			$_SESSION["error"] = $error;
            header('Location: 1Login.php');
		}
	}


}

    



    
    // login failed
    else {
        $_SESSION["error"] = $error;
        header('Location: 1Login.php');
    }
    
?>

