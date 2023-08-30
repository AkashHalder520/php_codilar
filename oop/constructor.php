<?php 

class car{ 
function __construct($xb) //to use constructor in php we use __construct constructor by default gets called first 
{
    $this->xb=$xb;// have to put all the paremeter in this vsriavle to acces in class constructor
    
    $this->x=89;
    echo "constructor start<br>";
    
    echo "constructor".$this->x." <br>";
}
function func1(){
    echo "function one <br>";
    echo $this->x."<br>";
}
function func2(){
    echo "function two<br>";
    echo $this->xb;
}
function __destruct() //destructor by default gets called at last
{
    echo "destrutor <br>";
}
}
$obj=new car(80);
$obj->func1();
$obj->func2();
?>
