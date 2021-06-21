<?php
    $counter = 100;
    $minValue = 0;
    while(true)
    {
        print($counter-- . ", ");
        if ($counter < $minValue)
        {
            break;
        }
    }

?>