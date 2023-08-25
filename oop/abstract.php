<?php

abstract class bankacc {
    abstract function id();// abstruct function should not contain any body
} // object not created in abstract function

class bank1 extends bankacc{
    function id(){ // to use abstrat function we have to create a different class
        echo "bank 1 id";
    }
}

class bank2 extends bankacc{
    function id(){
        echo "bank 2 id";
    }
}

$obj1=new bank1();
$obj1->id();
$obj2=new bank1();
$obj2->id();
?>