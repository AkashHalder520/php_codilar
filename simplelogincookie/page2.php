<?php
 if(!isset($_COOKIE["email"]))
 header("Location:./timeout.php");
 else
 $name=$_COOKIE["email"];
 echo "hello $name "
?>