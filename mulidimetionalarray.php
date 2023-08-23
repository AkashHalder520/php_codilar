<?php 
// $emp= [
//     [1,"krishna","manager",50000],
//     [2,"Akash","Developer",70000],
//     [3,"Mohan","computer operater",90000],
//     [4,"krishna","Driver",40000]
// ];
// echo "<pre>";// this tag is mainy to show in a formatted way
// print_r($emp);
// echo "</pre>";
// // to show tis in tabular form
// echo "<table border='2px' cellspacng='0'>";
// echo "<tr>
// <th>Emp_ID</th>
// <th>Emp Name</th>
// <th>Designation</th>
// <th>Salary</th>
// </tr>";
// foreach($emp as $ar1){
//     echo "<tr>";

// foreach($ar1 as $arr2){
//     echo"<td> $arr2 </td>";
// }
// echo "</tr>";
// }
// echo "</table>";

//multidimentional assoiative array
$marksofstd= [
    "akash"=>[
        "physics"=>78,
        "maths"=>70,
        "chemistry"=>76
    ],
    "Rakesh"=>[
        "physics"=>58,
        "maths"=>80,
        "chemistry"=>66
    ],
    "Reshmi"=>[
        "physics"=>88,
        "maths"=>73,
        "chemistry"=>96
    ],
    "Mohan"=>[
        "physics"=>98,
        "maths"=>96,
        "chemistry"=>87
    ]
    ];
    echo "<table border='2px' cellspacng='0'>";

    
echo "<tr>
<th>Name</th>
<th>Physics</th>
<th>Maths</th>
<th>Chemistry</th>
</tr>";
foreach($marksofstd as $key=>$arrx){
echo "<tr>
    <td>$key</td>";
    foreach($arrx as $key=>$value){
        echo "<td>$value</td>";
    }
echo "</tr>";
}
echo "</table>"

?>