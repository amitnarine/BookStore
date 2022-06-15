<?php
 

session_start();    
$name = filter_input(INPUT_POST, 'name');
$pwd = filter_input(INPUT_POST, 'pwd');
$email = filter_input(INPUT_POST, 'email');
$birthdate = filter_input(INPUT_POST, 'birthdate');
$address = filter_input(INPUT_POST, 'address');
$confirm = filter_input(INPUT_POST, 'confirm');

$headers = "From: bookstore@gmail.com";
$subject = "Bookstore Verification code!";
$message = "Verification: 123456789";

$error1 = "Username is already in use";
$error2 = "Email is already in use";

// if failed input return to registration
if ($name == null || $email == null || $pwd == null || $birthdate == null || $address == null || (strcmp($pwd, $confirm)!== 0)){
    header('location: 2Registration.php');
} else {
    require_once('database.php');
    // check if username is already in use
    $query1 = "SELECT * FROM user WHERE Username='$name'";
    $data1=$db->query($query1);

    if($data1->rowCount()>0) {
        $_SESSION["error"] = $error1;
        header('Location: 2Registration.php');
    } else {
        // check if email is already in use
        $query2 = "SELECT * FROM user WHERE Email='$email'";
        $data2=$db->query($query2);
        if($data2->rowCount()>0) {
            $_SESSION["error"] = $error2;
            header('Location: 2Registration.php');
        } else {
            // register the user
            $query3 = 'INSERT INTO user (Username, Password, Email, Birthdate, Address, type) VALUES(:name, :pwd, :email, :birthdate, :address, :type)';
            $statement = $db->prepare($query3);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':pwd', $pwd);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':birthdate', $birthdate);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':type', "user");
            $statement->execute();
            $statement->closeCursor();

            mail($email, $subject, $message, $headers);
            
            header('location: RegistrationConf.php');
        }
    }
}
?>