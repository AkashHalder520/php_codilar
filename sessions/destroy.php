<?php
        session_start();

        echo "<h1>User has successfully logged out</h1>";
        session_destroy();
        setcookie('emailId',$_SESSION['emailId'],time()+10);

        if(isset($_COOKIE["emailId"]))
        {
                header("location:./index.php");
        }
?>