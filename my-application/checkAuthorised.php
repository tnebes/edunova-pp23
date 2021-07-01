<?php declare(strict_types = 1);

   if (session_id() === '')
   {
      session_start();
   }
   if (!isset($_SESSION['authorised']))
   {
      header('location: index.php');
      exit(1);
   }

