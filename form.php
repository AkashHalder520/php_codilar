<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <style>
        #educationlable {
            margin-left: 20px !important;
        }
    </style>
</head>

<body>

    <!-- any thing goes throug post it by default converts to string -->
    <?php
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>"
    
    $email = $password = $gender = $city = $education = "";

    if (isset($_POST['email'])) { //isset function returns true if the variable exists and is not NULL, otherwise it returns false. and error will show in browser
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
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
    // echo($education); using implode function to convert array to string
    
    echo "Email:- $email <br>";
    echo "password:- $password <br>";
    echo "gender:- $gender <br>";
    echo "City:- $city <br>";
    echo "education:- $education <br>";
    ?>
    <form method="post">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
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
            foreach ($cityarr as $key => $value) {
                echo "<option>$value</option>";
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
                    foreach ($checkboxarr as $key => $value) {
                        echo "<input  type='checkbox' id='educationlable' name='education[]' value=$value>
                        <label>"
                            ?>
                        <?php echo "$value";
                    } ?>



                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>

    </form>
</body>

</html>