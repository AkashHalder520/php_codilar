<?php 
session_start();
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
    $sql = "DELETE FROM booking_slot
    WHERE day = '$day' AND slot_time = '$time' AND date = '$date'";

// Execute the query directly
if ($mysqli->query($sql) === TRUE) {
    // The record has been successfully deleted
    echo "Record deleted successfully";
} else {
    // An error occurred while deleting the record
    echo "Error deleting record: " . $mysqli->error;
}
// echo "$day , $time, $date, $description asfsadfasdf";


}
?>