<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	

if(isset($_POST["submit"])){
	
	$id = $_GET['id'];
	$survey = mysql_real_escape_string(ucwords(strtolower($_POST['survey'])));

	$date_insert = date("d-m-Y");
	//echo $survey;
	//echo $id;
		
		mysql_query("UPDATE survey_category SET survey_name='".$survey."', date_update='".$date_insert."' WHERE id_survey ='$id'") or die(mysql_error());
		
		
		echo "<script>alert('Successful Update');</script>";
		include("../loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=main_page.php'>";		
	
}


?>