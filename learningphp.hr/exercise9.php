<?php declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if (!isset($_GET['arg']))
        {
            exit(1);
        }
        $arg = $_GET['arg'];
        if ($arg % 2 == 0)
        {
            for ($i = 2; $i <= $arg; $i = $i + 2)
            {
                print($i . "<br />");
            }
        }
        else
        {
            for ($i = 1; $i <= $arg; $i = $i + 2)
            {
                print($i . "<br />");
            }
        }
    ?>
</body>
</html>