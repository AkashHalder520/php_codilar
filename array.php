<!-- an array stores multiple value in one single variables -->
<?php
// $cars=array("akash","rohan","rahul");
// var_dump($cars);
$arrs = [1, 3, 2, 4, 4, 6, 5, 6];
$newarrs = [];
foreach ($arrs as $value) {
    if (count($newarrs) === 0) {
        array_push($newarrs, $arrs[0]);
        // $newarrs[]=$arrs[0];
    } else {
        foreach ($newarrs as $valuex) {

            if ($valuex != $value) {
                array_push($newarrs, $value);
                // $newarrs[]=$value;
            }
        }
    }
}
foreach ($newarrs as $item) {
    echo $item;
}
?>