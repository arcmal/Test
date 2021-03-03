<?php 
$con = include("../connect.php");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
								
mysql_select_db($con);
	
	

if($_GET['id'])
{
	
		$id = $_GET['id'];

		$survey = mysql_query("SELECT * FROM survey_category WHERE id='$id'");
		$survey2 = mysql_fetch_assoc($survey);
		
		
		
		if($survey2['available']=='Yes')
		{
			$available = 'No';
		}
		else if($survey2['available']=='No')
		{
			$available = 'Yes';
		}
		
		//echo $available ;
		
		mysql_query("UPDATE survey_category SET available='".$available."' WHERE id ='$id'") or die(mysql_error());
		
		
		echo "<script>alert('Successful Update');</script>";
		include("../loding.php"); 
		echo "<meta http-equiv='refresh' content='0; url=main_page.php'>";	
	
}


?>