<?php
session_start();
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
// echo "$id";

$email = $password = $gender = $city = $education = $name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //<!-- scripts for file upload -->
    $uploadpath = "";
    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $size = $_FILES["photo"]["size"];

    $uploadpath = "images/" . $filename;
    move_uploaded_file($tempname, $uploadpath);


    if (isset($_POST["name"])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) { //isset function returns true if the variable exists and is not NULL, otherwise it returns false. and error will show in browser
        $email = $_POST['email'];
    }
    //    if (isset($_POST['password'])) {
    //        $password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT) ; // storing the password as hash 
    //    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    if (isset($_POST['city'])) {
        $city = $_POST['city'];
    }
    if (isset($_POST['education'])) {
        $education = implode(",", $_POST['education']);
    }
    $last_edit_time = date('Y/m/d H:i:s');

    $newvalue = array("profile_img"=>$uploadpath, "name"=>"$name", "email"=>"$email","gender"=>"$gender","city"=>"$city","education"=>"$education");
    $sqldatagetquery="SELECT profile_img,name,email,gender,city,education  FROM `user_details` WHERE id=$id";
    $response=$conn->query("$sqldatagetquery");
    // echo "$response";
    $row = $response->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($row[0]);
    // print_r($newvalue);
    // echo "</pre>";
    $diff=array_diff($row[0],$newvalue);
    print_r($diff);
    $sessionemail = $_SESSION['email'];
foreach ($diff as $key => $value) {
    # code...
    $sqlupdatelog = "INSERT INTO `edit_log` (`edited_By`, `edited_At`,`edited_field`,`edited_value`) VALUES ('$sessionemail', '$last_edit_time','$key','$value')";
    $conn->query($sqlupdatelog);
}
    $sqlupdatequery = "UPDATE `user_details` SET profile_img='$uploadpath', name='$name', email='$email', gender='$gender', city='$city', education='$education' WHERE id=$id";
    // //for edit log
    // $sessionemail = $_SESSION['email'];

    // $sqlupdatelog = "INSERT INTO `edit_log` (`edited_By`, `edited_At`) VALUES ('$sessionemail', '$last_edit_time')";

    $updateres = $conn->query("$sqlupdatequery");
    if ($updateres) {
    //     $conn->query($sqlupdatelog);
        echo "<script>
        alert('updated')
         window.location.href='./showdata.php';
        </script>";
        
         header('Location:./showdata.php');
    } else {
        echo "error";
    }
}
?>