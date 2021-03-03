<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);

session_start();	
$id =  $_SESSION['username'];	
	
	
if(isset($_POST["submit"])){
	
	$available = $_POST['available'];
	$name = mysql_real_escape_string(ucwords(strtolower($_POST['name'])));

	$reg_date = date("d-m-Y");
	
	
	
	$id_survey = date("Y").date("m").date("d").date("h").date("i").date("s");
	
	//echo $id_survey;
	
	$sql2 = "INSERT INTO survey_category (id_survey, admin_id, survey_name, available, date_update, date_created) VALUES ('$id_survey', '$id', '$name', '$available', '$reg_date', '$reg_date')";
	mysql_query($sql2);
	
	echo "<script>alert('Survey successfully saved. Please insert question');</script>" ;
	include("../loding.php");
	echo "<meta http-equiv='refresh' content='0; url=main_page.php'>";
	
}

	
	
	

//echo $available;
//echo $reg_date;
//echo $name;
//echo $id_survey;


?>