<?php declare(strict_types = 1);

   if (isset($_SESSION['loginFail']))
   {
      echo '<h2>';
      echo 'Warning';
      echo '</h2>';
      echo '<p style="color: red">';
      echo 'Incorrect email or password. Please try again.';
      echo '</p>';
   }