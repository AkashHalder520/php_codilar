<?php
//strlen() returns the length of the string
$sentene= "my name is akash";
$len= strlen($sentene);
echo "$len <br>";

//str_word_count() returns then number of words
$noofword=str_word_count($sentene);
echo "$noofword<br>";

//strrev() returns reverse of the string
$revstr=strrev($sentene);
echo "$revstr";
echo $revstr?"true":"false";

$arr = array('Hello','World!','Beautiful','Day!');
echo implode(" ",$arr); // imlode function is used to convert from array to string implode(separator,array)
?>