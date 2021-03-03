<?php
$con = include("../connect.php");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

if($_GET['id'])
{
	$id = $_GET['id'];
	
	

 	//echo $id;
	
	//$sql_delete = "DELETE FROM survey_category WHERE id_survey ='$id_survey'";
 	//mysql_query($sql_delete);
	
	$sql_delete2 = "DELETE FROM question_result WHERE id ='$id'";
 	mysql_query($sql_delete2);
	
	
	
	
	
	echo "<script>alert('The survey had been deleted');</script>" ; 
	include("../loding.php");
	echo "<meta http-equiv='refresh' content='0; url=main_page.php'>";
}
?>