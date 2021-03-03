<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	


if(isset($_POST["submit"])){
	$id = $_GET['id'];
	$email = $_POST['email'];
	$name = mysql_real_escape_string(ucwords(strtolower($_POST['name'])));
	$username = $_POST['username'];
	$reg_date = date("d-m-Y");


		mysql_query("UPDATE login SET name='".$name."', email='".$email."', username='".$username."', date_update='".$reg_date."' WHERE id ='$id'") or die(mysql_error());
	
		echo "<script>alert('Successful Update');</script>";
		include("../loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=main_page4.php'>";	
	
}


?>