<?php
session_start();

$con = include("connect.php");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



$resVC = mysql_query("SELECT * FROM login WHERE username='$id'");
while ($rowVC = mysql_fetch_assoc($resVC))
{
	$name = $rowVC['name'];
}


$count1 = 0;
$count2 = 0;
$count3 = 0;

$total = mysql_query("SELECT * FROM survey_category");
$total2 = mysql_fetch_assoc($total);
do
{
	$count1++;
	
} while ($total2 = mysql_fetch_assoc($total));


$valid = mysql_query("SELECT * FROM survey_category where available = 'Yes'");
$valid2 = mysql_fetch_assoc($valid);
do
{
	if(empty($valid2))
	{
		$count2 = 0;
	}
	else
	{
		
		$count2++;
	}
	
} while ($valid2 = mysql_fetch_assoc($valid));


$invalid = mysql_query("SELECT * FROM survey_category where available = 'No'");
$invalid2 = mysql_fetch_assoc($invalid);
do
{
	if(empty($invalid2))
	{
		$count3 = 0;
	}
	else
	{
		
		$count3++;
	}
	
} while ($invalid2 = mysql_fetch_assoc($invalid));


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
    <link rel="icon" href="image/logo2.png" type="image/ico">
	
	<title>Index</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
    
	<link rel="stylesheet" href="css/table3.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="#" class="logo"><img src="image/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="login.php"><img src="image/logo-login.png" class="ts-avatar hidden-side" alt=""> Login </a>
			</li>
		</ul>
	</div>

	
        
<center>

	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Welcome to the Web-Based Survey System</h2>
						
					</div>
				</div>

			</div>
		</div>

    
    

    
    
    <form id="form1" name="form1" method="post" action="" >
                <label for="txt_search"><br />
                Search By Name Survey  </label><br />
                <input type="text" name="txt_search" id="txt_search" size="50"/>
                <input type="submit" name="btn_search" id="btn_search" value="     Submit     " />
    </form>

            
    <table width="969">
      <thead>
        <tr>
          <th width="50"><center>No</center></th> 
          <th width="500">Name survey</th>
          <th width="150"><center>Last update</center></th>
          <th width="150"><center>Date created</center></th>
          <th width="100"><center>Available</center></th>
          <th width="150"><center>Answer Survey</center></th>	
        </tr>
      </thead>
      
       <?php 
		 	$count = 0;  
			
			$searchword = "%";
			if (isset($_POST['txt_search'])) {
			  $searchword = $_POST['txt_search'];
			}
			
			$survey = mysql_query("SELECT * FROM survey_category WHERE available = 'Yes' and (survey_name LIKE '%".$searchword."%' or date_update LIKE '%".$searchword."%' or date_created LIKE '%".$searchword."%') ORDER BY date_created DESC");
			$survey2 = mysql_fetch_assoc($survey);
			
			if(!empty($survey2))
		   {
			
			do
			{
				$id_survey = $survey2['id_survey'];
				$count++;

		 ?>
      <tbody>
      
        <tr>
          <td><center><?php echo $count;?></center></td> 
          <td><?php echo $survey2['survey_name'];?></td>
 
          <td><center><?php echo $survey2['date_update'];?></center></td>
          <td><center><?php echo $survey2['date_created'];?></center></td>
          <td><center><button class="secondary">  <?php echo $survey2['available'];?> </button></center></td>
           
          <td><center><a href="survey.php?id=<?php echo $id_survey; ?>">
          				<button class="secondary" onclick= "return confirm('Choose <?php echo $survey2['survey_name'];?> survey?');" ><img src="image/action.png" alt="" width="50" height="40"   /></button></a></center></td>
        </tr>
       
    
      </tbody>
       <?php	
			} while ($survey2 = mysql_fetch_assoc($survey));
		}
		else
		{
			echo "No survey available.";
		}
		?>
    </table>
    </center>
		<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
	</div>

	<!-- Loading Scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap-select.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/Chart.min.js"></script>
	<script src="../js/fileinput.js"></script>
	<script src="../js/chartData.js"></script>
	<script src="../js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");

		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
