<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chemis-app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Никита Бережной" >
    <!--Css-->    
    <link href="../css/style.css" rel="stylesheet">    
    <style type="text/css">body{padding-top:40px;padding-bottom:40px;background-color:#f5f5f5;background-repeat:repeat;}</style>
    </head>    
<?php
session_start();
include "../dbinit.php";

$login = $admin_login;
$password = $admin_password;

if (isset($_SESSION['admin'])) { $print_form = "already_login"; }

if ($print_form != "already_login")
{
   if (!@$_POST)
{
      $print_form = 1;
}

   else

{
  $posted_admin_login = $_POST['login'];
	$posted_admin_password =  $_POST['password'];
	
	
	if ($posted_admin_login == $login && $posted_admin_password == $password)	
	{	 
		 $_SESSION['admin'] =  $posted_admin_login;    	          
		 $print_form = 0;
        }
        else
        {
	    $msg = "You entered an incorrect username or password.<br>Hands will be amputated!";
		 $print_form = 1;
        }
}
}
   if ($print_form != 1 or $print_form == "already_login")
   {
	include "admin.php"; 
   }
   else
   {
	?>		
	<body>
<center>
<div class="container">
<span class="label label-important"><?=@$msg?></span>
<form action="<?=$_SERVER["PHP_SELF"] ?>" method="POST" name="admin_login">
<h2 class="form-signin-heading">Log in to the administrator</h2>
<input type="text" name="login" value=""><br/>
<input type="password" name="password" value=""><br/>
<button class="btn btn-large btn-primary" type="submit">Log in</button>
</form>
</div>
</center>
	</body>
	</html>
	<?php 
   }   
?>
