<?php declare(strict_types = 1);
   $lyrics = "Satima
   Sjedim parkirana
   Ispod tvog prozora
   Smijeh ti odjekuje ulicom
   Ti kao da me vidiš
   
   Upijam
   Svjetlo sa ekrana
   Diram broj prstima
   S kime li ovu noć topiš se
   Kako ujutro mirišeš
   
   Imaš li minutu
   Imaš li minutu
   Za mene minutu
   Da pričaš sa mnom cijelu noć
   
   Imaš li minutu
   Imaš li minutu
   Za mene minutu
   Da pričaš sa mnom cijelu noć
   
   Satima
   Na muziku San Rema
   S tobom bi plesala
   Možda sam malo pijana jbga
   Al tako dugo čekam
   Reci mi da sam lijepa
   Zar ne vidiš, ti ne vidiš, zar ne vidiš kako je dobro
   Zar ne vidiš, ti ne vidiš, zar ne vidiš kako je dobro
   
   Imaš li minutu
   Imaš li minutu
   Za mene minutu
   Da pričaš sa mnom cijelu noć
   
   Imaš li minutu
   Imaš li minutu
   Za mene minutu
   Da pričaš sa mnom cijelu noć
   
   Zar ne vidiš, ti ne vidiš, zar ne vidiš kako je dobro
   Zar ne vidiš, ti ne vidiš, zar ne vidiš
   
   Imaš li minutu
   Imaš li minutu
   Za mene minutu
   Da te pitam da ti kazem sve
   
   Imaš li minutu
   Imaš li minutu
   Za mene minutu
   Da pričaš sa mnom cijelu noć";

   $myArray = explode("\n",$lyrics);
   foreach ($myArray as $line) 
   {
      if (trim($line) === "")
      {
         echo '<li>♫ </li>';
         continue;
      }
      echo "<li>$line</li>\n";
   }
