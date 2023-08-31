<?php
session_start();


session_unset();// to remove session

header("location:index.php")
?>