<?php
// your-server-script.php

$host = 'localhost'; // Replace with your database host
$dbname = 'conference_slot'; // Replace with your database name
$username = "root";
$password = "";
// Create a MySQLi connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected successfully to database";





if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the data sent from JavaScript
    $day = $_POST["day"];
    $time = $_POST["time"];
    $date = $_POST["date"];
    $description=$_POST["description"];
echo "$day , $time, $date, $description";



}
?>
