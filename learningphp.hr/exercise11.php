<?php

    if (!(isset($_GET['columns']) && isset($_GET['rows'])))
    {
        exit(1);
    }

    $columns = $_GET['columns'];
    $rows = $_GET['rows'];

    for ($i = 0; $i < $columns; $i++)
    {
        for ($j = 0; $j < $rows; $j++)
        {
            print("*");
        }
        print("<br />");
    }

?>