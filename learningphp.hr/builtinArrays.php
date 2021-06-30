<?php declare(strict_types=1);

   function myDump($someVariable)
   {

      echo '<pre>';
      print_r($someVariable);
      echo '</pre>';
   }

   echo'<pre>';
   myDump($_GET); // in URL
   myDump($_POST); // not in URL
   myDump($_REQUEST); // both
   myDump($_SERVER); // information about the server
   echo'</pre>';

   $serverSoftware = $_SERVER['SERVER_SOFTWARE'];
   // $phpVersion = substr($serverSoftware, 37);
   // echo($phpVersion);
   $phpVersion = substr($serverSoftware, strpos($serverSoftware, 'PHP') + 4);
   myDump($phpVersion);
   // alt
   explode(',', $phpVersion);
   // the rest?

   session_start();
   $_SESSION['myPassword'] = 'Not good';
   echo '<br />' . '$_SESSION';
   session_abort();


?>
