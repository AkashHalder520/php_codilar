<!-- abstract class is mainly used when ee inherit from parent and we have to use that function of parent class  -->
<?php
// abstract means incomplete ... in a abstract class there must be a abstract fucntion ... 
abstract class bankacc {
    // $property="my name is akash";
    abstract function id();
    protected $property="my name is akash";// abstruct function should not contain any body
} // object not created in abstract function... declared a function but not implemented

class bank1 extends bankacc{
    function id(){ // to use abstrat function we have to create a different class
        echo "bank 1 id";
        echo $this->property;
    }
}

class bank2 extends bankacc{
    function id(){
        echo "bank 2 id";
        echo $this->property;
    }
}

$obj1=new bank1();
$obj1->id();
$obj2=new bank2();
$obj2->id();
?>