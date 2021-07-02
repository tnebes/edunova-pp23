<?php declare(strict_types = 1);

   $myNumber = 100;
   $mySum = 0;

   function recursiveSum(int $number, int $sum) : int
   {
      if ($number == 1)
      {
         return $sum += $number;
      }

      $sum += $number;
      return recursiveSum($number - 1, $sum);
   }

   echo(recursiveSum($myNumber, $mySum));

   function recursion(int $number) : int
   {
      if ($number === 1)
      {
         return $number;
      }

      return $number + recursion($number - 1);
   }

   echo(recursion($myNumber));
?>