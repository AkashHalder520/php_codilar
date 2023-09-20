<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "registration_db";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
echo $id;

// $sqldeletequery = "DELETE FROM `user_details` WHERE id = $id";
$sqldeletequery="UPDATE user_details
SET  isDelete = 1
WHERE id = '$id'";


if ($conn->query($sqldeletequery) === TRUE) {
    echo "<script>
    if(confirm(`Data deleted successfully do you want to go to display page?`))
            {
            window.location.href='showdata.php';
            }
        </script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

?>