<?php
class class1{
   public $var="akash";// we have to defne if its public or private
//if used private can not used or called ouside the class 
 // by default public
function func1(){
        echo "function one <br>";
        $this->var="ramesh";
        

    }
    function func2(){
        echo "function two";
        
    }

}
$obj =new class1();
$obj2 =new class1();
$obj->func1();
echo $obj->var."this is object 1<br>";//we dont have to use $ for accessing variable from class
echo $obj2->var."this is object 2 <br>";//
?>