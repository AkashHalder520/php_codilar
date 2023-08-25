<?php

/*      
    Access Modifiers in Php: public,private and protected
    by default public
*/

// class Class1{
//     protected $x=90;

// }

// class Class2 extends Class1{
//    function  getter()
//    {
//         return $this->x;
//    }
// }

// $obj=new Class1();
// $obj2=new Class2();
// echo $obj2->getter();









class A {
     protected function demos()
    {
        $x=10;
        $y=10;
        echo "Hello this is demo function from parent A <br>";
        return [$x,$y];// to access x in class b we have to return then acces it A::demos
    }
}

class B extends A{
   function demos()
    {
         echo "Hello this is demo function from parent B <br>";
        [$first,$second]=A::demos();
         echo $first+$second;
    }
}

class C extends B{
     function demos()
    {
        echo "Hello this is demo function from parent c <br>";

    }
}

$obj=new B();

$obj->demos();
// echo $obj->x;

//private only within the class scope 
//protected can be accessed through the child class

?>