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

$sqlrestorequery="UPDATE user_details
SET  isDelete = 0 
WHERE id = '$id'"; // setting isdelete flag to zero


if ($conn->query($sqlrestorequery) === TRUE) {
    echo "<script>
    if(confirm(`Restored data successfully do you want to go to display page?`))
            {
            window.location.href='showdata.php';
            }
        </script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>