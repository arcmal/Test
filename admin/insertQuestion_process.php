<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	

if(isset($_POST["submit"])){
	
		$id_survey = $_GET['id'];
		$question = mysql_real_escape_string(ucwords(strtolower($_POST['question'])));
		
		$date_insert = date("d-m-Y");
		

		//echo $id ;
		//echo $question ;

		
		$sql2 = "INSERT INTO question_result (id_survey, question_name, date_created) VALUES ('$id_survey', '$question', '$date_insert')";
		mysql_query($sql2);
		
		
		mysql_query("UPDATE  survey_category SET date_update='".$date_insert."' WHERE id_survey ='$id_survey'") or die(mysql_error());
		
		echo "<script>alert('Successful Insert');</script>";
		include("../loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=main_page.php'>";	
	
}


?>