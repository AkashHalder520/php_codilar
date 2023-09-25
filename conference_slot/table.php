<?php
include('nav.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Time Table</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center ">
        <h1 class="mt-4">Booking Slot</h1>
        <table class="table table-bordered">
            <?php 
            echo "Today is " . date("Y-m-d") . "<br>";
            echo "Today is " . date("l");
            ?> 
            <thead>
                <tr>
                    <th>Day/Time</th>
                    <th>10-11 AM</th>
                    <th>11-12 AM</th>
                    <th>12-1 PM</th>
                    <th>1-2 PM</th>
                    <th>2-3 PM</th>
                    <th>3-4 PM</th>
                    <th>4-5 PM</th>
                    <th>5-6 PM</th>
                    <th>6-7 PM</th>
                </tr>
            </thead>
            <?php 
            $dayarr=array('Monday','Tuesday','Wednesday','Thursday','Friday');
            ?>
            <tbody>
                <?php foreach($dayarr as $day) { ?>
                    <tr>
                        <td><?php echo $day; ?></td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td>Break</td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td><button class="btn btn-primary">Book</button></td>
                        <td><button class="btn btn-primary">Book</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
