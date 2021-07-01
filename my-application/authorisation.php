<?php declare(strict_types = 1);

session_start();
if($_POST['email'] === 'oper@edunova.hr' && $_POST['pass'] === 'letmeinside1')
{
   $_SESSION['authorised'] = $_POST['email'];
   if (isset($_SESSION['loginFail']))
   {
      unset($_SESSION['loginFail']);
   }
   header('location: index.php');
}
else
{
   $_SESSION['loginFail'] = true;
   header('location: login.php');
}