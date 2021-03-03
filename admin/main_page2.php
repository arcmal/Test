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

	<link rel="stylesheet" href="../css/table.css">
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
                <li class="open"><a href="main_page2.php">Insert Survey</a></li>
		
			</ul>
		</nav>
        
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Insert New Survey</h2>
						
					</div>
				</div>

			</div>
    </div>
    <center>
    <br>
<form class="login-container" METHOD="POST" name='form-login' onSubmit="return validate()" action="insertSurvey_process.php" > 
<table width="969">
  <thead>
    <tr>
      <th width="400"><center>Survey Name</center></th>
      <td><input type="text" name="name" value="" size="140" required="required"></td>
    </tr>

    <tr>
      <th width="400"><center>Available</center></th>
      <td><select name="available" id="available" onchange="update(this.value)">
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select></td>
    </tr>
     <tr>
      <th width="400"><center>Action</center></th>
      <td><button name="submit" class="secondary" onclick= "return confirm('Insert New Survey?');"> Insert New Survey</button></td>
    </tr>
    
  </thead>
</table>
</center>
</form>	
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
