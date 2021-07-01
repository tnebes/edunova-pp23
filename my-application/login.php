<?php declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once 'head.php'; ?>
</head>

<body>
   <?php include_once 'header.php'; ?>
   <?php include_once 'loginFailCheck.php'?>
   <?php if (isset($_SESSION['authorised']))
   {
      header('location: index.php');
   }
   ?>
   <div class = "my-login-div">
      <form class="my-login-form" action="authorisation.php" method="post">
         <label for="email">Email</label>
         <input type="text" name="email" id="email">

         <label for="pass">Password</label>
         <input type="password" name="pass" id="pass">

         <input type="submit" value="Log in">
      </form>
      <div>
         Email and password can be found <a href="https://github.com/tnebes/edunova-pp23/blob/main/my-application/authorisation.php">here.</a>
      </div>
   </div>
   <?php include_once 'scripts.php'; ?>
</body>
   
</html>