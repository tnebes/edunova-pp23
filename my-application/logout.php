<?php declare(strict_types = 1);

   session_start();
   if (isset($_SESSION['authorised']))
   {
      session_destroy();
      unset($_SESSION['authorised']);
   }
   header('location: index.php');
