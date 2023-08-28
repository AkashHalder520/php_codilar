<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Display page</h1>
    <table border="2px">
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
            // print_r($key);
            // echo "</pre>";
            ?>
            <tr>
                <?php
                foreach ($values as $key => $valuesx) {
                    ?>
                    <td>
                        <?php 
                        if ($key=='profile_img'){
                            echo "<img src='".$valuesx."' height= '100px' width='100px'>";
                        }else
                        echo "$valuesx" 
                        ?>

                    </td>

                <?php } ?>
                <td>
                    <button>update</button>
                    <button>Delete</button>
                </td>
            <?php } ?>
        </tr>
    </table>
</body>

</html>