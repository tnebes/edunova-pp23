<?php declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Love calculator</title>
      <link rel="stylesheet" href="./assets/css/style.css">
   </head>

   <body>
      <div class="page-content">
         <div class="page-title">
         Love Test
            <div class = "page-explanation">
               <p>
                  Write your and your crush's name.<br />
                  Our magical website will calculate how much in love you two are!<br />
                  The higher the percentage, the more you love each other!
               </p>
            </div>
         </div>
         <div class="love-calculator">
            <div class="love-calculator-main">
               <form action="index.php" method="post">
                  <div class="my-checkbox">
                     <input type="checkbox" name="debug" value="true" id="debug-checkbox">
                     <label for="debug-checkbox"></label>
                  </div>
                  <label for="first-name">
                     <input type="text" name="firstName" id="first-name" placeholder="Name">
                  </label>
                  &
                  <label for="second-name">
                     <input type="text" name="secondName" id="second-name" placeholder="Name">
                  </label>
                  <button type="submit">Calculate <span id="heart">❤</span></button>
               </form>
            </div>
            <div class="love-calculator-content">
               <?php
                  include_once 'loveCalculator.php';
               ?>
               <div style="height: 300px">
                  <img class="deco-images" id="heart" src="./assets/img/like.png">
               </div>
               <div>
                  <img class="deco-images" id="butterflies" src="./assets/img/butterflies.png">
               </div>   
            </div>
         </div>
         <div id="must-have">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
      </div>
   </body>

</html>