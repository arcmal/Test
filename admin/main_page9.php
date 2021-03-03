<?php
session_start();

$con = include("../connect.php");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$id =  $_SESSION['username'];


include("session.php");



$resVC = mysql_query("SELECT * FROM login WHERE username='$id'");
while ($rowVC = mysql_fetch_assoc($resVC))
{
	$name = $rowVC['name'];
}

if($_GET['id'])
{
	$id_survey = $_GET['id'];
}


$survey = mysql_query("SELECT * FROM survey_category WHERE id_survey='$id_survey'");
$survey2 = mysql_fetch_assoc($survey);


$question = mysql_query("SELECT * FROM question_result WHERE id_survey='$id_survey'");
$question2 = mysql_fetch_assoc($question);
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
    <link rel="icon" href="../image/logo2.png" type="image/ico">
	
	<title>Insert Survey</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="../css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="../css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="../css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="../css/style.css">

	<link rel="stylesheet" href="../css/table2.css">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="main_page.php" class="logo"><img src="../image/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#"><?php echo $name;?></a></li>
			<li class="ts-account">
				<a href="#"><img src="../image/new.png" class="ts-avatar hidden-side" alt=""> Account </a>
				<ul>
					<?php include("navigation2.php"); ?>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Main</li>
                <li><a href="main_page.php"> Dashboard</a></li>
                <li><a href="main_page2.php">Insert Survey</a></li>
		
			</ul>
		</nav>
        
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard Rating Survey </h2>
						
					</div>
				</div>

			</div>
    </div>
    
    <div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><center><?php echo $survey2['survey_name']; ?></center></h2>
						
					</div>
				</div>

			</div>
    </div>
    <center>
    
<style> 
	
input[id=fname1] {

    margin: 8px 0;
    box-sizing: border-box;
    background-color: #006400;
    color: white;
}
input[id=fname2] {

    margin: 8px 0;
    box-sizing: border-box;
    background-color: #00008B;
    color: white;
}
input[id=fname3] {

    margin: 8px 0;
    box-sizing: border-box;
    background-color: #1E90FF;
    color: white;
}
input[id=fname4] {

    margin: 8px 0;
    box-sizing: border-box;
    background-color: #ff471a;
    color: white;
}
input[id=fname5] {

    margin: 8px 0;
    box-sizing: border-box;
    background-color: #ff0000;
    color: white;
}
</style>	

<table width="1150" border="5" > 
  <thead>
    <th width="20"><center> No.</center></th>
    <th width="400"><center>Question</center></th>	
    <th width="300"><center>Result</center></th>	
    <th width="50"><center>user</center></th>
  </thead>
  
    <tbody>
      <?php 
		 	$count = 0;  
			
			$total = 0;
			$r1 = 0;
			$r2 = 0;
			$r3 = 0;
			$r4 = 0;
			$r5 = 0;
			
			if(!empty($question2))
			{
			do
			{
				$total = $question2['rating_1'] + $question2['rating_2'] + $question2['rating_3'] + $question2['rating_4'] + $question2['rating_5'];
				
				if($total != 0)
				{	
					$r1 = ($question2['rating_1'] / $total) * 480;
					
					
					$r2 = ($question2['rating_2'] / $total) * 480;
					
					
					$r3 = ($question2['rating_3'] / $total) * 480;
					
					
					$r4 = ($question2['rating_4'] / $total) * 480;
					
					
					$r5 = ($question2['rating_5'] / $total) * 480;
				}
				else
				{
					$r1 = 0;
					$r2 = 0;
					$r3 = 0;
					$r4 = 0;
					$r5 = 0;
				}

				
				$count++;
				
				
				
				
				

		 ?>
        <tr>
          <td><center><?php echo $count;?></center></td>
          <td height="50"><?php echo $question2['question_name'];?></td>
          
          <td>
          		
                <table>
                <tr>
                	<?php if($r1 != 0){?><td width="<?php echo $r1 ?>" height="49" bgcolor="#FF0000"><center><font color="white"><?php echo $question2['rating_1'] ?></font></center></td><?php }?>
                    
                    <?php if($r2 != 0){?><td width="<?php echo $r2 ?>" height="49" bgcolor="#FF6600"><center><font color="white"><?php echo $question2['rating_2'] ?></font></center></td><?php }?>
                    
                    <?php if($r3 != 0){?><td width="<?php echo $r3 ?>" height="49" bgcolor="#ffcc00"><center><font color="white"><?php echo $question2['rating_3'] ?></font></center></td><?php }?>
                    
                    <?php if($r4 != 0){?><td width="<?php echo $r4 ?>" height="49" bgcolor="#33cc33"><center><font color="white"><?php echo $question2['rating_4'] ?></font></center></td><?php }?>
                    
                    <?php if($r5 != 0){?><td width="<?php echo $r5 ?>" height="49" bgcolor="#006600"><center><font color="white"><?php echo $question2['rating_5'] ?></font></center></td><?php }?>
                </tr>
                </table>
                
            
          </td>
          <td><center><?php echo $total; ?></center></td>
        </tr>
       <?php	
			} while ($question2 = mysql_fetch_assoc($question));
			}
		?>
    
      </tbody>
</table>

</center>


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
