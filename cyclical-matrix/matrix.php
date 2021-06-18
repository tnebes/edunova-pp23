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
        $columns = $_GET['columns'];
        $rows = $_GET['rows'];
        $desiredNumber = $columns * $rows;

        while ($desiredNumber != 0)
        {

        }

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

?>