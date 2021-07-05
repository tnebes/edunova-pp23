<?php declare(strict_types = 1);

function sumNumbers(int $numbers): int
{
   $sum = 0;
   for ($i = 1; $i <= $numbers; $i++)
   {
      $sum += $i;
   }
   return $sum;
}

echo(sumNumbers(100) . '<br />');
echo(sumNumbers(1000) . '<br />');
echo(sumNumbers(10000) . '<br />');