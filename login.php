<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="css/login.css" title="style1" media="screen">
<link rel="icon" href="image/logo.png" type="image/ico">

<?php
	$con = include("../survey_project/connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
	mysql_select_db($con);
?>

<script>
     	
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	}
		
</script>
</head>



<body>
<center><img src="image/logo2.png" alt="" width="200" height="200" /></center>

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Login Administrative</h2>

  <form class="login-container" METHOD="POST" name='form-login' action="login_process.php">
  
    <p><input  type="text" name="id" onkeypress="return isNumberKey(event)" placeholder="ID Number" required></p>
    <p><input type="password" name="password" placeholder="Password" required></p>
    <p><input type="submit" name="submit"  value="Log in"></p>
    
  </form>
</div>

</body>
</html>