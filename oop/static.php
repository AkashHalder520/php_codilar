<!-- static variable and function doesnt requared any object to create -->
<?php
class base{
    public static $name="Akash Halder";
    static function show($xx) {
        // echo $this->name;
        echo self::$name.$xx;
    }
    // suporse we create a constructor

    function __construct($txt){
        self::show($txt);// here calling the show function 
    }
}   
// echo base::$name; // directly accessing name
// base::show(); // accessing the function

$test=new base("php"); // passing value from constructor
// $test->show();
?>