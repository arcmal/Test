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


$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;

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


$analysis = mysql_query("SELECT * FROM login");
$analysis2 = mysql_fetch_assoc($analysis);
do
{
	$count4++;
	
} while ($analysis2 = mysql_fetch_assoc($analysis));


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
	
	<title>Dashboard</title>

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
                <li class="open"><a href="main_page.php"> Dashboard</a></li>
                <li><a href="main_page2.php">Insert Survey</a></li>
		
			</ul>
		</nav>
        
        

	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php echo $count1;?></div>
													<div class="stat-panel-title text-uppercase">Total Survey</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"></a>
										</div>
									</div>
                                    
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php echo $count2;?></div>
													<div class="stat-panel-title text-uppercase">Available Survey</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center"></a>
										</div>
									</div>
                                    
                                   
                                    
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php echo $count3;?></div>
													<div class="stat-panel-title text-uppercase">Non-Available Survey</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center"></a>
										</div>
									</div>
                                    
                                    
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php echo $count4;?></div>
													<div class="stat-panel-title text-uppercase">Analysis user</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center"></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						
						

					</div>
				</div> 

			</div>
		</div>

    <center>
    
    <br>
    
    
    <form id="form1" name="form1" method="post" action="" >
                <label for="txt_search"><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Search By Survey Name  </label>
                <input type="text" name="txt_search" id="txt_search" size="50"/>
                <input type="submit" name="btn_search" id="btn_search" value="     Submit     " />
    </form>
            
    <br>
            
    <table width="969">
      <thead>
        <tr>
          <th width="50"><center>No</center></th>
          <th width="270">Name survey</th>
          <th width="100"><center>Number Question</center></th>
          <th width="100"><center>Last update</center></th>
          <th width="100"><center>Date created</center></th>
          <th width="50"><center>Available</center></th>
          <th width="60"><center>View Survey</center></th>
          <th width="60"><center>Edit Survey</center></th>
          <th width="80"><center>Delete Survey</center></th>	
        </tr>
      </thead>
      
       <?php 
		 	$count = 0;  
			
			$searchword = "%";
			if (isset($_POST['txt_search'])) {
			  $searchword = $_POST['txt_search'];
			}
			
			$survey = mysql_query("SELECT * FROM survey_category WHERE survey_name LIKE '%".$searchword."%' ORDER BY id DESC");
			$survey2 = mysql_fetch_assoc($survey);
			
			
			
			do
			{
				$id_survey = $survey2['id_survey'];
				$count++;
				$question = 0;
				$raw = mysql_query("SELECT * FROM question_result where id_survey ='$id_survey'");
				$raw2 = mysql_fetch_assoc($raw);
				do
				{
					if(empty($raw2))
					{
						$question = 0;
					}
					else
					{
						$question++;
					}
					
				} while ($raw2 = mysql_fetch_assoc($raw))

		 ?>
      <tbody>
      
        <tr>
          <td><center><?php echo $count;?></center></td>
          <td><?php echo $survey2['survey_name'];?></td>
          <td><center><?php echo $question;?></center></td>
          <td><center><?php echo $survey2['date_update'];?></center></td>
          <td><center><?php echo $survey2['date_created'];?></center></td>
          <td><center><a href="available_process.php?id=<?php echo $survey2['id']; ?>">
          				<button class="secondary" onclick= "return confirm('Change Available Survey?');">  <?php echo $survey2['available'];?> </button></a></center></td>
                      
          <td> <center><a href="main_page9.php?id=<?php echo $survey2['id_survey']; ?>">
          <button class="secondary" onclick= "return confirm('View <?php echo $survey2['survey_name'];?> survey?');"  ><img src="../image/view.png" alt="" width="40" height="40"   /></button></a></center></td>
          	  
          <td><?php if($id == $survey2['admin_id']){ ?> 
          <center><a href="main_page6.php?id=<?php echo $survey2['id_survey']; ?>">
          <button class="secondary" onclick= "return confirm('Edit or insert question for <?php echo $survey2['survey_name'];?> survey?');" ><img src="../image/edit.png" alt="" width="35" height="35"   /></button></a></center>
           <?php }  ?></td>
                        
          <td><?php if($id == $survey2['admin_id']){ ?> 
          <center><a href="deleteSurvey_process.php?id=<?php echo $survey2['id_survey']; ?>">
          <button class="secondary" onclick= "return confirm('Delete <?php echo $survey2['survey_name'];?> survey?');" ><img src="../image/delete.png" alt="" width="40" height="40"   /></button></a></center>
           <?php }  ?></td>
        </tr>
       
    
      </tbody>
       <?php	
			} while ($survey2 = mysql_fetch_assoc($survey))
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
