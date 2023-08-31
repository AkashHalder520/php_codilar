<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <h1>Display page</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary me-md-2" type="button" href="registration.php">Add details</a>
        <a class="btn btn-danger me-md-2" type="button" href="logout.php">Logout</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>name</th>
            <th>email</th>
            <th>Gender</th>
            <th>city</th>
            <th>education</th>
            <th>operation</th>
        </tr>
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


        // selecting all data except password hash from the table******
        $email=$_SESSION['email'];
        if(!$email){
            header("location:index.php");
        }
        $getdataquery = "SELECT id,profile_img,name,email,gender,city,education  FROM `user_details`";
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

                    <a href="updatepage.php?id=<?php echo $values['id'] ?>"><button>update<button></a>
                    <a  href="deletepage.php?id=<?php echo $values['id'] ?>"><button onclick="return confirm(`Do you want to delete`)">Delete</button></a>
                    <!-- <button id="deletebutton">Delete</button> -->
                    
                    
                </td>
            <?php } ?>
        </tr>
    </table>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
