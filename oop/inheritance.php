<?php 


class A {
    function __construct()
    {
        echo "<br> This is parent class constructor";
    }

    function fun1()
    {
        echo "<br> This is parent fun1";
    }
}

class child extends A{
    function __construct()
    {
        echo "This is child class constructor";
        parent::__construct();
    }
    function fun1()
    {
        echo "<br> This is child fun1";
        parent::fun1();
    }

}

class child2 extends child{
    function __construct()
    {
        echo "This is child2 class constructor";
        parent::__construct();
    }
    function fun1()
    {
        echo "<br> This is child2 fun1";
        A::fun1();
    }

}

$obj=new child2;
$obj->fun1();


?>