<?php include('nav.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- script for image preview -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".upload-image").click(function() {
                $(".form-horizontal").ajaxForm({
                    target: '.preview'
                }).submit();
            });

            function imagePreview(fileInput) {
                if (fileInput.files && fileInput.files[0]) {
                    var fileReader = new FileReader();
                    fileReader.onload = function(event) {
                        $('#preview').html('<img src="' + event.target.result + '" width="200px" height="200px"/>');
                    };
                    fileReader.readAsDataURL(fileInput.files[0]);
                }
            }
            $("#image").change(function() {
                imagePreview(this);
            });
        });
    </script>
  
</head>

<body>

    <h1>Add user details</h1>
    <form method="post" action='#' enctype="multipart/form-data" id="formq" > <!-- we have to encript the image so we use enctype-->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nameid" name="name" >
                <span id="err"> </span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="emailid" name="email">
                <span id="err"> </span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordid" name="password">
                <span id="err"> </span>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Upload Profile Image</label>
            <div class="col-sm-10">
            <div id="preview" class="mt-2 mb-2"></div>
                <input type="file" name="photo" id="image" class="form-control mt-2 mb-2" style="width:30%" />
                
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="./registrationvalidation.js"></script>
</body>
<!-- <script>

function validation(){
    const name=document.getElementById('name').value;
if (name =="") {
    document.getElementById('nameerr').innerText="please write a user name";
}else
{
    document.getElementById('nameerr').innerText="";
}
}
    </script> -->
</html>