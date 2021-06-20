<?php declare(strict_types = 1);
    /**
     * Author: tnebes
     * 18 June 2021
     * spiral matrix exercise
     */

    /*
    * Write an algorithm that spirally fills a 2d array with values, starting
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

    /**
     * Class for drawing arrows.
     * Contains a number as its content,
     * $direction defined in a clockwise manner:
     *      0 up,
     *      1 right
     *      2 down
     *      3 left
     * $needsArrow defines whether an arrow should be drawn for an object.
     * Objects contains no setters.
     */
    class MatrixContent
    {
        private $number;
        private $direction;
        private $needsArrow;

        public function __construct(int $number, int $direction, bool $needsArrow = false)
        {
            $this->number = $number;
            $this->direction = $direction;
            $this->needsArrow = $needsArrow;
        }

        public function getNumber() : int
        {
            return $this->number;
        }

        public function getDirection() : int
        {
            return $this->direction;
        }

        public function getNeedsArrow() : bool
        {
            return $this->needsArrow;
        }
    }

    /**
     * main
     */
    function main() : void 
    {
        $inputValidity = checkInput();

        if ($inputValidity != 0)
        {
            printError($inputValidity);
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
                $array[$i][$j] = new stdClass();
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
     * Prints an error according to input
     */
    function printError(int $code) : void
    {
        $begin = '<h1>';
        $message = '';
        $end = '</h1>';

        switch($code)
        {
            case 0: break;
            case 1: $message = 'Please provide input.';
                    break;
            case 2: $message = 'Input is not valid.';
                    break;
            default: $message = 'Something went wrong.';
                    break;
        }
        print($begin . $message . $end);
    }

    /**
     * The function returns an array that contains a spiral matrix
     */
    function getNumbers(int $columns, int $rows, int $desiredNumber, array $numbers) : array
    {
        /**
        * $direction defined in a clockwise manner:
        *      0 up,
        *      1 right
        *      2 down
        *      3 left
        */
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
                if ($j != $minRow)
                {
                    $numbers[$maxColumn][$j] = new MatrixContent($currentNumber++, 3, true);
                }
                else
                {
                    $numbers[$maxColumn][$j] = new MatrixContent($currentNumber++, 3, false);
                }
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
                if ($i != $minColumn)
                {
                    $numbers[$i][$minRow] = new MatrixContent($currentNumber++, 0, true);
                }
                else
                {
                    $numbers[$i][$minRow] = new MatrixContent($currentNumber++, 0, false);
                }
                if ($currentNumber > $desiredNumber)
                {
                    return $numbers;
                }
            }
            $minRow++;

            // L->R
            for ($j = $minRow; $j <= $maxRow; $j++)
            {
                if ($j != $maxRow)
                {
                    $numbers[$minColumn][$j] = new MatrixContent($currentNumber++, 1, true);
                }
                else
                {
                    $numbers[$minColumn][$j] = new MatrixContent($currentNumber++, 1, false);
                }
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
                if ($i != $maxColumn)
                {
                    $numbers[$i][$maxRow] = new MatrixContent($currentNumber++, 2, true);
                }
                else
                {
                    $numbers[$i][$maxRow] = new MatrixContent($currentNumber++, 2, false);
                }
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
    }

    /**
     * Function generates the contents and the cell itself.
     */
    function generateCell(MatrixContent $content) : string
    {
        $begin = "<div class=\"matrixContent\">";
        $end = "</div>";
        if (!$content->getNeedsArrow())
        {
            return $begin . $content->getNumber() . $end;
        }
        $arrow = '';
        switch ($content->getDirection())
        {
            case 0: $arrow = '↑';
                    break;
            case 1: $arrow = '→';
                    break;
            case 2: $arrow = '↓';
                    break;
            case 3: $arrow = '←';
                    break;
            default: $arrow = 'oops';
                    break;
        }

        return $begin . $content->getNumber() . $arrow . $end;
    }

?>