<!-- incase of php it doesnt allow multiple inheritance like 2parent 1 child 
Interface can only contain abstract function without abstruct keyword
In interface  we can not define variable but in abstruct we can
No constructor in interface
All function must be public

in interface all interface class fucntion name and derived class fucntion name should be equal including same number of parameter
-->
<?php
interface class1
{
    function add($a, $b); // we can declear a variable 
// protected $property="my name is akash"; // can not use any property or variable
}
interface class2
{
    function sub($a, $b);
}
interface class3
{
    function bye();
}

class thirdclass implements class1,class2,class3
{
    function add($a, $b)
    {
        $sum = $a + $b;
        echo $sum;

    }
    function sub($a, $b)
    {
        $ans = $a - $b;
        echo $ans;
    }
    function bye()
    {
        echo "bye";
    }
}
$obj = new thirdclass();
$obj->add(10, 10);
$obj->sub(10, 10);
$obj->bye()
    ?>