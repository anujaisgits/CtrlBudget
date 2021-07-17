<?php require"common.php";
?>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css">	
<title>Your plan details</title>
</head>
<body>
<?php                                                                                                                                  
include "header_new.php";
//value of budget and no. of person obtained from createnewplanpage.php is assigned to $budget and $count variable respectively
$count=$_POST['count'];
$budget=$_POST['budget'];
?><br><br><br><br><br><br>
   <div class="container">
           <div class="row">
		          <div class=" col-xs-12 col-md-6 col-md-offset-3">
				     <div class=" panel panel-success">
					  <div class="panel-body">
				       <form action="plan_det_script.php?count=<?php echo "$count"; ?>&budget=<?php echo "$budget"; ?>" method="post" >
					           <div class="form-group">
							                 <label for="title">Title</label>
						                      <input type="text" class="form-control " name="title" required="true" placeholder="Enter title (Ex- Trip to Goa)"/>
							   </div>
							   <div class="row">
							     <div class="col-xs-7">
							   <div class="form-group">
							              <label for="from">From</label>
							               <input type="date" class="form-control" name="from"/> 
							   </div>
							   </div>
							      <div class="col-xs-5 ">
							   <div class="form-group">
							      <label for="to">To</label>
							               <input type="date" class="form-control" name="to"/> 
							               
							   </div>
							   </div>
							   </div>
							     <div class="row">
							     <div class="col-xs-8">
							   <div class="form-group">
							              <label for="budget">Initial Budget</label>
							               <input type="text" class="form-control " name="int_budget" value="<?php echo "$budget"; ?>" disabled /> 
							   </div>
							   </div>
							      <div class="col-xs-4 ">
							   <div class="form-group">
							      <label for="count">No.of people</label>
							               <input type="number" class="form-control " name="count" value="<?php echo "$count"; ?>" disabled /> 
							               
							   </div>
							   </div>
							   </div>
							      <?php  for($i=1;$i<=$count;$i++) {   ?>
							      
								    <div class="form-group">
							                 <label for="person<?php echo "$i"; ?>">Person<?php echo "$i"; ?></label>
						                      <input type="text" class="form-control " name="person[]" required="true" placeholder="Person<?php echo "$i"; ?>"/> 
							       </div>
								 <?php } ?>
								  <div class="form-group">
                              <input type="submit" class="btn btn-success btn-block form-control" value="Submit" class="form-control"/>
							  </div>
					   </form>
					   </div>
					  </div> 
				  </div>
		   </div>
	</div>
<br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>