<?php
session_start();

$con = include("connect.php");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



if($_GET['id'])
{
	$id_survey = $_GET['id'];
}


$survey = mysql_query("SELECT * FROM survey_category WHERE id_survey = $id_survey");
$survey2 = mysql_fetch_assoc($survey);

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
	
	<title>Survey</title>

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
				
			</li>
		</ul>
	</div>

	
        

<br />
<br />
<br />
<center>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><?php echo $survey2['survey_name'];?></h2>
						
					</div>
				</div>

			</div>
		</div>

    
    


           
            
            
   			</div>
            
            <table width="969">
      <thead>
        <tr>
          <th width="240"><center>Very Dissatisfied</center></th> 
          <th width="240"><center>Dissatisfied</center></th> 
          <th width="240"><center>Nutral</center></th> 
          <th width="240"><center>Satisfied</center></th> 
          <th width="240"><center>Very Satisfied</center></th> 
        </tr>
      </thead>
      <tbody>
      
        <tr>
          <td><center><img src="image/VD.png" alt="" width="50" height="50"   /></center></td>
 		  <td><center><img src="image/D.png" alt="" width="50" height="50"   /></center></td>
          <td><center><img src="image/N.png" alt="" width="50" height="50"   /></center></td>
          <td><center><img src="image/S.png" alt="" width="50" height="50"   /></center></td>
          <td><center><img src="image/VS.png" alt="" width="50" height="50"   /></center></td>
          
        </tr>
       
    
      </tbody>
      
    </table>
    <?php 
	   
	   
	  
		 	$count = 0;  

			$question = mysql_query("SELECT * FROM question_result WHERE id_survey = $id_survey");
			$question2 = mysql_fetch_assoc($question);
			
		if(!empty($question2))
		{
			?>
       
    <table width="969">
      <thead>
        <tr>
          <th width="50"><center>No</center></th> 
          <th width="600">Survey Question</th>
          <th width="400"><center>Answer Survey</center></th>	
        </tr>
      </thead>
      
       <?php 
	   

			do
			{
				$count++;
				
			
			
			
			
		 ?>
        
         
      <form class="login-container" METHOD="POST" name='form-login' onSubmit="return validate()" action="result_process.php?id=<?php echo $question2['id_survey']; ?>" > 
      <tbody>
      
        <tr>
          <td><center><?php echo $count;?></center></td> 
          <td><?php echo $question2['question_name'];?></td>
 
          <td><center>
           	<img src="image/VD.png" alt="" width="50" height="50"   />
            <img src="image/D.png" alt="" width="50" height="50"   />
            <img src="image/N.png" alt="" width="50" height="50"   />
            <img src="image/S.png" alt="" width="50" height="50"   />
            <img src="image/VS.png" alt="" width="50" height="50"   />
             </center>
            <br />
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="VD" type="radio" name="result<?php echo $question2['id'];?>" value="1"  required="required"/>
            
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="D" type="radio" name="result<?php echo $question2['id'];?>" value="2" required="required"/>
            
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="N" type="radio" name="result<?php echo $question2['id'];?>" value="3" required="required"/>
           
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="S" type="radio" name="result<?php echo $question2['id'];?>" value="4" required="required"/>
            
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="VS" type="radio" name="result<?php echo $question2['id'];?>" value="5" required="required"/>
            
            
            
            
   			</div>
    
    
         </td>
          
        </tr>
       
    
      </tbody>
       <?php	
			} while ($question2 = mysql_fetch_assoc($question));

		?>
    </table>
    
    <table>
     <tr>
          <th><center><button class="secondary" name="submit">  <font color="Black"> Continue </font></button></center></th> 
     </tr>
    
    </table>
     <?php	
		}
		else
		{
			echo "The question is not available.";
		}
		?>
    </form>	
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
