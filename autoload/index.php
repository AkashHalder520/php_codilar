<?php 
// include __DIR__ ."/classes/first.php";
// include __DIR__ ."/classes/second.php";
// include __DIR__ ."/classes/third.php";

// if there are 100s of file we cant load them one by one so we use a autoload function for autmatic load


function custom_autoload($classname){
$file=__DIR__."/classes/".$classname.".php";
if(file_exists($file)){
    include $file;
}
}
spl_autoload_register("custom_autoload");
$obj1= new first();
$obj2= new second();
$obj3= new third();
?>