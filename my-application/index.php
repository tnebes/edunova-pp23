<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once 'head.php'; ?>
</head>

<body>
   <?php include_once 'header.php'; ?>
   <div class="main-container">
      <div class="image-container">
         <img class="meme-image" src="assets/img/images/index/meme.jpg" />
      </div>
      <div class="text-container">
         <h2 class="project-descriptor">I love PHP</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales diam ac hendrerit aliquet. Phasellus pretium libero vel molestie maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis est quam. Aenean blandit a urna laoreet tincidunt.</p>
         <h2>Reasons why I love PHP</h2>
         <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
         </ul>
      </div>
   </div>
   <hr />
   <div class="song-container">
      <h1>Imaš li minutu?</h1>
      <iframe id="yt-song" width="800" height="600" src="https://www.youtube-nocookie.com/embed/bWcXbF8fe3s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <ul class="song-lyrics">
         <?php include_once 'lyrics.php'?>
      </ul>
   </div>
   <?php include_once 'scripts.php'; ?>
</body>

</html>