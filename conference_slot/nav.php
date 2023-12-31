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
// $email=$_SESSION['email'];
// $getstatus = "SELECT status FROM `user_details` WHERE email='$email'";
// $res = $conn->query($getstatus);
// $status = $res->fetch_all(MYSQLI_ASSOC);
// print_r($status[0]['status'])
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php 
                            // session_start();

                            $email = $_SESSION['email'] ?? '';
                            if($email==''){
                                echo '<a class="nav-link active" aria-current="page" href="registration.php">Register</a>';
                            }
                        ?>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="table.php">DisplayTable</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="deletelog.php">DeleteLog</a> -->
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <?php
                    // $email = isset($_SESSION['email']);
                    // // $getstatus = "SELECT status FROM `user_details` WHERE email='$email'";
                    // // $res = $conn->query($getstatus);
                    // // $status = $res->fetch_all(MYSQLI_ASSOC);
                    
                    // if ($email == "") {
                    //     echo " <a class='btn btn-Danger'>Login</a>  ";
                    // } else {
                    //     echo "<a class='btn btn-Success' href='logout.php'>Logout</a>";
                    // }
                    $name=$_SESSION['name']?? '';
                    echo "<h4 style='margin: auto;margin-right: 10px;'>{$name}</h4>";

                    if (!isset($_SESSION['email'])) {
                        echo '<a class="btn btn-success" href="index.php">Login</a>';
                    } else {
                        echo '<a class="btn btn-danger" href="logout.php">Logout</a>';
                    }
                    ?>


                </form>
            </div>
        </div>
    </nav>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script> -->
        <script src="./bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>