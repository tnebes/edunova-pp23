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
        $columns = ((int) $_GET['columns']) - 1;
        $rows = ((int) $_GET['rows']) - 1;
        $desiredNumber = (int) $_GET['columns'] * (int) $_GET['rows'];
        $numbers = generateArray($rows);
        $numbers = getNumbers($columns, $rows, $desiredNumber, $numbers);

        print("<pre>");
        // this iterates through keys which is not great.
        // for ($i = 0; $i < count($numbers); $i++)
        // {
        //     for ($j = 0; $j < count($numbers[$i]); $j++)
        //     {
        //         printf("%3d ", $j);
        //     }
        //     print("\n");
        // }
        foreach ($numbers as $oneArray)
        {
            foreach ($oneArray as $value)
            {
                print($value." ");
            }
            print("\n");
        }
        print_r($numbers);
        print("</pre>");


    }

    function generateArray(int $rows) : array
    {
        $array = [];
        for ($i = 0; $i < $rows; $i++)
        {
            $array[$i] = [];
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
     * The function returns an array that contains a cyclical matrix
     */
    function getNumbers(int $columns, int $rows, int $desiredNumber, array $numbers) : array
    {
        $minColumn = 0;
        $maxColumn = $columns;
        $minRow = 0;
        $maxRow = $rows;
        $currentNumber = 1;

        while ($currentNumber != $desiredNumber)
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
            $minRow--;

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

?>