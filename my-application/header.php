<nav class="top-bar topbar-responsive">
   <div class="top-bar-title">
      <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
         <button class="menu-icon" type="button" data-toggle></button>
      </span>
      <a class="topbar-responsive-logo" href="index.php"><strong>My application</strong></a>
   </div>
   <div id="topbar-responsive" class="topbar-responsive-links">
      <div class="top-bar-right">
         <ul class="menu simple vertical medium-horizontal">
            <li><a href="index.php">Home</a></li>
            <li><a href="https://github.com/tnebes">About</a></li>
            <?php
               session_start();
               if (isset($_SESSION['authorised']))
               {
                  echo '<li><a href="logout.php">logout</a></li>';
                  echo '<li><a href="secret.php">SECRET</a></li>';
               }
               else
               {
                  echo '<li><a href="login.php">Login</a></li>';
               }
            ?>
            <!-- <li>
          <button type="button" class="button hollow topbar-responsive-button">Categories</button>
        </li> -->
         </ul>
      </div>
   </div>
</nav>