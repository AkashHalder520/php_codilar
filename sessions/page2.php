<?php 

    session_start();
    if(isset($_SESSION['emailId']))
    {
        echo "<h3>Hello Customer!!!</h3>";
        echo "<h3>Your Email Id:".$_SESSION['emailId']."</h3>";
        echo "<h3>Your Password:".$_SESSION['password']."</h3>";
        echo "<a href='./destroy.php'>Logout</a>";
    }
    else{
        header("location:page1.php");
    }
?>