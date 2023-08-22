<!-- The scope of a variable is the part of the script where the variable can be referenced/used.

PHP has three different variable scopes:

    local
    global
    static 
var_dump() function returns the data type and value:
-->

<?php
$x = 5; // global scope

function myTest() {
  // using x inside this function will generate an error
//   echo "<p>Variable x inside function is: $x</p>";
}
myTest();

echo "<p>Variable x outside function is: $x</p>";

//A variable declared within a function has a LOCAL SCOPE and can only be accessed within that function not outside






?>

<!-- // THE global KEYWORD
// The global keyword is used to access a global variable from within a function. -->


<?php
$x = 5;
$y = 10;

function myTestY() {
  global $x, $y;
  $y = $x + $y; // storing the value in global decleared y
}

myTestY();
echo " global scope $y <br>"; // outputs 15
?> 

<!-- 
STATIC KEYWORD    
Normally, when a function is completed/executed, all of its variables are deleted. However, sometimes we want a local variable NOT to be deleted. We need it for a further job.

To do this, use the static keyword when you first declare the variable: -->
<?php
function myTestx() {
  static $x = 0; // MEMORY OF X WILL NOT GET DELETED
  echo $x;
  $x++;
}
echo " use of static ";
myTestx();
echo "<br>";
myTestx();
echo "<br>";
myTestx();

?>