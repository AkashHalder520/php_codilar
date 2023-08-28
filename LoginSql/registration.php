<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  method="post" action='./actionpage.php' enctype="multipart/form-data"> <!-- we have to encript the image so we use enctype-->
<div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="name">
            </div>
        </div>
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
        <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Upload Profile Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control"  name="photo">
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
                    </label> 


                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            
    </form>
</body>
</html>