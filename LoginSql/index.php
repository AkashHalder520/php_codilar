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

<body>
  <form class="container" method="post">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>

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

//  $statusquery="SELECT status FROM `user_details` WHERE email='akashhalder520@gmail.com'";
$email = $password = "";
if (isset($_POST['email'])) {
  # code...
  $email = $_POST['email'];
  echo $email;
}

if (isset($_POST['password'])) {
  # code...
  $password = $_POST['password'];
}
// if(password_verify($password, $hashed_password)) //for verifing hasg password
$loginquery = "SELECT * FROM user_details WHERE email='$email'";
$response = $conn->query($loginquery);
$islogin = false;
if ($response === false) {
  // Handle the query error
  echo "Query failed: " . $conn->error;
} else {
  $rows = $response->fetch_all(MYSQLI_ASSOC);
  echo "<pre>";
  // print_r($rows[0]['password_hash']);

  echo "</pre>";
}
if (empty($rows)) {
  echo "<script>alert('Please enter correct  email or password ')</script>";
  die();
}
if (!password_verify($password, $rows[0]['password_hash'])) {
  echo "<script>alert('wrong password')</script>";
} else {
  //creating the session 
  $_SESSION['email'] = $email;

  $lastdatetime = "UPDATE `user_details` SET lastlogin = now() WHERE email = '$email'";
  $response = $conn->query($lastdatetime);
  $status = "UPDATE `user_details` SET status = '1' WHERE email = '$email'";
  $ress = $conn->query($status);
  // echo $response;
  header("location:showdata.php");
}


?>