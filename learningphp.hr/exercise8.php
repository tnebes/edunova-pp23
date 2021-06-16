<?php
/* program writes the sum of all parameters regardless of key */

print("<pre>");
print_r($_GET);
print("</pre>");



// 
// http://learningphp.hr/exercise8.php?a=1&b=2&c=3&d=4&e=5


$sum = 0;


foreach($_GET as $value)
{
    $sum += (int) $value;
    // $sum = $sum + (int) $value;
    echo $sum, "<br />"; // checking if im doin it right
}

print("<br />The sum is $sum"); // this is the solution