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
        if (isset($_GET['firstNumber']) && isset($_GET['secondNumber']))
        {
            echo $_GET['firstNumber'] + $_GET['secondNumber'];
        }
    ?>
    <form action="" method="get">

        <label for="firstNumber">First number</label>
        <input type="text" name="firstNumber" id="firstNumber" />

        <label for="secondNumber">Second number</label>
        <input type="text" name="secondNumber" id="secondNumber" />

        <input type="submit" value="Calculate!" />

    </form>

</body>
</html>
