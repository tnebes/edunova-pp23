<?php

print("<pre>");
print_r($_GET);
print("</pre>");

$associativeArray =
    [
        'key' => 'value',
        1 => true,
        false => [1, 1]
    ];

print("<pre>");
print_r($associativeArray);
print("</pre>");

$otherArray =
    [
        'place' =>
        [
            'id' => 1,
            'name' => 'Boston'
        ],
        'name' => 'Bob'
    ];

print("<pre>");
print_r($otherArray);
print("</pre>");

// write
// Pero comes from Osijek

echo $otherArray['name'], " comes from ", $otherArray['place']['name'];


//iterating through associate array
print("<br />");
foreach ($otherArray as $key => $value) {
    if (gettype($value) === 'array') {
        continue;
    }
    echo 'key is ', $key, ' value is ', $value;
}

//iterating through a for loop

$myArray1 =
[
    [
        'id' => 1,
        'name' => 'hello'
    ],
    [
        'id' => 2,
        'name' => 'world'
    ],
    [
        'id' => 3,
        'name' => 'HELLO'
    ]
];

/*
for ($i = 0; $i < count($myArray1); $i++)
{
    foreach($myArray1[$i] as )
}
*/

/*
foreach($podaci as $red){
    foreach($red as $vrijednost){
    echo $vrijednost, '<br />';
    }
    echo $red['sifra'], ' - ', $red['naziv'], '<br />';
    }
*/