<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	

if(isset($_POST["submit"])){
	
	$id = $_GET['id'];
	$question = mysql_real_escape_string(ucwords(strtolower($_POST['question'])));

	$date_insert = date("d-m-Y");
	//echo $question;
	//echo $id;
	
	$haha = mysql_query("SELECT * FROM question_result WHERE id='$id'");
	$haha2 = mysql_fetch_assoc($haha);
	$id_survey = $haha2['id_survey'];
		
		mysql_query("UPDATE question_result SET question_name='".$question."', date_created='".$date_insert."' WHERE id ='$id'") or die(mysql_error());
		
		
		mysql_query("UPDATE  survey_category SET date_update='".$date_insert."' WHERE id_survey ='$id_survey'") or die(mysql_error());
		
		
		echo "<script>alert('Successful Update');</script>";
		include("../loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=main_page.php'>";		
	
}


?>