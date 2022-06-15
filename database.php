<?php
try {
$dsn = 'mysql:host=localhost;dbname=bookstore1.0';
$username = 'root';
$password = '';
$db = new PDO($dsn,$username,$password);

} catch(PDOException $e) {
  $error_message = $e -> getMessage();
  echo "<p> An error occured while connecting to the database: $error_message </p>";
} catch(Exception $e) {
  $error_message = $e -> getMessage();
  echo "<p> An error occured while connecting to the database: $error_message </p>";
}
?>
