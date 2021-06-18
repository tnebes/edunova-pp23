<!-- 
    Author: tnebes
    18 June 2021
    Cyclical matrix
 -->

<?php declare(strict_types = 1);

    main();

    function main() : void 
    {
        if (checkInput() != 0)
        {
            exit(1); // something went wrong.
        }
        $columns = (int) $_GET['columns'];
        $rows = (int) $_GET['rows'];
        $desiredNumber = $columns * $rows;
        $numbers = getNumbers($columns, $rows, $desiredNumber);

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
    function getNumbers(int $columns, int $rows, int $number) : array
    {
        $array = [];
        $minColumn = 0;
        $maxColumn = $columns;
        $minRow = 0;
        $maxRow = $rows;

        while ($number != 0)
        {

        }

        return [];
    }

?>