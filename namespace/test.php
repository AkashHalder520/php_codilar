<?php 
include "./class1.php";
include "./class2.php";

$obj=new xyz\sample();
$obj= new  aab\sample();

aab\demo();// for function access 

?>
<!-- if we call 2 same name of class it wont call name clash will happen -->