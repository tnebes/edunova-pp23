<?php declare(strict_types = 1);
?>
<!--
    Author: tnebes
    18 June 2021
    spiral matrix exercise
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spiral Matrix exercise</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>
<body onload="main();">
    <div class="title">
        <h1 id="titleTitle">
            Spiral Matrix in PHP
        </h1>
        <p id="explanation">
            The goal of this exercise is to create an application which will generate a spiral matrix.<br />
            The spiral matrix has an input of two numbers. The numbers specify the width and height of the matrix.<br />
            The application will, upon clicking "Generate matrix", create a spiral matrix.<br />
            The starting position is determined by the user, as well as the spiral direction.<br />
            The matrix will fill out the squares with numbers from 1 to 'n' where 'n' is the product of the two numbers supplied by the user.<br />
        </p>
    </div>
    <div class="main">
        <div class="inputBox">
            <div class="rotatedText">input</div>
            <form method="get" class="inputForm">
                <div>
                    <p>
                        Rows:
                    </p>
                    <input type="text" name="columns" size="8" id="column-input">
                </div>
                <div>
                    <p>
                        Columns:
                    </p>
                    <input type="text" name="rows" size="8" id="row-input">
                </div>
                <div>
                    <p>Spiral direction:</p>
                    <select name="direction" id="spiral-direction-input">
                        <option value="true">Anticlockwise</option>
                        <option value="false">Clockwise</option>
                    </select>
                </div>
                <div>
                    <p>Start location:</p>
                    <select name="start" id="start-location-input">
                        <option value="0">Top right</option>
                        <option value="1">Bottom right</option>
                        <option value="2">Bottom left</option>
                        <option value="3">Top left</option>
                    </select>
                </div>
                <button type="submit">Generate matrix</button>                
            </form>
        </div>
        <div class="outputBox">
            <div class="rotatedText" id="output">output</div>
            <div class="matrixContainer">
                <?php
                require 'matrix.php';
                ?>
            </div>
        </div>
    </div>
</body>
</html>