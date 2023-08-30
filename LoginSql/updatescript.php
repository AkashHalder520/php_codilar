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
    // echo "$id";

$email = $password = $gender = $city = $education = $name = "";
if ($_SERVER["REQUEST_METHOD"] =="POST") {

    //<!-- scripts for file upload -->
$uploadpath="";
$filename= $_FILES["photo"]["name"]; 
$tempname= $_FILES["photo"]["tmp_name"];
$size= $_FILES["photo"]["size"];

$uploadpath="images/".$filename;
 move_uploaded_file($tempname,$uploadpath);


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
    $sqlupdatequery = "UPDATE `user_details` SET profile_img='$uploadpath', name='$name', email='$email', gender='$gender', city='$city', education='$education' WHERE id=$id";

    $updateres=$conn->query("$sqlupdatequery");
    if($updateres){
       echo "<script>
        alert('updated')
         window.location.href='./showdata.php';
        </script>";
        // 
        //  header('Location:./showdata.php');
    }else{
        echo "error";
    }
}
?>