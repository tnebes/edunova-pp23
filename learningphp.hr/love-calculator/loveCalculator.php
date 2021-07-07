<?php declare(strict_types = 1);

   /**
    * Function returns the combined names that are lowercase and that are used when calculating the love between two names
    */
   function getCombinedNames(string $name0, string $name1)
   {
      return strtolower(trim($name0)) . strtolower(trim($name1));
   }

   /**
    * The function returns an associate array whose key is the letter and the value is the number of occurences of such a letter.
    */
   function getCharacterCounts(string $name0, string $name1): array
   {
      $names = getCombinedNames($name0, $name1);
      $letters = [];

      for ($i = 0; $i < strlen($names); $i++) {
         $letters[$names[$i]] = returnCharacterCount($names[$i], $names);
      }

      return $letters;
   }

   /**
    * The function returns a number which represents how often a letter occurs in a given string
    */
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

   /**
    * Function prints the first and second name which should not be used in calculations but rather in
    * the content of the webpage.
    */
   function printNameCounter(string $name0, string $name1): void
   {
      $names = $name0 . ' & ' . $name1;
      echo $names . '<br />';
   }

   /**
    * Function returns a string whose indeces correspond to the concatenated first and second name with a whitespace between them.
    * for 'Tom Moira' the return value ought to be '12222111'
    * Tom Moira
    * 122 22111
    */
   function getNumbers(string $name0, string $name1, array $counter): string
   {
      $numbers = '';
      $names = getCombinedNames($name0, $name1);

      for ($i = 0; $i < strlen($names); $i++) {
         $numbers .= $counter[$names[$i]];
      }
      return $numbers;
   }

   /**
    * The recursive function that is responsible for printing the love between the two names.
    * Function calls itself until the love is smaller than 2 chars.
    */
   function recursiveSum(string $numbers) : void
   {
      if (strlen($numbers) <= 2)
      {
         echo $numbers;
         return;
      }
      $output = '';
      for ($i = 0, $j = strlen($numbers) - 1; $i < $j; $i++, $j--)
      {
         $output .= (int) $numbers[$i] + (int) $numbers[$j];
      }
      if (strlen($numbers) % 2 == 1)
      {
         $middle = (int) (strlen($numbers) / 2);
         $output .= $numbers[$middle];
      }
      recursiveSum($output);
   }

   /**
    * Function checks whether the post data is set and whether it is not empty.
    * If empty or not set, returns false, if OK, returns true.
    */
   function checkPOST() : bool
   {
      if (!(isset($_POST['firstName']) && isset($_POST['secondName'])))
      {
         return false; // not set
      }
      if (trim($_POST['firstName']) == '' && trim($_POST['secondName']) == '')
      {
         return false; // empty
      }
      return true;
   }

   if (!checkPOST())
   {
      exit(1);
   }

   $firstName = trim($_POST['firstName']);
   $secondName = trim($_POST['secondName']);

   $counter = getCharacterCounts($firstName, $secondName);
   $number = getNumbers($firstName, $secondName, $counter);

   echo '<span class="lovers">';
   printNameCounter($firstName, $secondName);
   echo '</span>';
   echo '<span class="special-text">';
   recursiveSum($number);
   echo "%\n</span>";