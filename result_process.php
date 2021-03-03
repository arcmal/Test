<?php 
$con = include("connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	

if(isset($_POST["submit"])){
	
	$id_survey = $_GET['id'];
	//$question = mysql_real_escape_string(ucwords(strtolower($_POST['question'])));

	//$date_insert = date("d-m-Y");
	//echo $question;
	//echo $id;
	
	$haha = mysql_query("SELECT * FROM question_result WHERE id_survey='$id_survey'");
	$haha2 = mysql_fetch_assoc($haha);

	do 
	{
		$id = $haha2['id'];
		
		
		$question = $_POST['result'.$id];
		

		
		if($question == 1)
		{
			$total = $haha2['rating_1'] + 1;
			mysql_query("UPDATE question_result SET rating_1='".$total."' WHERE id ='$id'") or die(mysql_error());
		
		}
		else if($question == 2)
		{
			$total = $haha2['rating_2'] + 1;
			mysql_query("UPDATE question_result SET rating_2='".$total."' WHERE id ='$id'") or die(mysql_error());
		}
		else if($question == 3)
		{
			$total = $haha2['rating_3'] + 1;
			mysql_query("UPDATE question_result SET rating_3='".$total."' WHERE id ='$id'") or die(mysql_error());
		}
		else if($question == 4)
		{
			$total = $haha2['rating_4'] + 1;
			mysql_query("UPDATE question_result SET rating_4='".$total."' WHERE id ='$id'") or die(mysql_error());
		}
		else if($question == 5)
		{
			$total = $haha2['rating_5'] + 1;
			mysql_query("UPDATE question_result SET rating_5='".$total."' WHERE id ='$id'") or die(mysql_error());
		}
		
		
		
	
	} while ($haha2 = mysql_fetch_assoc($haha));
	
	
	//$id_survey = $haha2['id_survey'];
		
		
		
		
		//echo $id_survey;
		
		
		echo "<script>alert('Successful Update');</script>";
		include("loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=thank_you.php'>";		
	
}


?>