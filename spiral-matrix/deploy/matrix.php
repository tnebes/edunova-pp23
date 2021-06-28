<?php
    set_time_limit(5);
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
     *      0 N,
     *      1 E,
     *      2 S,
     *      3 W
     */
    class MatrixContent
    {
        public $number;
        public $direction;

        // TODO should remove the ?int maybe
        public function __construct($number, $direction)
        {
            $this->number = $number;
            $this->direction = $direction;
        }
    }

    /**
     * Class for storing the current and the potential future position when generating the matrix.
     */
    class Position
    {
        public $column;
        public $row;

        public function __construct($column, $row)
        {
            $this->column = $column;
            $this->row = $row;
        }
    }

    /**
     * Function generates an empty array with the number of rows and columns
     * defined by the user.
     */
    function generateArray($rows, $columns)
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
     * 3 - user just visited the website
     */
    function checkInput()
    {
        // TODO needs to account for the two new arguments
        global $_GET;
        if (!(isset($_GET['columns']) && isset($_GET['rows'])))
        {
            return 3; // arrival
        }
        if ($_GET['columns'] == '' || $_GET['rows'] == '')
        {
            return 1; // no input given
        }

        $columns = $_GET['columns'];
        $rows = $_GET['rows'];
      
        if ((int) $columns <= 0 || (int) $rows <= 0)
        {
            return 2; // input not valid 
        }
        return 0;
    }

    /**
     * Prints an error according to input
     */
    function printError($code)
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
            case 3: $message = 'Awaiting input...';
                    break;
            default: $message = 'Something went wrong.';
                    break;
        }
        print($begin . $message . $end);
    }

    /**
     * The function returns an array that contains a spiral matrix
     */
    function getNumbers($desiredNumber, $numbers, $spiralDirection, $givenStartPosition)
        {
        $currentNumber = 0;
        $maxColumns = count($numbers) - 1;
        $maxRows = count($numbers[0]) - 1;
        // how the matrix should be populated when moving through the matrix.
        $startPositions = // 0 NE, 1 SE, 2 SW, 3 NW
        [
            new Position(0, count($numbers[0]) - 1), // NE
            new Position(count($numbers) - 1, count($numbers[0]) - 1), // SE
            new Position(count($numbers) - 1, 0), // SW
            new Position(0, 0) // NW
        ];
        $directions =
        [
            'north' => [-1, 0],
            'east' => [0, 1],
            'south' => [1, 0],
            'west' => [0, -1]
        ];
        $anticlockwise =
        [
            $directions['south'],
            $directions['east'],
            $directions['north'],
            $directions['west']
        ];
        $clockwise = 
        [
            $directions['north'],
            $directions['east'],
            $directions['south'],
            $directions['west']
        ];
        // [0] for anticlockwise, [1] for clockwise
        $startingDirections =
        [
            [3, 0], // NE
            [0, 3], // SE
            [1, 2], // SW
            [2, 1], // NW
        ];
        // picking the proper direction
        $chosenDirection = $spiralDirection ? $anticlockwise : $clockwise;
        $currentDirectionIndex = $startingDirections[$givenStartPosition][$spiralDirection ? 0 : 1]; // extremely cursed.
        $currentPosition = $startPositions[$givenStartPosition];
        $nextPosition = clone $currentPosition;
        $previousPosition = clone $currentPosition;

        while ($currentNumber <= $desiredNumber)
        {
            setValueToCell($numbers, ++$currentNumber, $currentPosition->column, $currentPosition->row);
            setDirectionToCell($numbers, $currentDirectionIndex, $previousPosition->column, $previousPosition->row, $spiralDirection);

            if ($currentNumber >= $desiredNumber)
            {
                setDirectionToCell($numbers, $currentDirectionIndex, $previousPosition->column, $previousPosition->row, $spiralDirection);
                break;
            }

            // assigning a new $nextPosition
            while (true)
            {

                if ($currentDirectionIndex > 3) // should we loop back to the beginning direction?
                {
                    $currentDirectionIndex = 0;
                }

                // assume next position
                $nextPosition->column += $chosenDirection[$currentDirectionIndex][0];
                $nextPosition->row += $chosenDirection[$currentDirectionIndex][1];

                // checking if out of bounds
                if ($nextPosition->column > $maxColumns || $nextPosition->row > $maxRows ||
                    $nextPosition->column < 0 || $nextPosition->row < 0)
                {
                    $currentDirectionIndex++;
                    $nextPosition = clone $currentPosition;
                    continue;
                }

                if ($numbers[$nextPosition->column][$nextPosition->row] instanceof MatrixContent)
                {
                    $currentDirectionIndex++;
                    $nextPosition = clone $currentPosition;
                    continue;      
                }

                $previousPosition = clone $currentPosition;
                $currentPosition = clone $nextPosition;
                break;
            }
        }
        return $numbers;
    }

    /**
     * Function that creates an object and assigns is the passed value
     * Returns true if success
     */
    function setValueToCell(&$matrix, $value, $column, $row)
    {
        $matrix[$column][$row] = new MatrixContent($value, null);
        return true;
    }

    /**
     * Function that assigns a direction to a given position in the matrix.
     * Returns true if success
     */
    function setDirectionToCell(&$matrix, $direction, $column, $row, $spiralDirection)
    {
        // cursed
        if (!$spiralDirection)
        {
            if ($direction == 2)
            {
                $direction = 0;
            }
            else if ($direction == 0)
            {
                $direction = 2;
            }
        }
        $matrix[$column][$row]->direction = $direction;
        return true;
    }

    function valuePopulated(&$matrix, $column, $row)
    {
        if ($matrix[$column][$row] > 0)
        {
            return true;
        }
        return false;
    }

    /**
     * Function generates the matrix in html.
     */
    function generateOutput($matrix, $desiredNumber, $spiralDirection)
    {
        for ($i = 0; $i < count($matrix); $i++)
        {
            print('<div class="row">');
            for ($j = 0; $j < count($matrix[$i]); $j++)
            {
                if ($matrix[$i][$j]->number == $desiredNumber)
                {
                    print(generateCell($matrix[$i][$j], true));    
                }
                else
                {
                    print(generateCell($matrix[$i][$j], false));
                }                
            }
            print('</div>');
        }
    }

    /**
     * Function generates the contents and the cell itself.
     */
    function generateCell($content, $final)
    {
        $begin = "<div class=\"matrixContent\">";
        $end = "</div>";
        $arrow = '';
        $arrowClass = '';
        if ($final)
        {
            return $begin . $content->number . $end;
        }
        switch ($content->direction)
        {
            case 0: $arrowClass = 'arrowDown';
                    break;
            case 1: $arrowClass = 'arrowLeft';
                    break;
            case 2: $arrowClass = 'arrowUp';
                    break;
            case 3: $arrowClass = 'arrowRight';
                    break;
            default: break;
        }
        $arrowBoxBegin = '<div class = "arrow ' . $arrowClass . '">';

        return $begin . $content->number . $arrowBoxBegin . $arrow . $end . $end;
    }

    /**
     * main
     */
    function main()
    {
        $inputValidity = checkInput();

        if ($inputValidity != 0)
        {
            printError($inputValidity);
            exit(1); // something went wrong.
        }
        
        $columns = ((int) $_GET['columns']);
        $rows = ((int) $_GET['rows']);
        $spiralDirection = filter_var($_GET['direction'], FILTER_VALIDATE_BOOLEAN); // true = anticlockwise, false = clockwise
        $startPosition = (int) $_GET['start']; // 0 NE, 1 SE, 2 SW, 3 NW, 4 MID
        $desiredNumber = $columns * $rows;
        $numbers = generateArray($rows, $columns);
        $numbers = getNumbers($desiredNumber, $numbers, $spiralDirection, $startPosition);
        // print("<pre>");
        // print_r($numbers);
        // print("</pre>");
        generateOutput($numbers, $desiredNumber, $spiralDirection);
    }


?>