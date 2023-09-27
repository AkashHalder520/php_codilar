<?php
session_start();
include('nav.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
  .errormsg {
    color: red;
    font-size: 14px;
    font-weight: bolder;
    /* margin-top: 10px; */
  }
</style>

<body>
  <form class="container" method="post">
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="emailid" name="email" oninput="emailvalid()">
        <span id="emailerr" class="errormsg"> </span>
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="passwordid" name="password" oninput="passwordvalid()">
        <span id="passworderr" class="errormsg"> </span>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit-button" style="visibility:hidden">Submit</button>
  </form>
  <div class="text-center"> <!-- Center-align contents -->
    <button onClick='senddata()' class="btn btn-primary">Submit</button>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="./loginvalidation.js"></script>
</body>

</html>

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


$email = $password = "";
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  echo $email;
}

if (isset($_POST['password'])) {
  $password = $_POST['password'];
}
// if(password_verify($password, $hashed_password)) //for verifing hasg password
$loginquery = "SELECT * FROM user_details WHERE email='$email'";
$response = $conn->query($loginquery);
if ($response === false) {
  // Handle the query error
  echo "Query failed: " . $conn->error;
} else {
  $rows = $response->fetch_all(MYSQLI_ASSOC);
  // echo "<pre>";
  // print_r($rows[0]['name']);
  $name=$rows[0]['name']?? '';
  // echo "</pre>";
}
if (empty($rows)) {
   echo "<script>alert('Please enter correct  email or password ')</script>";
  die();
}
if (!password_verify($password, $rows[0]['password'])) {
  echo "<script>alert('wrong password')</script>";
} else {
  //creating the session 
  $_SESSION['email'] = $email;
  $_SESSION['name']=$name;

  $lastdatetime = "UPDATE `user_details` SET lastlogin = now() WHERE email = '$email'";
  $response = $conn->query($lastdatetime);
  $status = "UPDATE `user_details` SET status = '1' WHERE email = '$email'";
  $ress = $conn->query($status);
  // echo $response;
  header("location:table.php");
}


?>