<?php
session_start();
include('nav.php')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Display Page</h1>
        <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-primary me-2" href="registration.php">Add Details</a>
            <!-- <a class="btn btn-danger" href="logout.php">Logout</a> -->
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Education</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
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

                //checking the session
                $email = $_SESSION['email'];
                if (!$email) {
                    header("location:index.php");
                }

                // selecting all data except password hash from the table******
                $getdataquery = "SELECT id,profile_img,name,email,mobile,gender,city,education  FROM `user_details` WHERE isDelete = 0";
                $response = $conn->query("$getdataquery");
                // print_r($response); 
                

                // to find the number of rows in the table********
                $num = mysqli_num_rows($response);
                if ($num > 0) {
                    $row = $response->fetch_all(MYSQLI_ASSOC);
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
                }
                foreach ($row as $key => $values) {
                    // echo "<pre>";
                    // print_r($values);
                    // echo "</pre>";
                    ?>
                    <tr>
                        <?php
                        foreach ($values as $key => $valuesx) {
                            ?>
                            <td>
                                <?php
                                if ($key == 'profile_img') {
                                    echo "<img src='" . $valuesx . "' height= '100px' width='100px'>";
                                } else
                                    echo "$valuesx"
                                        ?>

                                </td>

                        <?php }
                        ?>
                        <td>

                            <a href="updatepage.php?id=<?php echo $values['id'] ?>" class="btn btn-warning me-2">Update</a>
                            <a href="deletepage.php?id=<?php echo $values['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Do you want to Delete')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>