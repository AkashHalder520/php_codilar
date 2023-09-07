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

// $getdata= $_POST;
// echo "<pre>";
// print_r($getdata);
// echo "</pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
//<!-- scripts for file upload -->
$uploadpath="";
$filename= $_FILES["photo"]["name"]; 
$tempname= $_FILES["photo"]["tmp_name"];
$size= $_FILES["photo"]["size"];

$uploadpath="images/".$filename;
echo move_uploaded_file($tempname,$uploadpath);


// $_FILES[input-field-name][name]
// $_FILES[input-field-name][tmp_name]
// $_FILES[input-field-name][size]
// $_FILES[input-field-name][type]
// $_FILES[input-field-name][error]



// validation of the registration
$email = $password = $gender = $city = $education = $name =  $lastlogin="";
if(isset($_POST["name"])){
 $name=$_POST['name'];
}
if (isset($_POST['email'])) { //isset function returns true if the variable exists and is not NULL, otherwise it returns false. and error will show in browser
    $email = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT) ; // storing the password as hash 
}
if (isset($_POST['mobile'])) {
    $mobile=$_POST['mobile']; 
}
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}
if (isset($_POST['city'])) {
    $city = $_POST['city'];
}
if (isset($_POST['education'])) {
    $education = implode(",", $_POST['education']);
}
$current_time=date("Y-m-d h:i:s");//for getting the date of creation 
$lastlogin=date("Y-m-d h:i:s");// for first time login storing the date 
$status=0;
// inserting into database
$sqlinsertquery="INSERT INTO `user_details` (`profile_img`,`name`,`email`,`password_hash`,`mobile`,`gender`,`city`,`education`,`lastlogin`,`created_at`,`status`) VALUES ('$uploadpath','$name','$email','$password_hash','$mobile','$gender','$city','$education','$lastlogin','$current_time','$status')";

if($conn->query($sqlinsertquery)===TRUE){
    
    echo '<script>alert("Added successfully")</script>';
    // header("location:showdata.php");
}else{
    echo "error".$conn->error;
}

}
?>

