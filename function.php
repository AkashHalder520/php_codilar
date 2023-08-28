<?php
function hello($element1 = "akash", $element2)
{
    echo "element1=>$element1 element2=>$element2";
    return $element1 . $element2;
    // output will be element1=>yahoo element2=>google  default value akash gets over ride
}
$var = hello("yahoo", "google");
echo "return =>$var<br>";
//yahoo google

// we can declear the return type 

function addnumber(float $a, float $b): int
{
    return $a + $b;
}
echo addnumber(5.4, 4.5); //9

//passing argument by reference
function wow($a)
{
    $a = "hey";

}
$str = "akash";
wow($str);
echo "$str <br>"; // akash 

function wowx(&$a)
{ //& its used to pass by reference where we store the address as well as data
    $a = "hey";

}
$str = "akash";
wowx($str);
echo "$str"; // hey as we passed te reference 
?>