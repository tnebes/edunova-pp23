<!--
    Author: tnebes
    18 June 2021
    Cyclical matrix exercise
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyclical Matrix exercise</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">
        <h1 id="titleTitle">
            Cyclical Matrix in PHP
        </h1>
        <p id="explanation">
            The goal of this exercise is to create an application which will generate a cyclical matrix.<br />
            The cyclical matrix has an input of two numbers. The numbers specify the width and height of the matrix.<br />
            The application will, upon clicking "Generate matrix", create a cyclical matrix which starts in the bottom right.<br />
            The matrix will fill out the squares with numbers from 1 to 'n' where 'n' is the product of the two numbers supplied by the user.<br />
            The matrix will be filled out in a manner similar to a spiral.
        </p>
    </div>
    <div class="main">
        <div class="input">
            <form method="get">
                <div>
                    <p>
                        Rows:
                    </p>
                    <input type="text" size="20" name="columns">
                </div>
                <div>
                    <p>
                        Columns:
                    </p>
                    <input type="text" size="20" name="rows">
                </div>
                <input type="submit" value="Generate matrix" style="margin-top: 2em;">                
            </form>
        </div>
        <div class="output">
            <div class="matrixContainer">
                <?php
                require 'matrix.php';
                ?>
            </div>
        </div>
    </div>
</body>
</html>