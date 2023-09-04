<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "registration_db";

session_start();
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_SESSION['email'];
// echo "$email";
$status="UPDATE `user_details` SET status = '0' WHERE email = '$email'";// changeing the session back to 0(false)
$ress=$conn->query($status);

session_unset();// to remove session

header("location:index.php")
?>