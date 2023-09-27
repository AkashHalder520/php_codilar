<?php
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
<style>
    .errormsg{
    color: red;
    font-size: 14px;
    font-weight: bolder;
    /* margin-top: 10px; */
}
</style>

<body>
    <div class="container">
        <h1>Add user details</h1>
        <form method="post" action='./actionpage.php' enctype="multipart/form-data" id="formq">
            <!-- we have to encript the image so we use enctype-->
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameid" name="name" oninput="namevalid()">
                    <span id="nameerr" id="err" class="errormsg"> </span>
                </div>
            </div>
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
                    <input type="password" class="form-control" id="passwordid" name="password"
                        oninput="passwordvalid()">
                    <span id="passworderr" class="errormsg"> </span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mobileid" name="mobile" oninput="contactnumvalid()">
                    <span id="contactnumerr" class="errormsg"> </span>
                </div>
            </div>



            <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->

            <input type="submit" value="" id="submit-button" style="visibility:hidden" />

        </form>
        <button onClick='senddata()' class="btn btn-primary">Submit</button>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

    </div>
    <!-- including validation file -->

    <script src="./registrationvalidation.js"></script>

</body>


</html>