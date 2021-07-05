<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body style="font-family: monospace;">

   <?php
   class Letter
   {

      function __construct($letter)
      {
         $this->letter = $letter;
      }

      public $letter;
      public $count;
   }

   $firstName = 'Tomislav';
   $secondName = 'Teuta';

   function getCombinedNames(string $name0, string $name1)
   {
      return strtolower(trim($name0)) . strtolower(trim($name1));
   }

   function getCharacterCounts(string $name0, string $name1): array
   {
      $names = getCombinedNames($name0, $name1);
      $letters = [];

      for ($i = 0; $i < strlen($names); $i++) {
         $letters[$names[$i]] = returnCharacterCount($names[$i], $names);
      }

      return $letters;
   }

   function returnCharacterCount(string $character, $string): int
   {
      $counter = 0;

      for ($i = 0; $i < strlen($string); $i++) {
         if ($character == $string[$i]) {
            $counter++;
         }
      }
      return $counter;
   }

   function printNameCounter(string $name0, string $name1): void
   {
      $names = strtolower($name0 . ' ' . $name1);

      echo $names . '<br />';
   }

   function getNumbers(string $name0, string $name1, array $counter) : string
   {
      $numbers = '';
      $names = getCombinedNames($name0, $name1);

      for ($i = 0; $i < strlen($names); $i++)
      {
         $numbers .= $counter[$names[$i]];
      }
      return $numbers;
   }

   function recursiveSum(string $numbers) : string
   {
      echo $numbers;
      echo '<br / >';
      if (strlen($numbers) <= 2)
      {
         return $numbers;
      }
      return recursiveSum(substr($numbers[1], strlen($numbers) - 2));
   }

   $counter = getCharacterCounts($firstName, $secondName);
   $number = getNumbers($firstName, $secondName, $counter);

   printNameCounter($firstName, $secondName);
   echo '<br />' . $number;
   recursiveSum($number);
   ?>

</body>

</html>