<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	

if(isset($_POST["submit"])){
	$id = $_GET['id'];
	$pass = md5($_POST['old_pass']);
	$pass2 = md5($_POST['password']);
	
	$reg_date = date("d-m-Y");
	
	
	
	
	$query = mysql_query("select * from login where id ='$id'");
	$check = 0;
	while ($rowC1 = mysql_fetch_array($query))
	{
		if ($rowC1['password']!= $pass)
		{	
			$check = 1;
			
		}
	
	}

	
	
	if ($check==1)
	{
		echo "<script>alert('Incorrect Old Password');</script>";
		include("../loding.php");
		echo "<meta http-equiv='refresh' content='1; url=main_page5.php'>";
		
	}
	else if ($check==0)
	{
		mysql_query("UPDATE login SET password='".$pass2."', date_update='".$reg_date."' WHERE id ='$id'") or die(mysql_error());
		
		
		
		echo "<script>alert('Successful Update Password');</script>";
		include("../loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=main_page4.php'>";	
	}
}


?>