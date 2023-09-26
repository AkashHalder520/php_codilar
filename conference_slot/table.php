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
            <input type="date" id="dateInput" name="selectedDate">
            <input type="submit" value="Submit">
        </form>
        <!-- getting the input date -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the selected date from the form
            $selectedDate = $_POST["selectedDate"];
            $dayOfWeek = date("l", strtotime($selectedDate));

            // Process the date and day (e.g., display it)
            echo "You selected the date: " . $selectedDate;
            echo "You selected the day: " . $dayOfWeek;
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Time Slot</th>
                    <?php
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
                    print_r($datearr);

                    // $dayarr = array(date("Y-m-d"), date("Y-m-d", strtotime("+1 day")), date("Y-m-d", strtotime("+2 days")), date("Y-m-d", strtotime("+3 days")), date("Y-m-d", strtotime("+4 days")));
                    $dayarr = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

                    $numDates = count($dayarr);

                    for ($i = 0; $i < $numDates; $i++) {

                        echo "<th>{$dayarr[$i]}{$datearr[$i]}</th>";
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
                $time_slots = array('10-11 AM', '11-12 AM', '12-1 PM', '2-3 PM', '3-4 PM', '4-5 PM', '5-6 PM', '6-7 PM');
                foreach ($time_slots as $time_slot) {
                    echo "<tr>";
                    echo "<td>$time_slot</td>";
                    // $currentDay = date('l');
                    // $Dayindex = array_search($dayOfWeek, $dayarr);
                
                    // if($Dayindex==0){
                    for ($i = 0; $i < count($dayarr); $i++) {
                        $day = $dayarr[$i];
                        $date = $datearr[$i];
                        // foreach ($dayarr as $day) {
                        // Add data attributes for date and time to the button
                
                        echo "<td><button class='btn btn-primary book-button' data-date='$date' data-day='$day' data-time='$time_slot'>Book</button></td>";
                    }
                    // }
                    // else{
                    //     for($i=0;$i<$Dayindex;$i++){
                    //         $day = $dayarr[$i];
                    //         echo "<td><button class='btn btn-danger book-button' data-day='$day' data-time='$time_slot'>view</button></td>";
                    //     }
                    //     for($i=$Dayindex;$i<count($dayarr);$i++){
                    //         $day = $dayarr[$i];
                    //         $date=$datearr[$i];
                    //         echo "<td><button class='btn btn-primary book-button' data-date='$date' data-day='$day' data-time='$time_slot'>Book</button></td>";
                    //     }
                    // }
                

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<!-- modal -->
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
                        Task:<input type="text" name="description" id="description">

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
    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // JavaScript to access data-day and data-time attributes
        document.addEventListener("DOMContentLoaded", function () {
            const bookButtons = document.querySelectorAll(".book-button");

            bookButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    const day = button.getAttribute("data-day");
                    const time = button.getAttribute("data-time");
                    const date = button.getAttribute("data-date")
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
                                <p>Time: ${time}</p>`;
                    modalContent.innerHTML = content;

                    const myModal = new bootstrap.Modal(document.getElementById("myModal"));
                    myModal.show();


                });
            });
        });
    </script>


</body>

</html>