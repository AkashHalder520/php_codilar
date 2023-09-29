<?php
// your-server-script.php
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
$name=$_SESSION['name'];
$email=$_SESSION['email'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the data sent from JavaScript
    $day = $_POST["day"];
    $time = $_POST["time"];
    $date = $_POST["date"];
    $description=$_POST["description"];
// echo "$day , $time, $date, $description";

$sql = "INSERT INTO booking_slot (username,email,day, slot_time, date, description) VALUES ('$name','$email','$day', '$time', '$date', '$description')";

if ($mysqli->query($sql) === TRUE) {
    echo "Data inserted successfully into the 'booking_slot' table.";
//     header('Location: table.php');
//    echo' <script>
                
//                  setTimeout(function() {
//                     document.getElementById("selectdatebtn").click();
//                 }, 1000)
//                   </script>';

} else {
    echo "Error: " . $mysqli->error;
}



}
?>
