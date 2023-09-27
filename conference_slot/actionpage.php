<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "conference_slot";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation of the registration
    $email = $password = $name = $mobile = "";
    
    if(isset($_POST["name"])){
        $name = $_POST['name'];
    }
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    
    if (isset($_POST['password'])) {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    
    if (isset($_POST['mobile'])) {
        $mobile = $_POST['mobile'];
    }

    $current_time = date("Y-m-d h:i:s");
    $lastlogin = date("Y-m-d h:i:s");
    $status = 0;

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM `user_details` WHERE `email` = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        echo '<script>alert("Email already exists in the database. Please use a different email.");</script>';
        echo '<script>window.location.href = "registration.php";</script>';
        

        
    } else {
        // Email does not exist, insert the new record into the database
        $sqlinsertquery = "INSERT INTO `user_details` (`name`,`email`,`password`,`contact_number`,`last_login`,`created_at`,`status`) VALUES ('$name','$email','$password_hash','$mobile','$lastlogin','$current_time','$status')";

        if ($conn->query($sqlinsertquery) === TRUE) {
            echo '<script>alert("Registered successfully please login ")</script>';
            echo '<script>window.location.href = "index.php";</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
