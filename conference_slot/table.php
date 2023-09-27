<?php
session_start();
include('nav.php');
$email = $_SESSION['email'];
if (!$email) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Time Table</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <h1 class="mt-4">Booking Slot</h1>
        <?php
        echo "Today is " . date("Y-m-d") . "<br>";
        // $fullDay = date("l", strtotime($dateString));
        // echo "Today is " . date("l");
        ?>
        <form method="post" action="">
            <label for="dateInput">Select a Date:</label>
            <input type="date" id="dateInput" name="selectedDate" value="<?php echo date('Y-m-d'); ?>">
            <input type="submit" value="Submit" id="selectdatebtn">
        </form>
        <!-- getting the input date -->
        <?php
        $dayOfWeek = $selectedDate = $datearr = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the selected date from the form
            $selectedDate = $_POST["selectedDate"];
            $dayOfWeek = date("l", strtotime($selectedDate));

            // Process the date and day (e.g., display it)
            echo "<h3>You selected the date: " . $selectedDate."</h3><br>";
            echo "<h4>You selected the day: " . $dayOfWeek."</h4>";
        }
        ?>

        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Time Slot</th>
                    <?php
                    $datearr = '';
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
                    $dayarr = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

                    $numDates = count($dayarr);

                    for ($i = 0; $i < $numDates; $i++) {
                        if (!$datearr) {
                            echo "<th>$dayarr[$i]</th>";
                        } else
                            echo "<th>$dayarr[$i]$datearr[$i]</th>";
                    }
                    // for ($i = 0; $i < $currentDateIndex; $i++) {
                    //     echo "<th>{$dayarr[$i]}</th>";
                    // }
                    ?>
                </tr>
            </thead>
            <tbody>
                <!-- if($Dayindex==0){ -->

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


                $sql = "SELECT * FROM booking_slot";
                $result = $mysqli->query($sql);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                // echo "<pre>";
                // print_r($rows);
                // echo "</pre>";

                $time_slots = array('10-11 AM', '11-12 AM', '12-1 PM', '2-3 PM', '3-4 PM', '4-5 PM', '5-6 PM', '6-7 PM');
                foreach ($time_slots as $time_slot) {
                    echo "<tr>";
                    echo "<td>$time_slot</td>";
                    // $currentDay = date('l');
                    // $Dayindex = array_search($dayOfWeek, $dayarr);
                
                    // if($Dayindex==0){
                    for ($i = 0; $i < count($dayarr); $i++) {
                        $day = $dayarr[$i];
                        $date = $datearr[$i] ?? '';

                        $sql = "SELECT * FROM booking_slot WHERE day = '$day' AND slot_time = '$time_slot' AND date = '$date'";
                        $result = $mysqli->query($sql);
                        // $rows = $result->fetch_all(MYSQLI_ASSOC);
                
                        // $description=$rows[0]['description'];
                
                        // Check if data exists
                        if ($result->num_rows > 0) {
                            // Data exists, show "View" button
                            $rows = $result->fetch_all(MYSQLI_ASSOC);
                            $description = $rows[0]['description'];
                            $name=$rows[0]['username'];
                            $email=$rows[0]['email'];
                            // echo "<php>";
                            // print_r($rows[0]['description']);
                            // echo "</php>";
                            echo "<td><button class='btn btn-danger view-button' data-date='$date' data-day='$day' data-time='$time_slot'  date-description='$description' data-name='$name' data-email='$email' >View</button></td>";
                        } else {
                            // Data doesn't exist, show "Book" button
                            echo "<td><button class='btn btn-primary book-button' data-date='$date' data-day='$day' data-time='$time_slot' data-name='$name' data-email='$email'>Book</button></td>";
                        }
                        
                    }
                    
                

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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
                    <form id="bookingForm" method="post" action="bookingstore.php">
                        <input type="hidden" name="date" id="modalDateInput">
                        <input type="hidden" name="day" id="modalDayInput">
                        <input type="hidden" name="time" id="modalTimeInput">
                        Task:<input type="text" name="description" id="description" required>

                        <!-- Add other form fields if needed -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="bookingForm" class="btn btn-primary">Submit</button>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit"  id="deletebtn" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        // JavaScript to access data-day and data-time attributes
        document.addEventListener("DOMContentLoaded", function () {
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

                
                    const deletebtn = document.getElementById("deletebtn");
                    deletebtn.addEventListener("click", function () {
                        $.ajax({
                            type: "POST",
                            url: "deleteslot.php",
                            data: {  day:day,
                                     time:time,
                                     date:date,
                                     description:description
                                    },
                            success: function (response) {
                                // Handle the response from the PHP page here
                                console.log(response);
                                myModal2.hide()
                                // Redirect to "table.php"
                                window.location.href = "table.php";

                               
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