<!-- an array stores multiple value in one single variables -->
<?php
// $cars=array("akash","rohan","rahul");
// var_dump($cars);
$arrs = [1, 3, 2, 4, 4, 6, 5, 6];
$newarrs = [];
foreach ($arrs as $value) {
    if(!in_array($value,$newarrs)){
        $ss=array_push($newarrs,$value);// returns the new number of elements
    }
  
}
//echo" length =$ss<br>";
// foreach ($newarrs as $item) {
//     echo $item;
// }
print_r($newarrs); // Array ( [0] => 1 [1] => 3 [2] => 2 [3] => 4 [4] => 6 [5] => 5 ) 
echo "<br>";


//associative array 
$arr= array(
"name" => "akash",
"age" => 23,
"weight" =>60.87,

);
// print_r($arr);
foreach($arr as $key=>$value){
echo "<br>index=>$key value=> $value";
}
?>