<?php declare(strict_types=1);

    function createTable(int $column, int $row): string
    {
        $html = "<table>";
        for ($i = 1; $i <= $column; $i++)
        {
            $html .= "<tr>";
            $html .= "$i";
            for ($j = 1; $j <= $row; $j++)
            {
                $html .= "<th>";
                $html .= "" . $j * $i;
                $html .= "</th>";
            }
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }
    print(createTable(4,4));

?>