<!-- in traits we create a common funtion outside the class and use that funtion in all class  -->
<!-- function name of both the traits should be diff. -->
<!-- same trait name not allowed  -->
<?php

// defining 2 traits message
trait message1
{
    function hell2()
    {
        echo "hello this is 1st trait <br>";
    }
}
trait message2
{
    function hell2()
    {
        echo "hello this is 2nd trait <br>";
    }
}

// class base has same name function as traits message 2
class base
{
    function hell2()
    {
        echo "child hell2<br>";
    }
}

class child extends base
{
    use message2;
    // function hell2()
    // {
    //     echo "child2 hell2<br>";
    // }

}
class accesss2
{
    use message1, message2 {
        // if 2 function of traits are same name to accesss them
        message2::hell2 insteadof message1;//this will print message 2
        message1::hell2 as xyz; //this will rename message 1 function to xyz

    }

}



$obj = new child();
$obj->hell2();
//on calling hell2 if there is no hell2 function but use message2 is there then it will give priority to trait than to parent class 
$obj2 = new accesss2();
$obj2->hell2();
$obj2->xyz()
    ?>
    <!-- ther is a priority in traits  -->