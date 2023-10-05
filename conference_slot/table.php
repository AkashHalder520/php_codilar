<?php
session_start();
include('nav.php');
$emails = $_SESSION['email'];
$names = $_SESSION['name'];
// echo "$emails";
if (!$emails) {
    header("location:index.php");
}
echo "<script>";
echo "var jsSessionEmail = '" . $emails . "';"; // storing session in js ..

echo "</script>"
    ?>


<!DOCTYPE html>
<html>

<head>
    <title>Time Table</title>

</head>

<body>
    <div class="container text-center">
        <h1 class="mt-4">Booking Slot</h1>

        <?php
        //  current date
        $currentDate = date("Y-m-d");
        echo "Today is " . $currentDate . "<br>";
        echo "The time is " . date("h:i");
        ?>

        <?php
        // Retrieve the selected date from the date-form below
        $dayOfWeek = $selectedDate = $datearr = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedDate = $_POST["selectedDate"];
            $_SESSION["selectedDate"] = $selectedDate;
            $dayOfWeek = date("l", strtotime($selectedDate));
        }
        ?>
        <!-- getting the input date -->
        <form method="post" action="" class="mt-4">

            <label for="dateInput" class="ms- -70px">Select a Date:</label>
            <input type="date" id="dateInput" name="selectedDate" class="form-control d-inline-block w-auto "
                value="<?php echo isset($_SESSION['selectedDate']) ? $_SESSION['selectedDate'] : ''; ?>">

            <input type="submit" value="Submit" class="btn btn-primary" id="selectdatebtn">
        </form>


        <?php


    if($selectedDate!=''){
        echo "<h3 class='mt-4'>You selected the date: " . $selectedDate . "</h3><br>";
        echo "<h4>You selected the day: " . $dayOfWeek . "</h4>";
    }
        ?>
        
        <div id="tableshow">
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Time Slot</th>
                        <?php
                        $datearr = '';
                        //calculating the whole weeks dates based in the selected dates
                        if ($dayOfWeek == 'Monday') {
                            $datearr = array(date("Y-m-d", strtotime($selectedDate)), date("Y-m-d", strtotime($selectedDate . "+1 day")), date("Y-m-d", strtotime($selectedDate . "+2 days")), date("Y-m-d", strtotime($selectedDate . "+3 days")), date("Y-m-d", strtotime($selectedDate . "+4 days")));
                        }
                        if ($dayOfWeek == 'Tuesday') {
                            $datearr = array(date("Y-m-d", strtotime($selectedDate . "-1 day")), date("Y-m-d", strtotime($selectedDate)), date("Y-m-d", strtotime($selectedDate . "+1 days")), date("Y-m-d", strtotime($selectedDate . "+2 days")), date("Y-m-d", strtotime($selectedDate . "+3 days")));
                        }
                        if ($dayOfWeek == 'Wednesday') {
                            $datearr = array(date("Y-m-d", strtotime($selectedDate . "-2 day")), date("Y-m-d", strtotime($selectedDate . "-1 day")), date("Y-m-d", strtotime($selectedDate)), date("Y-m-d", strtotime($selectedDate . "+1 days")), date("Y-m-d", strtotime($selectedDate . "+2 days")));
                        }
                        if ($dayOfWeek == 'Thursday') {
                            $datearr = array(date("Y-m-d", strtotime($selectedDate . "-3 day")), date("Y-m-d", strtotime($selectedDate . "-2 day")), date("Y-m-d", strtotime($selectedDate . "-1 day")), date("Y-m-d", strtotime($selectedDate)), date("Y-m-d", strtotime($selectedDate . "+1 days")));
                        }
                        if ($dayOfWeek == 'Friday') {
                            $datearr = array(date("Y-m-d", strtotime($selectedDate . "-4 days")), date("Y-m-d", strtotime($selectedDate . "-3 day")), date("Y-m-d", strtotime($selectedDate . "-2 days")), date("Y-m-d", strtotime($selectedDate . "-1 days")), date("Y-m-d", strtotime($selectedDate)));
                        }

                        // print_r($datearr);
                        // $dayarr = array(date("Y-m-d"), date("Y-m-d", strtotime("+1 day")), date("Y-m-d", strtotime("+2 days")), date("Y-m-d", strtotime("+3 days")), date("Y-m-d", strtotime("+4 days")));
                        ?>

                        <!--  Displaying the days with date -->
                        <?php
                        $dayarr = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
                        $numDates = count($dayarr);

                        for ($i = 0; $i < $numDates; $i++) {
                            if (!$datearr) {
                                echo "<th>$dayarr[$i]</th>";
                            } else {
                                echo "<th>$dayarr[$i]$datearr[$i]</th>";
                            }
                        }
                        ?>

                    </tr>
                </thead>
                <tbody>


                    <?php
                    // Database credentials
                    $host = 'localhost'; // Replace with your database host
                    $dbname = 'conference_slot'; // Replace with your database name
                    $username = "root";
                    $password = "";

                    // Create a MySQLi connection
                    $mysqli = new mysqli($host, $username, $password, $dbname);

                    // Check the connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }


                    // $sql = "SELECT * FROM booking_slot";
                    // $result = $mysqli->query($sql);
                    // $rows = $result->fetch_all(MYSQLI_ASSOC);
                    // echo "<pre>";
                    // print_r($rows);
                    // echo "</pre>";
                    
                    $time_slots = array('10-11 AM', '11-12 AM', '12-01 PM', '02-03 PM', '03-04 PM', '04-05 PM', '05-06 PM', '06-07 PM');

                    foreach ($time_slots as $time_slot) {
                        echo "<tr>";
                        echo "<td>$time_slot</td>";
                        // $currentDay = date('l');
                        // $Dayindex = array_search($dayOfWeek, $dayarr);
                        // if($Dayindex==0){
                    
                        for ($i = 0; $i < count($dayarr); $i++) {
                            $day = $dayarr[$i];
                            $date = $datearr[$i] ?? '';

                            // Check if the date is before the current date
                            $isDateBeforeCurrent = strtotime($date) < strtotime($currentDate);

                            // Extract the hours and AM/PM from the regular expression matches
                            preg_match('/(\d+)-(\d+) (AM|PM)/', $time_slot, $matches);
                            $start_hour = $matches[1];
                            // $end_hour = $matches[2];
                            $ampm = $matches[3];
                            $timex = $start_hour . ":00" . " $ampm";
                            // echo $timex;
                    
                            $convertedTimeSlot = date("H", strtotime($timex)); // converting the starting hr to 24hrs format
                            // echo $convertedTimeSlot."<br>";    
                            // Check if the time slot is before the current time
                    
                            $isTimeBeforeCurrent = false;
                            if (strtotime($date) == strtotime($currentDate)) { // if the current date and the date is equal then check the time
                                $isTimeBeforeCurrent = $convertedTimeSlot < date("H"); // returns a boolean value 
                    
                            }


                            if ($isDateBeforeCurrent || $isTimeBeforeCurrent) {


                                $sql = "SELECT * FROM booking_slot WHERE day = '$day' AND slot_time = '$time_slot' AND date = '$date'";
                                $result = $mysqli->query($sql);

                                if ($result->num_rows > 0) {
                                    // Data exists, show "View" button
                                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                                    $description = $rows[0]['description'];
                                    $name = $rows[0]['username'];
                                    $email = $rows[0]['email'];
                                    echo "<td><button class='btn btn-danger view-button' data-date='$date' data-day='$day' data-time='$time_slot'  date-description='$description' data-name='$name' data-email='$email'>Booked</button></td>";
                                } else {
                                    // Data doesn't exist, show "Book" button
                                    echo "<td><button class='btn btn-primary book-button' disabled >Book</button></td>";
                                }

                            } else {


                                $sql = "SELECT * FROM booking_slot WHERE day = '$day' AND slot_time = '$time_slot' AND date = '$date'";
                                $result = $mysqli->query($sql);

                                if ($result->num_rows > 0) {
                                    // Data exists, show "View" button
                                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                                    $description = $rows[0]['description'];
                                    $name = $rows[0]['username'];
                                    $email = $rows[0]['email'];
                                    echo "<td><button class='btn btn-success view-button' data-date='$date' data-day='$day' data-time='$time_slot'  date-description='$description' data-name='$name' data-email='$email'>Booked</button></td>";
                                } else {
                                    // Data doesn't exist, show "Book" button
                                    echo "<td><button class='btn btn-primary book-button' data-date='$date' data-day='$day' data-time='$time_slot' data-name='$names' data-email='$emails' >Book</button></td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- modal 1 for booking  -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalContent">
                        <!-- Content will be dynamically inserted here -->
                    </div>
                    <!-- Create a form with hidden inputs -->
                    <!-- giving id to form for taking the data in js -->
                    <form id="bookingForm" method="post" action="bookingstore.php">
                        <input type="hidden" name="date" id="modalDateInput">
                        <input type="hidden" name="day" id="modalDayInput">
                        <input type="hidden" name="time" id="modalTimeInput">
                        Task:<input type="text" name="description" id="description" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal 2 for view and cancel  -->

    <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalContent2">
                        <!-- Content will be dynamically inserted here -->
                    </div>
                </div>
                <div class="modal-footer" id="modal2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- we have to create the delete button via js for security reason-->
                </div>
            </div>
        </div>
    </div>

    <!-- Include jquerycdn -->

    <script src="jquery.js"></script>


    <script>
        // JavaScript to access data-day and data-time attributes
        document.addEventListener("DOMContentLoaded", function () {

            const dateform = document.getElementById('dateInput')
            const tables = document.getElementById('tableshow')
            if (dateform.value) {
                tables.style.display = "block";
            } else {
                // Create the text content
                var text = "please select a date";

                // Insert the text into the div
                tables.textContent = text;
            }


            const bookButtons = document.querySelectorAll(".book-button");
            const viewButtons = document.querySelectorAll(".view-button");
            bookButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    const day = button.getAttribute("data-day");
                    const time = button.getAttribute("data-time");
                    const date = button.getAttribute("data-date")
                    const name = button.getAttribute("data-name")
                    const email = button.getAttribute("data-email")
                    console.log("day=", day);
                    console.log("time=", time);
                    console.log("date=", date);
                    document.getElementById("modalDateInput").value = date;
                    document.getElementById("modalDayInput").value = day;
                    document.getElementById("modalTimeInput").value = time;
                    const content = `
                                <p>Slot Details </p>
                                <p>Date: ${date}</p>
                                <p>Day: ${day}</p>
                                <p>Time: ${time}</p>
                                <p>Booked By: ${name}</p>
                                <p>Email: ${email}</p>`;
                    modalContent.innerHTML = content;

                    const myModal = new bootstrap.Modal(document.getElementById("myModal"));
                    myModal.show();

                    $("#submitBtn").click(function () {
                        // Get form data
                        var formData = $("#bookingForm").serialize();//serialization is commonly used when sending data between a client (e.g., a web browser) and a server,

                        // Send a POST request using AJAX
                        $.ajax({
                            type: "POST",
                            url: "bookingstore.php",
                            data: formData,
                            success: function (response) {
                                // Handle the response from the server
                                console.log("Response from server: " + response);
                                myModal.hide()
                                // Redirect to "table.php"
                                window.location.href = "table.php";
                                const submitbtn = document.getElementById('selectdatebtn')
                                submitbtn.click();
                            },
                            error: function (xhr, status, error) {
                                // Handle errors
                                console.error("Error: " + error);
                            }
                        });
                    });


                });
            });
            viewButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    const day = button.getAttribute("data-day");
                    const time = button.getAttribute("data-time");
                    const date = button.getAttribute("data-date");
                    const description = button.getAttribute("date-description");
                    const name = button.getAttribute("data-name")
                    const email = button.getAttribute("data-email")

                    console.log("day=", day);
                    console.log("time=", time);
                    console.log("date=", date);
                    console.log("description=", description);
                    console.log("name=", name);
                    console.log("email", email);
                    console.log("jssessionemail:", jsSessionEmail);

                    const content = `
                                <p>Slot Details </p>
                                <p>Date: ${date}</p>
                                <p>Day: ${day}</p>
                                <p>Time: ${time}</p>
                                <p>Task : ${description}</p>
                                <p>Booked By: ${name}</p>
                                <p>Email: ${email}</p>
                                `;

                    modalContent2.innerHTML = content;
                    const myModal2 = new bootstrap.Modal(document.getElementById("myModal2"));
                    myModal2.show();



                    // Your table time
                    var inputString = time;

                    // Use a regular expression to extract the start hour and AM/PM
                    var match = inputString.match(/(\d+)-\d+ (AM|PM)/);

                    // Check if the match was found
                    if (match) {
                        var startHour = parseInt(match[1], 10);
                        var period = match[2];

                        if (period === "PM" && startHour !== 12) {
                            startHour += 12;
                        } else if (period === "AM" && startHour === 12) {
                            startHour = 0;
                        }

                        console.log('Start Hour (24-hour format) on click:', startHour);
                    } else {
                        console.log('Start hour not found in the input string.');
                    }

                    // var buttonAppended = false; // Initialize a flag variable

                    // Create a new button element
                    var delButton = document.createElement("button");

                    // Set button attributes 
                    delButton.setAttribute("type", "submit");
                    delButton.setAttribute("id", "deletebtn");
                    delButton.setAttribute("class", "btn btn-danger");
                    // Set button text
                    delButton.textContent = "Delete";


                    var currentDate = new Date();

                    // Get the current date (YYYY-MM-DD)
                    var year = currentDate.getFullYear();
                    var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Month is zero-based, so add 1
                    var dayjs = currentDate.getDate().toString().padStart(2, '0');

                    var formattedDate = year + '-' + month + '-' + dayjs;

                    // Get the current hour (24-hour format)
                    var currenthour = currentDate.getHours().toString().padStart(2, '0');

                    // Output the current date and hour
                    console.log('Current Date:', formattedDate);
                    console.log('Current Hour:', currenthour);


                    if (email == jsSessionEmail && date >= formattedDate && startHour >= currenthour) { //check if flag 0 means its not beyound current date and time 

                        var parentElement = document.getElementById('modal2')
                        if (!document.getElementById('deletebtn')) {
                            parentElement.appendChild(delButton);
                        }
                    } else {
                        document.getElementById('deletebtn').remove();
                    }




                    deletebtn.addEventListener("click", function () {

                        $.ajax({
                            type: "POST",
                            url: "deleteslot.php",
                            data: {
                                day: day,
                                time: time,
                                date: date,
                                description: description
                            },
                            success: function (response) {
                                console.log(response);
                                myModal2.hide()
                                window.location.href = "table.php";
                                const submitbtn = document.getElementById('selectdatebtn')
                                submitbtn.click();
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });

                    })


                });
            });
        });


    </script>


</body>

</html>