<!-- Classes and objects are the two main aspects of object-oriented programming.

A class is a template for objects, and an object is an instance of a class.

When the individual objects are created, they inherit all the properties and behaviors from the class, but each object will have different values for the properties.

Let's assume we have a class named Car. A Car can have properties like model, color, etc. We can define variables like $model, $color, and so on, to hold the values of these properties.

When the individual objects (Volvo, BMW, Toyota, etc.) are created, they inherit all the properties and behaviors from the class, but each object will have different values for the properties.

If you create a __construct() function, PHP will automatically call this function when you create an object from a class. -->


<?php
class car {
    public $color;
    public $model;
    function assign($parameter1,$parameter2) {
        $this->color=$parameter1;
        $this->model=$parameter2;
    }
    function output(){
        echo "the color is  $this->color";
        echo "the model is  $this->model";
    }
}
$mycar=new car();
$mycar -> assign("blue","honda");
$mycar -> output();

?>