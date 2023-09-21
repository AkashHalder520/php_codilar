<?php 
include('nav.php') ;
// session_start();
// echo $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- script for displaying the image on upload -->
    <script>
        $(document).ready(function () {
            $(".upload-image").click(function () {
                $(".form-horizontal").ajaxForm({
                    target: '.preview'
                }).submit();
            });

            function imagePreview(fileInput) {
                if (fileInput.files && fileInput.files[0]) {
                    var fileReader = new FileReader();
                    fileReader.onload = function (event) {
                        $('#preview').html('<img src="' + event.target.result + '" width="200px" height="200px"/>');
                    };
                    fileReader.readAsDataURL(fileInput.files[0]);
                }
            }
            $("#image").change(function () {
                imagePreview(this);
            });
        });
    </script>

    <!-- <script>
        if (document.getElementById("image").value == "") {
            <
            img src = "<?php echo $data[0]['profile_img'] ?>"
            alt = "your image"
            height = "200px"
            width = "200px" / >
        }
    </script> -->
</head>


<body class="container">
    <h1>update page</h1>
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
    
    $sqlfetchquery = "SELECT profile_img,name,email,gender,city,education  FROM `user_details` WHERE id=$id";
    $response = $conn->query("$sqlfetchquery");
    // echo "<pre>";
    // print_r($response);
    // echo "<pre>";
    
    //fetch all data at once in associative format
    $data = $response->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($data);
    // echo $data[0]['profile_img'];
    // echo "<pre>";
    ?>


    <!--    Automatically insert the value in checkbox -->
    <?php

    $educationdata = $data[0]['education'];
    // echo $educationdata . "edication data";
    $eduarr = explode(",", $educationdata); // explode function used to convert array to string
    
    // print_r($eduarr)
    
    ?>

    <!-- for automatic select of radio buttons -->

    <?php
    $malechecked = "";
    $femalcheck = "";
    $xxx = $data[0]['gender'];
    $xxx === "male" ? $malechecked = "checked" : $femalcheck = "checked";
    ?>


    <form method="post" action="./updatescript.php?id=<?php echo $id ?>" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="name"
                    value="<?php echo $data[0]['name']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email"
                    value="<?php echo $data[0]['email']; ?> ">
            </div>
        </div>
        <!-- <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password">
            </div>
        </div> -->


        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Upload Profile Image</label>
            <div class="col-sm-10">
                <!-- <input type="file" class="form-control" name="photo"> -->

                <div id="preview" class="mt-2 mb-2"></div>
                <input type="file" name="photo" id="image" class="form-control mt-2 mb-2" style="width:30%" />
                <img src="<?php echo $data[0]['profile_img'] ?>" alt="your image" height="200px" width="200px" />


            </div>
        </div>



        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" <?php echo $malechecked ?>>
                    <label class="form-check-label" for="gridRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female" <?php echo $femalcheck ?>>
                    <label class="form-check-label" for="gridRadios2">
                        Female
                    </label>
                </div>

            </div>
        </fieldset>
        <label for="inputEmail3" class="col-sm-2 col-form-label">select city</label>
        <!-- <select name="city" id="">
         <option value="Delhi">Delhi</option>
        <option value="kolkata">Kolkata</option>
        <option value="Mumbai">Mumbai</option>
       </select> -->

        <!-- we can have many options so this is not a good practice we can use array for this -->
        <?php
        // create array of city
        $cityarr = array('Delhi', 'Mumbai', 'Noida', 'kolkata', 'Hyderabad', 'Siliguri');
        ?>
        <select name="city" id="">
            <?php
            $selected = "";
            $cityf = $data[0]['city'];
            if (in_array($cityf, $cityarr)) { //check if its in array
                $selected = "selected";
            }
            foreach ($cityarr as $key => $value) {
                echo "<option $selected>$value</option>";
            }
            ?>

        </select>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">education</label>
            <!-- in check box only the last value is taken for that we have to use array like education[]-->
            <div class="col-sm-10 offset-sm-2">
                <!-- we can have multiple ceckbox here also we can use array -->
                <?php
                $checkboxarr = array('B.tech', 'M.Tech', 'BCA', 'MCA', 'B.Sc', 'Others')
                    ?>
                <div class="form-check">
                    <?php
                    //condition for checked
                    foreach ($checkboxarr as $key => $value) {
                        $checked = "";
                        if (in_array($value, $eduarr)) {
                            $checked = 'checked';
                        }
                        echo "<input  type='checkbox' id='educationlable' name='education[]' value=$value $checked>";
                        ?>
                        <label>

                            <?php echo "$value";
                    } ?>
                    </label>


                </div>
                

                <button type="submit" class="btn btn-primary">Update</button>
            </div>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</body>

</html>