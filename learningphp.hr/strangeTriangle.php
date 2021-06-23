<?php

if (!isset($_GET['num']) || $_GET['num'] < 1)
    {
        exit(1);
    }

$desiredNum = $_GET['num'];

/**
 * Repeat 'num' times
 */
print("<pre>");
for ($i = 1; $i <= $desiredNum; $i = $i++)
{
    /**
     * Empty spaces for producing the triangle
     */
    for ($j = 1; $j < ($desiredNum - $i) / 2; $j++)
    {
        print(" ");
    }

    /**
     * Prints the numbers
     */

    $increment = false;
    for ($j = $i; $j > $i;)
    {
        if ($increment)
        {
            print($j++);
        }
        else
        {
            print($j--);
        }
        if ($j < 2)
        {
            $increment = true;
        }
    }
    /**
     * Empty spaces for triangle
     */
    for ($j = 0; $j < ($desiredNum - $i) / 2; $j++)
    {
        print(" ");
    }
    print("\n");
}
print("</pre>");

?>
