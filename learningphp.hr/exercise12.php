<?php

    if (!isset($_GET['number']))
    {
        exit(1);
    }

    $number = $_GET['number'];

    for ($i = 1; $i < $number; $i++)
    {
        for ($j = 1; $j < $i; $j++)
        {
            print($i);
        }
        print("<br />");
    }

?>