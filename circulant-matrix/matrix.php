<?php declare(strict_types = 1);
/**
 * Author: tnebes
 * 18 June 2021
 * Circulant matrix exercise
 */

/*
* Write an algorithm that cyclically fills a 2d array with values, starting
* from bottom right, bottom left, top left, ... centre.
* 
* e.g.
* 
* 9 10 11 12 13
* 8 21 22 23 14
* 7 20 25 24 15
* 6 19 18 17 16
* 5 4  3  2  1
* 
* input is two integers representing the width and height of the matrix
*/

    main();

    function main() : void 
    {
        if (checkInput() != 0)
        {
            exit(1); // something went wrong.
        }
        $columns = ((int) $_GET['columns']);
        $rows = ((int) $_GET['rows']);
        $desiredNumber = $columns * $rows;
        $numbers = generateArray($rows, $columns);
        $numbers = getNumbers($columns, $rows, $desiredNumber, $numbers);
        generateOutput($numbers, $columns, $rows);
    }

    /**
     * Function generates an empty array with the number of rows and columns
     * defined by the user.
     */
    function generateArray(int $rows, int $columns) : array
    {
        $array = [];
        for ($i = 0; $i < $columns; $i++)
        {
            for ($j = 0; $j < $rows; $j++)
            {
                $array[$i][$j] = 0;
            }
        }        
        return $array;
    }

    /**
     * Input is the GET from URL.
     * 
     * Output:
     * 0 - all ok
     * 1 - no input given
     * 2 - input is invalid (negative or gibberish)
     */
    function checkInput() : int
    {
        global $_GET;
        if (!(isset($_GET['columns']) && isset($_GET['rows'])))
        {
            // echo 'Please provide input.';
            return 1; // no input given
        }

        $columns = $_GET['columns'];
        $rows = $_GET['rows'];
      
        if ((int) $columns <= 0 || (int) $rows <= 0)
        {
            // echo 'Input is not valid.';
            return 2; // input not valid 
        }
        return 0;
    }

    /**
     * The function returns an array that contains a circulant matrix
     */
    function getNumbers(int $columns, int $rows, int $desiredNumber, array $numbers) : array
    {
        $minColumn = 0;
        $maxColumn = $columns - 1; // ?
        $minRow = 0;
        $maxRow = $rows - 1; // ?
        $currentNumber = 1;

        while ($currentNumber <= $desiredNumber)
        {
            // L<-R
            for ($j = $maxRow; $j >= $minRow; $j--)
            {
                $numbers[$maxColumn][$j] = $currentNumber++;
                if ($currentNumber > $desiredNumber)
                {
                    return $numbers;
                }
            }
            $maxColumn--;

            // L
            // /\
            // L
            for ($i = $maxColumn; $i >= $minColumn; $i--)
            {
                $numbers[$i][$minRow] = $currentNumber++;
                if ($currentNumber > $desiredNumber)
                {
                    return $numbers;
                }
            }
            $minRow++;

            // L->R
            for ($j = $minRow; $j <= $maxRow; $j++)
            {
                $numbers[$minColumn][$j] = $currentNumber++;
                if ($currentNumber > $desiredNumber)
                {
                    return $numbers;
                }
            }
            $minColumn++;

            // R
            // \/
            // R
            for ($i = $minColumn; $i <= $maxColumn; $i++)
            {
                $numbers[$i][$maxRow] = $currentNumber++;
                if ($currentNumber > $desiredNumber)
                {
                    return $numbers;
                }
            }
            $maxRow--;
        }

        return $numbers;
    }

    /**
     * Function generates the matrix in html.
     */
    function generateOutput(array $matrix, int $columns, int $rows) : void
    {
        foreach ($matrix as $row)
        {
            print("<div class=\"row\">");
            foreach ($row as $cell)
            {
                print(generateCell($cell));
            }
            //print("<br />");
            print("</div>");
        }
        print("<pre>");
        print_r($matrix);
        print("</pre>");
    }

    function generateCell(int $number) : string
    {
        $begin = "<div class=\"matrixContent\">";
        $end = "</div>";
        return $begin . $number . $end;
    }

?>