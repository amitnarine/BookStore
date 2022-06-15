<?php
 

session_start();    
$code = filter_input(INPUT_POST, 'Code');


// if failed input return to registration
if ($code == "123456789" ){
    header('location: 1Login.php');
} else {
    header('location: RegistrationConf.php');
}


?>
