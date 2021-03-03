
<?php 
session_start();
$con = include("../survey_project/connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	
	
	
if(isset($_POST["submit"])){
	$id = $_POST['id'];
	$pass = md5($_POST['password']);
	
	$query = mysql_query("select * from login where username='$id' AND password='$pass'");
	$rows = mysql_num_rows($query);
	if ($rows == 1) {
		$resVC = mysql_query("select * from login where username='$id' AND password='$pass'");
		
		
		
		
		while ($rowVC = mysql_fetch_assoc($resVC))
		{
			$_SESSION['username'] = $rowVC['username'];
			include("loding.php");
			header("location: admin/main_page.php");
		}
	}
	else {
		echo "<script>alert('Incorrect ID Number or Password. Try Again');</script>";
		include("loding.php");
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	}

	
}
	

?>
