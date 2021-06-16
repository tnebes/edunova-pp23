<?php

$myArray = [1, 2, 3, 4, 5, 6];

// an array of arrays

$arrayOfArrays = 
[
    [0, 0, 0],
    [0, 0, 0],
    [0, 0, 0],
];

$arrayOfArrays[1][1] = 1;

print("<pre>");
print_r($arrayOfArrays);
print("</pre>");

// using a foreachloop 

$myArray = ['hello', 'world', 'aeiou'];
foreach($myArray as $element)
{
    echo $element, "<br />";
}