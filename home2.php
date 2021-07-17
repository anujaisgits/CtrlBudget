<?php 
require "common.php";
$user_id=$_SESSION['id'];
//the below select query and further code will check that user have any existing plan or not,if not then will direct it to home 1.php oherwise will show all of his existing plan on the same page i.e. home2.php
$select="select title,start_date,last_date,budget,count from plan_det where user_id=$user_id";
$select_query_result=mysqli_query($con,$select)or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);

if(mysqli_num_rows($select_query_result)==0){
	header('location:home1.php');
}
?>
	
<html>
<head>
 
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   <link rel="stylesheet" href="style.css" type="text/css">
  	
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	

<title>Your PLans</title>

</head>
<body>
<?php
include "header_new.php";
?>
<br><br><br>
<div class="container">
 <h1>Your Plans</h1>
</div>

<br>
<div class="container">
   <div class="row">
     <?php  //from now we will fetch all the plans ,and their details from plan_det table in ctrl_budget database,of the user and will display it using while loop
	         $select="select id,title,start_date,last_date,budget,count from plan_det where user_id=$user_id";
             $select_query_result=mysqli_query($con,$select)or die(mysqli_error($con));
		   while($row= mysqli_fetch_array($select_query_result)){ ?>
        <div class="col-xs-12 col-md-4">
		      <div class="panel panel-success">
			       <div class="panel-heading property">
				    <div class="row">
                      <div class="col-xs-9">
				        <?php echo $row['title'];?>
					   </div>
					   <div class="col-xs-3">
					       <span class = "glyphicon glyphicon-user"><b><?php echo $row['count'];?></b></span> 
					   </div>
					  </div>
				     
				   </div>
				   <div class="panel-body">
				    <div class="row">
                      <div class="col-xs-6">
				        <b>Budget </b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php echo $row['budget'];?>
					   </div>
					  </div> 
					   <div class="row">
                      <div class="col-xs-6">
				        <b>Date </b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php echo $row['start_date'];echo"-";echo $row['last_date'];?>
					   </div>
					 </div>
					 <a href="vplan.php?plan_id=<?php echo $row['id']; ?> "class="btn btn-success btn-block active">View Plan</a> 
				   </div>
				   
			  </div>
        </div>	
      <?php } ?>		
   </div>

</div>
 <div class=" row add"><a href="createnewplanpage.php"><h1><span class=" glyphicon glyphicon-plus-sign"></span></h1></a></div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>